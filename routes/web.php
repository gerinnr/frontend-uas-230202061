<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\MahasiswaController;


Route::get('/', function () {
    return view('homepage');
});

Route::resource('matkul', MatkulController::class);

Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/export-pdf', [MahasiswaController::class, 'exportPdf'])->name('export.pdf');

Route::get('/export-pdf', [MatkulController::class, 'exportPdf'])->name('export.pdf');