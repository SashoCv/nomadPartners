<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::put('blogs/edit/{id}', [BlogController::class, 'update'])->name("admin.updateBlog");
    Route::post('blogs/picture', [BlogController::class, 'updatePicture'])->name("admin.updatePicture");
    Route::get('edit-blog-post/{id}', [BlogController::class, 'edit'])->name('admin.editBlogPost');
    Route::delete('delete-blog-post/{id}', [BlogController::class, 'destroy'])->name('admin.deleteBlogPost');


    Route::get('home-page', [HomeController::class, 'index'])->name("admin.homePageView");
    Route::get('home-page-edit', [HomeController::class, 'edit'])->name("admin.homeViewForUpdate");
    Route::put('home-page-edit/{id}', [HomeController::class, 'update'])->name("admin.homePageUpdate");
    Route::post('home-page', [HomeController::class, 'store'])->name("admin.homePagePost");


    Route::get('about-us', [AboutUsController::class, 'index'])->name("admin.aboutUsView");
    Route::get('about-us-edit', [AboutUsController::class, 'edit'])->name("admin.aboutUsViewForUpdate");
    Route::post('about-us', [AboutUsController::class, 'store'])->name("admin.aboutUsPost");
    Route::put('about-us-edit/{id}', [AboutUsController::class, 'update'])->name("admin.aboutUsUpdate");


    Route::get('partners', [PartnerController::class, 'index'])->name("admin.partnersView");
    Route::post('partners', [PartnerController::class, 'store'])->name("admin.partnersPost");
    Route::delete('partners/{id}', [PartnerController::class, 'destroy'])->name("admin.deletePartner");

    Route::get('contact', [ContactController::class, 'index'])->name("admin.contactView");
    Route::post('contact', [ContactController::class, 'store'])->name("admin.contactPost");
    Route::get('contact-edit', [ContactController::class, 'edit'])->name("admin.contactViewForUpdate");
    Route::put('contact-edit/{id}', [ContactController::class, 'update'])->name("admin.contactUpdate");

    Route::get('dashboard', [ContactFormController::class, 'index'])->name("admin.dashboardView");

    Route::post('logout', [UserController::class, 'logout'])->name("admin.logout");
});     