<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('conversations', 'ConversationController@index');
Route::post('contacts', 'ConversationController@getContacts');
Route::get('conversations/{user_id}', 'ConversationController@index');
Route::post('conversations/message', 'MessageController@sendMessage');
Route::get('conversations/{conversation_id}/messages', 'MessageController@show');
Route::get('conversations/{conversation_id}/clear-messages/{user_id}', 'ConversationController@clearNewMessages');
