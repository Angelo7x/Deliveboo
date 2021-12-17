<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Orders\OrderController;
use App\Http\Controllers\Api\Products\ProductController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::namespace('Api')->name('api.')->group(function() {
    Route::get('/cuisines', 'CuisineController@index')->name('cuisines');
    Route::get('/filter-by/{cuisineId}', 'UserController@filter')->name('filter');
    Route::get('/restaurants', 'UserController@index')->name('restaurants');
    Route::get('/restaurants/{slug}', 'UserController@show')->name('show');
});

    Route::get('orders/generate', 'Api\Orders\OrderController@generate');
    Route::post('orders/make/payment', 'Api\Orders\OrderController@makePayment');
    // Route::post('foods', 'Api/Foods/FoodController@index');


