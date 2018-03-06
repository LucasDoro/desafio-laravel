<?php

use function foo\func;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ProductsController@index');
Route::get('/category/{categoryId?}', 'ProductsController@index');


// Administrations
Route::group(['prefix' => 'administration'], function(){

    // Rotas de controle das categorias
    Route::group(['prefix' => 'categories'], function (){
        Route::get('create', 'CategoriesController@createView');
        Route::get('list', 'CategoriesController@listView');
        Route::get('edit/{id}', 'CategoriesController@editView');
        Route::get('search/{name}', 'CategoriesController@searchByName');
        Route::get('list-all', 'CategoriesController@getAll');

        Route::post('create', 'CategoriesController@save');
        Route::post('edit', 'CategoriesController@edit');
        Route::delete('delete/{id}', 'CategoriesController@delete');
    });

    // Grupo de rotas dos produtos
    Route::group(['prefix' => 'products'], function (){

        Route::get('create', 'ProductsController@createView');
        Route::get('edit/{id}', 'ProductsController@editView');
        Route::get('list/{categoryId?}', 'ProductsController@productsByCategories');

        Route::post('create', 'ProductsController@save');
        Route::post('edit', 'ProductsController@edit');

        Route::delete('delete/{id}', 'ProductsController@delete');
        Route::delete('delimage/{idProduct}/{idImage}', 'ProductsController@deleteImage');
    });

    Route::group(['prefix' => 'settings'], function(){
        Route::get('/', 'SettingsController@index');
        Route::get('list', 'SettingsController@listClients');

        Route::post('create', 'SettingsController@create');

        Route::delete('delete/{id}', 'SettingsController@delete');
    });

});


