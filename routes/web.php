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
Route::get('/test',function(){
	return App\User::find(1)->profile;
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){	
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/posts', ['uses'=>'PostsController@index', 'as'=>'posts']);
	Route::get('/post/create', ['uses'=>'PostsController@create', 'as'=>'post.create']);
	Route::post('/post/store',['uses'=>'PostsController@store', 'as'=>'post.store']);
	Route::get('/post/edit/{id}',['uses'=>'PostsController@edit','as'=>'post.edit']);
	Route::post('/post/update/{id}',['uses'=>'PostsController@update','as'=>'post.update']);
	Route::get('/post/trashed', ['uses'=>'PostsController@trashed', 'as'=>'post.trashed']);
	Route::get('/post/destroy/{id}',['uses'=>'PostsController@destroy', 'as'=>'post.destroy']);
	Route::get('/post/remove/{id}',['uses'=>'PostsController@remove', 'as'=>'post.remove']);
	Route::get('/post/restore/{id}',['uses'=>'PostsController@restore', 'as'=>'post.restore']);

	Route::get('/categories',['uses'=>'CategoriesController@index','as'=>'categories']);
	Route::get('/category/create',['uses'=>'CategoriesController@create', 'as'=>'category.create']);
	Route::post('/category/store',['uses'=>'CategoriesController@store', 'as'=>'category.store']);
	Route::get('/category/edit/{id}',['uses'=>'CategoriesController@edit', 'as'=>'category.edit']);
	Route::post('/category/update/{id}',['uses'=>'CategoriesController@update', 'as'=>'category.update']);
	Route::get('/category/destroy/{id}',['uses'=>'CategoriesController@destroy', 'as'=>'category.destroy']);

	Route::get('/tags',['uses'=>'TagsController@index','as'=>'tags']);
	Route::get('/tag/create',['uses'=>'TagsController@create', 'as'=>'tag.create']);
	Route::post('/tag/store',['uses'=>'TagsController@store', 'as'=>'tag.store']);
	Route::get('/tag/edit/{id}',['uses'=>'TagsController@edit', 'as'=>'tag.edit']);
	Route::post('/tag/update/{id}',['uses'=>'TagsController@update', 'as'=>'tag.update']);
	Route::get('/tag/destroy/{id}',['uses'=>'TagsController@destroy', 'as'=>'tag.destroy']);

	// Route::group(['middleware'=>'admin'], function(){	
		Route::get('/users',['uses'=>'UsersController@index', 'as'=>'users']);
		Route::get('/user/create',['uses'=>'UsersController@create', 'as'=>'user.create']);
		Route::post('/user/store',['uses'=>'UsersController@store', 'as'=>'user.store']);
		Route::get('/user/makeadmin/{id}',['uses'=>'UsersController@makeadmin', 'as'=>'user.makeadmin']);
		Route::get('/user/removeadmin/{id}',['uses'=>'UsersController@removeadmin', 'as'=>'user.removeadmin']);
	// });
});
