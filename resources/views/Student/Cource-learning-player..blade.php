<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>EduMarket | Advanced Data Science &amp; Machine Learning</title>
@include('components.theme.head')
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .video-overlay-gradient {
            background: linear-gradient(0deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0) 40%);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-background font-body-md text-on-background antialiased">
<!-- TopAppBar -->
<header class="fixed top-0 w-full z-50 h-[72px] bg-surface/80 dark:bg-surface/80 backdrop-blur-md border-b border-outline-variant dark:border-outline shadow-sm">
<div class="flex items-center justify-between px-margin-desktop max-w-container-max mx-auto w-full h-full">
<div class="flex items-center gap-stack-lg">
<span class="text-headline-md font-headline-md font-bold text-primary dark:text-primary-fixed-dim">EduMarket</span>
<nav class="hidden md:flex items-center gap-gutter">
<a class="font-body-md text-body-md text-on-surface-variant dark:text-on-surface-variant hover:text-primary transition-all duration-200" href="#">Courses</a>
<a class="font-body-md text-body-md text-on-surface-variant dark:text-on-surface-variant hover:text-primary transition-all duration-200" href="#">Instructors</a>
<a class="font-body-md text-body-md text-on-surface-variant dark:text-on-surface-variant hover:text-primary transition-all duration-200" href="#">Enterprise</a>
<a class="font-body-md text-body-md text-primary dark:text-primary-fixed-dim font-bold border-b-2 border-primary" href="#">My Learning</a>
</nav>
</div>
<div class="flex items-center gap-gutter">
<div class="flex items-center gap-stack-sm text-on-surface-variant">
<span class="material-symbols-outlined cursor-pointer hover:bg-surface-container-low p-2 rounded-full transition-all">shopping_cart</span>
<span class="material-symbols-outlined cursor-pointer hover:bg-surface-container-low p-2 rounded-full transition-all relative">
                        notifications
                        <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</span>
</div>
<div class="h-10 w-10 rounded-full overflow-hidden border border-outline-variant">
<img alt="User profile" class="h-full w-full object-cover" data-alt="A professional close-up headshot of a student in a minimalist office environment. The lighting is soft and natural, emphasizing a focused and intelligent expression. The overall aesthetic is clean, high-trust, and aligned with a corporate modernism educational platform using a light mode color palette with soft gray and blue accents." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAs1aH_Sux64QzMOSH8mM5k4qJu309ndbBS81Vc4YYrfrKmi0lmn2YqVrQ0R27WSoEXrJ5oZSE-x-xPaazhGZt9Nzs8EK5ngg7zmOj5_MyPuFqwfC0oapRFV8FQDdJzLMzgynnjANNB6rD0Wii7PlRstR4QjEs0OpSzp1RUGn8WO4skTSlQbZlj9LMPutRL8a_EnTO_EAULKGwfGo3X9Df-1xymLA2kPWTyfbqqofRPYCZvh_JR8mNK2CWCt39j5EOvTX-_m9s1BLnR"/>
</div>
</div>
</div>
</header>
<main class="mt-[72px] min-h-screen">
<div class="flex flex-col lg:flex-row h-[calc(100vh-72px)] overflow-hidden">
<!-- Left Side: Player & Content (75%) -->
<section class="flex-1 h-full overflow-y-auto custom-scrollbar bg-white">
<div class="max-w-[1000px] mx-auto p-margin-desktop">
<!-- Video Player Container -->
<div class="relative group aspect-video rounded-xl overflow-hidden bg-on-background shadow-lg mb-stack-md">
<img class="w-full h-full object-cover" data-alt="A clean, high-definition capture of a machine learning lecture displayed on a large screen within a modern educational setting. The image shows complex neural network diagrams and code snippets in an editorial, high-contrast style. Soft ambient blue lighting highlights the technological focus, maintaining a premium and focused atmosphere for high-level professional learning." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDft66jsoZr8GFY1R6jJQIddmh5ZEVvWS_iik6FabUtDVSgNlDhMcQSDW0HBcRSsjefEQ7WDTJnmjCbgeuPjl-D83mEMqyNZtXP_x8g2ag7MbmJk7aV5H5p4fIq-I_OCH6AK1ifcAF8BuofaY3yTa3ROGFsXJkn0KMWWUsnHdmxYKUbynH44gvzY_NBmI1dS3NZOu0DTSwKlmmfddVqmTGBKjHPdQa8Dy26qBjI9X28RKBLeBFyQd8IyWMKDkHbYd5y48LUIn7RqzGW"/>
<!-- Custom Controls Overlay -->
<div class="absolute inset-0 flex items-center justify-center bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
<button class="w-16 h-16 bg-primary text-white rounded-full flex items-center justify-center hover:scale-105 active:scale-95 transition-transform">
<span class="material-symbols-outlined text-[32px]" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
</button>
</div>
<!-- Bottom Bar Controls -->
<div class="absolute bottom-0 w-full p-4 video-overlay-gradient opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-between text-white">
<div class="flex items-center gap-4">
<span class="material-symbols-outlined cursor-pointer">play_arrow</span>
<span class="material-symbols-outlined cursor-pointer">volume_up</span>
<span class="text-label-sm font-label-sm">12:45 / 45:00</span>
</div>
<div class="flex items-center gap-4">
<span class="material-symbols-outlined cursor-pointer">settings</span>
<span class="material-symbols-outlined cursor-pointer">fullscreen</span>
</div>
</div>
<!-- Progress Bar -->
<div class="absolute bottom-0 left-0 h-1 bg-primary w-[28%] z-10"></div>
</div>
<!-- Player Controls & Meta -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-stack-md mb-stack-lg">
<div>
<h1 class="font-headline-lg text-headline-lg text-on-background mb-2">Module 4: Deep Learning Architectures</h1>
<p class="text-on-surface-variant font-body-md">Section 2: Convolutional Neural Networks for Image Processing</p>
</div>
<div class="flex items-center gap-gutter">
<button class="flex items-center gap-2 px-6 py-3 border border-outline-variant rounded-lg font-label-md text-on-surface hover:bg-surface-container-low transition-all">
<span class="material-symbols-outlined">chevron_left</span>
                                Previous
                            </button>
