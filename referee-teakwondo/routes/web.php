<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/',[MasterController::class , 'master'])->name('/');
Route::get('/matches',[MasterController::class , 'matches'])->name('matches');
Route::get('/players',[MasterController::class , 'players'])->name('players');
Route::get('/blog',[MasterController::class , 'blog'])->name('blog');
Route::get('/contact',[MasterController::class , 'contact'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
