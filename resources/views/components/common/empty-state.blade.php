@props([
    'icon' => 'fa-box',
    'title' => 'Nothing here',
    'message' => 'There are no items to display.',
    'action' => null,
    'actionText' => 'Go Back',
    'actionUrl' => null,
])

<div class="flex flex-col items-center justify-center py-12 px-4">
    <div class="text-center">
        <div class="mb-4 text-6xl text-gray-300">
            <i class="fas {{ $icon }}"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $title }}</h3>
        <p class="text-gray-600 mb-6 max-w-md">{{ $message }}</p>
        
        @if($actionUrl)
            <a href="{{ $actionUrl }}" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                <i class="fas fa-arrow-left mr-2"></i>{{ $actionText }}
            </a>
        @endif
    </div>
</div>
