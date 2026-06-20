<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show instructor profile
     */
    public function show()
    {
        return view('instructor.profile.index');
    }

    /**
     * Show edit profile form
     */
    public function edit()
    {
        return view('instructor.profile.edit');
    }

    /**
     * Update instructor profile
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'avatar' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        auth()->user()->update($validated);

        return back()->with('success', 'Profile updated successfully');
    }
}
