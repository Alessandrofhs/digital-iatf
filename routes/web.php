<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/login');
});
Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/login', [LoginController::class, 'showloginform'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login'])->name('login.proses');
Route::get('/register', [RegisterController::class, 'showregisterform'])->name('register');
Route::post('/register-proses', [RegisterController::class, 'register'])->name('register.proses');
Route::get('/email/verify', [RegisterController::class, 'showVerificationNotice'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verifyEmail'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
Route::post('/email/resend', [RegisterController::class, 'resendVerification'])->middleware(['auth', 'throttle:6,1'])->name('verification.resend');



Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin/dashboard-rule', [AdminController::class, 'dashboard_rule'])->name('admin.dashboard.rule');
        Route::get('/admin/dashboard-proses', [AdminController::class, 'dashboard_proses'])->name('admin.dashboard.proses');
        Route::get('/admin/dokumen-rule/{tipe}', [DocruleController::class, 'index'])->name('admin.lihat.dokumen.rule');
        Route::post('/admin/dokumen-rule', [DocruleController::class, 'store'])->name('admin-tambah-dokumen-prosedur');
        Route::get('/admin/dokumen-prosedur/download/{id}', [DocruleController::class, 'download'])->name('admin-download-dokumen');
        Route::put('/admin/dokumen-prosedur/update/{id}', [DocruleController::class, 'update'])->name('admin-update-dokumen');
        Route::delete('/admin/dokumen-prosedur/delete/{id}', [DocruleController::class, 'destroy'])->name('admin-delete-dokumen');
        Route::get('/admin/template-dokumen/{tipe_dokumen}', [AdminController::class, 'index'])->name('admin-template-dokumen');
        Route::post('/admin/template-dokumen/add', [DocruleController::class, 'store'])->name('admin-add-template');
        Route::put('/admin/template-dokumen/update/{id}', [AdminController::class, 'update'])->name('admin-update-template');
        Route::get('/admin/template-dokumen/download/{id}', [AdminController::class, 'download'])->name('admin-download-template');
    });
    Route::group(['middleware' => ['role:guest']], function () {
        Route::get('/guest/dashboard-rule', [GuestController::class, 'dashboard_rule'])->name('guest.dashboard.rule');
        Route::get('/guest/dashboard-proses', [GuestController::class, 'dashboard_proses'])->name('guest.dashboard.proses');
        Route::get('/guest/dokumen-prosedur/{jenis}', [DocruleController::class, 'index'])->name('guest-lihat-dokumen-rule');
    });
});
