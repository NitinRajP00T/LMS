<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Instructor Studio - Review &amp; Publish</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet"/>
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
                        "label-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "display-lg": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-sm": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg": ["Inter"]
                    },
                    "fontSize": {
                        "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                        "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}]
                    }
                }
            }
        }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .soft-lift { box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05); }
        .soft-lift:hover { box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1); transform: translateY(-2px); }
    </style>
</head>
<body class="bg-background text-on-surface">
<!-- TopNavBar -->
<header class="fixed top-0 w-full z-50 flex items-center justify-between px-margin-desktop bg-surface/80 backdrop-blur-md docked full-width top-0 h-[72px] border-b border-outline-variant shadow-sm">
<div class="flex items-center gap-8">
<span class="text-headline-md font-headline-md font-bold text-primary">Instructor Studio</span>
<nav class="hidden md:flex items-center gap-6">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Dashboard</a>
<a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1" href="#">My Courses</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Performance</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Resources</a>
</nav>
</div>
<div class="flex items-center gap-4">
<button class="font-label-md text-label-md text-primary px-4 py-2 rounded-lg hover:bg-primary/5 transition-all">Save Draft</button>
<div class="w-10 h-10 rounded-full overflow-hidden border border-outline-variant">
<img alt="Instructor Profile" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCcYhnDY7Z_YaYYGYB2-u2c885Sxs_5ql-jTMYDEGl2W7CYcRiYKkjP-HS22fgsIuyn_42KCGHRtm3y-pi4dOyshbsD7RzSXQYwKSPUp8UJDHfMcgDKlHXplEVXUWOWlT_ofeFQyKxPVIm-vOqxjEQFLHG4uOiGqdYckFTQ7jrwi5f9V85CrMk7sjCS5wEtjoGsr9Xp8pSFw0uqwaNOLux4OUDn1OqwBhxXX_1UuvD7uxivafjAKWN5B-jQ_U3MnfDyNFowKGruXKPZ"/>
</div>
</div>
</header>
<!-- SideNavBar -->
<aside class="fixed left-0 top-[72px] h-[calc(100vh-72px)] w-64 bg-surface-container-low flex flex-col py-stack-md z-40">
<div class="px-6 mb-8">
<h2 class="text-headline-sm font-headline-sm text-on-surface">Course Wizard</h2>
<p class="text-label-sm font-label-sm text-secondary">Draft Status</p>
</div>
<nav class="flex-1">
<ul class="space-y-1">
<li>
<a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined text-[20px] text-emerald-600" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="font-label-md text-label-md">Basic Info</span>
</a>
</li>
<li>
<a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined text-[20px] text-emerald-600" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="font-label-md text-label-md">Curriculum</span>
</a>
</li>
<li>
<a class="flex items-center gap-3 px-6 py-3 text-on-surface-variant hover:bg-surface-container-high transition-all translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined text-[20px] text-emerald-600" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="font-label-md text-label-md">Pricing</span>
</a>
</li>
<li>
<a class="flex items-center gap-3 px-6 py-4 text-primary font-bold border-r-4 border-primary bg-primary-container/10 transition-all translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined text-[20px]" data-icon="rocket_launch">rocket_launch</span>
<span class="font-label-md text-label-md">Review</span>
</a>
</li>
</ul>
</nav>
<div class="px-6 mt-auto">
<button class="w-full py-3 px-4 border border-secondary text-secondary font-label-md rounded-lg hover:bg-secondary/5 transition-all">Preview Course</button>
</div>
</aside>
<!-- Main Content -->
<main class="ml-64 mt-[72px] p-stack-lg max-w-[1000px] mx-auto min-h-[calc(100vh-72px)]">
<header class="mb-stack-lg">
<h1 class="font-headline-lg text-headline-lg mb-2">Step 4: Review &amp; Publish</h1>
<p class="font-body-lg text-body-lg text-secondary">Verify your course details and get ready to launch to your students.</p>
</header>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Summary Area -->
<div class="lg:col-span-7 space-y-stack-md">
<!-- Section: Basic Info Summary -->
<section class="bg-surface-container-lowest p-stack-md rounded-xl border border-outline-variant/30 soft-lift">
<div class="flex justify-between items-center mb-4">
<h3 class="font-headline-sm text-headline-sm flex items-center gap-2">
<span class="material-symbols-outlined text-primary">info</span> Basic Information
                        </h3>
