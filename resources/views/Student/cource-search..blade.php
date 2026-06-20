<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>EduMarket | Courses</title>
@include('components.theme.head')
<style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .course-card-shadow {
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .course-card-shadow:hover {
            box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1);
            transform: translateY(-2px);
        }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    </style>
</head>
<body class="bg-background text-on-background">
<!-- TopNavBar -->
<header class="fixed top-0 left-0 w-full z-50 flex items-center justify-between px-margin-desktop h-[72px] bg-surface/80 dark:bg-on-background/80 backdrop-blur-md shadow-sm">
<div class="flex items-center gap-stack-md max-w-container-max mx-auto w-full justify-between">
<div class="flex items-center gap-8">
<a class="font-headline-md text-headline-md font-bold text-primary dark:text-inverse-primary" href="#">EduMarket</a>
<nav class="hidden md:flex items-center gap-6">
<a class="text-secondary dark:text-secondary-fixed-dim font-medium hover:text-primary dark:hover:text-primary-fixed-dim transition-colors duration-200 font-label-md text-label-md" href="#">Categories</a>
<a class="text-primary dark:text-inverse-primary font-bold border-b-2 border-primary font-label-md text-label-md" href="#">My Learning</a>
</nav>
</div>
<div class="flex-1 max-w-md mx-8 hidden lg:block">
<div class="relative group">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container rounded-lg border-none focus:ring-2 focus:ring-primary/20 transition-all font-body-md text-body-md" placeholder="Search for courses..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="px-4 py-2 text-secondary dark:text-secondary-fixed-dim font-medium hover:text-primary transition-colors font-label-md text-label-md active:scale-95 transition-transform">Login</button>
<button class="px-6 py-2 bg-primary text-on-primary rounded-lg font-bold hover:bg-primary/90 transition-all shadow-sm active:scale-95 transition-transform font-label-md text-label-md">Sign Up</button>
</div>
</div>
</header>
<!-- Main Layout Container -->
<div class="max-w-container-max mx-auto pt-[72px] flex flex-col lg:flex-row min-h-screen">
<!-- SideNavBar (Filters) -->
<aside class="hidden lg:flex flex-col gap-stack-md py-gutter sticky top-[72px] h-[calc(100vh-72px)] w-64 bg-surface-container-low dark:bg-surface-container-lowest border-r border-outline-variant px-6 overflow-y-auto custom-scrollbar">
<div class="mb-2">
<h2 class="font-headline-sm text-headline-sm text-on-surface">Filters</h2>
<p class="font-label-md text-label-md text-secondary opacity-70">Refine your search</p>
</div>
<!-- Categories -->
<div class="space-y-3">
<div class="flex items-center gap-3 text-on-surface-variant font-bold">
<span class="material-symbols-outlined text-primary">category</span>
<span class="font-label-md text-label-md">Categories</span>
</div>
<div class="space-y-2 ml-9">
<label class="flex items-center gap-3 cursor-pointer group">
<input class="rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Web Dev</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Data Science</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Design</span>
</label>
</div>
</div>
<!-- Ratings -->
<div class="space-y-3">
<div class="flex items-center gap-3 text-on-surface-variant font-bold">
<span class="material-symbols-outlined text-primary">star</span>
<span class="font-label-md text-label-md">Ratings</span>
</div>
<div class="space-y-2 ml-9">
<label class="flex items-center gap-3 cursor-pointer group">
<input class="text-primary focus:ring-primary/20" name="rating" type="radio"/>
<span class="font-body-md text-body-md text-on-surface-variant flex items-center gap-1">4.5 &amp; Up</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="text-primary focus:ring-primary/20" name="rating" type="radio"/>
<span class="font-body-md text-body-md text-on-surface-variant flex items-center gap-1">4.0 &amp; Up</span>
</label>
</div>
</div>
<!-- Price -->
<div class="space-y-3">
<div class="flex items-center gap-3 text-on-surface-variant font-bold">
<span class="material-symbols-outlined text-primary">payments</span>
<span class="font-label-md text-label-md">Price</span>
</div>
<div class="space-y-2 ml-9">
<label class="flex items-center gap-3 cursor-pointer group">
<input class="rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Free</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Paid</span>
</label>
</div>
</div>
<!-- Level -->
<div class="space-y-3">
<div class="flex items-center gap-3 text-on-surface-variant font-bold">
<span class="material-symbols-outlined text-primary">leaderboard</span>
<span class="font-label-md text-label-md">Level</span>
</div>
<div class="space-y-2 ml-9">
<label class="flex items-center gap-3 cursor-pointer group">
<input class="rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Beginner</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Intermediate</span>
</label>
<label class="flex items-center gap-3 cursor-pointer group">
<input class="rounded border-outline-variant text-primary focus:ring-primary/20" type="checkbox"/>
<span class="font-body-md text-body-md text-on-surface-variant group-hover:text-primary transition-colors">Advanced</span>
</label>
</div>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 p-gutter bg-surface">
<!-- Header & Sort -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-stack-md">
<div>
<h1 class="font-headline-lg text-headline-lg text-on-background">Browse Courses</h1>
<p class="font-body-md text-body-md text-secondary">8,245 results for all categories</p>
</div>
<div class="flex items-center gap-4">
<span class="font-label-md text-label-md text-on-surface-variant hidden sm:inline">Sort by:</span>
<select class="bg-surface border-outline-variant rounded-lg font-body-md text-body-md px-4 py-2 focus:ring-2 focus:ring-primary/20 outline-none">
<option>Popularity</option>
<option>Newest</option>
<option>Price: Low to High</option>
<option>Price: High to Low</option>
</select>
</div>
</div>
<!-- Course Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-gutter">
<!-- Course Card 1 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden course-card-shadow flex flex-col group border border-outline-variant/30">
<div class="aspect-video relative overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A clean, high-angle shot of a minimalist workstation with a sleek laptop displaying complex React code. The environment is bathed in soft, professional blue-toned morning light, emphasizing a high-trust educational atmosphere. A small potted succulent and a ceramic coffee mug sit neatly nearby on a white desk, creating a serene, focused workspace for modern web development." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAFeIsdAOCMR1Abj59HsBgIwFzqB70EwUHWO687FhnjL7fOdyxLvDr65uRbwgvDNOpF7rk1xXPWRiG01LtWT3v-pdXc6b4m6cGO1vbYMhVtbejtRt6dOI1vYZWhw_iF8NpFYJPlOG1a3aPfvcMIWfiwhJcBrI_gI9qClzBxKjI5uyiI27lAGJ3qrfGWkDvAwA48AVrEv6X6fAc1hPcGsiVWMGbBrzyx1kFl6hrp2zFyo0CVeSUR58XLXkxd4trf0hEi6Qk13jYePp4r"/>
<div class="absolute top-3 left-3">
<span class="bg-primary/10 text-primary font-label-sm text-label-sm px-2 py-1 rounded backdrop-blur-md font-bold uppercase tracking-wider">Best Seller</span>
</div>
</div>
<div class="p-5 flex-1 flex flex-col gap-3">
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight line-clamp-2">Mastering React 18: The Complete Professional Guide</h3>
<p class="font-body-md text-body-md text-on-surface-variant opacity-70">Dr. Angela Yu • Senior Architect</p>
<div class="flex items-center gap-1">
<span class="text-headline-sm font-bold text-on-surface">4.8</span>
<div class="flex text-amber-400">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 0.5;">star_half</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">(12,402)</span>
</div>
<div class="mt-auto pt-4 flex items-center justify-between border-t border-outline-variant/20">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">$84.99</span>
<span class="font-label-sm text-label-sm text-secondary line-through">$129.99</span>
</div>
<button class="material-symbols-outlined p-2 text-primary hover:bg-primary-container rounded-full transition-colors">shopping_cart</button>
</div>
</div>
</div>
<!-- Course Card 2 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden course-card-shadow flex flex-col group border border-outline-variant/30">
<div class="aspect-video relative overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A futuristic data visualization dashboard glowing on a curved monitor in a dark, sophisticated tech lab. Neon blue and cyan network nodes interconnect across the screen, casting a soft ambient light onto a professional workspace. The scene conveys deep technical expertise and advanced data science analytics in a high-contrast, premium aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGV-4hrp5tiZYUJ1IK-XvuGVToPBTr6TrfX266aJG9WLtdrG62C8J7ULHsL1d3C1UL8aKyCQCQ2GCWI64C9EQ3KonMEP-uLGAiEGfdLCMp17thEnlBaycfjkaYQlByc5Yf_vareHE06kvNq0FcZumM8IV5jgMDZW5owaHx_fk1e44zDh3tVe33srOG31sMRiZ9IvpNUa866iDlh6lvyGgOaoeleS8OrlNVAKGLTv7mosFollC6TXkC_8TZM2r5qPlpK2tmU3t5d5aI"/>
<div class="absolute top-3 left-3">
<span class="bg-emerald-500/10 text-emerald-600 font-label-sm text-label-sm px-2 py-1 rounded backdrop-blur-md font-bold uppercase tracking-wider">New</span>
</div>
</div>
<div class="p-5 flex-1 flex flex-col gap-3">
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight line-clamp-2">Data Science &amp; Machine Learning Bootcamp 2024</h3>
<p class="font-body-md text-body-md text-on-surface-variant opacity-70">Tech Academy Global</p>
<div class="flex items-center gap-1">
<span class="text-headline-sm font-bold text-on-surface">4.9</span>
<div class="flex text-amber-400">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">(8,115)</span>
</div>
<div class="mt-auto pt-4 flex items-center justify-between border-t border-outline-variant/20">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">$99.99</span>
</div>
<button class="material-symbols-outlined p-2 text-primary hover:bg-primary-container rounded-full transition-colors">shopping_cart</button>
</div>
</div>
</div>
<!-- Course Card 3 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden course-card-shadow flex flex-col group border border-outline-variant/30">
<div class="aspect-video relative overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A vibrant UI design workspace featuring a large tablet showing a clean, modern mobile app layout with rounded corners and high-end typography. Color swatches and design wireframes are scattered around the tablet on a light grey, professional desk. The lighting is bright and airy, reflecting a creative yet structured design studio environment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCg-SB1-PbZf7pVH_JiJdB8zv94wvGqxlENyVrCNxss83SBGIHXQMlQlFDf_kuInMbopOhpiRj8fCYx7oUqfs9fYOwmJuyvQR8eIv_DmGdQbzOrlAsfuz1Ti31zaugsXS-MRYoKtuid0JxOmnyIPYun3dGF4pX8RJH5faoaYa8WV1bx8vU_zdV_yn1UH-qzFQOBOkk7mnItdRO7n4Qa670gzXaODeEGUQDfPZtZ_ac--MDqYieePU6sAayGxEuLbLSZw39HywmQis2d"/>
</div>
<div class="p-5 flex-1 flex flex-col gap-3">
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight line-clamp-2">UI/UX Design Essentials: From Figma to Prototype</h3>
<p class="font-body-md text-body-md text-on-surface-variant opacity-70">Creative Labs Studio</p>
<div class="flex items-center gap-1">
<span class="text-headline-sm font-bold text-on-surface">4.7</span>
<div class="flex text-amber-400">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 0.5;">star_half</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">(4,500)</span>
</div>
<div class="mt-auto pt-4 flex items-center justify-between border-t border-outline-variant/20">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">$49.99</span>
<span class="font-label-sm text-label-sm text-secondary line-through">$89.99</span>
</div>
<button class="material-symbols-outlined p-2 text-primary hover:bg-primary-container rounded-full transition-colors">shopping_cart</button>
</div>
</div>
</div>
<!-- Course Card 4 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden course-card-shadow flex flex-col group border border-outline-variant/30">
<div class="aspect-video relative overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Close up of a keyboard with focus on the terminal screen showing complex Python scripting and server logs. The background is softly blurred with subtle green and grey office lighting, representing a deep dive into backend engineering and system architecture." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHcfgBPeAlg2GMuZUF4ZiISLEgQhFFcVckU1pBF92vEmKGWy9QS4FRn9zjpByzdrXJ5IWxN08ZcA_n-LYmZts6XbLEyib8oRh5mwsh2UHPWT2diAeSvMLTaJkYxB_M6uTT2V_RM8FxjMqom9gNKVrEhaL0g3RGNaSOOFjRNc98RxkM7t__DvPU-75OUupXVLookpof72kHSVnGmIkO5BXFifBYcKRplxEbcW-SD8Wv5xgHCIPlNM3a63HONX-zie5JaqL31xSNVBl8"/>
</div>
<div class="p-5 flex-1 flex flex-col gap-3">
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight line-clamp-2">Advanced Python: Backend Systems &amp; Architecture</h3>
<p class="font-body-md text-body-md text-on-surface-variant opacity-70">Mark Silver • Lead Dev</p>
<div class="flex items-center gap-1">
<span class="text-headline-sm font-bold text-on-surface">4.6</span>
<div class="flex text-amber-400">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 0.5;">star_half</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">(2,110)</span>
</div>
<div class="mt-auto pt-4 flex items-center justify-between border-t border-outline-variant/20">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">$74.99</span>
</div>
<button class="material-symbols-outlined p-2 text-primary hover:bg-primary-container rounded-full transition-colors">shopping_cart</button>
</div>
</div>
</div>
<!-- Course Card 5 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden course-card-shadow flex flex-col group border border-outline-variant/30">
<div class="aspect-video relative overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A professional boardroom setting with a focus on a high-end tablet displaying marketing growth charts and consumer demographics. The lighting is crisp and natural, streaming through large office windows. The mood is corporate and authoritative, reflecting business intelligence and marketing strategy." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAek4kHV3ka29uKgBskkF-6EiLd4SjGXZht6lRMANQV99yDsrYvg14Be3P7qGyXkURkhlbTrxhAeVUb5eQamb1OyzOXjm_0O2n6XBRDEzok380ly1q-6dpEVob4E7ileAO5Cc3ERfGmpha38MW-A0qvJ-h6h7t1gw6dHgMd95ujTl42axVJttIjtlYuZqFRgMZ379QAQ5w-H3KiPfoLj6GtP22-Lw9bovwjBKwZVozuS3TF4FWqY4MgPVDOxO_PY5Ev6yvN_I8bsi7u"/>
</div>
<div class="p-5 flex-1 flex flex-col gap-3">
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight line-clamp-2">Digital Marketing Strategy for Growth-Stage Startups</h3>
<p class="font-body-md text-body-md text-on-surface-variant opacity-70">Sarah Jenkins • Growth Lead</p>
<div class="flex items-center gap-1">
<span class="text-headline-sm font-bold text-on-surface">4.8</span>
<div class="flex text-amber-400">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">(5,230)</span>
</div>
<div class="mt-auto pt-4 flex items-center justify-between border-t border-outline-variant/20">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">$119.99</span>
</div>
<button class="material-symbols-outlined p-2 text-primary hover:bg-primary-container rounded-full transition-colors">shopping_cart</button>
</div>
</div>
</div>
<!-- Course Card 6 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden course-card-shadow flex flex-col group border border-outline-variant/30">
<div class="aspect-video relative overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A top-down view of a designer's desk with a professional camera, a sketchbook with wireframes, and a minimalist smartphone. The palette is muted with natural wood and charcoal accents. The light is soft and diffused, creating a professional and premium feel for creative mobile development courses." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCiFHPyo-XdaOsIdJDHMSfag9Zbuj7IExgOgic7HTtRhdm99FQWqNvrIBaM5O0QbECwtx1SejrjFrR229PTBgkUcOK2UhUrwIV5Vm5D-u78zVTCBAoLo6LVmCUCR4gx92iuaF3xKZl964nemmcstdkMXUHUk9k1t1NjupQKB-IHlzUQfydZKYDkZqhpYjZnm2jUTnEFGDHIKJt8a2VPa-ARGkCoy36iEDdnX63_JjuufnbuUOHBvdFQzmiZI0q_nrgk4qXnfFm7Olrb"/>
</div>
<div class="p-5 flex-1 flex flex-col gap-3">
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight line-clamp-2">Mobile App Dev: Swift &amp; SwiftUI Professional Track</h3>
<p class="font-body-md text-body-md text-on-surface-variant opacity-70">iOS Expert Team</p>
<div class="flex items-center gap-1">
<span class="text-headline-sm font-bold text-on-surface">4.9</span>
<div class="flex text-amber-400">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">(1,980)</span>
</div>
<div class="mt-auto pt-4 flex items-center justify-between border-t border-outline-variant/20">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">$134.99</span>
<span class="font-label-sm text-label-sm text-secondary line-through">$189.99</span>
</div>
<button class="material-symbols-outlined p-2 text-primary hover:bg-primary-container rounded-full transition-colors">shopping_cart</button>
</div>
</div>
</div>
<!-- Course Card 7 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden course-card-shadow flex flex-col group border border-outline-variant/30">
<div class="aspect-video relative overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="An abstract visualization of cloud computing architecture with glowing light trails moving through transparent digital server racks. The aesthetic is futuristic and high-tech, using a palette of deep blues and electric whites to represent professional-grade cloud engineering." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDKSJd22dGOvUpm6-JP3TneFJX2XjZyYLLXp8ouRgNMGIpclQDrC8jd5iShav4-1LcOBR-sLePbm6_R6ETZYQIkVBA-2CDSoF-Hvw6_qqd12AvDki8xRjemhPLoMMDpp_XCP5McVTQW1MZoMNiV4EDJotjvoQPs0W7yB5aPPVDEeH2Md6qdg1foMtEDTsvuQaE8cvgGc5eK1qteMbq-fw7L-z955d7Rso0kN1oMqiVsHAzmih2lWgmDNd51yjE9L8l-leqKOQOiGAzH"/>
</div>
<div class="p-5 flex-1 flex flex-col gap-3">
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight line-clamp-2">AWS Certified Solutions Architect 2024</h3>
<p class="font-body-md text-body-md text-on-surface-variant opacity-70">Cloud Academy</p>
<div class="flex items-center gap-1">
<span class="text-headline-sm font-bold text-on-surface">4.7</span>
<div class="flex text-amber-400">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 0.5;">star_half</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">(9,400)</span>
</div>
<div class="mt-auto pt-4 flex items-center justify-between border-t border-outline-variant/20">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">$89.99</span>
</div>
<button class="material-symbols-outlined p-2 text-primary hover:bg-primary-container rounded-full transition-colors">shopping_cart</button>
</div>
</div>
</div>
<!-- Course Card 8 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden course-card-shadow flex flex-col group border border-outline-variant/30">
<div class="aspect-video relative overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="A professional analyst's workspace with multiple monitors displaying stock market trends, financial charts, and a glass of water reflecting the ambient blue light of the office. The environment feels high-stakes and intelligent, perfect for advanced financial analysis training." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBD-nEtc514Lhsp3I1p72Jlva9OVtAHNbiPe9EDtajgS4e0s32LpXL0R7Gz3ApO_d_70FtVS-1HtN5dDBiLioasTHJdceWnberEPetyfbZVpJsidwzE1JA__1w1Pmd7s9bVAd4fzguO_z8ltBnXf1NfisEgt2FCCbYCzXyej_Vm2hrbWH4Pba-RIVyvxWZ3pg9In0S_SlRu88TCRuFTwPx6xRUQ8jGRjY58BBY25HRA59OSU6c9hLb6t31f5pIPvIbvGAhZVdGz9QZV"/>
</div>
<div class="p-5 flex-1 flex flex-col gap-3">
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight line-clamp-2">Financial Analysis: Corporate Modeling &amp; Valuation</h3>
<p class="font-body-md text-body-md text-on-surface-variant opacity-70">Wall Street Insider</p>
<div class="flex items-center gap-1">
<span class="text-headline-sm font-bold text-on-surface">4.5</span>
<div class="flex text-amber-400">
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 0.5;">star_half</span>
</div>
<span class="font-label-sm text-label-sm text-secondary">(3,650)</span>
</div>
<div class="mt-auto pt-4 flex items-center justify-between border-t border-outline-variant/20">
<div class="flex flex-col">
<span class="font-headline-sm text-headline-sm text-primary">$149.99</span>
</div>
<button class="material-symbols-outlined p-2 text-primary hover:bg-primary-container rounded-full transition-colors">shopping_cart</button>
</div>
</div>
</div>
</div>
<!-- Pagination -->
<div class="mt-stack-lg flex items-center justify-center gap-2">
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-container transition-all active:scale-95">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg bg-primary text-on-primary font-bold active:scale-95">1</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-surface-container transition-all text-on-surface-variant active:scale-95">2</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-surface-container transition-all text-on-surface-variant active:scale-95">3</button>
<span class="px-2 text-outline-variant">...</span>
<button class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-surface-container transition-all text-on-surface-variant active:scale-95">42</button>
<button class="w-10 h-10 flex items-center justify-center rounded-lg border border-outline-variant hover:bg-surface-container transition-all active:scale-95">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</main>
</div>
<!-- Footer -->
<footer class="w-full bg-surface-container-low dark:bg-on-background border-t border-outline-variant">
<div class="w-full py-stack-lg px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter max-w-container-max mx-auto">
<div class="flex flex-col gap-4">
<a class="font-headline-sm text-headline-sm font-bold text-primary dark:text-inverse-primary" href="#">EduMarket</a>
<p class="font-body-md text-body-md text-secondary opacity-80">Leading marketplace for professional education and skills development.</p>
<div class="flex gap-4">
<span class="material-symbols-outlined text-secondary hover:text-primary cursor-pointer transition-colors">language</span>
<span class="material-symbols-outlined text-secondary hover:text-primary cursor-pointer transition-colors">share</span>
<span class="material-symbols-outlined text-secondary hover:text-primary cursor-pointer transition-colors">mail</span>
</div>
</div>
<div class="flex flex-col gap-3">
<h4 class="font-label-md text-label-md font-bold text-on-surface uppercase tracking-wider">Company</h4>
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors hover:underline" href="#">About Us</a>
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors hover:underline" href="#">Careers</a>
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors hover:underline" href="#">Support</a>
</div>
<div class="flex flex-col gap-3">
<h4 class="font-label-md text-label-md font-bold text-on-surface uppercase tracking-wider">Learning</h4>
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors hover:underline" href="#">Categories</a>
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors hover:underline" href="#">Newsletter</a>
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors hover:underline" href="#">Corporate Training</a>
</div>
<div class="flex flex-col gap-3">
<h4 class="font-label-md text-label-md font-bold text-on-surface uppercase tracking-wider">Legal</h4>
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors hover:underline" href="#">Privacy Policy</a>
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors hover:underline" href="#">Terms of Service</a>
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors hover:underline" href="#">Cookie Settings</a>
</div>
</div>
<div class="max-w-container-max mx-auto px-margin-desktop py-6 border-t border-outline-variant/10 text-center md:text-left">
<p class="font-label-sm text-label-sm text-secondary opacity-60">© 2024 EduMarket, Inc. All rights reserved.</p>
</div>
</footer>
<!-- Mobile Navigation Suppressed as per Task (focused on layout) -->
<script>
        // Simple interactivity for sort dropdown and filters
        document.querySelectorAll('select, input[type="checkbox"], input[type="radio"]').forEach(el => {
            el.addEventListener('change', () => {
                // Visual feedback of loading state
                const main = document.querySelector('main');
                main.style.opacity = '0.5';
                main.style.transition = 'opacity 0.2s';
                setTimeout(() => {
                    main.style.opacity = '1';
                }, 300);
            });
        });
    </script>
</body></html>