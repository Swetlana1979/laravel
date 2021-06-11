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
Route::get('/cancell', 'App\Http\Controllers\CommentsController@cancell')->name('add-comments-cancel');
Route::get('index/','App\Http\Controllers\CommentsController@index')->name('user-comments');
Route::get('user/{id_user}','App\Http\Controllers\CommentsController@index_user')->name('user-comments-id');
Route::get('reply/{parent_id}/{user_id}','App\Http\Controllers\CommentsController@replyToComment')->name('reply-to-comment');
Route::post('reply/','App\Http\Controllers\CommentsController@commentAdd')->name('comments-add');
Route::get('update/{id}/{description}/{user_id}/{parent_id}','App\Http\Controllers\CommentsController@editComment')->name('edit-comment');
Route::post('update/','App\Http\Controllers\CommentsController@editAdd')->name('edit-add');
//Route::get('update/{id}','App\Http\Controllers\CommentsController@update')->name('user-comments-update');
Route::get('del/{id}/{user_id}','App\Http\Controllers\CommentsController@delete')->name('comments-delete');
Route::post('/insert','App\Http\Controllers\CommentsController@insert')->name('comments-insert');

//Route::resource('user', 'CommentsController');
