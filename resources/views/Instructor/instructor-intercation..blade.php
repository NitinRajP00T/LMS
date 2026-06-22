<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Academia Pro | Instructor Q&amp;A &amp; Chat Center</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<!-- Tailwind Configuration -->
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
                    "container-max": "1440px"
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
      }
      .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
      }
      .custom-scrollbar::-webkit-scrollbar-track {
        background: transparent;
      }
      .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #e2e8f0;
        border-radius: 10px;
      }
      .connector-line {
        position: absolute;
        left: 20px;
        top: 48px;
        bottom: 0;
        width: 1px;
        background-color: #e2e8f0;
      }
      .message-bubble-sent {
        box-shadow: 0px 4px 12px rgba(37, 99, 235, 0.1);
      }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md min-h-screen flex flex-col">
<!-- TopNavBar -->
<header class="bg-surface/80 backdrop-blur-md fixed top-0 w-full h-[72px] z-50 border-b border-outline-variant/30 shadow-sm">
<div class="flex justify-between items-center px-margin-desktop w-full max-w-container-max mx-auto h-full px-8">
<div class="flex items-center gap-8">
<span class="font-headline-md text-headline-md font-bold text-primary">Academia Pro</span>
<div class="hidden md:flex items-center gap-6">
<a class="text-on-surface-variant hover:text-primary transition-all duration-200 font-label-md text-label-md" href="#">Courses</a>
<a class="text-primary border-b-2 border-primary pb-1 font-label-md text-label-md" href="#">Q&amp;A &amp; Chat</a>
<a class="text-on-surface-variant hover:text-primary transition-all duration-200 font-label-md text-label-md" href="#">Analytics</a>
</div>
</div>
<div class="flex items-center gap-4">
<button class="p-2 hover:bg-surface-container-low rounded-full transition-all duration-200 active:scale-95 relative">
<span class="material-symbols-outlined text-secondary" data-icon="chat">chat</span>
<span class="absolute top-1.5 right-1.5 w-2 h-2 bg-primary rounded-full ring-2 ring-surface"></span>
</button>
<button class="p-2 hover:bg-surface-container-low rounded-full transition-all duration-200 active:scale-95 relative">
<span class="material-symbols-outlined text-secondary" data-icon="notifications">notifications</span>
<span class="absolute top-1.5 right-1.5 w-4 h-4 bg-error text-white text-[10px] flex items-center justify-center rounded-full ring-2 ring-surface font-bold">3</span>
</button>
<div class="h-10 w-10 rounded-full overflow-hidden border border-outline-variant/30">
<img alt="Instructor Profile Avatar" data-alt="A professional portrait of a female instructor in her late 30s, wearing a modern charcoal blazer. She is set against a clean, minimalist office background with soft cinematic lighting. The image conveys authority, approachability, and professional excellence, matching a high-end corporate education aesthetic with cool blue and neutral gray tones." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmjQBpMaWS9Bx5aM4bEJnvjXNX43VjW8UUrbWgnewFXuXA-gWOS8pjoQ11Ea69CE11v66afXAaMxtr48x811IenXtVeNzfNAefO2f8AaUeIhFHGk9x2Rtyh0xUW3lHstnEI8Avsg1kLyIH_4-mTRD_gPeIGJVDAKWxuoA3E1ljRo4mYJqlXVJ7ti4x3vBFDm2r2Lk78lQ8EMRVUexuV4Oc_HH0idNhURzPQYREREyFDnTV-ozirSF4OobRoBwHCvtOFIG3jdgk35dl"/>
</div>
</div>
</div>
</header>
<!-- Main Content Wrapper -->
<div class="flex pt-[72px] h-screen overflow-hidden">
<!-- SideNavBar -->
<aside class="hidden lg:flex flex-col w-64 bg-surface-container-lowest border-r border-outline-variant/30 h-full overflow-y-auto">
<div class="p-6 flex flex-col gap-4">
<div class="flex items-center gap-3 mb-4">
<img class="w-12 h-12 rounded-lg object-cover" data-alt="Close-up professional portrait of a senior instructor with a warm, confident expression. The lighting is bright and modern, emphasizing clarity and trust. The overall palette is composed of soft whites and professional blues, reflecting a high-tier corporate education platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAwZit3t2TRA0_g5v_XhbqihzZKuurQUzDr22OllzTEIcjilxU0PpL_TkII0b-rxNMqaXE7TRe5b1BD9DdOp3ijgQTUZZsdRl3bvDZQnJ24lXQmoYJvtU2wxbwaOEZ7Qy_vaNhfbEVXIr9KxlC9e_sMN7k2Gsos4DWeZ8t1cD8Z9z8A-JKpinVG8MR0L5y__MvpKGjuVKA6tRoP5Xyr1vlWe5o2pfJhq4iGSUzglAiN2T9lPN9uF17ZaTFos7mUbXwwAW45hStxft7t"/>
<div>
<p class="font-label-md text-label-md text-on-surface font-bold">Instructor Panel</p>
<p class="text-[12px] text-secondary">Professional Tier</p>
</div>
</div>
<nav class="flex flex-col gap-1">
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container rounded-lg px-4 py-3 font-label-md text-label-md transition-all duration-200 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                        Dashboard
                    </a>
