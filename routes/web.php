<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\customers_categoriesController;
use App\Http\Controllers\customersController;
use App\Http\Controllers\stocksController;
use App\Http\Livewire\Transaksi;

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

// Route::get('/', [StudentsController::class, 'index']);

// Route::get('/', function () {
//     return view('admin.main');
// })->name('root');


Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    //livewire dashboard
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard'); 

//a27 admin sementara
Route::get('/dashboard2', function () {
    return view('admin.dashboard');
})->name('admin_dashboard');

//DEV-PAGE
Route::get('/doc', function () {
    return view('admin.documentation');
})->name('admin_documentation');

Route::get('/aboutus', function () {
    return view('admin.samplepage');
})->name('samplepage');

//MASTERINGDATAPRODUK-PAGE

// Route::get('/suplier', function () {
//     return view('admin.suplier.index');
// })->name('suplier');

Route::resource('suppliers', 'App\Http\Controllers\SuppliersController');
Route::resource('customers_categories', 'App\Http\Controllers\customers_categoriesController');
Route::resource('product_categories', 'App\Http\Controllers\product_categoriesController');
Route::resource('product_units', 'App\Http\Controllers\product_unitsController');
Route::resource('customers', 'App\Http\Controllers\customersController');
Route::resource('products', 'App\Http\Controllers\productsController');
Route::resource('stocks', 'App\Http\Controllers\stocksController');
Route::resource('transaksis', 'App\Http\Controllers\transaksisController');


Route::get('/transaksi', Transaksi::class)->name('transaksi'); //Tambahkan routing ini

});


 Route::get('/stocks/{product}/add','App\Http\Controllers\stocksController@add');
 Route::get('/pencarian/edit/{keyword}','App\Http\Controllers\pencariansController@edit');
 Route::get('/pencarian/add/{keyword}','App\Http\Controllers\pencariansController@add');