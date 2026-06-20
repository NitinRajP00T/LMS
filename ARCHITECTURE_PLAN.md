# Laravel LMS - Professional Architecture Restructuring Guide

## Executive Summary
This document outlines the complete restructuring of your Laravel LMS project to follow Laravel 12 best practices, industry standards, and component-based architecture similar to React.

---

## 1. RECOMMENDED FOLDER STRUCTURE

```
lms/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Controller.php                    # Base Controller
│   │   │   ├── Auth/
│   │   │   │   ├── LoginController.php
│   │   │   │   ├── RegisterController.php
│   │   │   │   └── LogoutController.php
│   │   │   ├── Student/
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── CourseController.php
│   │   │   │   ├── CheckoutController.php
│   │   │   │   └── MyLearningController.php
│   │   │   └── Instructor/
│   │   │       ├── DashboardController.php
│   │   │       ├── CourseController.php
│   │   │       ├── AnalyticsController.php
│   │   │       ├── EarningsController.php
│   │   │       ├── ProfileController.php
│   │   │       └── SettingsController.php
│   │   └── Middleware/
│   │       ├── RedirectIfAuthenticated.php
│   │       ├── StudentMiddleware.php
│   │       └── InstructorMiddleware.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Course.php
│   │   ├── Category.php
│   │   ├── Enrollment.php
│   │   └── Review.php
│   ├── Traits/
│   │   ├── HasRole.php                          # For role management
│   │   └── CanPublish.php                       # For publishable courses
│   └── Providers/
├── resources/
│   ├── views/
│   │   ├── layouts/                             # Master layouts
│   │   │   ├── app.blade.php                    # Main layout for all authenticated users
│   │   │   ├── guest.blade.php                  # Guest/public layout
│   │   │   ├── student.blade.php                # Student specific layout
│   │   │   └── instructor.blade.php             # Instructor specific layout
│   │   │
│   │   ├── components/                          # Reusable blade components
│   │   │   ├── partials/
│   │   │   │   ├── navbar.blade.php
│   │   │   │   ├── footer.blade.php
│   │   │   │   ├── head.blade.php
│   │   │   │   ├── sidebar-student.blade.php
│   │   │   │   ├── sidebar-instructor.blade.php
│   │   │   │   └── breadcrumbs.blade.php
│   │   │   ├── cards/
│   │   │   │   ├── course-card.blade.php
│   │   │   │   ├── category-card.blade.php
│   │   │   │   ├── instructor-card.blade.php
│   │   │   │   └── review-card.blade.php
│   │   │   ├── forms/
│   │   │   │   ├── course-form.blade.php
│   │   │   │   ├── search-form.blade.php
│   │   │   │   └── filter-form.blade.php
│   │   │   └── common/
│   │   │       ├── alert.blade.php
│   │   │       ├── button.blade.php
│   │   │       ├── modal.blade.php
│   │   │       ├── pagination.blade.php
│   │   │       └── loading-spinner.blade.php
│   │   │
│   │   ├── auth/                                # Authentication views
│   │   │   ├── login.blade.php
│   │   │   ├── register.blade.php
│   │   │   ├── forgot-password.blade.php
│   │   │   └── reset-password.blade.php
│   │   │
│   │   ├── student/                             # Student views
│   │   │   ├── dashboard.blade.php
│   │   │   ├── courses/
│   │   │   │   ├── index.blade.php              # Course listing
│   │   │   │   ├── show.blade.php               # Course details
│   │   │   │   ├── search.blade.php
│   │   │   │   └── learning-player.blade.php
│   │   │   ├── my-learning/
│   │   │   │   ├── index.blade.php
│   │   │   │   └── course-progress.blade.php
│   │   │   ├── checkout/
│   │   │   │   ├── index.blade.php
│   │   │   │   └── completion.blade.php
│   │   │   └── profile/
│   │   │       ├── index.blade.php
│   │   │       └── edit.blade.php
│   │   │
│   │   ├── instructor/                          # Instructor views
│   │   │   ├── dashboard.blade.php
│   │   │   ├── courses/
│   │   │   │   ├── index.blade.php              # Course management
│   │   │   │   ├── create.blade.php
│   │   │   │   ├── edit.blade.php
│   │   │   │   ├── show.blade.php
│   │   │   │   ├── curriculum.blade.php
│   │   │   │   ├── pricing.blade.php
│   │   │   │   └── publish.blade.php
│   │   │   ├── analytics/
│   │   │   │   ├── index.blade.php
│   │   │   │   └── revenue.blade.php
│   │   │   ├── students/
│   │   │   │   ├── index.blade.php
│   │   │   │   └── interactions.blade.php
│   │   │   ├── coupons/
│   │   │   │   ├── index.blade.php
│   │   │   │   ├── create.blade.php
│   │   │   │   └── edit.blade.php
│   │   │   ├── profile/
│   │   │   │   ├── index.blade.php
│   │   │   │   └── edit.blade.php
│   │   │   ├── earnings/
│   │   │   │   ├── index.blade.php
│   │   │   │   └── payments.blade.php
│   │   │   └── settings/
│   │   │       └── index.blade.php
│   │   │
│   │   ├── errors/                              # Error pages
│   │   │   ├── 403.blade.php
│   │   │   ├── 404.blade.php
│   │   │   └── 500.blade.php
│   │   │
│   │   └── welcome.blade.php                    # Homepage
│   │
│   ├── css/
│   │   └── app.css                              # Your custom CSS
│   │
│   └── js/
│       └── app.js
│
├── routes/
│   ├── web.php                                  # Main routes (refactored)
│   ├── auth.php                                 # Auth routes
│   ├── student.php                              # Student routes
│   └── instructor.php                           # Instructor routes
│
├── database/
│   ├── migrations/
│   │   ├── create_users_table
│   │   ├── create_courses_table
│   │   ├── create_categories_table
│   │   ├── create_enrollments_table
│   │   ├── create_reviews_table
│   │   ├── create_lessons_table
│   │   └── create_progress_table
│   │
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── UserSeeder.php
│       ├── CourseSeeder.php
│       └── CategorySeeder.php
│
└── public/
    ├── css/
    ├── js/
    ├── images/
    └── uploads/
        ├── courses/
        └── users/
```

