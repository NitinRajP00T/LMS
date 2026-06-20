<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\MyLearningController;
use App\Http\Controllers\Student\CheckoutController;
use App\Http\Controllers\Student\WishlistController;
use App\Http\Controllers\Student\AIAssistantController;
use App\Http\Controllers\Student\InstructorProfileController;
use App\Http\Controllers\Student\ReviewController;
use App\Http\Controllers\Student\LessonCommentController;
use App\Http\Controllers\Student\LessonResourceController;

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
| All routes for authenticated student users
*/

// Public routes (no authentication required)
Route::get('/courses', [CourseController::class, 'browse'])->name('courses.browse');
Route::get('/courses/instructor/{instructor}', [InstructorProfileController::class, 'show'])->name('instructor.profile');
Route::get('/courses/{course}', [CourseController::class, 'detail'])->name('courses.detail');


// Protected student routes
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Student Courses
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');

    // My Learning
    Route::prefix('my-learning')->name('my-learning.')->group(function () {
        Route::get('/', [MyLearningController::class, 'index'])->name('index');
        Route::post('/{lesson}/complete', [MyLearningController::class, 'completeLesson'])->name('complete');
    });

    // Course Reviews
    Route::post('/courses/{course}/review', [ReviewController::class, 'store'])->name('courses.review');

    // Wishlist
    Route::prefix('wishlist')->name('wishlist.')->group(function () {
        Route::get('/', [WishlistController::class, 'index'])->name('index');
        Route::post('/{course}', [WishlistController::class, 'add'])->name('add');
        Route::delete('/{course}', [WishlistController::class, 'remove'])->name('remove');
    });

    // Checkout
    Route::prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/', [CheckoutController::class, 'index'])->name('index');
        Route::post('/add/{course}', [CheckoutController::class, 'add'])->name('add');
        Route::delete('/remove/{course}', [CheckoutController::class, 'remove'])->name('remove');
        Route::post('/process', [CheckoutController::class, 'process'])->name('process');
        Route::post('/verify', [CheckoutController::class, 'verify'])->name('verify');
        Route::get('/success', [CheckoutController::class, 'success'])->name('success');
    });

    // Profile
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', function() { return view('student.profile.index'); })->name('show');
        Route::get('/edit', function() { return view('student.profile.edit'); })->name('edit');
    });

    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('/', function() { return view('student.settings.index'); })->name('index');
    });

    // AI Assistant
    Route::get('/ai-assistant', function() {
        return view('student.student-ai-assistant');
    })->name('ai-assistant');
    Route::post('/ai-assistant/chat', [AIAssistantController::class, 'chat'])->name('ai-assistant.chat');
});

// Shared student/instructor routes
Route::middleware(['auth', 'role:student,instructor'])->prefix('student')->name('student.')->group(function () {
    Route::get('/my-learning/{course}/player', [MyLearningController::class, 'player'])->name('my-learning.player');
    Route::post('/my-learning/{lesson}/comment', [MyLearningController::class, 'postComment'])->name('my-learning.comment');

    // Lesson Comments API
    Route::prefix('api/lessons/{lesson}/comments')->name('lessons.comments.')->group(function () {
        Route::get('/', [LessonCommentController::class, 'index'])->name('index');
        Route::post('/', [LessonCommentController::class, 'store'])->name('store');
        Route::get('/{comment}', [LessonCommentController::class, 'show'])->name('show');
        Route::put('/{comment}', [LessonCommentController::class, 'update'])->name('update');
        Route::delete('/{comment}', [LessonCommentController::class, 'destroy'])->name('destroy');
        Route::get('/{comment}/replies', [LessonCommentController::class, 'getReplies'])->name('replies');
    });

    // Lesson Resources API
    Route::prefix('api/lessons/{lesson}/resources')->name('lessons.resources.')->group(function () {
        Route::get('/', [LessonResourceController::class, 'index'])->name('index');
        Route::post('/', [LessonResourceController::class, 'store'])->name('store');
        Route::get('/{resource}', [LessonResourceController::class, 'show'])->name('show');
        Route::put('/{resource}', [LessonResourceController::class, 'update'])->name('update');
        Route::delete('/{resource}', [LessonResourceController::class, 'destroy'])->name('destroy');
    });
});

