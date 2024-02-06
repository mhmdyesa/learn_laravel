<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// Route::get('/siswa', [SiswaController::class,'index'])->name('Siswa.index');
// Route::get('/siswa/create', [SiswaController::class,'create'])->name('Siswa.create');
// Route::post('/siswa', [SiswaController::class,'store'])->name('Siswa.store');
// Route::get('/siswa/{id}/edit', [SiswaController::class,'edit'])->name('Siswa.edit');
// Route::put('/siswa/{id}', [SiswaController::class,'update'])->name('Siswa.update');
// Route::delete('/siswa/{id}', [SiswaController::class,'destroy'])->name('Siswa.delete');

Route::resource('siswa', SiswaController::class)->middleware('auth');