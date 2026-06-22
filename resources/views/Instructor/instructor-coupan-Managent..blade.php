<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
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
                    "tertiary-fixed-dim": "#bec6e0",
                    "on-secondary-container": "#54647a",
                    "primary": "#004ac6",
                    "on-primary-fixed-variant": "#003ea8",
                    "surface-bright": "#f7f9fb",
                    "surface-dim": "#d8dadc",
                    "surface-container-highest": "#e0e3e5",
                    "surface-container-high": "#e6e8ea",
                    "on-tertiary-fixed-variant": "#3f465c",
                    "surface": "#f7f9fb",
                    "on-background": "#191c1e",
                    "inverse-primary": "#b4c5ff",
                    "on-secondary-fixed": "#0b1c30",
                    "on-error": "#ffffff",
                    "secondary-container": "#d0e1fb",
                    "on-primary-container": "#eeefff",
                    "on-tertiary": "#ffffff",
                    "on-surface-variant": "#434655",
                    "tertiary-fixed": "#dae2fd",
                    "on-secondary-fixed-variant": "#38485d",
                    "error": "#ba1a1a",
                    "surface-container": "#eceef0",
                    "secondary-fixed": "#d3e4fe",
                    "surface-tint": "#0053db",
                    "outline-variant": "#c3c6d7",
                    "surface-container-lowest": "#ffffff",
                    "inverse-surface": "#2d3133",
                    "secondary-fixed-dim": "#b7c8e1",
                    "secondary": "#505f76",
                    "on-surface": "#191c1e",
                    "on-primary": "#ffffff",
                    "surface-container-low": "#f2f4f6",
                    "background": "#f7f9fb",
                    "error-container": "#ffdad6",
                    "primary-fixed": "#dbe1ff",
                    "inverse-on-surface": "#eff1f3",
                    "on-secondary": "#ffffff",
                    "tertiary": "#4d556b",
                    "on-error-container": "#93000a",
                    "outline": "#737686",
                    "surface-variant": "#e0e3e5",
                    "on-tertiary-container": "#eef0ff",
                    "primary-fixed-dim": "#b4c5ff",
                    "on-tertiary-fixed": "#131b2e",
                    "primary-container": "#2563eb",
                    "tertiary-container": "#656d84",
                    "on-primary-fixed": "#00174b"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "margin": "32px",
                    "gutter": "24px",
                    "thread-indent": "48px",
                    "chat-gap": "8px",
                    "unit": "4px",
                    "stack-sm": "16px",
                    "stack-md": "32px",
                    "base": "24px"
            },
            "fontFamily": {
                    "headline-md": ["Inter"],
                    "label-md": ["Inter"],
                    "label-sm": ["Inter"],
                    "body-md": ["Inter"],
                    "body-lg": ["Inter"],
                    "headline-lg": ["Inter"],
                    "headline-lg-mobile": ["Inter"]
            },
            "fontSize": {
                    "headline-md": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                    "label-md": ["14px", {"lineHeight": "20px", "fontWeight": "500"}],
                    "label-sm": ["12px", {"lineHeight": "16px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "headline-lg": ["30px", {"lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "32px", "fontWeight": "700"}]
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
      body { font-family: 'Inter', sans-serif; }
      .glass-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(226, 232, 240, 0.8);
      }
      .custom-scrollbar::-webkit-scrollbar { width: 6px; }
      .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
      .custom-scrollbar::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }
    </style>
