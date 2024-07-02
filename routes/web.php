<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
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
    Route::put('blogs/edit/{id}', [BlogController::class, 'update'])->name("admin.updateBlogPost");
    Route::post('blogs/picture', [BlogController::class, 'updatePicture'])->name("admin.updatePicture");

    Route::get('edit-blog-post/{id}', [BlogController::class, 'edit'])->name('admin.editBlogPost');
    Route::delete('delete-blog-post/{id}', [BlogController::class, 'destroy'])->name('admin.deleteBlogPost');

    Route::get('home-page', [HomeController::class, 'index'])->name("admin.homePageView");


    Route::get('about-us', [AboutUsController::class, 'index'])->name("admin.aboutUsView");
});     