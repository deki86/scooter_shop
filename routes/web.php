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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::post('/contact', 'ContactController@storeMessage');

Route::get('verify/{email}/{token}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

Route::resource('categories.parts', 'Category\CategoryPartController', ['only' => ['index']]);
Route::resource('subcategories.parts', 'SubCategory\SubCategoryPartController', ['only' => ['index']]);
Route::resource('brand.parts', 'Brand\BrandPartController', ['only' => ['index']]);
Route::resource('manufacturer.parts', 'Manufacturer\ManufacturerPartController', ['only' => ['index']]);

Route::resource('parts', 'Part\PartController');