<a class="flex items-center gap-3 bg-primary-container text-on-primary-container rounded-lg px-4 py-3 font-label-md text-label-md transition-all duration-200" href="#">
<span class="material-symbols-outlined" data-icon="forum">forum</span>
                        Q&amp;A
                    </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container rounded-lg px-4 py-3 font-label-md text-label-md transition-all duration-200 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="mail">mail</span>
                        Messages
                    </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container rounded-lg px-4 py-3 font-label-md text-label-md transition-all duration-200 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="school">school</span>
                        My Courses
                    </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container rounded-lg px-4 py-3 font-label-md text-label-md transition-all duration-200 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="bar_chart">bar_chart</span>
                        Performance
                    </a>
<a class="flex items-center gap-3 text-secondary hover:bg-surface-container rounded-lg px-4 py-3 font-label-md text-label-md transition-all duration-200 active:translate-x-1" href="#">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
                        Settings
                    </a>
</nav>
<button class="mt-8 bg-primary text-white rounded-lg py-3 px-4 font-label-md text-label-md hover:bg-primary/90 transition-all flex items-center justify-center gap-2 shadow-md">
<span class="material-symbols-outlined text-[20px]" data-icon="add">add</span>
                    Create New Course
                </button>
</div>
</aside>
<!-- Main Workspace: Split View -->
<main class="flex-1 flex overflow-hidden">
<!-- Left Panel: Courses/Threads List -->
<div class="w-full md:w-[380px] border-r border-outline-variant/30 flex flex-col bg-surface-container-lowest">
<div class="p-6 border-b border-outline-variant/30">
<div class="flex items-center justify-between mb-4">
<h2 class="font-headline-md text-headline-md text-on-surface">Inbox</h2>
<div class="flex gap-1 p-1 bg-surface-container-low rounded-lg">
<button class="px-4 py-1.5 text-label-sm rounded-md bg-white shadow-sm text-primary" id="tab-qa" onclick="toggleTab('qa')">Q&amp;A</button>
<button class="px-4 py-1.5 text-label-sm rounded-md text-secondary hover:text-on-surface" id="tab-dm" onclick="toggleTab('dm')">Direct</button>
</div>
</div>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-secondary text-[20px]" data-icon="search">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container-low border-none rounded-xl text-body-md focus:ring-2 focus:ring-primary/20 placeholder:text-secondary/60" placeholder="Search discussions..." type="text"/>
</div>
</div>
<div class="flex-1 overflow-y-auto custom-scrollbar" id="sidebar-list">
<!-- Thread Item: Active Question -->
<div class="p-4 border-b border-outline-variant/10 bg-primary-container/5 border-l-4 border-l-primary cursor-pointer hover:bg-primary-container/10 transition-colors">
<div class="flex justify-between items-start mb-2">
<span class="px-3 py-1 bg-amber-50 text-[#f59e0b] text-[10px] font-bold rounded-full uppercase tracking-wider flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]" data-icon="help">help</span>
                                Unresolved
                            </span>