---

## 2. ROUTE STRUCTURE (Modular Organization)

### routes/web.php (Main Router)
```php
<?php
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
require __DIR__ . '/auth.php';

// Student Routes
require __DIR__ . '/student.php';

// Instructor Routes
require __DIR__ . '/instructor.php';

// API Routes (optional)
// require __DIR__ . '/api.php';
```

### routes/auth.php
```php
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
    
    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::post('/logout', [LogoutController::class, 'store'])->name('logout')->middleware('auth');
```

### routes/student.php
```php
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\CourseController;
use App\Http\Controllers\Student\MyLearningController;
use App\Http\Controllers\Student\CheckoutController;

Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Courses
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/search', [CourseController::class, 'search'])->name('courses.search');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
    
    // My Learning
    Route::get('/my-learning', [MyLearningController::class, 'index'])->name('my-learning.index');
    Route::get('/my-learning/{course}/player', [MyLearningController::class, 'player'])->name('my-learning.player');
    Route::post('/my-learning/{lesson}/complete', [MyLearningController::class, 'completeLesson'])->name('my-learning.complete');
    
    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
});

// Public Student Routes (browsing)
Route::get('/courses', [CourseController::class, 'browse'])->name('courses.browse');
Route::get('/courses/{course}', [CourseController::class, 'detail'])->name('courses.detail');
```

