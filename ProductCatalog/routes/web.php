<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'showForm'])->name('items.form');
Route::post('/', [ProductController::class, 'storeProducts'])->name('items.store');
Route::get('/summary', [ProductController::class, 'showSummary'])->name('items.summary');
Route::post('/summary', [ProductController::class, 'storeFinal'])->name('items.store.orders');
Route::get('/order', [ProductController::class, 'showFinal'])->name('items.orders');





