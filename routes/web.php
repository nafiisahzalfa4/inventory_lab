<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\AlatController;
use App\Http\Controllers\Admin\PeminjamanController;


/*
|--------------------------------------------------------------------------
| KATEGORI
|--------------------------------------------------------------------------
*/
Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('/admin/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


/*
|--------------------------------------------------------------------------
| PETUGAS
|--------------------------------------------------------------------------
*/
Route::get('/admin/petugas', [PetugasController::class, 'index'])->name('petugas.index');
Route::get('/admin/petugas/create', [PetugasController::class, 'create'])->name('petugas.create');
Route::post('/admin/petugas', [PetugasController::class, 'store'])->name('petugas.store');
Route::get('/admin/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
Route::put('/admin/petugas/{id}', [PetugasController::class, 'update'])->name('petugas.update');
Route::delete('/admin/petugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');


/*
|--------------------------------------------------------------------------
| RUANGAN
|--------------------------------------------------------------------------
*/
Route::get('/admin/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
Route::get('/admin/ruangan/create', [RuanganController::class, 'create'])->name('ruangan.create');
Route::post('/admin/ruangan', [RuanganController::class, 'store'])->name('ruangan.store');
Route::get('/admin/ruangan/{id}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
Route::put('/admin/ruangan/{id}', [RuanganController::class, 'update'])->name('ruangan.update');
Route::delete('/admin/ruangan/{id}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');


/*
|--------------------------------------------------------------------------
| ALAT
|--------------------------------------------------------------------------
*/
Route::get('/admin/alat', [AlatController::class, 'index'])->name('alat.index');
Route::get('/admin/alat/create', [AlatController::class, 'create'])->name('alat.create');
Route::post('/admin/alat', [AlatController::class, 'store'])->name('alat.store');
Route::get('/admin/alat/{id}/edit', [AlatController::class, 'edit'])->name('alat.edit');
Route::put('/admin/alat/{id}', [AlatController::class, 'update'])->name('alat.update');
Route::delete('/admin/alat/{id}', [AlatController::class, 'destroy'])->name('alat.destroy');


/*
|--------------------------------------------------------------------------
| PEMINJAMAN
|--------------------------------------------------------------------------
*/
Route::get('/admin/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/admin/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/admin/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('/admin/peminjaman/{id}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('/admin/peminjaman/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
Route::delete('/admin/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');