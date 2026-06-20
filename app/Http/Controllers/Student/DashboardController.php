<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the student dashboard
     */
    public function index()
    {
        $user = auth()->user();
        
        // Get enrolled courses with pagination
        $enrolledCourses = $user->enrollments()
            ->with('course.instructor', 'course.category')
            ->latest()
            ->paginate(6);
        
        // Get statistics
        $stats = [
            'total_enrolled' => $user->enrollments()->count(),
            'in_progress' => $user->enrollments()->whereNull('completed_at')->count(),
            'completed' => $user->enrollments()->whereNotNull('completed_at')->count(),
            'total_hours' => 24.5, // Calculate from lessons
        ];
        
        return view('student.dashboard', compact('enrolledCourses', 'stats'));
    }
}
