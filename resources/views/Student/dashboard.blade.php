@extends('layouts.student')

@section('title', 'Student Dashboard')

@section('student-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Welcome back, {{ auth()->user()->name }}! 👋</h1>
            <p class="text-gray-600 mt-1">Continue your learning journey</p>
        </div>
        <a href="{{ route('courses.browse') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>Browse Courses
        </a>
    </div>
    
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Total Courses -->
        <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-blue-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Enrolled Courses</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ auth()->user()->enrollments()->count() }}</p>
                </div>
                <i class="fas fa-book text-4xl text-blue-600 opacity-20"></i>
            </div>
        </div>
        
        <!-- In Progress -->
        <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-green-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">In Progress</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">5</p>
                </div>
                <i class="fas fa-hourglass-half text-4xl text-green-600 opacity-20"></i>
            </div>
        </div>
        
        <!-- Completed -->
        <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-purple-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Completed</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">2</p>
                </div>
                <i class="fas fa-check-circle text-4xl text-purple-600 opacity-20"></i>
            </div>
        </div>
        
        <!-- Learning Hours -->
        <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-orange-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Learning Hours</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">24.5h</p>
                </div>
                <i class="fas fa-clock text-4xl text-orange-600 opacity-20"></i>
            </div>
        </div>
    </div>
    
    <!-- Continue Learning -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Continue Learning</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse(auth()->user()->enrollments()->with('course')->limit(6)->get() as $enrollment)
                @include('components.cards.course-card', ['course' => $enrollment->course])
            @empty
                @include('components.common.empty-state', [
                    'icon' => 'fa-book',
                    'title' => 'No Courses Yet',
                    'message' => 'Start learning by enrolling in a course from our catalog',
                    'actionUrl' => route('courses.browse'),
                    'actionText' => 'Explore Courses'
                ])
            @endforelse
        </div>
    </div>
</div>

@include('components.student.ai-assistant-fab')
@endsection
