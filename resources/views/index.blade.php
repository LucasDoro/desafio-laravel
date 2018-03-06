@extends('layouts.template')

@section('content')
    <div class="row" ng-controller="productListController" ng-init="listProducts({{ $categoryId }})">
    
        <div class="col-xs-12 col-sm-12">
            @if(isset($categoryName) && isset($categoryImage))
                <div class="container-image">
                    <figure class="effect-image"  style="background:url('{{$categoryImage}}');background-attachment: fixed;"></figure>
                    <img src="{{$categoryImage}}" class="image-responsive">
                    <span class="title">{{ $categoryName }}</span>
                </div>
            @endif
        </div>

        <div class="search col-xs-12 col-sm-12"  style="margin-bottom:20px;">
            <input type="text" placeholder="Busque um produto por nome, categoria, descrição ou valor" name="search" class="form-control" ng-model="search">
        </div>

        <div class="col-xs-12 col-sm-12 " ng-if="products.length == 0">
            <div class="alert alert-warning ">Nenhum produto encontrado</div>
        </div>
        
        <div class="clear">
            <div class="col-sm-6 col-md-4 ng-cloak" dir-paginate="product in products | filter:search:strict | itemsPerPage: 6">
                <div class="thumbnail">
                    <img class"ng-cloak" ng-src="<% product.images[0].image %>"  ng-if="product.images[0].image != null" alt="<% product.name %>">
                    <img src="{{asset('images/no-image.jpg')}}" ng-if="product.images[0].image == null" alt="<% product.name %>">
                    <div class="caption">
                        <h3 ng-bind="product.name"></h3>
                        <h4><% product.description %></h4>
                        <p class="price" ng-bind="product.price | currency: 'R$ '"></p>
                        <a href="/administration/products/edit/<% product.id %>" style="margin-right:5px;" class="btn btn-primary">Editar</a>
                        <button class="btn btn-danger" ng-if="!product.startDelete" ng-click="startEndDelete($event, product, true)">Deletar</button>
                        <button class="btn btn-danger" ng-if="product.startDelete" ng-click="delete($event, product)">Confirmar</button>
                        <button class="btn btn-default" ng-if="product.startDelete" ng-click="startEndDelete($event, product, false)">Cancelar</button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        

        <div class="col-xs-12 col-sm-12">
            <dir-pagination-controls ></dir-pagination-controls>
        </div>
        
  </div>
@endsection 