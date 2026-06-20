@extends('layouts.student')

@section('title', 'Purchase Complete')

@section('student-content')
<div class="max-w-lg mx-auto text-center py-12">
    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-check text-green-600 text-3xl"></i>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-2">Payment Successful!</h1>
        <p class="text-gray-600 mb-8">
            {{ session('success', 'Your courses are ready. Start learning now!') }}
        </p>

        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('student.my-learning.index') }}"
               class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                <i class="fas fa-graduation-cap mr-2"></i>Go to My Learning
            </a>
            <a href="{{ route('courses.browse') }}"
               class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                Browse More Courses
            </a>
        </div>
    </div>
</div>
@endsection
