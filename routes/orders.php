<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/history/{customer}', [OrderController::class, 'showHistory'])->name('orders.history');
Route::post('/orders/{id}/updateStatus', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');


