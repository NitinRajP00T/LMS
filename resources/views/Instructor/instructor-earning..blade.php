<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Earnings | Instructor Studio</title>
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
                    "error": "#ba1a1a",
                    "surface-container": "#e5eeff",
                    "surface-bright": "#f8f9ff",
                    "tertiary-container": "#6b6e70",
                    "outline-variant": "#c3c6d7",
                    "tertiary-fixed-dim": "#c4c7c9",
                    "surface-dim": "#cbdbf5",
                    "inverse-primary": "#b4c5ff",
                    "primary": "#004ac6",
                    "on-secondary-fixed-variant": "#3f465c",
                    "on-error": "#ffffff",
                    "surface-container-high": "#dce9ff",
                    "on-secondary-fixed": "#131b2e",
                    "on-error-container": "#93000a",
                    "inverse-surface": "#213145",
                    "on-primary-fixed-variant": "#003ea8",
                    "surface-tint": "#0053db",
                    "primary-container": "#2563eb",
                    "surface-container-low": "#eff4ff",
                    "on-primary": "#ffffff",
                    "surface": "#f8f9ff",
                    "tertiary-fixed": "#e0e3e5",
                    "on-primary-container": "#eeefff",
                    "surface-container-highest": "#d3e4fe",
                    "secondary-fixed": "#dae2fd",
                    "primary-fixed": "#dbe1ff",
                    "tertiary": "#525657",
                    "on-tertiary": "#ffffff",
                    "surface-variant": "#d3e4fe",
                    "outline": "#737686",
                    "error-container": "#ffdad6",
                    "on-tertiary-container": "#eff1f3",
                    "on-background": "#0b1c30",
                    "secondary-container": "#dae2fd",
                    "on-secondary-container": "#5c647a",
                    "inverse-on-surface": "#eaf1ff",
                    "background": "#f8f9ff",
                    "on-primary-fixed": "#00174b",
                    "secondary": "#565e74",
                    "secondary-fixed-dim": "#bec6e0",
                    "success": "#15803d"
            },
            "borderRadius": {
                    "DEFAULT": "0.25rem",
                    "lg": "0.5rem",
                    "xl": "0.75rem",
                    "full": "9999px"
            },
            "spacing": {
                    "stack-sm": "12px",
                    "stack-md": "24px",
                    "margin-mobile": "16px",
                    "container-max": "1280px",
                    "margin-desktop": "32px",
                    "gutter": "24px",
                    "stack-lg": "48px",
                    "base": "8px"
            },
            "fontFamily": {
                    "label-sm": ["Inter"],
                    "headline-lg-mobile": ["Inter"],
                    "display-lg": ["Inter"],
                    "body-md": ["Inter"],
                    "label-md": ["Inter"],
                    "headline-lg": ["Inter"],
                    "headline-md": ["Inter"],
                    "headline-sm": ["Inter"],
                    "body-lg": ["Inter"]
            },
            "fontSize": {
                    "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                    "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}],
                    "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                    "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                    "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                    "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}]
            }
          },
        },
      }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; }
        .glass-card { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(12px); border: 1px solid rgba(226, 232, 240, 0.8); }
        .chart-bar { transition: height 1s ease-out; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-background text-on-surface">
<!-- TopNavBar -->
<nav class="fixed top-0 w-full h-[72px] bg-white/80 dark:bg-surface-container-low/80 backdrop-blur-md border-b border-outline-variant/30 shadow-sm z-50">
<div class="flex justify-between items-center px-margin-desktop max-w-container-max mx-auto h-full">
<div class="flex items-center gap-stack-lg">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface dark:text-surface-bright">Instructor Studio</span>
<div class="hidden md:flex gap-stack-md">
<a class="text-secondary hover:text-primary transition-colors duration-200 font-body-md text-body-md" href="#">Dashboard</a>
<a class="text-secondary hover:text-primary transition-colors duration-200 font-body-md text-body-md" href="#">My Courses</a>
<a class="text-primary font-bold border-b-2 border-primary pb-1 font-body-md text-body-md" href="#">Performance</a>
<a class="text-secondary hover:text-primary transition-colors duration-200 font-body-md text-body-md" href="#">Resources</a>
</div>
</div>
<div class="flex items-center gap-stack-md">
<div class="hidden lg:flex items-center bg-surface-container-low rounded-full px-4 py-2 border border-outline-variant/30">
<span class="material-symbols-outlined text-outline">search</span>
<input class="bg-transparent border-none focus:ring-0 text-label-md px-2 w-48" placeholder="Search financials..." type="text"/>
</div>
<button class="text-primary border border-primary px-4 py-2 rounded-lg font-label-md hover:bg-primary-container hover:text-white transition-all">Public View</button>
<span class="material-symbols-outlined text-on-surface-variant cursor-pointer p-2 rounded-full hover:bg-surface-container-low">notifications</span>
<img alt="Instructor" class="w-10 h-10 rounded-full object-cover border-2 border-primary-fixed shadow-sm" data-alt="A professional headshot of a middle-aged male instructor with a warm, confident smile, set against a clean, blurred office background. The lighting is bright and high-key, maintaining a professional corporate modernism aesthetic with soft shadows and high-signal clarity. He wears a neutral-toned business casual shirt that fits the premium educational marketplace brand." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD--iqg9I_q6aJEaK2u5kQ9Vs45f6FKOB4rmTS0O9ndppMjKgWkbmqbaX_xGo5hCh97ZD0qAlhNqNaZXmaV0iPK0Lb04dpFrnUDnQBVnbicNpEBJFTICbcoy_WbAAfUk_UevMQ_D8HdYfIm4_C0wxjy4CkbTwAAq-QoyUuEjmUhfC13vPXnNZWogxEOuKhW9Rb0ZWO3KKNtxS-C2ecbfHkzaOssxU-u1AiIJSb6zHu-emC0oZc4guoqr2qetuf8-idiCT3kKrMdxrPn"/>
</div>
</div>
</nav>
<main class="mt-[72px] min-h-screen max-w-container-max mx-auto px-margin-mobile md:px-margin-desktop py-stack-lg">
<!-- Header & Action -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-stack-md mb-stack-lg">
<div>
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Earnings</h1>
<p class="text-on-surface-variant font-body-md text-body-md">Manage your revenue, track performance, and request withdrawals.</p>
</div>
<button class="bg-primary text-on-primary px-stack-md py-3 rounded-lg font-label-md flex items-center gap-2 shadow-sm hover:translate-y-[-2px] hover:shadow-md transition-all active:scale-95">
<span class="material-symbols-outlined">payments</span>
                Request Withdrawal
            </button>
</div>
<!-- Summary Bento Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-stack-lg">
<!-- Total Lifetime -->
<div class="glass-card rounded-xl p-stack-md flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<span class="text-on-surface-variant font-label-md text-label-md uppercase tracking-wider">Total Earnings</span>
<div class="w-10 h-10 rounded-full bg-success/10 flex items-center justify-center">
<span class="material-symbols-outlined text-success">account_balance_wallet</span>
</div>
</div>
<p class="font-display-lg text-display-lg text-on-surface">$42,890.50</p>
</div>
<div class="mt-4 flex items-center text-success font-label-md text-label-md">
<span class="material-symbols-outlined text-[18px] mr-1">trending_up</span>
<span>Lifetime performance</span>
</div>
</div>
<!-- Available Balance -->
<div class="glass-card rounded-xl p-stack-md border-l-4 border-l-primary flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<span class="text-on-surface-variant font-label-md text-label-md uppercase tracking-wider">Current Balance</span>
<div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
<span class="material-symbols-outlined text-primary">currency_exchange</span>
</div>
</div>
<p class="font-display-lg text-display-lg text-on-surface">$3,420.00</p>
</div>
<p class="mt-4 text-on-surface-variant font-label-sm text-label-sm italic">Available for immediate withdrawal</p>
</div>
<!-- Monthly Comparison -->
<div class="glass-card rounded-xl p-stack-md flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<span class="text-on-surface-variant font-label-md text-label-md uppercase tracking-wider">Monthly Revenue</span>
<div class="w-10 h-10 rounded-full bg-tertiary/10 flex items-center justify-center">
<span class="material-symbols-outlined text-tertiary">calendar_month</span>
</div>
</div>
<div class="flex items-baseline gap-2">
<p class="font-headline-lg text-headline-lg text-on-surface">$5,240</p>
<span class="text-success font-label-md text-label-md flex items-center">
<span class="material-symbols-outlined text-[16px]">arrow_upward</span>
                            12%
                        </span>
</div>
</div>
<div class="mt-4 space-y-2">
<div class="flex justify-between text-label-sm text-on-surface-variant">
<span>This Month</span>
<span class="font-bold text-on-surface">$5,240</span>
</div>
<div class="flex justify-between text-label-sm text-on-surface-variant">
<span>Last Month</span>
<span class="text-on-surface">$4,680</span>
</div>
</div>
</div>
</div>
<!-- Main Dashboard Content -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Revenue Chart -->
<div class="lg:col-span-8 glass-card rounded-xl p-stack-md">
<div class="flex items-center justify-between mb-stack-lg">
<h3 class="font-headline-sm text-headline-sm">Revenue Overview</h3>
<select class="bg-surface-container-low border-none rounded-lg text-label-md focus:ring-primary">
<option>Last 12 Months</option>
<option>Last 6 Months</option>
</select>
</div>
<div class="relative h-[300px] flex items-end justify-between gap-2 px-2 pb-8 border-b border-outline-variant/30">
<!-- Grid Lines -->
<div class="absolute inset-0 flex flex-col justify-between py-8 opacity-20 pointer-events-none">
<div class="border-b border-outline w-full"></div>
<div class="border-b border-outline w-full"></div>
<div class="border-b border-outline w-full"></div>
<div class="border-b border-outline w-full"></div>
</div>
<!-- Chart Bars -->
<div class="flex flex-col items-center flex-1">
<div class="chart-bar w-full max-w-[40px] bg-primary/20 hover:bg-primary rounded-t-lg" style="height: 45%;"></div>
<span class="absolute bottom-2 text-label-sm text-on-surface-variant">Jan</span>
</div>
<div class="flex flex-col items-center flex-1">
<div class="chart-bar w-full max-w-[40px] bg-primary/20 hover:bg-primary rounded-t-lg" style="height: 55%;"></div>
<span class="absolute bottom-2 text-label-sm text-on-surface-variant">Feb</span>
</div>
<div class="flex flex-col items-center flex-1">
<div class="chart-bar w-full max-w-[40px] bg-primary/20 hover:bg-primary rounded-t-lg" style="height: 50%;"></div>
<span class="absolute bottom-2 text-label-sm text-on-surface-variant">Mar</span>
</div>
<div class="flex flex-col items-center flex-1">
<div class="chart-bar w-full max-w-[40px] bg-primary/20 hover:bg-primary rounded-t-lg" style="height: 70%;"></div>
<span class="absolute bottom-2 text-label-sm text-on-surface-variant">Apr</span>
</div>
<div class="flex flex-col items-center flex-1">
<div class="chart-bar w-full max-w-[40px] bg-primary/20 hover:bg-primary rounded-t-lg" style="height: 85%;"></div>
<span class="absolute bottom-2 text-label-sm text-on-surface-variant">May</span>
</div>
<div class="flex flex-col items-center flex-1">
<div class="chart-bar w-full max-w-[40px] bg-primary rounded-t-lg shadow-lg" style="height: 95%;"></div>
<span class="absolute bottom-2 font-bold text-label-sm text-primary">Jun</span>
</div>
</div>
</div>
<!-- Recent Transactions Sidebar -->
<div class="lg:col-span-4 glass-card rounded-xl p-stack-md">
<div class="flex items-center justify-between mb-stack-md">
<h3 class="font-headline-sm text-headline-sm">Sales Log</h3>
<a class="text-primary text-label-md hover:underline" href="#">View All</a>
</div>
<div class="space-y-4">
<!-- Transaction Item -->
<div class="flex items-center justify-between p-3 rounded-lg hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center">
<span class="material-symbols-outlined text-primary">school</span>
</div>
<div>
<p class="font-label-md text-label-md truncate w-32">Advanced UI Design</p>
<p class="text-label-sm text-on-surface-variant">June 14, 2024</p>
</div>
</div>
<div class="text-right">
<p class="font-label-md text-label-md text-on-surface">+$84.00</p>
<p class="text-[10px] text-on-surface-variant uppercase">Net</p>
</div>
</div>
<!-- Transaction Item -->
<div class="flex items-center justify-between p-3 rounded-lg hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center">
<span class="material-symbols-outlined text-primary">code</span>
</div>
<div>
<p class="font-label-md text-label-md truncate w-32">Fullstack Bootcamp</p>
<p class="text-label-sm text-on-surface-variant">June 13, 2024</p>
</div>
</div>
<div class="text-right">
<p class="font-label-md text-label-md text-on-surface">+$125.50</p>
<p class="text-[10px] text-on-surface-variant uppercase">Net</p>
</div>
</div>
<!-- Transaction Item -->
<div class="flex items-center justify-between p-3 rounded-lg hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-lg bg-surface-container-high flex items-center justify-center">
<span class="material-symbols-outlined text-primary">palette</span>
</div>
<div>
<p class="font-label-md text-label-md truncate w-32">Color Theory Pro</p>
<p class="text-label-sm text-on-surface-variant">June 12, 2024</p>
</div>
</div>
<div class="text-right">
<p class="font-label-md text-label-md text-on-surface">+$42.20</p>
<p class="text-[10px] text-on-surface-variant uppercase">Net</p>
</div>
</div>
</div>
</div>
<!-- Withdrawal History Table -->
<div class="lg:col-span-12 glass-card rounded-xl overflow-hidden mt-gutter">
<div class="px-stack-md py-4 border-b border-outline-variant/30 flex justify-between items-center">
<h3 class="font-headline-sm text-headline-sm">Withdrawal History</h3>
<div class="flex gap-2">
<button class="p-2 rounded-lg border border-outline-variant/50 hover:bg-surface-container-low">
<span class="material-symbols-outlined text-[20px]">filter_list</span>
</button>
<button class="p-2 rounded-lg border border-outline-variant/50 hover:bg-surface-container-low">
<span class="material-symbols-outlined text-[20px]">download</span>
</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="bg-surface-container-low/50">
<th class="px-stack-md py-4 font-label-md text-label-md text-on-surface-variant">Date</th>
<th class="px-stack-md py-4 font-label-md text-label-md text-on-surface-variant">Reference ID</th>
<th class="px-stack-md py-4 font-label-md text-label-md text-on-surface-variant">Amount</th>
<th class="px-stack-md py-4 font-label-md text-label-md text-on-surface-variant">Method</th>
<th class="px-stack-md py-4 font-label-md text-label-md text-on-surface-variant">Status</th>
<th class="px-stack-md py-4 font-label-md text-label-md text-on-surface-variant text-right">Action</th>
</tr>
</thead>
<tbody class="divide-y divide-outline-variant/20">
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="px-stack-md py-4 font-body-md text-body-md">Jun 01, 2024</td>
<td class="px-stack-md py-4 text-on-surface-variant font-label-md">#WD-8921-X9</td>
<td class="px-stack-md py-4 font-bold text-on-surface">$2,100.00</td>
<td class="px-stack-md py-4 flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[20px]">account_balance</span>
                                    Bank Transfer
                                </td>
<td class="px-stack-md py-4">
<span class="px-3 py-1 rounded-full bg-success/10 text-success text-label-sm font-semibold">Completed</span>
</td>
<td class="px-stack-md py-4 text-right">
<button class="text-primary hover:bg-primary/10 p-2 rounded-full transition-colors">
<span class="material-symbols-outlined">receipt_long</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="px-stack-md py-4 font-body-md text-body-md">May 15, 2024</td>
<td class="px-stack-md py-4 text-on-surface-variant font-label-md">#WD-8412-Z2</td>
<td class="px-stack-md py-4 font-bold text-on-surface">$1,450.00</td>
<td class="px-stack-md py-4 flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[20px]">payments</span>
                                    PayPal
                                </td>
<td class="px-stack-md py-4">
<span class="px-3 py-1 rounded-full bg-success/10 text-success text-label-sm font-semibold">Completed</span>
</td>
<td class="px-stack-md py-4 text-right">
<button class="text-primary hover:bg-primary/10 p-2 rounded-full transition-colors">
<span class="material-symbols-outlined">receipt_long</span>
</button>
</td>
</tr>
<tr class="hover:bg-surface-container-low/30 transition-colors">
<td class="px-stack-md py-4 font-body-md text-body-md">May 02, 2024</td>
<td class="px-stack-md py-4 text-on-surface-variant font-label-md">#WD-7719-M4</td>
<td class="px-stack-md py-4 font-bold text-on-surface">$3,200.00</td>
<td class="px-stack-md py-4 flex items-center gap-2">
<span class="material-symbols-outlined text-secondary text-[20px]">account_balance</span>
                                    Bank Transfer
                                </td>
<td class="px-stack-md py-4">
<span class="px-3 py-1 rounded-full bg-surface-dim text-on-secondary-container text-label-sm font-semibold animate-pulse">Pending</span>
</td>
<td class="px-stack-md py-4 text-right">
<button class="text-outline cursor-not-allowed p-2 rounded-full">
<span class="material-symbols-outlined">more_horiz</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-stack-md py-4 bg-surface-container-low/20 flex items-center justify-between border-t border-outline-variant/20">
<span class="text-label-sm text-on-surface-variant">Showing 3 of 12 withdrawals</span>
<div class="flex gap-2">
<button class="px-3 py-1 border border-outline-variant rounded-lg text-label-sm disabled:opacity-50" disabled="">Previous</button>
<button class="px-3 py-1 border border-outline-variant rounded-lg text-label-sm hover:bg-surface-container-high">Next</button>
</div>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="mt-stack-lg border-t border-outline-variant/20 bg-surface-dim dark:bg-surface-container-lowest py-stack-md">
<div class="flex flex-col md:flex-row justify-between items-center px-margin-desktop max-w-container-max mx-auto gap-4">
<span class="font-headline-sm text-headline-sm font-bold text-primary">EduMarket</span>
<p class="font-label-sm text-label-sm text-on-surface-variant">© 2024 EduMarket Instructor Studio. All rights reserved.</p>
<div class="flex gap-stack-md">
<a class="text-on-surface-variant hover:text-primary underline font-label-sm text-label-sm transition-all opacity-80 hover:opacity-100" href="#">Privacy Policy</a>
<a class="text-on-surface-variant hover:text-primary underline font-label-sm text-label-sm transition-all opacity-80 hover:opacity-100" href="#">Terms of Service</a>
<a class="text-on-surface-variant hover:text-primary underline font-label-sm text-label-sm transition-all opacity-80 hover:opacity-100" href="#">Support</a>
</div>
</div>
</footer>
<script>
        // Simple Chart Interaction
        const bars = document.querySelectorAll('.chart-bar');
        bars.forEach(bar => {
            bar.addEventListener('mouseenter', () => {
                bar.classList.add('shadow-lg', 'scale-x-105');
            });
            bar.addEventListener('mouseleave', () => {
                bar.classList.remove('shadow-lg', 'scale-x-105');
            });
        });

        // Toggle mobile nav (placeholder)
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 20) {
                nav.classList.add('shadow-md');
                nav.classList.remove('shadow-sm');
            } else {
                nav.classList.add('shadow-sm');
                nav.classList.remove('shadow-md');
            }
        });
    </script>
</body></html>