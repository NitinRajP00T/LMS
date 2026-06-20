@extends('layouts.student')

@section('title', 'My Wishlist')

@section('student-content')
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-gray-800">My Wishlist</h1>
        <p class="text-gray-600 mt-1">Courses you've saved for later</p>
    </div>

    @if($courses->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($courses as $course)
                <div class="relative">
                    @include('components.cards.course-card', ['course' => $course])

                    <div class="absolute top-3 left-3 flex gap-2">
                        <form method="POST" action="{{ route('student.wishlist.remove', $course) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-white text-red-500 p-2 rounded-full shadow-md hover:bg-red-50 transition"
                                    title="Remove from wishlist">
                                <i class="fas fa-heart"></i>
                            </button>
                        </form>
                    </div>

                    <form method="POST" action="{{ route('student.checkout.add', $course) }}" class="mt-2">
                        @csrf
                        <button type="submit" class="w-full text-sm bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition font-medium">
                            <i class="fas fa-shopping-cart mr-1"></i>Add to Cart
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        @if($courses->hasPages())
            <div class="mt-6">{{ $courses->links() }}</div>
        @endif
    @else
        @include('components.common.empty-state', [
            'icon' => 'fa-heart',
            'title' => 'Your Wishlist is Empty',
            'message' => 'Save courses you are interested in and find them here later.',
            'actionUrl' => route('courses.browse'),
            'actionText' => 'Explore Courses',
        ])
    @endif
</div>
@endsection
