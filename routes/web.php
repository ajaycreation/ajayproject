<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admindashboard', [DashboardController::class, 'index'])->name('admindashboard');
    Route::delete('/user/{id}', [DashboardController::class, 'destroy'])->name('user.delete');
});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Route to show the form for adding a product
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');

// Route to store the new product
Route::post('/products', [ProductController::class, 'store'])->name('product.store');

// Route to display the list of products
Route::get('/products', [ProductController::class, 'index'])->name('product.index');

Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

