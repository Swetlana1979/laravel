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

Route::get('/about', function () {
    return 'About page';
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\CommentsController::class, 'index'])->name('home');



Route::get('index/','App\Http\Controllers\CommentsController@index')->name('user-comments');
Route::get('index/{id}','App\Http\Controllers\CommentsController@index')->name('user-comments');
Route::get('update/{id}','App\Http\Controllers\CommentsController@update')->name('user-comments-update');
Route::get('del/{id}','App\Http\Controllers\CommentsController@delete')->name('comments-delete');
Route::post('insert/','App\Http\Controllers\CommentsController@insert')->name('comments-insert');

//Route::resource('user', 'CommentsController');
