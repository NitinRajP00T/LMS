<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary-fixed-dim": "#c4c7c9",
                        "primary": "#004ac6",
                        "on-primary-fixed": "#00174b",
                        "outline-variant": "#c3c6d7",
                        "secondary-fixed": "#dae2fd",
                        "surface-container-highest": "#d3e4fe",
                        "on-primary": "#ffffff",
                        "on-tertiary": "#ffffff",
                        "surface-container": "#e5eeff",
                        "on-surface-variant": "#434655",
                        "on-secondary": "#ffffff",
                        "on-tertiary-fixed": "#191c1e",
                        "surface-container-lowest": "#ffffff",
                        "error": "#ba1a1a",
                        "background": "#f8f9ff",
                        "tertiary": "#525657",
                        "primary-container": "#2563eb",
                        "primary-fixed-dim": "#b4c5ff",
                        "on-error-container": "#93000a",
                        "error-container": "#ffdad6",
                        "on-tertiary-fixed-variant": "#444749",
                        "surface-container-low": "#eff4ff",
                        "surface": "#f8f9ff",
                        "on-secondary-container": "#5c647a",
                        "tertiary-container": "#6b6e70",
                        "surface-dim": "#cbdbf5",
                        "surface-bright": "#f8f9ff",
                        "on-secondary-fixed": "#131b2e",
                        "surface-variant": "#d3e4fe",
                        "on-error": "#ffffff",
                        "inverse-surface": "#213145",
                        "secondary-container": "#dae2fd",
                        "secondary-fixed-dim": "#bec6e0",
                        "tertiary-fixed": "#e0e3e5",
                        "on-secondary-fixed-variant": "#3f465c",
                        "inverse-on-surface": "#eaf1ff",
                        "primary-fixed": "#dbe1ff",
                        "outline": "#737686",
                        "on-primary-fixed-variant": "#003ea8",
                        "on-primary-container": "#eeefff",
                        "inverse-primary": "#b4c5ff",
                        "surface-container-high": "#dce9ff",
                        "on-background": "#0b1c30",
                        "surface-tint": "#0053db",
                        "secondary": "#565e74",
                        "on-tertiary-container": "#eff1f3",
                        "on-surface": "#0b1c30"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "stack-md": "24px",
                        "base": "8px",
                        "gutter": "24px",
                        "container-max": "1280px",
                        "stack-sm": "12px",
                        "stack-lg": "48px",
                        "margin-desktop": "32px",
                        "margin-mobile": "16px"
                    },
                    "fontFamily": {
                        "headline-sm": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "label-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "display-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg": ["Inter"]
                    },
                    "fontSize": {
                        "headline-sm": ["20px", { "lineHeight": "1.4", "fontWeight": "600" }],
                        "headline-lg-mobile": ["24px", { "lineHeight": "1.2", "fontWeight": "700" }],
                        "label-md": ["14px", { "lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600" }],
                        "body-lg": ["18px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "display-lg": ["48px", { "lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                        "headline-md": ["24px", { "lineHeight": "1.3", "fontWeight": "600" }],
                        "label-sm": ["12px", { "lineHeight": "1", "fontWeight": "500" }],
                        "body-md": ["16px", { "lineHeight": "1.6", "fontWeight": "400" }],
                        "headline-lg": ["32px", { "lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700" }]
                    }
                },
            },
        }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .soft-lift { shadow: 0px 4px 20px rgba(15, 23, 42, 0.05); }
        .soft-lift:hover { box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1); transform: translateY(-2px); transition: all 0.3s ease; }
    </style>
