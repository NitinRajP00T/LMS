@extends('layouts.student')

@section('title', 'Shopping Cart')

@push('styles')
<style>
/* ── Cart item card ── */
.cart-item {
    background: #fff;
    border-radius: 14px;
    border: 1px solid #e2e8f0;
    box-shadow: 0 2px 12px rgba(15,23,42,.05);
    padding: 16px;
    display: flex;
    gap: 16px;
    align-items: flex-start;
    transition: box-shadow .2s;
}
.cart-item:hover { box-shadow: 0 6px 24px rgba(15,23,42,.09); }

/* ── Badge ── */
.badge-free { background:#d1fae5; color:#065f46; padding:2px 10px; border-radius:99px; font-size:.72rem; font-weight:700; }
.badge-paid { background:#eff6ff; color:#1d4ed8; padding:2px 10px; border-radius:99px; font-size:.72rem; font-weight:700; }

/* ── Payment tabs ── */
.pay-tab {
    flex: 1; display:flex; align-items:center; justify-content:center; gap:8px;
    padding: 12px 16px; border-radius: 10px; font-weight:700; font-size:.9rem;
    border: 2px solid #e2e8f0; background: #fff; cursor: pointer;
    transition: all .2s; color: #64748b;
}
.pay-tab.active { border-color: #6366f1; background: #eef2ff; color: #6366f1; }

/* ── Inputs ── */
.f-input {
    width: 100%; border: 1.5px solid #e2e8f0; border-radius: 10px;
    padding: 11px 14px; font-size: .9rem; background:#fff;
    transition: border .2s, box-shadow .2s; outline:none; box-sizing:border-box;
}
.f-input:focus { border-color: #6366f1; box-shadow: 0 0 0 3px rgba(99,102,241,.12); }

/* ── Free enroll box ── */
.free-enroll-box {
    background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
    border: 2px solid #6ee7b7;
    border-radius: 16px;
    padding: 28px 24px;
    text-align: center;
}

/* ── Section divider ── */
.section-label {
    font-size: .72rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .08em; color: #94a3b8; margin-bottom: 10px;
}
</style>
@endpush

@section('student-content')
<div class="space-y-6">

    <div>
        <h1 class="text-3xl font-bold text-gray-800">Shopping Cart</h1>
        <p class="text-gray-600 mt-1">Review your courses before checkout</p>
    </div>

    @if($courses->count())
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- ════════════ LEFT: Course list ════════════ --}}
            <div class="lg:col-span-2 space-y-4">

                {{-- Free courses section --}}
                @if($freeCourses->count())
                    <p class="section-label">🎁 Free Courses</p>
                    @foreach($freeCourses as $course)
                        <div class="cart-item">
                            <div style="width:100px;height:68px;flex-shrink:0;border-radius:10px;overflow:hidden;background:#e0e7ff;">
                                @if($course->image)
                                    <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}"
                                         style="width:100%;height:100%;object-fit:cover;">
                                @else
                                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:1.4rem;">📚</div>
                                @endif
                            </div>
                            <div style="flex:1;">
                                <h2 style="font-size:.97rem;font-weight:700;color:#1e293b;line-height:1.3;">{{ $course->title }}</h2>
                                @if($course->instructor)
                                    <p style="font-size:.8rem;color:#64748b;margin-top:2px;">{{ $course->instructor->name }}</p>
                                @endif
                                <div style="margin-top:6px;">
                                    <span class="badge-free">FREE</span>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('student.checkout.remove', $course) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="font-size:.78rem;color:#ef4444;background:none;border:none;cursor:pointer;white-space:nowrap;">
                                    ✕ Remove
                                </button>
                            </form>
                        </div>
                    @endforeach
                @endif

                {{-- Paid courses section --}}
                @if($paidCourses->count())
                    @if($freeCourses->count())
                        <p class="section-label" style="margin-top:24px;">💳 Paid Courses</p>
                    @endif
                    @foreach($paidCourses as $course)
                        <div class="cart-item">
                            <div style="width:100px;height:68px;flex-shrink:0;border-radius:10px;overflow:hidden;background:#dbeafe;">
                                @if($course->image)
                                    <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}"
                                         style="width:100%;height:100%;object-fit:cover;">
                                @else
                                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:1.4rem;">📚</div>
                                @endif
                            </div>
                            <div style="flex:1;">
                                <h2 style="font-size:.97rem;font-weight:700;color:#1e293b;line-height:1.3;">{{ $course->title }}</h2>
                                @if($course->instructor)
                                    <p style="font-size:.8rem;color:#64748b;margin-top:2px;">{{ $course->instructor->name }}</p>
                                @endif
                                <div style="margin-top:6px;display:flex;align-items:center;gap:8px;">
                                    <span style="font-weight:800;color:#1d4ed8;font-size:.97rem;">
                                        ₹{{ number_format($course->price, 2) }}
                                    </span>
                                    @if($course->discount_percent > 0)
                                        <span class="badge-paid">-{{ $course->discount_percent }}% off</span>
                                    @endif
                                </div>
                            </div>
                            <form method="POST" action="{{ route('student.checkout.remove', $course) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="font-size:.78rem;color:#ef4444;background:none;border:none;cursor:pointer;white-space:nowrap;">
                                    ✕ Remove
                                </button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>

            {{-- ════════════ RIGHT: Order summary + payment ════════════ --}}
            <div class="lg:col-span-1">
                <div style="background:#fff;border-radius:16px;border:1px solid #e2e8f0;
                            box-shadow:0 4px 24px rgba(15,23,42,.06);padding:24px;position:sticky;top:88px;">

                    <h2 style="font-size:1.1rem;font-weight:800;color:#0f172a;margin-bottom:16px;">
                        Order Summary
                    </h2>

                    {{-- Breakdown --}}
                    <div style="font-size:.88rem;color:#64748b;space-y:6px;">
                        @if($freeCourses->count())
                            <div style="display:flex;justify-content:space-between;margin-bottom:6px;">
                                <span>Free courses ({{ $freeCourses->count() }})</span>
                                <span class="badge-free">FREE</span>
                            </div>
                        @endif
                        @if($paidCourses->count())
                            <div style="display:flex;justify-content:space-between;margin-bottom:6px;">
                                <span>Paid courses ({{ $paidCourses->count() }})</span>
                                <span style="font-weight:600;color:#1e293b;">₹{{ number_format($total, 2) }}</span>
                            </div>
                        @endif
                    </div>

                    <div style="border-top:1.5px solid #f1f5f9;margin:14px 0;padding-top:14px;
                                display:flex;justify-content:space-between;font-weight:800;font-size:1.05rem;color:#0f172a;">
                        <span>Total</span>
                        <span>{{ $allFree ? 'FREE' : '₹' . number_format($total, 2) }}</span>
                    </div>

                    @if($errors->any())
                        <div style="background:#fef2f2;border:1px solid #fecaca;border-radius:8px;padding:10px 12px;margin-bottom:12px;font-size:.83rem;color:#b91c1c;">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

                    {{-- ════════════════════════════════════
                         CASE A: ALL FREE — No payment needed
                    ════════════════════════════════════ --}}
                    @if($allFree)
                        <div class="free-enroll-box">
                            <div style="font-size:2rem;margin-bottom:8px;">🎁</div>
                            <h3 style="font-size:1rem;font-weight:800;color:#064e3b;margin-bottom:4px;">
                                All courses are FREE!
                            </h3>
                            <p style="font-size:.82rem;color:#065f46;margin-bottom:16px;">
                                No payment required. Click below to enroll instantly.
                            </p>
                            <form method="POST" action="{{ route('student.checkout.process') }}">
                                @csrf
                                {{-- No payment_method field — controller handles it --}}
                                <button type="submit"
                                        style="width:100%;padding:13px;background:#10b981;color:#fff;
                                               border:none;border-radius:10px;font-weight:700;font-size:.95rem;
                                               cursor:pointer;transition:background .2s;"
                                        onmouseover="this.style.background='#059669'"
                                        onmouseout="this.style.background='#10b981'">
                                    🎓 Enroll for Free
                                </button>
                            </form>
                        </div>

                    {{-- ════════════════════════════════════
                         CASE B: PAID (or mixed) — Show payment gateway
                    ════════════════════════════════════ --}}
                    @else
                        @if($freeCourses->count())
                            <p style="font-size:.78rem;color:#059669;margin-bottom:12px;background:#ecfdf5;
                                      border-radius:8px;padding:8px 12px;border:1px solid #6ee7b7;">
                                ✓ Free course(s) will be enrolled automatically with your purchase.
                            </p>
                        @endif

                        <form method="POST" action="{{ route('student.checkout.process') }}" id="payForm">
                            @csrf

                            {{-- ── Razorpay Payment ── --}}
                            <div style="background:#f8fafc;border:1.5px solid #e2e8f0;border-radius:12px;
                                        padding:24px;text-align:center;margin-bottom:16px;">
                                <div style="font-size:2.5rem;margin-bottom:8px;color:#0f172a;">💳</div>
                                <p style="font-size:.88rem;color:#334155;font-weight:600;margin-bottom:4px;">
                                    Secure Checkout
                                </p>
                                <p style="font-size:.78rem;color:#64748b;">
                                    Click below to open the secure payment gateway to complete your purchase using Cards, UPI, or NetBanking.
                                </p>
                            </div>

                            <button type="submit" id="submitBtn"
                                    style="width:100%;padding:13px;background:linear-gradient(135deg,#6366f1,#4f46e5);
                                           color:#fff;border:none;border-radius:12px;font-weight:800;font-size:.95rem;
                                           cursor:pointer;box-shadow:0 4px 16px rgba(99,102,241,.3);
                                           transition:opacity .2s,transform .15s;"
                                    onmouseover="this.style.opacity='.9'"
                                    onmouseout="this.style.opacity='1'">
                                🔒 Complete Payment — ₹{{ number_format($total, 2) }}
                            </button>

                            <p style="text-align:center;font-size:.72rem;color:#94a3b8;margin-top:10px;">
                                By clicking above you agree to our
                                <a href="#" style="color:#6366f1;">Terms of Service</a>.
                            </p>
                        </form>
                    @endif

                    {{-- Continue shopping --}}
                    <a href="{{ route('courses.browse') }}"
                       style="display:block;text-align:center;font-size:.82rem;color:#6366f1;
                              margin-top:14px;text-decoration:none;">
                        ← Continue Shopping
                    </a>
                </div>
            </div>
        </div>

    @else
        @include('components.common.empty-state', [
            'icon'       => 'fa-shopping-cart',
            'title'      => 'Your Cart is Empty',
            'message'    => 'Browse courses and add them to your cart to get started.',
            'actionUrl'  => route('courses.browse'),
            'actionText' => 'Browse Courses',
        ])
    @endif

