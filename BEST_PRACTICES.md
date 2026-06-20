# Laravel LMS - Best Practices & Quick Reference

## 🎯 Quick Start Guide

### Creating a New Student View

```bash
# Step 1: Create the view file
touch resources/views/student/wishlist/index.blade.php

# Step 2: Create the controller
php artisan make:controller Student/WishlistController

# Step 3: Add routes in routes/student.php
# Step 4: Write the view using the template below
```

**Template:**
```blade
@extends('layouts.student')

@section('title', 'Page Title')

@section('student-content')
    <div class="space-y-6">
        <h1 class="text-3xl font-bold text-gray-800">Page Title</h1>
        
        <!-- Your content here -->
    </div>
@endsection
```

---

### Creating a New Instructor View

```bash
# Step 1: Create the view file
touch resources/views/instructor/coupons/create.blade.php

# Step 2: Create the controller
php artisan make:controller Instructor/CouponController

# Step 3: Add routes in routes/instructor.php
# Step 4: Write the view using the template below
```

**Template:**
```blade
@extends('layouts.instructor')

@section('title', 'Create Coupon')

@section('instructor-content')
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Create Coupon</h1>
            <a href="{{ route('instructor.coupons.index') }}" class="text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-2"></i>Back
            </a>
        </div>
        
        <!-- Your content here -->
    </div>
@endsection
```

---

## 📐 Component Usage Guide

### Alert Component
```blade
@include('components.common.alert', [
    'type' => 'success', // success, error, warning, info
    'title' => 'Success!',
    'message' => 'Operation completed successfully',
    'dismissible' => true
])
```

### Course Card Component
```blade
@include('components.cards.course-card', [
    'course' => $course,
    'showActions' => false // true for instructor view
])
```

### Empty State Component
```blade
@include('components.common.empty-state', [
    'icon' => 'fa-book',
    'title' => 'No Courses',
    'message' => 'Start learning by browsing courses',
    'actionUrl' => route('courses.browse'),
    'actionText' => 'Browse Courses'
])
```

---

## 🗂️ File Organization Rules

### View Files Structure
```
resources/views/
├── student/
│   ├── dashboard.blade.php          # Main page
│   ├── courses/
│   │   ├── index.blade.php
│   │   ├── show.blade.php
│   │   └── search.blade.php
│   ├── my-learning/
│   │   ├── index.blade.php
│   │   └── player.blade.php
│   ├── profile/
│   │   ├── index.blade.php
│   │   └── edit.blade.php
│   └── checkout/
│       ├── index.blade.php
│       └── completion.blade.php

├── instructor/
│   ├── dashboard.blade.php
│   ├── courses/
│   │   ├── index.blade.php
│   │   ├── create.blade.php
│   │   ├── edit.blade.php
│   │   ├── show.blade.php
│   │   ├── curriculum.blade.php
│   │   └── pricing.blade.php
│   ├── analytics/
│   │   ├── index.blade.php
│   │   └── revenue.blade.php
│   ├── earnings/
│   │   ├── index.blade.php
│   │   └── payments.blade.php
│   ├── profile/
│   │   ├── index.blade.php
│   │   └── edit.blade.php
│   └── settings/
│       └── index.blade.php

├── auth/
│   ├── login.blade.php
│   ├── register.blade.php
│   ├── forgot-password.blade.php
│   └── reset-password.blade.php

├── components/
│   ├── partials/
│   │   ├── navbar.blade.php
│   │   ├── footer.blade.php
│   │   ├── sidebar-student.blade.php
│   │   ├── sidebar-instructor.blade.php
│   │   └── breadcrumbs.blade.php
│   ├── cards/
│   │   ├── course-card.blade.php
│   │   ├── category-card.blade.php
│   │   ├── instructor-card.blade.php
│   │   └── review-card.blade.php
│   ├── forms/
│   │   ├── course-form.blade.php
│   │   ├── search-form.blade.php
│   │   └── filter-form.blade.php
│   └── common/
│       ├── alert.blade.php
│       ├── button.blade.php
│       ├── modal.blade.php
│       ├── pagination.blade.php
│       ├── loading-spinner.blade.php
│       └── empty-state.blade.php

└── layouts/
    ├── app.blade.php
    ├── guest.blade.php
    ├── student.blade.php
    └── instructor.blade.php
```

---

## 🎨 Tailwind CSS Class Reference

### Common Spacing Classes
```blade
<!-- Margin -->
<div class="m-4">Margin all sides</div>
<div class="mx-4">Margin horizontal</div>
<div class="my-4">Margin vertical</div>
<div class="mt-4">Margin top</div>

<!-- Padding -->
<div class="p-4">Padding all sides</div>
<div class="px-4">Padding horizontal</div>
<div class="py-4">Padding vertical</div>
```

