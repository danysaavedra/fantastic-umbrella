<?php

use App\Http\Controllers\juegosController;
use App\Http\Controllers\pageController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('admin/eliminar/{id}', 'pageController@eliminar');
Route::post('admin/converter/{id}', 'pageController@converter');
Route::post('admin', 'pageController@admin');
Route::get('admin', 'pageController@admin');

Route::resource('juegos', 'juegosController')->name('index', 'juegos');

Route::resource('juegos/{juego}/quiz', 'quizController');


Route::delete('logros/delete', 'LogrosController@destroy');


Route::post('buscador', 'juegosController@index');
Route::get('buscador', 'juegosController@index');

Route::get('jugar/{id}', 'juegosController@jugar');

Route::post('jugar/{id}/pregunta/{pregId}', 'juegosController@nextPregunta');


Route::get('jugar/{id}/pregunta/{pregId}', 'juegosController@getPregunta');

Route::get('contacto', 'pageController@contacto')->name('contacto');

Route::post('contacto', 'pageController@sendMail');

Route::get('faqs', 'pageController@faqs')->name('faqs');

Route::get('top', 'pageController@top')->name('top_ten');

Route::get('profile', 'pageController@edit')->name('profile')->middleware('auth');
Route::post('profile/eliminar/{id}', 'pageController@delete');
Route::patch('profile', 'pageController@update')->middleware('auth');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/redirect/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('login/callback/{provider}', 'SocialAuthController@handleProviderCallback');
