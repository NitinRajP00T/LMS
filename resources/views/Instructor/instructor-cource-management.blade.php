<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Instructor Studio - My Courses</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "outline-variant": "#c3c6d7",
                        "on-tertiary-fixed-variant": "#444749",
                        "error-container": "#ffdad6",
                        "on-background": "#0b1c30",
                        "on-secondary-fixed": "#131b2e",
                        "on-secondary-container": "#5c647a",
                        "surface-container-highest": "#d3e4fe",
                        "surface-container-lowest": "#ffffff",
                        "inverse-surface": "#213145",
                        "surface-tint": "#0053db",
                        "primary": "#004ac6",
                        "on-secondary": "#ffffff",
                        "tertiary-fixed-dim": "#c4c7c9",
                        "tertiary-fixed": "#e0e3e5",
                        "inverse-primary": "#b4c5ff",
                        "tertiary-container": "#6b6e70",
                        "tertiary": "#525657",
                        "surface-variant": "#d3e4fe",
                        "on-tertiary": "#ffffff",
                        "surface-container": "#e5eeff",
                        "on-tertiary-container": "#eff1f3",
                        "on-surface-variant": "#434655",
                        "surface-dim": "#cbdbf5",
                        "on-secondary-fixed-variant": "#3f465c",
                        "on-primary-fixed": "#00174b",
                        "surface": "#f8f9ff",
                        "error": "#ba1a1a",
                        "inverse-on-surface": "#eaf1ff",
                        "surface-bright": "#f8f9ff",
                        "on-primary-fixed-variant": "#003ea8",
                        "secondary-fixed-dim": "#bec6e0",
                        "on-error-container": "#93000a",
                        "surface-container-high": "#dce9ff",
                        "secondary-fixed": "#dae2fd",
                        "on-error": "#ffffff",
                        "on-primary": "#ffffff",
                        "on-tertiary-fixed": "#191c1e",
                        "on-primary-container": "#eeefff",
                        "secondary-container": "#dae2fd",
                        "outline": "#737686",
                        "primary-fixed-dim": "#b4c5ff",
                        "primary-fixed": "#dbe1ff",
                        "on-surface": "#0b1c30",
                        "background": "#f8f9ff",
                        "surface-container-low": "#eff4ff",
                        "primary-container": "#2563eb",
                        "secondary": "#565e74"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "stack-lg": "48px",
                        "gutter": "24px",
                        "container-max": "1280px",
                        "stack-sm": "12px",
                        "stack-md": "24px",
                        "margin-desktop": "32px",
                        "base": "8px",
                        "margin-mobile": "16px"
                    },
                    "fontFamily": {
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "headline-sm": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "display-lg": ["Inter"],
                        "body-md": ["Inter"]
                    },
                    "fontSize": {
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                        "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                        "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}],
                        "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}]
                    }
                }
            }
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .soft-lift {
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
            transition: all 0.3s ease;
        }
        .soft-lift:hover {
            box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1);
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md antialiased">
<!-- TopNavBar Component -->
<nav class="fixed top-0 w-full h-[72px] bg-white/80 dark:bg-surface-container-low/80 backdrop-blur-md border-b border-outline-variant/30 shadow-sm z-50">
<div class="flex justify-between items-center px-margin-desktop max-w-container-max mx-auto h-full">
<div class="flex items-center gap-stack-md">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface dark:text-surface-bright">Instructor Studio</span>
<div class="hidden md:flex gap-6 ml-8">
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors duration-200" href="#">Dashboard</a>
<a class="font-body-md text-body-md text-primary font-bold border-b-2 border-primary pb-1" href="#">My Courses</a>
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors duration-200" href="#">Performance</a>
<a class="font-body-md text-body-md text-secondary hover:text-primary transition-colors duration-200" href="#">Resources</a>
</div>
</div>
<div class="flex items-center gap-4">
<button class="hidden md:block px-4 py-2 text-primary font-label-md border border-primary rounded-lg hover:bg-surface-container transition-all active:scale-95">Public View</button>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined p-2 text-secondary hover:bg-surface-container-low rounded-full cursor-pointer">notifications</span>
<span class="material-symbols-outlined p-2 text-secondary hover:bg-surface-container-low rounded-full cursor-pointer">help</span>
</div>
<img alt="Instructor profile picture" class="w-10 h-10 rounded-full border border-outline-variant/50" data-alt="A professional headshot of a middle-aged academic instructor with a warm, confident expression. He is wearing a charcoal suit over a crisp white shirt, set against a blurred background of a modern library with soft, natural lighting. The image evokes a sense of high-trust expertise and premium educational quality, fitting a corporate modernism aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBe_ESlBM81HTf8H8oCf56XMduTUh-Yg-ypwrbd2CImR2YggV6FtRgvGXHqqbBjkWuQ9aw84NB2ZBzIh1xzITTAiF_vvv5xcw8vyEBrgILpAk-5HxPvWyIdZFz8cL3UO1gJC8vf2RrLTU2zVYePI1gcgPCT6duHj22Typ0H0QtnzEDo9uzQK2UQOvZ01Aquh7wopuA_S_S_EeI5hy-QbV69A49h7lm-876X0JDQA_QM4vlc7emZ13a1Tr5zSeRCFMsnLhXVwndByJo8"/>
</div>
</div>
</nav>
<!-- Main Content Canvas -->
<main class="pt-[120px] pb-stack-lg px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto min-h-screen">
<!-- Header & Primary Action -->
<header class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-stack-md">
<div>
<h1 class="font-headline-lg text-headline-lg md:text-headline-lg text-on-background">My Courses</h1>
<p class="text-on-surface-variant font-body-md mt-1">Manage, edit, and track the performance of your curriculum.</p>
</div>
<button class="bg-primary text-white font-label-md px-6 py-3 rounded-lg flex items-center gap-2 hover:bg-primary-container transition-all shadow-md active:scale-95">
<span class="material-symbols-outlined">add</span>
                Create New Course
            </button>
