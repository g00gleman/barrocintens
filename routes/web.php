<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\noteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\factuurController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


    // hier de routes voor in admin pagina's
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::get('/product/overzicht', [ProductController::class, 'getproduct'])->name('product.overzicht');
    Route::post('/product/overzicht', [ProductController::class, 'postcategory'])->name('product.overzicht');



    Route::get('/product/create', [ProductController::class, 'getcreate'])->name('product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('product.create');

    Route::get('/product/show/{productid}', [ProductController::class, 'show'])->name('product.show');

    Route::get('/product/edit/{productid}', [ProductController::class, 'getedit'])->name('product.edit');
    Route::post('/product/edit', [ProductController::class, 'edit'])->name('product.edit');

    Route::delete('/product/delete/{productid}', [ProductController::class, 'destroy'])->name('product.delete');

    Route::delete('/product_category/delete/{categoryid}', [ProductController::class, 'destroycategory'])->name('product_category.delete');

    Route::get('/user/overzicht', [UserController::class, 'getuser'])->name('user.overzicht');


    Route::resource('note', noteController::class);

});


Route::get('/factuur', [factuurController::class, 'getList'])->name('factuur.list');
Route::get('/contact', function () { return view('contact'); })->name('contact');
