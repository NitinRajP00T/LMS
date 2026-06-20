@extends('layouts.student')

@section('title', 'My Learning')

@section('student-content')
<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">My Learning</h1>
            <p class="text-gray-600 mt-1">Pick up where you left off</p>
        </div>
        <a href="{{ route('courses.browse') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium inline-flex items-center">
            <i class="fas fa-search mr-2"></i>Browse Courses
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @forelse($enrollments as $enrollment)
        @php $course = $enrollment->course; @endphp
        <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row">
            <div class="md:w-64 h-48 md:h-auto bg-gray-200 flex-shrink-0">
                @if($course?->image)
                    <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-400 to-blue-600 min-h-[12rem]">
                        <i class="fas fa-book text-white text-4xl"></i>
                    </div>
                @endif
            </div>

            <div class="p-6 flex-grow flex flex-col justify-between">
                <div>
                    <div class="flex flex-wrap items-center gap-2 mb-2">
                        @if($course?->category)
                            <span class="text-xs font-semibold px-2 py-1 bg-blue-50 text-blue-600 rounded">{{ $course->category->name }}</span>
                        @endif
                        @if($enrollment->completed_at)
                            <span class="text-xs font-semibold px-2 py-1 bg-green-50 text-green-600 rounded">Completed</span>
                        @else
                            <span class="text-xs font-semibold px-2 py-1 bg-yellow-50 text-yellow-700 rounded">In Progress</span>
                        @endif
                    </div>

                    <h2 class="text-xl font-bold text-gray-800 mb-1">{{ $course?->title ?? 'Course unavailable' }}</h2>

                    @if($course?->instructor)
                        <p class="text-sm text-gray-600 mb-3">
                            <i class="fas fa-user mr-1"></i>{{ $course->instructor->name }}
                        </p>
                    @endif

                    <p class="text-sm text-gray-500">
                        Enrolled {{ $enrollment->enrolled_at?->diffForHumans() ?? $enrollment->created_at->diffForHumans() }}
                    </p>
                </div>

                <div class="mt-4 flex flex-wrap gap-3">
                    @if($course)
                        <a href="{{ route('student.my-learning.player', $course) }}"
                           class="inline-flex items-center px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                            <i class="fas fa-play mr-2"></i>
                            {{ $enrollment->completed_at ? 'Review Course' : 'Continue Learning' }}
                        </a>
                        <a href="{{ route('courses.detail', $course) }}"
                           class="inline-flex items-center px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                            View Details
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        @include('components.common.empty-state', [
            'icon' => 'fa-graduation-cap',
            'title' => 'No Enrolled Courses',
            'message' => 'You have not enrolled in any courses yet. Browse our catalog to start learning.',
            'actionUrl' => route('courses.browse'),
            'actionText' => 'Explore Courses',
        ])
    @endforelse

    @if($enrollments->hasPages())
        <div class="mt-6">
            {{ $enrollments->links() }}
        </div>
    @endif
</div>

@include('components.student.ai-assistant-fab')
@endsection
