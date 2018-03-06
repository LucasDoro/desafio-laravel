@extends('layouts.template')

@section('content')
    <form action="" ng-controller="categoriesController"
          @if(isset($edit))
            ng-submit="edit($event, category, '{{$edit->id}}')"
          @else
            ng-submit="create($event, category)"
          @endif
          method="post"
          novalidate
          name="categoryForm" enctype="multipart/form-data">

        @if(isset($edit))
            <h2>Editando categoria</h2>
        @else
            <h2>Cadastro de categorias</h2>
        @endif

        <div class="form-group" ng-if="success || error">
            <div class="alert" ng-class="{'alert-success': success, 'alert-danger': error}"><% msg %></div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" ng-model="category.name"
                   @if(isset($edit))
                   ng-init="category.name = '{{ $edit->name }}'"
                   @endif name="name"
                   placeholder="Nome da categoria" required>
            <div style="display:block;width:100%;" ng-if="categoryForm.name.$touched && categoryForm.name.$invalid">
                <div class="alert alert-danger" ng-show="categoryForm.name.$error.required">O nome da categoria é
                    obrigatório.
                </div>
            </div>
        </div>

        <div class="form-group">
            <button onclick="$('.file').trigger('click');return false;">Selecionar imagem</button>
            <input type="file" class="file hidden" name="file" required file-model="category.file">
        </div>

        <div ng-if="fileread != null" style="display:block;width:100%;float:left">
            <h4>Imagen selecionada</h4>

            <div class="col-xs-6 col-md-3 ng-cloak" >
                <div class="thumbnail">
                    <span class="fas fa-times" ng-click="deleteImage()"></span>
                    <img ng-src="<% fileread %>" class="img-responsive">
                </div>
            </div>
        </div>

        @if(isset($edit) && !empty($edit->image))
            <h4>Visualização da imagem</h4>
            <div class="row">
                <div class="col-xs-12 col-md-12 ng-cloak" >
                    <div class="thumbnail">
                        <img src="/{{$edit->image}}" class="image-uploaded image-responsive">
                    </div>
                </div>
            </div>
        @endif

        <div class="form-group">

            @if(isset($edit))
                <button class="btn btn-success" ng-disabled="categoryForm.$invalid">Editar
                </button>
            @else
                <button class="btn btn-success" ng-disabled="categoryForm.$invalid || category.file == null">Cadastrar
                </button>
            @endif

        </div>

    </form>
@endsection