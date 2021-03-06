<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;

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

Route::get('/',[HomeController::class, 'index']);

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/redirect',[HomeController::class, 'redirect']);

    Route::get('/search',[HomeController::class, 'search']);

    Route::post('/addcart/{id}',[HomeController::class, 'addcart']);

    Route::get('/showcart',[HomeController::class, 'showcart']);

    Route::get('/delete/{id}',[HomeController::class, 'deletecart']);

    Route::post('/order',[HomeController::class, 'confirmorder']);

    Route::get('/allproducts',[HomeController::class, 'allproducts']);

    Route::get('/viewproduct/{id}',[HomeController::class, 'viewproduct']);

    Route::get('/filter',[HomeController::class, 'filter']);

    Route::get('/orders',[HomeController::class, 'orders']);

    Route::post('/addreview',[ReviewController::class, 'addreview']);

    Route::get('/writecomment/{id}/usercomment',[ReviewController::class, 'writecomment']);

    Route::post('/addcomment',[ReviewController::class, 'createcomment']);

    Route::get('editcomment/{id}/usercomment',[ReviewController::class, 'editcomment']);

    Route::put('/updatecomment',[ReviewController::class, 'updatecomment']);

    Route::middleware(['auth', 'isAdmin'])->group(function () {

        Route::get('/product',[AdminController::class, 'product']);

        Route::post('/uploadproduct',[AdminController::class, 'uploadproduct']);

        Route::get('/showprod',[AdminController::class, 'showproduct']);

        Route::get('/deleteproduct/{id}',[AdminController::class, 'deleteproduct']);

        Route::get('/updateview/{id}',[AdminController::class, 'updateview']);

        Route::post('/updateproduct/{id}',[AdminController::class, 'updateproduct']);

        Route::get('/showorder',[AdminController::class, 'showorder']);

        Route::get('/updatestatus/{id}',[AdminController::class, 'updatestatus']);

        Route::get('/showuser',[AdminController::class, 'showuser']);

        Route::get('/promote/{id}',[AdminController::class, 'promote']);

        Route::get('/deleteuser/{id}',[AdminController::class, 'deleteuser']);

    });

});
