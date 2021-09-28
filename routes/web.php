<?php

use Illuminate\Support\Facades\Route;

// Guest Route
Route::get('/', 'App\Http\Controllers\Guest\HomeController@homePage');
Route::get('/home', 'App\Http\Controllers\Guest\HomeController@homePage');
Route::get('/register', 'App\Http\Controllers\Guest\GuestLoginLogoutController@registerPage');
Route::post('/register', 'App\Http\Controllers\Guest\GuestLoginLogoutController@registerPage');
Route::get('/login', 'App\Http\Controllers\Guest\GuestLoginLogoutController@loginPage');
Route::get('/logout', 'App\Http\Controllers\Guest\GuestLoginLogoutController@logoutPage');
Route::post('/login', 'App\Http\Controllers\Guest\GuestLoginLogoutController@loginPage');
Route::get('/products', 'App\Http\Controllers\Guest\ProductController@productPage');
Route::get('/about', function () { return view('components.guest.about');});
Route::get('/contact', function () { return view('components.guest.contact');});
Route::get('/cart', function () { return view('components.guest.cart');});
Route::get('/add-to-cart', 'App\Http\Controllers\Guest\AddToCartController@addToCart');
Route::get('/update-quantity-cart', 'App\Http\Controllers\Guest\CartController@updateCartQuantity');
Route::get('/delete-cart', 'App\Http\Controllers\Guest\CartController@deleteACart');
Route::get('/delete-all-cart', 'App\Http\Controllers\Guest\CartController@deleteAllCart');
Route::get('/product-detail', 'App\Http\Controllers\Guest\ProductController@productDetails');

Route::group(['middleware' => 'guestLogin'], function() {
    Route::get('/account-information', 'App\Http\Controllers\Guest\GuestAccountController@accountPage');
    Route::get('/order-cart', 'App\Http\Controllers\Guest\CartController@orderCart');
    Route::get('/order-history', 'App\Http\Controllers\Guest\OrderController@orderHistory');
    Route::get('/like-product', 'App\Http\Controllers\Guest\LikeUnlikeProductController@likeUnlikeProduct');
});

// Admin Route
Route::get('/admin/login', 'App\Http\Controllers\Admin\AdminLoginLogoutController@loginPage');
Route::post('/admin/login', 'App\Http\Controllers\Admin\AdminLoginLogoutController@loginPage');

Route::group(['middleware' => 'adminLogin'], function() {
    Route::get('/admin/logout', 'App\Http\Controllers\Admin\AdminLoginLogoutController@logoutPage');
    Route::get('/admin/home', 'App\Http\Controllers\Admin\HomeController@homePage');
    Route::get('/admin/dashboard', 'App\Http\Controllers\Admin\HomeController@homePage');
    Route::get('/admin/admin-account', 'App\Http\Controllers\Admin\AdminAccountController@adminAccountPage');
    Route::get('/admin/customer-account', 'App\Http\Controllers\Admin\CustomerAccountController@customerAccountPage');
    Route::get('/admin/product', 'App\Http\Controllers\Admin\ProductController@productPage');
    Route::post('/admin/add-product', 'App\Http\Controllers\Admin\ProductController@addProduct');
    Route::post('/admin/edit-product', 'App\Http\Controllers\Admin\ProductController@editProduct');
    Route::post('/admin/deactive-product', 'App\Http\Controllers\Admin\ProductController@deactiveProduct');
    Route::post('/admin/active-product', 'App\Http\Controllers\Admin\ProductController@activeProduct');
    Route::post('/admin/add-admin-account', 'App\Http\Controllers\Admin\AdminAccountController@addAdminAccount');
    Route::post('/admin/edit-admin-account', 'App\Http\Controllers\Admin\AdminAccountController@editAdminAccount');
    Route::get('/admin/order', 'App\Http\Controllers\Admin\OrderController@orderPage');
    Route::get('/admin/order-detail', 'App\Http\Controllers\Admin\OrderController@orderDetailPage');
    Route::post('/admin/update-delivery-order-status', 'App\Http\Controllers\Admin\OrderController@updateDeliveryOrderStatus');
    Route::post('/admin/update-done-order-status', 'App\Http\Controllers\Admin\OrderController@updateDoneOrderStatus');
    Route::post('/admin/update-cancel-order-status', 'App\Http\Controllers\Admin\OrderController@updateCancelOrderStatus');
});