### Common Layout Classes
```blade
<!-- Flexbox -->
<div class="flex items-center justify-between">
    <span>Left</span>
    <span>Right</span>
</div>

<!-- Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Items -->
</div>

<!-- Responsive -->
<div class="hidden md:block">Shown on medium+ screens</div>
<div class="md:hidden">Hidden on medium+ screens</div>
```

### Common Color Classes
```blade
<!-- Text Colors -->
<p class="text-gray-800">Dark text</p>
<p class="text-blue-600">Blue text</p>

<!-- Background Colors -->
<div class="bg-white">White background</div>
<div class="bg-blue-50">Light blue background</div>

<!-- Border Colors -->
<div class="border-l-4 border-blue-600">Blue left border</div>
```

---

## 🔗 Routing Best Practices

### Named Routes (ALWAYS USE)
```blade
<!-- ✅ GOOD -->
<a href="{{ route('student.dashboard') }}">Dashboard</a>
<form method="POST" action="{{ route('student.courses.enroll', $course) }}">

<!-- ❌ BAD -->
<a href="/student/dashboard">Dashboard</a>
<form method="POST" action="/student/courses/1/enroll">
```

### Route Parameters
```php
// Define route with parameter
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

// Use in view
<a href="{{ route('courses.show', $course) }}">View Course</a>
<a href="{{ route('courses.show', $course->id) }}">View Course</a>
```

### Route Groups
```php
// Group related routes
Route::middleware(['auth'])->group(function () {
    Route::resource('courses', CourseController::class);
    Route::post('courses/{course}/publish', ...);
});

// Named route groups
Route::prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', ...)->name('dashboard');
    // Creates route name: student.dashboard
});
```

---

## 🔐 Security Best Practices

### Always Use CSRF Token in Forms
```blade
<form method="POST" action="{{ route('courses.store') }}">
    @csrf
    <!-- Form fields -->
</form>
```

### Validate User Input
```php
$validated = $request->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string|min:50',
    'price' => 'required|numeric|min:0',
]);

$course = Course::create($validated);
```

### Check User Authorization
```php
// In Controller
public function edit(Course $course)
{
    $this->authorize('update', $course);
    return view('instructor.courses.edit', compact('course'));
}

// In Policy (app/Policies/CoursePolicy.php)
public function update(User $user, Course $course)
{
    return $user->id === $course->user_id;
}
```

### Use Middleware for Route Protection
```php
Route::middleware(['auth', 'role:instructor'])->group(function () {
    // Only logged-in instructors can access
    Route::resource('courses', CourseController::class);
});
```

---

## 📊 Database Query Optimization

### Use Eager Loading
```php
// ❌ BAD - Causes N+1 queries
$courses = Course::all();
foreach ($courses as $course) {
    echo $course->instructor->name; // Query for each course
}

// ✅ GOOD - Single query with join
$courses = Course::with('instructor')->get();
foreach ($courses as $course) {
    echo $course->instructor->name; // No additional queries
}
```

### Use Pagination
```php
// ❌ BAD - Loads all records
$courses = Course::all();

// ✅ GOOD - Loads 15 records per page
$courses = Course::paginate(15);

// In view
{{ $courses->links() }}
```

### Use Selective Columns
```php
// ❌ BAD - Selects all columns
$courses = Course::all();

// ✅ GOOD - Select only needed columns
$courses = Course::select('id', 'title', 'price', 'instructor_id')->get();
```

---

## 🧪 Testing Routes

### List All Routes
```bash
php artisan route:list
php artisan route:list --name=student
```

### Test in Browser
```bash
# Start server
php artisan serve

# Visit routes
http://localhost:8000/student/dashboard
http://localhost:8000/instructor/dashboard
http://localhost:8000/courses
```

### Debug Route Issues
```php
// In your controller
dd(Route::current());
dd(request()->route());
```

---

## 📝 Common Blade Patterns

### Conditional Rendering
```blade
@if(auth()->check())
    <p>Welcome, {{ auth()->user()->name }}</p>
@else
    <a href="{{ route('login') }}">Login</a>
@endif

@auth
    <!-- Only shown to authenticated users -->
@endauth

@guest
    <!-- Only shown to guests -->
@endguest

@if(auth()->user()?->hasRole('instructor'))
    <!-- Only shown to instructors -->
@endif
```

### Loops
```blade
@foreach($courses as $course)
    <div>{{ $course->title }}</div>
@endforeach

@forelse($courses as $course)
    <div>{{ $course->title }}</div>
@empty
    <p>No courses found</p>
@endforelse
```

### Forms
```blade
<form method="POST" action="{{ route('courses.store') }}">
    @csrf
    
    <input type="text" name="title" value="{{ old('title') }}" placeholder="Course Title">
    
    @error('title')
        <span class="text-red-600">{{ $message }}</span>
    @enderror
    
    <button type="submit">Create Course</button>
</form>
```

