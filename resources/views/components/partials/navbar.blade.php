<nav class="fixed top-0 left-0 w-full z-50 flex items-center justify-between px-4 md:px-8 h-[72px] bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-100">
    <!-- Left Section: Logo & Navigation -->
    <div class="flex items-center gap-8">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-3 flex-shrink-0">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                <i class="fas fa-graduation-cap text-white text-lg"></i>
            </div>
            <span class="text-lg font-bold text-gray-900 hidden md:inline">EduLearn</span>
        </a>

        <!-- Navigation Links (Desktop) -->
        <div class="hidden md:flex items-center gap-6">
            <a href="{{ route('courses.browse') }}" class="text-gray-700 font-medium hover:text-blue-600 transition-colors duration-200 text-sm py-2">
                Categories
            </a>
            @auth
                @if(auth()->user()->hasRole('student'))
                    <a href="{{ route('student.my-learning.index') }}" class="text-gray-600 font-medium hover:text-blue-600 transition-colors duration-200 text-sm py-2">
                        My Learning
                    </a>
                @endif
            @endauth
        </div>
    </div>

    <!-- Right Section: Search, Auth, User Menu -->
    <div class="flex items-center gap-4">
        <!-- Search Bar (Desktop, Hidden for Instructors) -->
        @unless(auth()->user()?->hasRole('instructor'))
            <div class="hidden md:block flex-1 max-w-xs mx-4">
                <form method="GET" action="{{ route('courses.browse') }}" class="relative">
                    <input 
                        type="text" 
                        name="search" 
                        placeholder="Search courses..." 
                        class="w-full px-4 py-2 bg-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm text-gray-700"
                    >
                    <button type="submit" class="absolute right-3 top-2.5 text-gray-400 hover:text-gray-600">
                        <i class="fas fa-search text-sm"></i>
                    </button>
                </form>
            </div>
        @endunless

        <!-- Auth Actions -->
        @auth
            <!-- User Menu Dropdown -->
            <div class="relative group">
                <button class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-gray-100 transition-all active:scale-95">
                    <img 
                        src="{{ auth()->user()->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}" 
                        alt="{{ auth()->user()->name }}" 
                        class="w-8 h-8 rounded-full object-cover"
                    >
                    <span class="text-sm font-medium text-gray-800 hidden sm:inline max-w-[100px] truncate">{{ auth()->user()->name }}</span>
                    <i class="fas fa-chevron-down text-xs text-gray-600"></i>
                </button>
                
                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg border border-gray-200 hidden group-hover:block">
                    <div class="px-4 py-3 border-b border-gray-200">
                        <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500 mt-1">{{ auth()->user()->email }}</p>
                    </div>
                    
                    @if(auth()->user()->hasRole('student'))
                        <a href="{{ route('student.dashboard') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-home text-blue-600 w-4"></i>Dashboard
                        </a>
                        <a href="{{ route('student.my-learning.index') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-book text-green-600 w-4"></i>My Learning
                        </a>
                        <a href="{{ route('student.profile.show') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-user text-purple-600 w-4"></i>Profile
                        </a>
                    @elseif(auth()->user()->hasRole('instructor'))
                        <a href="{{ route('instructor.dashboard') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-chart-bar text-blue-600 w-4"></i>Dashboard
                        </a>
                        <a href="{{ route('instructor.courses.index') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-book text-green-600 w-4"></i>My Courses
                        </a>
                        <a href="{{ route('instructor.analytics.index') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-chart-line text-yellow-600 w-4"></i>Analytics
                        </a>
                        <a href="{{ route('instructor.earnings.index') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-dollar-sign text-green-600 w-4"></i>Earnings
                        </a>
                        <a href="{{ route('instructor.profile.show') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-user text-purple-600 w-4"></i>Profile
                        </a>
                    @endif
                    
                    <hr class="my-2">
                    
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition">
                            <i class="fas fa-sign-out-alt text-red-600 w-4"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <!-- Not Authenticated -->
            <button class="hidden md:block px-6 py-2 text-gray-600 font-medium hover:text-blue-600 transition-all active:scale-95 text-sm">
                <a href="{{ route('login') }}" class="flex items-center gap-2">
                    <i class="fas fa-sign-in-alt"></i>Login
                </a>
            </button>
            <button class="px-6 py-2 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-all active:scale-95 shadow-sm text-sm">
                <a href="{{ route('register') }}" class="flex items-center gap-2">
                    <i class="fas fa-user-plus"></i>Sign Up
                </a>
            </button>
        @endauth
    </div>
</nav>

<!-- Add padding-top to body to account for fixed navbar height (72px) -->
<style>
    body {
        padding-top: 72px;
    }
</style>
