@extends('layouts.instructor')

@section('title', 'Instructor Dashboard')

@section('instructor-content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Instructor Dashboard</h1>
            <p class="text-gray-600 mt-1">Manage your courses and track your earnings</p>
        </div>
        <a href="{{ route('instructor.courses.create') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition font-medium inline-flex items-center">
            <i class="fas fa-plus mr-2"></i>Create Course
        </a>
    </div>
    
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <!-- Total Courses -->
        <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-blue-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Published Courses</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ auth()->user()->courses()->where('is_published', true)->count() }}</p>
                </div>
                <i class="fas fa-book text-4xl text-blue-600 opacity-20"></i>
            </div>
        </div>
        
        <!-- Total Students -->
        <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-green-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Students</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">254</p>
                </div>
                <i class="fas fa-users text-4xl text-green-600 opacity-20"></i>
            </div>
        </div>
        
        <!-- Total Revenue -->
        <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-purple-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Revenue</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">$12,450</p>
                </div>
                <i class="fas fa-dollar-sign text-4xl text-purple-600 opacity-20"></i>
            </div>
        </div>
        
        <!-- Rating -->
        <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-yellow-600">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Average Rating</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">4.8 ⭐</p>
                </div>
                <i class="fas fa-star text-4xl text-yellow-600 opacity-20"></i>
            </div>
        </div>
    </div>
    
    <!-- Your Courses -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Your Courses</h2>
            <a href="{{ route('instructor.courses.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">View All →</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse(auth()->user()->courses()->limit(6)->get() as $course)
                @include('components.cards.course-card', ['course' => $course, 'showActions' => true])
            @empty
                @include('components.common.empty-state', [
                    'icon' => 'fa-book',
                    'title' => 'No Courses Yet',
                    'message' => 'Start creating your first course to begin teaching students',
                    'actionUrl' => route('instructor.courses.create'),
                    'actionText' => 'Create Course'
                ])
            @endforelse
        </div>
    </div>
</div>
@endsection