### routes/instructor.php
```php
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

Route::middleware(['auth', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Courses (Full CRUD)
    Route::resource('courses', CourseController::class);
    Route::post('/courses/{course}/publish', [CourseController::class, 'publish'])->name('courses.publish');
    Route::post('/courses/{course}/unpublish', [CourseController::class, 'unpublish'])->name('courses.unpublish');
    Route::get('/courses/{course}/curriculum', [CourseController::class, 'curriculum'])->name('courses.curriculum');
    Route::get('/courses/{course}/pricing', [CourseController::class, 'pricing'])->name('courses.pricing');
    
    // Analytics
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');
    Route::get('/analytics/revenue', [AnalyticsController::class, 'revenue'])->name('analytics.revenue');
    
    // Earnings & Payments
    Route::get('/earnings', [EarningsController::class, 'index'])->name('earnings.index');
    Route::get('/earnings/payments', [EarningsController::class, 'payments'])->name('earnings.payments');
    
    // Student Interactions
    Route::get('/students', [StudentInteractionController::class, 'index'])->name('students.index');
    Route::get('/interactions', [StudentInteractionController::class, 'interactions'])->name('interactions.index');
    
    // Coupons
    Route::resource('coupons', CouponController::class);
    
    // Profile & Settings
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
});
```

---

## 3. CONTROLLER STRUCTURE

### Base Controller
```php
<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * Return a response with data
     */
    protected function respond($data, $message = 'Success', $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }
    
    /**
     * Return an error response
     */
    protected function respondError($message = 'Error', $errors = null, $status = 400)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}
```

### Student Controllers Example

**app/Http/Controllers/Student/CourseController.php**
```php
<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Public - Browse courses
    public function browse()
    {
        $courses = Course::published()
            ->with('instructor', 'category')
            ->paginate(12);
        
        return view('student.courses.index', compact('courses'));
    }
    
    // Public - Show course details
    public function detail(Course $course)
    {
        $course->load('instructor', 'category', 'reviews', 'lessons');
        $isEnrolled = auth()->check() && 
                     auth()->user()->enrollments()->where('course_id', $course->id)->exists();
        
        return view('student.courses.show', compact('course', 'isEnrolled'));
    }
    
    // Protected - Student course listing
    public function index()
    {
        $enrolledCourses = auth()->user()
            ->enrollments()
            ->with('course')
            ->paginate(10);
        
        return view('student.courses.index', compact('enrolledCourses'));
    }
    
    // Protected - Enroll in course
    public function enroll(Course $course)
    {
        $user = auth()->user();
        
        if ($user->enrollments()->where('course_id', $course->id)->exists()) {
            return back()->with('warning', 'Already enrolled in this course');
        }
        
        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);
        
        return redirect()->route('student.my-learning.index')
                       ->with('success', 'Successfully enrolled in course');
    }
}
```

### Instructor Controllers Example

**app/Http/Controllers/Instructor/CourseController.php**
```php
<?php
namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = auth()->user()->courses()->paginate(10);
        return view('instructor.courses.index', compact('courses'));
    }
    
    public function create()
    {
        return view('instructor.courses.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:5120',
        ]);
        
        $validated['user_id'] = auth()->id();
        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }
        
        $course = Course::create($validated);
        
        return redirect()->route('instructor.courses.edit', $course)
                       ->with('success', 'Course created successfully');
    }
    
    public function edit(Course $course)
    {
        $this->authorize('update', $course);
        return view('instructor.courses.edit', compact('course'));
    }
    
    public function update(Request $request, Course $course)
    {
        $this->authorize('update', $course);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        $course->update($validated);
        
        return back()->with('success', 'Course updated successfully');
    }
    
    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);
        
        $course->delete();
        
        return redirect()->route('instructor.courses.index')
                       ->with('success', 'Course deleted successfully');
    }
    
    public function publish(Course $course)
    {
        $this->authorize('update', $course);
        
        $course->update(['is_published' => true, 'published_at' => now()]);
        
        return back()->with('success', 'Course published successfully');
    }
}
```

