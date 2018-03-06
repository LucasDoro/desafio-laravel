<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Images;
use App\Products;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem as Storage;

class ProductsController extends Controller
{

    /** @var Categories */
    private $categories;
    private $products;
     /** @var Storage */
    private $storage;

    public function __construct(Products $products, Categories $categories, Storage $storage)
    {     
        $this->categories = $categories;
        $this->products = $products;
        $this->storage = $storage;
    }

    /**
     * Método responsável por carregar a pagina inicial do sistema, como existem categorias
     * pode-se existir um parâmetro categoryId, que faz com que o método tente buscar os produtos
     * pela categoria informada
     *
     * @param int $categoryId
     * @return void
     */
    public function index($categoryId = null)
    {

        $category = $this->categories->find($categoryId);

        $data = [
            'categoryId' => $categoryId,
        ];

        if(!is_null($categoryId) && !empty($category)){
            $data['categoryImage'] = $category->image;
            $data['categoryName'] = $category->name;
        }
        

        return view('index', $data);
    }

    /**
     * Busca os produtos pela categoria, se não for passado nenhuma categoria, retorna todos
     * os produtos
     *
     * @param int $categoryId
     * @return Json
     */
    public function productsByCategories($categoryId = null){
        
        $products = collect();

        if(is_null($categoryId)){
            $products = $this->products->get();
        }else{
            $category = $this->categories->find($categoryId);

            if(!empty($category)){
                $products = $category->products()->get();
            }
        }

        foreach($products as $product){
            $product->images;
            $product->categories;
        }

        return $this->response($products, 200);

    }

    /**
     * Carrega a view do formulário de cadastro
     *
     * @return view
     */
    public function createView()
    {
        return view('administration.products.form');
    }

    /**
     * Carrega a view 
     *
     * @param [type] $id
     * @return void
     */
    public function editView($id){
        $product = $this->products->find($id);

        if(!empty($product)){

            $product->categories;
            $product->images;

            $data = [
                'edit' => $product
            ];

            return view('administration.products.form', $data);
        }else{
            redirect('/');
        }

    }

    public function save(ProductsRequest $productsRequest)
    {
        return $this->saveProduct($productsRequest, $productsRequest->imagecount);
    }

    public function edit(ProductsRequest $productRequest){

        /** @var Products $products */
        $product = $this->products->find($productRequest->id);
        $imageCount = $productRequest->imagecount;
        $images = collect();

        if(!empty($product)){
            $this->detachCategories($product);
            $product->setName($productRequest->name);
            $product->setDescription($productRequest->description);
            $product->setPrice($productRequest->price);

            $this->attachCategories($productRequest->categories, $product);

            if(!is_null($productRequest->file('image'))){
                $image = $this->saveImage($productRequest->file('image'), $product);
                if(!is_null($image))
                $images->push($image);
            }

            for ($i = 1; $i < $imageCount; $i++) {
                $image = $this->saveImage($productRequest->file('image' . $i), $product);
                if(!is_null($image))
                    $images->push($image);
            }

            $update = $product->update();

            if($update){
                return $this->response(['msg' => 'Produto atualizado com sucesso!', 'images' => $images], 200);
            }else{
                return $this->response('Não foi possível atualizar o produto', 422);
            }

        }

    }

    /**
     * Deleta um produto
     * Desanexa categorias e deleta imagens
     *
     * @param int $id
     * @return void
     */
    public function delete($id){
        $product = $this->products->find($id);

        if(!empty($product)){
            $this->detachCategories($product);
            $this->deleteImages($product->images, $product);
            $delete = $product->delete();

            if($delete){
                return $this->response('Produto removido com sucesso!', 200);
            }else{
                return  $this->response('Não foi possível remover esse produto', 422);
            }
        }
        
    }

    public function deleteImage($productId, $imageId){

        $product = $this->products->find($productId);
        $image = $product->images()->find($imageId);
        $adjust = str_replace('storage', './public', $image->image);

        if(!empty($product) && !empty($image)){
           $this->storage->delete($adjust);
           $delete = $image->delete();

           if($delete){
               return $this->response('Imagem apagada com sucesso!', 200);
           }else{
               return $this->response('Falha ao apagar imagem', 422);
           }
        }

    }

    /**
     * Desanexa todas as categorias no qual esse produto pertence
     *
     * @param Products $categories
     * @return void
     */
    private function detachCategories($product){
        $product->categories()->detach();
    }

    /**
     * Deleta as imagens do disco e desanexa 
     *
     * @param [type] $images
     * @return void
     */
    private function deleteImages($images, $product){
        foreach ($images as $image) {
            $adjust = str_replace('storage', './public', $image->image);
            if($this->storage->delete($adjust)){
                $product->images()->detach($image->id);
                $image->delete();
            }
        }
    }

    /**
     * @param Request $product
     */
    private function saveProduct($product, $imageCount)
    {

        $prod = new Products();
        $prod->setName($product->name);
        $prod->setDescription($product->description);
        $prod->setPrice($product->price); 

        if ($prod->save()) {

            $this->saveImage($product->file('image'), $prod);

            for ($i = 1; $i < $imageCount; $i++) {
                $this->saveImage($product->file('image' . $i), $prod);
            }

            $this->attachCategories($product->categories, $prod); 

            return $this->response(['msg' => 'Produto cadastrado com sucesso!'], 200);
        } else {
            return $this->response('Falha ao cadastrar produto, tente novamente mais tarde!', 422);
        }
    }

    private function attachCategories($categories, $product){
        foreach($categories as $ctg){
            /** @var Categories */
            $category = $this->categories->find($ctg);

            if(!empty($category)){
                $product->categories()->attach($category);
            }
        }
    }

    /**
     * @param  $images
     * @param Products $product
     */
    private function saveImage($image_uploaded, $product)
    {

        $upload = $this->storage->putFile('public/products', $image_uploaded, 'public');

        if ($upload != false) {
            $imageLocation = 'storage/products/' . $image_uploaded->hashName();

            $image = new Images();
            $image->setImage($imageLocation);
            $saved = $image->save();

            $product->images()->attach($image);

            if($saved){
                return $image;
            }else{
                return null;
            }

        }else{
            return null;
        }
    }
}
