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

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){	
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/posts', ['uses'=>'PostsController@index', 'as'=>'posts']);
	Route::get('/post/trashed', ['uses'=>'PostsController@trashed', 'as'=>'post.trashed']);
	Route::get('/post/create', ['uses'=>'PostsController@create', 'as'=>'post.create']);
	Route::post('/post/store',['uses'=>'PostsController@store', 'as'=>'post.store']);
	Route::get('/post/destroy/{id}',['uses'=>'PostsController@destroy', 'as'=>'post.destroy']);
	Route::get('/post/remove/{id}',['uses'=>'PostsController@remove', 'as'=>'post.remove']);

	Route::get('categories',['uses'=>'CategoriesController@index','as'=>'categories']);
	Route::get('/category/create',['uses'=>'CategoriesController@create', 'as'=>'category.create']);
	Route::post('/category/store',['uses'=>'CategoriesController@store', 'as'=>'category.store']);
	Route::get('/category/edit/{id}',['uses'=>'CategoriesController@edit', 'as'=>'category.edit']);
	Route::post('/category/update/{id}',['uses'=>'CategoriesController@update', 'as'=>'category.update']);
	Route::get('/category/destroy/{id}',['uses'=>'CategoriesController@destroy', 'as'=>'category.destroy']);
});
