<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>User Profile &amp; Learning Path | EduMarket</title>
@include('components.theme.head')
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }
        .soft-lift { box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05); }
        .soft-lift:hover { 
            box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1);
            transform: translateY(-2px);
        }
        .glass-header { backdrop-filter: blur(12px); }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-primary-container selection:text-on-primary-container">
<!-- Top Navigation Bar -->
<nav class="fixed top-0 w-full z-50 h-[72px] bg-surface/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex items-center justify-between px-margin-desktop max-w-container-max mx-auto left-0 right-0">
<div class="flex items-center gap-gutter">
<span class="text-headline-md font-headline-md font-bold text-primary">EduMarket</span>
<div class="hidden md:flex items-center gap-8">
<a class="text-on-surface-variant hover:text-primary transition-all duration-200 font-body-md" href="#">Courses</a>
<a class="text-on-surface-variant hover:text-primary transition-all duration-200 font-body-md" href="#">Instructors</a>
<a class="text-on-surface-variant hover:text-primary transition-all duration-200 font-body-md" href="#">Enterprise</a>
<a class="text-primary font-bold border-b-2 border-primary font-body-md" href="#">My Learning</a>
</div>
</div>
<div class="flex items-center gap-6">
<div class="hidden lg:flex items-center bg-surface-container-low border border-outline-variant rounded-full px-4 py-1.5 gap-2">
<span class="material-symbols-outlined text-outline">search</span>
<input class="bg-transparent border-none focus:ring-0 text-body-md w-48" placeholder="Search courses..." type="text"/>
</div>
<div class="flex items-center gap-4">
<button class="material-symbols-outlined text-on-surface-variant hover:bg-surface-container-low p-2 rounded-full transition-all">shopping_cart</button>
<button class="material-symbols-outlined text-on-surface-variant hover:bg-surface-container-low p-2 rounded-full transition-all relative">
                    notifications
                    <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