<button class="flex items-center gap-2 px-6 py-3 bg-primary text-white rounded-lg font-label-md hover:bg-primary-container shadow-sm active:scale-95 transition-all">
                                Next Lesson
                                <span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
<!-- Tab System -->
<div class="border-b border-outline-variant flex gap-gutter mb-stack-md overflow-x-auto">
<button class="tab-btn px-4 py-3 text-primary border-b-2 border-primary font-label-md whitespace-nowrap" data-tab="overview">Overview</button>
<button class="tab-btn px-4 py-3 text-on-surface-variant font-label-md hover:text-on-surface transition-colors whitespace-nowrap" data-tab="qa">Q&A</button>
<button class="tab-btn px-4 py-3 text-on-surface-variant font-label-md hover:text-on-surface transition-colors whitespace-nowrap" data-tab="resources">Resources</button>
</div>

<!-- Tab Content -->
<div id="tab-content" class="space-y-stack-md">
    <!-- Overview Tab -->
    <div id="overview-tab" class="tab-pane active">
        <div class="prose prose-sm max-w-none">
            <h3 class="font-headline-md text-headline-md text-on-background mb-3">About this lesson</h3>
            <p class="text-body-md text-on-surface mb-4">
                In this module, we explore deep learning architectures and their applications in modern AI systems.
                You'll learn about CNNs, their building blocks, and how they process visual information.
            </p>
            <h3 class="font-headline-md text-headline-md text-on-background mb-3 mt-6">Learning Objectives</h3>
            <ul class="list-disc list-inside space-y-2 text-body-md text-on-surface">
                <li>Understand the fundamental concepts of convolutional neural networks</li>
                <li>Learn how pooling and striding work in practice</li>
                <li>Implement custom CNN architectures</li>
                <li>Optimize models for real-world applications</li>
            </ul>
        </div>
    </div>

    <!-- Q&A Tab (Comments) -->
    <div id="qa-tab" class="tab-pane" style="display: none;">
        @include('components.lesson-comments')
    </div>

    <!-- Resources Tab -->
    <div id="resources-tab" class="tab-pane" style="display: none;">
        @include('components.lesson-resources')
    </div>
