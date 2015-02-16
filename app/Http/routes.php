<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::group(['prefix'=>'auth'], function(){
	Route::get('login', ['as' => 'auth.get.login', 'uses' => 'Auth\AuthController@getLogin']);
	Route::post('login', ['as' => 'auth.post.login', 'uses' => 'Auth\AuthController@postLogin']);
	Route::get('logout', ['as'=>'auth.get.logout', 'uses'=>'Auth\AuthController@getLogout']);
});


Route::group(['prefix'=>'admin', 'middleware'=>'admin'], function(){
	Route::get('dashboard', ['as' => 'admin.get.dashboard', 'uses' => 'AdminDashboardController@getDashboard']);

	Route::get('show-all', ['as'=>'admin.get.users', 'uses'=>'AdminDashboardController@showUsers']);
	Route::get('create', ['as'=>'admin.get.create.user', 'uses'=>'AdminDashboardController@getCreateUser']);
	Route::post('create', ['as'=>'admin.post.create.user', 'uses'=>'AdminDashboardController@postCreateUser']);

	Route::get('edit/{user}', ['as'=>'admin.get.edit.user', 'uses'=>'AdminDashboardController@getEditUser']);
	Route::patch('edit/{user}', ['as'=>'admin.post.edit.user', 'uses'=>'AdminDashboardController@postEditUser']);

	Route::group(['prefix'=>'category'], function(){
		Route::get('show-all', ['as'=>'admin.get.categories', 'uses'=>'CategoryController@index']);

		Route::get('create', ['as'=>'admin.get.create.category', 'uses'=>'CategoryController@create']);
		Route::post('create', ['as'=>'admin.post.create.category', 'uses'=>'CategoryController@store']);

		Route::get('edit/{category}', ['as'=>'admin.get.edit.category', 'uses'=>'CategoryController@edit'] );
		Route::patch('edit/{category}', ['as'=>'admin.post.edit.category', 'uses'=>'CategoryController@update'] );

		Route::delete('delete/{category}', ['as'=>'admin.post.delete.category', 'uses'=>'CategoryController@destroy']);
	});
	Route::resource('doc','DocumentController');

	Route::resource('role', 'RoleController');

	Route::group(['prefix'=>'pdf'], function(){
		Route::get('/', ['as'=>'admin.pdf.index', 'uses'=>'GeneratePDFController@index']);
    Route::get('/{user}/generate/{doc}', ['as' => 'admin.get.pdf.generate', 'uses'=>'GeneratePDFController@getGenerate']);
    Route::post('/{user}/generate/{doc}', ['as' => 'admin.post.pdf.generate', 'uses'=>'GeneratePDFController@postGenerate']);

    Route::get('/get/document/{doc}', ['as'=>'admin.ajax.get.document', 'uses'=>'AjaxController@getDocument']);
	});
});

Route::get('dashboard', ['as'=>'user.get.dashboard', 'uses'=>'UserController@getDashboard']);