---

## 4. LAYOUT STRUCTURE

### Master Layout: resources/views/layouts/app.blade.php
```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'LMS') - Udemy Clone</title>
    
    {{-- Tailwind CSS (CDN - loaded only once) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- Custom CSS --}}
    @stack('styles')
</head>
<body class="bg-gray-50">
    {{-- Navigation --}}
    @include('components.partials.navbar')
    
    <div class="flex">
        {{-- Sidebar (if user is authenticated) --}}
        @auth
            @if(auth()->user()->hasRole('student'))
                @include('components.partials.sidebar-student')
            @elseif(auth()->user()->hasRole('instructor'))
                @include('components.partials.sidebar-instructor')
            @endif
        @endauth
        
        {{-- Main Content --}}
        <main class="flex-1">
            {{-- Breadcrumbs --}}
            @if(isset($breadcrumbs))
                @include('components.partials.breadcrumbs', ['items' => $breadcrumbs])
            @endif
            
            {{-- Flash Messages --}}
            @if($errors->any())
                @include('components.common.alert', [
                    'type' => 'error',
                    'title' => 'Validation Error',
                    'message' => 'Please check the errors below'
                ])
            @endif
            
            @if(session('success'))
                @include('components.common.alert', [
                    'type' => 'success',
                    'message' => session('success')
                ])
            @endif
            
            @if(session('warning'))
                @include('components.common.alert', [
                    'type' => 'warning',
                    'message' => session('warning')
                ])
            @endif
            
            {{-- Page Content --}}
            @yield('content')
        </main>
    </div>
    
    {{-- Footer --}}
    @include('components.partials.footer')
    
    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('scripts')
</body>
</html>
```

### Student Layout: resources/views/layouts/student.blade.php
```blade
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        {{-- Student Sidebar Navigation --}}
        <aside class="hidden lg:block">
            @include('components.partials.sidebar-student')
        </aside>
        
        {{-- Main Content Area --}}
        <div class="lg:col-span-3">
            @yield('student-content')
        </div>
    </div>
</div>
@endsection
```

### Instructor Layout: resources/views/layouts/instructor.blade.php
```blade
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-5 gap-6">
        {{-- Instructor Sidebar Navigation --}}
        <aside class="hidden lg:block">
            @include('components.partials.sidebar-instructor')
        </aside>
        
        {{-- Main Content Area --}}
        <div class="lg:col-span-4">
            @yield('instructor-content')
        </div>
    </div>
</div>
@endsection
```

---

## 5. REUSABLE BLADE COMPONENTS

### components/partials/navbar.blade.php
```blade
<nav class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <i class="fas fa-graduation-cap text-blue-600 text-2xl"></i>
                <span class="text-xl font-bold text-gray-800">EduLearn</span>
            </a>
            
            {{-- Search (visible on all pages) --}}
            @unless(auth()->user()?->hasRole('instructor'))
                <div class="hidden md:block flex-1 mx-8">
                    <form method="GET" action="{{ route('courses.browse') }}" class="relative">
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Search courses..." 
                            class="w-full px-4 py-2 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                        <button type="submit" class="absolute right-3 top-2.5 text-gray-400">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            @endunless
            
            {{-- Right Navigation --}}
            <div class="flex items-center space-x-4">
                @auth
                    {{-- User Menu --}}
                    <div class="relative group">
                        <button class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}" class="w-8 h-8 rounded-full">
                            <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden group-hover:block">
                            @if(auth()->user()->hasRole('student'))
                                <a href="{{ route('student.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-home mr-2"></i>Dashboard
                                </a>
                                <a href="{{ route('student.my-learning.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-book mr-2"></i>My Learning
                                </a>
                            @elseif(auth()->user()->hasRole('instructor'))
                                <a href="{{ route('instructor.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-chart-bar mr-2"></i>Dashboard
                                </a>
                                <a href="{{ route('instructor.courses.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-book mr-2"></i>Courses
                                </a>
                            @endif
                            
                            <hr class="my-2">
                            <a href="{{ route('student.profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i>Profile
                            </a>
                            <a href="{{ route('student.settings.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-cog mr-2"></i>Settings
                            </a>
                            <hr class="my-2">
                            <form method="POST" action="{{ route('logout') }}" class="block">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 font-medium">Login</a>
                    <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
```

