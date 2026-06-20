<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use Illuminate\Http\Request;

class MyLearningController extends Controller
{
    /**
     * Display student's enrolled courses
     */
    public function index()
    {
        $enrollments = auth()->user()
            ->enrollments()
            ->with('course.category', 'course.instructor')
            ->latest()
            ->paginate(10);

        return view('student.my-learning.index', compact('enrollments'));
    }

    /**
     * Show course learning player
     */
    public function player(Request $request)
    {
        $courseId = $request->route('course');
        $course = \App\Models\Course::with(['lessons', 'instructor'])->findOrFail($courseId);
        $user = auth()->user();

        if ($user->role === 'instructor') {
            if ($course->user_id !== $user->id) {
                abort(403, 'Unauthorized access to this course.');
            }
            $enrollment = null;
            $completedLessonIds = [];
        } else {
            $enrollment = $user->enrollments()
                ->where('course_id', $courseId)
                ->with(['lessons'])
                ->firstOrFail();

            $completedLessonIds = $enrollment->lessons
                ->whereNotNull('pivot.completed_at')
                ->pluck('id')
                ->all();
        }

        $lessons = $course->lessons;
        $activeLesson = $lessons->firstWhere('id', $request->query('lesson')) ?? $lessons->first();

        if ($activeLesson) {
            $activeLesson->load([
                'comments' => function ($q) {
                    $q->with('user')->orderBy('created_at', 'desc');
                },
                'comments.replies.user',
                'resources'
            ]);
        }

        // Existing review by this student for this course
        $existingReview = $user->role === 'student'
            ? \App\Models\Review::where('user_id', $user->id)
                ->where('course_id', $course->id)
                ->first()
            : null;

        return view('student.my-learning.player', compact(
            'enrollment',
            'course',
            'lessons',
            'activeLesson',
            'completedLessonIds',
            'existingReview',
        ));
    }

    /**
     * Post a comment or reply to a lesson
     */
    public function postComment(Request $request, Lesson $lesson)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'parent_id' => 'nullable|exists:lesson_comments,id',
        ]);

        $user = auth()->user();

        if ($user->role === 'instructor') {
            if ($lesson->course->user_id !== $user->id) {
                abort(403, 'Unauthorized');
            }
        } else {
            $isEnrolled = $user->enrollments()
                ->where('course_id', $lesson->course_id)
                ->exists();
            if (!$isEnrolled) {
                abort(403, 'Unauthorized');
            }
        }

        \App\Models\LessonComment::create([
            'user_id' => $user->id,
            'lesson_id' => $lesson->id,
            'parent_id' => $request->input('parent_id'),
            'content' => $request->input('content'),
        ]);

        return back()->with('success', 'Comment posted successfully');
    }


    /**
     * Mark lesson as complete
     */
    public function completeLesson(Lesson $lesson)
    {
        $enrollment = auth()->user()
            ->enrollments()
            ->where('course_id', $lesson->course_id)
            ->firstOrFail();

        if ($enrollment->lessons()->where('lesson_id', $lesson->id)->exists()) {
            $enrollment->lessons()->updateExistingPivot($lesson->id, [
                'completed_at' => now(),
            ]);
        } else {
            $enrollment->lessons()->attach($lesson->id, [
                'completed_at' => now(),
            ]);
        }

        return back()->with('success', 'Lesson marked as completed');
    }
}
