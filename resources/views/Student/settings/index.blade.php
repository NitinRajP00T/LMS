@extends('layouts.student')

@section('title', 'Account Settings')

@section('student-content')
@php $user = auth()->user(); @endphp

<div class="space-y-6 max-w-4xl">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">Settings</h1>
        <p class="text-gray-600 mt-1">Manage your account preferences, notifications, and security settings.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center shadow-sm">
            <i class="fas fa-check-circle text-green-500 mr-2 text-lg"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Settings Navigation Tabs -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-1 sticky top-24">
                <button x-on:click="activeTab = 'profile'" 
                        :class="activeTab === 'profile' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-left text-sm transition-all">
                    <i class="fas fa-user-cog text-base"></i>
                    Profile Settings
                </button>
                <button x-on:click="activeTab = 'notifications'" 
                        :class="activeTab === 'notifications' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-left text-sm transition-all">
                    <i class="fas fa-bell text-base"></i>
                    Notifications
                </button>
                <button x-on:click="activeTab = 'security'" 
                        :class="activeTab === 'security' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-left text-sm transition-all">
                    <i class="fas fa-shield-alt text-base"></i>
                    Security & Password
                </button>
                <button x-on:click="activeTab = 'preferences'" 
                        :class="activeTab === 'preferences' ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-800'"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-left text-sm transition-all">
                    <i class="fas fa-sliders-h text-base"></i>
                    Preferences
                </button>
            </div>
        </div>

        <!-- Settings Content Area -->
        <div class="md:col-span-2" x-data="{ activeTab: 'profile' }">
            
            <!-- Tab: Profile Settings -->
            <div x-show="activeTab === 'profile'" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-6">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Profile Information</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Update your basic account details and avatar.</p>
                </div>

                <div class="flex flex-col sm:flex-row items-center gap-5 pb-6 border-b border-gray-100">
                    <div class="relative group">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&size=128&background=2563eb&color=fff"
                             alt="{{ $user->name }}"
                             class="w-24 h-24 rounded-full object-cover ring-4 ring-blue-50">
                        <label class="absolute inset-0 flex items-center justify-center bg-black/40 text-white text-xs font-semibold rounded-full opacity-0 group-hover:opacity-100 cursor-pointer transition-opacity">
                            <i class="fas fa-camera mr-1"></i> Change
                            <input type="file" class="hidden" accept="image/*">
                        </label>
                    </div>
                    <div class="text-center sm:text-left">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h3>
                        <p class="text-sm text-gray-500">Student Account</p>
                        <p class="text-xs text-gray-400 mt-1">Member since {{ $user->created_at->format('M Y') }}</p>
                    </div>
                </div>

                <form class="space-y-4">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                            <input type="text" value="{{ $user->name }}" class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                            <input type="email" value="{{ $user->email }}" class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Biography / Headline</label>
                        <textarea placeholder="Tell us about yourself, your learning goals or your expertise..." rows="3" class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"></textarea>
                    </div>

                    <div class="pt-4 flex justify-end">
                        <button type="button" x-on:click="$dispatch('show-toast', { message: 'Profile settings saved (demo)' })" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-lg transition shadow-sm">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tab: Notifications -->
            <div x-show="activeTab === 'notifications'" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-6" style="display: none;">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Notification Preferences</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Control which emails and alerts you receive from EduLearn.</p>
                </div>

                <div class="space-y-4">
                    <div class="flex items-start justify-between p-4 rounded-xl hover:bg-gray-50 transition">
                        <div class="flex-1 pr-4">
                            <h4 class="font-semibold text-gray-800 text-sm">Course Recommendations</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Receive personalized email suggestions based on your interests and search history.</p>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" checked class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="flex items-start justify-between p-4 rounded-xl hover:bg-gray-50 transition">
                        <div class="flex-1 pr-4">
                            <h4 class="font-semibold text-gray-800 text-sm">Announcements & Updates</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Get updates from instructors of courses you are enrolled in regarding new content or assignments.</p>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" checked class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="flex items-start justify-between p-4 rounded-xl hover:bg-gray-50 transition">
                        <div class="flex-1 pr-4">
                            <h4 class="font-semibold text-gray-800 text-sm">Forum Activity & Replies</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Receive notifications when someone replies to your discussion posts or asks a question in a mutual course.</p>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" checked class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="flex items-start justify-between p-4 rounded-xl hover:bg-gray-50 transition">
                        <div class="flex-1 pr-4">
                            <h4 class="font-semibold text-gray-800 text-sm">Weekly Newsletter</h4>
                            <p class="text-xs text-gray-500 mt-0.5">Get curated weekly digests of trending courses, industry insights, and special student promotions.</p>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="button" x-on:click="$dispatch('show-toast', { message: 'Notification preferences saved' })" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-lg transition shadow-sm">
                        Save Preferences
                    </button>
                </div>
            </div>

            <!-- Tab: Security -->
            <div x-show="activeTab === 'security'" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-6" style="display: none;">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Security Settings</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Update your password and enhance your account security.</p>
                </div>

                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Current Password</label>
                        <input type="password" class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">New Password</label>
                            <input type="password" class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Confirm New Password</label>
                            <input type="password" class="w-full rounded-lg border border-gray-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        </div>
                    </div>

                    <div class="pt-4 flex justify-between items-center">
                        <span class="text-xs text-gray-400">Password must be at least 8 characters long.</span>
                        <button type="button" x-on:click="$dispatch('show-toast', { message: 'Password updated successfully (demo)' })" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-lg transition shadow-sm">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>

            <!-- Tab: Preferences -->
            <div x-show="activeTab === 'preferences'" class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-6" style="display: none;">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">Learning Preferences</h2>
                    <p class="text-sm text-gray-500 mt-0.5">Customize your general learning and platform settings.</p>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Video Auto-play</label>
                        <div class="flex gap-4">
                            <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                                <input type="radio" name="autoplay" checked class="text-blue-600 focus:ring-blue-500 h-4 w-4">
                                Auto-play next lesson video
                            </label>
                            <label class="flex items-center gap-2 text-sm text-gray-700 cursor-pointer">
                                <input type="radio" name="autoplay" class="text-blue-600 focus:ring-blue-500 h-4 w-4">
                                Manual play
                            </label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Interface Theme</label>
                        <div class="grid grid-cols-3 gap-3">
                            <button type="button" class="flex flex-col items-center gap-2 p-3 rounded-lg border border-blue-500 bg-blue-50/50 text-blue-600 transition">
                                <i class="fas fa-sun text-lg"></i>
                                <span class="text-xs font-semibold">Light</span>
                            </button>
                            <button type="button" class="flex flex-col items-center gap-2 p-3 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition">
                                <i class="fas fa-moon text-lg"></i>
                                <span class="text-xs font-semibold">Dark</span>
                            </button>
                            <button type="button" class="flex flex-col items-center gap-2 p-3 rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition">
                                <i class="fas fa-desktop text-lg"></i>
                                <span class="text-xs font-semibold">System</span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="pt-4 flex justify-end">
                    <button type="button" x-on:click="$dispatch('show-toast', { message: 'Learning preferences saved' })" class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-lg transition shadow-sm">
                        Save Preferences
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Toast notification helper using Alpine.js -->
<div x-data="{ open: false, message: '' }"
     x-on:show-toast.window="open = true; message = $event.detail.message; setTimeout(() => open = false, 3000)"
     x-show="open"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-2"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-2"
     class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 bg-slate-900 text-white px-4 py-2.5 rounded-xl shadow-lg flex items-center gap-2 text-sm font-semibold"
     style="display: none;">
    <i class="fas fa-check-circle text-green-400"></i>
    <span x-text="message"></span>
</div>
@endsection
