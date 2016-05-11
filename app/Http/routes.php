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

Route::get('/', function () {
    return view('home');
});

Route::get('login', [ 'as' => 'login' , 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login', [ 'as' => 'signin' , 'uses' => 'Auth\AuthController@postLogin']);
Route::get('signup', ['as' => 'signup', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('signup', [ 'as' => 'register' , 'uses' => 'Auth\AuthController@postRegister']);
Route::get('logout', [ 'as' => 'logout' , 'uses' => 'Auth\AuthController@logout']);

Route::get('trash', [ 'as' => 'trash.list' , 'uses' => 'ArticleController@getTrash']);
Route::get('restore/{articles}', [ 'as' => 'articles.restore' , 'uses' => 'ArticleController@restoreArticle']);

Route::get('my-articles', [ 'as' => 'my-articles' , 'uses' => 'ArticleController@userArticles']);
Route::resource('articles', 'ArticleController');

Route::resource('articles-grid', 'ArticleController@gridView');

Route::post('atrical-view-mode', 'ArticleController@viewMode');


