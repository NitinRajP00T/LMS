<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the instructor dashboard
     */
    public function index()
    {
        $user = auth()->user();
        
        // Get instructor's courses with statistics
        $courses = $user->courses()
            ->with('category')
            ->latest()
            ->paginate(6);
        
        // Calculate statistics
        $stats = [
            'total_courses' => $user->courses()->count(),
            'published_courses' => $user->courses()->where('is_published', true)->count(),
            'draft_courses' => $user->courses()->where('is_published', false)->count(),
            'total_students' => 254, // Should be calculated from enrollments
            'total_revenue' => 12450.50, // Should be calculated from payments
            'average_rating' => 4.8, // Should be calculated from reviews
        ];
        
        return view('instructor.instructor-dashboard', compact('courses', 'stats'));
    }
}
