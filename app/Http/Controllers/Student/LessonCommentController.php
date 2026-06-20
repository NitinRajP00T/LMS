<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonCommentController extends Controller
{
    /**
     * Get all comments for a lesson (top-level only)
     */
    public function index(Lesson $lesson)
    {
        $comments = $lesson->comments()
            ->with(['user', 'replies.user'])
            ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $comments,
            'message' => 'Comments retrieved successfully'
        ]);
    }

    /**
     * Store a new comment or reply
     */
    public function store(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'content' => 'required|string|min:1|max:5000',
            'parent_id' => 'nullable|exists:lesson_comments,id',
        ]);

        $comment = LessonComment::create([
            'lesson_id' => $lesson->id,
            'user_id' => Auth::id(),
            'content' => $validated['content'],
            'parent_id' => $validated['parent_id'] ?? null,
        ]);

        $comment->load('user');

        // If it's a reply, also get instructor info
        if ($comment->user->role === 'instructor') {
            $comment->is_instructor = true;
        }

        return response()->json([
            'success' => true,
            'data' => $comment,
            'message' => 'Comment posted successfully'
        ], 201);
    }

    /**
     * Get a specific comment with all its replies
     */
    public function show(Lesson $lesson, LessonComment $comment)
    {
        $comment->load(['user', 'replies.user']);

        return response()->json([
            'success' => true,
            'data' => $comment,
        ]);
    }

    /**
     * Update a comment (only by comment author)
     */
    public function update(Request $request, Lesson $lesson, LessonComment $comment)
    {
        // Check if user is the comment author
        if ($comment->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: You can only edit your own comments'
            ], 403);
        }

        $validated = $request->validate([
            'content' => 'required|string|min:1|max:5000',
        ]);

        $comment->update($validated);

        return response()->json([
            'success' => true,
            'data' => $comment,
            'message' => 'Comment updated successfully'
        ]);
    }

    /**
     * Delete a comment (only by comment author or instructor)
     */
    public function destroy(Lesson $lesson, LessonComment $comment)
    {
        $user = Auth::user();

        // Check if user is comment author or instructor
        if ($comment->user_id !== $user->id && $user->role !== 'instructor') {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: You cannot delete this comment'
            ], 403);
        }

        $comment->delete();

        return response()->json([
            'success' => true,
            'message' => 'Comment deleted successfully'
        ]);
    }

    /**
     * Get replies for a specific comment
     */
    public function getReplies(Lesson $lesson, LessonComment $comment)
    {
        $replies = $comment->replies()
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $replies,
            'message' => 'Replies retrieved successfully'
        ]);
    }
}
