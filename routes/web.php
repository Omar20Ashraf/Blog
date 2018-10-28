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

Route::pattern('id','[0-9]+');
Route::get('/', function () {
    return view('welcome');
});


// Route::get('all','NewsController@all');

// Route::post('insert','NewsController@insert');

// Route::post('insert/news1','NewsController@insert_news');

// Route::delete('del/news/{id?}','NewsController@delete');
//////////////////////////////////////////////////////////////////////


// Route::get('t','tryController@all');
// Route::post('form','tryController@insert_data');
// Route::DELETE('del/try/{id?}','tryController@delete');

////////////////////////////////////////////////////////////////////


Route::get('index','PagesController@index')->name('index');
//pages
Route::get('index/about','PagesController@about')->name('aboutpage');
Route::get('index/contact','PagesController@contact')->name('contactpage');
Route::post('index/dosend','PagesController@dosend')->name('dosend');

//posts
Route::resource('posts','PostsController'); 

//comments
Route::post('/index/comments/{slug}','CommentsController@store')
		->name('comment.store');

//tags
// Route::resource('tags','TagsController')->only(['show']);
Route::resource('tags','TagsController',['only'=>['show']]);
 		
//Auth
Auth::routes();

Route::get('user/verify/{token}','Auth\RegisterController@verifyEmail');

Route::get('/home', 'HomeController@index')->name('home');
