<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Instructor Dashboard | EduMarket</title>
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
                    "on-tertiary-fixed-variant": "#444749",
                    "on-surface": "#0b1c30",
                    "on-tertiary": "#ffffff",
                    "surface-tint": "#0053db",
                    "primary-fixed": "#dbe1ff",
                    "surface-variant": "#d3e4fe",
                    "on-primary": "#ffffff",
                    "error-container": "#ffdad6",
                    "on-secondary-fixed-variant": "#3f465c",
                    "surface-container-highest": "#d3e4fe",
                    "primary-container": "#2563eb",
                    "on-secondary": "#ffffff",
                    "tertiary-container": "#6b6e70",
                    "on-error": "#ffffff",
                    "outline": "#737686",
                    "surface-container": "#e5eeff",
                    "primary-fixed-dim": "#b4c5ff",
                    "on-secondary-fixed": "#131b2e",
                    "tertiary": "#525657",
                    "surface-container-lowest": "#ffffff",
                    "primary": "#004ac6",
                    "outline-variant": "#c3c6d7",
                    "tertiary-fixed": "#e0e3e5",
                    "on-primary-fixed-variant": "#003ea8",
                    "secondary": "#565e74",
                    "on-surface-variant": "#434655",
                    "background": "#f8f9ff",
                    "on-secondary-container": "#5c647a",
                    "inverse-primary": "#b4c5ff",
                    "on-background": "#0b1c30",
                    "inverse-on-surface": "#eaf1ff",
                    "on-primary-fixed": "#00174b",
                    "on-primary-container": "#eeefff",
                    "inverse-surface": "#213145",
                    "secondary-container": "#dae2fd",
                    "surface-dim": "#cbdbf5",
                    "surface": "#f8f9ff",
                    "secondary-fixed-dim": "#bec6e0",
                    "secondary-fixed": "#dae2fd",
                    "on-tertiary-fixed": "#191c1e",
                    "surface-bright": "#f8f9ff",
                    "on-error-container": "#93000a",
                    "error": "#ba1a1a",
                    "on-tertiary-container": "#eff1f3",
                    "surface-container-low": "#eff4ff",
                    "surface-container-high": "#dce9ff",
                    "tertiary-fixed-dim": "#c4c7c9"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "container-max": "1280px",
                    "stack-md": "24px",
                    "base": "8px",
                    "margin-desktop": "32px",
                    "stack-sm": "12px",
                    "stack-lg": "48px",
                    "margin-mobile": "16px",
                    "gutter": "24px"
            },
            "fontFamily": {
                    "headline-lg-mobile": ["Inter"],
                    "body-md": ["Inter"],
                    "label-md": ["Inter"],
                    "headline-sm": ["Inter"],
                    "headline-md": ["Inter"],
                    "body-lg": ["Inter"],
                    "label-sm": ["Inter"],
                    "display-lg": ["Inter"],
                    "headline-lg": ["Inter"]
            },
            "fontSize": {
                    "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                    "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                    "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                    "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}]
            }
          },
        },
      }
    </script>
