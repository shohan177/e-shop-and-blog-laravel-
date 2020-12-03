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

// Route::get('/', function () {
//     return view('frontend.home');
// });
// Route::get('/blog', function () {
//     return view('frontend.blog');
// });

// Route::get('/single-blog', function () {
//     return view('frontend.blog-single');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//category route
Route::resource('post-catagory', 'App\Http\Controllers\catagoryController');
Route::post('/catagory-create', 'App\Http\Controllers\catagoryController@store');
Route::get('/catagory-all', 'App\Http\Controllers\catagoryController@showAll');
Route::get('/catagory-unpublished', 'App\Http\Controllers\catagoryController@unpublished');
Route::get('/catagory-published', 'App\Http\Controllers\catagoryController@published');
Route::get('/catagory-delete', 'App\Http\Controllers\catagoryController@destroy');
Route::get('/catagory-edit/{id}', 'App\Http\Controllers\catagoryController@edit');
Route::get('/catagory-update', 'App\Http\Controllers\catagoryController@update');

// Tags route
Route::post('/tag-create', 'App\Http\Controllers\tagController@store');
Route::get('/tag-all', 'App\Http\Controllers\tagController@showAll');
Route::get('/tag-status/{id}/{action}', 'App\Http\Controllers\tagController@active');
Route::get('/tag-delete/{id}', 'App\Http\Controllers\tagController@destroy');
Route::get('/tag-edit/{id}', 'App\Http\Controllers\tagController@edit');
Route::get('/tag-update', 'App\Http\Controllers\tagController@update');


//post route
Route::resource('post', 'App\Http\Controllers\postController');
Route::get('/post-edit/{id}', 'App\Http\Controllers\postController@edit');
Route::get('/post-delete/{id}', 'App\Http\Controllers\postController@destroy');
Route::get('/post-deactive', 'App\Http\Controllers\postController@destroy');
Route::get('/post-deactive/{id}/{action}', 'App\Http\Controllers\postController@status');


//frontend url
Route::get('/', 'App\Http\Controllers\frontendController@homePage');
Route::get('/blog', 'App\Http\Controllers\frontendController@blog');
Route::get('/blog-single', 'App\Http\Controllers\frontendController@blog_single');



