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

/**
 * User auth routes
 */
Auth::routes();
/**
 * Standard home, about and contact routes
 */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::post('/contact', 'ContactController@storeMessage');
// Verification email route
Route::get('verify/{email}/{token}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
/**
 * Parts, Categories, Subcategories, brand, manufacturer routes
 */
Route::resource('categories.parts', 'Category\CategoryPartController', ['only' => ['index']]);
Route::resource('subcategories.parts', 'SubCategory\SubCategoryPartController', ['only' => ['index']]);
Route::resource('brand.parts', 'Brand\BrandPartController', ['only' => ['index']]);
Route::resource('manufacturer.parts', 'Manufacturer\ManufacturerPartController', ['only' => ['index']]);

Route::resource('categories', 'Category\CategoryController', ['except' => ['show']]);
Route::resource('parts', 'Part\PartController');

/*
 * Admin routes
 */
Route::prefix('administrator')->group(function () {
    // Admin registrtion and login/logout routes
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin.login.submit');

    Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    // we don't need registar link for now
    Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Admin\RegisterController@register')->name('admin.register');

    Route::post('/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

    Route::post('/password/reset', 'Admin\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

});
