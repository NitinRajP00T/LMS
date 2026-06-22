<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Instructor Account Settings | Academia Pro</title>
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
                        "container-max": "1280px"
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
        body { background-color: #f8fafc; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .sidebar-active {
            transition: all 0.2s;
        }
        .card-level-1 {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
        }
    </style>
</head>
<body class="font-body-md text-on-surface">
<!-- TopNavBar -->
<header class="fixed top-0 w-full h-[72px] z-50 bg-surface/80 dark:bg-surface/80 backdrop-blur-md border-b border-outline-variant/30 shadow-sm">
<div class="flex justify-between items-center px-8 w-full max-w-container-max mx-auto h-full">
<div class="flex items-center gap-8">
<span class="font-headline-md text-headline-md font-bold text-primary">Academia Pro</span>
<nav class="hidden md:flex gap-6">
<a class="text-on-surface-variant hover:text-primary font-label-md transition-all duration-200" href="#">Courses</a>
<a class="text-on-surface-variant hover:text-primary font-label-md transition-all duration-200" href="#">Students</a>
<a class="text-on-surface-variant hover:text-primary font-label-md transition-all duration-200" href="#">Analytics</a>
</nav>
</div>
<div class="flex items-center gap-4">
<button class="p-2 text-primary hover:bg-surface-container-low rounded-full transition-all active:scale-95">
<span class="material-symbols-outlined" data-icon="chat">chat</span>
</button>
<button class="p-2 text-primary hover:bg-surface-container-low rounded-full transition-all active:scale-95">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
</button>
<div class="w-10 h-10 rounded-full overflow-hidden border border-outline-variant">
<img alt="Instructor Profile Avatar" class="w-full h-full object-cover" data-alt="A professional studio portrait of a confident middle-aged educator with a warm, approachable smile. The lighting is soft and high-key, emphasizing a clean, modern aesthetic suitable for a high-end corporate learning platform. The background is a neutral, out-of-focus office environment with soft blue and white tones, matching a professional development brand identity." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAD54eXBlF0YRrIFKza3W9EBMPaVREOqZYRktgAMOFSnvR5Jw2eEexju073PEhDdLgYZXIUlWUODM4q9XMo12wwhDKaRasJANESKoxj5OZGJXD_YR6m-Ds2j0QKJAdm6U_SC39G7GlaKd_BfE_O-y9h2UiNhjEYf789W4dlzWxpSTWOgNmjsYwAXsmoyzLLqBhaoH0fZc6eoHsNkQnm0LTnMabHagIBkRObsz7FJ_9yLzm5XVg690H_5DGCNZ2v-YpS18Xua9q3Fo1a"/>
</div>
</div>
</div>
</header>
<!-- SideNavBar -->
<aside class="fixed left-0 top-0 h-full w-64 pt-[72px] z-40 bg-surface-container-lowest shadow-sm hidden md:block">
<div class="flex flex-col gap-1 p-4 h-full overflow-y-auto">
<div class="px-4 py-6 mb-4">
<div class="flex items-center gap-3 mb-2">
<div class="w-12 h-12 rounded-lg bg-primary-container flex items-center justify-center text-on-primary-container">
<span class="material-symbols-outlined" data-icon="school" style="font-variation-settings: 'FILL' 1;">school</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm font-bold text-primary">Instructor Panel</h3>
<p class="text-label-sm text-secondary">Professional Tier</p>
</div>
</div>
</div>
<nav class="flex flex-col gap-1">
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container rounded-lg px-4 py-3 font-label-md transition-colors active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                    Dashboard
                </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container rounded-lg px-4 py-3 font-label-md transition-colors active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="school">school</span>
                    My Courses
                </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container rounded-lg px-4 py-3 font-label-md transition-colors active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="bar_chart">bar_chart</span>
                    Performance
                </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container rounded-lg px-4 py-3 font-label-md transition-colors active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="forum">forum</span>
                    Q&amp;A
                </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container rounded-lg px-4 py-3 font-label-md transition-colors active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="mail">mail</span>
                    Messages
                </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container rounded-lg px-4 py-3 font-label-md transition-colors active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="local_offer">local_offer</span>
                    Coupons
                </a>
<!-- Active Tab: Settings -->
<a class="flex items-center gap-3 bg-primary-container text-on-primary-container rounded-lg px-4 py-3 font-label-md" href="#">
<span class="material-symbols-outlined" data-icon="settings" style="font-variation-settings: 'FILL' 1;">settings</span>
                    Settings
                </a>
</nav>
<button class="mt-8 mx-4 bg-primary text-white font-label-md py-3 px-4 rounded-xl shadow-md hover:brightness-110 transition-all active:scale-95 flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-[20px]" data-icon="add">add</span>
                Create New Course
            </button>
