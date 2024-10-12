<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\BusinessFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\TeamMembersController;
use App\Http\Controllers\BlogPageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OurBusinessPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceBoxController;
use App\Http\Controllers\BoxAboutUsController;

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
    Route::put('bogs-page-update/{id}', [BlogPageController::class, 'update'])->name('admin.updateBlogPage');


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
    Route::put('/partners/{id}', [PartnerController::class, 'update'])->name('admin.updatePartner');
    Route::delete('partners/{id}', [PartnerController::class, 'destroy'])->name("admin.deletePartner");
    Route::put('partners/{id}', [PartnerController::class, 'updatePartnersInfo'])->name("admin.updatePartnerInfo");
    

    Route::get('team-members', [TeamMembersController::class, 'index'])->name("admin.teamMembersView");
    Route::post('team-members', [TeamMembersController::class, 'store'])->name("admin.teamMembersPost");
    Route::put('team-members/{id}', [TeamMembersController::class, 'update'])->name('admin.updateTeamMember');
    Route::delete('team-members/{id}', [TeamMembersController::class, 'destroy'])->name("admin.deleteTeamMember");
    Route::put('teams/{id}', [TeamController::class, 'update'])->name('admin.updateTeam');

    Route::get('contact', [ContactController::class, 'index'])->name("admin.contactView");
    Route::post('contact', [ContactController::class, 'store'])->name("admin.contactPost");
    Route::get('contact-edit', [ContactController::class, 'edit'])->name("admin.contactViewForUpdate");
    Route::put('contact-edit/{id}', [ContactController::class, 'update'])->name("admin.contactUpdate");


    Route::get('business-submits', [BusinessFormController::class, 'index'])->name("admin.forBusinessView");
    Route::post('business', [BusinessFormController::class, 'store'])->name("admin.forBusinessPost");
    Route::put('our-business-update/{id}', [OurBusinessPageController::class, 'update'])->name("admin.updateBusiness");
    Route::delete('delete-business-submit/{id}', [BusinessFormController::class, 'destroy'])->name('admin.deleteBusinessSubmit');


    Route::get('contact-submits', [ContactFormController::class, 'index'])->name("admin.contactUsSubmitView");
    Route::delete('delete-contact-submit/{id}', [ContactFormController::class, 'destroy'])->name('admin.deleteContactSubmit');


    Route::get('services', [ServiceController::class, 'index'])->name("admin.servicesView");
    Route::put('services/update/{id}', [ServiceController::class, 'update'])->name("services.update");
    Route::post('servicesBox/create', [ServiceBoxController::class, 'store'])->name("servicesBox.create");
    Route::get('servicesBox/edit/{id}', [ServiceBoxController::class, 'edit'])->name("servicesBox.edit");
    Route::put('servicesBox/update/{id}', [ServiceBoxController::class, 'update'])->name("servicesBox.update");
    Route::delete('servicesBox/delete/{id}', [ServiceBoxController::class, 'destroy'])->name("servicesBox.destroy");


    Route::post('about-us-box-store', [BoxAboutUsController::class, 'store'])->name("admin.boxAboutUsPost");
    Route::put('about-us-box-update', [BoxAboutUsController::class, 'update'])->name("admin.boxAboutUsUpdate");
    Route::delete('about-us-box-delete/{id}', [BoxAboutUsController::class, 'destroy'])->name("admin.deleteBoxAboutUs");
    Route::get('about-us-box-edit/{id}', [BoxAboutUsController::class, 'edit'])->name("admin.editBoxAboutUs");


    Route::post('logout', [UserController::class, 'logout'])->name("admin.logout");
});

