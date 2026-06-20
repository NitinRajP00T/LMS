<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display all coupons
     */
    public function index()
    {
        $coupons = auth()->user()
            ->coupons()
            ->latest()
            ->paginate(20);

        return view('instructor.coupons.index', compact('coupons'));
    }

    /**
     * Show create coupon form
     */
    public function create()
    {
        return view('instructor.coupons.create');
    }

    /**
     * Store new coupon
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:coupons',
            'discount_percent' => 'required|numeric|min:1|max:100',
            'expires_at' => 'required|date',
        ]);

        $validated['user_id'] = auth()->id();

        auth()->user()->coupons()->create($validated);

        return redirect()->route('instructor.coupons.index')
                       ->with('success', 'Coupon created successfully');
    }

    /**
     * Show edit coupon form
     */
    public function edit($coupon)
    {
        return view('instructor.coupons.edit', compact('coupon'));
    }

    /**
     * Update coupon
     */
    public function update(Request $request, $coupon)
    {
        // Implementation here
    }

    /**
     * Delete coupon
     */
    public function destroy($coupon)
    {
        // Implementation here
    }
}
