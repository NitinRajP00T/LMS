@props([
    'course',
    'showActions' => false,
])

<div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition transform hover:-translate-y-1 duration-300">
    <!-- Course Image -->
    <div class="relative h-48 bg-gray-200 overflow-hidden group">
        @if($course->image)
            <img src="{{ Storage::url($course->image) }}" 
                 alt="{{ $course->title }}" 
                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        @else
            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-400 to-blue-600">
                <i class="fas fa-book text-white text-4xl"></i>
            </div>
        @endif
        
        <!-- Rating Badge -->
        @if($course->average_rating)
            <div class="absolute top-3 right-3 bg-yellow-400 text-white px-3 py-1 rounded-full text-sm font-bold shadow-md">
                <i class="fas fa-star"></i> {{ number_format($course->average_rating, 1) }}
            </div>
        @endif
        
        <!-- Overlay on Hover -->
        @if($showActions)
            <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center space-x-3">
                <a href="{{ route('instructor.courses.edit', $course) }}" 
                   class="bg-blue-600 text-white p-3 rounded-full hover:bg-blue-700 transition" title="Edit">
                    <i class="fas fa-edit"></i>
                </a>
                <a href="{{ route('instructor.courses.show', $course) }}" 
                   class="bg-green-600 text-white p-3 rounded-full hover:bg-green-700 transition" title="View">
                    <i class="fas fa-eye"></i>
                </a>
            </div>
        @endif
    </div>
    
    <!-- Course Info -->
    <div class="p-4">
        <!-- Instructor Info -->
        <div class="flex items-center space-x-2 mb-3">
            <img src="{{ $course->instructor->avatar_url ?? 'https://ui-avatars.com/api/?name=' . urlencode($course->instructor->name) }}" 
                 alt="{{ $course->instructor->name }}" 
                 class="w-6 h-6 rounded-full object-cover">
            <span class="text-xs text-gray-600 truncate">{{ $course->instructor->name }}</span>
        </div>
        
        <!-- Title -->
        <h3 class="font-bold text-gray-800 mb-2 line-clamp-2 min-h-14">
            <a href="{{ route('courses.detail', $course) }}" class="hover:text-blue-600 transition">
                {{ $course->title }}
            </a>
        </h3>
        
        <!-- Category -->
        @if($course->category)
            <p class="text-xs text-gray-500 mb-3">{{ $course->category->name }}</p>
        @endif
        
        <!-- Stats -->
        <div class="flex items-center justify-between text-xs text-gray-600 mb-4 pb-4 border-b border-gray-200">
            <span title="Total Students"><i class="fas fa-users mr-1"></i>{{ $course->students_count ?? 0 }}</span>
            <span title="Course Duration"><i class="fas fa-clock mr-1"></i>{{ $course->total_hours ?? 0 }}h</span>
            @if($course->total_lessons ?? false)
                <span title="Total Lessons"><i class="fas fa-book-open mr-1"></i>{{ $course->total_lessons }}</span>
            @endif
        </div>
        
        <!-- Price & Action -->
        <div class="flex items-center justify-between">
            <div class="space-y-1">
                <p class="text-lg font-bold text-gray-800">₹{{ number_format($course->price, 2) }}</p>
                @if($course->discount_percent > 0)
                    <p class="text-xs text-red-600 font-semibold">{{ $course->discount_percent }}% OFF</p>
                @endif
            </div>
            
            @if($showActions)
                <div class="space-x-2">
                    <a href="{{ route('instructor.courses.edit', $course) }}" 
                       class="text-blue-600 hover:text-blue-800 transition" title="Edit Course">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('instructor.courses.show', $course) }}" 
                       class="text-green-600 hover:text-green-800 transition" title="View Course">
                        <i class="fas fa-eye"></i>
                    </a>
                </div>
            @else
                <a href="{{ route('courses.detail', $course) }}" 
                   class="text-blue-600 hover:text-blue-800 font-medium text-sm transition">
                    View <i class="fas fa-arrow-right ml-1"></i>
                </a>
            @endif
        </div>
    </div>
</div>