### components/partials/sidebar-student.blade.php
```blade
<aside class="w-64 bg-white border-r border-gray-200 h-screen sticky top-16 overflow-y-auto">
    <div class="p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6">Menu</h3>
        
        <nav class="space-y-2">
            <a href="{{ route('student.dashboard') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('student.dashboard') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-home mr-3"></i>Dashboard
            </a>
            
            <a href="{{ route('courses.browse') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('courses.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-book mr-3"></i>Explore Courses
            </a>
            
            <a href="{{ route('student.my-learning.index') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('student.my-learning.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-graduation-cap mr-3"></i>My Learning
            </a>
            
            <a href="{{ route('student.checkout.index') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('student.checkout.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-shopping-cart mr-3"></i>Cart
            </a>
            
            <a href="{{ route('student.profile.show') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('student.profile.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-user mr-3"></i>Profile
            </a>
            
            <a href="{{ route('student.settings.index') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition {{ request()->routeIs('student.settings.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-cog mr-3"></i>Settings
            </a>
        </nav>
    </div>
</aside>
```

### components/cards/course-card.blade.php
```blade
@props([
    'course',
    'showActions' => false,
])

<div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
    {{-- Course Image --}}
    <div class="relative h-48 bg-gray-200 overflow-hidden">
        @if($course->image)
            <img src="{{ Storage::url($course->image) }}" 
                 alt="{{ $course->title }}" 
                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
        @else
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-400 to-blue-600">
                <i class="fas fa-book text-white text-4xl"></i>
            </div>
        @endif
        
        {{-- Rating Badge --}}
        <div class="absolute top-3 right-3 bg-yellow-400 text-white px-3 py-1 rounded-full text-sm font-bold">
            <i class="fas fa-star"></i> {{ number_format($course->average_rating, 1) }}
        </div>
    </div>
    
    {{-- Course Info --}}
    <div class="p-4">
        {{-- Instructor --}}
        <div class="flex items-center space-x-2 mb-2">
            <img src="{{ $course->instructor->avatar_url }}" 
                 alt="{{ $course->instructor->name }}" 
                 class="w-6 h-6 rounded-full">
            <span class="text-xs text-gray-600">{{ $course->instructor->name }}</span>
        </div>
        
        {{-- Title --}}
        <h3 class="font-bold text-gray-800 mb-2 line-clamp-2 hover:text-blue-600">
            <a href="{{ route('courses.detail', $course) }}">{{ $course->title }}</a>
        </h3>
        
        {{-- Category --}}
        <p class="text-xs text-gray-500 mb-3">{{ $course->category->name }}</p>
        
        {{-- Stats --}}
        <div class="flex items-center justify-between text-xs text-gray-600 mb-4 pb-4 border-b border-gray-200">
            <span><i class="fas fa-users mr-1"></i>{{ $course->students_count }} students</span>
            <span><i class="fas fa-clock mr-1"></i>{{ $course->total_hours }}h</span>
        </div>
        
        {{-- Price & Action --}}
        <div class="flex items-center justify-between">
            <span class="text-lg font-bold text-gray-800">${{ $course->price }}</span>
            @if($showActions && auth()->user()?->hasRole('instructor'))
                <div class="space-x-2">
                    <a href="{{ route('instructor.courses.edit', $course) }}" 
                       class="text-blue-600 hover:text-blue-800 text-sm">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('instructor.courses.show', $course) }}" 
                       class="text-green-600 hover:text-green-800 text-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            @else
                <a href="{{ route('courses.detail', $course) }}" 
                   class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                    View <i class="fas fa-arrow-right ml-1"></i>
                </a>
            @endif
        </div>
    </div>
</div>
```

