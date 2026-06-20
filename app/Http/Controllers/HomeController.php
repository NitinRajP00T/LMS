<?php

namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller
{
    public function index()
    {
        $popularCourses = Course::where('is_published', true)
            ->with('instructor', 'category')
            ->withCount('reviews')
            ->orderByDesc('students_count')
            ->orderByDesc('average_rating')
            ->take(12)
            ->get();

        return view('student.home', compact('popularCourses'));
    }
}
