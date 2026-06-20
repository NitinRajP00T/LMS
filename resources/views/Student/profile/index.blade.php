@extends('layouts.student')

@section('title', 'My Profile')

@section('student-content')
@php $user = auth()->user(); @endphp

<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">My Profile</h1>
            <p class="text-gray-600 mt-1">View your account information</p>
        </div>
        <a href="{{ route('student.profile.edit') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition font-medium inline-flex items-center">
            <i class="fas fa-edit mr-2"></i>Edit Profile
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=128&background=2563eb&color=fff"
                 alt="{{ $user->name }}"
                 class="w-32 h-32 rounded-full object-cover border-4 border-blue-100">

            <div class="flex-grow text-center md:text-left">
                <h2 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h2>
                <p class="text-gray-600 mt-1">{{ $user->email }}</p>
                <span class="inline-block mt-3 px-3 py-1 bg-blue-50 text-blue-600 text-sm font-semibold rounded-full capitalize">
                    {{ $user->role }}
                </span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-blue-600">
            <p class="text-gray-600 text-sm font-medium">Enrolled Courses</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $user->enrollments()->count() }}</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-green-600">
            <p class="text-gray-600 text-sm font-medium">Completed</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $user->enrollments()->whereNotNull('completed_at')->count() }}</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow-md border-l-4 border-yellow-500">
            <p class="text-gray-600 text-sm font-medium">In Progress</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $user->enrollments()->whereNull('completed_at')->count() }}</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Account Details</h3>
        <dl class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <dt class="text-sm text-gray-500">Full Name</dt>
                <dd class="text-gray-800 font-medium mt-1">{{ $user->name }}</dd>
            </div>
            <div>
                <dt class="text-sm text-gray-500">Email Address</dt>
                <dd class="text-gray-800 font-medium mt-1">{{ $user->email }}</dd>
            </div>
            <div>
                <dt class="text-sm text-gray-500">Member Since</dt>
                <dd class="text-gray-800 font-medium mt-1">{{ $user->created_at->format('F j, Y') }}</dd>
            </div>
            <div>
                <dt class="text-sm text-gray-500">Email Verified</dt>
                <dd class="text-gray-800 font-medium mt-1">
                    @if($user->email_verified_at)
                        <span class="text-green-600"><i class="fas fa-check-circle mr-1"></i>Verified</span>
                    @else
                        <span class="text-yellow-600"><i class="fas fa-clock mr-1"></i>Not verified</span>
                    @endif
                </dd>
            </div>
        </dl>
    </div>
</div>
@endsection
