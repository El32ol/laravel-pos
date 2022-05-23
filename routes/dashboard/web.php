<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\users\UserController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){    
Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])-> group(function () {
Route::get('/index',[DashboardController::class, 'index'])->name('index');

                //categories routes 
Route::resource('categories', CategoryController::class)->except(['show']);
                //clients routes 
Route::resource('clients', ClientController::class)->except(['show']);
                //product routes 
Route::resource('products', ProductController::class)->except(['show']);
                //users routes
Route::resource('users', UserController::class)->except(['show']);
});
});