<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers;

// URL::setRootControllerNamespace('App\Http\Controllers');

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


Route::post('login', 'App\Http\Controllers\Api\Auth\LoginController@login');
Route::get('refresh', 'App\Http\Controllers\Api\Auth\LoginController@refreshToken');


// CATEGORY START

Route::get('category', 'App\Http\Controllers\Api\v1\CategoryController@category');

Route::get('category/{id}', 'App\Http\Controllers\Api\v1\CategoryController@categoryById');

Route::post('category', 'App\Http\Controllers\Api\v1\CategoryController@categorySave');

Route::put('category/{id}', 'App\Http\Controllers\Api\v1\CategoryController@categoryEdit');

// ALSO DELITE PRODUCTS WHERE CATEGORY ID IS THIS ID
Route::delete('category/{id}', 'App\Http\Controllers\Api\v1\CategoryController@categoryDelete');

// CATEGORY END


// PRODUCT START

Route::get('product', 'App\Http\Controllers\Api\v1\ProductController@category');

Route::get('product/{id}', 'App\Http\Controllers\Api\v1\ProductController@categoryById');

Route::post('product', 'App\Http\Controllers\Api\v1\ProductController@categorySave');

Route::put('product/{id}', 'App\Http\Controllers\Api\v1\ProductController@categoryEdit');

Route::delete('product/{id}', 'App\Http\Controllers\Api\v1\ProductController@categoryDelete');

// PRODUCT END