    </<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Produtos</title>
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <base href="/">
            <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" media="screen" href="/css/app.css" />
        </head>
        <body ng-app="desafioLaravel">

        <!-- NavBar -->
            <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Desafio Laravel</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav" style="max-width: 850px;">
                <li><a href="#"><i class="fas fa-certificate"></i> Todos os produtos</a></li>
                @foreach($menuCategories as $categories)
                  <li id="{{$categories->id}}"><a href="/category/{{$categories->id}}"><i class="fas fa-caret-right"></i> {{$categories->name}}</a></li>
                @endforeach
                  <li class="ng-cloak" ng-repeat="category in newCategories"><a href="/category/<% category.id %>"><i class="fas fa-caret-right"></i> <% category.name %></a></li>
              </ul>
             
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administração <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><h4 class="title-menu">Produtos</h4></li>
                    <li><a href="/administration/products/create">Novo</a></li>
                      <li role="separator" class="divider"></li>
                      <li><h4 class="title-menu">Categorias</h4></li>
                      <li><a href="/administration/categories/create">Novo</a></li>
                      <li><a href="/administration/categories/list">Listar</a></li>
                      <li role="separator" class="divider"></li>
                      <li><h4 class="title-menu">Api</h4></li>
                      <li><a href="/administration/settings">Gerenciar aplicações</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        <!-- Content -->
        <section class="container style-container">
          @yield('content')
        </section>

        <div class="loading ng-cloak" ng-if="loading_el">
          <div class="box-loading">
              <div class="fa-3x">
                  <i class="fas fa-spinner fa-pulse"></i>
              </div>
              <span>Carregando...</span>
          </div>
        </div>

        <script type="text/javascript" src="/js/vendor.js"></script>
        <script type="text/javascript" src="/js/app.js"></script>

      </body>
    </html>