<style>
        .soft-lift { box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05); transition: all 0.3s ease; }
        .soft-lift:hover { box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1); transform: translateY(-2px); }
        .sidebar-transition { transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-primary-fixed selection:text-on-primary-fixed overflow-x-hidden">
<!-- TopNavBar (Shared Component Blueprint) -->
<header class="fixed top-0 w-full z-50 h-[72px] bg-surface/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex items-center">
<div class="flex items-center justify-between px-margin-desktop max-w-container-max mx-auto w-full">
<div class="flex items-center gap-8">
<span class="text-headline-md font-headline-md font-bold text-primary">EduMarket</span>
<nav class="hidden md:flex items-center gap-6">
<a class="font-body-md text-body-md text-primary font-bold border-b-2 border-primary py-2 transition-all" href="#">Dashboard</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary py-2 transition-all" href="#">Courses</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary py-2 transition-all" href="#">Instructors</a>
<a class="font-body-md text-body-md text-on-surface-variant hover:text-primary py-2 transition-all" href="#">Enterprise</a>
</nav>
</div>
<div class="flex items-center gap-4">
<div class="flex items-center gap-2">
<button class="p-2 rounded-full hover:bg-surface-container-low transition-all active:scale-95">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="shopping_cart">shopping_cart</span>
</button>
<button class="p-2 rounded-full hover:bg-surface-container-low transition-all active:scale-95 relative">
<span class="material-symbols-outlined text-on-surface-variant" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
</div>
<div class="h-10 w-10 rounded-full overflow-hidden border border-outline-variant">
<img alt="User profile" class="w-full h-full object-cover" data-alt="A professional headshot of a middle-aged male instructor with a friendly smile, wearing a clean charcoal suit. The lighting is bright and editorial, consistent with a high-end educational platform's aesthetic. The background is a soft-focus office environment with light blue and white tones that match the EduMarket brand colors." src="https://lh3.googleusercontent.com/aida-public/AB6AXuC6iwV4kjZW95nbiei-N8S_39_GKMwcg6Dj1VvZiaWvz1WU1vKq0JGKBAR0HTRHZlFFVSuM0GapzQ6u2vK6BPtPN6BZ0syb8c3gg1WXMFhAqDWm9lDG2wrfSg6B-RyhxdTab7xYeCGXauhxcp1HV8jCYkrXjZUBzUbiqRae3UmCwkwxN9MpzxImKWajnjGttalYNa1bZOTADv0bYp1HrJ0OVGf0lQe0a-EnoMMcKP99bBiOuQktlSmPOc6nvSD8-KnJI4oSNwyepFii"/>
</div>
</div>
</div>
</header>
<div class="flex pt-[72px] min-h-screen">
<!-- Sidebar Navigation -->
<aside class="hidden md:flex flex-col w-64 bg-surface border-r border-outline-variant fixed h-full z-40">
<div class="p-6 flex flex-col gap-2">
<a class="flex items-center gap-3 px-4 py-3 rounded-lg bg-primary-container text-on-primary-container font-semibold transition-all" href="#">
<span class="material-symbols-outlined" data-icon="dashboard" style="font-variation-settings: 'FILL' 1;">dashboard</span>
<span class="font-label-md text-label-md">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-all group" href="#">
<span class="material-symbols-outlined group-hover:text-primary" data-icon="school">school</span>
<span class="font-label-md text-label-md">My Courses</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-all group" href="#">
<span class="material-symbols-outlined group-hover:text-primary" data-icon="leaderboard">leaderboard</span>
<span class="font-label-md text-label-md">Performance</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-all group" href="#">
<span class="material-symbols-outlined group-hover:text-primary" data-icon="chat_bubble">chat_bubble</span>
<span class="font-label-md text-label-md">Communications</span>
</a>
<a class="flex items-center gap-3 px-4 py-3 rounded-lg text-on-surface-variant hover:bg-surface-container-low hover:text-primary transition-all group" href="#">
<span class="material-symbols-outlined group-hover:text-primary" data-icon="construction">construction</span>
<span class="font-label-md text-label-md">Tools</span>
</a>
</div>
<div class="mt-auto p-6 border-t border-outline-variant">
<button class="w-full flex items-center justify-center gap-2 bg-primary text-on-primary py-3 px-4 rounded-lg font-label-md text-label-md hover:bg-primary-container transition-all shadow-sm active:scale-95">
<span class="material-symbols-outlined" data-icon="add">add</span>
                    Create New Course
                </button>
</div>
</aside>
<!-- Main Content Area -->
<main class="flex-1 md:ml-64 px-margin-mobile md:px-margin-desktop py-stack-lg max-w-container-max mx-auto">
<!-- Welcome Header -->
<header class="mb-stack-lg flex flex-col md:flex-row md:items-end justify-between gap-gutter">
<div>
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Welcome back, Dr. Aris</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Your courses have reached 1,240 new students this week. Great job!</p>
</div>
<div class="flex gap-3">
<div class="flex items-center gap-2 bg-surface-container-low px-4 py-2 rounded-lg border border-outline-variant">
<span class="material-symbols-outlined text-primary" data-icon="calendar_today">calendar_today</span>
<span class="font-label-md text-label-md">Last 30 Days</span>
</div>
</div>
</header>
<!-- Performance Metrics Grid -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-stack-lg">
<div class="bg-surface p-6 rounded-xl soft-lift border border-outline-variant flex flex-col gap-4">
<div class="flex justify-between items-start">
<div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
<span class="material-symbols-outlined text-primary" data-icon="payments">payments</span>
</div>
<span class="text-emerald-600 font-label-sm text-label-sm flex items-center gap-1 bg-emerald-50 px-2 py-1 rounded">
<span class="material-symbols-outlined text-[14px]" data-icon="trending_up">trending_up</span>
                            +12.5%
                        </span>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface-variant">Total Revenue</p>
<h2 class="font-headline-lg text-headline-lg">$42,850.00</h2>
</div>
</div>
<div class="bg-surface p-6 rounded-xl soft-lift border border-outline-variant flex flex-col gap-4">
<div class="flex justify-between items-start">
<div class="w-12 h-12 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container">
<span class="material-symbols-outlined" data-icon="group">group</span>
</div>
<span class="text-emerald-600 font-label-sm text-label-sm flex items-center gap-1 bg-emerald-50 px-2 py-1 rounded">
<span class="material-symbols-outlined text-[14px]" data-icon="trending_up">trending_up</span>
                            +8.2%
                        </span>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface-variant">Total Students</p>
<h2 class="font-headline-lg text-headline-lg">15,402</h2>
</div>
</div>
<div class="bg-surface p-6 rounded-xl soft-lift border border-outline-variant flex flex-col gap-4">
<div class="flex justify-between items-start">
<div class="w-12 h-12 rounded-full bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed">
<span class="material-symbols-outlined" data-icon="star" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<span class="text-on-surface-variant font-label-sm text-label-sm flex items-center gap-1 bg-surface-container px-2 py-1 rounded">
                            Stable
                        </span>
</div>
<div>
<p class="font-label-md text-label-md text-on-surface-variant">Course Rating</p>
<h2 class="font-headline-lg text-headline-lg">4.92 / 5.0</h2>
</div>
</div>
</section>
<!-- Main Content Bento Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
<!-- Your Courses (Active Section) -->
<div class="lg:col-span-2 flex flex-col gap-gutter">
<div class="bg-surface rounded-xl border border-outline-variant overflow-hidden">
<div class="p-6 border-b border-outline-variant flex justify-between items-center">
<h3 class="font-headline-sm text-headline-sm">Active Courses</h3>
<button class="text-primary font-label-md text-label-md hover:underline">View All</button>
</div>
<div class="divide-y divide-outline-variant">
<!-- Course Item 1 -->
<div class="p-6 flex flex-col sm:flex-row gap-6 hover:bg-surface-container-lowest transition-colors group">
<div class="w-full sm:w-40 aspect-video rounded-lg overflow-hidden bg-surface-container">
<img alt="Course thumbnail" class="w-full h-full object-cover" data-alt="A clean, minimalist high-angle workspace shot with a sleek silver laptop displaying lines of clean code. The scene is illuminated by soft, cool morning light filtering through a nearby window, casting gentle shadows. The color scheme is professional with accents of deep blue and slate grey, embodying a high-end software development aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQIhsjbzhQWFgxMZsl8x9OlEYtN451PWY3G2myTkp8LZhvX0TihkxTQkBB2kq_9VxuN4bGoVCZkze2YACrswzhm-diKok-x_NjZ_Ey8Mc0F5V14WqrqVWLjG3AUaNQlpD6HjqhzcPZYiZlhlv9vqPocNyBcYVngJEX5EKIzZDhNlsV9lgZJ_Xo9IUG0zO7iLjMgemB7l_olFO3LEq4wEq227LwFgV1gTbfcqEIx5Amkxe72vVVuM5raCoyJ1ucZ939DdiyXdCUSXkW"/>
</div>
<div class="flex-1 flex flex-col justify-between py-1">
<div>
<div class="flex justify-between items-start mb-1">
<h4 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">Advanced System Architecture</h4>
<span class="px-2 py-1 rounded-md text-label-sm bg-primary/10 text-primary">Live</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-1 mb-4">Mastering distributed systems and cloud patterns.</p>
</div>
<div class="flex items-center justify-between">
<div class="flex-1 max-w-[200px] mr-4">
<div class="flex justify-between mb-1">
<span class="text-label-sm font-label-sm text-on-surface-variant">Course Progress</span>
<span class="text-label-sm font-label-sm text-on-surface">85%</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full" style="width: 85%"></div>
</div>
</div>
<div class="flex -space-x-2">
<img alt="Avatar" class="w-8 h-8 rounded-full border-2 border-surface" data-alt="Close up of a professional student profile avatar." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAzt5J_Wl2qgMeEyd7wOx7AD553zUPUoMB1a5O-trQhdtYaEt35WW0JklAhxG8be5TKvpJY3PCQOhzoybayWDtyb5oq3toBqVTrL9icBIiAznQNrR-P7cE6WEYqpUcU1nY1HgCERIdukm0B-Dm3cMyPIr6xAeRWLDDVr5UzZOcw8mohXfMD5SH-AalfUs9Y0toJ8pYKmP4j7525lNs-s5I16R-o61iT2chCWVu3eVYAoqoAXfUGahFZSTzG_HhE6-tufXM3TMs4waiT"/>
<img alt="Avatar" class="w-8 h-8 rounded-full border-2 border-surface" data-alt="Close up of a professional student profile avatar." src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5GElg13-kUc8QROneY4HrWYK_8gAllnoK3zrUQq7kQjxTKrkqQ-Ctu2fMOb9Xl7ZpQse-6bzl_6Wu7ARzBzED5VPT0lTCaBLsmRjICRQ-BQ-QJ7Ux5XOqRbNonzsHPnuDmSZEP1VQKMxgjI9Dt5Kw6aUY6nuOAzjUatQJIZcc0Xpcyp-FRDNqqcO2AG2el2um6bPOfcWSj4NcyzROWeuUqVopxuh6L9lDPovnbfbRMRfrhnlg0mW_OvSxCGDjAWwXYdH-ggQZYS9S"/>
<div class="w-8 h-8 rounded-full border-2 border-surface bg-surface-container flex items-center justify-center text-[10px] font-bold">+12</div>
</div>
</div>
</div>
</div>
<!-- Course Item 2 -->
<div class="p-6 flex flex-col sm:flex-row gap-6 hover:bg-surface-container-lowest transition-colors group">
<div class="w-full sm:w-40 aspect-video rounded-lg overflow-hidden bg-surface-container">
<img alt="Course thumbnail" class="w-full h-full object-cover" data-alt="A focused business team working around a large glass table in a sunlit modern office. The image is high-key and professional, featuring clear blue and white tones. Digital tablets and notebooks are neatly arranged, creating an atmosphere of collaborative focus and high productivity. The lighting is crisp and clean." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAPDyy5IlFmNXYP3hprwVOgkk87FInu-BlLcCs6o5BqgsZjqJqd1CclYrwqeTeN9eTjz8-KsQa2dba-uDKUk6iMYl8l0_rt-iO73wu16W8lsESQOVMS0xEHJJTpIqFG63ZvAd2T-i_9gplUcdZtJ0CRpgf4IkRLEsGLCD6-Jwq1zf6isHpXX4vrZC9heekkXs1lNLeAgNjmRbVaDlTwxbo9ZwYUOmQqYeKoFWD0PZnuDOvgDnFF1Rub5Wu_8PQc_xSS1YegfuR4pIwo"/>
</div>
<div class="flex-1 flex flex-col justify-between py-1">
<div>
<div class="flex justify-between items-start mb-1">
<h4 class="font-headline-sm text-headline-sm text-on-surface group-hover:text-primary transition-colors">UX Strategy for Lead Product Designers</h4>
<span class="px-2 py-1 rounded-md text-label-sm bg-on-tertiary-container text-on-tertiary-fixed-variant">Drafting</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-1 mb-4">Strategic thinking and business alignment for designers.</p>
</div>
<div class="flex items-center justify-between">
<div class="flex-1 max-w-[200px] mr-4">
<div class="flex justify-between mb-1">
<span class="text-label-sm font-label-sm text-on-surface-variant">Content Completion</span>
<span class="text-label-sm font-label-sm text-on-surface">32%</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-secondary rounded-full" style="width: 32%"></div>
</div>
</div>
<button class="flex items-center gap-2 text-primary font-label-md text-label-md hover:underline transition-all">
                                            Resume Editing
                                            <span class="material-symbols-outlined text-[18px]" data-icon="arrow_forward">arrow_forward</span>
</button>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Notifications & Questions Sidebar -->
<div class="flex flex-col gap-gutter">
<section class="bg-surface rounded-xl border border-outline-variant p-6 soft-lift">
<div class="flex justify-between items-center mb-6">
<h3 class="font-headline-sm text-headline-sm">Student Questions</h3>
<span class="w-6 h-6 rounded-full bg-error text-on-error flex items-center justify-center text-[10px] font-bold">4</span>
</div>
<div class="flex flex-col gap-6">
<div class="flex gap-4">
<img alt="Student" class="w-10 h-10 rounded-full object-cover" data-alt="Close up of a young male student profile avatar." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQu81g-nO-tgApmzS96BaAr3aLnWgwHGrdsRSHdo3oJYIR4BmgrFIM6Rat-sBzJEHv1PO7Sw2EbmwlVDpGzbJkTGq_uWeepgII0dtP63GUpZEbmt6KB_cb8SPLNVoMGJUGXzF57jczRqFLmDMBS1xgsNLlhTKUtAkiVQXXARbJEXIsDJYQvmM7xNvB_mNx-py2TZRBIaw0R0L0T_oHaODuDYYnYqCB9uPMUBph0gDYlQe8qwpL4k496d7g8BCl18WW_8yeFOSU-eCo"/>
<div>
<div class="flex justify-between">
<p class="font-label-md text-label-md text-on-surface">Mark J. <span class="text-on-surface-variant font-normal">in Advanced System Arch...</span></p>
</div>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-1 italic">"How do I handle eventual consistency in a multi-region deployment?"</p>
<button class="mt-2 text-primary font-label-sm text-label-sm hover:underline">Reply Now</button>
</div>
</div>
<div class="flex gap-4">
<img alt="Student" class="w-10 h-10 rounded-full object-cover" data-alt="Close up of a young female student profile avatar." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAB4mrhu4P2xoeYojzLDnJ3bA0ukrb6Av1wAYKEkYQ-Zg30JJg0FxgkJTjI_KTjxoxF1ekXAgJn9xCMo8w4DCNRxFLKGvNX8norxUQcLFXZIjHS8aK65IbOsCrW6Wobz5y7qv5yJdHwF4P754FGI3qcbiMxBaCsqxiSMzER4Gbo_8ipQjk_SracdZYXT1T--f2twlXuw73sCRJXZKq3Pp6f4oKDRwBTGOTsN2y0qEv_vF9qgCFN_nqVwQ6N_Z_OAfqRTEh1akDTKoU1"/>
<div>
<div class="flex justify-between">
<p class="font-label-md text-label-md text-on-surface">Sarah K. <span class="text-on-surface-variant font-normal">in UX Strategy...</span></p>
</div>
<p class="font-body-md text-body-md text-on-surface-variant line-clamp-2 mt-1 italic">"Is there a template for the stakeholder interview script?"</p>
<button class="mt-2 text-primary font-label-sm text-label-sm hover:underline">Reply Now</button>
</div>
</div>
</div>
<button class="w-full mt-6 py-2 border border-outline-variant rounded-lg font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-low transition-all">
                            View All Messages
                        </button>
</section>
<section class="bg-primary/5 rounded-xl border border-primary/20 p-6">
<h3 class="font-label-md text-label-md text-primary mb-4 flex items-center gap-2 uppercase tracking-wider">
<span class="material-symbols-outlined text-[20px]" data-icon="tips_and_updates" style="font-variation-settings: 'FILL' 1;">tips_and_updates</span>
                            Instructor Insight
                        </h3>
<p class="font-body-md text-body-md text-on-surface mb-4">
                            Your "System Architecture" course is trending. Adding a 5-minute video on <strong class="font-bold">Edge Computing</strong> could increase engagement by 15%.
                        </p>
<a class="text-primary font-label-md text-label-md hover:underline flex items-center gap-1" href="#">
                            See how to optimize
                            <span class="material-symbols-outlined text-[16px]" data-icon="open_in_new">open_in_new</span>
</a>
</section>
</div>
</div>
</main>
</div>
<!-- Footer -->
<footer class="w-full py-stack-lg bg-surface-container-low mt-stack-lg border-t border-outline-variant">
<div class="max-w-container-max mx-auto px-margin-desktop">
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-gutter mb-stack-md">
<div class="col-span-2 lg:col-span-1">
<span class="text-headline-sm font-headline-sm font-bold text-on-surface">EduMarket</span>
<p class="mt-4 text-on-surface-variant text-body-md">Empowering world-class instructors with professional-grade educational tools.</p>
</div>
<div class="flex flex-col gap-3">
<h4 class="font-label-md text-label-md text-on-surface uppercase tracking-wide">Teach</h4>
<a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Instructor Handbook</a>
<a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Payment Policy</a>
<a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Content Standards</a>
</div>
<div class="flex flex-col gap-3">
<h4 class="font-label-md text-label-md text-on-surface uppercase tracking-wide">Support</h4>
<a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Help and Support</a>
<a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Affiliate Program</a>
<a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Sitemap</a>
</div>
<div class="flex flex-col gap-3">
<h4 class="font-label-md text-label-md text-on-surface uppercase tracking-wide">Legal</h4>
<a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Terms</a>
<a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Privacy Policy</a>
<a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Cookie Settings</a>
</div>
</div>
<div class="pt-8 border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-4">
<p class="text-on-surface-variant text-label-sm">© 2024 EduMarket Inc. All rights reserved.</p>
<div class="flex gap-6">
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined" data-icon="language">language</span>
</a>
</div>
</div>
</div>
</footer>
<!-- FAB for quick course creation on mobile -->
<button class="md:hidden fixed bottom-6 right-6 w-14 h-14 rounded-full bg-primary text-on-primary shadow-lg flex items-center justify-center z-50 active:scale-95 transition-transform">
<span class="material-symbols-outlined" data-icon="add">add</span>
</button>
<script>
        // Simple micro-interaction for performance metric cards
        document.querySelectorAll('.soft-lift').forEach(card => {
            card.addEventListener('mouseenter', () => {
                const icon = card.querySelector('.material-symbols-outlined');
                if(icon) icon.style.transform = 'scale(1.1)';
            });
            card.addEventListener('mouseleave', () => {
                const icon = card.querySelector('.material-symbols-outlined');
                if(icon) icon.style.transform = 'scale(1)';
            });
        });

        // Sticky nav scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 20) {
                header.classList.add('shadow-md');
                header.classList.remove('shadow-sm');
            } else {
                header.classList.remove('shadow-md');
                header.classList.add('shadow-sm');
            }
        });
    </script>
</body></html>