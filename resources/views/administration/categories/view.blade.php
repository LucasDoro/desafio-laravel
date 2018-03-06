@extends('layouts.template')

@section('content')
    <section id="categories" ng-controller="categoriesController">
        <h2>Categorias</h2>

        <div class="search" style="margin-bottom:20px;">
            <input type="name" ng-model="search" placeholder="Busque pelo nome da categoria" class="form-control">
        </div>
        <div class="table-responsive" ng-init="list()">
            <table class="table table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
                <tr ng-if="categories.length == 0">
                    <td colspan="4" class="text-center">Nenhum registro encontrado, cadastre a primeira categoria <a href="/administration/categories/create">clicando aqui</a></td>
                </tr>
                <tr ng-repeat="category in categories  | filter: search ">
                    <td>
                        <span ng-if="!category.edit_action" ng-bind="category.name"></span>
                        <input ng-if="category.edit_action" type="text" ng-model="category.name" class="form-control">
                    </td>
                    <td>
                       <img ng-src="<% category.image %>" style="max-width:100px;" class="img-responsive">
                    </td>
                    <td>
                        <a href="/administration/categories/edit/<% category.id %>" ng-if="!category.delete_action"  class="btn btn-primary">Alterar</a>

                        <button class="btn btn-danger" ng-if="!category.delete_action" ng-click="chooseDelete($event, true, category.id)">Deletar</button>
                        <div ng-if="category.delete_action">
                            <button class="btn btn-danger" ng-if="category.delete_action" ng-click="delete($event, category.id)">Confirmar</button>
                            <button class="btn btn-default" ng-if="category.delete_action" ng-click="chooseDelete($event, false, category.id)">Cancelar</button>
                        </div>

                    </td>
                </tr>
            </table>
        </div>

    </section>

@endsection