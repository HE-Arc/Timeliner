<?php

use App\Http\Controllers\TimelineController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TimelineController::class, 'index'])->name('home');

Route::get('about', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', [TimelineController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Make sure only timeline.show route is accessible by guest users
Route::resource('timeline', TimelineController::class)
    ->except(['show'])
    ->middleware(['auth', 'verified']);

Route::get('timeline/{timeline}', [TimelineController::class, 'show'])->name('timeline.show');


Route::post('comment', [CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('comment.store');
Route::delete('comment/{comment}', [CommentController::class, 'destroy'])->middleware(['auth', 'verified'])->name('comment.destroy');
Route::put('comment/{comment}', [CommentController::class, 'update'])->middleware(['auth', 'verified'])->name('comment.update');