### components/common/alert.blade.php
```blade
@props([
    'type' => 'info', // info, success, warning, error
    'title' => null,
    'message' => null,
    'dismissible' => true,
])

@php
    $colors = [
        'info' => 'bg-blue-50 border-blue-200 text-blue-800',
        'success' => 'bg-green-50 border-green-200 text-green-800',
        'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
        'error' => 'bg-red-50 border-red-200 text-red-800',
    ];
    
    $icons = [
        'info' => 'fa-info-circle',
        'success' => 'fa-check-circle',
        'warning' => 'fa-exclamation-circle',
        'error' => 'fa-times-circle',
    ];
    
    $color = $colors[$type] ?? $colors['info'];
    $icon = $icons[$type] ?? $icons['info'];
@endphp

<div class="rounded-lg border {{ $color }} px-4 py-4 mb-4" role="alert" x-data="{ show: true }" x-show="show">
    <div class="flex items-start">
        <i class="fas {{ $icon }} mt-1 mr-3"></i>
        <div class="flex-1">
            @if($title)
                <h5 class="font-bold mb-1">{{ $title }}</h5>
            @endif
            <p>{{ $message ?? $slot }}</p>
        </div>
        @if($dismissible)
            <button @click="show = false" class="text-lg leading-none opacity-70 hover:opacity-100">
                <i class="fas fa-times"></i>
            </button>
        @endif
    </div>
</div>
```

---

## 6. KEY BLADE FEATURES TO IMPLEMENT

### Using @extends, @section, @yield
```blade
{{-- Child View: resources/views/student/courses/index.blade.php --}}
@extends('layouts.student')

@section('title', 'My Courses')

@section('student-content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">My Courses</h1>
            <a href="{{ route('courses.browse') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                <i class="fas fa-plus mr-2"></i>Browse Courses
            </a>
        </div>
        
        {{-- Course Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($courses as $course)
                @include('components.cards.course-card', ['course' => $course, 'showActions' => false])
            @empty
                @include('components.common.empty-state', [
                    'icon' => 'fa-book',
                    'title' => 'No Courses Yet',
                    'message' => 'Start learning by browsing our course catalog'
                ])
            @endforelse
        </div>
        
        {{-- Pagination --}}
        {{ $courses->links() }}
    </div>
@endsection
```

### Using @include for partials
```blade
{{-- Include without variables --}}
@include('components.partials.navbar')

{{-- Include with variables --}}
@include('components.cards.course-card', ['course' => $course, 'showActions' => true])

{{-- Include with loop --}}
@foreach($courses as $course)
    @include('components.cards.course-card', compact('course'))
@endforeach
```

---

## 7. DATABASE MIGRATIONS

### Create Users Table with Roles
```php
// database/migrations/xxxx_create_users_table.php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->string('password');
    $table->enum('role', ['student', 'instructor', 'admin'])->default('student');
    $table->string('avatar')->nullable();
    $table->text('bio')->nullable();
    $table->string('phone')->nullable();
    $table->rememberToken();
    $table->timestamps();
});
```

### Create Courses Table
```php
Schema::create('courses', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Instructor
    $table->foreignId('category_id')->constrained()->onDelete('set null')->nullable();
    $table->string('title');
    $table->text('description');
    $table->text('learning_points')->nullable();
    $table->string('image')->nullable();
    $table->decimal('price', 10, 2);
    $table->integer('discount_percent')->default(0);
    $table->text('requirements')->nullable();
    $table->integer('students_count')->default(0);
    $table->decimal('average_rating', 3, 2)->default(0);
    $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
    $table->string('language')->default('English');
    $table->boolean('is_published')->default(false);
    $table->timestamp('published_at')->nullable();
    $table->timestamps();
    $table->softDeletes();
});
```