</header>
<!-- Filters & Search Bento Area -->
<div class="bg-white rounded-xl p-4 md:p-6 mb-stack-md flex flex-col md:flex-row gap-4 items-center border border-outline-variant/20 shadow-sm">
<div class="relative w-full md:w-96">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">search</span>
<input class="w-full pl-10 pr-4 py-2.5 bg-surface-bright border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none text-body-md transition-all" placeholder="Search by course title..." type="text"/>
</div>
<div class="flex items-center gap-2 w-full md:w-auto">
<select class="bg-white border border-outline-variant rounded-lg px-4 py-2.5 text-label-md text-on-surface-variant outline-none focus:border-primary cursor-pointer w-full md:w-auto">
<option value="">All Status</option>
<option value="published">Published</option>
<option value="draft">Draft</option>
<option value="archived">Archived</option>
</select>
<select class="bg-white border border-outline-variant rounded-lg px-4 py-2.5 text-label-md text-on-surface-variant outline-none focus:border-primary cursor-pointer w-full md:w-auto">
<option value="recent">Recently Updated</option>
<option value="enrollment">Highest Enrollment</option>
<option value="rating">Top Rated</option>
</select>
</div>
<div class="ml-auto hidden md:flex items-center gap-1 text-on-surface-variant">
<span class="text-label-sm uppercase tracking-wider font-semibold mr-2">View:</span>
<button class="p-2 bg-surface-container rounded-md text-primary">
<span class="material-symbols-outlined">format_list_bulleted</span>
</button>
<button class="p-2 hover:bg-surface-container-low rounded-md transition-colors">
<span class="material-symbols-outlined">grid_view</span>
</button>
</div>
</div>
<!-- Course List (Table Style for Desktop, Cards for Mobile) -->
<div class="bg-white border border-outline-variant/20 rounded-xl overflow-hidden shadow-sm">
<div class="hidden md:grid grid-cols-12 gap-4 px-6 py-4 bg-surface-container-low border-b border-outline-variant/30 text-label-md text-on-surface-variant uppercase tracking-wider">
<div class="col-span-5">Course Title</div>
<div class="col-span-2 text-center">Status</div>
<div class="col-span-3 text-center">Metrics</div>
<div class="col-span-2 text-right">Actions</div>
</div>
<!-- Course Item 1 -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-4 px-4 md:px-6 py-6 border-b border-outline-variant/10 hover:bg-surface/50 transition-colors items-center">
<div class="col-span-5 flex items-center gap-4">
<div class="w-24 aspect-[16/9] rounded-lg overflow-hidden flex-shrink-0 border border-outline-variant/20">
<img alt="Course thumbnail" class="w-full h-full object-cover" data-alt="A clean, top-down photograph of a high-end workspace featuring a modern laptop, a sleek fountain pen, and an organized leather notebook on a light marble surface. The lighting is bright and airy, using a high-key light mode style. The image represents professional productivity and structured executive learning, with subtle blue and white tones to match the UI." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmFxE-vpc7lUAZ8F-ioaTOCyxMYoFkF-RfTdIZfvFRMd8HlC05hhceqrecUZnojXyeJdPAT5gItts2R1ctHXT_5pgOX3t2RJUTbGUHYUSYvSA4DgbG9Z6sxFFtHCUoyQNgf8aJq3WCt-cHQvkdca0VBB3WdV8iWKz1_-8g4jFfh11rlXywtgTWMUEMVCcQPU1H4yXe1mEwLTO7PeWv8WhMwO4POk5KNB5jDDt9HCLvzEVU_zbkuvoFdAH4sbFrZGBawmpZww8RLTN2"/>
</div>
<div>
<h3 class="font-headline-sm text-on-background">Executive Leadership 2.0: Strategic Decision Making</h3>
<p class="text-label-sm text-on-surface-variant mt-1">Last updated: Oct 12, 2024</p>
</div>
</div>
<div class="col-span-2 flex justify-start md:justify-center">
<span class="px-3 py-1 bg-green-100 text-green-700 rounded-full font-label-sm flex items-center gap-1">
<span class="w-1.5 h-1.5 bg-green-700 rounded-full"></span>
                        Published
                    </span>
