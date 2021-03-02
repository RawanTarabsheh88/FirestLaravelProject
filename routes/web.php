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