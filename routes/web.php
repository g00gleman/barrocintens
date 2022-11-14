<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\noteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\factuurController;
use App\Http\Controllers\LeaseController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\offerteController;
use App\Http\Controllers\voorraadController;

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
    // calander routes hier

    Route::get('calendar', [CalenderController::class, 'index'])->name('calender');
    Route::post('calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);
    Route::get('calendar/show/{id}', [CalenderController::class, 'show'])->name('calender.show');
    Route::get('calendar/edit/{id}', [CalenderController::class, 'edit'])->name('calender.edit');
    Route::post('calendar/store/{id}', [CalenderController::class, 'store'])->name('calender.store');
    Route::get('calendar/destroy/{id}', [CalenderController::class, 'destroy'])->name('calender.destroy');

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

    // hier de routes voor maintenance
    Route::get('/maintenance/MeldingOverzicht', [MaintenanceController::class, 'getmaintenance'])->name('maintenance.MeldingOverzicht');
    Route::resource('maintenance', MaintenanceController::class);

    // hier de routes voor factuur
    Route::get('/factuur', [factuurController::class, 'getList'])->name('factuur.list');
    Route::get('/factuur/create', [factuurController::class, 'getCreate'])->name('factuur.create');
    Route::post('/factuur/create', [factuurController::class, 'store'])->name('factuur.create');
    Route::get('/factuur/{factuur}', [factuurController::class, 'doDownloadFactuur'])->name('factuur.pdf');

    // hier de routes voor leasecontracten   
    Route::get('/leasecontracten/overzicht', [LeaseController::class, 'getcontract'])->name('leasecontracten.overzicht');
    Route::get('/leasecontracten/create', [LeaseController::class, 'getcreate'])->name('leasecontracten.create');
    Route::post('/leasecontracten/create', [LeaseController::class, 'create'])->name('leasecontracten.create');
    Route::get('/leasecontracten/edit/{leaseid}', [LeaseController::class, 'getedit'])->name('leasecontracten.edit');
    Route::post('/leasecontracten/edit', [LeaseController::class, 'edit'])->name('leasecontracten.edit');
    Route::delete('/leasecontracten/delete/{leaseid}', [LeaseController::class, 'destroy'])->name('leasecontracten.delete');

    // hier de routes voor voorraad
    Route::get('/product/voorraad/{productid}', [voorraadController::class, 'getcreate'])->name('product.voorraad');
    Route::post('/product/voorraad', [voorraadController::class, 'store'])->name('product.voorraad');

    Route::get('/voorraad/overzicht', [voorraadController::class, 'getvoorraad'])->name('voorraad.overzicht');

    Route::get('/voorraad/edit/{voorraadid}', [voorraadController::class, 'getedit'])->name('voorraad.edit');
    Route::post('/voorraad/edit', [voorraadController::class, 'edit'])->name('voorraad.edit');

    Route::delete('/voorraad/delete/{voorraadid}', [voorraadController::class, 'destroy'])->name('voorraad.delete');

    // hier de routes voor offerte
    Route::get('/offerte/overzicht', [offerteController::class, 'get'])->name('offerte.overzicht');

    Route::get('/offerte/edit/{offerteid}', [offerteController::class, 'getedit'])->name('offerte.edit');
    Route::post('/offerte/edit/{offerteid}', [offerteController::class, 'storeedit'])->name('offerte.edit');

    Route::delete('/offerte/delete/{voorraadid}', [offerteController::class, 'destroy'])->name('offerte.delete');

    Route::get('/offerte/show/{offerteid}', [offerteController::class, 'getshow'])->name('offerte.show');

});

// hier de routes voor home-page
Route::get('/product', [ProductController::class, 'gethomeproduct'])->name('product');

Route::get('/product/shows/{productid}', [ProductController::class, 'shows'])->name('product.shows');
Route::post('/product/shows', [ProductController::class, 'storeofferte'])->name('product.shows');

Route::get('/factuur', [factuurController::class, 'getList'])->name('factuur.list');
Route::get('/contact', function () { return view('contact'); })->name('contact');

