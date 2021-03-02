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

    $data=[];
    $data['name']='rawan';
    $data['age']=5;
    return view('welcome',$data);

//    return view('welcome')->with(['name'=>'rawan',"age"=>'30']);
});

Route::get('template',function (){
    return view('landing');
});
Route::get('about',function (){
    return view('aboutus');
});
Route::get('index','UserController@getIndex');

Route::namespace('Front')->group(function(){
//all route only access controller or methods in folder name Fronts
    Route::get('users','UserController@showUserName');
});

//this is first way

//Route::prefix('users')->group(function(){
//    Route::get('/',function (){
//        return 'Hello Prefix group';
//    });
//
//    Route::get('edit','UserController@showUserName');
//    Route::delete('delete','UserController@showUserName');
//    Route::put('update','UserController@showUserName');
//});


//this is second way
Route::group(['prefix'=>'users','middleware'],function (){
    Route::get('/',function (){
        return 'Hello Prefix group';
    });

    Route::get('edit','UserController@showUserName');
//    Route::delete('delete','UserController@showUserName');
//    Route::put('update','UserController@showUserName');
});


Route::get('check',function (){
 return "midelware";
})->middleware('auth');

Route::group(['namespace'=>'Admin'],function(){
    Route::get('second','SecondController@showString0');
    Route::get('second1','SecondController@showString1');
    Route::get('second2','SecondController@showString2');
    Route::get('second3','SecondController@showString3');
});

Route::get('login',function (){
   Return ' Must Be Login To access This Route';
})->name('login');

Route::resource('news','NewsController');

//Route::get('news','NewsController@index');
//Route::post('news','NewsController@store');
//Route::get('news/create',"NewsController@create");
//Route::get('news/{id}/edit',"NewsController@edit");
//Route::post('update/{id}',"NewsController@update");
//Route::delete('news/{id}',"NewsController@delete");


Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
