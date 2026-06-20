<aside class="w-64 bg-white border-r border-gray-200 h-[calc(100vh-64px)] sticky top-16 overflow-y-auto">
    <div class="p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-6">Menu</h3>
        
        <nav class="space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('student.dashboard') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition font-medium {{ request()->routeIs('student.dashboard') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-home mr-3 w-5"></i>Dashboard
            </a>
            
            <!-- Explore Courses -->
            <a href="{{ route('courses.browse') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition font-medium {{ request()->routeIs('courses.browse') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-book mr-3 w-5"></i>Explore Courses
            </a>
            
            <!-- My Learning -->
            <a href="{{ route('student.my-learning.index') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition font-medium {{ request()->routeIs('student.my-learning.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-graduation-cap mr-3 w-5"></i>My Learning
            </a>
            
            <!-- Wishlist -->
            <a href="{{ route('student.wishlist.index') }}"
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition font-medium {{ request()->routeIs('student.wishlist.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-heart mr-3 w-5"></i>Wishlist
            </a>
            
            <!-- Cart -->
            <a href="{{ route('student.checkout.index') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition font-medium {{ request()->routeIs('student.checkout.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-shopping-cart mr-3 w-5"></i>
                Cart
                @if(session('cart_count', 0) > 0)
                    <span class="float-right bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ session('cart_count') }}</span>
                @endif
            </a>
            
            <hr class="my-4">
            
            <!-- Account Section -->
            <p class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase tracking-wider">Account</p>
            
            <!-- Profile -->
            <a href="{{ route('student.profile.show') }}" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition font-medium {{ request()->routeIs('student.profile.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-user mr-3 w-5"></i>Profile
            </a>
            
            <!-- Downloads -->
            <a href="#" 
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition font-medium">
                <i class="fas fa-download mr-3 w-5"></i>Downloads
            </a>
            
            <!-- Settings -->
            <a href="{{ route('student.settings.index') }}"
               class="block px-4 py-3 rounded-lg text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition font-medium {{ request()->routeIs('student.settings.*') ? 'bg-blue-50 text-blue-600' : '' }}">
                <i class="fas fa-cog mr-3 w-5"></i>Settings
            </a>
        </nav>
    </div>
</aside>
