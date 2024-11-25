<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
//     return view('home.index');
// });
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/rooms', [HomeController::class, 'rooms'])->name('home.rooms');
Route::get('/restaurant', [HomeController::class, 'restaurant'])->name('home.restaurant');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/rooms_single', [HomeController::class, 'rooms_single'])->name('home.rooms_single');
Route::get('/blog_single', [HomeController::class, 'blog_single'])->name('home.blog_single');
