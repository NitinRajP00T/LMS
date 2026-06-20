<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;

class WishlistController extends Controller
{
    public function index()
    {
        $courses = auth()->user()
            ->wishlist()
            ->with('category', 'instructor')
            ->latest('wishlists.created_at')
            ->paginate(12);

        return view('student.wishlist.index', compact('courses'));
    }

    public function add(Course $course)
    {
        auth()->user()->wishlist()->syncWithoutDetaching([$course->id]);

        return back()->with('success', 'Added to wishlist');
    }

    public function remove(Course $course)
    {
        auth()->user()->wishlist()->detach($course->id);

        return back()->with('success', 'Removed from wishlist');
    }
}
