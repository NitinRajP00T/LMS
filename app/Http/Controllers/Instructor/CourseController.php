<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display all instructor courses
     */
    public function index()
    {
        $courses = auth()->user()
            ->courses()
            ->with('category')
            ->latest()
            ->paginate(10);
        
        return view('instructor.courses.index', compact('courses'));
    }

    /**
     * Show course creation form
     */
    public function create()
    {
        return view('instructor.courses.create');
    }

    /**
     * Store a new course
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:50',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'price' => 'required|numeric|min:0',
            'level' => 'required|in:beginner,intermediate,advanced',
        ]);

        $validated['user_id'] = auth()->id();

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }

        $course = Course::create($validated);

        return redirect()->route('instructor.courses.edit', $course)
                       ->with('success', 'Course created successfully. Now add curriculum.');
    }

    /**
     * Show course edit form
     */
    public function edit(Course $course)
    {
        $this->authorize('update', $course);
        
        return view('instructor.courses.edit', compact('course'));
    }

    /**
     * Update course
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('update', $course);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:50',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'level' => 'required|in:beginner,intermediate,advanced',
        ]);

        $course->update($validated);

        return back()->with('success', 'Course updated successfully');
    }

    /**
     * Delete course
     */
    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);

        $course->delete();

        return redirect()->route('instructor.courses.index')
                       ->with('success', 'Course deleted successfully');
    }

    /**
     * Publish course
     */
    public function publish(Course $course)
    {
        $this->authorize('update', $course);

        $course->update([
            'is_published' => true,
            'published_at' => now(),
        ]);

        return back()->with('success', 'Course published successfully');
    }

    /**
     * Unpublish course
     */
    public function unpublish(Course $course)
    {
        $this->authorize('update', $course);

        $course->update([
            'is_published' => false,
            'published_at' => null,
        ]);

        return back()->with('success', 'Course unpublished successfully');
    }
}
