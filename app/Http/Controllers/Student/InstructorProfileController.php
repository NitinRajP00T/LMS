<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class InstructorProfileController extends Controller
{
    /**
     * Show instructor public profile with their published courses.
     * Accessible by anyone (public route).
     */
    public function show(Request $request, User $instructor)
    {
        // Only show users who are instructors
        if (!$instructor->isInstructor()) {
            abort(404);
        }

        // Get all published courses by this instructor
        $query = Course::where('user_id', $instructor->id)
            ->where('is_published', true)
            ->with('category');

        // Optional: filter by category
        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        // Optional: sort
        $sort = $request->input('sort', 'newest');
        match ($sort) {
            'popular'  => $query->orderByDesc('students_count'),
            'rating'   => $query->orderByDesc('average_rating'),
            'price_lo' => $query->orderBy('price'),
            'price_hi' => $query->orderByDesc('price'),
            default    => $query->orderByDesc('published_at'),
        };

        $courses = $query->paginate(9)->withQueryString();

        // Stats
        $totalStudents = Course::where('user_id', $instructor->id)
            ->where('is_published', true)
            ->sum('students_count');

        $totalCourses = Course::where('user_id', $instructor->id)
            ->where('is_published', true)
            ->count();

        $avgRating = Course::where('user_id', $instructor->id)
            ->where('is_published', true)
            ->whereNotNull('average_rating')
            ->avg('average_rating');

        return view('student.instructor.profile', compact(
            'instructor',
            'courses',
            'totalStudents',
            'totalCourses',
            'avgRating',
            'sort'
        ));
    }
}