</head>
<body class="bg-background text-on-surface">
<!-- TopNavBar -->
<header class="fixed top-0 w-full z-50 flex items-center justify-between px-margin-desktop bg-surface/80 backdrop-blur-md docked full-width h-[72px] border-b border-outline-variant shadow-sm">
<div class="flex items-center gap-12">
<span class="text-headline-md font-headline-md font-extrabold text-primary">Instructor Studio</span>
<nav class="hidden md:flex gap-8">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Dashboard</a>
<a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1" href="#">My Courses</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Performance</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Resources</a>
</nav>
</div>
<div class="flex items-center gap-6">
<button class="font-label-md text-label-md text-primary font-bold hover:scale-95 duration-150">Save Draft</button>
<div class="w-10 h-10 rounded-full bg-surface-container-highest overflow-hidden border border-outline-variant">
<img alt="Instructor Profile" class="w-full h-full object-cover" data-alt="A professional headshot of a middle-aged male instructor with a warm, confident smile, wearing a sharp navy blue blazer and a light gray shirt. He is set against a clean, out-of-focus modern office background with soft cinematic lighting. The image conveys high trust, professional expertise, and approachable authority in an academic marketplace setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAw9Cq5eToUr5bb-NRgWmKOpmdcwHP9bK0g-AXPg7dyA8lZGSxV2ElXIVBolcjFS9yXtTKF9WCJwaP0OFz931ZUN8r3NfVmCcxO5z5Le_KP_GRRBnrXMMUfJulaouOrIEMo1Q4jOC19wSJYhTJZRINHhvmg7DbHFRDvQuAfQztpo295oc8XS1k0prUOYNgXE091CvXhgUxfsfijYrwRIDlX3jShcTFkurJFIlG2SaBNNORSefV3f0iqRQ9CWfBVFHcTY2ypkfs_AZKT"/>
</div>
</div>
</header>
<div class="flex pt-[72px] min-h-screen">
<!-- SideNavBar -->
<aside class="fixed left-0 top-[72px] h-[calc(100vh-72px)] w-64 bg-surface-container-low flex flex-col py-stack-md border-r border-outline-variant/30">
<div class="px-6 mb-8">
<h2 class="text-headline-sm font-headline-sm text-on-surface">Course Wizard</h2>
<p class="text-label-sm font-label-sm text-outline">Draft Status</p>
</div>
<nav class="flex-1 flex flex-col">
<!-- Basic Info: Completed -->
<div class="flex items-center px-6 py-4 text-on-surface-variant hover:bg-surface-container-high transition-all cursor-pointer">
<span class="material-symbols-outlined mr-3 text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="font-label-md text-label-md">Basic Info</span>
</div>
<!-- Curriculum: Completed -->
<div class="flex items-center px-6 py-4 text-on-surface-variant hover:bg-surface-container-high transition-all cursor-pointer">
<span class="material-symbols-outlined mr-3 text-primary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="font-label-md text-label-md">Curriculum</span>
</div>
<!-- Pricing: Active -->
<div class="flex items-center px-6 py-4 text-primary font-bold border-r-4 border-primary bg-primary-container/10 translate-x-1 duration-200">
<span class="material-symbols-outlined mr-3">payments</span>
<span class="font-label-md text-label-md">Pricing</span>
</div>
<!-- Review: Inactive -->
<div class="flex items-center px-6 py-4 text-on-surface-variant hover:bg-surface-container-high transition-all cursor-pointer">
<span class="material-symbols-outlined mr-3">rocket_launch</span>
<span class="font-label-md text-label-md">Review</span>
</div>
</nav>
<div class="p-6">
<button class="w-full py-3 px-4 bg-white border border-outline text-on-surface rounded-lg font-label-md text-label-md hover:bg-surface-container-high transition-all">
                    Preview Course
                </button>
