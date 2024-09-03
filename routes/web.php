<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [\App\Http\Controllers\CutomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [\App\Http\Controllers\CutomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [\App\Http\Controllers\CutomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [\App\Http\Controllers\CutomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [\App\Http\Controllers\CutomAuthController::class, 'signOut'])->name('signout');
Route::middleware('auth')->group(function () {
    Route::resource('/account', \App\Http\Controllers\AcccountController::class);
    Route::resource('/post', \App\Http\Controllers\PostController::class);
});
