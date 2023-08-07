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
<<<<<<< HEAD
Route::get('/apply-form', [ApplyFormController::class, 'showForm'])->name('apply');
Route::post('/submit-form', [ApplyFormController::class, 'submitForm'])->name('submit-form');
Route::get('/list', [ListController::class, 'index'])->name('index');
Route::get('/list/search', [PostController::class, 'search'])->name('lists.search');
=======
Route::get('/home/apply/{id}', [ApplyFormController::class, 'showForm'])->name('apply');
Route::post('/submit-form/{id}', [ApplyFormController::class, 'submitForm'])->name('submit-form');
Route::get('/list', [ListController::class, 'index'])->name('index');
Route::get('/list/search', [ListController::class, 'search'])->name('lists.search');
Route::delete('/list/{id}', [ListController::class, 'delete'])->name('list.delete');
Route::get('/list/{id}', [ListController::class, 'view'])->name('list.view');
Route::get('/check', [ListController::class, 'check'])->name('check');
Route::post('/update-status/{id}/{status}', [ListController::class, 'updateStatus'])->name('update.status');
>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1
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


<<<<<<< HEAD
    Route::get('home/apply/{id}', [HomeController::class, 'apply']);
    Route::post('home/apply/{id}', [HomeController::class, 'apply_p']);
=======
>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1

    Route::get('result', [HomeController::class, 'result']);

    // Route::get('posting', [HomeController::class, 'posting']);
<<<<<<< HEAD


    Route::prefix('report')->group(function () {
        Route::prefix('mitra')->group(function () {
            Route::get('pendaftaran-mitra', [ReportController::class, 'pendaftaran_mitra']);
            Route::get('transaksi', [ReportController::class, 'transaksi_mitra']);
        });


        Route::get('vote-ml', [ReportController::class, 'vote_ml']);
        Route::get('pendaftaran', [ReportController::class, 'pendaftaran']);
    });
=======

>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1


<<<<<<< HEAD
        Route::prefix('akes-user')->group(function () {
            Route::get('tipe-user', [SettingController::class, 'website']);
            Route::get('hak-akses', [SettingController::class, 'website']);
            Route::get('data-user', [SettingController::class, 'website']);

        });

        Route::prefix('mitra')->group(function () {
            Route::get('produk-mitra', [SettingController::class, 'produk_mitra']);
            Route::get('produk-mitra/tambah', [SettingController::class, 'produk_mitra_add']);
            Route::post('produk-mitra/tambah', [SettingController::class, 'produk_mitra_add_p']);
            Route::get('produk-mitra/edit', [SettingController::class, 'produk_mitra_edit']);
            Route::post('produk-mitra/edit', [SettingController::class, 'produk_mitra_edit_p']);
            Route::get('transaksi', [ReportController::class, 'transaksi_mitra']);
        });


        Route::get('tim-ml', [SettingController::class, 'tim_ml']);
        Route::get('tim-ml/tambah', [SettingController::class, 'tim_ml_add']);
        Route::post('tim-ml/tambah', [SettingController::class, 'tim_ml_add_p']);
        Route::get('tim-ml/edit', [SettingController::class, 'tim_ml_edit']);
        Route::post('tim-ml/edit', [SettingController::class, 'tim_ml_edit_p']);
    });

=======
>>>>>>> 5c14f8cc8092cc49e1a27e1c298a9b691ff3acc1
});



