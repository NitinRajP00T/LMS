<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Instructor Studio - Course Wizard</title>
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
                        "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}],
                        "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}]
                    }
                },
            },
        }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    </style>
</head>
<body class="bg-surface text-on-surface">
<!-- TopNavBar -->
<header class="fixed top-0 w-full z-50 flex items-center justify-between px-margin-desktop bg-surface/80 backdrop-blur-md docked full-width h-[72px] border-b border-outline-variant shadow-sm">
<div class="flex items-center gap-stack-lg">
<span class="text-headline-md font-headline-md font-bold text-primary">Instructor Studio</span>
<nav class="hidden md:flex gap-gutter">
<a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1 hover:text-primary transition-colors" href="#">Dashboard</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">My Courses</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Performance</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors" href="#">Resources</a>
</nav>
</div>
<div class="flex items-center gap-stack-sm">
<button class="px-gutter py-2 text-primary font-label-md text-label-md hover:bg-primary/5 rounded-lg transition-all scale-95 duration-150">Save Draft</button>
<div class="w-10 h-10 rounded-full overflow-hidden bg-outline-variant">
<img alt="Instructor Profile" class="w-full h-full object-cover" data-alt="A professional headshot of a mature corporate instructor wearing a navy blazer and a friendly expression. The background is a softly blurred office setting with high-key lighting, maintaining the clean and premium educational marketplace aesthetic. The lighting is soft and even, highlighting a professional and trustworthy persona." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAO94L7mxMMvb13EFcgVOnLrlJPv7SiCtId89r2uSvyDET3WM0ZFWsMmgRMOygk01LqeFFqVxEe9f-LKtu4LbW8V4z7NZw8WBofxXBWCZDsMb5lR--wEvuOXIPdS9u-k2yLVLTbEpUa1Jc0NsVdTZUgjmtigqoKbm06GROQgBrlUQnqKVIPtu6pn1j2ZB3IP2HnJqAVxVk8m0x8lNK5u0koj5s111fbr0ULVK0qfrZIVYBjzpB6cUZvsHqX-kaFLxTAQLHwXBjttUPh"/>
</div>
</div>
</header>
<div class="flex pt-[72px] min-h-screen">
<!-- SideNavBar -->
<aside class="fixed left-0 top-[72px] h-[calc(100vh-72px)] flex flex-col py-stack-md docked left-0 w-64 bg-surface-container-low border-r border-outline-variant/30">
<div class="px-6 mb-8">
<h2 class="text-headline-sm font-headline-sm text-on-surface">Course Wizard</h2>
<p class="text-label-sm font-label-sm text-on-surface-variant opacity-70">Draft Status</p>
</div>
<nav class="flex-1">
<ul class="space-y-1">
<li>
<a class="flex items-center gap-4 px-6 py-4 text-primary font-bold border-r-4 border-primary bg-primary-container/10 translate-x-1 duration-200" href="#">
<span class="material-symbols-outlined" data-icon="info">info</span>
<span class="font-label-md text-label-md">Basic Info</span>
</a>
</li>
<li>
<a class="flex items-center gap-4 px-6 py-4 text-on-surface-variant hover:bg-surface-container-high transition-all" href="#">
<span class="material-symbols-outlined" data-icon="account_tree">account_tree</span>
<span class="font-label-md text-label-md">Curriculum</span>
</a>
</li>
<li>
<a class="flex items-center gap-4 px-6 py-4 text-on-surface-variant hover:bg-surface-container-high transition-all" href="#">
<span class="material-symbols-outlined" data-icon="payments">payments</span>
<span class="font-label-md text-label-md">Pricing</span>
</a>
</li>
<li>
<a class="flex items-center gap-4 px-6 py-4 text-on-surface-variant hover:bg-surface-container-high transition-all" href="#">
<span class="material-symbols-outlined" data-icon="rocket_launch">rocket_launch</span>
<span class="font-label-md text-label-md">Review</span>
</a>
</li>
</ul>
</nav>
<div class="px-6 py-stack-md border-t border-outline-variant/30">
<button class="w-full py-3 px-4 bg-white border border-outline rounded-lg text-primary font-label-md text-label-md hover:shadow-md transition-all flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-[20px]" data-icon="visibility">visibility</span>
                    Preview Course
                </button>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 ml-64 p-stack-lg bg-surface">
