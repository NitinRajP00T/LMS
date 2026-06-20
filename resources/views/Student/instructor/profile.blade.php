@extends('layouts.app')

@section('title', $instructor->name . ' — Instructor Profile')
@section('meta_description', 'View ' . $instructor->name . "'s public profile and all their published courses on LearnHub.")

@push('styles')
<style>
    /* ── Gradient hero ── */
    .instructor-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 50%, #0f172a 100%);
        position: relative;
        overflow: hidden;
    }
    .instructor-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at 20% 50%, rgba(99,102,241,.25) 0%, transparent 55%),
            radial-gradient(circle at 80% 30%, rgba(16,185,129,.15) 0%, transparent 50%);
        pointer-events: none;
    }

    /* ── Avatar ring ── */
    .avatar-ring {
        background: linear-gradient(135deg, #6366f1, #10b981, #f59e0b);
        padding: 3px;
        border-radius: 9999px;
        display: inline-block;
    }
    .avatar-inner {
        background: #0f172a;
        border-radius: 9999px;
        padding: 2px;
    }

    /* ── Stat chip ── */
    .stat-chip {
        background: rgba(255,255,255,.08);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255,255,255,.12);
        border-radius: 1rem;
        padding: .75rem 1.5rem;
        text-align: center;
        transition: background .2s;
    }
    .stat-chip:hover { background: rgba(255,255,255,.14); }

    /* ── Course card ── */
    .course-card {
        background: #ffffff;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(15,23,42,.07);
        border: 1px solid rgba(15,23,42,.06);
        transition: transform .25s, box-shadow .25s;
    }
    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 40px rgba(15,23,42,.14);
    }
    .course-thumb {
        height: 160px;
        width: 100%;
        object-fit: cover;
    }
    .course-thumb-placeholder {
        height: 160px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        font-size: 2.5rem;
        color: white;
    }
    .badge-level {
        font-size: .68rem;
        font-weight: 700;
        letter-spacing: .05em;
        text-transform: uppercase;
        padding: .2rem .6rem;
        border-radius: .4rem;
    }
    .badge-beginner   { background: #d1fae5; color: #065f46; }
    .badge-intermediate { background: #fef3c7; color: #92400e; }
    .badge-advanced   { background: #fee2e2; color: #991b1b; }

    /* ── Sort bar ── */
    .sort-btn {
        padding: .45rem 1.1rem;
        border-radius: .6rem;
        font-size: .85rem;
        font-weight: 600;
        border: 1.5px solid #e2e8f0;
        color: #64748b;
        background: #fff;
        cursor: pointer;
        transition: all .2s;
    }
    .sort-btn:hover,
    .sort-btn.active {
        background: #6366f1;
        border-color: #6366f1;
        color: #fff;
    }

    /* ── Star rating ── */
    .stars { color: #f59e0b; font-size: .9rem; }

    /* ── Empty state ── */
    .empty-card {
        background: linear-gradient(135deg, #f8fafc, #eff6ff);
        border: 2px dashed #bfdbfe;
        border-radius: 1.5rem;
        padding: 4rem 2rem;
        text-align: center;
    }

    /* ── Pagination ── */
    .pagination { display: flex; gap: .5rem; justify-content: center; margin-top: 2.5rem; flex-wrap: wrap; }
    .pagination a, .pagination span {
        padding: .5rem .9rem; border-radius: .6rem; font-size: .9rem; font-weight: 600;
        border: 1.5px solid #e2e8f0; color: #475569; background: #fff;
        text-decoration: none; transition: all .2s;
    }
    .pagination a:hover { background: #6366f1; color: #fff; border-color: #6366f1; }
    .pagination .active span { background: #6366f1; color: #fff; border-color: #6366f1; }
    .pagination .disabled span { opacity: .4; cursor: not-allowed; }
</style>
@endpush

@section('content')

{{-- ═══════════════════════════════════════════
     HERO — Instructor Bio
═══════════════════════════════════════════ --}}
<section class="instructor-hero pt-20 pb-16">
    <div class="max-w-6xl mx-auto px-6 relative z-10">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8">

            {{-- Avatar --}}
            <div class="avatar-ring flex-shrink-0">
                <div class="avatar-inner">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($instructor->name) }}&size=140&background=6366f1&color=fff&bold=true&font-size=0.4"
                         alt="{{ $instructor->name }}"
                         class="w-32 h-32 md:w-36 md:h-36 rounded-full">
                </div>
            </div>

            {{-- Info --}}
            <div class="flex-1 text-center md:text-left">
                {{-- Name & badge --}}
                <div class="flex flex-col md:flex-row items-center md:items-center gap-3 mb-2">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">
                        {{ $instructor->name }}
                    </h1>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold
                                 bg-indigo-500/30 text-indigo-200 border border-indigo-400/40">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0z"/>
                        </svg>
                        Instructor
                    </span>
                </div>

                <p class="text-slate-400 text-sm mb-6">{{ $instructor->email }}</p>

                {{-- Stats row --}}
                <div class="flex flex-wrap gap-3 justify-center md:justify-start">
                    <div class="stat-chip">
                        <div class="text-2xl font-extrabold text-white">{{ $totalCourses }}</div>
                        <div class="text-xs text-slate-400 mt-0.5">Published Courses</div>
                    </div>
                    <div class="stat-chip">
                        <div class="text-2xl font-extrabold text-white">{{ number_format($totalStudents) }}</div>
                        <div class="text-xs text-slate-400 mt-0.5">Total Students</div>
                    </div>
                    @if($avgRating)
                    <div class="stat-chip">
                        <div class="text-2xl font-extrabold text-white flex items-center justify-center gap-1">
                            {{ number_format($avgRating, 1) }}
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <div class="text-xs text-slate-400 mt-0.5">Avg Rating</div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════
     COURSES SECTION
═══════════════════════════════════════════ --}}
<section class="max-w-6xl mx-auto px-6 py-12">

    {{-- Section heading + Sort bar --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Courses by {{ $instructor->name }}
            </h2>
            <p class="text-gray-500 text-sm mt-1">
                {{ $courses->total() }} published {{ Str::plural('course', $courses->total()) }}
            </p>
        </div>

        {{-- Sort buttons --}}
        <form method="GET" action="{{ route('instructor.profile', $instructor) }}"
              class="flex flex-wrap gap-2" id="sort-form">
            @foreach([
                'newest'   => 'Newest',
                'popular'  => 'Most Popular',
                'rating'   => 'Top Rated',
                'price_lo' => 'Price ↑',
                'price_hi' => 'Price ↓',
            ] as $val => $label)
                <button type="submit" name="sort" value="{{ $val }}"
                        class="sort-btn {{ $sort === $val ? 'active' : '' }}">
                    {{ $label }}
                </button>
            @endforeach
        </form>
    </div>

    {{-- Course Grid --}}
    @if($courses->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($courses as $course)
            <a href="{{ route('courses.detail', $course) }}" class="course-card group block">

                {{-- Thumbnail --}}
                @if($course->image)
                    <img src="{{ Storage::url($course->image) }}"
                         alt="{{ $course->title }}"
                         class="course-thumb">
                @else
                    <div class="course-thumb-placeholder">
                        📚
                    </div>
                @endif

                {{-- Body --}}
                <div class="p-5">
                    {{-- Category + Level --}}
                    <div class="flex items-center gap-2 mb-2 flex-wrap">
                        @if($course->category)
                            <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded">
                                {{ $course->category->name }}
                            </span>
                        @endif
                        @if($course->level)
                            <span class="badge-level badge-{{ $course->level }}">{{ $course->level }}</span>
                        @endif
                    </div>

                    {{-- Title --}}
                    <h3 class="font-bold text-gray-900 text-base leading-snug mb-2 line-clamp-2
                                group-hover:text-indigo-600 transition-colors">
                        {{ $course->title }}
                    </h3>

                    {{-- Description snippet --}}
                    @if($course->description)
                        <p class="text-gray-500 text-sm line-clamp-2 mb-3">
                            {{ $course->description }}
                        </p>
                    @endif

                    {{-- Rating + Students --}}
                    <div class="flex items-center gap-3 text-sm text-gray-500 mb-3">
                        @if($course->average_rating)
                            <span class="flex items-center gap-1">
                                <span class="stars">
                                    @for($s = 1; $s <= 5; $s++)
                                        @if($s <= floor($course->average_rating))★@else☆@endif
                                    @endfor
                                </span>
                                <span class="font-semibold text-gray-700">
                                    {{ number_format($course->average_rating, 1) }}
                                </span>
                            </span>
                        @endif
                        <span>
                            <svg class="inline w-4 h-4 mr-0.5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-4a4 4 0 100-8 4 4 0 000 8z"/>
                            </svg>
                            {{ number_format($course->students_count ?? 0) }} students
                        </span>
                    </div>

                    {{-- Price --}}
                    <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                        <div class="font-extrabold text-gray-900 text-lg">
                            @if($course->price > 0)
                                ₹{{ number_format($course->price, 2) }}
                                @if($course->discount_percent > 0)
                                    <span class="ml-1 text-xs font-semibold text-red-500 bg-red-50 px-1.5 py-0.5 rounded">
                                        -{{ $course->discount_percent }}%
                                    </span>
                                @endif
                            @else
                                <span class="text-emerald-600">Free</span>
                            @endif
                        </div>
                        <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 px-2.5 py-1 rounded-lg
                                     group-hover:bg-indigo-600 group-hover:text-white transition-all">
                            View Course →
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($courses->hasPages())
            <div class="pagination">
                {{ $courses->onEachSide(1)->links() }}
            </div>
        @endif

    @else
        {{-- Empty state --}}
        <div class="empty-card">
            <div class="text-5xl mb-4">🎓</div>
            <h3 class="text-xl font-bold text-gray-700 mb-2">No published courses yet</h3>
            <p class="text-gray-500">{{ $instructor->name }} hasn't published any courses yet. Check back soon!</p>
        </div>
    @endif

</section>

@include('components.student.ai-assistant-fab')
@endsection
