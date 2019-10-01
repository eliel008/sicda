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

Route::get('users/{id}/edit', [
    'uses' =>   'UserController@edit',
    'as' => 'users.edit'
    ]);

Route::get('users/{id}', [
    'uses' =>   'UserController@show',
    'as' => 'users.show'
    ]);

Route::get('users/{user}', [
     'uses' =>   'UserController@update',
     'as' => 'users.update'
    ]);

Route::get('users/{id}/destroy', [
    'uses' =>   'UserController@destroy',
    'as' => 'users.destroy'
]);

/* Rutas del Administrador

Route::group(['prefix' => 'admin'], function () {  // Dirigidas por admin
    
    Route::resource('users','UserController');
}); 

Route::get('users', 'UserController');*/


/*  
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/index', 'UserController@index')->name('users.index');
Route::post('/users/create', 'UserController@create')->name('users.create');
Route::put('/users/{id}/update', 'UserController@update')->name('users.update');
Route::delete('/users/{id}/destroy', 'UserController@destroy')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

*/