<span class="text-label-sm text-secondary">24m ago</span>
</div>
<h3 class="font-label-md text-label-md text-on-surface font-bold line-clamp-1">Advanced React Patterns: Hook Optimization</h3>
<p class="text-body-md text-secondary text-sm mt-1 line-clamp-2">"How can I prevent unnecessary re-renders when using deep nested context providers in my..."</p>
<div class="flex items-center gap-2 mt-3">
<div class="w-6 h-6 rounded-full overflow-hidden">
<img data-alt="A close-up avatar of a male student looking thoughtful. Soft, bright lighting in a clean workspace environment. Professional and modern visual style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuArJxM5PelT_NliKgBCNAN8DYjLgLZqJeala6-9EADpV0L0_EGDgz7HSaMHxAjGbszpRcZrXkO85svmWkiiLwUdsuSL5PzMAGpcyf7eXIGFYhxBrIeIzpJMrs0OL1xTrJUj0iOwJFbodfCcN6EIjbh99iEXEus2fss4XFtB4dUmSChzWoZReHOG3kJ4zzDWWURGl6Lk1-aVM8tdhNBaJomsgvRYSd6NoeRDXEB91zbp5Pk5m5aEs8tXh5dRTlF0-pZlvPN2fpQIxFlX"/>
</div>
<span class="text-label-sm text-on-surface-variant">Alex Johnson</span>
</div>
</div>
<!-- Thread Item: Resolved -->
<div class="p-4 border-b border-outline-variant/10 cursor-pointer hover:bg-surface-container-low transition-colors">
<div class="flex justify-between items-start mb-2">
<span class="px-3 py-1 bg-emerald-50 text-[#10b981] text-[10px] font-bold rounded-full uppercase tracking-wider flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]" data-icon="check_circle">check_circle</span>
                                Resolved
                            </span>
