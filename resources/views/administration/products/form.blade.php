@extends('layouts.template')

@section('content')
    <form action="" ng-controller="productsController"
          @if(isset($edit))
            ng-init="product.id = '{{ $edit->id }}'"
          @endif
          ng-submit="create($event, product)"
          method="post"
          novalidate
          name="productForm" enctype="multipart/form-data">

        @if(isset($edit))
            <h2>Editando produto</h2>
        @else
            <h2>Cadastro de produtos</h2>
        @endif

        <div class="form-group ng-cloak" ng-if="success || error">
            <div class="alert" ng-class="{'alert-success': success, 'alert-danger': error}"><% msg %></div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" ng-model="product.name"
                   @if(isset($edit))
                   ng-init="product.name = '{{ $edit->name }}'"
                   @endif name="name"
                   placeholder="Nome do produto" required>
            <div style="display:block;width:100%;" class="ng-cloak" ng-if="productForm.name.$touched && productForm.name.$invalid">
                <div class="alert alert-danger" ng-show="productForm.name.$error.required">O nome do produto é
                    obrigatório.
                </div>
            </div>
        </div>

        <div class="form-group">
            <ui-select name="categories" required multiple ng-model="product.categories"
                @if(isset($edit))
                    ng-init="product.categories = {{ $edit->categories }}"
                @endif
                sortable="true" close-on-select="true" style="width: 800px;">
                <ui-select-match  placeholder="Comece a digitar o nome da categoria..."><span class="ng-cloak"><% $item.name %></span></ui-select-match>
                <ui-select-choices refresh="refreshCategories($select.search)" refresh-delay="1" minimum-input-length="1"
                        repeat="category in categories | propsFilter: {name: $select.search}">
                    <!-- <div class="ng-cloak" ng-bind-html="category.name | highlight: $select.search"></div> -->
                    <small class="ng-cloak">
                        <img style="max-width: 90px;" ng-src="/<% category.image %>">
                        <% category.name %>
                    </small>
                </ui-select-choices>
            </ui-select>
            <div style="display:block;width:100%;" class="ng-cloak"
                 ng-if="productForm.categories.$touched && productForm.categories.$invalid">
                <div class="alert alert-danger" >
                    Informe pelo menos uma categoria
                </div>
            </div>
        </div>

        <div class="form-group">
            <textarea type="text" class="form-control" ng-model="product.description"
                      @if(isset($edit))
                      ng-init="product.description = '{{ $edit->description }}'"
                      @endif
                      name="description"
                      placeholder="Descrição do produto" required></textarea>
            <div style="display:block;width:100%;" class="ng-cloak"
                 ng-if="productForm.description.$touched && productForm.description.$invalid">
                <div class="alert alert-danger" ng-show="productForm.description.$error.required">
                    A descrição do produto é obrigatória
                </div>
            </div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" ng-model="product.price"
                   @if(isset($edit))
                        ng-init="product.price = '{{ $edit->price }}'"
                   @endif name="price"
                   ui-money-mask="2"
                   placeholder="Preço do produto" required>
            <div style="display:block;width:100%;" class="ng-cloak" ng-if="productForm.price.$touched && productForm.price.$invalid">
                <div class="alert alert-danger" ng-show="productForm.price.$error.required">O preço do produto é
                    obrigatório.
                </div>
            </div>
        </div>

        <div class="form-group">
            <button onclick="$('.file').trigger('click');return false;">Selecionar imagem</button>
            <input type="file" multiple class="file hidden" name="file[]" required file-model="product.file">
        </div>

        <div style="display:block;width:100%;float:left" ng-if="fileread.length > 0">
            <h4>Imagens selecionadas</h4>

            <div class="col-xs-6 col-md-3 ng-cloak" ng-repeat="file in fileread" >
                <div class="thumbnail">
                    <span class="fas fa-times" ng-click="deleteImageFront($event, file)"></span>
                    <img ng-src="<% file %>" class="img-responsive">
                </div>
            </div>
        </div>

        <div style="display:block;width:100%;float:left">
            @if(isset($edit) && !empty($edit->images))
                <h4>Visualização da imagem</h4>
                @foreach($edit->images as $image)
                    <div class="col-xs-6 col-md-3" id="{{$image->id}}">
                        <div class="thumbnail">
                            <span class="fas fa-times"  ng-click="deleteImage($event, product, {{$image->id}})"></span>
                            <img src="{{$image->image}}" class="img-responsive">
                        </div>
                    </div>
                @endforeach
                    <div class="col-xs-6 col-md-3 ng-cloak" ng-repeat="image in imagesUploaded" id="<% image.id %>" >
                        <div class="thumbnail">
                            <span class="fas fa-times" ng-click="deleteImage($event, product, image.id)"></span>
                            <img ng-src="<% image.image %>" class="img-responsive">
                        </div>
                    </div>
            @endif
        </div>
    

        <div class="form-group">

            @if(isset($edit))
                <button class="btn btn-success" ng-disabled="productForm.$invalid">Editar
                </button>
            @else
                <button class="btn btn-success" disabled ng-disabled="productForm.$invalid || product.file.length == 0" >Cadastrar
                </button>
            @endif

        </div>

    </form>
    

@endsection