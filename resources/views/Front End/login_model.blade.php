<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Login | EduMarket</title>
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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            display: inline-block;
            vertical-align: middle;
        }
        .soft-lift {
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
        }
        .soft-lift:hover {
            box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1);
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }
        .input-glow:focus {
            box-shadow: 0 0 0 3px rgba(0, 74, 198, 0.1);
        }
    </style>
</head>
<body class="bg-surface font-body-md text-on-surface min-h-screen flex items-center justify-center p-margin-mobile md:p-margin-desktop">
<!-- Modal Overlay Backdrop (Dimmed) -->
<div class="fixed inset-0 bg-on-background/40 backdrop-blur-sm z-0"></div>
<!-- Login Modal Container -->
<main class="relative z-10 w-full max-w-[480px] bg-surface-container-lowest rounded-xl soft-lift overflow-hidden border border-outline-variant/30">
<!-- Top Section: Branding -->
<div class="px-8 pt-10 pb-6 text-center">
<div class="inline-flex items-center justify-center mb-6">
<span class="font-headline-md text-headline-md font-bold text-primary">EduMarket</span>
</div>
<h1 class="font-headline-sm text-headline-sm text-on-surface mb-2">Welcome Back</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Access your professional learning path</p>
</div>
<!-- Login Form Content -->
<div class="px-8 pb-10">
<form class="space-y-stack-md" id="loginForm" method="POST" action="{{ route('login') }}">
    @csrf
<!-- Email Field -->
<div class="space-y-2">
<label class="font-label-md text-label-md text-on-surface-variant" for="email">Email address</label>
<div class="relative">
<input class="w-full h-12 px-4 rounded-lg border border-outline-variant bg-surface-container-lowest text-on-surface placeholder:text-outline focus:outline-none focus:border-primary input-glow transition-all font-body-md text-body-md" id="email" name="email" placeholder="name@company.com" required="" type="email"/>
</div>
</div>
<!-- Password Field -->
<div class="space-y-2">
<div class="flex justify-between items-center">
<label class="font-label-md text-label-md text-on-surface-variant" for="password">Password</label>
<a class="font-label-md text-label-md text-primary hover:underline transition-all" href="#">Forgot password?</a>
</div>
<div class="relative">
<input class="w-full h-12 px-4 rounded-lg border border-outline-variant bg-surface-container-lowest text-on-surface placeholder:text-outline focus:outline-none focus:border-primary input-glow transition-all font-body-md text-body-md" id="password" name="password" placeholder="••••••••" required="" type="password"/>
<button class="absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors" onclick="togglePassword()" type="button">
<span class="material-symbols-outlined" id="passwordIcon">visibility</span>
</button>
</div>
</div>
<!-- Remember Me & Actions -->
<div class="flex items-center space-x-2">
<input class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary/20" id="remember" name="remember" type="checkbox"/>
<label class="font-label-md text-label-md text-on-surface-variant cursor-pointer" for="remember">Keep me logged in</label>
</div>
<!-- Primary Submit Button -->
<button class="w-full h-12 bg-primary text-on-primary font-label-md text-label-md rounded-lg hover:bg-primary/90 active:scale-[0.98] transition-all flex items-center justify-center gap-2" type="submit">
                    Login
                    <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</button>
</form>
<!-- Divider -->
<div class="relative my-8">
<div class="absolute inset-0 flex items-center">
<div class="w-full border-t border-outline-variant/50"></div>
</div>
<div class="relative flex justify-center text-label-sm text-label-sm">
<span class="px-4 bg-surface-container-lowest text-on-surface-variant">OR CONTINUE WITH</span>
</div>
</div>
<!-- Social Logins -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<button class="flex items-center justify-center gap-3 h-12 px-4 border border-outline-variant rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container-low transition-all active:scale-[0.98]">
<img alt="Google" class="w-5 h-5" data-alt="The official Google logo, a minimalist multicolored 'G' icon on a clean white circular background, representing a high-trust digital platform with a professional and modern aesthetic." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkftTH-mIgCe4WYQZnVORWMH2-TKItz_VG1MXjBIjnC4OA2CKHQG7Txq8NVbXuWP86LneB6MnOrKsxyIdKE0KHbNI_S3FnCQXLzB-WDER2JRitiL_SY-e55Ps_eu48vF0Lix9YPR5e5tgvyE3rCIOWq33HnYMBmZ6uQhNXnKApRo6sitBCPMZI9tHLwFf9WdiAscQa-0CAblDH16DfIziDAhUtpoUTKHx4KsyBLIfC5o0xLDpglSq0AB2-9zd3tfxFBeFMO4MNY3bQ"/>
                    Google
                </button>
<button class="flex items-center justify-center gap-3 h-12 px-4 border border-outline-variant rounded-lg font-label-md text-label-md text-on-surface hover:bg-surface-container-low transition-all active:scale-[0.98]">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">apps</span>
                    Apple
                </button>
</div>
</div>
<!-- Footer -->
<div class="px-8 py-6 bg-surface-container-low border-t border-outline-variant/30 text-center">
<p class="font-body-md text-body-md text-on-surface-variant">
                Don't have an account? 
                <a class="text-primary font-bold hover:underline" href="{{ route('register') }}">Sign Up</a>
</p>
</div>
</main>
<!-- Background Illustration (Atmospheric) -->
<div class="fixed bottom-0 right-0 p-10 opacity-10 pointer-events-none hidden lg:block">
<span class="material-symbols-outlined text-[400px] text-primary">school</span>
</div>
<script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('passwordIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.innerText = 'visibility_off';
            } else {
                passwordInput.type = 'password';
                passwordIcon.innerText = 'visibility';
            }
        }

        // Add subtle interaction effect to form fields
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('scale-[1.01]');
                input.parentElement.classList.add('transition-transform');
            });
            input.addEventListener('blur', () => {
                input.parentElement.classList.remove('scale-[1.01]');
            });
        });
    </script>
</body></html>