<span class="text-label-sm text-secondary">2h ago</span>
</div>
<h3 class="font-label-md text-label-md text-on-surface font-bold line-clamp-1">UI/UX Strategy: Executive Figma Workflows</h3>
<p class="text-body-md text-secondary text-sm mt-1 line-clamp-2">"Is there a plugin for auto-generating documentation for design systems in Figma?"</p>
<div class="flex items-center gap-2 mt-3">
<div class="w-6 h-6 rounded-full overflow-hidden">
<img data-alt="Female student profile picture with a professional and friendly expression. Clear lighting, high-quality digital aesthetic, neutral professional background." src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4lI_RJoC5sIAInW23JH6agYqaP-6jo52Mso4fYnzL8K_Q1CjyiIpEBg6Kl08S-rzy8tKiG3pvWzMLzpWFm9c8pAd6Pw6JaPj94WfBRQ_6Y4PxuTv2KItBwpW0Aqrxv5VdFhGFWSUWKKmDKahq4ExXkuoDbnGJtLqguEImTeYQ1A1mZp-eUiS9CGum2atMV9fQUeVFfZBMtjKIGg0X9MOkP-xXve6P7tBrR7GAjlLiQ8xBLXbe2XVpYmfj8Nuw_N_aEzvn4sexBi1p"/>
</div>
<span class="text-label-sm text-on-surface-variant">Sarah Chen</span>
</div>
</div>
<!-- DM Student List (Hidden by default, shown on toggle) -->
<div class="hidden" id="dm-list">
<div class="p-4 flex items-center gap-4 cursor-pointer hover:bg-surface-container-low border-b border-outline-variant/10">
<div class="relative">
<img class="w-12 h-12 rounded-full object-cover" data-alt="Male student avatar with a bright, energetic presence. Soft studio lighting. Professional, clean-cut aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuDUH9-lMO6ytyGJYloP7gh0YTTTk6M83NfsfaJBdA3dqHb3p-qnc8rbTSPrLZWm_ENAdI1LfYTKmhn99IzOMqOF5hUiEvNlmSraAzOamYkQ_PJ4c0HLOxM7kGtPrgdqRNoBpkZ8nM5kY7kKZR7qU6pri0ght6I36flV5cb0u6cNgqczU1lc0dy6dr3xApPLK3aEhBoEGLpN1skbO-90XI4u4XdLm_ss0yrY7vS-4kNPsCFSJM0OGVNTQv2GbH0HmK8enHE9MHCrlY9i"/>
<span class="absolute bottom-0 right-0 w-3 h-3 bg-[#10b981] rounded-full border-2 border-white"></span>
</div>
<div class="flex-1">
<div class="flex justify-between items-center">
<span class="font-label-md text-on-surface font-bold">Marcus Sterling</span>
<span class="text-[10px] text-secondary">Just now</span>
</div>
<p class="text-sm text-secondary line-clamp-1">That clarification on the API was exactly what I needed!</p>
</div>
</div>
</div>
</div>
</div>
<!-- Right Panel: Discussion/Chat Area -->
<div class="flex-1 flex flex-col bg-surface-bright relative">
<!-- Thread Header -->
<div class="px-8 py-5 bg-white border-b border-outline-variant/30 flex items-center justify-between">
<div>
<nav class="flex items-center gap-2 text-label-sm text-secondary mb-1">
<span>Courses</span>
<span class="material-symbols-outlined text-[14px]" data-icon="chevron_right">chevron_right</span>
<span>Advanced React Patterns</span>
</nav>
<h1 class="font-headline-md text-headline-md text-on-surface">Hook Optimization &amp; Performance</h1>
</div>
<div class="flex items-center gap-3">
<button class="flex items-center gap-2 px-4 py-2 border border-outline text-secondary rounded-lg font-label-md hover:bg-surface-container-low transition-colors">
<span class="material-symbols-outlined text-[18px]" data-icon="archive">archive</span>
                            Archive
                        </button>
<button class="flex items-center gap-2 px-4 py-2 bg-emerald-50 text-[#10b981] border border-[#10b981]/20 rounded-lg font-label-md hover:bg-emerald-100 transition-colors">
<span class="material-symbols-outlined text-[18px]" data-icon="check_circle">check_circle</span>
                            Mark as Resolved
                        </button>