---

## 8. BEST PRACTICES CHECKLIST

### ✅ Architecture & Organization
- [x] Separate Student, Instructor, and Auth controllers
- [x] Use route groups with prefixes and named routes
- [x] Create modular route files (auth.php, student.php, instructor.php)
- [x] Implement proper middleware for role-based access
- [x] Use resource controllers where applicable

### ✅ Blade Templates
- [x] Single master layout (app.blade.php) with Tailwind loaded once
- [x] Role-specific nested layouts (student.blade.php, instructor.blade.php)
- [x] Reusable components for cards, buttons, forms
- [x] Proper use of @extends, @section, @include
- [x] Component prop binding with @props

### ✅ Security
- [x] Always validate user input
- [x] Use CSRF tokens in forms
- [x] Implement authorization policies
- [x] Hash passwords securely
- [x] Use Laravel's built-in authentication

### ✅ Performance
- [x] Eager load relationships with ->with()
- [x] Paginate large result sets
- [x] Use selective column queries
- [x] Implement caching where applicable
- [x] Optimize images and assets

### ✅ Code Quality
- [x] Follow PSR-12 coding standards
- [x] Use meaningful variable and function names
- [x] Add proper comments and docblocks
- [x] DRY principle (Don't Repeat Yourself)
- [x] Single Responsibility Principle

### ✅ User Experience
- [x] Clear navigation structure
- [x] Flash message feedback
- [x] Loading states and spinners
- [x] Responsive design
- [x] Error handling and validation messages

---

## 9. QUICK SETUP CHECKLIST

1. **Create Folder Structure** ✓
2. **Move & Rename Blade Files** ✓
3. **Create Controllers** (see examples above)
4. **Update Routes** (see structure above)
5. **Create Middleware** (StudentMiddleware, InstructorMiddleware)
6. **Create Migrations** (see database section)
7. **Add Role Column to Users** (if not present)
8. **Create Base Components** (navbar, footer, sidebars)
9. **Create Card Components** (course-card, etc.)
10. **Test All Routes** ✓

---

## 10. FILE-BY-FILE REFACTORING PRIORITY

### Phase 1: Foundation (1-2 days)
1. Create folder structure
2. Create master layouts (app, student, instructor)
3. Create navbar and footer partials
4. Create sidebar components

### Phase 2: Reusable Components (1-2 days)
1. Create course-card component
2. Create alert component
3. Create form components
4. Create common UI elements (buttons, modals, etc.)

### Phase 3: Student Views (2-3 days)
1. Refactor course listing
2. Refactor course details
3. Refactor my-learning page
4. Refactor checkout flow

### Phase 4: Instructor Views (2-3 days)
1. Refactor dashboard
2. Refactor course creation flow
3. Refactor analytics
4. Refactor profile/settings

### Phase 5: Controllers & Routes (1-2 days)
1. Separate concerns into proper controllers
2. Implement all CRUD operations
3. Add proper validation
4. Add authorization

### Phase 6: Testing & Optimization (1-2 days)
1. Test all routes
2. Fix any issues
3. Optimize performance
4. Add caching

---

## 11. MIGRATION COMMAND
```bash
# After setting up structure, run:
php artisan migrate

# For seeders:
php artisan db:seed
```

---

## 12. SUMMARY

This architecture provides:
✅ **Scalability** - Easy to add new features
✅ **Maintainability** - Clear organization and structure
✅ **Reusability** - Component-based approach
✅ **Performance** - Optimized database queries
✅ **Security** - Proper authorization and validation
✅ **Professional Standards** - Industry best practices
✅ **Team Collaboration** - Clear conventions and patterns

Your LMS is now ready to scale from a monolithic view structure to a professional, enterprise-grade Laravel application!
