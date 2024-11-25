<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\EnsureAuthCustomer;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\VoucherController;
use App\Models\ProductDetail;
use App\Models\Transaction;

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

// Route::get('/', function () {
//     return view('layouts.frontend');
// });
//catalouge
Route::get('/', [FrontendController::class, 'index'])->name('catalouge.index');
Route::get('/detail/{id}', [FrontendController::class, 'detail'])->name('catalouge.detail');

Route::get('/login', function () {
    return view('autentikasi.login');
});

Route::middleware(EnsureAuthCustomer::class)->group(function () {
    // buyer
    Route::get('/home/buyer', [BuyerController::class, 'index'])->name('buyer.index');
    Route::get('/buyer/create', [BuyerController::class, 'create'])->name('buyer.create');
    Route::post('/buyer/store', [BuyerController::class, 'store'])->name('buyer.store');
    Route::get('/buyer/{id}/edit', [BuyerController::class, 'edit'])->name('buyer.edit');
    Route::put('/buyer/{id}', [BuyerController::class, 'update'])->name('buyer.update');
    Route::delete('/buyer/{id}', [BuyerController::class, 'destroy'])->name('buyer.destroy');

    //category
    Route::get('/home/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/detail/{id}', [CategoryController::class, 'detail'])->name('category.detail');
    Route::get('/dashboard/category', [CategoryController::class, 'crud'])->name('category.crud');

    //transaction
    Route::get('/home/transaction', [TransactionController::class, 'index'])->name('transaction.index');
    Route::get('/home/transaction/create', [TransactionController::class, 'create'])->name('transaction.create');
    Route::post('/transaction/store', [TransactionController::class, 'store'])->name('transaction.store');
    Route::get('/transaction/edit/{id}', [TransactionController::class, 'edit'])->name('transaction.edit');
    Route::put('/transaction/update/{id}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::delete('/transaction/delete/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');

    //checkout
    Route::get('/home/checkout/transaction/{id}', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/home/checkout/cetak/{id}', [CheckoutController::class, 'cetak'])->name('checkout.cetak');
    Route::post('/home/checkout/transaction/create', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('/home/checkout/transaction/checkout/{id}', [CheckoutController::class, 'checkout'])->name('checkout.checkout');
    Route::delete('/checkout/delete/{id}', [CheckoutController::class, 'destroy'])->name('checkout.destroy');
    Route::get('/home/checkout/diskon/{id}', [CheckoutController::class, 'diskon'])->name('checkout.diskon');

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //productdetail
    Route::get('/home/product/detail', [ProductDetail::class, 'index'])->name('productdetail.index');

    //voucher
    Route::get('/dashboard/voucher', [VoucherController::class, 'index'])->name('voucher.index');
    Route::get('/voucher/create', [VoucherController::class, 'create'])->name('voucher.create');
    Route::post('/voucher/store', [VoucherController::class, 'store'])->name('voucher.store');
    Route::get('/voucher/{id}/edit', [VoucherController::class, 'edit'])->name('voucher.edit');
    Route::put('/voucher/{id}', [VoucherController::class, 'update'])->name('voucher.update');
    Route::delete('/voucher/{id}', [VoucherController::class, 'destroy'])->name('voucher.destroy');
});

Auth::routes();
