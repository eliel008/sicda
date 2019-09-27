<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users','UserController');

/* Rutas del Administrador

Route::group(['prefix' => 'admin'], function () {  // Dirigidas por admin
    
    Route::resource('users','UserController');
}); 

Route::get('users', 'UserController');*/

Route::get('users/{id}/edit', [
    'uses' =>   'UserController@edit',
    'as' => 'users.edit'
    ]);

Route::get('users/{id}/destroy', [
    'uses' =>   'UserController@destroy',
    'as' => 'users.destroy'
]);