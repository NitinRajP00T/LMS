<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Show settings page
     */
    public function index()
    {
        return view('instructor.settings.index');
    }

    /**
     * Update settings
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'email_notifications' => 'boolean',
            'course_notifications' => 'boolean',
            'payment_notifications' => 'boolean',
        ]);

        auth()->user()->settings()->update($validated);

        return back()->with('success', 'Settings updated successfully');
    }
}
