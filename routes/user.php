<?php

use App\Http\Controllers\Post\BookController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;



Route::prefix('user')->middleware(['auth', 'user'])->group(function (){
    Route::get('private', function () {return view('pages.private');})->name('private');
    Route::get('settings', [UserController::class, 'index'])->name('settings');
    Route::post('settings', [UserController::class, 'update'])->name('settings.update');
    Route::get('posts', [BookController::class, 'index'])->name('posts');
    Route::get('posts/create', [BookController::class, 'create'])->name('posts.create');
    Route::post('posts/create', [BookController::class, 'store'])->name('posts.store');
    Route::get('posts/edit/{id}', [BookController::class, 'edit'])->name('posts.edit');
    Route::put('posts/update/{id}', [BookController::class, 'update'])->name('posts.update');
    Route::delete('posts/{id}', [BookController::class, 'delete'])->name('posts.delete');

});
