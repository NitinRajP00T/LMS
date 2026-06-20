<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart    = session()->get('cart', []);
        $courses = Course::whereIn('id', $cart)->with('instructor')->get();

        $paidCourses = $courses->where('price', '>', 0);
        $freeCourses = $courses->where('price', '<=', 0);
        $total       = $paidCourses->sum('price');
        $allFree     = $paidCourses->isEmpty() && $freeCourses->isNotEmpty();

        return view('student.checkout.index', compact(
            'courses', 'paidCourses', 'freeCourses', 'total', 'allFree'
        ));
    }

    public function add(Course $course)
    {
        $cart = session()->get('cart', []);

        if (! in_array($course->id, $cart)) {
            $cart[] = $course->id;
            session()->put('cart', $cart);
            session()->put('cart_count', count($cart));
        }

        return back()->with('success', 'Added to cart');
    }

    public function remove(Course $course)
    {
        $cart = array_values(array_filter(
            session()->get('cart', []),
            fn ($id) => (int) $id !== $course->id
        ));

        session()->put('cart', $cart);
        session()->put('cart_count', count($cart));

        return back()->with('success', 'Removed from cart');
    }

    public function process(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            if ($request->wantsJson()) {
                return response()->json(['error' => 'Your cart is empty'], 400);
            }
            return redirect()->route('student.checkout.index')
                ->with('warning', 'Your cart is empty');
        }

        $courses     = Course::whereIn('id', $cart)->get();
        $paidCourses = $courses->where('price', '>', 0);
        $hasPaidItems = $paidCourses->isNotEmpty();

        if ($hasPaidItems) {
            if (!$request->wantsJson()) {
                return back()->with('error', 'Please complete the payment using the payment gateway.');
            }

            // Create Razorpay order
            $api = new \Razorpay\Api\Api(config('services.razorpay.key'), config('services.razorpay.secret'));
            $totalAmount = $paidCourses->sum('price');
            
            $orderData = [
                'receipt'         => 'rcptid_' . auth()->id() . '_' . time(),
                'amount'          => intval($totalAmount * 100), // Amount in paise
                'currency'        => 'INR',
                'payment_capture' => 1 // auto capture
            ];

            try {
                $razorpayOrder = $api->order->create($orderData);
                
                return response()->json([
                    'order_id' => $razorpayOrder['id'],
                    'amount'   => $orderData['amount'],
                    'currency' => 'INR',
                    'key'      => config('services.razorpay.key'),
                    'name'     => config('app.name'),
                    'user'     => [
                        'name'  => auth()->user()->name,
                        'email' => auth()->user()->email,
                    ]
                ]);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        // Enroll student in all free cart courses
        foreach ($cart as $courseId) {
            auth()->user()->enrollments()->firstOrCreate(
                ['course_id' => $courseId],
                ['enrolled_at' => now()]
            );
        }

        session()->forget('cart');
        session()->put('cart_count', 0);

        return redirect()->route('student.checkout.success')
            ->with('success', 'You have been enrolled in your free course(s). Enjoy learning!');
    }

    public function verify(Request $request)
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('student.checkout.index');
        }

        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id'   => 'required|string',
            'razorpay_signature'  => 'required|string',
        ]);

        $api = new \Razorpay\Api\Api(config('services.razorpay.key'), config('services.razorpay.secret'));

        try {
            $attributes = [
                'razorpay_order_id'   => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature'  => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);
        } catch (\Razorpay\Api\Errors\SignatureVerificationError $e) {
            return redirect()->route('student.checkout.index')
                ->with('error', 'Payment verification failed: ' . $e->getMessage());
        }

        // Signature verified, enroll user and create payment records
        $courses = Course::whereIn('id', $cart)->get();
        
        foreach ($courses as $course) {
            auth()->user()->enrollments()->firstOrCreate(
                ['course_id' => $course->id],
                ['enrolled_at' => now()]
            );

            // Create Payment record for paid courses
            if ($course->price > 0) {
                \App\Models\Payment::create([
                    'user_id'        => auth()->id(),
                    'course_id'      => $course->id,
                    'amount'         => $course->price,
                    'payment_method' => 'razorpay',
                    'status'         => 'completed',
                    'transaction_id' => $request->razorpay_payment_id,
                ]);
            }
        }

        session()->forget('cart');
        session()->put('cart_count', 0);

        return redirect()->route('student.checkout.success')
            ->with('success', 'Payment successful! You can now access your courses.');
    }

    public function success()
    {
        return view('student.checkout.completion');
    }
}
