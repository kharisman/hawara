<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ApplyFormController;
use App\Http\Controllers\PostController;

//Applicant Family Controller
Route::get('/home/apply/{id}', [ApplyFormController::class, 'showForm'])->name('apply');
Route::post('/submit-form/{id}', [ApplyFormController::class, 'submitForm'])->name('submit-form');
Route::get('/list', [ListController::class, 'index'])->name('index');
Route::get('/list/search', [ListController::class, 'search'])->name('lists.search');
Route::delete('/list/{id}', [ListController::class, 'delete'])->name('list.delete');
Route::get('/list/{id}', [ListController::class, 'view'])->name('list.view');
Route::get('/check', [ListController::class, 'check'])->name('check');
Route::post('/update-status/{id}/{status}', [ListController::class, 'updateStatus'])->name('update.status');
// Batas Bawah Applies

//Posting Family Controller
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('edit');
Route::get('/posts/{id}', [PostController::class, 'view'])->name('view');
Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('delete');
Route::get('/posting', [PostController::class, 'index'])->name('index');
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/store-post', [PostController::class, 'store'])->name('store-post');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('update');
Route::get('/posting/search', [PostController::class, 'search'])->name('posts.search');
//Batas Bawah Posting

//Route::post('/submit-form', [FormController::class, 'store'])->name('submit-form');
//Route::get('/apply-form', 'ApplyFormController@showForm')->name('apply-form');
//Route::post('/submit-form', 'ApplyFormController@submitForm')->name('submit-form');


Route::get('/', [AuthController::class, 'front'])->name("front");
Route::post('register', [AuthController::class, 'register'])->name("register");
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);

// Route::post('/submit-form', 'FormController@submitForm')->name('submit-form');

// Route::get('/posts/{id}/view', [PostController::class, 'view'])->name('posts.view');
// Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/{id}', [PostController::class, 'delete'])->name('posts.delete');


Route::get('lupa-password', [AuthController::class, 'forget'])->name('lupa-password');
Route::post('lupa-password', [AuthController::class, 'forget_p'])->name('reset');


Route::get('konfirmasi/{token}', [AuthController::class, 'konfirmasi'])->name('konfirmasi-password');
Route::post('konfirmasi/{token}', [AuthController::class, 'konfirmasi_p']);

// Route::get('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');



    Route::get('result', [HomeController::class, 'result']);

    // Route::get('posting', [HomeController::class, 'posting']);


});



