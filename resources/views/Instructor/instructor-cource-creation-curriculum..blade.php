<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Curriculum Builder - Instructor Studio</title>
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            line-height: 1;
            text-transform: none;
            letter-spacing: normal;
            word-wrap: normal;
            white-space: nowrap;
            direction: ltr;
        }
        .soft-lift {
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
            transition: all 0.3s ease;
        }
        .soft-lift:hover {
            box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1);
            transform: translateY(-2px);
        }
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-primary-container selection:text-white">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full z-50 flex items-center justify-between px-margin-desktop bg-surface/80 backdrop-blur-md docked full-width h-[72px] border-b border-outline-variant shadow-sm">
<div class="flex items-center gap-stack-lg">
<span class="text-headline-md font-headline-md font-bold text-primary">Instructor Studio</span>
<div class="hidden md:flex items-center gap-gutter">
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-150" href="#">Dashboard</a>
<a class="font-label-md text-label-md text-primary border-b-2 border-primary pb-1" href="#">My Courses</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-150" href="#">Performance</a>
<a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors duration-150" href="#">Resources</a>
</div>
</div>
<div class="flex items-center gap-stack-md">
<button class="px-gutter py-stack-sm rounded-lg font-label-md text-label-md text-secondary border border-outline hover:bg-surface-container-high transition-all">Save Draft</button>
<div class="w-10 h-10 rounded-full bg-surface-container-highest flex items-center justify-center overflow-hidden">
<img alt="Instructor Profile" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCm4EBdlJ9xhZXu0hotVr24-ev_qskNEl9fRK5yx92mpZMLjqYpj97TFy1bLuL-2x4Qlt-Bzp2WzPLwTmOEDhKPi2Kmbzy6VSsIS1AY_odHlJbNpeUc_QcIQiGmkfxLQqWnf1JZjObJGgu0XVwV-Bjy7TIkrm0QZHGD_MBkDcEPSKEKXFViZy6PRzLuR7uemGSWBYcDSIP6npuh9Xjy7OwfrbOQ8ccCoKAOXL00UAI8ZgohwZ1NlBwbxbLWlzkxktssPaW-fgQwPTFH"/>
</div>
</div>
</nav>
<div class="flex pt-[72px] h-screen overflow-hidden">
<!-- SideNavBar -->
<aside class="fixed left-0 top-[72px] h-[calc(100vh-72px)] w-64 bg-surface-container-low flex flex-col py-stack-md">
<div class="px-stack-md mb-stack-lg">
<h2 class="font-headline-sm text-headline-sm text-on-surface">Course Wizard</h2>
<p class="font-label-sm text-label-sm text-on-surface-variant opacity-70">Draft Status: Curriculum</p>
</div>
<nav class="flex-grow flex flex-col">
<!-- Basic Info (Completed) -->
<div class="flex items-center px-stack-md py-4 gap-stack-sm text-on-surface-variant hover:bg-surface-container-high transition-all cursor-pointer">
<span class="material-symbols-outlined text-emerald-500" style="font-variation-settings: 'FILL' 1;">check_circle</span>
<span class="font-label-md text-label-md">Basic Info</span>
</div>
<!-- Curriculum (Active) -->
<div class="flex items-center px-stack-md py-4 gap-stack-sm text-primary font-bold border-r-4 border-primary bg-primary-container/10 translate-x-1 duration-200 cursor-default">
<span class="material-symbols-outlined" data-icon="account_tree">account_tree</span>
<span class="font-label-md text-label-md">Curriculum</span>
</div>
<!-- Pricing -->
<div class="flex items-center px-stack-md py-4 gap-stack-sm text-on-surface-variant hover:bg-surface-container-high transition-all cursor-pointer">
<span class="material-symbols-outlined" data-icon="payments">payments</span>
<span class="font-label-md text-label-md">Pricing</span>
</div>
<!-- Review -->
<div class="flex items-center px-stack-md py-4 gap-stack-sm text-on-surface-variant hover:bg-surface-container-high transition-all cursor-pointer">
<span class="material-symbols-outlined" data-icon="rocket_launch">rocket_launch</span>
<span class="font-label-md text-label-md">Review</span>
</div>
</nav>
<div class="px-stack-md mt-auto">
<button class="w-full bg-primary text-white py-stack-sm rounded-lg font-label-md text-label-md shadow-sm hover:bg-primary-container transition-all">Preview Course</button>
</div>
</aside>
<!-- Main Content Area -->
<main class="ml-64 flex-grow overflow-y-auto custom-scrollbar bg-white">
<div class="max-w-[800px] mx-auto py-stack-lg px-gutter">
<!-- Page Header -->
<header class="mb-stack-lg">
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Build your curriculum</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Start putting together your course by creating sections, lectures and quizzes. Drag and drop to reorder.</p>
</header>
<!-- Curriculum Builder Container -->
<div class="space-y-gutter">
<!-- Section 1: Introduction -->
<section class="border border-outline-variant rounded-xl overflow-hidden soft-lift bg-white">
<div class="bg-surface-container-low px-gutter py-4 flex items-center justify-between border-b border-outline-variant">
<div class="flex items-center gap-stack-sm">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="drag_indicator">drag_indicator</span>
<h3 class="font-headline-sm text-headline-sm flex items-center gap-2">
<span class="text-on-surface-variant font-medium">Section 1:</span> Introduction
                                </h3>
