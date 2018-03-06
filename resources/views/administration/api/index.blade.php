@extends('layouts.template')

@section('content')
    <section id="Gerenciar tokens" ng-controller="settingsController">
        <h2>Gereniar aplicações</h2>

        <div class="table-responsive">
            <table class="table table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Token</th>
                    <th>Ações</th>
                </tr>
                <tr ng-if="clients.length == 0">
                    <td colspan="4" class="text-center">Nenhum registro encontrado.</td>
                </tr>
                <tr class="ng-cloak" ng-repeat="client in clients track by $index">
                    <td><% client.name %></td>
                    <td>
                        <textarea class="form-control"><% client.token %></textarea>
                    </td>
                    <td style="width: 200px;">
                       <button class="btn btn-danger" ng-if="!client.startDelete" ng-click="changeDelete($event, $index, true)">Deletar</button> 
                       <button class="btn btn-danger" ng-if="client.startDelete" ng-click="delete($event, client.id, $index)">Confirmar</button> 
                       <button class="btn btn-default"ng-if="client.startDelete"ng-click="changeDelete($event, $index, false)">Cancelar</button> 
                    </td>
                </tr>
            </table>
        </div>

        <div class="new-client">
            <h3>Novo cliente de aplicação</h3>
            <div class="form-group" ng-if="success || error">
                <div class="alert" ng-if="msg.email.length > 0" ng-repeat="emailerror in msg.email" ng-class="{'alert-success': success, 'alert-danger': error}"><% emailerror %></div>
            </div>
            <form action="" ng-submit="create($event, client);" name="clientForm">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nome do cliente" ng-model="client.name" class="form-control" required>
                    <div style="display:block;width:100%;" class="ng-cloak" ng-if="clientForm.name.$touched && clientForm.name.$invalid">
                        <div class="alert alert-danger" ng-show="clientForm.name.$error.required">Digite o nome</div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="E-mail do cliente" ng-model="client.email" class="form-control" required>
                    <div style="display:block;width:100%;" class="ng-cloak" ng-if="clientForm.email.$touched && clientForm.email.$invalid">
                        <div class="alert alert-danger" ng-show="clientForm.email.$error.required">Digite o e-mail</div>
                        <div class="alert alert-danger" ng-show="clientForm.email.$error.email">E-mail inválido</div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Senha do cliente" ng-model="client.password" class="form-control" required>
                    <div style="display:block;width:100%;" class="ng-cloak" ng-if="clientForm.password.$touched && clientForm.password.$invalid">
                        <div class="alert alert-danger" ng-show="clientForm.password.$error.required">Informe uma senha</div>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" disabled ng-disabled="clientForm.$invalid">Cadastrar</button>
                </div>
            </form>
        </div>

    </section>

@endsection