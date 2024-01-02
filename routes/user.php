<?php

use App\Http\Controllers\User\AppointmentController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\TransactionsController;
use App\Http\Controllers\TransactionReceiptController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('index');
Route::prefix('transactions')->controller(TransactionsController::class)->group(function () {
    Route::get('', 'index')->name('transactions');
    Route::get('/{id}', 'show')->name('transactions.show');
});
Route::get('transaction/{id}/download-reciept', TransactionReceiptController::class)->name("download-reciept");
Route::prefix('appointments')->controller(AppointmentController::class)->group(function () {
    Route::get('', 'index')->name('appointments');
});
