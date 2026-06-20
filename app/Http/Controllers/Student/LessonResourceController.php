<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LessonResourceController extends Controller
{
    /**
     * Get all resources for a lesson
     */
    public function index(Lesson $lesson)
    {
        // Check if user is enrolled in the course
        $lesson->load('course');
        
        $resources = $lesson->resources()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $resources,
            'message' => 'Resources retrieved successfully'
        ]);
    }

    /**
     * Store a new resource (instructor only)
     */
    public function store(Request $request, Lesson $lesson)
    {
        // Check if user is the course instructor
        $lesson->load('course');
        if ($lesson->course->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: Only course instructor can upload resources'
            ], 403);
        }

        $validated = $request->validate([
            'title' => 'required|string|min:1|max:255',
            'file' => 'nullable|file|max:102400', // 100MB max
            'url' => 'nullable|string|url',
        ]);

        // Either file or url must be provided
        if (!isset($validated['file']) && !isset($validated['url'])) {
            return response()->json([
                'success' => false,
                'message' => 'Either file or URL must be provided'
            ], 422);
        }

        $resource = new LessonResource([
            'lesson_id' => $lesson->id,
            'title' => $validated['title'],
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('lesson-resources/' . $lesson->id, 'public');
            $resource->file_path = $path;
        }

        // Handle URL
        if (isset($validated['url'])) {
            $resource->url = $validated['url'];
        }

        $resource->save();

        return response()->json([
            'success' => true,
            'data' => $resource,
            'message' => 'Resource uploaded successfully'
        ], 201);
    }

    /**
     * Get a specific resource
     */
    public function show(Lesson $lesson, LessonResource $resource)
    {
        if ($resource->lesson_id !== $lesson->id) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found for this lesson'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $resource,
        ]);
    }

    /**
     * Update a resource (instructor only)
     */
    public function update(Request $request, Lesson $lesson, LessonResource $resource)
    {
        // Check if resource belongs to this lesson
        if ($resource->lesson_id !== $lesson->id) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found for this lesson'
            ], 404);
        }

        // Check if user is the course instructor
        $lesson->load('course');
        if ($lesson->course->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: Only course instructor can update resources'
            ], 403);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|min:1|max:255',
            'file' => 'nullable|file|max:102400',
            'url' => 'nullable|string|url',
        ]);

        if (isset($validated['title'])) {
            $resource->title = $validated['title'];
        }

        if ($request->hasFile('file')) {
            // Delete old file if exists
            if ($resource->file_path) {
                Storage::disk('public')->delete($resource->file_path);
            }
            $file = $request->file('file');
            $path = $file->store('lesson-resources/' . $lesson->id, 'public');
            $resource->file_path = $path;
        }

        if (isset($validated['url'])) {
            $resource->url = $validated['url'];
        }

        $resource->save();

        return response()->json([
            'success' => true,
            'data' => $resource,
            'message' => 'Resource updated successfully'
        ]);
    }

    /**
     * Delete a resource (instructor only)
     */
    public function destroy(Lesson $lesson, LessonResource $resource)
    {
        // Check if resource belongs to this lesson
        if ($resource->lesson_id !== $lesson->id) {
            return response()->json([
                'success' => false,
                'message' => 'Resource not found for this lesson'
            ], 404);
        }

        // Check if user is the course instructor
        $lesson->load('course');
        if ($lesson->course->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: Only course instructor can delete resources'
            ], 403);
        }

        // Delete file if exists
        if ($resource->file_path) {
            Storage::disk('public')->delete($resource->file_path);
        }

        $resource->delete();

        return response()->json([
            'success' => true,
            'message' => 'Resource deleted successfully'
        ]);
    }
}
