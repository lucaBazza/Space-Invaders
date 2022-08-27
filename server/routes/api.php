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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# http://localhost/api/posts
Route::get('/posts',function(){
    return response()->json([
        'post' => [
            'title' => 'post test one'
        ]
    ]);
});

# http://localhost/api/posts
Route::get('/spaceinvaders',function(){
    return response()->json([
        'post' => [
            'title' => 'post test one'
        ]
    ]);
});