</div>
</div>
<!-- Messages Thread -->
<div class="flex-1 overflow-y-auto p-8 custom-scrollbar space-y-8">
<!-- Question (Level 1 Card) -->
<div class="bg-white p-6 rounded-xl border border-outline-variant/50 shadow-sm">
<div class="flex items-start gap-4 mb-4">
<img class="w-12 h-12 rounded-full object-cover" data-alt="Student profile photo with clear lighting and a thoughtful expression. Minimalist and modern tech aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuAm1zHzN1LtVUSN_Vcg75Lpavczpi4Y1lOlAlhlW4tGgMihbOzevczfT4lIEp7xR64fDdpre-hdC7hMNZ9l37MCqO9MEzBPD3BuFlrbbK_eEnWJGbWYekFmswyZMndQ8QjiBlhpfR8L7CgO5iZfFl3-rTV1Pn2dRtpbh7x0KJkoNycH0PDp3hh8CXxe9C3p1BUUgucMBs6-qufjn9YcqJbFGaT4JtcP-meuxicbFKm2oVAPIruFpuNeKnqg7z5pp4CqGUQ7m4Hi7r8D"/>
<div>
<p class="font-label-md text-label-md text-on-surface font-bold">Alex Johnson</p>
<p class="text-label-sm text-secondary">Student • Advanced Tier</p>
</div>
<span class="ml-auto text-label-sm text-secondary">Posted Oct 24, 10:15 AM</span>
</div>
<div class="text-body-lg text-on-surface-variant leading-relaxed">
<p>Hi Professor, I've been working through the performance module. I'm hitting a wall with <code class="bg-surface-container-low px-1.5 py-0.5 rounded text-primary font-mono text-sm">useMemo</code> in a nested list structure. When the parent state updates, the memoized components are still re-rendering even though their props haven't changed. Could this be related to the referential identity of the callbacks being passed down?</p>
</div>
</div>
<!-- Replies Area with Threading -->
<div class="space-y-6 relative ml-thread-indent">
<div class="connector-line"></div>
<!-- Instructor Reply (Sent Bubble Style) -->
<div class="flex flex-col items-end gap-2">
<div class="message-bubble-sent bg-primary text-white p-4 rounded-2xl rounded-tr-none max-w-2xl text-body-md">
<p>Great catch, Alex. This is a common pitfall. If you're passing inline arrow functions as props, their referential identity changes every render. You need to wrap those callbacks in <code class="bg-white/20 px-1 py-0.5 rounded font-mono text-sm">useCallback</code> as well to maintain stability for <code class="bg-white/20 px-1 py-0.5 rounded font-mono text-sm">React.memo</code> to work.</p>
</div>
<div class="flex items-center gap-2">
<span class="text-[10px] text-secondary uppercase font-bold tracking-widest">You • 10:42 AM</span>
<span class="material-symbols-outlined text-[14px] text-primary" data-icon="done_all" style="font-variation-settings: 'FILL' 1;">done_all</span>
</div>
</div>
<!-- Follow-up (Received Bubble Style) -->
<div class="flex flex-col items-start gap-2">
<div class="flex items-center gap-3 mb-1">
<img class="w-8 h-8 rounded-full border border-outline-variant/30" data-alt="Small student profile avatar thumbnail. High-key lighting, professional aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBECA_ugLPX-Mu8nOUYjc0woiLW9kNHL7lvb3GTYNzfrkCGjuEwJptPCwVp1QGoQbkJsNu66ffT5zeNxceTq2BGVsOEp8imO_Q4MOyIK4tI6-vEJEbm3DICe1BxAEoEhe12ekf6mds__QsLaCJck0lMGJ8CkORJGPy5jK2d3xjS84ZDaY6huf0Vx32853CHcZR-EYvffWQdHLWGdg9bFZppZaeVSsoh3afhupe2H2iUphc2U4iQczWudGeltQVeXGf4dfyHORCR0b_l"/>
<span class="text-label-sm text-on-surface-variant font-bold">Alex Johnson</span>
</div>
<div class="bg-white border border-outline-variant text-on-surface p-4 rounded-2xl rounded-tl-none max-w-2xl text-body-md shadow-sm">
<p>Aha! That makes total sense. I was only memoizing the data, not the actions. Let me try implementing <code class="bg-surface-container-low px-1.5 py-0.5 rounded font-mono text-sm">useCallback</code> now. Thanks for the quick reply!</p>
</div>
<span class="text-[10px] text-secondary uppercase font-bold tracking-widest">10:55 AM</span>
</div>
</div>
</div>
<!-- Persistent Reply Field -->
<div class="p-6 bg-white border-t border-outline-variant/30">
<div class="max-w-4xl mx-auto relative">
<div class="border border-outline-variant rounded-xl focus-within:ring-2 focus-within:ring-primary focus-within:border-primary transition-all bg-surface-bright group" id="reply-input-container">
<textarea class="w-full p-4 bg-transparent border-none focus:ring-0 text-body-md resize-none custom-scrollbar" placeholder="Write a response..." rows="2"></textarea>
<div class="flex items-center justify-between px-4 py-3 border-t border-outline-variant/10">
<div class="flex items-center gap-2">
<button class="p-2 text-secondary hover:text-primary hover:bg-surface-container rounded-lg transition-colors">
<span class="material-symbols-outlined text-[20px]" data-icon="format_bold">format_bold</span>
</button>
<button class="p-2 text-secondary hover:text-primary hover:bg-surface-container rounded-lg transition-colors">
<span class="material-symbols-outlined text-[20px]" data-icon="attach_file">attach_file</span>
</button>
<button class="p-2 text-secondary hover:text-primary hover:bg-surface-container rounded-lg transition-colors">
<span class="material-symbols-outlined text-[20px]" data-icon="image">image</span>
</button>
</div>
<button class="bg-primary text-white px-6 py-2 rounded-lg font-label-md hover:bg-primary/90 transition-all flex items-center gap-2 active:scale-95 shadow-md">
                                    Send Reply
                                    <span class="material-symbols-outlined text-[18px]" data-icon="send">send</span>
