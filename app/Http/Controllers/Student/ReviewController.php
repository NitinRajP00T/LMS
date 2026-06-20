<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Store or update a course review.
     * Student can only review courses they are enrolled in.
     */
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:2000',
        ]);

        $user = auth()->user();

        // Must be enrolled
        $enrollment = $user->enrollments()
            ->where('course_id', $course->id)
            ->firstOrFail();

        // Upsert review (one review per student per course)
        Review::updateOrCreate(
            ['user_id' => $user->id, 'course_id' => $course->id],
            [
                'rating'  => $request->rating,
                'comment' => $request->comment,
            ]
        );

        // Recalculate and update average rating on the course
        $avg = Review::where('course_id', $course->id)->avg('rating');
        $course->update(['average_rating' => round($avg, 2)]);

        return back()->with('review_success', 'Thank you for your rating! ⭐');
    }
}
