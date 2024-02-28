<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [PostController::class, 'index'])->name('post.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->name('users');
    Route::patch('/change-status/{id}', [AdminController::class, 'changeStatus'])->name('change-status');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/my-posts', [MyPostController::class, 'index'])->name('my-post.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/expired', [PostController::class, 'expired'])->name('expired');

Route::prefix('post')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/add-post', [PostController::class,'create'])->name('post.add-post');
    Route::get('/show-post:{id}', [PostController::class,'show'])->name('post.show-post');
    Route::post('/store-post', [PostController::class,'store'])->name('post.store-post');
    Route::delete('/delete-post:{id}', [PostController::class,'destroy'])->name('post.delete-post');
    Route::get('/edit-post:{id}', [PostController::class,'edit'])->name('post.edit-post');
    Route::put('/update-post/{id}', [PostController::class, 'update'])->name('post.update-post');
    Route::post('/toggle-invite/{post}', [PostController::class, 'toggleInvite'])->name('post.toggleInvite');
});



// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [Controller::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [Controller::class, 'register']);

Route::post('/logout', [Controller::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
