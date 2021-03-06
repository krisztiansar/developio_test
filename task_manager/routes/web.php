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
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/tasks', 'TaskController@index')->name('tasks');
Route::get('/search_task', 'TaskController@search_task')->name('search_task');

Route::post('/save_task', 'TaskContactController@save_task')->name('save_task');

Route::get('/customers', 'CustomersController@index')->name('customers');
