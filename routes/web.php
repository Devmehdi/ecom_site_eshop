<?php

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

//Route::get('/', function () {
 //   return view('welcome');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/index','App\Http\Controllers\HomeController@index2')->name('index');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::post('/register/CreateAccount','App\Http\Controllers\DashController@createAccount');
route::get('/','App\Http\Controllers\HomeController@index');
route::get('/index','App\Http\Controllers\HomeController@index2')->name('index');


Route::get('/contact','App\Http\Controllers\ContactController@getcontact');


//Route::get('/login','App\Http\Controllers\DashController@login');
//Route::get('/register','App\Http\Controllers\DashController@register');
//Route::post('/checkLogin','App\Http\Controllers\DashController@Checklogin');

Route::get('/create','App\Http\Controllers\ProductController@createblog');
Route::post('/createpost','App\Http\Controllers\ProductController@createpost');
Route::get('post/details/{id}','App\Http\Controllers\CommentController@browssePost')->name('post.details');
Route::get('/shopgrid','App\Http\Controllers\ProductController@shopgrid');
Route::get('/checkout','App\Http\Controllers\ProductController@checkout');
route::get('/cart','App\Http\Controllers\ProductController@cart');
Route::post('/addtocart','App\Http\Controllers\ProductController@addtocart');
Route::get('/products','App\Http\Controllers\ProductController@getviewproduct');

Route::get('/api/getuser','App\Http\Controllers\HomeController@getuser');

Route::post('/AddComment','App\Http\Controllers\CommentController@AddComment');
Route::get('allposts','App\Http\Controllers\CommentController@Getpost')->middleware('auth');
Route::get('precommande/panel','App\Http\Controllers\ProductController@getpanels');
route::view('/me','welcome');
Route::post('filterproduct','App\Http\Controllers\ProductController@filterproduct');
Route::delete('panel/product/{id}','App\Http\Controllers\ProductController@destroy');
Route::get('/getviewproduct','App\Http\Controllers\ProductController@getviewproduct');

