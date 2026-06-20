@extends('layouts.app')

@section('title', $course->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="space-y-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    @if($course->image)
                        <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" class="w-full h-64 object-cover">
                    @else
                        <div class="w-full h-64 flex items-center justify-center bg-gradient-to-br from-blue-400 to-blue-600">
                            <i class="fas fa-book text-white text-6xl"></i>
                        </div>
                    @endif

                    <div class="p-6">
                        @if($course->category)
                            <span class="text-xs font-semibold px-2 py-1 bg-blue-50 text-blue-600 rounded">{{ $course->category->name }}</span>
                        @endif

                        <h1 class="text-3xl font-bold text-gray-800 mt-3">{{ $course->title }}</h1>

                        <div class="flex flex-wrap items-center gap-4 mt-4 text-sm text-gray-600">
                            <span><i class="fas fa-user mr-1"></i>
                                <a href="{{ route('instructor.profile', $course->instructor) }}"
                                   class="hover:text-blue-600 transition-colors hover:underline">
                                    {{ $course->instructor->name }}
                                </a>
                            </span>
                            @if($course->average_rating)
                                <span><i class="fas fa-star text-yellow-400 mr-1"></i>{{ number_format($course->average_rating, 1) }}</span>
                            @endif
                            <span><i class="fas fa-users mr-1"></i>{{ $course->students_count ?? 0 }} students</span>
                            @if($course->level)
                                <span><i class="fas fa-signal mr-1"></i>{{ ucfirst($course->level) }}</span>
                            @endif
                        </div>

                        <div class="mt-6 prose max-w-none text-gray-700">
                            <h2 class="text-xl font-bold text-gray-800 mb-2">About this course</h2>
                            <p>{{ $course->description }}</p>
                        </div>

                        @if($course->learning_points)
                            <div class="mt-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-3">What you'll learn</h2>
                                <div class="text-gray-700 whitespace-pre-line">{{ $course->learning_points }}</div>
                            </div>
                        @endif

                        @if($course->requirements)
                            <div class="mt-6">
                                <h2 class="text-xl font-bold text-gray-800 mb-3">Requirements</h2>
                                <div class="text-gray-700 whitespace-pre-line">{{ $course->requirements }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                @if($course->instructor)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Your Instructor</h2>
                        <div class="flex flex-col sm:flex-row items-start gap-4">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($course->instructor->name) }}&size=96&background=2563eb&color=fff"
                                 alt="{{ $course->instructor->name }}"
                                 class="w-20 h-20 rounded-full object-cover border-2 border-blue-100 flex-shrink-0">
                            <div>
                                <a href="{{ route('instructor.profile', $course->instructor) }}"
                                   class="inline-block">
                                    <h3 class="text-lg font-bold text-gray-800 hover:text-blue-600 transition-colors">
                                        {{ $course->instructor->name }}
                                    </h3>
                                </a>
                                <p class="text-sm text-blue-600 font-medium mt-1">Course Instructor</p>
                                <div class="flex flex-wrap gap-4 mt-3 text-sm text-gray-600">
                                    <span><i class="fas fa-book mr-1"></i>{{ $course->instructor->courses()->where('is_published', true)->count() }} courses</span>
                                    <span><i class="fas fa-users mr-1"></i>{{ $course->students_count ?? 0 }} students in this course</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if($course->lessons->count())
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-gray-800">Course Curriculum</h2>
                            <span class="text-sm text-gray-500">
                                {{ $course->lessons->count() }} lessons
                                @php $totalMinutes = $course->lessons->sum('duration'); @endphp
                                @if($totalMinutes > 0)
                                    • {{ $totalMinutes }} min total
                                @endif
                            </span>
                        </div>
                        <ul class="divide-y divide-gray-200">
                            @foreach($course->lessons as $index => $lesson)
                                <li class="py-3 flex items-center justify-between">
                                    <span class="text-gray-800 flex items-center gap-2">
                                        <span class="w-7 h-7 rounded-full bg-blue-50 text-blue-600 text-xs font-bold flex items-center justify-center flex-shrink-0">
                                            {{ $index + 1 }}
                                        </span>
                                        <i class="fas fa-play-circle text-blue-600"></i>
                                        <span>{{ $lesson->title }}</span>
                                    </span>
                                    @if($lesson->duration)
                                        <span class="text-sm text-gray-500 flex-shrink-0 ml-4">{{ $lesson->duration }} min</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if($reviews->count())
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Student Reviews</h2>
                        <div class="space-y-4">
                            @foreach($reviews as $review)
                                <div class="border-b border-gray-100 pb-4 last:border-0">
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="font-medium text-gray-800">{{ $review->user->name ?? 'Student' }}</span>
                                        <span class="text-yellow-400 text-sm">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                                            @endfor
                                        </span>
                                    </div>
                                    @if($review->comment)
                                        <p class="text-gray-600 text-sm">{{ $review->comment }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        @if($reviews->hasPages())
                            <div class="mt-4">{{ $reviews->links() }}</div>
                        @endif
                    </div>
                @endif
            </div>

            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <div class="text-3xl font-bold text-gray-800 mb-1">
                        @if($course->price > 0)
                            ₹{{ number_format($course->price, 2) }}
                        @else
                            Free
                        @endif
                    </div>
                    @if($course->discount_percent > 0)
                        <p class="text-sm text-red-600 font-semibold mb-4">{{ $course->discount_percent }}% off</p>
                    @endif

                    @auth
                        @if($isEnrolled)
                            <a href="{{ route('student.my-learning.player', $course) }}"
                               class="block w-full text-center bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition font-medium mb-3">
                                <i class="fas fa-play mr-2"></i>Go to Course
                            </a>
                        @else
                            {{-- ── FREE COURSE → Direct enroll, no cart ── --}}
                            @if($course->price <= 0)
                                <form method="POST" action="{{ route('student.courses.enroll', $course) }}" class="mb-3">
                                    @csrf
                                    <button type="submit"
                                            class="w-full bg-emerald-600 text-white px-6 py-3 rounded-lg hover:bg-emerald-700 transition font-medium">
                                        🎓 Enroll for Free
                                    </button>
                                </form>
                                <p class="text-xs text-center text-emerald-700 bg-emerald-50 rounded-lg px-3 py-2 mb-3 font-medium">
                                    🎁 This course is completely free! No payment required.
                                </p>

                            {{-- ── PAID COURSE → Enroll + Cart + Wishlist ── --}}
                            @else
                                <form method="POST" action="{{ route('student.courses.enroll', $course) }}" class="mb-3">
                                    @csrf
                                    <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium">
                                        <i class="fas fa-graduation-cap mr-2"></i>Enroll Now
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('student.checkout.add', $course) }}" class="mb-3">
                                    @csrf
                                    <button type="submit" class="w-full border border-blue-600 text-blue-600 px-6 py-3 rounded-lg hover:bg-blue-50 transition font-medium">
                                        <i class="fas fa-shopping-cart mr-2"></i>Add to Cart
                                    </button>
                                </form>
                            @endif

                            {{-- Wishlist — both free and paid --}}
                            @if($isInWishlist)
                                <form method="POST" action="{{ route('student.wishlist.remove', $course) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full border border-red-300 text-red-600 px-6 py-3 rounded-lg hover:bg-red-50 transition font-medium">
                                        <i class="fas fa-heart mr-2"></i>Remove from Wishlist
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('student.wishlist.add', $course) }}">
                                    @csrf
                                    <button type="submit" class="w-full border border-gray-300 text-gray-700 px-6 py-3 rounded-lg hover:bg-gray-50 transition font-medium">
                                        <i class="far fa-heart mr-2"></i>Add to Wishlist
                                    </button>
                                </form>
                            @endif
                        @endif

                    @else
                        <a href="{{ route('login') }}"
                           class="block w-full text-center bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium">
                            Login to Enroll
                        </a>
                    @endauth

                    <ul class="mt-6 space-y-3 text-sm text-gray-600">
                        <li><i class="fas fa-book-open w-5 mr-2 text-blue-600"></i>{{ $course->lessons->count() }} lessons</li>
                        @if($course->language)
                            <li><i class="fas fa-language w-5 mr-2 text-blue-600"></i>{{ $course->language }}</li>
                        @endif
                        <li><i class="fas fa-infinity w-5 mr-2 text-blue-600"></i>Lifetime access</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.student.ai-assistant-fab')
@endsection
