<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling users name
    */
public function showUserName(){
    return 'Rawan Tarabsheh';
}
public function getIndex(){
//    $data=[];
//    $data['name']='rawan';
//    $data['age']=5;
//    return view('welcome',$data);
    $obj = new \stdClass();
    $obj -> name ="rawan";
    $obj -> id =5;
    $obj -> gender ="female";
    return view('welcome',compact('obj'));
}
}
