<?php

use App\Http\Controllers\User\AppointmentController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\TransactionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('index');
Route::prefix('transactions')->controller(TransactionsController::class)->group(function () {
    Route::get('', 'index')->name('transactions.index');
    Route::get('/{id}', 'show')->name('transactions.show');
});
Route::prefix('appointments')->controller(AppointmentController::class)->group(function () {
    Route::get('', 'index')->name('appointments.index');
    Route::get('/{id}', 'show')->name('appointments.show');
});
