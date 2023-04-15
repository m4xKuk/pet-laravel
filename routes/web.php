<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function() {
    Route::group(['namespace' => 'Admin'], function(){
        Route::get('/', 'MainController')->name('admin.main');
    });

    Route::resource('/posts', App\Http\Controllers\Admin\PostController::class);

    Route::resource('/categories', App\Http\Controllers\Admin\CategoryController::class);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);
