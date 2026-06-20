<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
@include('components.theme.head')
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .soft-lift { box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05); }
        .soft-lift:hover { box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1); transform: translateY(-2px); transition: all 0.2s ease; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-background text-on-background font-body-md text-body-md antialiased">
<!-- TopNavBar -->
<header class="fixed top-0 left-0 w-full z-50 flex items-center justify-between px-margin-desktop h-[72px] max-w-container-max mx-auto bg-surface/80 backdrop-blur-md shadow-sm">
<div class="flex items-center gap-gutter">
<span class="font-headline-md text-headline-md font-bold text-primary">EduMarket</span>
<div class="hidden md:flex items-center gap-stack-md ml-stack-md">
<a class="font-label-md text-label-md text-secondary hover:text-primary transition-colors duration-200" href="#">Categories</a>
<a class="font-label-md text-label-md text-secondary hover:text-primary transition-colors duration-200" href="#">My Learning</a>
</div>
</div>
<div class="flex items-center gap-base">
<button class="px-gutter py-base rounded-lg border border-outline text-secondary font-label-md text-label-md hover:bg-surface-container-high transition-all">Login</button>
<button class="px-gutter py-base rounded-lg bg-primary text-on-primary font-label-md text-label-md hover:opacity-90 active:scale-95 transition-all">Sign Up</button>
</div>
</header>
<main class="pt-[72px]">
<!-- Hero Header Banner -->
<section class="bg-on-background text-on-primary-container py-stack-lg relative overflow-hidden">
<div class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(circle_at_50%_-20%,#2563eb,transparent_70%)]"></div>
<div class="max-w-container-max mx-auto px-margin-desktop grid grid-cols-1 lg:grid-cols-12 gap-gutter relative z-10">
<div class="lg:col-span-8">
<nav class="flex items-center gap-base mb-stack-sm text-secondary-fixed-dim font-label-md text-label-md">
<a class="hover:text-primary-fixed transition-colors" href="#">Development</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<a class="hover:text-primary-fixed transition-colors" href="#">Web Development</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-primary-container">Advanced Full-Stack</span>
</nav>
<h1 class="font-display-lg text-display-lg mb-stack-sm text-surface">Advanced Full-Stack Web Development</h1>
<p class="font-body-lg text-body-lg text-secondary-fixed-dim mb-stack-md max-w-2xl">Master modern web architectures, scalable backend systems, and sophisticated React patterns with hands-on industry projects.</p>
<div class="flex flex-wrap items-center gap-stack-md">
<div class="flex items-center gap-base">
<span class="font-label-md text-label-md text-surface-container-highest px-base py-1 bg-primary/20 rounded">Bestseller</span>
<div class="flex items-center text-primary-fixed font-bold">
<span class="mr-1">4.8</span>
<div class="flex text-yellow-400">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]">star_half</span>
</div>
</div>
</div>
<span class="text-secondary-fixed-dim font-label-md text-label-md">12,543 students enrolled</span>
<div class="flex items-center gap-base">
<span class="text-secondary-fixed-dim font-label-md text-label-md">Created by</span>
<span class="text-primary-fixed font-label-md text-label-md underline underline-offset-4 cursor-pointer">Dr. Sarah Jenkins</span>
</div>
</div>
</div>
</div>
</section>
<!-- Main Content Area -->
<section class="max-w-container-max mx-auto px-margin-desktop py-stack-md">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter relative items-start">
<!-- Left Column (Overview, Curriculum, Reviews) -->
<div class="lg:col-span-8 order-2 lg:order-1">
<!-- Navigation Tabs -->
<div class="flex gap-stack-md border-b border-outline-variant mb-stack-md sticky top-[72px] bg-background/95 backdrop-blur-sm z-20">
<button class="py-base font-label-md text-label-md text-primary border-b-2 border-primary">Overview</button>
<button class="py-base font-label-md text-label-md text-secondary hover:text-primary transition-colors">Curriculum</button>
<button class="py-base font-label-md text-label-md text-secondary hover:text-primary transition-colors">Instructor</button>
<button class="py-base font-label-md text-label-md text-secondary hover:text-primary transition-colors">Reviews</button>
</div>
<!-- What you'll learn -->
<div class="p-stack-md bg-surface-container-low rounded-xl mb-stack-lg border border-outline-variant">
<h2 class="font-headline-sm text-headline-sm mb-stack-md">What you'll learn</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-stack-sm">
<div class="flex gap-base">
<span class="material-symbols-outlined text-primary">check</span>
<p class="font-body-md text-body-md text-on-surface-variant">Build complex web applications with React, Node.js, and GraphQL.</p>
</div>
<div class="flex gap-base">
<span class="material-symbols-outlined text-primary">check</span>
<p class="font-body-md text-body-md text-on-surface-variant">Architect scalable databases using PostgreSQL and Redis.</p>
</div>
<div class="flex gap-base">
<span class="material-symbols-outlined text-primary">check</span>
<p class="font-body-md text-body-md text-on-surface-variant">Implement professional DevOps workflows with Docker and AWS.</p>
</div>
<div class="flex gap-base">
<span class="material-symbols-outlined text-primary">check</span>
<p class="font-body-md text-body-md text-on-surface-variant">Master microservices patterns and event-driven architecture.</p>
</div>
</div>
</div>
<!-- Curriculum Section -->
<div class="mb-stack-lg">
<div class="flex items-center justify-between mb-stack-md">
<h2 class="font-headline-sm text-headline-sm">Course content</h2>
<span class="font-label-md text-label-md text-secondary">24 sections • 148 lectures • 32h 15m total length</span>
</div>
<div class="border border-outline-variant rounded-xl overflow-hidden">
<!-- Module 1 -->
<details class="group border-b border-outline-variant last:border-b-0" open="">
<summary class="flex items-center justify-between p-stack-sm bg-surface-container-low cursor-pointer hover:bg-surface-container-high transition-colors list-none">
<div class="flex items-center gap-base">
<span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
<span class="font-headline-sm text-headline-sm text-[18px]">Module 1: Professional Environment Setup</span>
</div>
<span class="font-label-md text-label-md text-secondary">4 lectures • 45min</span>
</summary>
<div class="bg-surface">
<div class="flex items-center justify-between p-stack-sm border-b border-outline-variant/30 ml-gutter">
<div class="flex items-center gap-base">
<span class="material-symbols-outlined text-secondary text-[20px]">play_circle</span>
<span class="text-on-surface-variant">Introduction to Enterprise Workflow</span>
</div>
<span class="text-secondary text-label-sm font-label-sm">12:05</span>
</div>
<div class="flex items-center justify-between p-stack-sm border-b border-outline-variant/30 ml-gutter">
<div class="flex items-center gap-base">
<span class="material-symbols-outlined text-secondary text-[20px]">play_circle</span>
<span class="text-on-surface-variant">Advanced Docker Orchestration for Dev</span>
</div>
<span class="text-secondary text-label-sm font-label-sm">15:30</span>
</div>
</div>
</details>
<!-- Module 2 -->
<details class="group border-b border-outline-variant last:border-b-0">
<summary class="flex items-center justify-between p-stack-sm bg-surface-container-low cursor-pointer hover:bg-surface-container-high transition-colors list-none">
<div class="flex items-center gap-base">
<span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
<span class="font-headline-sm text-headline-sm text-[18px]">Module 2: Advanced React Patterns</span>
</div>
<span class="font-label-md text-label-md text-secondary">12 lectures • 4h 20min</span>
</summary>
<div class="bg-surface">
<div class="flex items-center justify-between p-stack-sm border-b border-outline-variant/30 ml-gutter">
<div class="flex items-center gap-base">
<span class="material-symbols-outlined text-secondary text-[20px]">play_circle</span>
<span class="text-on-surface-variant">Compound Components and Render Props</span>
</div>
<span class="text-secondary text-label-sm font-label-sm">25:12</span>
</div>
</div>
</details>
<!-- Module 3 -->
<details class="group border-b border-outline-variant last:border-b-0">
<summary class="flex items-center justify-between p-stack-sm bg-surface-container-low cursor-pointer hover:bg-surface-container-high transition-colors list-none">
<div class="flex items-center gap-base">
<span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
<span class="font-headline-sm text-headline-sm text-[18px]">Module 3: Scalable Backend Architecture</span>
</div>
<span class="font-label-md text-label-md text-secondary">18 lectures • 6h 45min</span>
</summary>
<div class="bg-surface">
<div class="p-stack-sm ml-gutter text-on-surface-variant italic">Section content loading...</div>
</div>
</details>
</div>
</div>
<!-- Instructor Section -->
<div class="mb-stack-lg">
<h2 class="font-headline-sm text-headline-sm mb-stack-md">Instructor</h2>
<div class="flex flex-col md:flex-row gap-stack-md items-start">
<img alt="Dr. Sarah Jenkins" class="w-32 h-32 rounded-full object-cover border-4 border-surface shadow-sm" data-alt="A professional headshot of a female computer science professor with a confident smile. She is wearing business casual attire in a bright, modern office setting with blurred bookshelves in the background. The lighting is warm and natural, evoking a sense of expertise and accessibility." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC8t1hc7bsIkvAWooof1W2Z0aCjNID3UZEcjif_AJ_RINN7HVDMBNmRIlEDXvek6x2Jb7abk2xgeNJg6vqmiltKMEK6JWZcu_GRoKBVKAoddDelGsg-FwScMnUCHjnR6pa7wzZC1Bu9ipgv2-9YI__oxoc2LXg6tZyHu1wNfxkzixVnbhpaafDkipG4KVVLwCntYv_46H2UKThFLXlGOgJnEeP8E94TFATWSDZaAxHRKLdqbA4oNpwobArQs92eH6yuzByxoth2fBuU"/>
<div class="flex-1">
<h3 class="font-headline-sm text-headline-sm text-primary underline underline-offset-4 cursor-pointer mb-base">Dr. Sarah Jenkins</h3>
<p class="font-label-md text-label-md text-secondary mb-stack-sm">Principal Engineer &amp; Senior Educator</p>
<div class="flex gap-stack-md mb-stack-sm">
<div class="flex items-center gap-base">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-label-md text-label-md">4.9 Instructor Rating</span>
</div>
<div class="flex items-center gap-base">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">person</span>
<span class="font-label-md text-label-md">45,210 Students</span>
</div>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mb-stack-sm leading-relaxed">
                                    Sarah is a PhD in Distributed Systems with over 15 years of industry experience at companies like Google and Netflix. She specializes in bridging the gap between academic theory and real-world production challenges.
                                </p>
