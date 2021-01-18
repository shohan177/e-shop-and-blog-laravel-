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

Route::get('/', function () {
    return view('welcome');
});
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
Route::post('/post-update', 'App\Http\Controllers\postController@postUpate') -> name('update_post');
Route::get('/post-deactive', 'App\Http\Controllers\postController@destroy');
Route::get('/post-deactive/{id}/{action}', 'App\Http\Controllers\postController@status');

//product route
Route::resource('/product', 'App\Http\Controllers\productController');
Route::resource('/product-category', 'App\Http\Controllers\ProductCatagoryTagCon');

                            //---------------
                            //frontend url
                            //--------------

// -------------------------------------------------------------------------
// blogs
Route::get('/', 'App\Http\Controllers\frontendController@homePage');
Route::get('/blog', 'App\Http\Controllers\frontendController@blog');
Route::get('/blog-single/{slug}', 'App\Http\Controllers\frontendController@blog_single') -> name('bolg_single');
Route::get('/blog-category/{slug}', 'App\Http\Controllers\frontendController@searchBlogCat') -> name('bolg_category_search');
Route::get('/blog-tag/{slug}', 'App\Http\Controllers\frontendController@searchBlogTag') -> name('bolg_tag_search');
Route::get('/blog-recent/{slug}', 'App\Http\Controllers\frontendController@recentBlog') -> name('recent_blog');

//----------------------------------------------------------------------------
//product
Route::get('/products', 'App\Http\Controllers\frontendController@productShow') -> name('products');
Route::get('/category-products-category/{slug}', 'App\Http\Controllers\frontendController@productByCategory') -> name('products-categorys');
Route::get('/products-tag/{slug}', 'App\Http\Controllers\frontendController@productBytag') -> name('products-tags');

//setting

Route::get('/settings','App\Http\Controllers\SettingcController@settingIndex') -> name('setting_index');
Route::post('/logo_update','App\Http\Controllers\SettingcController@logoUpdate') -> name('logo_update');
Route::get('/setting_all','App\Http\Controllers\SettingcController@showAll') -> name('setting_all');
Route::post('/link_update','App\Http\Controllers\SettingcController@linksUpdate') -> name('links_update');
Route::post('/home_slider','App\Http\Controllers\homePageController@homePageSliderUpdate') -> name('home_slider_update');

//sliders





Route::get('/slide-add', function () {
    return view('advance slider.add_slider');
}) -> name('slide_add');


//advance slider
Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'advance'], function () {

    Route::post('/slider','sliderController@storeAdvanceSlide') -> name('store.slide');
    Route::get('/sliders','sliderController@index') -> name('slider');
    Route::get('slider-single/{id}','sliderController@singleSlider') -> name('single.slider');
    Route::post('/slider-update','sliderController@updateSliderData') -> name('udate.slider');
    Route::post('/vedio-slider','sliderController@storeVedioSLider') -> name('store.vedio.slider');

});
