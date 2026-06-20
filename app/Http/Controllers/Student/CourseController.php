<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Browse and search courses (public route)
     */
    public function browse(Request $request)
    {
        $query = Course::where('is_published', true)
            ->with('instructor', 'category');
        
        // Search
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }
        
        // Filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }
        
        // Filter by price
        if ($request->filled('price_range')) {
            if ($request->input('price_range') == 'free') {
                $query->where('price', 0);
            } elseif ($request->input('price_range') == 'paid') {
                $query->where('price', '>', 0);
            }
        }
        
        $courses = $query->latest()->paginate(12);
        $categories = Category::orderBy('name')->get();

        return view('student.courses.index', compact('courses', 'categories'));
    }
    
    /**
     * Show course details (public route)
     */
    public function detail(Course $course)
    {
        if (!$course->is_published) {
            abort(404);
        }
        
        $course->load('instructor', 'category', 'reviews', 'lessons');
        
        $isEnrolled = auth()->check() &&
                     auth()->user()->enrollments()
                     ->where('course_id', $course->id)
                     ->exists();

        $isInWishlist = auth()->check() &&
                       auth()->user()->wishlist()
                       ->where('course_id', $course->id)
                       ->exists();

        $reviews = $course->reviews()->with('user')->latest()->paginate(5);

        return view('student.courses.show', compact('course', 'isEnrolled', 'isInWishlist', 'reviews'));
    }
    
    /**
     * Get student's enrolled courses
     */
    public function index()
    {
        $enrollments = auth()->user()
            ->enrollments()
            ->with('course.instructor', 'course.category')
            ->latest()
            ->paginate(10);

        return view('student.my-learning.index', compact('enrollments'));
    }
    
    /**
     * Enroll student in a course
     */
    public function enroll(Request $request, Course $course)
    {
        $user = auth()->user();
        
        // Check if already enrolled
        if ($user->enrollments()->where('course_id', $course->id)->exists()) {
            return back()->with('warning', 'You are already enrolled in this course');
        }
        
        // If course is paid, add to cart and redirect to checkout
        if ($course->price > 0) {
            $cart = session()->get('cart', []);
            if (! in_array($course->id, $cart)) {
                $cart[] = $course->id;
                session()->put('cart', $cart);
                session()->put('cart_count', count($cart));
            }
            return redirect()->route('student.checkout.index');
        }

        // Create enrollment
        $user->enrollments()->create([
            'course_id' => $course->id,
            'enrolled_at' => now(),
        ]);
        
        return redirect()->route('student.my-learning.index')
                       ->with('success', 'Successfully enrolled in ' . $course->title);
    }
}
