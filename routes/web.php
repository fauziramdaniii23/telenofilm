<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
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

    // prewedding category
    Route::get('/dashboard/prewedding', [ImagePreweddingController::class, 'index'])->name('admin.prewedding');
       
    //wedding category
    Route::delete('/dashboard/user/{userId}', [ImageWeddingController::class, 'deleteUserWedding'])->name('delete.user.wedding');
    Route::get('/dashboard/{categoryName}', [ImageWeddingController::class, 'wedding'])->name('admin.wedding');
    Route::get('/dashboard/user/{categoryName}', [ImageWeddingController::class, 'searchUserWedding'])->name('user.search.wedding');
    Route::get('/dashboard/wedding/add', [ImageWeddingController::class, 'create'])->name('create');
    Route::post('/dashboard/wedding/add', [ImageWeddingController::class, 'store'])->name('store');
    Route::get('/dashboard/wedding/add/{userId}', [ImageWeddingController::class, 'addPhotos'])->name('addWeddingPhotos');
    Route::get('/dashboard/wedding/show/{userId}', [ImageWeddingController::class, 'showPhotos'])->name('showWedding');
    Route::post('/dashboard/wedding/add/', [ImageWeddingController::class, 'uploadImage'])->name('imageWeddingUpload');
    Route::get('/users/autocomplete', [ImageWeddingController::class, 'autocomplete'])->name('users.autocomplete');


    
});
Route::middleware(['auth', 'role:user'])->group(function(){
    //
});
