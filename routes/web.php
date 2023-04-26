<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Routes For User Profile
    Route::group(['prefix' => '/user_profile', 'as' => 'profile.',], function () {
        Route::get('/', [UserDetailsController::class, 'index'])->name('userProfile');
        Route::get('/create', [UserDetailsController::class, 'create'])->name('create');
        Route::post('/store', [UserDetailsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserDetailsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UserDetailsController::class, 'update'])->name('updateProfile');
    });


    Route::middleware('profile_check')->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::group(['prefix' => '/user', 'as' => 'user.',], function () {
            Route::get('/', [UserController::class, 'index'])->name('allUser');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => '/settings', 'as' => 'settings.',], function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::post('/update', [SettingController::class, 'update'])->name('update');
        });
    });
});

require __DIR__ . '/auth.php';
