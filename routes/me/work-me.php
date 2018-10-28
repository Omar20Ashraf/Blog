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

// Route::pattern('id','[0-9]+');
// route::pattern('username','[A-Za-z]+');

Route::get('/', function () {
    return view('welcome');
});
// Route::any('test',function(){
// 	return 'WELCOME TO ANY link = '.request('foo');
// });

// Route::get('user/{id?}/{username?}',function($id=null,$username=null){
// 	return 'Welcome to user page,user id = ' . $id .' ,and username = '. $username ;
// });

//pattern for regular Expresion
// ->where('id','[0-9A-Za-z]+');

// Route::get('test',function(){
// 	return 
// 	'<form method="post">
// 			<input type="hidden" name="_token" value="'.csrf_token().'"/>
// 			<input type="text" name="foo" />
// 			<input type="submit" value="send" />
// 			<input type="hidden" name="_method" value="delete"/>
// 	</form>';

// });

// Route::resource('users','users');

// Route::post('test',function(){
// 	return 'WELCOME TO any LINK = '.request('foo');
// });

Route::get('test','newsController@test');

Route::post('test/1',function(){
	return 'Welcome to test';
});

Route::get('/tasks', function () {

	$tasks=DB::table('tasks')->get();

	//dd($tasks);

    return view('tasks.data', compact('tasks'));
});

Route::get('/tasks/{id}', function ($id) {

	$tasks=DB::table('tasks')->find($id);

	//dd($tasks);

    return view('tasks.show', compact('tasks'));
});
