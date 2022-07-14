<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->group(function (){
    Route::name('auth.')->middleware('auth')->group(function (){
        Route::name('admin.')->middleware('admin')->group(function (){
            Route::get('users', [AdminController::class, 'index'])->name('users');
            Route::get('users/edit/{id}', [AdminController::class, 'edit'])->name('edit');
            Route::put('users/edit/{id}', [AdminController::class, 'update'])->name('update');
            Route::get('categories', [CategoryController::class, 'index'])->name('categories');
            Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('categories/create', [CategoryController::class, 'store'])->name('categories.store');
            Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::put('categories/edit/{id}', [CategoryController::class, 'update'])->name('categories.update');
            Route::get('messages', [MessageController::class, 'show'])->name('messages');
            Route::delete('messages/{id}', [MessageController::class, 'delete'])->name('messages.delete');
        });
    });
});


