@props([
    'type' => 'info', // info, success, warning, error
    'title' => null,
    'message' => null,
    'dismissible' => true,
])

@php
    $config = [
        'info' => [
            'bg' => 'bg-blue-50',
            'border' => 'border-blue-200',
            'text' => 'text-blue-800',
            'icon' => 'fa-info-circle',
            'button' => 'text-blue-800 hover:text-blue-600',
        ],
        'success' => [
            'bg' => 'bg-green-50',
            'border' => 'border-green-200',
            'text' => 'text-green-800',
            'icon' => 'fa-check-circle',
            'button' => 'text-green-800 hover:text-green-600',
        ],
        'warning' => [
            'bg' => 'bg-yellow-50',
            'border' => 'border-yellow-200',
            'text' => 'text-yellow-800',
            'icon' => 'fa-exclamation-circle',
            'button' => 'text-yellow-800 hover:text-yellow-600',
        ],
        'error' => [
            'bg' => 'bg-red-50',
            'border' => 'border-red-200',
            'text' => 'text-red-800',
            'icon' => 'fa-times-circle',
            'button' => 'text-red-800 hover:text-red-600',
        ],
    ];
    
    $style = $config[$type] ?? $config['info'];
@endphp

<div class="rounded-lg border {{ $style['bg'] }} {{ $style['border'] }} {{ $style['text'] }} px-4 py-4 mb-4" role="alert" x-data="{ show: true }" x-show="show">
    <div class="flex items-start">
        <i class="fas {{ $style['icon'] }} mt-1 mr-3 flex-shrink-0"></i>
        <div class="flex-1">
            @if($title)
                <h5 class="font-bold mb-1">{{ $title }}</h5>
            @endif
            <p>{{ $message ?? $slot }}</p>
        </div>
        @if($dismissible)
            <button 
                @click="show = false" 
                type="button"
                class="text-lg leading-none opacity-70 {{ $style['button'] }} transition ml-3 flex-shrink-0">
                <i class="fas fa-times"></i>
            </button>
        @endif
    </div>
</div>