</div>
<div class="col-span-3 grid grid-cols-3 gap-2 text-center">
<div>
<p class="text-label-md font-bold">1,248</p>
<p class="text-[10px] text-on-surface-variant uppercase">Students</p>
</div>
<div>
<p class="text-label-md font-bold flex items-center justify-center gap-0.5">4.9 <span class="material-symbols-outlined text-[14px] text-yellow-500" style="font-variation-settings: 'FILL' 1;">star</span></p>
<p class="text-[10px] text-on-surface-variant uppercase">Rating</p>
</div>
<div>
<p class="text-label-md font-bold text-primary">$199.00</p>
<p class="text-[10px] text-on-surface-variant uppercase">Price</p>
</div>
</div>
<div class="col-span-2 flex justify-end gap-2">
<button class="p-2 text-secondary hover:text-primary hover:bg-surface-container rounded-lg transition-all" title="Edit Course">
<span class="material-symbols-outlined">edit</span>
</button>
<button class="p-2 text-secondary hover:text-primary hover:bg-surface-container rounded-lg transition-all" title="View Public Page">
<span class="material-symbols-outlined">visibility</span>
</button>
<div class="relative group">
<button class="p-2 text-secondary hover:text-primary hover:bg-surface-container rounded-lg transition-all">
<span class="material-symbols-outlined">more_vert</span>
</button>
<div class="absolute right-0 top-full mt-2 w-48 bg-white border border-outline-variant/30 shadow-lg rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-20 overflow-hidden">
<button class="w-full px-4 py-2.5 text-left text-label-md hover:bg-surface-container-low flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">unpublished</span> Unpublish
                            </button>
<button class="w-full px-4 py-2.5 text-left text-label-md hover:bg-surface-container-low flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">content_copy</span> Duplicate
                            </button>
<div class="border-t border-outline-variant/20"></div>
<button class="w-full px-4 py-2.5 text-left text-label-md text-error hover:bg-error-container/20 flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">delete</span> Delete
                            </button>
</div>
</div>
</div>
</div>
<!-- Course Item 2 -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-4 px-4 md:px-6 py-6 border-b border-outline-variant/10 hover:bg-surface/50 transition-colors items-center">
<div class="col-span-5 flex items-center gap-4">
<div class="w-24 aspect-[16/9] rounded-lg overflow-hidden flex-shrink-0 border border-outline-variant/20">
<img alt="Course thumbnail" class="w-full h-full object-cover" data-alt="A sophisticated data visualization dashboard displayed on a high-resolution curved monitor. The screen shows complex financial charts and graphs with a focus on deep blues and vibrant teals. The background is a minimalist, softly lit designer office at dusk. This image conveys high-level data mastery and professional excellence within an executive learning context." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC9Xex2l6DyG0xTPTW7nhoJnjXZgEVaqKDM1azYFJqUHzyHI_6FM8GPFN8QXavnhcBeP26XDHh2ujYy3d6o5qHW5lpjomH7yUcRe1tH703zdNK9rJjq2_M0BrliWswYpPerDGiRBcVOLtNkoGTVMwycviIoooFhY_SgMEatCmhFies4RqFUOhufWHviNxOV5ZzeG1CO5ofjf7lT9TV7IEQPVHGaxUKcMXgKZMpJbU02h6qRvtCHkQh-j9aWlnRsNX3EKJNUWzIepKL7"/>
</div>
<div>
<h3 class="font-headline-sm text-on-background">Advanced Data Analytics for CFOs</h3>
<p class="text-label-sm text-on-surface-variant mt-1">Last updated: Nov 05, 2024</p>
</div>
</div>
<div class="col-span-2 flex justify-start md:justify-center">
<span class="px-3 py-1 bg-surface-container text-on-surface-variant rounded-full font-label-sm flex items-center gap-1">
<span class="w-1.5 h-1.5 bg-outline rounded-full"></span>
                        Draft
                    </span>
