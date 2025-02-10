<?php

use App\Http\Controllers\BantuanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\PenerimaBantuanController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('bantuan', BantuanController::class)->middleware('auth');
Route::get('/exportPdfBantuan', [BantuanController::class, 'exportPdf'])->name('exportPdfBantuan');

//penerima
Route::resource('penerima', PenerimaController::class)->middleware('auth');
Route::get('/get-villages/{district_id}', [PenerimaController::class, 'getVillages']);
Route::get('/exportPdfPenerima', [PenerimaController::class, 'exportPdfPenerima'])->name('exportPdfPenerima');
Route::get('/exportPdfPenerimaByDistrict', [PenerimaController::class, 'exportPdfPenerimaByDistrict'])->name('exportPdfPenerimaByDistrict');

//rumah
Route::resource('rumah', RumahController::class)->middleware('auth');
Route::get('/exportPdfRumah', [RumahController::class, 'exportPdfRumah'])->name('exportPdfRumah');

//penerima bantuan
Route::resource('penerima-bantuan', PenerimaBantuanController::class)->middleware('auth');
Route::get('/exportPdfPenerimaBantuan', [PenerimaBantuanController::class, 'exportPdfPenerimaBantuan'])->name('exportPdfPenerimaBantuan');

require __DIR__.'/auth.php';
