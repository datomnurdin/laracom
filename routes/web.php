<?php

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/products', 'ProductController@index');
Route::get('/product/{id}', 'ProductController@show');

Route::get('/cart', 'CartController@index');
Route::post('/cart', 'CartController@store');
Route::delete('/cart/{id}', 'CartController@destroy');
Route::post('/cart/saveForLater/{id}', 'CartController@saveForLater');

Route::delete('/saveForLater/{id}', 'SaveForLaterController@destroy');
Route::post('/saveForLater/moveToCart/{id}', 'SaveForLaterController@moveToCart');

Route::get('/checkout', 'CheckoutController@checkout');

Route::get('/cart/empty', function(){
    Cart::destroy();
});