</div>
<div class="col-span-3 grid grid-cols-3 gap-2 text-center">
<div>
<p class="text-label-md font-bold text-outline-variant">—</p>
<p class="text-[10px] text-on-surface-variant uppercase">Students</p>
</div>
<div>
<p class="text-label-md font-bold text-outline-variant">—</p>
<p class="text-[10px] text-on-surface-variant uppercase">Rating</p>
</div>
<div>
<p class="text-label-md font-bold text-primary">$349.00</p>
<p class="text-[10px] text-on-surface-variant uppercase">Price</p>
</div>
</div>
<div class="col-span-2 flex justify-end gap-2">
<button class="p-2 text-secondary hover:text-primary hover:bg-surface-container rounded-lg transition-all" title="Edit Course">
<span class="material-symbols-outlined">edit</span>
</button>
<button class="p-2 text-secondary hover:text-primary hover:bg-surface-container rounded-lg transition-all" title="View Public Page">
<span class="material-symbols-outlined">visibility</span>
</button>
<div class="relative group">
<button class="p-2 text-secondary hover:text-primary hover:bg-surface-container rounded-lg transition-all">
<span class="material-symbols-outlined">more_vert</span>
</button>
<div class="absolute right-0 top-full mt-2 w-48 bg-white border border-outline-variant/30 shadow-lg rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-20 overflow-hidden">
<button class="w-full px-4 py-2.5 text-left text-label-md hover:bg-surface-container-low flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">publish</span> Publish Now
                            </button>
<button class="w-full px-4 py-2.5 text-left text-label-md hover:bg-surface-container-low flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">content_copy</span> Duplicate
                            </button>
<div class="border-t border-outline-variant/20"></div>
<button class="w-full px-4 py-2.5 text-left text-label-md text-error hover:bg-error-container/20 flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">delete</span> Delete
                            </button>
</div>
</div>
</div>
</div>
<!-- Course Item 3 -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-4 px-4 md:px-6 py-6 border-b border-outline-variant/10 hover:bg-surface/50 transition-colors items-center">
<div class="col-span-5 flex items-center gap-4">
<div class="w-24 aspect-[16/9] rounded-lg overflow-hidden flex-shrink-0 border border-outline-variant/20 grayscale opacity-60">
<img alt="Course thumbnail" class="w-full h-full object-cover" data-alt="A professional group of business executives engaged in a serious boardroom discussion, depicted in a high-contrast, black and white style with subtle blue tinting. The scene is professional and academic, emphasizing heritage and established authority. The composition is clean with plenty of white space, fitting the 'archived' status of the content while maintaining a premium feel." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC021-HxbjeWSOHA3AFIA-afYbu3PEf7UuePfX9LSOz2e6m0ml8Y2yOGi_DAvxW8QtmkNKYb6QxCkRsMLnBarFPCQi9Ie_M7Rk-a3cnboF7Xa4KQxoZ8zSlZzG7ZD8OSshf3U1qWTx73wAK3oxYO-Vb6ff6cdfRLYq4Fhd-9yP8mKinQSWhgK7zz47M4h8R1ZZxXlxk_ccycyxHPxLgCZfVuPBx2oDTGuXCl9mxbKIsc05zGn9PCKxEs1AroRIFoX7pobI9jluGZJ8J"/>
</div>
<div>
<h3 class="font-headline-sm text-on-surface-variant">2023 Global Market Fundamentals</h3>
<p class="text-label-sm text-on-surface-variant mt-1">Archived on: Jan 15, 2024</p>
</div>
</div>
<div class="col-span-2 flex justify-start md:justify-center">
<span class="px-3 py-1 bg-surface-variant/30 text-on-surface-variant rounded-full font-label-sm flex items-center gap-1">
<span class="w-1.5 h-1.5 bg-on-surface-variant/40 rounded-full"></span>
                        Archived
                    </span>
