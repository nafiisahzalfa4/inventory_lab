<?php

use Illuminate\Support\Facades\Route;

// CONTROLLER ADMIN
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\RuanganController;
use App\Http\Controllers\Admin\AlatController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PeminjamanController as AdminPeminjamanController;

// CONTROLLER PETUGAS
use App\Http\Controllers\Petugas\PeminjamanController as PetugasPeminjamanController;

use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['role:admin'])->group(function () {

    // USER
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    // KATEGORI
    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/admin/kategori/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    // PETUGAS
    Route::get('/admin/petugas', [PetugasController::class, 'index'])->name('admin.petugas.index');
    Route::get('/admin/petugas/create', [PetugasController::class, 'create'])->name('admin.petugas.create');
    Route::post('/admin/petugas', [PetugasController::class, 'store'])->name('admin.petugas.store');
    Route::get('/admin/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('admin.petugas.edit');
    Route::put('/admin/petugas/{id}', [PetugasController::class, 'update'])->name('admin.petugas.update');
    Route::delete('/admin/petugas/{id}', [PetugasController::class, 'destroy'])->name('admin.petugas.destroy');

    // RUANGAN
    Route::get('/admin/ruangan', [RuanganController::class, 'index'])->name('admin.ruangan.index');
    Route::get('/admin/ruangan/create', [RuanganController::class, 'create'])->name('admin.ruangan.create');
    Route::post('/admin/ruangan', [RuanganController::class, 'store'])->name('admin.ruangan.store');
    Route::get('/admin/ruangan/{id}/edit', [RuanganController::class, 'edit'])->name('admin.ruangan.edit');
    Route::put('/admin/ruangan/{id}', [RuanganController::class, 'update'])->name('admin.ruangan.update');
    Route::delete('/admin/ruangan/{id}', [RuanganController::class, 'destroy'])->name('admin.ruangan.destroy');

    // ALAT
    Route::get('/admin/alat', [AlatController::class, 'index'])->name('admin.alat.index');
    Route::get('/admin/alat/create', [AlatController::class, 'create'])->name('admin.alat.create');
    Route::post('/admin/alat', [AlatController::class, 'store'])->name('admin.alat.store');
    Route::get('/admin/alat/{id}/edit', [AlatController::class, 'edit'])->name('admin.alat.edit');
    Route::put('/admin/alat/{id}', [AlatController::class, 'update'])->name('admin.alat.update');
    Route::delete('/admin/alat/{id}', [AlatController::class, 'destroy'])->name('admin.alat.destroy');

    // PEMINJAMAN ADMIN
    Route::get('/admin/peminjaman', [AdminPeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    Route::get('/admin/peminjaman/create', [AdminPeminjamanController::class, 'create'])->name('admin.peminjaman.create');
    Route::post('/admin/peminjaman', [AdminPeminjamanController::class, 'store'])->name('admin.peminjaman.store');
    Route::get('/admin/peminjaman/{id}/edit', [AdminPeminjamanController::class, 'edit'])->name('admin.peminjaman.edit');
    Route::put('/admin/peminjaman/{id}', [AdminPeminjamanController::class, 'update'])->name('admin.peminjaman.update');
    Route::delete('/admin/peminjaman/{id}', [AdminPeminjamanController::class, 'destroy'])->name('admin.peminjaman.destroy');
});


/*
|--------------------------------------------------------------------------
| PETUGAS AREA
|--------------------------------------------------------------------------
*/
Route::middleware(['role:petugas'])->group(function () {

    Route::get('/petugas/peminjaman', [PetugasPeminjamanController::class, 'index'])->name('petugas.peminjaman.index');
    Route::get('/petugas/peminjaman/create', [PetugasPeminjamanController::class, 'create'])->name('petugas.peminjaman.create');
    Route::post('/petugas/peminjaman', [PetugasPeminjamanController::class, 'store'])->name('petugas.peminjaman.store');
    Route::get('/petugas/peminjaman/{id}/edit', [PetugasPeminjamanController::class, 'edit'])->name('petugas.peminjaman.edit');
    Route::put('/petugas/peminjaman/{id}', [PetugasPeminjamanController::class, 'update'])->name('petugas.peminjaman.update');
    Route::delete('/petugas/peminjaman/{id}', [PetugasPeminjamanController::class, 'destroy'])->name('petugas.peminjaman.destroy');
});