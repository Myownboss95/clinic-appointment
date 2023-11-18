<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('landing');
});

Auth::routes();
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback']);
Route::get('/register/google', [RegisterController::class, 'redirectToGoogle'])->name('register.google');
Route::get('/register/google/callback', [RegisterController::class, 'handleGoogleCallback']);
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('roles', App\Http\Controllers\RoleController::class);

 
Route::resource('users', App\Http\Controllers\UserController::class);
 



Route::resource('userStages', App\Http\Controllers\UserStageController::class);


Route::resource('subServices', App\Http\Controllers\SubServiceController::class);


Route::resource('states', App\Http\Controllers\StateController::class);


Route::resource('stages', App\Http\Controllers\StageController::class);


Route::resource('comments', App\Http\Controllers\CommentController::class);


Route::resource('services', App\Http\Controllers\ServiceController::class);


Route::resource('passwordResets', App\Http\Controllers\PasswordResetController::class);


Route::resource('generalSettings', App\Http\Controllers\GeneralSettingController::class);


Route::resource('currencyLists', App\Http\Controllers\CurrencyListController::class);


Route::resource('countryPhoneCodes', App\Http\Controllers\CountryPhoneCodeController::class);


Route::resource('countries', App\Http\Controllers\CountryController::class);


Route::resource('clinicUsers', App\Http\Controllers\ClinicUserController::class);


Route::resource('cities', App\Http\Controllers\CityController::class);


Route::resource('appointments', App\Http\Controllers\AppointmentController::class);

});

