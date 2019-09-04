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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page3/{param}/test', function ($param) {
    return view('page3', ['param' => $param]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/page2', function () {
    return view('page2');
})->middleware('auth');

Route::get('/cars', 'CarsController@index');