</div>
</aside>
<!-- Main Content Canvas -->
<main class="md:pl-64 pt-[72px] min-h-screen">
<div class="max-w-4xl mx-auto px-8 py-10">
<!-- Page Header -->
<div class="mb-10">
<h1 class="font-headline-lg text-headline-lg text-on-surface mb-2">Account Settings</h1>
<p class="text-body-lg text-secondary">Manage your professional profile, notification preferences, and security credentials.</p>
</div>
<div class="flex flex-col gap-8">
<!-- 1. Profile Update Section -->
<section class="card-level-1 rounded-xl p-8 transition-all hover:shadow-sm">
<div class="flex items-center gap-3 mb-8">
<span class="material-symbols-outlined text-primary" data-icon="person">person</span>
<h2 class="font-headline-md text-headline-md text-on-surface">Profile Update</h2>
</div>
<div class="grid grid-cols-1 md:grid-cols-12 gap-10">
<!-- Avatar Upload -->
<div class="md:col-span-4 flex flex-col items-center gap-4">
<div class="relative group cursor-pointer">
<div class="w-32 h-32 rounded-full overflow-hidden border-4 border-surface-container-high ring-1 ring-outline-variant">
<img alt="Instructor Portrait" class="w-full h-full object-cover group-hover:opacity-75 transition-opacity" data-alt="A detailed, professional close-up of a corporate instructor in a light-filled modern office. The image has a clean, high-contrast look with soft bokeh backgrounds. The person is dressed in smart business casual attire. The overall mood is expert, trustworthy, and welcoming, designed for a premium educational platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIXuKZRMkYMqwme-6hxWKrxH_a4jEzLK-eMDG3lysVxhemDW1qD_hoTjbTG2r5exHAbrfrXiqV-_Lqd68x0De1GqshElV3V5-5q_znXnyDw-RcwojYr77WXz3bbT88EgICU5N5hzqVj9kh-zg-4NNKsgHmsPxKFed6C0oddjyEsYXNEitiJ1FeDU9iTIxvX8egx3Vnk592osbHMzfxv1nKBZnT_mavvjRPNgrU37iGhTkLty6egSXoFVQfIH2_jWFszXmFuALnEi7g"/>
</div>
<div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-on-surface/20 rounded-full">
<span class="material-symbols-outlined text-white text-[32px]" data-icon="photo_camera">photo_camera</span>
</div>
</div>
<div class="text-center">
<button class="text-primary font-label-md hover:underline">Change Photo</button>
<p class="text-label-sm text-secondary mt-1">JPG or PNG, max 2MB</p>
</div>
</div>
<!-- Name & Bio Inputs -->
<div class="md:col-span-8 flex flex-col gap-6">
<div>
<label class="block font-label-md text-on-surface-variant mb-2">Full Name</label>
<input class="w-full px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-body-md" placeholder="Enter your full name" type="text" value="Dr. Aris Thorne"/>
</div>
<div>
<label class="block font-label-md text-on-surface-variant mb-2">Professional Bio</label>
<textarea class="w-full px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-body-md resize-none" placeholder="Write a short professional biography..." rows="4">Senior Lead Instructor with 12+ years of experience in executive coaching and organizational psychology. Specializing in high-performance leadership frameworks.</textarea>
<p class="text-label-sm text-secondary mt-2">Brief bio for your public instructor profile.</p>
</div>
</div>
</div>
<div class="mt-8 pt-8 border-t border-outline-variant/30 flex justify-end">
<button class="bg-primary text-white font-label-md py-2.5 px-8 rounded-lg shadow-sm hover:brightness-110 active:scale-95 transition-all">Save Profile</button>
</div>
</section>
<!-- 2. Notification Settings -->
<section class="card-level-1 rounded-xl p-8 transition-all hover:shadow-sm">
<div class="flex items-center gap-3 mb-8">
<span class="material-symbols-outlined text-primary" data-icon="notifications_active">notifications_active</span>
<h2 class="font-headline-md text-headline-md text-on-surface">Notification Settings</h2>
</div>
<div class="flex flex-col gap-6 max-w-2xl">
<!-- Primary Notification Email -->
<div class="p-4 bg-surface-container-low rounded-lg border border-outline-variant/30">
<label class="block font-label-md text-on-surface-variant mb-2">Notification Email</label>
<div class="flex flex-col md:flex-row gap-3">
<input class="flex-grow px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-body-md" placeholder="Enter notification email" type="email" value="a.thorne@academia-pro.com"/>
<span class="bg-emerald-50 text-[#10b981] font-bold text-[12px] uppercase px-3 py-1 self-start md:self-center rounded flex items-center gap-1 shrink-0">
<span class="material-symbols-outlined text-[14px]" data-icon="check_circle" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                                    Verified
                                </span>
