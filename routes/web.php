<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('product')
    ->controller(ProductController::class)
    ->group(function (){
        Route::get('/','index');
        Route::get('/add','add');
        Route::post('/store', 'store')->name('store.product');
        Route::delete('/{id}','destroy')->name('delete.product');
        Route::get('/edit/{id}','edit')->name('edit.product');
        Route::put('/edit/{id}','update')->name('update.product');
    });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