</div>
</aside>
<!-- Main Content Area -->
<main class="ml-64 flex-1 p-margin-desktop bg-background">
<div class="max-w-[800px] mx-auto">
<header class="mb-stack-lg">
<h1 class="font-headline-lg text-headline-lg mb-2">Step 3: Course Pricing</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Set your course price and manage promotional offers to attract more students.</p>
</header>
<div class="space-y-stack-md">
<!-- Tier Selection -->
<section class="bg-white p-gutter rounded-xl border border-outline-variant soft-lift">
<h3 class="font-headline-sm text-headline-sm mb-stack-sm">Pricing Tier</h3>
<div class="grid grid-cols-2 gap-gutter">
<label class="relative flex flex-col p-stack-md border-2 border-outline-variant rounded-lg cursor-pointer hover:bg-surface-container-low transition-all has-[:checked]:border-primary has-[:checked]:bg-primary-container/5">
<input class="hidden" name="pricing_tier" onclick="togglePriceSection(false)" type="radio" value="free"/>
<div class="flex items-center justify-between mb-2">
<span class="font-headline-sm text-headline-sm">Free</span>
<span class="material-symbols-outlined text-outline">volunteer_activism</span>
</div>
<p class="text-label-sm font-label-sm text-on-surface-variant">Perfect for lead generation and building your audience.</p>
</label>
<label class="relative flex flex-col p-stack-md border-2 border-primary bg-primary-container/5 rounded-lg cursor-pointer hover:bg-surface-container-low transition-all has-[:checked]:border-primary has-[:checked]:bg-primary-container/5">
<input checked="" class="hidden" name="pricing_tier" onclick="togglePriceSection(true)" type="radio" value="paid"/>
<div class="flex items-center justify-between mb-2">
<span class="font-headline-sm text-headline-sm">Paid</span>
<span class="material-symbols-outlined text-primary">monetization_on</span>
</div>
<p class="text-label-sm font-label-sm text-on-surface-variant">Monetize your expertise with a one-time enrollment fee.</p>
</label>
</div>
</section>
<!-- Paid Details Section -->
<section class="bg-white p-gutter rounded-xl border border-outline-variant soft-lift transition-all duration-300 opacity-100" id="paid-details">
<div class="grid grid-cols-2 gap-gutter mb-stack-md">
<div>
<label class="block font-label-md text-label-md mb-2">Currency</label>
<select class="w-full border border-outline-variant rounded-lg p-3 font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all">
<option>USD ($)</option>
<option>EUR (€)</option>
<option>GBP (£)</option>
<option>JPY (¥)</option>
</select>
</div>
<div>
<label class="block font-label-md text-label-md mb-2">Standard Price</label>
<div class="relative">
<span class="absolute left-3 top-1/2 -translate-y-1/2 text-outline">$</span>
<input class="w-full pl-8 pr-3 py-3 border border-outline-variant rounded-lg font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" placeholder="99.99" type="number"/>
</div>
</div>
</div>
<div class="flex items-center justify-between p-4 bg-surface-container-low rounded-lg mb-stack-md">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary">sell</span>
<div>
<p class="font-label-md text-label-md">Sale Price</p>
<p class="text-label-sm text-outline">Enable a limited-time discount</p>
</div>
</div>
<label class="inline-flex items-center cursor-pointer">
<input class="sr-only peer" id="sale-toggle" onchange="toggleSaleInput()" type="checkbox"/>
<div class="relative w-11 h-6 bg-outline-variant peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
</label>
</div>
<div class="hidden" id="sale-input-container">
<label class="block font-label-md text-label-md mb-2">Discounted Price</label>
<div class="relative">
<span class="absolute left-3 top-1/2 -translate-y-1/2 text-outline">$</span>
<input class="w-full pl-8 pr-3 py-3 border border-outline-variant rounded-lg font-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all" placeholder="49.99" type="number"/>
</div>
<p class="text-label-sm text-error mt-2">Note: Sale price must be lower than standard price.</p>
</div>
</section>
<!-- Coupons Section -->
<section class="bg-white p-gutter rounded-xl border border-outline-variant soft-lift">
<div class="flex items-center justify-between mb-stack-sm">
<h3 class="font-headline-sm text-headline-sm">Discount Coupons</h3>
<button class="flex items-center gap-2 text-primary font-label-md text-label-md hover:bg-primary-container/10 px-3 py-2 rounded-lg transition-all">
<span class="material-symbols-outlined text-[18px]">add</span>
                                Create New
                            </button>
