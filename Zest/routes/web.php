<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;

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

Route::get('/', [App\Http\Controllers\LoginController::class, 'index'])->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    // Route::get('/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    // Route::post('/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    // Route::get('/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    // Route::put('/update/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    // Route::delete('/delete/{id}', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AuthController::class, 'index'])->name('home');
