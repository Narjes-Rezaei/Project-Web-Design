<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MatchVideoController;
use App\Http\Controllers\Home\MasterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
 // index
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








// admin
Route::get('/zodiac',[AdminController::class , 'admin'])->name('zodiac');
Route::get('/show-match-video',[MatchVideoController::class , 'showMatchVideo'])->name('show-match-video');
Route::get('/add-match-video',[MatchVideoController::class , 'addMatchVideo'])->name('add-match-video');
Route::post('/store-match-video',[MatchVideoController::class , 'storeMatchVideo'])->name('store-match-video');
Route::get('/edit-match-video{id}',[MatchVideoController::class , 'editMatchVideo'])->name('edit-match-video');
Route::put('/update-match-video{id}',[MatchVideoController::class , 'updateMatchVideo'])->name('update-match-video');
Route::get('/remove-match-video/{id}',[MatchVideoController::class , 'removeMatchVideo'])->name('remove-match-video');




require __DIR__.'/auth.php';