<div class="w-10 h-10 rounded-full border-2 border-primary overflow-hidden">
<img alt="User profile" class="w-full h-full object-cover" data-alt="A professional close-up portrait of a mid-30s man with a friendly expression, set against a clean, minimalist studio background with soft cinematic lighting. The color palette is composed of muted blues and bright whites to match a modern light-mode educational platform aesthetic. The image is crisp, high-resolution, and communicates confidence and approachability." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB-mb3rbsQ-YUa2st5CHsLWxyfbDSTrge6rGGmAh0AB3PbTGnudU1WxJM1uFwQfBEU79fPwrlxttL8FaCqqhAzy86uPoIIXDam2Z0WCW90VxIN3VCApCqfFL-2fc3XEe16wAgwNvlMAbpw25IZ1ygZZ_unchTKucFLhgm1tcFcXY9ZQPAVDq79KGI2fvUbeJhiwTWrZihFCQfxqh3Nf2Fgk5NBq-k1qF0BXHXYhPpg8g2sfjUZkRNqnpoxaKZMlkE7MNQbco_rkW0rF"/>
</div>
</div>
</div>
</nav>
<main class="pt-[72px] pb-stack-lg max-w-container-max mx-auto px-margin-desktop">
<!-- Profile Header Section -->
<header class="py-stack-lg flex flex-col md:flex-row items-center md:items-end gap-gutter border-b border-outline-variant mb-stack-lg">
<div class="relative group">
<div class="w-32 h-32 md:w-40 md:h-40 rounded-xl overflow-hidden border-4 border-surface shadow-lg">
<img alt="User Avatar" class="w-full h-full object-cover" data-alt="A professional portrait of a professional male student, wearing a smart-casual shirt, smiling warmly into the camera. The background is a soft-focus modern library with natural sunlight streaming through large windows, creating a bright and airy atmosphere. The lighting is high-key and optimistic, adhering to a premium corporate modernism aesthetic with blue and white tones." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA44MbCZ3w8-sxDbEVOBibJP3ESRtn7cT4capX5IQROQsWiG8hQCfUaNLF-UXHoIjqQ1KCX0rMB9tRCmcxIVLu_28OZAhW2ibCd-ZPmYzFNjaUmBuMltFmhj8cVQVfjDvmV0v8HNq-hdGYs3XBQiDHqOvHueNdjxAdC-r72IShikDj9T3MBD35vEw60kQ9UTrgktkKiii8ExjV8cjMldtfRqATwLcRqxZSNSIIL_xXyzlAn_HB_JIgx64wjpvMycvD91pYA-2sBq8zQ"/>
</div>
<button class="absolute bottom-2 right-2 bg-primary text-on-primary p-2 rounded-lg shadow-md hover:scale-105 transition-transform">
<span class="material-symbols-outlined text-[18px]">edit</span>
</button>
</div>
<div class="flex-grow text-center md:text-left">
<h1 class="font-headline-lg text-headline-lg mb-1">Alex Chen</h1>
<p class="text-on-surface-variant max-w-xl mb-4">Senior UX Designer at TechFlow. Currently mastering Advanced React Patterns and AI-driven design systems to scale enterprise products.</p>
<div class="flex flex-wrap justify-center md:justify-start gap-4">
<div class="flex items-center gap-2 px-3 py-1 bg-primary-container/10 text-primary rounded-full">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">workspace_premium</span>
<span class="font-label-md text-label-md">Verified Learner</span>
</div>
<div class="flex items-center gap-2 px-3 py-1 bg-secondary-container/30 text-secondary rounded-full">
<span class="material-symbols-outlined text-[18px]">local_fire_department</span>
<span class="font-label-md text-label-md">12 Day Streak</span>
</div>
</div>
</div>
<div class="flex gap-4">
<div class="text-center bg-surface-container-low px-6 py-4 rounded-xl soft-lift">
<span class="block font-headline-md text-headline-md text-primary">14</span>
<span class="text-label-sm text-on-surface-variant uppercase tracking-wider">Courses</span>
</div>
<div class="text-center bg-surface-container-low px-6 py-4 rounded-xl soft-lift">
<span class="block font-headline-md text-headline-md text-primary">8</span>
<span class="text-label-sm text-on-surface-variant uppercase tracking-wider">Certificates</span>
</div>
</div>
</header>
<!-- Main Layout: Bento Style -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Left Column: Learning Progress & Tabs -->
<div class="lg:col-span-8 space-y-stack-lg">
<section>
<div class="flex items-center justify-between mb-stack-md">
<h2 class="font-headline-md text-headline-md">My Learning</h2>
<div class="flex p-1 bg-surface-container rounded-lg">
<button class="px-6 py-2 rounded-md bg-white shadow-sm text-primary font-bold text-label-md transition-all" id="tab-in-progress">In Progress</button>
<button class="px-6 py-2 rounded-md text-on-surface-variant font-medium text-label-md hover:text-primary transition-all" id="tab-completed">Completed</button>
</div>
</div>
<div class="space-y-gutter">
<!-- Course Card 1 -->
<div class="flex flex-col md:flex-row bg-white border border-outline-variant rounded-xl overflow-hidden soft-lift transition-all duration-300">
<div class="md:w-64 h-40 relative">
<img alt="Course Thumbnail" class="w-full h-full object-cover" data-alt="A clean, high-quality photograph of a modern workspace with a laptop displaying code snippets and a React logo. The lighting is soft and professional, utilizing a primary blue and clean white color palette. The composition is structured and architectural, reflecting a premium corporate learning environment for advanced software engineering." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAf7Djw1LXmIIcqGD3GRpOTDgNzIUTF8liLU3Q_Y7OVh9fNZoKl_xfpcTivpMgcNgqwlio_cH1ug_kOPm8Vo7uYOhZSWxB3TQmvG29OQdWwPD4Fc59jcbTCGFCqLATFR-SWhHU8ZhrORUnxaKnpx5tAyf5tG6CkJxUCCXBPDvckKSED7Z_hrjoLZG-P6tUzTuxE3OrcbrWyjpB9bC1bJiwd10A2o7nB9HCYbRXzMlK9IMHmrU4nuAjmgF4mfQUMyQ6-zXzBnRwlC4r4"/>
<div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined text-white text-5xl">play_circle</span>
</div>
</div>
<div class="p-stack-md flex-grow flex flex-col justify-between">
<div>
<div class="flex justify-between items-start mb-2">
<h3 class="font-headline-sm text-headline-sm leading-tight">Advanced React Architecture: Scalable Component Systems</h3>
<span class="text-label-sm px-2 py-1 bg-primary-container/10 text-primary rounded-md">Design</span>
</div>
<p class="text-body-md text-on-surface-variant line-clamp-1">Module 4: Performance optimization and atomic design principles.</p>
</div>
<div class="mt-4">
<div class="flex justify-between text-label-sm text-on-surface-variant mb-2">
<span>75% Complete</span>
<span>12 / 16 Lessons</span>
</div>
<div class="w-full h-2 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary w-3/4 rounded-full transition-all duration-700"></div>
</div>
<button class="mt-4 w-full md:w-auto px-6 py-2 bg-primary text-on-primary rounded-lg font-bold text-label-md hover:opacity-90 active:scale-95 transition-all flex items-center justify-center gap-2">
                                        Continue Learning
                                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