</head>
<body class="bg-background text-on-surface min-h-screen flex flex-col">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full h-[72px] z-50 bg-surface/80 backdrop-blur-md border-b border-outline-variant/30 shadow-sm flex justify-between items-center px-8 max-w-full mx-auto">
<div class="flex items-center gap-6">
<span class="font-headline-md text-headline-md font-bold text-primary">Academia Pro</span>
<div class="hidden md:flex items-center bg-surface-container rounded-full px-4 py-2 w-80">
<span class="material-symbols-outlined text-outline mr-2" data-icon="search">search</span>
<input class="bg-transparent border-none focus:ring-0 text-label-md w-full" placeholder="Search courses or coupons..." type="text"/>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 rounded-full hover:bg-surface-container-low transition-all active:scale-95">
<span class="material-symbols-outlined text-secondary" data-icon="chat">chat</span>
</button>
<button class="p-2 rounded-full hover:bg-surface-container-low transition-all active:scale-95 relative">
<span class="material-symbols-outlined text-secondary" data-icon="notifications">notifications</span>
<span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full"></span>
</button>
<div class="h-10 w-10 rounded-full overflow-hidden border border-outline-variant">
<img alt="Instructor Profile Avatar" data-alt="A professional close-up portrait of a male instructor with a friendly expression. He is wearing a minimalist navy blue blazer against a soft-focus corporate office background. The lighting is bright and natural, reflecting a high-end educational environment with a professional and authoritative yet accessible mood." src="https://lh3.googleusercontent.com/aida-public/AB6AXuB2Z41qT9KFqAW992aWVvunty4qEy2ZgGIpf-eINkMUnh3cB2P-QhaAUuuGDeCJi7Ch8t-xORkd1_BR4oVsSMTw57I2Niy9YZVTiBd0eLWXtZepsH8Tv18E1_P9agYhfYPPlpBVlydOxu8ia8hBf0aYqFfG-PyBZvPTvd817c6SHbr0MQyZUntNHT01bx1ydho0ny_2d2hAa7AApx6mhHrR5ItcVrWaindSQ6-lXaYkDzncnFfgfXWEOWdXYzGODR5g0BWkP6OqVy_5"/>
</div>
</div>
</nav>
<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-full w-64 pt-[72px] z-40 bg-surface-container-lowest shadow-sm hidden md:flex flex-col gap-6 p-6 overflow-y-auto">
<div class="flex items-center gap-3 px-2 mb-4">
<div class="w-10 h-10 rounded-lg bg-primary-container flex items-center justify-center">
<span class="material-symbols-outlined text-on-primary-container" data-icon="school">school</span>
</div>
<div>
<p class="font-headline-sm text-headline-sm font-bold text-primary leading-tight">Instructor Panel</p>
<p class="font-label-sm text-label-sm text-secondary">Professional Tier</p>
</div>
</div>
<nav class="flex flex-col gap-1">
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container-high rounded-lg px-4 py-3 font-label-md transition-all active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                Dashboard
            </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container-high rounded-lg px-4 py-3 font-label-md transition-all active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="school">school</span>
                My Courses
            </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container-high rounded-lg px-4 py-3 font-label-md transition-all active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="bar_chart">bar_chart</span>
                Performance
            </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container-high rounded-lg px-4 py-3 font-label-md transition-all active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="forum">forum</span>
                Q&amp;A
            </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container-high rounded-lg px-4 py-3 font-label-md transition-all active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="mail">mail</span>
                Messages
            </a>
<a class="flex items-center gap-3 bg-primary-container text-on-primary-container rounded-lg px-4 py-3 font-label-md shadow-sm transition-all" href="#">
<span class="material-symbols-outlined" data-icon="local_offer" style="font-variation-settings: 'FILL' 1;">local_offer</span>
                Coupons
            </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container-high rounded-lg px-4 py-3 font-label-md transition-all active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
                Settings
            </a>
</nav>
<div class="mt-auto">
<button class="w-full bg-primary text-on-primary font-label-md py-3 rounded-xl shadow-md hover:bg-primary-fixed-variant transition-all active:scale-95 flex items-center justify-center gap-2" onclick="toggleModal('couponModal')">
<span class="material-symbols-outlined" data-icon="add">add</span>
                Create New Coupon
            </button>
</div>
</aside>
<!-- Main Content -->
<main class="md:ml-64 pt-[72px] flex-grow flex flex-col bg-surface-bright">
<div class="p-8 max-w-7xl mx-auto w-full">
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
<div>
<h1 class="font-headline-lg text-headline-lg text-on-surface">Coupon Management</h1>
<p class="font-body-md text-body-md text-secondary mt-1">Manage promotional offers and track redemption performance across your curriculum.</p>
</div>
<div class="flex items-center gap-3">
<button class="bg-surface-container-lowest border border-outline-variant px-4 py-2 rounded-lg font-label-md flex items-center gap-2 hover:bg-surface-container transition-all">
<span class="material-symbols-outlined text-body-md" data-icon="filter_list">filter_list</span>
                        Filters
                    </button>
