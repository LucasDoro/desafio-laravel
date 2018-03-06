<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\CategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem as Storage;

class CategoriesController extends Controller
{

    private $categories;
    private $storage;

    public function __construct(Categories $categories, Storage $storage)
    {
        $this->categories = $categories;
        $this->storage = $storage;
    }

    /**
     * View de cadastro de categoria, injeta as categorias para o select
     *
     * @return view
     */
    public function createView()
    {
        $categories = $this->categories->get();

        $data_view = [
            'categories' => $categories
        ];

        return view('administration.categories.form', $data_view);
    }

    /**
     * Carrega a view de listagem de categorias
     *
     * @return view
     */
    public function listView()
    {
        return view('administration.categories.view');
    }

    /**
     * Busca a categoria pelo nome
     *
     * @param string $name
     * @return Categories
     */
    public function searchByName($name){
        return $this->categories->where('name', 'LIKE', '%'.$name.'%')->get();
    }

    /**
     * Carrega a view de editar categoria, injeta todos os dados do item a ser editado
     *
     * @param int $id
     * @return view
     */
    public function editView($id)
    {

        $category = $this->categories->find($id);
        $categories = $this->categories->get();

        $data = [
            'categories' => $categories,
            'edit' => $category
        ];

        return view('administration.categories.form', $data);

    }

    /**
     * Salva novas categorias
     *
     * @param CategoriesRequest $request
     * @return Response
     */
    public function save(CategoriesRequest $request)
    {

        $category = new Categories();
        $category->setName($request->name);
        $this->storage->putFile('public/categories', $request->file, 'public');
        $category->setImage('storage/categories/' . $request->file->hashName());
        $save = $category->save();

        if ($save) {
            return $this->response(['msg' => 'Categoria cadastrada com succeso!', 'category' => $category], 200);
        } else {
            return $this->response(['msg' => 'Falha ao cadastrar a categoria, tente novamente!'], 422);
        }

    }

    /**
     * Busca todas as categorias
     *
     * @return Categories
     */
    public function getAll()
    {
        $categories = $this->categories->get();
        return $categories;
    }

    /**
     * Deleta a categoria pelo ID
     *
     * @param int $id
     * @return Response
     */
    public function delete($id)
    {
        $category = $this->categories->find($id);
        $this->delete_image($category->getImage());

        if (!empty($category)) {
            if ($category->delete()) {
                return $this->response(['msg' => 'Categoria deletada com sucesso!'], 200);
            } else {
                return $this->response(['msg' => 'Falha ao deletar categorias!'], 422);
            }
        }

    }

    /**
     * Edita a categoria
     *
     * @param CategoriesRequest $request
     * @return Response
     */
    public function edit(CategoriesRequest $request){

        /** @var Categories $category */
        $category = $this->categories->find($request->id);

        if(empty($category))return $this->response('', 422);

        $category->setName($request->name);
        $fileUpdated = false;

        if(!empty($request->file)){

            $this->delete_image($category->getImage());
            $this->storage->putFile('public/categories', $request->file, 'public');
            $imageLocation = 'storage/categories/' . $request->file->hashName();
            $category->setImage($imageLocation);
            $fileUpdated = $imageLocation;

        }

        $update = $category->update();

        if($update){
            return $this->response(['msg' => 'Dados alterados com sucesso!', 'file_updated' => $fileUpdated], 200);
        }else{
            return $this->response('Não foi possível alterar os dados!', 422);
        }

    }

    /**
     * Deleta a imagem da categoria
     *
     * @param any $image
     * @return void
     */
    private function delete_image($image){
        if(!empty($image))
            $this->storage->delete($image);
    }

}