<button class="p-1 hover:bg-surface-container-high rounded transition-colors">
<span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
</button>
</div>
<button class="p-2 hover:bg-error-container/20 rounded-full transition-colors group">
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-error" data-icon="delete">delete</span>
</button>
</div>
<div class="p-gutter space-y-stack-sm">
<!-- Lecture 1 -->
<div class="flex items-center justify-between p-stack-sm bg-white border border-outline-variant rounded-lg hover:border-primary transition-all group">
<div class="flex items-center gap-stack-sm">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="drag_indicator">drag_indicator</span>
<span class="material-symbols-outlined text-primary" data-icon="video_library">video_library</span>
<span class="font-label-md text-label-md">Welcome to the course</span>
</div>
<div class="flex items-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="text-label-sm font-label-sm text-primary hover:underline">+ Content</button>
<span class="material-symbols-outlined text-[18px] text-on-surface-variant cursor-pointer" data-icon="edit">edit</span>
</div>
</div>
<!-- Lecture 2 -->
<div class="flex items-center justify-between p-stack-sm bg-white border border-outline-variant rounded-lg hover:border-primary transition-all group">
<div class="flex items-center gap-stack-sm">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="drag_indicator">drag_indicator</span>
<span class="material-symbols-outlined text-secondary" data-icon="article">article</span>
<span class="font-label-md text-label-md">What you will learn</span>
</div>
<div class="flex items-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="text-label-sm font-label-sm text-primary hover:underline">+ Content</button>
<span class="material-symbols-outlined text-[18px] text-on-surface-variant cursor-pointer" data-icon="edit">edit</span>
</div>
</div>
<!-- Add Lecture UI -->
<button class="w-full border-2 border-dashed border-outline-variant py-4 rounded-lg flex items-center justify-center gap-2 text-on-surface-variant hover:border-primary hover:text-primary hover:bg-primary-container/5 transition-all group">
<span class="material-symbols-outlined" data-icon="add_circle">add_circle</span>
<span class="font-label-md text-label-md">Add Lecture</span>
</button>
</div>
</section>
<!-- Section 2: Getting Started -->
<section class="border border-outline-variant rounded-xl overflow-hidden soft-lift bg-white">
<div class="bg-surface-container-low px-gutter py-4 flex items-center justify-between border-b border-outline-variant">
<div class="flex items-center gap-stack-sm">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="drag_indicator">drag_indicator</span>
<h3 class="font-headline-sm text-headline-sm flex items-center gap-2">
<span class="text-on-surface-variant font-medium">Section 2:</span> Getting Started
                                </h3>
