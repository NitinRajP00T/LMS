<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentInteractionController extends Controller
{
    /**
     * Display all students
     */
    public function index()
    {
        $students = auth()->user()
            ->courses()
            ->with('enrollments.user')
            ->paginate(20);

        return view('instructor.students.index', compact('students'));
    }

    /**
     * Display student interactions
     */
    public function interactions()
    {
        $interactions = auth()->user()
            ->course_messages()
            ->latest()
            ->paginate(20);

        return view('instructor.students.interactions', compact('interactions'));
    }
}