### Includes with Loop
```blade
<div class="grid grid-cols-3 gap-6">
    @foreach($courses as $course)
        @include('components.cards.course-card', ['course' => $course])
    @endforeach
</div>

<!-- Shorthand using compact -->
<div class="grid grid-cols-3 gap-6">
    @foreach($courses as $course)
        @include('components.cards.course-card', compact('course'))
    @endforeach
</div>
```

---

## 🚀 Performance Tips

### Cache Database Queries
```php
$categories = Cache::remember('categories', now()->addHours(24), function () {
    return Category::all();
});
```

### Minimize Database Queries
```php
// ✅ Good
$courses = Course::with(['instructor', 'category', 'reviews'])
    ->where('is_published', true)
    ->paginate(12);

// Use in view
@foreach($courses as $course)
    {{ $course->instructor->name }}
    {{ $course->category->name }}
    {{ count($course->reviews) }}
@endforeach
```

### Use Lazy Collection for Large Datasets
```php
Course::lazy()->each(function ($course) {
    // Process one at a time, saves memory
    Log::info("Processing course: {$course->title}");
});
```

---

## 🐛 Debugging Tips

### Use dd() to dump and die
```php
dd($course);          // Dumps $course and stops execution
dd($courses->toArray());  // Dump as array
```

### Use Ray for better debugging
```bash
php artisan tinker
ray($course)->label('Course Data')
```

### Check logs
```bash
# Watch logs in real-time
tail -f storage/logs/laravel.log
```

### Browser console
```blade
@if(config('app.debug'))
    <script>
        console.log(@json($data));
    </script>
@endif
```

---

## 📚 Useful Artisan Commands

```bash
# Route commands
php artisan route:list
php artisan route:cache
php artisan route:clear

# View commands
php artisan view:cache
php artisan view:clear

# Database commands
php artisan migrate
php artisan migrate:rollback
php artisan seed

# Model & Controller generation
php artisan make:model Post
php artisan make:controller PostController
php artisan make:model Post -mcr  # Model + Migration + Controller + Resource

# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan cache:forget key_name
```

---

## ✨ Additional Blade Components to Create

### Button Component
```blade
<!-- resources/views/components/common/button.blade.php -->
@props(['type' => 'button', 'color' => 'blue', 'size' => 'md', 'disabled' => false])

@php
    $colors = [
        'blue' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'green' => 'bg-green-600 hover:bg-green-700 text-white',
        'red' => 'bg-red-600 hover:bg-red-700 text-white',
        'gray' => 'bg-gray-300 hover:bg-gray-400 text-gray-800',
    ];
    
    $sizes = [
        'sm' => 'px-3 py-1 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
    ];
@endphp

<button 
    type="{{ $type }}"
    {{ $disabled ? 'disabled' : '' }}
    class="rounded-lg font-medium transition {{ $colors[$color] }} {{ $sizes[$size] }} {{ $disabled ? 'opacity-50 cursor-not-allowed' : '' }}"
>
    {{ $slot }}
</button>
```

### Input Component
```blade
<!-- resources/views/components/common/input.blade.php -->
@props(['type' => 'text', 'label' => '', 'name' => '', 'error' => null])

<div class="mb-4">
    @if($label)
        <label class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>
    @endif
    
    <input 
        type="{{ $type }}"
        name="{{ $name }}"
        {{ $attributes->merge(['class' => 'w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 ' . ($error ? 'border-red-500' : 'border-gray-300')]) }}
    />
    
    @if($error)
        <p class="text-red-600 text-sm mt-1">{{ $error }}</p>
    @endif
</div>
```

---

## 🎓 Learning Resources

- **Blade Documentation:** https://laravel.com/docs/blade
- **Routing Guide:** https://laravel.com/docs/routing
- **Controllers:** https://laravel.com/docs/controllers
- **Tailwind CSS:** https://tailwindcss.com/docs
- **Laravel Best Practices:** https://github.com/alexeymezenin/laravel-best-practices

---

## ✅ Pre-Launch Checklist

Before going live, verify:

- [ ] All routes return correct views
- [ ] Responsive design works on mobile
- [ ] Performance metrics acceptable (< 2s load time)
- [ ] All forms submit correctly
- [ ] User authentication working
- [ ] Role-based access control enforced
- [ ] Error pages (404, 500) customized
- [ ] Database properly seeded
- [ ] Images optimized and loaded
- [ ] No console errors in browser
- [ ] HTTPS configured
- [ ] Environment variables set correctly
- [ ] Database backups configured
- [ ] Monitoring/logging enabled
- [ ] Security headers configured

Congratulations on your professional Laravel LMS! 🎉