</div>

@include('components.student.ai-assistant-fab')
@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
const payForm = document.getElementById('payForm');
if (payForm) {
    payForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = 'Processing...';
        submitBtn.disabled = true;

        try {
            // 1. Create Order on Server
            const response = await fetch("{{ route('student.checkout.process') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({})
            });

            const data = await response.json();

            if (!response.ok) {
                throw new Error(data.error || 'Failed to initialize payment');
            }

            // 2. Open Razorpay Checkout
            const options = {
                "key": data.key,
                "amount": data.amount,
                "currency": data.currency,
                "name": data.name,
                "description": "Course Enrollment",
                "order_id": data.order_id,
                "handler": function (response){
                    // 3. Verify Payment on Server
                    verifyPayment(response);
                },
                "prefill": {
                    "name": data.user.name,
                    "email": data.user.email
                },
                "theme": {
                    "color": "#6366f1"
                },
                "modal": {
                    "ondismiss": function() {
                        submitBtn.innerHTML = originalText;
                        submitBtn.disabled = false;
                    }
                }
            };

            const rzp = new Razorpay(options);
            rzp.on('payment.failed', function (response){
                alert(response.error.description);
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
            rzp.open();

        } catch (error) {
            console.error(error);
            alert(error.message);
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        }
    });
}

function verifyPayment(paymentResponse) {
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = "{{ route('student.checkout.verify') }}";

    const csrfToken = document.createElement('input');
    csrfToken.type = 'hidden';
    csrfToken.name = '_token';
    csrfToken.value = '{{ csrf_token() }}';
    form.appendChild(csrfToken);

    ['razorpay_payment_id', 'razorpay_order_id', 'razorpay_signature'].forEach(field => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = field;
        input.value = paymentResponse[field];
        form.appendChild(input);
    });

    document.body.appendChild(form);
    form.submit();
}
</script>
@endpush
