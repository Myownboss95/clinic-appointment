<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StageController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserStageController;
use App\Http\Controllers\Admin\ClinicUserController;
use App\Http\Controllers\Admin\SubServiceController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\CurrencyListController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\CountryPhoneCodeController;


Route::get('/', DashboardController::class)->name('index');
Route::resource('roles', RoleController::class); 
Route::resource('users', UserController::class);
Route::resource('userStages', UserStageController::class);
Route::resource('subServices', SubServiceController::class);
Route::resource('states', StateController::class);
Route::resource('stages', StageController::class);
Route::resource('comments', CommentController::class);
Route::resource('services', ServiceController::class);
Route::resource('passwordResets', PasswordResetController::class);
Route::resource('generalSettings', GeneralSettingController::class);
Route::resource('currencyLists', CurrencyListController::class);
Route::resource('countryPhoneCodes', CountryPhoneCodeController::class);
Route::resource('countries', CountryController::class);
Route::resource('clinicUsers', ClinicUserController::class);
Route::resource('cities', CityController::class);
Route::resource('appointments', AppointmentController::class);