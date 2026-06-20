<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'LMS Dashboard') - EduLearn</title>
    
    <!-- Tailwind CSS (CDN - Loaded Only Once in Master Layout) -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    @stack('head')
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Styles -->
    @stack('styles')
</head>

<body class="bg-gray-50 text-gray-900">
    <!-- Navigation Bar -->
    @include('components.partials.navbar');
    
    <!-- Main Container -->
    <div class="flex min-h-[calc(100vh-64px)]">
        <!-- Sidebar (if user is authenticated) -->
        @auth
            @if(auth()->user()->hasRole('student') ?? false)
                @include('components.partials.sidebar-student')
            @elseif(auth()->user()->hasRole('instructor') ?? false)
                @include('components.partials.sidebar-instructor')
            @endif
        @endauth
        
        <!-- Main Content Area -->
        <main class="flex-1 overflow-auto">
            <!-- Flash Messages -->
            @if($errors->any())
                @include('components.common.alert', [
                    'type' => 'error',
                    'title' => 'Validation Error',
                    'message' => 'Please check the errors below'
                ])
            @endif
            
            @if(session('success'))
                @include('components.common.alert', [
                    'type' => 'success',
                    'message' => session('success')
                ])
            @endif
            
            @if(session('warning'))
                @include('components.common.alert', [
                    'type' => 'warning',
                    'message' => session('warning')
                ])
            @endif
            
            @if(session('error'))
                @include('components.common.alert', [
                    'type' => 'error',
                    'message' => session('error')
                ])
            @endif
            
            <!-- Page Content -->
            @yield('content')
        </main>
    </div>
    
    <!-- Footer -->
    @include('components.partials.footer')
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @stack('scripts')
</body>
</html>
