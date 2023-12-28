<?php

use App\Http\Controllers\User\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\TransactionsController;

Route::get('/', DashboardController::class)->name('index');
Route::prefix('transactions')->controller(TransactionsController::class)->group(function () {
    Route::get('', 'index')->name('transactions');
    Route::get('/{id}', 'showTransaction')->name('transactions.show');
});
Route::prefix('appointments')->controller(AppointmentController::class)->group(function () {
    Route::get('', 'index')->name('appointments');    
});