</div>
</div>
<!-- Course Card 2 -->
<div class="flex flex-col md:flex-row bg-white border border-outline-variant rounded-xl overflow-hidden soft-lift transition-all duration-300">
<div class="md:w-64 h-40 relative">
<img alt="Course Thumbnail" class="w-full h-full object-cover" data-alt="A minimalist data visualization dashboard displayed on a high-resolution tablet. The interface features clean lines, soft blue gradients, and crisp typography. The surrounding environment is a bright, white-walled office with subtle indoor greenery, conveying a sense of clarity and modern professional analysis." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCEt4s3284tWPRyXJq-TF89d2Qs-mS_38u-xCR9gFdsHccLANuBUTvbmycbUodm1zS8Zgo7zbCCsrXYzA0aMoGxkspufjvFHrezDFUEwA6eYGXgNauAl4gaCdhrY-2uN9AzNAElWFPDFayQpQwPpnhrXB6_iZxBSCJTLZtsvrHX9Z2h0cpSz8_tghD00aedncLxH_RQJNgh-vT2gKowPPU1MS9n5ynicQrXu5xyqy0txIPUdw0TMiyQVPD8A2dYUOPe-quDTVQpzbbY"/>
<div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined text-white text-5xl">play_circle</span>
</div>
</div>
<div class="p-stack-md flex-grow flex flex-col justify-between">
<div>
<div class="flex justify-between items-start mb-2">
<h3 class="font-headline-sm text-headline-sm leading-tight">Data-Driven Decision Making for Product Managers</h3>
<span class="text-label-sm px-2 py-1 bg-primary-container/10 text-primary rounded-md">Management</span>
</div>
<p class="text-body-md text-on-surface-variant line-clamp-1">Module 2: Identifying key performance indicators (KPIs) for growth.</p>
</div>
<div class="mt-4">
<div class="flex justify-between text-label-sm text-on-surface-variant mb-2">
<span>20% Complete</span>
<span>4 / 20 Lessons</span>
</div>
<div class="w-full h-2 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary w-1/5 rounded-full transition-all duration-700"></div>
</div>
<button class="mt-4 w-full md:w-auto px-6 py-2 bg-primary text-on-primary rounded-lg font-bold text-label-md hover:opacity-90 active:scale-95 transition-all flex items-center justify-center gap-2">
                                        Continue Learning
                                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