</div>
</div>
</section>
<!-- Right Side: Curriculum Sidebar (25%) -->
<aside class="w-full lg:w-[380px] h-full bg-surface-container-lowest border-l border-outline-variant flex flex-col">
<!-- Progress Header -->
<div class="p-6 border-b border-outline-variant">
<div class="flex items-center justify-between mb-4">
<span class="font-label-md text-on-surface">Course Progress</span>
<span class="font-label-md text-primary">64% Completed</span>
</div>
<div class="h-2 w-full bg-secondary-container rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full transition-all duration-500" style="width: 64%"></div>
</div>
</div>
<!-- Curriculum List -->
<div class="flex-1 overflow-y-auto custom-scrollbar">
<!-- Section 1 -->
<div class="border-b border-outline-variant">
<div class="flex items-center justify-between p-4 bg-surface-container-low cursor-pointer">
<h3 class="font-label-md text-on-surface">Section 1: Foundations</h3>
<span class="material-symbols-outlined text-on-surface-variant">expand_less</span>
</div>
<div class="divide-y divide-outline-variant/30">
<div class="p-4 flex items-center gap-3 hover:bg-surface transition-colors cursor-pointer group">
<span class="material-symbols-outlined text-primary text-[20px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<div class="flex-1">
<p class="text-body-md text-on-surface">1.1 Course Introduction</p>
<span class="text-label-sm text-on-surface-variant">04:20</span>
</div>
</div>
<div class="p-4 flex items-center gap-3 hover:bg-surface transition-colors cursor-pointer group">
<span class="material-symbols-outlined text-primary text-[20px]" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<div class="flex-1">
<p class="text-body-md text-on-surface">1.2 History of AI</p>
<span class="text-label-sm text-on-surface-variant">15:10</span>
</div>
</div>
</div>
</div>
<!-- Section 2 - Current -->
<div class="border-b border-outline-variant">
<div class="flex items-center justify-between p-4 bg-surface-container-low cursor-pointer">
<h3 class="font-label-md text-on-surface">Section 2: CNN Architectures</h3>
<span class="material-symbols-outlined text-on-surface-variant">expand_less</span>
</div>
<div class="divide-y divide-outline-variant/30">
<div class="p-4 flex items-center gap-3 bg-primary/5 border-l-4 border-primary cursor-default">
<span class="material-symbols-outlined text-primary text-[20px]" style="font-variation-settings: 'FILL' 1;">play_circle</span>
<div class="flex-1">
<p class="text-body-md text-primary font-bold">2.1 Basic CNN Structure</p>
<span class="text-label-sm text-primary/70">Playing • 12:45 / 45:00</span>
</div>
</div>
<div class="p-4 flex items-center gap-3 hover:bg-surface transition-colors cursor-pointer group">
<span class="material-symbols-outlined text-on-surface-variant text-[20px]">circle</span>
<div class="flex-1">
<p class="text-body-md text-on-surface">2.2 Advanced Convolutional Ops</p>
<span class="text-label-sm text-on-surface-variant">28:30</span>
</div>
</div>
</div>
</div>
<!-- Locked Section -->
<div class="border-b border-outline-variant">
<div class="flex items-center justify-between p-4 bg-surface-container-low/50 cursor-pointer opacity-60">
<h3 class="font-label-md text-on-surface">Section 3: RNN &amp; LSTM</h3>
<span class="material-symbols-outlined text-on-surface-variant">lock</span>
</div>
</div>
<div class="border-b border-outline-variant">
<div class="flex items-center justify-between p-4 bg-surface-container-low/50 cursor-pointer opacity-60">
<h3 class="font-label-md text-on-surface">Section 4: Deployment Strategies</h3>
<span class="material-symbols-outlined text-on-surface-variant">lock</span>
</div>
</div>
</div>
<!-- Finish Course Button -->
<div class="p-6">
<button class="w-full bg-surface-container-high text-on-surface font-label-md py-4 rounded-xl hover:bg-surface-dim transition-all active:scale-[0.98]">
                        Complete Current Lesson
                    </button>
</div>
</aside>
</div>
</main>
<!-- Footer Hidden for Focus Learning Environment, but available as component logic suggests suppression for task-focused pages. Explicitly suppressing to prioritize the Canvas. -->
<script>
        // Micro-interactions
        document.querySelectorAll('.material-symbols-outlined').forEach(icon => {
            icon.addEventListener('mouseenter', () => {
                icon.style.transition = 'transform 0.2s cubic-bezier(0.34, 1.56, 0.64, 1)';
            });
        });

        // Tab switching logic
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabPanes = document.querySelectorAll('.tab-pane');

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const tabName = this.dataset.tab;

                // Update button styles
                tabButtons.forEach(btn => {
                    btn.classList.remove('text-primary', 'border-b-2', 'border-primary');
                    btn.classList.add('text-on-surface-variant');
                });
                this.classList.add('text-primary', 'border-b-2', 'border-primary');
                this.classList.remove('text-on-surface-variant');

                // Update tab content
                tabPanes.forEach(pane => {
                    pane.style.display = 'none';
                });
                document.getElementById(tabName + '-tab').style.display = 'block';
            });
        });
    </script>
</body></html>