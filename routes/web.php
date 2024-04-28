<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageAdsController;
use App\Http\Controllers\ImageEngagementController;
use App\Http\Controllers\ImageEventController;
use App\Http\Controllers\ImageGraduationController;
use App\Http\Controllers\ImagePreweddingController;
use App\Http\Controllers\ImageWeddingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaketController;
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

// Route::get('/', function () {
//     return view('home');});
Route::get('/', [Controller::class, 'index'] );
Route::get('/categorie/wedding', [CategoryController::class, 'wedding'] )->name('wedding');

Route::middleware('guest')->group(function(){
        Route::get('/login', [authController::class, 'index'])->name('login');
        Route::post('/loginAttempt', [authController::class, 'login'])->name('loginAttempt');
        Route::get('/Registrasi', [authController::class, 'showRegister'])->name('register');
        Route::post('/Registrasi', [authController::class, 'register'])->name('register.create');
});

Route::middleware('auth')->group(function(){
Route::post('/logout', [authController::class, 'logout'])->name('logout');
//Order
Route::post('/order/{paketId}', [OrderController::class, 'addOrder'])->name('order');
Route::get('/order/{username}', [OrderController::class, 'dataOrder'])->name('dataOrder');
Route::get('/history/{username}', [OrderController::class, 'historyOrder'])->name('historyOrder');
Route::delete('/order/{orderId}', [OrderController::class, 'deleteUserOrder'])->name('deleteUserOrder');

//MyGalerry
Route::get('/galerry/{username}', [UserController::class, 'myGalerry'])->name('myGalerry');
Route::get('/galerry/{username}/{categoryName}', [UserController::class, 'galerry'])->name('galerry');

Route::post('/users/{userId}/{categoryId}/add', [UserController::class, 'addCategory'])->name('addCategory');
Route::post('/users/{userId}/{categoryId}/remove', [UserController::class, 'removeCategory'])->name('removeCategory');
});