<div class="max-w-[800px] mx-auto">
<div class="mb-stack-lg">
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Basic Course Information</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Provide the fundamental details of your course to help students understand what they will learn.</p>
</div>
<!-- Bento-style Form Grid -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter">
<!-- Title & Subtitle Card -->
<div class="md:col-span-12 p-stack-md bg-white rounded-xl border border-outline-variant/30 shadow-[0px_4px_20px_rgba(15,23,42,0.05)]">
<div class="space-y-stack-md">
<div>
<label class="block font-label-md text-label-md text-on-surface mb-2">Course Title</label>
<input class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none font-body-md" placeholder="e.g. Advanced Financial Modeling for SaaS" type="text"/>
<p class="mt-2 text-label-sm font-label-sm text-on-surface-variant">Your title should be catchy and informative. (Max 60 chars)</p>
</div>
<div>
<label class="block font-label-md text-label-md text-on-surface mb-2">Course Subtitle</label>
<input class="w-full px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none font-body-md" placeholder="e.g. Master unit economics, LTV, and churn analysis in Excel" type="text"/>
</div>
</div>
</div>
<!-- Category & Meta -->
<div class="md:col-span-4 p-stack-md bg-white rounded-xl border border-outline-variant/30 shadow-[0px_4px_20px_rgba(15,23,42,0.05)] flex flex-col justify-center">
<label class="block font-label-md text-label-md text-on-surface mb-2">Category</label>
<div class="relative">
<select class="w-full appearance-none px-4 py-3 border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none font-body-md bg-transparent">
<option>Finance &amp; Accounting</option>
<option>Business Strategy</option>
<option>Software Development</option>
<option>Design &amp; UX</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-on-surface-variant">expand_more</span>
</div>
</div>
<!-- Description Area -->
<div class="md:col-span-8 p-stack-md bg-white rounded-xl border border-outline-variant/30 shadow-[0px_4px_20px_rgba(15,23,42,0.05)]">
<label class="block font-label-md text-label-md text-on-surface mb-2">Course Description</label>
<div class="border border-outline-variant rounded-lg overflow-hidden">
<div class="bg-surface-container-low border-b border-outline-variant px-3 py-2 flex gap-3">
<button class="p-1 hover:bg-white rounded transition-colors"><span class="material-symbols-outlined text-[20px]" data-icon="format_bold">format_bold</span></button>
<button class="p-1 hover:bg-white rounded transition-colors"><span class="material-symbols-outlined text-[20px]" data-icon="format_italic">format_italic</span></button>
<button class="p-1 hover:bg-white rounded transition-colors"><span class="material-symbols-outlined text-[20px]" data-icon="format_list_bulleted">format_list_bulleted</span></button>
<button class="p-1 hover:bg-white rounded transition-colors"><span class="material-symbols-outlined text-[20px]" data-icon="link">link</span></button>
</div>
<textarea class="w-full px-4 py-3 outline-none font-body-md resize-none" placeholder="Explain what students will learn and why they should take this course..." rows="4"></textarea>
</div>
</div>
<!-- Image Upload -->
<div class="md:col-span-12 p-stack-md bg-white rounded-xl border border-outline-variant/30 shadow-[0px_4px_20px_rgba(15,23,42,0.05)]">
<label class="block font-label-md text-label-md text-on-surface mb-4">Course Cover Image</label>
<div class="flex flex-col md:flex-row gap-gutter">
<div class="md:w-1/2 aspect-video rounded-xl bg-surface-container relative overflow-hidden group cursor-pointer border-2 border-dashed border-outline-variant hover:border-primary transition-all">
<div class="absolute inset-0 flex flex-col items-center justify-center text-on-surface-variant p-6 text-center">
<span class="material-symbols-outlined text-[48px] mb-2 text-primary/40" data-icon="image">image</span>
<p class="font-label-md text-label-md mb-1">Upload your course image</p>
<p class="font-label-sm text-label-sm opacity-60">1280x720 pixels (16:9 ratio)</p>
</div>
<input class="absolute inset-0 opacity-0 cursor-pointer" type="file"/>
</div>
<div class="md:w-1/2 flex flex-col justify-center">
<p class="font-body-md text-body-md text-on-surface-variant mb-4">
                                    A high-quality image increases course enrollment by up to 80%. Ensure your image is clear, professional, and free of excessive text.
                                </p>
<div class="flex items-center gap-3 p-3 bg-primary-container/5 rounded-lg border border-primary/10">
<span class="material-symbols-outlined text-primary" data-icon="tips_and_updates">tips_and_updates</span>
<p class="font-label-sm text-label-sm text-primary">Pro tip: Use high-contrast images with a central focal point.</p>
</div>
</div>
</div>
</div>
</div>
<!-- Sticky Bottom Action Bar -->
<div class="mt-stack-lg flex items-center justify-between py-6 border-t border-outline-variant/30">
<div class="flex items-center gap-2 text-on-surface-variant">
<span class="material-symbols-outlined text-[20px]" data-icon="check_circle">check_circle</span>
<span class="font-label-md text-label-md">Draft automatically saved at 10:45 AM</span>
</div>
<div class="flex items-center gap-stack-sm">
<button class="px-gutter py-3 border border-outline rounded-lg font-label-md text-label-md text-secondary hover:bg-surface-container transition-all">
                            Save Draft
                        </button>
<button class="px-stack-lg py-3 bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:bg-primary-container shadow-md hover:shadow-lg transition-all flex items-center gap-2">
                            Next: Curriculum
                            <span class="material-symbols-outlined text-[18px]" data-icon="arrow_forward">arrow_forward</span>
</button>
</div>
</div>
</div>
</main>
</div>
<!-- Background Decoration -->
<div class="fixed top-0 right-0 -z-10 w-1/3 h-screen opacity-10 pointer-events-none">
<svg class="w-full h-full" preserveaspectratio="none" viewbox="0 0 100 100">
<defs>
<lineargradient id="grad1" x1="0%" x2="100%" y1="0%" y2="100%">
<stop offset="0%" style="stop-color:var(--tw-color-primary);stop-opacity:1"></stop>
<stop offset="100%" style="stop-color:transparent;stop-opacity:0"></stop>
</lineargradient>
</defs>
<circle cx="100" cy="0" fill="url(#grad1)" r="80"></circle>
</svg>
</div>
<script>
        // Micro-interaction for form focus states
        const inputs = document.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.closest('.rounded-xl')?.classList.add('ring-2', 'ring-primary/5');
            });
            input.addEventListener('blur', () => {
                input.parentElement.closest('.rounded-xl')?.classList.remove('ring-2', 'ring-primary/5');
            });
        });

        // Simple tab navigation simulation for visual feedback
        const navItems = document.querySelectorAll('aside nav a');
        navItems.forEach(item => {
            item.addEventListener('click', (e) => {
                if(!item.classList.contains('text-primary')) {
                    e.preventDefault();
                    // Just visual feedback for prototype
                    item.style.opacity = '0.5';
                    setTimeout(() => item.style.opacity = '1', 200);
                }
            });
        });
    </script>
</body></html>