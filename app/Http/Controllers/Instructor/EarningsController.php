<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EarningsController extends Controller
{
    /**
     * Display earnings overview
     */
    public function index()
    {
        $earnings = [
            'total_balance' => 12450.50,
            'this_month' => 2150.00,
            'this_week' => 450.50,
        ];

        return view('instructor.earnings.index', compact('earnings'));
    }

    /**
     * Display payment history
     */
    public function payments()
    {
        $payments = auth()->user()
            ->payments()
            ->latest()
            ->paginate(20);

        return view('instructor.earnings.payments', compact('payments'));
    }
}
