<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\Post\BookController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\LogMiddleware;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [PagesController::class, 'homePage'])->name('home')->middleware(LogMiddleware::class);
Route::view('/contact', 'pages.contact')->name('contact')->middleware(LogMiddleware::class);
Route::get('/search', [SearchController::class, 'index'])->name('search')->middleware(LogMiddleware::class);
Route::get('/single/{id}', [BookController::class, 'show'])->name('single')->middleware(LogMiddleware::class);
Route::get('/author/{author}', [PagesController::class, 'authorPage'])->name('author')->middleware(LogMiddleware::class);
Route::get('/category/{id}', [CategoryController::class, 'showOne'])->name('category')->middleware(LogMiddleware::class);
Route::post('/message', [MessageController::class, 'store'])->name('message')->middleware(LogMiddleware::class);
Route::post('/comment', [CommentController::class, 'store'])->name('comment')->middleware(LogMiddleware::class);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/add', [BookController::class, 'addToFav'])->name('posts.addToFav');
Route::delete('/remove', [BookController::class, 'removeFromFav'])->name('posts.removeFromFav');

Route::redirect('/home', '/')->name('home.redirect');

Route::middleware('guest')->group(function () {
    Route::get('register', [AuthController::class, 'registerPage'])->name('register');
    Route::post('register', [AuthController::class, 'store'])->name('register.store');
    Route::get('login', [AuthController::class, 'loginPage'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.login');
});

Route::fallback(function () {
    return view('pages.404');
});