</div>
</div>
</div>
</div>
<!-- Sidebar Sticky Card (Order 1 for Mobile for visibility, Order 2 for Desktop) -->
<div class="lg:col-span-4 order-1 lg:order-2 lg:sticky lg:top-[88px] mb-stack-lg">
<div class="bg-surface rounded-xl overflow-hidden soft-lift border border-outline-variant">
<!-- Preview Image -->
<div class="relative aspect-video group cursor-pointer">
<img alt="Course Preview" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" data-alt="A clean, cinematic overhead shot of a modern programmer's workspace. A laptop displays lines of colorful React code, flanked by a steaming cup of coffee and a high-end mechanical keyboard. The lighting is moody with cool blue tones and sharp highlights, representing advanced full-stack development." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAE--T2PRVEz7F0h0paduLPqTGQh9IDqzNKr6QNzEr1Mh0D-HmlUDVPdS7tGPAP6gBhePld1TwA312izhB4xHXwvjeti3NQNBib1sQdHbodIJ8bm1dMYvGKacrUUOl4ecy2evurBmXShUarK3FNjzRqzEln-m73jU46XnfPev4trPXajZ9INIkcMw_ZjTuAE03j4NmdkVqjbouesElWPa_EOnG6qZ72yHvXRJS2TUCMSqBE8ygtHh9jkuYSN4IrrAjwtqFBS_KnVpKH"/>
<div class="absolute inset-0 bg-on-background/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
<span class="material-symbols-outlined text-surface text-[64px]" style="font-variation-settings: 'FILL' 1;">play_circle</span>
</div>
<div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-surface font-bold text-label-md px-stack-sm py-2 bg-on-background/60 backdrop-blur-sm rounded-lg">
                                Preview this course
                            </div>
