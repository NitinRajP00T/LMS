<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Instructor\DashboardController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\Instructor\AnalyticsController;
use App\Http\Controllers\Instructor\EarningsController;
use App\Http\Controllers\Instructor\ProfileController;
use App\Http\Controllers\Instructor\SettingsController;
use App\Http\Controllers\Instructor\StudentInteractionController;
use App\Http\Controllers\Instructor\CouponController;

/*
|--------------------------------------------------------------------------
| Instructor Routes
|--------------------------------------------------------------------------
| All routes for authenticated instructor users
*/

Route::middleware(['auth', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Courses (Full CRUD)
    Route::resource('courses', CourseController::class);
    Route::post('/courses/{course}/publish', [CourseController::class, 'publish'])->name('courses.publish');
    Route::post('/courses/{course}/unpublish', [CourseController::class, 'unpublish'])->name('courses.unpublish');
    Route::get('/courses/{course}/curriculum', function() { return view('instructor.courses.curriculum'); })->name('courses.curriculum');
    Route::get('/courses/{course}/pricing', function() { return view('instructor.courses.pricing'); })->name('courses.pricing');

    // Analytics
    Route::prefix('analytics')->name('analytics.')->group(function () {
        Route::get('/', [AnalyticsController::class, 'index'])->name('index');
        Route::get('/revenue', [AnalyticsController::class, 'revenue'])->name('revenue');
    });

    // Earnings & Payments
    Route::prefix('earnings')->name('earnings.')->group(function () {
        Route::get('/', [EarningsController::class, 'index'])->name('index');
        Route::get('/payments', [EarningsController::class, 'payments'])->name('payments');
    });

    // Students & Interactions
    Route::prefix('students')->name('students.')->group(function () {
        Route::get('/', [StudentInteractionController::class, 'index'])->name('index');
        Route::get('/interactions', [StudentInteractionController::class, 'interactions'])->name('interactions');
    });

    // Coupons
    Route::resource('coupons', CouponController::class);

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/', [ProfileController::class, 'update'])->name('update');
    });

    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::put('/', [SettingsController::class, 'update'])->name('update');
    });
});
