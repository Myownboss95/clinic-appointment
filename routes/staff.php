<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClinicUserController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CountryPhoneCodeController;
use App\Http\Controllers\Admin\CurrencyListController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StageController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SubServiceController;
use App\Http\Controllers\Admin\TransactionsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserStageController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('index');

Route::resource('users', UserController::class);
Route::get('customers', CustomerController::class)->name('customers.index');
Route::resource('userStages', UserStageController::class);
Route::resource('subServices', SubServiceController::class);
Route::resource('states', StateController::class);
Route::resource('stages', StageController::class);
Route::resource('comments', CommentController::class)->except(['store','destroy']);
Route::get('comments-destroy/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('comments/appointment/{appointmentId}/store', [CommentController::class, 'store'])->name('comments.appointment.store');
Route::resource('services', ServiceController::class);
Route::resource('passwordResets', PasswordResetController::class);
Route::resource('currencyLists', CurrencyListController::class);
Route::resource('countryPhoneCodes', CountryPhoneCodeController::class);
Route::resource('countries', CountryController::class);
Route::resource('clinicUsers', ClinicUserController::class);
Route::resource('cities', CityController::class);
Route::resource('appointments', AppointmentController::class);
Route::prefix('transactions')->controller(TransactionsController::class)->group(function () {
    Route::get('', 'index')->name('transactions');
    Route::get('confirmed-transactions', 'approvedTransactions')->name('confirmed.transactions');
    Route::get('rejected-transactions', 'rejectedTransactions')->name('rejected.transactions');
    Route::get('approve', 'approveTransaction')->name('approve');
    Route::get('reject', 'rejectTransaction')->name('reject');
});
