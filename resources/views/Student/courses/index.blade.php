@extends('layouts.app')

@section('title', 'Browse Courses')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="space-y-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Browse Courses</h1>
            <p class="text-gray-600 mt-1">Find your next learning adventure</p>
        </div>

        <form method="GET" action="{{ route('courses.browse') }}" class="bg-white rounded-lg shadow-md p-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="md:col-span-2">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text"
                           id="search"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search courses..."
                           class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label for="category" class="sr-only">Category</label>
                    <select id="category"
                            name="category"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="price_range" class="sr-only">Price</label>
                    <select id="price_range"
                            name="price_range"
                            class="w-full rounded-lg border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">All Prices</option>
                        <option value="free" @selected(request('price_range') === 'free')>Free</option>
                        <option value="paid" @selected(request('price_range') === 'paid')>Paid</option>
                    </select>
                </div>
            </div>

            <div class="flex gap-3 mt-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-medium">
                    <i class="fas fa-search mr-2"></i>Search
                </button>
                @if(request()->hasAny(['search', 'category', 'price_range']))
                    <a href="{{ route('courses.browse') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-medium">
                        Clear Filters
                    </a>
                @endif
            </div>
        </form>

        @if($courses->count())
            <p class="text-sm text-gray-600">{{ $courses->total() }} course{{ $courses->total() === 1 ? '' : 's' }} found</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($courses as $course)
                    @include('components.cards.course-card', ['course' => $course])
                @endforeach
            </div>

            @if($courses->hasPages())
                <div class="mt-6">
                    {{ $courses->withQueryString()->links() }}
                </div>
            @endif
        @else
            @include('components.common.empty-state', [
                'icon' => 'fa-search',
                'title' => 'No Courses Found',
                'message' => 'Try adjusting your search or filters to find more courses.',
                'actionUrl' => route('courses.browse'),
                'actionText' => 'View All Courses',
            ])
        @endif
    </div>
</div>

@include('components.student.ai-assistant-fab')
@endsection