<button class="p-1 hover:bg-surface-container-high rounded transition-colors">
<span class="material-symbols-outlined text-[18px]" data-icon="edit">edit</span>
</button>
</div>
<button class="p-2 hover:bg-error-container/20 rounded-full transition-colors group">
<span class="material-symbols-outlined text-on-surface-variant group-hover:text-error" data-icon="delete">delete</span>
</button>
</div>
<div class="p-gutter">
<!-- Empty State / Add Lecture Active State Mockup -->
<div class="bg-surface-container-lowest border border-outline-variant rounded-lg p-stack-md">
<p class="font-label-sm text-label-sm text-on-surface-variant mb-4 uppercase tracking-wider">Select Content Type</p>
<div class="grid grid-cols-3 gap-stack-sm">
<button class="flex flex-col items-center gap-2 p-4 rounded-lg border border-outline-variant hover:border-primary hover:bg-primary-container/5 transition-all group">
<div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary group-hover:scale-110 duration-200">
<span class="material-symbols-outlined" data-icon="play_circle" style="font-variation-settings: 'FILL' 1;">play_circle</span>
</div>
<span class="font-label-md text-label-md">Video</span>
</button>
<button class="flex flex-col items-center gap-2 p-4 rounded-lg border border-outline-variant hover:border-primary hover:bg-primary-container/5 transition-all group">
<div class="w-10 h-10 rounded-full bg-secondary/10 flex items-center justify-center text-secondary group-hover:scale-110 duration-200">
<span class="material-symbols-outlined" data-icon="quiz">quiz</span>
</div>
<span class="font-label-md text-label-md">Quiz</span>
</button>
<button class="flex flex-col items-center gap-2 p-4 rounded-lg border border-outline-variant hover:border-primary hover:bg-primary-container/5 transition-all group">
<div class="w-10 h-10 rounded-full bg-tertiary/10 flex items-center justify-center text-tertiary group-hover:scale-110 duration-200">
<span class="material-symbols-outlined" data-icon="description">description</span>
</div>
<span class="font-label-md text-label-md">Text</span>
</button>
</div>
</div>
</div>
</section>
<!-- Add Section Global Button -->
<button class="w-full py-stack-md flex items-center justify-center gap-2 text-primary font-label-md text-label-md border-2 border-primary border-dashed rounded-xl hover:bg-primary/5 transition-colors">
<span class="material-symbols-outlined" data-icon="add">add</span>
                        Add New Section
                    </button>
</div>
<!-- Sticky Footer Actions -->
<div class="mt-stack-lg pt-stack-lg border-t border-outline-variant flex items-center justify-between">
<button class="flex items-center gap-2 px-gutter py-stack-sm text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors">
<span class="material-symbols-outlined" data-icon="arrow_back">arrow_back</span>
                        Previous
                    </button>
<button class="bg-primary text-white px-stack-lg py-stack-sm rounded-lg font-label-md text-label-md shadow-md hover:bg-primary-container transition-all flex items-center gap-2">
                        Next: Pricing
                        <span class="material-symbols-outlined" data-icon="arrow_forward">arrow_forward</span>
</button>
</div>
</div>
</main>
</div>
<script>
        // Simple interactivity for demonstration
        document.querySelectorAll('button').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (this.innerText.includes('Add')) {
                    console.log('Action: ' + this.innerText.trim());
                    this.classList.add('scale-95');
                    setTimeout(() => this.classList.remove('scale-95'), 150);
                }
            });
        });

        // Simulating some drag and drop hover states
        const sections = document.querySelectorAll('section');
        sections.forEach(section => {
            section.addEventListener('mouseenter', () => {
                section.querySelector('.material-symbols-outlined[data-icon="drag_indicator"]').style.color = '#004ac6';
            });
            section.addEventListener('mouseleave', () => {
                section.querySelector('.material-symbols-outlined[data-icon="drag_indicator"]').style.color = '';
            });
        });
    </script>
</body></html>