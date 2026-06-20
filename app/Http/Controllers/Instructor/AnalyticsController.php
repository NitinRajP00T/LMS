<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    /**
     * Display analytics dashboard
     */
    public function index()
    {
        $analytics = [
            'total_views' => 1542,
            'total_enrollments' => 254,
            'conversion_rate' => '16.5%',
        ];

        return view('instructor.analytics.index', compact('analytics'));
    }

    /**
     * Display revenue analytics
     */
    public function revenue()
    {
        $revenue = [
            'total_revenue' => 12450.50,
            'pending' => 2100.00,
            'paid_out' => 10350.50,
        ];

        return view('instructor.analytics.revenue', compact('revenue'));
    }
}
