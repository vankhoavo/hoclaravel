<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    // return view('home');
    return view('welcome');
});

Route::get('/unicode', function(){
    return view('home');
    // $user = new User();
    // $allUser = $user::all();
    // dd($allUser);
});

Route::get('/san-pham', function(){
    return view('product');
});
