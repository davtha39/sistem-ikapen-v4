<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermohonanController;

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

Route::get('/', [LoginController::class,'showLoginForm']);
Route::post('/', [LoginController::class,'attemptLogin']);

Auth::routes();

Route::middleware(['auth', 'role:pengurus'])->group(function () {
    Route::get('/pengurus/home', [HomeController::class, 'pengurusHome'])->name('pengurus.home');
    Route::resource('/pengurus/home/pengurus', PengurusController::class);
    Route::put('/pengurus/home/pengurus/{id}/jadipengurus', [PengurusController::class, 'jadiAnggota'])->name('pengurus.jadianggota');
    Route::resource('/pengurus/home/anggota', AnggotaController::class);  
    Route::put('/pengurus/home/anggota/{id}/jadipengurus', [AnggotaController::class, 'jadiPengurus'])->name('anggota.jadipengurus');
    Route::resource('/pengurus/home/pengumuman', PengumumanController::class);  
    Route::resource('/pengurus/home/permohonan', PermohonanController::class);
    Route::resource('/pengurus/home/arsip', ArsipController::class);  
    Route::get('/pengurus/home/arsip/{id}/download', [ArsipController::class, 'download'])->name('arsip.download');
    Route::resource('/pengurus/home/artikel', ArtikelController::class);
    Route::resource('/pengurus/home/surat', SuratController::class);  
    Route::get('/pengurus/home/surat/{id}/download', [SuratController::class, 'download'])->name('surat.download');
    Route::resource('/pengurus/home/permohonan', PermohonanController::class);
    Route::put('/pengurus/home/permohonan/approve', [PermohonanController::class, 'approve']);
});

Route::middleware(['auth', 'role:anggota'])->group(function () {
    Route::get('/anggota/home', [HomeController::class, 'anggotaHome'])->name('anggota.home');
    Route::get('/anggota/home/profile', ProfileController::class, 'index')->name('profile.index');
    Route::get('/anggota/home/profile/setting', ProfileController::class, 'edit')->name('profile.edit');
    Route::put('/anggota/home/profile/setting', ProfileController::class, 'update')->name('profile.update');
    Route::resource('/anggota/home/permohonan', PermohonanController::class);
});

Route::get('logout', [LoginController::class,'logout']);