</div>
<!-- Pricing & CTA -->
<div class="p-stack-md">
<div class="flex items-center gap-base mb-stack-md">
<span class="font-display-lg text-display-lg text-primary">$84.99</span>
<span class="font-headline-sm text-headline-sm text-secondary line-through">$149.99</span>
<span class="font-label-md text-label-md text-error px-base py-1 bg-error-container rounded">43% OFF</span>
</div>
<div class="flex flex-col gap-stack-sm mb-stack-md">
<button class="w-full py-stack-sm bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:opacity-90 active:scale-95 transition-all">Enroll Now</button>
<button class="w-full py-stack-sm border border-outline text-secondary rounded-lg font-label-md text-label-md hover:bg-surface-container-high transition-all">Add to Cart</button>
</div>
<p class="text-center text-label-sm font-label-sm text-secondary mb-stack-md">30-Day Money-Back Guarantee</p>
<!-- What's included -->
<div class="pt-stack-md border-t border-outline-variant">
<h4 class="font-label-md text-label-md mb-stack-sm">This course includes:</h4>
<ul class="space-y-base">
<li class="flex items-center gap-base text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px]">ondemand_video</span>
<span>32 hours on-demand video</span>
</li>
<li class="flex items-center gap-base text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px]">description</span>
<span>45 downloadable resources</span>
</li>
<li class="flex items-center gap-base text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px]">terminal</span>
<span>Coding exercises</span>
</li>
<li class="flex items-center gap-base text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px]">all_inclusive</span>
<span>Full lifetime access</span>
</li>
<li class="flex items-center gap-base text-on-surface-variant font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px]">emoji_events</span>
<span>Certificate of completion</span>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-surface-container-low border-t border-outline-variant mt-stack-lg">
<div class="w-full py-stack-lg px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter max-w-container-max mx-auto">
<div class="md:col-span-1">
<span class="font-headline-sm text-headline-sm font-bold text-primary mb-stack-sm block">EduMarket</span>
<p class="font-body-md text-body-md text-secondary">The premier marketplace for high-signal professional education and career advancement.</p>
</div>
<div>
<h5 class="font-label-md text-label-md text-on-surface mb-stack-sm">Company</h5>
<ul class="space-y-base">
<li><a class="font-label-sm text-label-sm text-secondary hover:text-primary hover:underline transition-all" href="#">About Us</a></li>
<li><a class="font-label-sm text-label-sm text-secondary hover:text-primary hover:underline transition-all" href="#">Careers</a></li>
<li><a class="font-label-sm text-label-sm text-secondary hover:text-primary hover:underline transition-all" href="#">Partners</a></li>
</ul>
</div>
<div>
<h5 class="font-label-md text-label-md text-on-surface mb-stack-sm">Support</h5>
<ul class="space-y-base">
<li><a class="font-label-sm text-label-sm text-secondary hover:text-primary hover:underline transition-all" href="#">Help Center</a></li>
<li><a class="font-label-sm text-label-sm text-secondary hover:text-primary hover:underline transition-all" href="#">Terms</a></li>
<li><a class="font-label-sm text-label-sm text-secondary hover:text-primary hover:underline transition-all" href="#">Privacy Policy</a></li>
</ul>
</div>
<div>
<h5 class="font-label-md text-label-md text-on-surface mb-stack-sm">Connect</h5>
<div class="flex gap-stack-sm">
<button class="w-10 h-10 rounded-full border border-outline-variant flex items-center justify-center text-secondary hover:bg-surface-container-high transition-colors">
<span class="material-symbols-outlined">share</span>
</button>
<button class="w-10 h-10 rounded-full border border-outline-variant flex items-center justify-center text-secondary hover:bg-surface-container-high transition-colors">
<span class="material-symbols-outlined">public</span>
</button>
</div>
</div>
</div>
<div class="max-w-container-max mx-auto px-margin-desktop py-stack-md border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-stack-sm">
<span class="font-label-sm text-label-sm text-secondary">© 2024 EduMarket, Inc. All rights reserved.</span>
<div class="flex gap-gutter">
<a class="font-label-sm text-label-sm text-secondary hover:text-primary transition-all" href="#">Privacy Policy</a>
<a class="font-label-sm text-label-sm text-secondary hover:text-primary transition-all" href="#">Cookie Settings</a>
</div>
</div>
</footer>
<script>
        // Simple scroll behavior for tabs highlighting
        window.addEventListener('scroll', () => {
            const sections = ['Overview', 'Curriculum', 'Instructor', 'Reviews'];
            // This is a placeholder for real scroll-spy logic
        });

        // Toggle favorite logic
        function toggleFavorite(btn) {
            const icon = btn.querySelector('.material-symbols-outlined');
            const isFilled = icon.style.fontVariationSettings.includes("'FILL' 1");
            icon.style.fontVariationSettings = isFilled ? "'FILL' 0" : "'FILL' 1";
            icon.classList.toggle('text-error', !isFilled);
        }
    </script>
</body></html>