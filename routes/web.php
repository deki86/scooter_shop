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
Route::resource('subcategories', 'SubCategory\SubCategoryController', ['except' => ['show']]);
Route::resource('brands', 'Brand\BrandController', ['except' => ['show']]);
Route::resource('manufacturers', 'Manufacturer\ManufacturerController', ['except' => ['show']]);

Route::resource('parts', 'Part\PartController');
/*
 * Routes for Shopping cart
 */
Route::get('add-to-cart/{part}', 'Cart\CartController@addToCart')->name('parts.addToCart');
Route::get('shopping-cart', 'Cart\CartController@getCart')->name('parts.getCart');

Route::post('shopping-cart/{part}', 'Cart\CartController@addToCart')->name('parts.addToCart2');
Route::delete('shopping-cart/{part}', 'Cart\CartController@deleteOneItem')->name('parts.deleteItem');
Route::delete('shopping-carts/{part}', 'Cart\CartController@deleteRowItems')->name('parts.deleteRowItems');
Route::delete('empty-cart', 'Cart\CartController@emptyCart')->name('parts.emptyCart');

/**
 * Checkout and payment proccess routes
 */
Route::get('checkout-stripe', 'Checkout\CheckoutController@showForm')->name('checkout.stripe');
Route::post('checkout-stripe', 'Checkout\CheckoutController@proccessPayment')->name('proccess.stripe');

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