</button>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
<!-- Footer -->
<footer class="bg-surface-container-low w-full py-6 mt-auto border-t border-outline-variant/30">
<div class="flex flex-col md:flex-row justify-between items-center px-margin-desktop max-w-container-max mx-auto gap-4">
<span class="font-label-md text-label-md font-bold text-on-surface">Academia Pro</span>
<div class="flex items-center gap-6">
<a class="text-secondary hover:text-primary transition-colors font-label-sm text-label-sm" href="#">Support</a>
<a class="text-secondary hover:text-primary transition-colors font-label-sm text-label-sm" href="#">Privacy</a>
<a class="text-secondary hover:text-primary transition-colors font-label-sm text-label-sm" href="#">Terms</a>
<a class="text-secondary hover:text-primary transition-colors font-label-sm text-label-sm" href="#">API Documentation</a>
</div>
<p class="text-secondary font-label-sm text-label-sm">© 2024 Academia Pro Marketplace</p>
</div>
</footer>
<script>
        function toggleTab(type) {
            const qaBtn = document.getElementById('tab-qa');
            const dmBtn = document.getElementById('tab-dm');
            const sidebarList = document.getElementById('sidebar-list');
            const dmList = document.getElementById('dm-list');

            if (type === 'qa') {
                qaBtn.classList.add('bg-white', 'shadow-sm', 'text-primary');
                qaBtn.classList.remove('text-secondary');
                dmBtn.classList.remove('bg-white', 'shadow-sm', 'text-primary');
                dmBtn.classList.add('text-secondary');
                
                // Show Q&A list items, hide DMs (Simulated)
                Array.from(sidebarList.children).forEach(child => {
                    if (child.id === 'dm-list') child.classList.add('hidden');
                    else child.classList.remove('hidden');
                });
            } else {
                dmBtn.classList.add('bg-white', 'shadow-sm', 'text-primary');
                dmBtn.classList.remove('text-secondary');
                qaBtn.classList.remove('bg-white', 'shadow-sm', 'text-primary');
                qaBtn.classList.add('text-secondary');

                // Hide Q&A list items, show DMs
                Array.from(sidebarList.children).forEach(child => {
                    if (child.id === 'dm-list') child.classList.remove('hidden');
                    else child.classList.add('hidden');
                });
            }
        }

        // Add a micro-interaction for the reply container focus
        const textarea = document.querySelector('textarea');
        const container = document.getElementById('reply-input-container');
        
        textarea.addEventListener('focus', () => {
            container.style.boxShadow = '0 10px 25px rgba(0, 74, 198, 0.05)';
        });
        
        textarea.addEventListener('blur', () => {
            container.style.boxShadow = 'none';
        });
    </script>
</body></html>