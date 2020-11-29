<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/todos/create', 'App\Http\Controllers\TodoController@create')->name('todos.create');
Route::post('/todos/store', 'App\Http\Controllers\TodoController@store');

Route::get('/todos', 'App\Http\Controllers\TodoController@index')->name('todos.index');

Route::get('/todos/edit/{todo}', 'App\Http\Controllers\TodoController@edit')->name('todos.edit');
Route::patch('/todos/update/{todo}', 'App\Http\Controllers\TodoController@update')->name('todos.update');
Route::patch('/todos/completed/{todo}', 'App\Http\Controllers\TodoController@completed')->name('todos.completed');

Route::delete('/todos/delete/{todo}', 'App\Http\Controllers\TodoController@delete')->name('todos.delete');