</div>
<div class="col-span-3 grid grid-cols-3 gap-2 text-center opacity-60">
<div>
<p class="text-label-md font-bold">542</p>
<p class="text-[10px] text-on-surface-variant uppercase">Students</p>
</div>
<div>
<p class="text-label-md font-bold flex items-center justify-center gap-0.5">4.6 <span class="material-symbols-outlined text-[14px] text-yellow-500" style="font-variation-settings: 'FILL' 1;">star</span></p>
<p class="text-[10px] text-on-surface-variant uppercase">Rating</p>
</div>
<div>
<p class="text-label-md font-bold text-primary">$89.00</p>
<p class="text-[10px] text-on-surface-variant uppercase">Price</p>
</div>
</div>
<div class="col-span-2 flex justify-end gap-2">
<button class="p-2 text-secondary hover:text-primary hover:bg-surface-container rounded-lg transition-all" title="View Archives">
<span class="material-symbols-outlined">history</span>
</button>
<div class="relative group">
<button class="p-2 text-secondary hover:text-primary hover:bg-surface-container rounded-lg transition-all">
<span class="material-symbols-outlined">more_vert</span>
</button>
<div class="absolute right-0 top-full mt-2 w-48 bg-white border border-outline-variant/30 shadow-lg rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-20 overflow-hidden">
<button class="w-full px-4 py-2.5 text-left text-label-md hover:bg-surface-container-low flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">unarchive</span> Restore
                            </button>
<button class="w-full px-4 py-2.5 text-left text-label-md text-error hover:bg-error-container/20 flex items-center gap-2">
<span class="material-symbols-outlined text-[18px]">delete</span> Permanent Delete
                            </button>
</div>
</div>
</div>
</div>
</div>
<!-- Pagination / Footer Info -->
<div class="mt-6 flex flex-col md:flex-row justify-between items-center gap-4">
<p class="text-label-md text-on-surface-variant">Showing <span class="font-bold text-on-surface">3</span> of <span class="font-bold text-on-surface">12</span> courses</p>
<div class="flex items-center gap-2">
<button class="p-2 border border-outline-variant rounded-lg text-secondary opacity-50 cursor-not-allowed">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-10 h-10 bg-primary text-white font-bold rounded-lg">1</button>
<button class="w-10 h-10 hover:bg-surface-container text-secondary font-bold rounded-lg transition-all">2</button>
<button class="w-10 h-10 hover:bg-surface-container text-secondary font-bold rounded-lg transition-all">3</button>
<button class="p-2 border border-outline-variant rounded-lg text-secondary hover:bg-surface-container transition-all">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
<!-- Empty State Hidden (Demo purposes) -->
<div class="hidden flex-col items-center justify-center py-stack-lg bg-white border border-dashed border-outline-variant/50 rounded-2xl">
<div class="w-20 h-20 bg-surface-container rounded-full flex items-center justify-center mb-6">
<span class="material-symbols-outlined text-4xl text-primary">school</span>
</div>
<h2 class="font-headline-md text-on-background">No courses found</h2>
<p class="text-on-surface-variant mt-2 max-w-sm text-center">Start building your educational portfolio. Your future students are waiting for your expertise.</p>
<button class="mt-8 bg-primary text-white font-label-md px-8 py-3 rounded-lg hover:bg-primary-container transition-all shadow-md active:scale-95">
                Create Your First Course
            </button>
</div>
</main>
<!-- Footer Component -->
<footer class="bg-surface-dim dark:bg-surface-container-lowest border-t border-outline-variant/20 w-full py-stack-md mt-12">
<div class="flex flex-col md:flex-row justify-between items-center px-margin-desktop max-w-container-max mx-auto gap-4">
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-primary font-bold">Instructor Studio</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">© 2024 EduMarket Instructor Studio. All rights reserved.</span>
</div>
<div class="flex gap-6">
<a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-opacity opacity-80 hover:opacity-100 underline" href="#">Privacy Policy</a>
<a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-opacity opacity-80 hover:opacity-100 underline" href="#">Terms of Service</a>
<a class="font-label-sm text-label-sm text-on-surface-variant hover:text-primary transition-opacity opacity-80 hover:opacity-100 underline" href="#">Support</a>
</div>
</div>
</footer>
<script>
        // Simple search filtering simulation
        const searchInput = document.querySelector('input[type="text"]');
        const courseRows = document.querySelectorAll('.grid-cols-1.md\\:grid-cols-12.px-4');

        searchInput.addEventListener('input', (e) => {
            const term = e.target.value.toLowerCase();
            courseRows.forEach(row => {
                const title = row.querySelector('h3').textContent.toLowerCase();
                if (title.includes(term)) {
                    row.style.display = 'grid';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Hover animation for profile picture
        const profilePic = document.querySelector('img[alt="Instructor profile picture"]');
        profilePic.addEventListener('mouseenter', () => {
            profilePic.style.transform = 'scale(1.1)';
            profilePic.style.transition = 'transform 0.2s ease-in-out';
        });
        profilePic.addEventListener('mouseleave', () => {
            profilePic.style.transform = 'scale(1)';
        });
    </script>
</body></html>