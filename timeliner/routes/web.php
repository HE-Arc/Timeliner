<?php

use App\Http\Controllers\TimelineController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TimelineController::class, 'index'])->name('home');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('timeline', TimelineController::class)->middleware(['auth', 'verified']);

Route::post('comment', [CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comment.store');
Route::delete('comment/{comment}', [CommentController::class, 'destroy'])->middleware(['auth', 'verified'])->name('comment.destroy');
Route::put('comment/{comment}', [CommentController::class, 'update'])->middleware(['auth', 'verified'])->name('comment.update');