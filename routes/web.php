<?php

use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ReferralController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UpdatePasswordController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\BookAppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\TransactionReceiptController;
use App\Http\Controllers\User\UserBankDetailsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact-form', [HomeController::class, 'contactForm'])->name('contact-form');

Route::get('/category/{slug}', [HomeController::class, 'getAllSubservices'])->name('services.sub_service');

Route::get('/ref/{token}', ReferralController::class);
Route::prefix('booking')->as('booking.')->group(function(){
    Route::get('/book-appointment/{subservice}', [BookAppointmentController::class, 'index'])->name('book-appointment');
    Route::get('appointment-date-booked', [BookAppointmentController::class, 'appointmentBooked'])->name('appointment.booked');
    Route::get('/appointment/{uuid}', [BookAppointmentController::class, 'confirmAppointmentBooking'])->name('confirm-appointment');
    Route::get('/decline-appointment-booking/{uuid}', [BookAppointmentController::class, 'declineAppointmentBooking'])->name('decline-appointment-booking');
    Route::post('/confirm-appointment-booking/{uuid}', [BookAppointmentController::class, 'confirmAppointmentBookingPayment'])->name('confirm-appointment-booking');
});

Route::prefix('location')->as('location.')->controller(LocationController::class)->group(function () {
    Route::get('countries', 'countries')->name('countries');
    Route::get('states/{country}', 'states')->name('states');
});

Route::get('/log-out', function () {
    return view('auth.logout');
})->name('log-out');

Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('/register/google', [RegisterController::class, 'redirectToGoogle'])->name('register.google');
Route::get('/register/google/callback', [RegisterController::class, 'handleGoogleCallback']);
Route::get('/calendly/callback', function (Request $request) {
    info($request);
});
Route::get('calendly', [HomeController::class, 'calendly']);

Route::middleware('auth')->group(function () {

    Route::prefix('profile')->group(function () {
        Route::post('/update', [UserProfileController::class, 'update'])->name('profile.update');
        Route::get('', [UserProfileController::class, 'index'])->name('profile.index');

        //handle profile image
        Route::get('/{user}/edit-image', [ImageController::class, 'index'])->name('image.index');
        Route::put('/change-password', [UpdatePasswordController::class, 'update'])->name('password.update');
        Route::post('/update-bank-details', [UserBankDetailsController::class, 'update'])->name('bank-details.update');
    });
    Route::get('transaction/download/{ref}', TransactionReceiptController::class)->name('download.transaction');


    Route::prefix('user')->as('user.')->middleware('can:is_user')->group(fn () => require_once('user.php'));
    Route::prefix('admin')->as('admin.')->middleware('can:is_admin')->group(fn () => require_once('admin.php'));
    Route::prefix('staff')->as('staff.')->middleware('can:is_staff')->group(fn () => require_once('staff.php'));

});
