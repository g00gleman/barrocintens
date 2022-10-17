<?php

use App\Http\Controllers\CompanyController;
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
    // hier de routes voor products
    Route::get('/product/overzicht', [ProductController::class, 'getproduct'])->name('product.overzicht');
    Route::post('/product/overzicht', [ProductController::class, 'postcategory'])->name('product.overzicht');

    Route::get('/product/create', [ProductController::class, 'getcreate'])->name('product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('product.create');

    Route::get('/product/show/{productid}', [ProductController::class, 'show'])->name('product.show');

    Route::get('/product/edit/{productid}', [ProductController::class, 'getedit'])->name('product.edit');
    Route::post('/product/edit', [ProductController::class, 'edit'])->name('product.edit');

    Route::delete('/product/delete/{productid}', [ProductController::class, 'destroy'])->name('product.delete');

    Route::delete('/product_category/delete/{categoryid}', [ProductController::class, 'destroycategory'])->name('product_category.delete');

    // hier de routes voor user
    Route::get('/user/overzicht', [UserController::class, 'getuser'])->name('user.overzicht');

    Route::get('/user/create', [UserController::class, 'getcreate'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.create');

    Route::get('/user/edit/{userid}', [UserController::class, 'getedit'])->name('user.edit');
    Route::post('/user/edit', [UserController::class, 'edit'])->name('user.edit');

    Route::delete('/user/delete/{userid}', [UserController::class, 'destroy'])->name('user.delete');

    // hier de routes voor company
    Route::get('/company/overzicht', [CompanyController::class, 'getcompany'])->name('company.overzicht');

    Route::get('/company/create', [CompanyController::class, 'getcreate'])->name('company.create');
    Route::post('/company/create', [CompanyController::class, 'store'])->name('company.create');

    Route::get('/company/edit/{companyid}', [CompanyController::class, 'getedit'])->name('company.edit');
    Route::post('/company/edit', [CompanyController::class, 'edit'])->name('company.edit');

    Route::delete('/company/delete/{companyid}', [CompanyController::class, 'destroy'])->name('company.delete');

    // hier de routes voor notitie
    Route::resource('note', noteController::class);

});


Route::get('/factuur', [factuurController::class, 'getList'])->name('factuur.list');
Route::get('/contact', function () { return view('contact'); })->name('contact');
