<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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



Route::get('login', [UserController::class, 'index'])->name("loginView");
Route::get('/', [UserController::class, 'index']);
Route::post('login', [UserController::class, 'login'])->name("loginPost");

Route::middleware(['admin'])->group(function () {
    Route::get('blogs', [BlogController::class, 'index'])->name("admin.blogsView");
    Route::get('blogs/create', [BlogController::class, 'create'])->name("admin.createBlogView");
    Route::post('blogs/create', [BlogController::class, 'store'])->name("admin.createBlogPost");
});