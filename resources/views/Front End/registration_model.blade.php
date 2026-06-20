<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Sign Up | EduMarket</title>
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
                        "surface-container-high": "#dce9ff",
                        "outline-variant": "#c3c6d7",
                        "inverse-primary": "#b4c5ff",
                        "tertiary-container": "#6b6e70",
                        "tertiary": "#525657",
                        "error-container": "#ffdad6",
                        "primary-container": "#2563eb",
                        "surface-tint": "#0053db",
                        "surface-dim": "#cbdbf5",
                        "on-error": "#ffffff",
                        "tertiary-fixed-dim": "#c4c7c9",
                        "surface-container-highest": "#d3e4fe",
                        "on-secondary-container": "#5c647a",
                        "surface-container": "#e5eeff",
                        "surface-variant": "#d3e4fe",
                        "secondary-container": "#dae2fd",
                        "on-primary-container": "#eeefff",
                        "on-tertiary": "#ffffff",
                        "on-surface": "#0b1c30",
                        "primary-fixed": "#dbe1ff",
                        "error": "#ba1a1a",
                        "surface": "#f8f9ff",
                        "secondary-fixed-dim": "#bec6e0",
                        "secondary": "#565e74",
                        "on-tertiary-container": "#eff1f3",
                        "background": "#f8f9ff",
                        "on-background": "#0b1c30",
                        "on-tertiary-fixed": "#191c1e",
                        "on-secondary-fixed-variant": "#3f465c",
                        "on-secondary-fixed": "#131b2e",
                        "on-error-container": "#93000a",
                        "surface-container-low": "#eff4ff",
                        "outline": "#737686",
                        "on-primary-fixed-variant": "#003ea8",
                        "on-surface-variant": "#434655",
                        "inverse-surface": "#213145",
                        "surface-container-lowest": "#ffffff",
                        "on-secondary": "#ffffff",
                        "inverse-on-surface": "#eaf1ff",
                        "surface-bright": "#f8f9ff",
                        "primary-fixed-dim": "#b4c5ff",
                        "tertiary-fixed": "#e0e3e5",
                        "secondary-fixed": "#dae2fd",
                        "primary": "#004ac6",
                        "on-tertiary-fixed-variant": "#444749",
                        "on-primary-fixed": "#00174b",
                        "on-primary": "#ffffff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "stack-lg": "48px",
                        "base": "8px",
                        "stack-md": "24px",
                        "margin-mobile": "16px",
                        "gutter": "24px",
                        "stack-sm": "12px",
                        "margin-desktop": "32px",
                        "container-max": "1280px"
                    },
                    "fontFamily": {
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "display-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-md": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "headline-lg": ["Inter"],
                        "headline-sm": ["Inter"]
                    },
                    "fontSize": {
                        "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                        "display-lg": ["48px", {"lineHeight": "1.1", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "label-sm": ["12px", {"lineHeight": "1", "fontWeight": "500"}],
                        "label-md": ["14px", {"lineHeight": "1", "letterSpacing": "0.01em", "fontWeight": "600"}],
                        "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                        "headline-lg-mobile": ["24px", {"lineHeight": "1.2", "fontWeight": "700"}],
                        "headline-lg": ["32px", {"lineHeight": "1.2", "letterSpacing": "-0.01em", "fontWeight": "700"}],
                        "headline-sm": ["20px", {"lineHeight": "1.4", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .auth-backdrop {
            background-image: radial-gradient(circle at 2px 2px, #c3c6d7 1px, transparent 0);
            background-size: 40px 40px;
        }
    </style>
</head>
<body class="bg-surface text-on-surface min-h-screen flex items-center justify-center p-margin-mobile md:p-margin-desktop auth-backdrop">
<!-- Modal Container -->
<div class="w-full max-w-[480px] bg-surface-container-lowest rounded-xl shadow-[0px_10px_30px_rgba(15,23,42,0.1)] overflow-hidden animate-in fade-in zoom-in duration-300">
<!-- Header / Logo Section -->
<div class="px-stack-md pt-stack-lg pb-stack-sm flex flex-col items-center text-center">
<div class="mb-stack-sm">
<span class="font-headline-md text-headline-md font-bold text-primary">EduMarket</span>
</div>
<h1 class="font-headline-sm text-headline-sm text-on-surface mb-2">Create your account</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Empower your professional journey with expert-led courses.</p>
</div>
<div class="px-stack-md pb-stack-lg">
<!-- Social Sign Up -->
<div class="grid grid-cols-2 gap-gutter mb-stack-md">
<button class="flex items-center justify-center gap-2 py-3 px-4 border border-outline-variant rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container-high transition-all active:scale-[0.98]">
<svg class="w-5 h-5" viewbox="0 0 24 24">
<path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
<path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
<path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"></path>
<path d="M12 5.38c1.62 0 3.06.56 4.21 1.66l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"></path>
</svg>
                    Google
                </button>
<button class="flex items-center justify-center gap-2 py-3 px-4 border border-outline-variant rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container-high transition-all active:scale-[0.98]">
<svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24">
<path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.11.74.82 0 2.04-.89 3.63-.72 1.45.15 2.58.74 3.28 1.76-3.04 1.75-2.54 5.92.51 7.21-.6 1.48-1.39 2.93-2.53 3.98zM12.03 7.25c-.07-2.05 1.69-3.83 3.65-3.92.21 2.21-2.14 4.14-3.65 3.92z"></path>
</svg>
                    Apple
                </button>
</div>
<div class="relative flex items-center mb-stack-md">
<div class="flex-grow border-t border-outline-variant"></div>
<span class="flex-shrink mx-4 text-label-sm font-label-sm text-outline capitalize">or sign up with email</span>
<div class="flex-grow border-t border-outline-variant"></div>
</div>
<!-- Registration Form -->
<form class="space-y-4" id="registrationForm" method="POST" action="{{ route('register') }}">
    @csrf
    
    <!-- Role Selector -->
    <div class="space-y-1 mb-4">
        <label class="block font-label-md text-label-md text-on-surface-variant">I want to:</label>
        <div class="flex gap-4">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="role" value="student" class="text-primary" checked>
                <span>Learn (Student)</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="role" value="instructor" class="text-primary">
                <span>Teach (Instructor)</span>
            </label>
        </div>
    </div>
<!-- Full Name -->
<div class="space-y-1">
<label class="block font-label-md text-label-md text-on-surface-variant" for="fullName">Full Name</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline-variant">person</span>
<input class="w-full pl-10 pr-4 py-3 bg-transparent border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary transition-all outline-none font-body-md text-body-md text-on-surface" id="fullName" name="fullName" placeholder="Jane Doe" required="" type="text"/>
</div>
</div>
<!-- Email -->
<div class="space-y-1">
<label class="block font-label-md text-label-md text-on-surface-variant" for="email">Email address</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline-variant">mail</span>
<input class="w-full pl-10 pr-4 py-3 bg-transparent border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary transition-all outline-none font-body-md text-body-md text-on-surface" id="email" name="email" placeholder="jane@example.com" required="" type="email"/>
</div>
</div>
<!-- Password -->
<div class="space-y-1">
<label class="block font-label-md text-label-md text-on-surface-variant" for="password">Password</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline-variant">lock</span>
<input class="w-full pl-10 pr-10 py-3 bg-transparent border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary-container focus:border-primary transition-all outline-none font-body-md text-body-md text-on-surface" id="password" name="password" placeholder="Min. 8 characters" required="" type="password"/>
<button class="absolute right-3 top-1/2 -translate-y-1/2 text-outline hover:text-primary transition-colors" onclick="togglePasswordVisibility()" type="button">
<span class="material-symbols-outlined" id="passIcon">visibility</span>
</button>
</div>
<!-- Password Strength -->
<div class="pt-2">
<div class="flex gap-1 h-1.5 mb-1">
<div class="flex-1 rounded-full bg-outline-variant transition-colors duration-300" id="strength-1"></div>
<div class="flex-1 rounded-full bg-outline-variant transition-colors duration-300" id="strength-2"></div>
<div class="flex-1 rounded-full bg-outline-variant transition-colors duration-300" id="strength-3"></div>
<div class="flex-1 rounded-full bg-outline-variant transition-colors duration-300" id="strength-4"></div>
</div>
<p class="font-label-sm text-label-sm text-on-surface-variant" id="strength-text">Enter a password</p>
</div>
</div>
<!-- Terms -->
<div class="flex items-start gap-3 py-2">
<div class="pt-0.5">
<input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary-container cursor-pointer" id="terms" name="terms" required="" type="checkbox"/>
</div>
<label class="font-label-sm text-label-sm text-on-surface-variant leading-tight" for="terms">
                        I agree to the <a class="text-primary hover:underline" href="#">Terms &amp; Conditions</a> and <a class="text-primary hover:underline" href="#">Privacy Policy</a>.
                    </label>
</div>
<!-- Action Button -->
<button class="w-full py-3.5 bg-primary-container text-on-primary-container rounded-lg font-label-md text-label-md shadow-sm hover:shadow-md hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-2" type="submit">
                    Create Account
                    <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</button>
</form>
<!-- Footer Link -->
<div class="mt-stack-md text-center">
<p class="font-body-md text-body-md text-on-surface-variant">
                    Already have an account? 
                    <a class="text-primary font-bold hover:underline" href="{{ route('login') }}">Log In</a>
</p>
</div>
</div>
</div>
<!-- Micro-interactions & Logic -->
<script>
        function togglePasswordVisibility() {
            const passInput = document.getElementById('password');
            const icon = document.getElementById('passIcon');
            if (passInput.type === 'password') {
                passInput.type = 'text';
                icon.innerText = 'visibility_off';
            } else {
                passInput.type = 'password';
                icon.innerText = 'visibility';
            }
        }

        const passwordInput = document.getElementById('password');
        const strengthLevels = [
            document.getElementById('strength-1'),
            document.getElementById('strength-2'),
            document.getElementById('strength-3'),
            document.getElementById('strength-4')
        ];
        const strengthText = document.getElementById('strength-text');

        passwordInput.addEventListener('input', function() {
            const val = this.value;
            let strength = 0;
            
            if (val.length > 0) strength = 1;
            if (val.length >= 8) strength = 2;
            if (/[A-Z]/.test(val) && /[0-9]/.test(val)) strength = 3;
            if (/[^A-Za-z0-9]/.test(val) && val.length >= 10) strength = 4;

            strengthLevels.forEach((el, idx) => {
                if (idx < strength) {
                    if (strength === 1) el.className = 'flex-1 rounded-full bg-error';
                    else if (strength === 2) el.className = 'flex-1 rounded-full bg-orange-400';
                    else if (strength === 3) el.className = 'flex-1 rounded-full bg-surface-tint';
                    else el.className = 'flex-1 rounded-full bg-emerald-500';
                } else {
                    el.className = 'flex-1 rounded-full bg-outline-variant';
                }
            });

            const labels = ['Enter a password', 'Weak', 'Fair', 'Good', 'Strong'];
            strengthText.innerText = labels[strength];
            
            if (strength === 1) strengthText.className = 'font-label-sm text-label-sm text-error';
            else if (strength > 1) strengthText.className = 'font-label-sm text-label-sm text-on-surface-variant';
        });

        // document.getElementById('registrationForm').addEventListener('submit', (e) => {
        //     // e.preventDefault();
        //     // Implement registration logic
        //     // alert('Form submitted successfully!');
        // });
    </script>
</body></html>