<?php
Route::get('/productos', 'ProductoController@index');
Route::get('/productos/detalles/{id}', 'ProductoController@detalle');



//Route::get('/productos', 'ProductoController@show');

//para el admin
Route::get('/productos/agregar', 'ProductoController@createProduct')->middleware(['auth', 'admin']);
Route::post('/productos', 'ProductoController@save')->middleware(['auth', 'admin']);

Route::get('/productos/editar/{id}', 'ProductoController@edit')->middleware(['auth', 'admin']);
Route::post('/productos/editar/{id}', 'ProductoController@update')->middleware(['auth', 'admin']);

Route::get('/productos/delete/{id}', 'ProductoController@borrarProducto')->middleware(['auth', 'admin']);
Route::post('/productos/delete/{id}', 'ProductoController@borrar')->middleware(['auth', 'admin']);

Route::get('/carrito', 'CarritoController@index')->middleware('auth');
Route::get('/carrito', 'CarritoController@miCarrito')->middleware('auth');

Route::post('/productos/agregarCarrito', 'CarritoController@agregarAlCarrito')->middleware('auth');

Route::post('/carrito/sacarCarrito', 'CarritoController@sacarDelCarrito')->middleware('auth');

Route::get('/', 'PrincipalController@index');
Route::get('/', 'PrincipalController@productosDestacados');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/preguntas', function(){
  return view('faqs');
});

Route::get('/login/facebook', 'Auth\LoginController@redirectToProviderFB');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleProviderCallbackFB');
