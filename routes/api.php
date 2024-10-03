<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BusinessFormController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\TeamMembersController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceBoxController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// BLOGS
Route::get('blogs', [BlogController::class, 'getBlogsApi']);
Route::get('blogs/{id}', [BlogController::class, 'getBlogApi']);

// HOME PAGE
Route::get('home-page', [HomeController::class, 'getHomePageApi']);

// ABOUT US
Route::get('about-us', [AboutUsController::class, 'getAboutUsApi']);

// PARTNERS
Route::get('partners', [PartnerController::class, 'getPartnersApi']);

// TEAM MEMBERS
Route::get('team-members', [TeamMembersController::class, 'getTeamMembersApi']);

// CONTACT SECTION
Route::get('contact', [ContactController::class, 'getContactApi']);


// CONTACT
Route::post('contact', [ContactFormController::class, 'store']);

// CONTACT
Route::post('business', [BusinessFormController::class, 'store']);


// ServicesSection
Route::get('services', [ServiceController::class, 'getServicesApi']);

// ServiceBox
Route::get('service-boxes', [ServiceBoxController::class, 'index']);
Route::get('service-boxes/{id}', [ServiceBoxController::class, 'show']);

