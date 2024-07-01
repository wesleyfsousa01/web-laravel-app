<?php

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::resource('noticias', NoticiaController::class);
Route::get('/', [NoticiaController::class, 'home' ])->name('home');
Route::get('/dashboard', [NoticiaController::class, 'index']);
Route::get('/noticias/create', [NoticiaController::class, 'create']);
Route::post('/noticias/store', [NoticiaController::class, 'store'])->name('noticias.store');

require __DIR__.'/auth.php';