</div>
<div class="space-y-3">
<!-- Coupon Item 1 -->
<div class="flex items-center justify-between p-4 border border-outline-variant rounded-lg hover:border-primary transition-all group">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-primary">confirmation_number</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="font-label-md text-label-md uppercase tracking-wider">EARLYBIRD50</span>
<span class="text-label-sm bg-primary/10 text-primary px-2 py-0.5 rounded">Active</span>
</div>
<p class="text-label-sm text-on-surface-variant">50% Off • Ends Oct 31, 2023</p>
</div>
</div>
<div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 hover:bg-surface-container rounded-full text-on-surface-variant"><span class="material-symbols-outlined text-[20px]">edit</span></button>
<button class="p-2 hover:bg-error-container/20 rounded-full text-error"><span class="material-symbols-outlined text-[20px]">delete</span></button>
</div>
</div>
<!-- Coupon Item 2 -->
<div class="flex items-center justify-between p-4 border border-outline-variant rounded-lg hover:border-primary transition-all group">
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-lg bg-surface-container flex items-center justify-center">
<span class="material-symbols-outlined text-primary">confirmation_number</span>
</div>
<div>
<div class="flex items-center gap-2">
<span class="font-label-md text-label-md uppercase tracking-wider">LAUNCHWEEK</span>
<span class="text-label-sm bg-outline-variant text-on-surface-variant px-2 py-0.5 rounded">Draft</span>
</div>
<p class="text-label-sm text-on-surface-variant">25% Off • No expiry</p>
</div>
</div>
<div class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 hover:bg-surface-container rounded-full text-on-surface-variant"><span class="material-symbols-outlined text-[20px]">edit</span></button>
<button class="p-2 hover:bg-error-container/20 rounded-full text-error"><span class="material-symbols-outlined text-[20px]">delete</span></button>
</div>
</div>
</div>
</section>
</div>
<!-- Footer Actions -->
<footer class="mt-stack-lg pt-stack-md border-t border-outline-variant flex items-center justify-between">
<button class="flex items-center gap-2 px-6 py-3 border border-outline text-on-surface rounded-lg font-label-md text-label-md hover:bg-surface-container-high transition-all">
<span class="material-symbols-outlined">arrow_back</span>
                        Previous
                    </button>
<button class="flex items-center gap-2 px-8 py-3 bg-primary text-white rounded-lg font-label-md text-label-md hover:bg-primary-container shadow-sm hover:shadow-md transition-all active:scale-95">
                        Next: Review
                        <span class="material-symbols-outlined">arrow_forward</span>
</button>
</footer>
</div>
</main>
</div>
<!-- Decorative Elements (Ambient Atmospheric Effects) -->
<div class="fixed -bottom-24 -right-24 w-96 h-96 bg-primary/5 rounded-full blur-3xl -z-10"></div>
<div class="fixed top-1/4 -left-12 w-64 h-64 bg-secondary-container/20 rounded-full blur-3xl -z-10"></div>
<script>
        function togglePriceSection(isPaid) {
            const section = document.getElementById('paid-details');
            if (isPaid) {
                section.classList.remove('opacity-40', 'pointer-events-none');
                section.classList.add('opacity-100');
            } else {
                section.classList.add('opacity-40', 'pointer-events-none');
                section.classList.remove('opacity-100');
            }
        }

        function toggleSaleInput() {
            const container = document.getElementById('sale-input-container');
            const toggle = document.getElementById('sale-toggle');
            if (toggle.checked) {
                container.classList.remove('hidden');
                container.classList.add('animate-in', 'fade-in', 'slide-in-from-top-2', 'duration-300');
            } else {
                container.classList.add('hidden');
            }
        }

        // Initialize state
        document.addEventListener('DOMContentLoaded', () => {
            // Check if paid is selected by default
            const paidRadio = document.querySelector('input[value="paid"]');
            if (paidRadio.checked) togglePriceSection(true);
        });
    </script>
</body></html>