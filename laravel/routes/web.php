<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/products", [ProductController::class, 'index'])->name('products.index');
Route::get("/dashboard", [PagesController::class, 'dashboard'])->name('pages.dashboard');