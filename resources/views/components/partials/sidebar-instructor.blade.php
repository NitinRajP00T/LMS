<aside class="w-64 bg-white border-r border-gray-200 h-[calc(100vh-64px)] sticky top-16 overflow-y-auto">
    <div class="p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6">Instructor Panel</h3>
        
        <nav class="space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('instructor.dashboard') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium {{ request()->routeIs('instructor.dashboard') ? 'bg-green-50 text-green-600' : '' }}">
                <i class="fas fa-chart-line mr-3 w-5"></i>Dashboard
            </a>
            
            <!-- Courses -->
            <div x-data="{ courseOpen: {{ request()->routeIs('instructor.courses.*') ? 'true' : 'false' }} }">
                <button 
                    @click="courseOpen = !courseOpen"
                    class="w-full text-left px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium {{ request()->routeIs('instructor.courses.*') ? 'bg-green-50 text-green-600' : '' }}">
                    <i class="fas fa-book mr-3 w-5"></i>
                    Courses
                    <i class="fas fa-chevron-right float-right transition" :class="courseOpen ? 'rotate-90' : ''"></i>
                </button>
                
                <div x-show="courseOpen" class="mt-2 ml-4 space-y-1">
                    <a href="{{ route('instructor.courses.index') }}" 
                       class="block px-4 py-2 rounded-lg text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition">
                        <i class="fas fa-list mr-2"></i>All Courses
                    </a>
                    <a href="{{ route('instructor.courses.create') }}" 
                       class="block px-4 py-2 rounded-lg text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition">
                        <i class="fas fa-plus mr-2"></i>Create Course
                    </a>
                </div>
            </div>
            
            <!-- Analytics -->
            <a href="{{ route('instructor.analytics.index') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium {{ request()->routeIs('instructor.analytics.*') ? 'bg-green-50 text-green-600' : '' }}">
                <i class="fas fa-chart-bar mr-3 w-5"></i>Analytics
            </a>
            
            <!-- Earnings -->
            <a href="{{ route('instructor.earnings.index') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium {{ request()->routeIs('instructor.earnings.*') ? 'bg-green-50 text-green-600' : '' }}">
                <i class="fas fa-dollar-sign mr-3 w-5"></i>Earnings
            </a>
            
            <!-- Students -->
            <a href="#" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">
                <i class="fas fa-users mr-3 w-5"></i>Students
            </a>
            
            <!-- Coupons -->
            <a href="#" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">
                <i class="fas fa-ticket-alt mr-3 w-5"></i>Coupons
            </a>
            
            <hr class="my-4">
            
            <!-- Account Section -->
            <p class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Account</p>
            
            <!-- Profile -->
            <a href="{{ route('instructor.profile.show') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium {{ request()->routeIs('instructor.profile.*') ? 'bg-green-50 text-green-600' : '' }}">
                <i class="fas fa-user mr-3 w-5"></i>Profile
            </a>
            
            <!-- Settings -->
            <a href="#" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-green-50 hover:text-green-600 transition font-medium">
                <i class="fas fa-cog mr-3 w-5"></i>Settings
            </a>
        </nav>
    </div>
</aside>
