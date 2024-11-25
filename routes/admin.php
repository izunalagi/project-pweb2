<?php

use App\Http\Middleware\EnsureAuthAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;
use App\Http\Middleware\EnsureAuthCustomer;

Route::middleware(EnsureAuthAdmin::class, EnsureAuthCustomer::class)->group(function () {
    //product
    Route::get('/home/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    // //post
    Route::get('/home/post', [PostController::class, 'index'])->name('post.index');
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');

    //dashboard
    Route::get('/dashboard/admin', [DashboardController::class, 'dashboard'])->name('dashboard.admin');
    Route::get('/dashboard/admin/post', [DashboardController::class, 'post'])->name('dashboard.post');
    Route::get('/dashboard/admin/index', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/admin/data', [PostController::class, 'data'])->name('post.data');
    

    //productdetail
    Route::get('/dashboard/product/detail', [DetailProductController::class, 'index'])->name('productdetail.index');
    Route::get('/dashboard/product/create', [DetailProductController::class, 'create'])->name('productdetail.create');
    Route::post('/dashbord/product/detail/store', [DetailProductController::class, 'store'])->name('productdetail.store');
    Route::get('/dashboard/product/detail/edit/{id}', [DetailProductController::class, 'edit'])->name('productdetail.edit');
    Route::put('/dashboard/update/product/detail/{id}', [DetailProductController::class, 'update'])->name('productdetail.update');
    Route::delete('/dashboard/delete/product/detail/{id}', [DetailProductController::class, 'destroy'])->name('productdetail.destroy');

    //role
    Route::get('/dashboard/role', [RoleController::class, 'index'])->name('role.index');

    //user role
    Route::get('/dashboard/user/role', [UserRoleController::class, 'index'])->name('userrole.index');
    Route::get('/dashboard/user/role/create', [UserRoleController::class, 'create'])->name('userrole.create');
    Route::post('/dashbord/user/role/store', [UserRoleController::class, 'store'])->name('userrole.store');
    Route::get('/dashboard/user/role/edit/{id}', [UserRoleController::class, 'edit'])->name('userrole.edit');
    Route::put('/dashboard/update/user/role/{id}', [UserRoleController::class, 'update'])->name('userrole.update');
    Route::delete('/dashboard/delete/user/role/{id}', [UserRoleController::class, 'destroy'])->name('userrole.destroy');
});
