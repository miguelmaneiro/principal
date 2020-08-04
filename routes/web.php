<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/mantenimiento', 'HomeController@almacen')->name('mantenimiento');

Route::resource('categorias', 'CategoriaController')
->names('categorias');
Route::resource('articulos', 'ArticuloController')->names('articulos');

Route::resource('clientes', 'ClienteController')->names('clientes');

Route::resource('proveedores', 'ProveedorController')->names('proveedores')->parameters(['proveedores'=>'proveedor']);

Route::resource('ingresos', 'IngresoController')->names('ingresos');

Route::resource('ventas', 'VentaController')->names('ventas'); 

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

