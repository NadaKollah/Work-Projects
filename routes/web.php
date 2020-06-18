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

Route::get('/', function () {
    return view('tasks');
});

Route::group(['prefix'=>'/',  'middleware'=> ['auth'] ], function () {
    Route::get('/tasks', 'TaskController@index')->name('tasks.index');
    Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');
    Route::get('/tasks/edit/{id}', 'TaskController@edit')->name('tasks.edit');
    Route::post('/tasks/update/{id}', 'TaskController@update')->name('tasks.update');
    Route::post('/tasks/destroy/{id}', 'TaskController@destroy')->name('tasks.destroy');
    Route::post('/task', 'TaskController@store')->name('tasks.store');
    Route::delete('/task/{task}', 'TaskController@destroy');
});

Auth::routes();

Route::get('/home', 'TaskController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
