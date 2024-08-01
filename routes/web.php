<?php

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('noticias', NoticiaController::class);
Route::get('/', [NoticiaController::class, 'home' ])->name('home');
Route::get('/teste', [NoticiaController::class, 'index'])->name('dashboard');
Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
Route::post('/noticias/store', [NoticiaController::class, 'store'])->name('noticias.store');
Route::get('/noticias/edit/{noticia}', [NoticiaController::class, 'edit'])->name('noticias.edit');
Route::put('/noticias/update/{noticia}', [NoticiaController::class, 'update'])->name('noticias.update');
Route::delete('/noticias/{id}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');


require __DIR__.'/auth.php';
