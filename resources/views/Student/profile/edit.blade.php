@extends('layouts.student')

@section('title', 'Edit Profile')

@section('student-content')
@php $user = auth()->user(); @endphp

<div class="space-y-6">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Edit Profile</h1>
            <p class="text-gray-600 mt-1">Update your account information</p>
        </div>
        <a href="{{ route('student.profile.show') }}" class="text-gray-600 hover:text-gray-800 font-medium inline-flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Back to Profile
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl">
        <form class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name', $user->name) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email"
                       id="email"
                       name="email"
                       value="{{ old('email', $user->email) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                       required>
            </div>

            <div class="pt-4 border-t border-gray-200">
                <p class="text-sm text-gray-500 mb-4">Leave blank to keep your current password.</p>

                <div class="space-y-4">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <input type="password"
                               id="password"
                               name="password"
                               class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                        <input type="password"
                               id="password_confirmation"
                               name="password_confirmation"
                               class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
            </div>

            <div class="flex gap-3 pt-2">
                <button type="button" disabled class="bg-blue-600 text-white px-6 py-2 rounded-lg opacity-50 cursor-not-allowed font-medium">
                    Save Changes
                </button>
                <a href="{{ route('student.profile.show') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