<button class="bg-surface-container-lowest border border-outline-variant px-4 py-2 rounded-lg font-label-md flex items-center gap-2 hover:bg-surface-container transition-all">
<span class="material-symbols-outlined text-body-md" data-icon="download">download</span>
                        Export CSV
                    </button>
</div>
</div>
<!-- Stats Overview -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
<div class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/30 shadow-sm">
<p class="font-label-sm text-label-sm text-secondary uppercase tracking-wider mb-2">Active Coupons</p>
<div class="flex items-end justify-between">
<span class="font-headline-md text-headline-md text-on-surface">12</span>
<span class="text-emerald-600 font-label-md flex items-center">+2 this month</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/30 shadow-sm">
<p class="font-label-sm text-label-sm text-secondary uppercase tracking-wider mb-2">Total Redemptions</p>
<div class="flex items-end justify-between">
<span class="font-headline-md text-headline-md text-on-surface">1,482</span>
<span class="text-primary font-label-md flex items-center">84% success rate</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/30 shadow-sm">
<p class="font-label-sm text-label-sm text-secondary uppercase tracking-wider mb-2">Revenue Impact</p>
<div class="flex items-end justify-between">
<span class="font-headline-md text-headline-md text-on-surface">$24,300</span>
<span class="text-emerald-600 font-label-md flex items-center">+12% vs LY</span>
</div>
</div>
<div class="bg-surface-container-lowest p-6 rounded-2xl border border-outline-variant/30 shadow-sm">
<p class="font-label-sm text-label-sm text-secondary uppercase tracking-wider mb-2">Avg. Discount</p>
<div class="flex items-end justify-between">
<span class="font-headline-md text-headline-md text-on-surface">35%</span>
<span class="text-secondary font-label-md flex items-center">Market standard</span>
</div>
</div>
</div>
<!-- Coupons Table -->
<div class="bg-surface-container-lowest rounded-2xl border border-outline-variant/30 shadow-sm overflow-hidden">
<div class="overflow-x-auto custom-scrollbar">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low/50">
<th class="px-6 py-4 font-label-sm text-label-sm text-secondary uppercase">Coupon Code</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-secondary uppercase">Status</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-secondary uppercase">Discount %</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-secondary uppercase">Expiry Date</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-secondary uppercase">Usage Tracking</th>
<th class="px-6 py-4 font-label-sm text-label-sm text-secondary uppercase text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/20">
<!-- Row 1 -->
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="bg-secondary-container text-on-secondary-container font-bold px-3 py-1 rounded-md text-label-md">BLACKFRIDAY70</div>
<button class="text-outline hover:text-primary transition-colors">
<span class="material-symbols-outlined text-[18px]" data-icon="content_copy">content_copy</span>
</button>
</div>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-[#10b981] text-label-sm font-bold uppercase">
<span class="material-symbols-outlined text-[16px]" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        Active
                                    </span>
</td>
<td class="px-6 py-5 font-body-md text-on-surface">70%</td>
<td class="px-6 py-5 font-body-md text-on-surface">Dec 01, 2024</td>
<td class="px-6 py-5">
<div class="flex flex-col gap-1.5 w-40">
<div class="flex justify-between text-label-sm text-secondary">
<span>85 / 100</span>
<span>85%</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full" style="width: 85%"></div>
</div>
</div>
</td>
<td class="px-6 py-5 text-right">
<div class="flex justify-end gap-2">
<button class="p-2 text-secondary hover:text-primary hover:bg-primary-container/20 rounded-lg transition-all"><span class="material-symbols-outlined" data-icon="edit">edit</span></button>
<button class="p-2 text-secondary hover:text-error hover:bg-error-container/20 rounded-lg transition-all"><span class="material-symbols-outlined" data-icon="delete">delete</span></button>
<button class="p-2 text-secondary hover:text-on-surface hover:bg-surface-container rounded-lg transition-all"><span class="material-symbols-outlined" data-icon="block">block</span></button>
</div>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="bg-secondary-container text-on-secondary-container font-bold px-3 py-1 rounded-md text-label-md">EARLYBIRD25</div>
<button class="text-outline hover:text-primary transition-colors">
<span class="material-symbols-outlined text-[18px]" data-icon="content_copy">content_copy</span>
</button>
</div>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-50 text-[#f59e0b] text-label-sm font-bold uppercase">
<span class="material-symbols-outlined text-[16px]" data-icon="help_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        Inactive
                                    </span>
</td>
<td class="px-6 py-5 font-body-md text-on-surface">25%</td>
<td class="px-6 py-5 font-body-md text-on-surface">No Expiry</td>
<td class="px-6 py-5">
<div class="flex flex-col gap-1.5 w-40">
<div class="flex justify-between text-label-sm text-secondary">
<span>45 / 500</span>
<span>9%</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full" style="width: 9%"></div>
</div>
</div>
</td>
<td class="px-6 py-5 text-right">
<div class="flex justify-end gap-2">
<button class="p-2 text-secondary hover:text-primary hover:bg-primary-container/20 rounded-lg transition-all"><span class="material-symbols-outlined" data-icon="edit">edit</span></button>
<button class="p-2 text-secondary hover:text-error hover:bg-error-container/20 rounded-lg transition-all"><span class="material-symbols-outlined" data-icon="delete">delete</span></button>
<button class="p-2 text-secondary hover:text-on-surface hover:bg-surface-container rounded-lg transition-all"><span class="material-symbols-outlined" data-icon="play_circle">play_circle</span></button>
</div>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="px-6 py-5">
<div class="flex items-center gap-3">
<div class="bg-secondary-container text-on-secondary-container font-bold px-3 py-1 rounded-md text-label-md">MASTERCLASS50</div>
<button class="text-outline hover:text-primary transition-colors">
<span class="material-symbols-outlined text-[18px]" data-icon="content_copy">content_copy</span>
</button>
</div>
</td>
<td class="px-6 py-5">
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-[#10b981] text-label-sm font-bold uppercase">
<span class="material-symbols-outlined text-[16px]" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                        Active
                                    </span>
</td>
<td class="px-6 py-5 font-body-md text-on-surface">50%</td>
<td class="px-6 py-5 font-body-md text-on-surface">Jan 15, 2025</td>
<td class="px-6 py-5">
<div class="flex flex-col gap-1.5 w-40">
<div class="flex justify-between text-label-sm text-secondary">
<span>192 / 200</span>
<span>96%</span>
</div>
<div class="w-full h-1.5 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-error rounded-full" style="width: 96%"></div>
</div>
</div>
</td>
<td class="px-6 py-5 text-right">
<div class="flex justify-end gap-2">
<button class="p-2 text-secondary hover:text-primary hover:bg-primary-container/20 rounded-lg transition-all"><span class="material-symbols-outlined" data-icon="edit">edit</span></button>
<button class="p-2 text-secondary hover:text-error hover:bg-error-container/20 rounded-lg transition-all"><span class="material-symbols-outlined" data-icon="delete">delete</span></button>
<button class="p-2 text-secondary hover:text-on-surface hover:bg-surface-container rounded-lg transition-all"><span class="material-symbols-outlined" data-icon="block">block</span></button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="p-6 bg-surface-container-lowest border-t border-outline-variant/20 flex items-center justify-between">
<p class="font-label-sm text-secondary">Showing 3 of 12 coupons</p>
<div class="flex gap-2">
<button class="px-4 py-2 text-label-sm font-bold text-secondary border border-outline-variant rounded-lg hover:bg-surface-container transition-all disabled:opacity-50" disabled="">Previous</button>
<button class="px-4 py-2 text-label-sm font-bold text-on-surface border border-outline-variant rounded-lg hover:bg-surface-container transition-all">Next</button>
</div>
</div>
</div>
</div>
<!-- Footer -->
<footer class="w-full py-stack-md mt-auto bg-surface-container-low border-t border-outline-variant/30 px-8 max-w-full mx-auto flex flex-col md:flex-row justify-between items-center gap-4">
<span class="font-label-md text-label-md font-bold text-on-surface">© 2024 Academia Pro Marketplace</span>
<div class="flex gap-8">
<a class="text-secondary hover:text-primary transition-colors hover:underline decoration-primary underline-offset-4 font-label-sm" href="#">Support</a>
<a class="text-secondary hover:text-primary transition-colors hover:underline decoration-primary underline-offset-4 font-label-sm" href="#">Privacy</a>
<a class="text-secondary hover:text-primary transition-colors hover:underline decoration-primary underline-offset-4 font-label-sm" href="#">Terms</a>
<a class="text-secondary hover:text-primary transition-colors hover:underline decoration-primary underline-offset-4 font-label-sm" href="#">API Documentation</a>
</div>
</footer>
</main>
<!-- Modal Backdrop -->
<div class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black/40 backdrop-blur-sm p-4" id="couponModal">
<!-- Create Coupon Modal Content -->
<div class="bg-surface-container-lowest w-full max-w-lg rounded-2xl shadow-xl overflow-hidden animate-in fade-in zoom-in duration-300">
<div class="px-8 py-6 border-b border-outline-variant/30 flex justify-between items-center">
<h2 class="font-headline-md text-headline-md text-on-surface">Create New Coupon</h2>
<button class="text-secondary hover:text-on-surface transition-colors p-1" onclick="toggleModal('couponModal')">
<span class="material-symbols-outlined" data-icon="close">close</span>
</button>
</div>
<form class="p-8 flex flex-col gap-6" onsubmit="event.preventDefault(); toggleModal('couponModal');">
<div class="flex flex-col gap-2">
<label class="font-label-md text-on-surface">Coupon Code</label>
<div class="relative">
<input class="w-full border-outline-variant rounded-xl p-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary transition-all uppercase" placeholder="e.g. SUMMER2024" type="text"/>
<button class="absolute right-3 top-3 text-primary font-label-sm hover:underline" type="button">Generate</button>
</div>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="flex flex-col gap-2">
<label class="font-label-md text-on-surface">Discount Percentage</label>
<div class="relative">
<input class="w-full border-outline-variant rounded-xl p-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary" placeholder="0" type="number"/>
<span class="absolute right-3 top-3 text-secondary">%</span>
</div>
</div>
<div class="flex flex-col gap-2">
<label class="font-label-md text-on-surface">Usage Limit</label>
<input class="w-full border-outline-variant rounded-xl p-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary" placeholder="500" type="number"/>
</div>
</div>
<div class="flex flex-col gap-2">
<label class="font-label-md text-on-surface">Expiration Date (Optional)</label>
<input class="w-full border-outline-variant rounded-xl p-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary" type="date"/>
</div>
<div class="flex flex-col gap-2">
<label class="font-label-md text-on-surface">Apply to Courses</label>
<select class="w-full border-outline-variant rounded-xl p-3 text-body-md focus:border-primary focus:ring-1 focus:ring-primary">
<option>All Current Courses</option>
<option>Advanced Web Architecture</option>
<option>Leadership for Tech Leads</option>
<option>System Design Fundamentals</option>
</select>
</div>
<div class="flex gap-4 mt-4">
<button class="flex-1 px-6 py-3 border border-outline-variant rounded-xl font-label-md hover:bg-surface-container transition-all active:scale-95" onclick="toggleModal('couponModal')" type="button">Cancel</button>
<button class="flex-1 px-6 py-3 bg-primary text-on-primary rounded-xl font-label-md shadow-md hover:bg-on-primary-fixed-variant transition-all active:scale-95" type="submit">Create Coupon</button>
</div>
</form>
</div>
</div>
<!-- Mobile Navigation (Bottom Bar) -->
<div class="md:hidden fixed bottom-0 left-0 w-full bg-surface-container-lowest border-t border-outline-variant/30 flex justify-around items-center h-16 px-4 z-50">
<button class="flex flex-col items-center text-secondary">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
<span class="text-[10px] font-label-sm">Home</span>
</button>
<button class="flex flex-col items-center text-secondary">
<span class="material-symbols-outlined" data-icon="school">school</span>
<span class="text-[10px] font-label-sm">Courses</span>
</button>
<button class="flex flex-col items-center text-primary">
<span class="material-symbols-outlined" data-icon="local_offer" style="font-variation-settings: 'FILL' 1;">local_offer</span>
<span class="text-[10px] font-label-sm">Coupons</span>
</button>
<button class="flex flex-col items-center text-secondary">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
<span class="text-[10px] font-label-sm">Settings</span>
</button>
</div>
<script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
            if (!modal.classList.contains('hidden')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        }

        // Close modal on outside click
        window.onclick = function(event) {
            const modal = document.getElementById('couponModal');
            if (event.target == modal) {
                toggleModal('couponModal');
            }
        }
    </script>
</body></html>