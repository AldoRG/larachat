<?php

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

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
DB::listen(function ($query){
    Log::info($query->sql);
});

Route::get('/test', function (){
    dd(User::with('chats')->find(1));
    dd(\App\User::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/chat', function () {
    return view('chat.chat');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
