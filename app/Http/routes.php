<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/test', function(){
    echo "Esto es una simple prueba!!";
});

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::resource('categorias', 'CategoriaController');

Route::get('categorias/{id}/delete', [
    'as' => 'categorias.delete',
    'uses' => 'CategoriaController@destroy',
]);


Route::resource('ubicacions', 'UbicacionController');

Route::get('ubicacions/{id}/delete', [
    'as' => 'ubicacions.delete',
    'uses' => 'UbicacionController@destroy',
]);


Route::resource('muebles', 'MuebleController');

Route::get('muebles/{id}/delete', [
    'as' => 'muebles.delete',
    'uses' => 'MuebleController@destroy',
]);


Route::resource('sucursals', 'SucursalController');

Route::get('sucursals/{id}/delete', [
    'as' => 'sucursals.delete',
    'uses' => 'SucursalController@destroy',
]);


Route::resource('catalogos', 'CatalogoController');

Route::get('catalogos/{id}/delete', [
    'as' => 'catalogos.delete',
    'uses' => 'CatalogoController@destroy',
]);


Route::resource('usuarios', 'UsuarioController');

Route::get('usuarios/{id}/delete', [
    'as' => 'usuarios.delete',
    'uses' => 'UsuarioController@destroy',
]);


Route::resource('tipoUsuarios', 'TipoUsuarioController');

Route::get('tipoUsuarios/{id}/delete', [
    'as' => 'tipoUsuarios.delete',
    'uses' => 'TipoUsuarioController@destroy',
]);


Route::resource('privilegios', 'PrivilegioController');

Route::get('privilegios/{id}/delete', [
    'as' => 'privilegios.delete',
    'uses' => 'PrivilegioController@destroy',
]);