Route::middleware(['auth', 'role:admin,developer'])->group(function(){
    
    //admin paket
    Route::get('/dashboard/paket', [PaketController::class, 'index'])->name('admin.paket');
    Route::put('dashboard/{OrderId}', [adminController::class, 'updateStatus'])->name('updateStatus');


    Route::get('/dashboard', [adminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/search',[adminController::class, 'searchOrder'])->name('search.order');
    Route::post('/dashboard/addpaket', [adminController::class, 'addpaket'])->name('addpaket');
    Route::post('dashboard/editpaket/{id}', [PaketController::class, 'editpaket'])->name('editpaket');
    Route::delete('dashboard/deletepaket/{id}', [adminController::class, 'deletepaket'])->name('deletepaket');
    Route::post('dashboard/editorder/{id}', [OrderController::class, 'editOrder'])->name('editOrder');
    Route::delete('dashboard/deleteOrder/{id}', [adminController::class, 'deleteOrder'])->name('deleteOrder');
    
    //admin user
    Route::get('/dashboard/users', [UserController::class, 'users'])->name('users');
    Route::get('/dashboard/users/search', [UserController::class, 'search'])->name('users.search');
    Route::post('/users/{userId}/make-admin', [UserController::class, 'makeAdmin'])->name('make.admin');
    Route::post('/users/{userId}/make-user', [UserController::class, 'makeUser'])->name('make.user');
    Route::delete('/users/{userId}', [UserController::class, 'delete'])->name('users.destroy');
    
    // ads category
    Route::get('/dashboard/ads', [ImageAdsController::class, 'index'])->name('adminAds');
    Route::get('/dashboard/ads/user/{categoryName}', [ImageAdsController::class, 'searchUserAds'])->name('searchUserAds');
    Route::get('/dashboard/ads/show/{UserId}', [ImageAdsController::class, 'showUser'])->name('showUserAds');
    Route::post('/dashboard/ads/image', [ImageAdsController::class, 'uploadImage'])->name('imageAdsUpload');
    Route::post('/dashboard/ads/video', [ImageAdsController::class, 'uploadVideo'])->name('videoAdsUpload');
    Route::delete('/dashboard/ads/{userId}', [ImageAdsController::class, 'deleteUserAds'])->name('deleteUserAds');

    // event category
    Route::get('/dashboard/event', [ImageEventController::class, 'index'])->name('adminEvent');
    Route::get('/dashboard/event/user/{categoryName}', [ImageEventController::class, 'searchUserEvent'])->name('searchUserEvent');
    Route::get('/dashboard/event/show/{UserId}', [ImageEventController::class, 'showUser'])->name('showUserEvent');
    Route::post('/dashboard/event/image', [ImageEventController::class, 'uploadImage'])->name('imageEventUpload');
    Route::post('/dashboard/event/video', [ImageEventController::class, 'uploadVideo'])->name('videoEventUpload');
    Route::delete('/dashboard/event/{userId}', [ImageEventController::class, 'deleteUserEvent'])->name('deleteUserEvent');

    // Graduation category
    Route::get('/dashboard/graduation', [ImageGraduationController::class, 'index'])->name('adminGraduation');
    Route::get('/dashboard/graduation/user/{categoryName}', [ImageGraduationController::class, 'searchUserGraduation'])->name('searchUserGraduation');
    Route::get('/dashboard/graduation/show/{UserId}', [ImageGraduationController::class, 'showUser'])->name('showUserGraduation');
    Route::post('/dashboard/graduation/image', [ImageGraduationController::class, 'uploadImage'])->name('imageGraduationUpload');
    Route::post('/dashboard/graduation/video', [ImageGraduationController::class, 'uploadVideo'])->name('videoGraduationUpload');
    Route::delete('/dashboard/graduation/{userId}', [ImageGraduationController::class, 'deleteUserGraduation'])->name('deleteUserGraduation');
    
    // engagement category
    Route::get('/dashboard/engagement', [ImageEngagementController::class, 'index'])->name('adminEngagement');
    Route::get('/dashboard/engagement/user/{categoryName}', [ImageEngagementController::class, 'searchUserEngagement'])->name('searchUserEngagement');
    Route::get('/dashboard/engagement/show/{UserId}', [ImageEngagementController::class, 'showUser'])->name('showUserEngagement');
    Route::post('/dashboard/engagement/image', [ImageEngagementController::class, 'uploadImage'])->name('imageEngagementUpload');
    Route::post('/dashboard/engagement/video', [ImageEngagementController::class, 'uploadVideo'])->name('videoEngagementUpload');
    Route::delete('/dashboard/engagement/{userId}', [ImageEngagementController::class, 'deleteUserEngagement'])->name('deleteUserEngagement');
    
    // prewedding category
    Route::get('/dashboard/prewedding', [ImagePreweddingController::class, 'index'])->name('admin.prewedding');
    Route::get('/dashboard/prewedding/user/{categoryName}', [ImagePreweddingController::class, 'searchUserPrewedding'])->name('searchUserPrewedding');
    Route::get('/dashboard/prewedding/show/{UserId}', [ImagePreweddingController::class, 'showUser'])->name('showUserPrewedding');
    Route::post('/dashboard/prewedding/image', [ImagePreweddingController::class, 'uploadImage'])->name('imagePreweddingUpload');
    Route::post('/dashboard/prewedding/video', [ImagePreweddingController::class, 'uploadVideo'])->name('videoPreweddingUpload');
    Route::delete('/dashboard/prewedding/{userId}', [ImagePreweddingController::class, 'deleteUserPrewedding'])->name('deleteUserPrewedding');
    
    //wedding category
    Route::delete('/dashboard/user/{userId}', [ImageWeddingController::class, 'deleteUserWedding'])->name('delete.user.wedding');
    Route::get('/dashboard/{categoryName}', [ImageWeddingController::class, 'wedding'])->name('admin.wedding');
    Route::get('/dashboard/user/{categoryName}', [ImageWeddingController::class, 'searchUserWedding'])->name('user.search.wedding');
    Route::get('/dashboard/wedding/show/{userId}', [ImageWeddingController::class, 'showPhotos'])->name('showWedding');
    Route::post('/dashboard/wedding/image', [ImageWeddingController::class, 'uploadImage'])->name('imageWeddingUpload');
    Route::post('/dashboard/wedding/video/', [ImageWeddingController::class, 'uploadVideo'])->name('videoWeddingUpload');
    Route::get('/users/autocomplete', [ImageWeddingController::class, 'autocomplete'])->name('users.autocomplete');
    
    

    
});
Route::middleware(['auth', 'role:user'])->group(function(){
    //
});
