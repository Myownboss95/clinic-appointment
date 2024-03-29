<?php

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\CalendlyController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClinicUserController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\CountryPhoneCodeController;
use App\Http\Controllers\Admin\CurrencyListController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\PaymentChannelController;
use App\Http\Controllers\Admin\ReferralsTransactionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\StageController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SubServiceController;
use App\Http\Controllers\Admin\TransactionsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserStageController;
use App\Http\Controllers\PasswordResetController;
use Illuminate\Support\Facades\Route;

Route::get('/', DashboardController::class)->name('index');
Route::resource('paymentChannels', PaymentChannelController::class);
Route::get('customers', CustomerController::class)->name('customers.index');
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('staff', StaffController::class)->only('index');
Route::post('staff/{id}/set-admin', [StaffController::class, 'setAdmin'])->name('set-admin');
Route::post('staff/{id}/remove-admin', [StaffController::class, 'removeAdmin'])->name('remove-admin');
Route::resource('userStages', UserStageController::class);
Route::resource('subServices', SubServiceController::class);
Route::resource('states', StateController::class);
Route::resource('stages', StageController::class);
Route::resource('comments', CommentController::class)->except(['store', 'destroy']);
Route::get('comments-destroy/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
Route::post('comments/appointment/{appointmentId}/store', [CommentController::class, 'store'])->name('comments.appointment.store');
Route::resource('services', ServiceController::class);
Route::resource('passwordResets', PasswordResetController::class);
Route::resource('settings', GeneralSettingController::class)->only(['index', 'store']);
Route::resource('currencyLists', CurrencyListController::class);
Route::resource('countryPhoneCodes', CountryPhoneCodeController::class);
Route::resource('countries', CountryController::class);
Route::resource('clinicUsers', ClinicUserController::class);
Route::resource('cities', CityController::class);
Route::get('appointments/pending-appointments', [AppointmentController::class, 'pendingAppointments'])->name('appointments.pending');
Route::get('appointments/book-appointment', [AppointmentController::class, 'bookAppointment'])->name('appointments.book-appointment');
Route::resource('appointments', AppointmentController::class);
Route::get('referrals/pending-payouts', [ReferralsTransactionController::class, 'pendingTransactions'])->name('referrals.pending');
Route::resource('referrals', ReferralsTransactionController::class)->only(['index', 'show']);
Route::post('referrals/pay-referrals/{transactionId}', [ReferralsTransactionController::class, 'payReferrals'])->name('referrals.pay');
Route::get('transactions/pending-transactions', [TransactionsController::class, 'pendingTransactions'])->name('transactions.pending');
Route::resource('transactions', TransactionsController::class);
Route::prefix('transactions')->controller(TransactionsController::class)->group(function () {
    Route::get('', 'index')->name('transactions');
    Route::get('confirmed-transactions', 'approvedTransactions')->name('confirmed.transactions');
    Route::get('rejected-transactions', 'rejectedTransactions')->name('rejected.transactions');
    Route::get('download-proof/{uuid}', 'downloadProof')->name('download-proof');

});

Route::prefix('settings')->as('settings.')->group(function(){
    Route::prefix('calendly')->as('calendly.')->controller(CalendlyController::class)->group(function(){
        Route::get('init', 'init')->name('init');
        Route::get('callback', 'handleCallback')->name('redirect');

    });
});