</div>
<p class="text-label-sm text-secondary mt-2">System-critical updates and student inquiries will be sent here.</p>
</div>
<!-- Secondary Emails (Laravel Queue Feature) -->
<div class="flex flex-col gap-4" id="secondary-emails-container">
<label class="block font-label-md text-on-surface-variant">Secondary Notification Addresses</label>
<div class="flex items-center gap-3 animate-in fade-in duration-300">
<input class="flex-grow px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-body-md" type="email" value="notifications@thorne-consulting.io"/>
<button class="p-3 text-error hover:bg-error-container/20 rounded-lg transition-colors">
<span class="material-symbols-outlined" data-icon="delete">delete</span>
</button>
</div>
<div id="new-email-slot"></div>
<button class="flex items-center gap-2 text-primary font-label-md hover:bg-primary/5 w-fit px-4 py-2 rounded-lg transition-colors border border-dashed border-primary/40" onclick="addEmailField()">
<span class="material-symbols-outlined" data-icon="add_circle">add_circle</span>
                                Add Secondary Email
                            </button>
</div>
<div class="mt-2 flex items-start gap-3 p-4 bg-secondary-container/20 rounded-lg border border-secondary-container/50">
<span class="material-symbols-outlined text-secondary" data-icon="info">info</span>
<p class="text-label-sm text-secondary">Multi-email notifications are processed asynchronously via our high-priority queue. Delivery is guaranteed across all endpoints.</p>
</div>
</div>
<div class="mt-8 pt-8 border-t border-outline-variant/30 flex justify-end">
<button class="bg-primary text-white font-label-md py-2.5 px-8 rounded-lg shadow-sm hover:brightness-110 active:scale-95 transition-all">Update Preferences</button>
</div>
</section>
<!-- 3. Security Section -->
<section class="card-level-1 rounded-xl p-8 transition-all hover:shadow-sm">
<div class="flex items-center gap-3 mb-8">
<span class="material-symbols-outlined text-primary" data-icon="shield">shield</span>
<h2 class="font-headline-md text-headline-md text-on-surface">Security</h2>
</div>
<div class="max-w-xl flex flex-col gap-6">
<div>
<label class="block font-label-md text-on-surface-variant mb-2">Current Password</label>
<input class="w-full px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-body-md" placeholder="••••••••••••" type="password"/>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div>
<label class="block font-label-md text-on-surface-variant mb-2">New Password</label>
<input class="w-full px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-body-md" placeholder="••••••••••••" type="password"/>
</div>
<div>
<label class="block font-label-md text-on-surface-variant mb-2">Confirm New Password</label>
<input class="w-full px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-body-md" placeholder="••••••••••••" type="password"/>
</div>
</div>
<div class="flex items-center gap-2">
<div class="flex-grow h-1 bg-surface-container rounded-full overflow-hidden">
<div class="w-2/3 h-full bg-amber-500"></div>
</div>
<span class="text-label-sm text-amber-600 font-bold">MEDIUM STRENGTH</span>
</div>
</div>
<div class="mt-8 pt-8 border-t border-outline-variant/30 flex justify-between items-center">
<button class="text-error font-label-md hover:underline decoration-error underline-offset-4">Deactivate Account</button>
<button class="bg-primary text-white font-label-md py-2.5 px-8 rounded-lg shadow-sm hover:brightness-110 active:scale-95 transition-all">Change Password</button>
</div>
</section>
</div>
</div>
</main>
<!-- Footer -->
<footer class="md:pl-64 w-full bg-surface-container-low border-t border-outline-variant/30 mt-12">
<div class="flex flex-col md:flex-row justify-between items-center px-8 max-w-container-max mx-auto gap-4 py-10">
<div class="flex items-center gap-4">
<span class="font-label-md font-bold text-on-surface">Academia Pro Marketplace</span>
<span class="text-label-sm text-secondary">© 2024</span>
</div>
<nav class="flex flex-wrap justify-center gap-6">
<a class="text-secondary hover:text-primary transition-colors text-label-sm" href="#">Support</a>
<a class="text-secondary hover:text-primary transition-colors text-label-sm" href="#">Privacy</a>
<a class="text-secondary hover:text-primary transition-colors text-label-sm" href="#">Terms</a>
<a class="text-secondary hover:text-primary transition-colors text-label-sm" href="#">API Documentation</a>
</nav>
</div>
</footer>
<script>
        function addEmailField() {
            const container = document.getElementById('new-email-slot');
            const div = document.createElement('div');
            div.className = 'flex items-center gap-3 mt-4 animate-in slide-in-from-top-2 duration-300';
            div.innerHTML = `
                <input type="email" placeholder="new.email@domain.com" class="flex-grow px-4 py-3 rounded-lg border border-outline-variant focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all text-body-md">
                <button onclick="this.parentElement.remove()" class="p-3 text-error hover:bg-error-container/20 rounded-lg transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            `;
            container.appendChild(div);
        }

        // Add a subtle ripple effect to buttons
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(e) {
                let ripple = document.createElement('span');
                ripple.classList.add('ripple');
                this.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });
    </script>
</body></html>