</div>
</div>
</div>
</section>
<section>
<h2 class="font-headline-md text-headline-md mb-stack-md">Recommended for You</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
<div class="bg-white rounded-xl border border-outline-variant overflow-hidden soft-lift transition-all group">
<div class="aspect-video relative overflow-hidden">
<img alt="Rec" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Close up of a sleek digital drawing tablet and stylus on a designer's desk. The lighting is focused and warm against a backdrop of professional design sketches. The color palette is modern, dominated by neutral grays and professional blues. The mood is creative and focused, representing a high-end educational course for UI design professionals." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJbwYybEByIpIizEFgJxgoM1M7CGzc1xD12paH2zNSHfi72BSuak_Oi-j5HSXM-2WESX03Xy3dkFIZAIxZF3lXfYQ6whYfZmsrYipGI96HGzCuqNWmjkzwSeSjG0HUmLGlfnHdg27IYTtSplPZy9uuZnaVXMwHsE6R9yFFjmt7s0cfsX_SVSHm02raJYFULckp3M_ZlkGuvqo-KY0_atCn6xbx9XY5Vdn7PKVIXr6lQI3t4UnStxl6sMJNj5bSH4Lz4e396sMHTdwF"/>
<div class="absolute top-3 left-3 bg-white/90 backdrop-blur px-2 py-1 rounded text-label-sm font-bold text-primary">NEW</div>
</div>
<div class="p-stack-md">
<h4 class="font-headline-sm text-headline-sm mb-2 group-hover:text-primary transition-colors">Neuro-Design: The Science of User Perception</h4>
<div class="flex items-center gap-2 mb-4">
<div class="flex text-amber-400">
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]">star</span>
</div>
<span class="text-label-sm text-on-surface-variant">(1.2k reviews)</span>
</div>
<div class="flex items-center justify-between">
<span class="font-headline-sm text-primary">$89.99</span>
<button class="text-primary font-bold text-label-md flex items-center gap-1 hover:underline">View Course</button>
</div>
</div>
</div>
<div class="bg-white rounded-xl border border-outline-variant overflow-hidden soft-lift transition-all group">
<div class="aspect-video relative overflow-hidden">
<img alt="Rec" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A wide shot of a group of diverse professionals collaborating in a sleek, glass-walled conference room. Soft, natural morning light pours in, illuminating a whiteboard filled with strategic diagrams. The visual style is premium and corporate, with a color palette of navy, steel gray, and crisp white, evoking trust and high-level leadership training." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB-Kgv5WlOi6161zoMe3vokGBtE5_XC8qN5zpH3_hq-91r0pIVe-2NmzZ43R-5O491G4OD0IDN1_wkhnjXataTYQKfR9INcKtJhM0itujDYElud_6wdXwq4AC4ILeNc4Zz_VSUVnOI5okMLRVBRJtOerLsQl9_PxgmNVRaAY6cjPeKPQgsCogHdQKxk5ZpxAVqE53OZT40U1wZLh_9svlvIFW7O1zXY-HM64JRgrMpAHCFGCS7-WVKiOQkGUX6yULUzgUIIOYDDas2L"/>
<div class="absolute top-3 left-3 bg-white/90 backdrop-blur px-2 py-1 rounded text-label-sm font-bold text-primary">BESTSELLER</div>
</div>
<div class="p-stack-md">
<h4 class="font-headline-sm text-headline-sm mb-2 group-hover:text-primary transition-colors">Lead without Authority: Modern Management</h4>
<div class="flex items-center gap-2 mb-4">
<div class="flex text-amber-400">
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<span class="text-label-sm text-on-surface-variant">(4.8k reviews)</span>
</div>
<div class="flex items-center justify-between">
<span class="font-headline-sm text-primary">$124.99</span>
<button class="text-primary font-bold text-label-md flex items-center gap-1 hover:underline">View Course</button>
</div>
</div>
</div>
</div>
</section>
</div>
<!-- Right Column: Goals & Streaks -->
<aside class="lg:col-span-4 space-y-gutter">
<!-- Streak Tracker -->
<div class="bg-primary text-on-primary rounded-2xl p-stack-md shadow-lg relative overflow-hidden">
<div class="relative z-10">
<div class="flex items-center justify-between mb-4">
<h3 class="font-headline-sm text-headline-sm">Daily Goal</h3>
<span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1;">local_fire_department</span>
</div>
<div class="text-display-lg text-[48px] font-bold leading-none mb-2">12 <span class="text-headline-sm">Days</span></div>
<p class="text-label-md opacity-80 mb-6">You're in the top 5% of active learners this month!</p>
<div class="grid grid-cols-7 gap-2">
<div class="flex flex-col items-center gap-1">
<span class="text-[10px] uppercase opacity-70">M</span>
<div class="w-full h-8 bg-on-primary/20 rounded-md flex items-center justify-center">
<span class="material-symbols-outlined text-[16px]">check</span>
</div>
</div>
<div class="flex flex-col items-center gap-1">
<span class="text-[10px] uppercase opacity-70">T</span>
<div class="w-full h-8 bg-on-primary/20 rounded-md flex items-center justify-center">
<span class="material-symbols-outlined text-[16px]">check</span>
</div>
</div>
<div class="flex flex-col items-center gap-1">
<span class="text-[10px] uppercase opacity-70">W</span>
<div class="w-full h-8 bg-on-primary/20 rounded-md flex items-center justify-center">
<span class="material-symbols-outlined text-[16px]">check</span>
</div>
</div>
<div class="flex flex-col items-center gap-1">
<span class="text-[10px] uppercase opacity-70">T</span>
<div class="w-full h-8 bg-on-primary/20 rounded-md flex items-center justify-center">
<span class="material-symbols-outlined text-[16px]">check</span>
</div>
</div>
<div class="flex flex-col items-center gap-1">
<span class="text-[10px] uppercase opacity-70">F</span>
<div class="w-full h-8 bg-on-primary/60 rounded-md flex items-center justify-center">
<span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">bolt</span>
</div>
</div>
<div class="flex flex-col items-center gap-1">
<span class="text-[10px] uppercase opacity-70">S</span>
<div class="w-full h-8 bg-on-primary/10 rounded-md"></div>
</div>
<div class="flex flex-col items-center gap-1">
<span class="text-[10px] uppercase opacity-70">S</span>
<div class="w-full h-8 bg-on-primary/10 rounded-md"></div>
</div>
</div>
</div>
<!-- Decorative background pattern -->
<div class="absolute -right-4 -bottom-4 opacity-10">
<span class="material-symbols-outlined text-[120px]">trending_up</span>
</div>
</div>
<!-- Learning Path -->
<div class="bg-white rounded-2xl border border-outline-variant p-stack-md soft-lift">
<h3 class="font-headline-sm text-headline-sm mb-4">Learning Path: Design Lead</h3>
<div class="space-y-6 relative">
<div class="absolute left-4 top-2 bottom-2 w-0.5 bg-surface-container"></div>
<div class="flex items-start gap-4 relative">
<div class="w-8 h-8 rounded-full bg-primary text-on-primary flex items-center justify-center z-10">
<span class="material-symbols-outlined text-[18px]">check</span>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface">Visual Hierarchy Foundations</p>
<p class="text-label-sm text-on-surface-variant">Completed Sep 12</p>
</div>
</div>
<div class="flex items-start gap-4 relative">
<div class="w-8 h-8 rounded-full bg-primary text-on-primary flex items-center justify-center z-10 border-4 border-surface shadow-md">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">play_arrow</span>
</div>
<div>
<p class="font-label-md text-label-md text-primary">Advanced React Systems</p>
<p class="text-label-sm text-on-surface-variant">Active • 75% done</p>
</div>
</div>
<div class="flex items-start gap-4 relative opacity-50">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center z-10">
<span class="material-symbols-outlined text-[18px]">lock</span>
</div>
<div>
<p class="font-label-md text-label-md">Strategic Leadership</p>
<p class="text-label-sm">Next in path</p>
</div>
</div>
<div class="flex items-start gap-4 relative opacity-50">
<div class="w-8 h-8 rounded-full bg-surface-container-highest text-on-surface-variant flex items-center justify-center z-10">
<span class="material-symbols-outlined text-[18px]">lock</span>
</div>
<div>
<p class="font-label-md text-label-md">Public Speaking for Leads</p>
<p class="text-label-sm">Locked</p>
</div>
</div>
</div>
</div>
<!-- Achievements Card -->
<div class="bg-surface-container-low rounded-2xl p-stack-md">
<div class="flex items-center justify-between mb-4">
<h3 class="font-headline-sm text-headline-sm">Achievements</h3>
<a class="text-primary text-label-sm font-bold hover:underline" href="#">View all</a>
</div>
<div class="flex flex-wrap gap-4">
<div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm text-amber-500 tooltip" title="Fast Learner">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">electric_bolt</span>
</div>
<div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm text-blue-500" title="Scholar">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">menu_book</span>
</div>
<div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm text-rose-500" title="Community Star">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">favorite</span>
</div>
<div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm text-emerald-500" title="Finisher">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">verified</span>
</div>
</div>
</div>
</aside>
</div>
</main>
<!-- Footer -->
<footer class="w-full py-stack-lg bg-surface-container-low dark:bg-surface-container-highest mt-stack-lg border-t border-outline-variant">
<div class="max-w-container-max mx-auto px-margin-desktop">
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-gutter">
<div class="col-span-2 lg:col-span-1">
<span class="text-headline-sm font-headline-sm font-bold text-on-surface mb-4 block">EduMarket</span>
<p class="text-on-surface-variant text-body-md mb-6">Empowering professionals through world-class structured learning paths and expert mentorship.</p>
</div>
<div>
<h5 class="font-bold text-label-md mb-4 uppercase tracking-wider text-on-surface">Company</h5>
<ul class="space-y-2">
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">About Us</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Careers</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Blog</a></li>
</ul>
</div>
<div>
<h5 class="font-bold text-label-md mb-4 uppercase tracking-wider text-on-surface">Support</h5>
<ul class="space-y-2">
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Help and Support</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Terms</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Privacy Policy</a></li>
</ul>
</div>
<div>
<h5 class="font-bold text-label-md mb-4 uppercase tracking-wider text-on-surface">Partners</h5>
<ul class="space-y-2">
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Affiliate</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Enterprise</a></li>
</ul>
</div>
</div>
<div class="mt-stack-lg pt-stack-md border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-4">
<p class="text-on-surface-variant text-label-sm">© 2024 EduMarket Inc. All rights reserved.</p>
<div class="flex gap-4">
<a class="text-on-surface-variant hover:text-primary transition-opacity" href="#"><span class="material-symbols-outlined">language</span></a>
<a class="text-on-surface-variant hover:text-primary transition-opacity" href="#"><span class="material-symbols-outlined">settings</span></a>
</div>
</div>
</div>
</footer>
<script>
        // Simple Micro-interactions
        const progressTabs = document.querySelectorAll('[id^="tab-"]');
        progressTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                progressTabs.forEach(t => {
                    t.classList.remove('bg-white', 'shadow-sm', 'text-primary', 'font-bold');
                    t.classList.add('text-on-surface-variant', 'font-medium');
                });
                tab.classList.remove('text-on-surface-variant', 'font-medium');
                tab.classList.add('bg-white', 'shadow-sm', 'text-primary', 'font-bold');
            });
        });

        // Add a soft scroll effect to top
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 20) {
                nav.classList.add('shadow-md');
            } else {
                nav.classList.remove('shadow-md');
            }
        });
    </script>
</body></html>