<button class="text-primary font-label-md hover:underline">Edit</button>
</div>
<div class="space-y-3">
<div>
<span class="text-label-sm text-secondary uppercase tracking-wider">Course Title</span>
<p class="font-body-md text-body-md mt-1 font-semibold">Mastering Modern Web Architecture: From Microservices to Edge</p>
</div>
<div>
<span class="text-label-sm text-secondary uppercase tracking-wider">Category</span>
<p class="font-body-md text-body-md mt-1">Software Engineering &amp; DevOps</p>
</div>
<div>
<span class="text-label-sm text-secondary uppercase tracking-wider">Summary</span>
<p class="font-body-md text-body-md mt-1 text-on-surface-variant">A comprehensive guide for senior engineers transitioning to architectural roles, focusing on scalability, distributed systems, and real-time performance optimization.</p>
</div>
</div>
</section>
<!-- Section: Curriculum Summary -->
<section class="bg-surface-container-lowest p-stack-md rounded-xl border border-outline-variant/30 soft-lift">
<div class="flex justify-between items-center mb-4">
<h3 class="font-headline-sm text-headline-sm flex items-center gap-2">
<span class="material-symbols-outlined text-primary">account_tree</span> Curriculum Overview
                        </h3>
<button class="text-primary font-label-md hover:underline">Edit</button>
</div>
<div class="space-y-4">
<div class="flex items-center justify-between p-3 bg-surface-container-low rounded-lg">
<div class="flex items-center gap-3">
<span class="w-8 h-8 flex items-center justify-center bg-primary/10 rounded-full text-primary font-bold text-sm">01</span>
<span class="font-label-md">Introduction to Architectural Patterns</span>
</div>
<span class="text-label-sm text-secondary">4 Lessons • 45m</span>
</div>
<div class="flex items-center justify-between p-3 bg-surface-container-low rounded-lg">
<div class="flex items-center gap-3">
<span class="w-8 h-8 flex items-center justify-center bg-primary/10 rounded-full text-primary font-bold text-sm">02</span>
<span class="font-label-md">The Microservices Revolution</span>
</div>
<span class="text-label-sm text-secondary">6 Lessons • 1h 20m</span>
</div>
<div class="flex items-center justify-between p-3 bg-surface-container-low rounded-lg">
<div class="flex items-center gap-3">
<span class="w-8 h-8 flex items-center justify-center bg-primary/10 rounded-full text-primary font-bold text-sm">03</span>
<span class="font-label-md">Real-time Data and Event Driven Architecture</span>
</div>
<span class="text-label-sm text-secondary">5 Lessons • 55m</span>
</div>
</div>
</section>
</div>
<!-- Preview & Action Area -->
<div class="lg:col-span-5 space-y-stack-md">
<!-- Course Preview Card -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 soft-lift overflow-hidden">
<div class="aspect-video relative overflow-hidden">
<img alt="Course Thumbnail" class="w-full h-full object-cover rounded-t-xl" data-alt="A professional, high-end digital illustration for an advanced technology course. The composition features abstract blue glowing microchip patterns and geometric data streams set against a deep navy blue background. The aesthetic is sophisticated and corporate modernism, with soft volumetric lighting and premium glass-like textures that reflect a high-trust educational environment." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBbIJqwRG5JzrSNNAdBX7udFaJmUXkEobWc-dTMpCtXFTkNT0_PLgknm4q2oNZtF3eN5hqHyvqrPqct182qpzGx3YIR2fFc39hUv3F0g1G7q9QVOkWQiMKzrh9WPV5PgaXnAZeJAs9UPQaBAYKDGBiBsLeNH0iXNCJl0_5MXcHn1bAoE6dGjh2MP9Xhsr8L969APye3n2fD9I1A8pAGeeLeAePPcqx_22MXQJGTU0MpfMsDWpBEMn5VLd87cckpn5lg1a23ygXWXhDh"/>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex items-end p-4">
<span class="bg-primary px-3 py-1 rounded-full text-white text-[10px] font-bold uppercase tracking-widest">Preview Mode</span>
</div>
</div>
<div class="p-stack-md">
<h4 class="font-headline-sm text-headline-sm mb-2">Mastering Modern Web Architecture</h4>
<div class="flex items-center gap-2 mb-4">
<img alt="Instructor" class="w-6 h-6 rounded-full" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3yw_tge-5eHBNo2Mrbfmb2j2cCwvY1e4kzNbWbLvN7NOL3cOOMI3gQzcJnrJkpNP7PjPSoVsqq8VJTn7k-ZInf6cs9rjn7PmTnqfP0Vpyn3KU5bYKgn0FUM0Tn-ywNxbeNwtep3Hf8zCCxrWPU_d2hAac5PAzJMcUpGu7W70cpkgq-kn5ZxCvQxFOFwQuGF-yzLufIWWEl9ME2CZ3Q7FSOdmVRkELRiZkJpTb-By746gib9wOcguwUrihpABCVO49psQZbQKUjlhu"/>
<span class="text-label-sm text-secondary">By Felix Archi</span>
</div>
<div class="flex items-center justify-between border-t border-outline-variant/30 pt-4">
<div class="flex items-center gap-2">
<span class="font-headline-md text-primary">$149.00</span>
<span class="text-label-sm text-secondary line-through">$299.00</span>
</div>
<span class="bg-emerald-100 text-emerald-700 px-2 py-1 rounded-md text-label-sm font-semibold">50% OFF</span>
</div>
</div>
</div>
<!-- Checklist -->
<div class="bg-surface-container-low p-stack-md rounded-xl border border-outline-variant/30">
<h5 class="font-label-md text-label-md mb-4 uppercase tracking-widest text-secondary">Launch Readiness</h5>
<ul class="space-y-4">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-emerald-600 mt-0.5" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<div>
<p class="font-label-md leading-tight">Basic Info complete</p>
<p class="text-label-sm text-secondary">Title, category, and description are set.</p>
</div>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-emerald-600 mt-0.5" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<div>
<p class="font-label-md leading-tight">Curriculum finalized</p>
<p class="text-label-sm text-secondary">All 15 lessons have content and titles.</p>
</div>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-emerald-600 mt-0.5" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<div>
<p class="font-label-md leading-tight">Pricing strategy set</p>
<p class="text-label-sm text-secondary">Tiers and discounts are configured.</p>
</div>
</li>
</ul>
</div>
<!-- Actions -->
<div class="space-y-3 pt-4">
<button class="w-full bg-primary text-white py-4 rounded-lg font-headline-sm text-headline-sm hover:bg-on-primary-fixed-variant transition-all flex items-center justify-center gap-2 shadow-lg shadow-primary/20" id="publishBtn">
<span class="material-symbols-outlined">publish</span> Publish Course
                    </button>
<button class="w-full bg-surface-container-highest text-primary py-4 rounded-lg font-label-md text-label-md hover:bg-surface-container-high transition-all">
                        Save as Draft
                    </button>
<p class="text-[10px] text-center text-secondary px-6 leading-relaxed">
                        By clicking "Publish", you agree to the Instructor Studio Terms of Service and content quality guidelines.
                    </p>
</div>
</div>
</div>
</main>
<script>
        // Simple Interaction for Publish Button
        const publishBtn = document.getElementById('publishBtn');
        publishBtn.addEventListener('click', () => {
            const originalText = publishBtn.innerHTML;
            publishBtn.innerHTML = '<span class="animate-spin material-symbols-outlined">sync</span> Processing...';
            publishBtn.disabled = true;
            publishBtn.classList.add('opacity-80');

            setTimeout(() => {
                publishBtn.innerHTML = '<span class="material-symbols-outlined">done_all</span> Live Now!';
                publishBtn.classList.remove('bg-primary');
                publishBtn.classList.add('bg-emerald-600');
                
                // Add confetti-like celebration if desired
                console.log("Course Published Successfully");
            }, 2000);
        });
    </script>
</body></html>