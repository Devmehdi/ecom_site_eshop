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

Route::get('Categorie','App\Http\Controllers\api\CategoryController@getallcategorie');
Route::get('product','App\Http\Controllers\ProductController@allproduct');
Route::get('comment','App\Http\Controllers\CommentController@getcommentbypost');
Route::get('filterproduct','App\Http\Controllers\ProductController@filterproduct');
Route::get('precommande/panel','App\Http\Controllers\ProductController@getpanels');
Route::get('precommande/count','App\Http\Controllers\ProductController@getcounts');