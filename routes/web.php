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

Route::get('/', 'BlogController@index'); 
// Route::get('/konten' , function(){
// 	return view('blog.konten');
// });
Route::get('/konten/{slug}', 'BlogController@konten')->name('blog.konten');

Auth::routes();

Route::group(['middleware' => 'auth'] , function(){
	Route::get('/admin', 'HomeController@index')->name('home.index');
	Route::resource('/category','CategoryController');
	Route::resource('tag','TagController'); 

	Route::get('post/show_delete','PostController@show_delete')->name('post.show_delete');
	Route::get('post/restore/{id}','PostController@restore')->name('post.restore');
	Route::delete('post/kill/{id}','PostController@kill')->name('post.kill');
	Route::resource('post','PostController');
	Route::resource('user','UserController');
});





