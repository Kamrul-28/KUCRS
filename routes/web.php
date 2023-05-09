<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDetailsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/docs', function () {
    return view('swagger.index');
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

        Route::middleware('admin_check')->group(function () {

            // Routes For Users
            Route::group(['prefix' => '/user', 'as' => 'user.',], function () {
                Route::get('/', [UserController::class, 'index'])->name('allUser');
                Route::get('/create', [UserController::class, 'create'])->name('create');
                Route::post('/store', [UserController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
            });

            // Routes For Settings
            Route::group(['prefix' => '/settings', 'as' => 'settings.',], function () {
                Route::get('/', [SettingController::class, 'index'])->name('index');
                Route::post('/update', [SettingController::class, 'update'])->name('update');
            });

            // Routes For University Model
            Route::group(['prefix' => '/university', 'as' => 'university.',], function () {
                Route::get('/', [UniversityController::class, 'index'])->name('universitys');
                Route::get('/create', [UniversityController::class, 'create'])->name('create');
                Route::post('/store', [UniversityController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [UniversityController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [UniversityController::class, 'update'])->name('update');
            });

            // Routes For School Model
            Route::group(['prefix' => '/school', 'as' => 'school.',], function () {
                Route::get('/', [SchoolController::class, 'index'])->name('schools');
                Route::get('/create', [SchoolController::class, 'create'])->name('create');
                Route::post('/store', [SchoolController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [SchoolController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [SchoolController::class, 'update'])->name('update');
            });

            // Routes For discipline Model
            Route::group(['prefix' => '/discipline', 'as' => 'discipline.',], function () {
                Route::get('/', [DisciplineController::class, 'index'])->name('disciplines');
                Route::get('/create', [DisciplineController::class, 'create'])->name('create');
                Route::post('/store', [DisciplineController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [DisciplineController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [DisciplineController::class, 'update'])->name('update');
            });

            // Routes For course Model
            Route::group(['prefix' => '/course', 'as' => 'course.',], function () {
                Route::get('/', [CourseController::class, 'index'])->name('courses');
                Route::get('/create', [CourseController::class, 'create'])->name('create');
                Route::post('/store', [CourseController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [CourseController::class, 'update'])->name('update');
                Route::get('/offered', [CourseController::class, 'offered'])->name('offered');
            });

            // Routes For permission Model
            Route::group(['prefix' => '/permission', 'as' => 'permission.',], function () {
                Route::get('/', [PermissionController::class, 'index'])->name('permissions');
                Route::get('/create', [PermissionController::class, 'create'])->name('create');
                Route::post('/store', [PermissionController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [PermissionController::class, 'update'])->name('update');
            });

            // Routes For ROle Model
            Route::group(['prefix' => '/role', 'as' => 'role.',], function () {
                Route::get('/', [RoleController::class, 'index'])->name('roles');
                Route::get('/create', [RoleController::class, 'create'])->name('create');
                Route::post('/store', [RoleController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
                Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
            });
        });
        // Routes For registration Model
        Route::group(['prefix' => '/registration', 'as' => 'registration.',], function () {
            Route::get('/', [RegistrationController::class, 'index'])->name('registrations');
            Route::get('/registrationCard', [RegistrationController::class, 'registrationCard'])->name('registrationCard');
            Route::get('/create', [RegistrationController::class, 'create'])->name('create');
            Route::post('/store', [RegistrationController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [RegistrationController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [RegistrationController::class, 'update'])->name('update');
            Route::get('/complete/{id}', [RegistrationController::class, 'complete'])->name('complete');
            Route::post('/add-registered-course/{id}', [RegistrationController::class, 'addRegisteredCourse'])->name('add-registered-course');
            Route::get('/complete-registration/{id}', [RegistrationController::class, 'completeRegistration'])->name('complete-registration');
            Route::get('/complete-registration-payment/{id}', [RegistrationController::class, 'completeRegistrationPayment'])->name('complete-registration-payment');

            Route::get('/pay/{id}', [RegistrationController::class, 'pay'])->name('pay');
        });

        // Routes For Mark
        Route::group(['prefix' => '/mark', 'as' => 'mark.',], function () {
            Route::get('/', [MarkController::class, 'index'])->name('marks');
            Route::post('/create', [MarkController::class, 'create'])->name('create');
            Route::get('/generate/{id}', [MarkController::class, 'generate'])->name('generate');
            Route::post('/store', [MarkController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [MarkController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [MarkController::class, 'update'])->name('update');
        });

        // Routes For registration Model
        Route::group(['prefix' => '/search', 'as' => 'search.',], function () {
            Route::post('/offered-courses', [SearchController::class, 'offeredCourses'])->name('offered-courses');
        });
    });
});

require __DIR__ . '/auth.php';
