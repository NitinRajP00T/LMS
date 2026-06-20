<!DOCTYPE html>

<html class="scroll-smooth" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Course Completed | EduMarket</title>
@include('components.theme.head')
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .confetti-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 10;
        }
        .soft-lift {
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .soft-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1);
        }
        .certificate-container {
            aspect-ratio: 1.414 / 1;
            background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
        }
        .star-rating input:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: #fbbf24;
        }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md selection:bg-primary-fixed selection:text-on-primary-fixed">
<!-- TopNavBar -->
<header class="fixed top-0 w-full z-50 h-[72px] bg-surface/80 backdrop-blur-md border-b border-outline-variant shadow-sm flex items-center">
<div class="flex items-center justify-between px-margin-desktop max-w-container-max mx-auto w-full">
<div class="flex items-center gap-stack-lg">
<a class="text-headline-md font-headline-md font-bold text-primary" href="#">EduMarket</a>
<nav class="hidden lg:flex items-center gap-stack-md">
<a class="text-on-surface-variant hover:text-primary font-body-md transition-all duration-200" href="#">Courses</a>
<a class="text-on-surface-variant hover:text-primary font-body-md transition-all duration-200" href="#">Instructors</a>
<a class="text-on-surface-variant hover:text-primary font-body-md transition-all duration-200" href="#">Enterprise</a>
<a class="text-primary font-bold border-b-2 border-primary font-body-md" href="#">My Learning</a>
</nav>
</div>
<div class="flex items-center gap-stack-md">
<div class="hidden md:flex items-center bg-surface-container-low px-4 py-2 rounded-full border border-outline-variant">
<span class="material-symbols-outlined text-on-surface-variant mr-2">search</span>
<input class="bg-transparent border-none focus:ring-0 text-body-md w-48" placeholder="Search courses..." type="text"/>
</div>
<div class="flex items-center gap-stack-sm">
<button class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container-low rounded-full transition-all">shopping_cart</button>
<button class="material-symbols-outlined p-2 text-on-surface-variant hover:bg-surface-container-low rounded-full transition-all">notifications</button>
<div class="w-10 h-10 rounded-full overflow-hidden border-2 border-primary/20 cursor-pointer hover:scale-105 transition-transform">
<img alt="User profile" data-alt="A professional headshot of a student in a business-casual navy blue sweater, smiling warmly. The lighting is soft and studio-quality with a clean, light gray background that emphasizes high trust and professionalism in an educational platform setting." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBFgjQbv8P2hwWf4S0YZXv_UOC5RVWvsaG3sIYgO2B5a2EIG8T3jcesNT01HS-uZr-FAvYn9m-QC41cKXXkxUOz0bLc3jmJOm1Pgikpxpdby3MNbnGSV_MXONNHuyo8X6Ha57VpMvKywjMKt7FgkEG60UGeFvfozvtbYrXlJXE6wmCCCYx1mHYRtPS1-I1LemYRmMOuQuS2bPE9evhCHznlZLJFgy03vWWx-NicKcYVOoFudAdGbkpwOt0fuKgcJftT1uafu5SDfcbZ"/>
</div>
</div>
</div>
</div>
</header>
<main class="pt-[72px] min-h-screen">
<!-- Celebration Hero Section -->
<section class="relative bg-surface-container-lowest overflow-hidden py-stack-lg lg:py-24">
<canvas class="confetti-canvas" id="confetti"></canvas>
<div class="max-w-container-max mx-auto px-margin-desktop text-center relative z-20">
<div class="inline-flex items-center justify-center w-20 h-20 bg-primary/10 rounded-full mb-stack-md animate-bounce">
<span class="material-symbols-outlined text-primary text-[40px]" style="font-variation-settings: 'FILL' 1;">workspace_premium</span>
</div>
<h1 class="font-display-lg text-display-lg text-on-surface mb-4 lg:mb-6">Congratulations, Alex!</h1>
<p class="font-headline-md text-headline-md text-on-surface-variant max-w-2xl mx-auto">
                    You've mastered <span class="text-primary font-bold">Advanced Full-Stack Web Development</span>. You are now part of the top 1% of learners who completed this rigorous program.
                </p>
</div>
</section>
<!-- Certificate Preview & Actions -->
<section class="py-stack-lg bg-background">
<div class="max-w-container-max mx-auto px-margin-desktop">
<div class="grid lg:grid-cols-12 gap-gutter items-start">
<!-- Certificate Display -->
<div class="lg:col-span-8">
<div class="bg-surface-container-lowest p-stack-md md:p-stack-lg rounded-xl soft-lift border border-outline-variant">
<div class="certificate-container border-[12px] border-primary/5 p-8 md:p-12 relative flex flex-col items-center text-center overflow-hidden">
<!-- Certificate Watermark/Pattern -->
<div class="absolute inset-0 opacity-[0.03] pointer-events-none select-none flex items-center justify-center">
<span class="text-[200px] font-bold rotate-[-30deg]">EDUMARKET</span>
</div>
<div class="relative z-10 w-full h-full flex flex-col justify-between">
<div class="flex justify-between items-start">
<div class="text-left">
<p class="font-bold text-primary text-headline-sm">EduMarket</p>
<p class="text-label-sm text-on-surface-variant">CERTIFICATE OF COMPLETION</p>
</div>
<div class="w-16 h-16 opacity-20">
<span class="material-symbols-outlined text-[64px]">verified_user</span>
</div>
</div>
<div class="my-stack-lg">
<p class="font-body-md text-on-surface-variant italic mb-2">This acknowledges that</p>
<h2 class="font-display-lg text-headline-lg text-on-surface uppercase tracking-widest mb-4 border-b-2 border-primary/20 pb-4 inline-block">Alex J. Richardson</h2>
<p class="font-body-md text-on-surface-variant mb-2">has successfully completed the professional course</p>
<h3 class="font-headline-md text-primary font-bold">Advanced Full-Stack Web Development</h3>
</div>
<div class="flex flex-col md:flex-row justify-between items-end gap-stack-md text-left">
<div>
<p class="text-label-sm text-on-surface-variant">DATE</p>
<p class="font-bold">October 24, 2024</p>
</div>
<div class="text-center">
<div class="w-32 h-px bg-on-surface-variant/40 mb-2 mx-auto"></div>
<p class="text-label-sm text-on-surface-variant">INSTRUCTOR SIGNATURE</p>
</div>
<div class="text-right">
<p class="text-label-sm text-on-surface-variant">CERTIFICATE ID</p>
<p class="font-mono text-label-md">EDM-2024-FS-99182-AX</p>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Certificate Actions -->
<div class="lg:col-span-4 space-y-stack-md">
<div class="bg-surface-container-low p-stack-md rounded-xl border border-outline-variant">
<h4 class="font-headline-sm text-headline-sm mb-4">Official Credentials</h4>
<p class="text-body-md text-on-surface-variant mb-6">Your certificate is verified and can be shared on professional networks or included in your digital portfolio.</p>
<div class="space-y-3">
<button class="w-full flex items-center justify-center gap-2 bg-primary text-on-primary py-3 rounded-lg font-label-md hover:bg-primary/90 transition-colors">
<span class="material-symbols-outlined">download</span>
                                    Download Certificate (PDF)
                                </button>
<button class="w-full flex items-center justify-center gap-2 bg-surface-container-lowest text-primary border border-primary py-3 rounded-lg font-label-md hover:bg-primary/5 transition-colors">
<span class="material-symbols-outlined">share</span>
                                    Add to LinkedIn
                                </button>
<button class="w-full flex items-center justify-center gap-2 text-on-surface-variant font-label-md py-2 hover:underline">
<span class="material-symbols-outlined">link</span>
                                    Copy Verification Link
                                </button>
</div>
</div>
<!-- Rating Section -->
<div class="bg-surface-container-lowest p-stack-md rounded-xl border border-outline-variant soft-lift">
<h4 class="font-headline-sm text-headline-sm mb-4">Rate this Course</h4>
<div class="flex flex-col gap-4">
<div class="flex justify-center gap-2 star-rating">
<input class="hidden" id="star5" name="rating" type="radio" value="5"/>
<label class="material-symbols-outlined cursor-pointer text-[32px] text-outline-variant hover:scale-110 transition-transform" for="star5">star</label>
<input class="hidden" id="star4" name="rating" type="radio" value="4"/>
<label class="material-symbols-outlined cursor-pointer text-[32px] text-outline-variant hover:scale-110 transition-transform" for="star4">star</label>
<input class="hidden" id="star3" name="rating" type="radio" value="3"/>
<label class="material-symbols-outlined cursor-pointer text-[32px] text-outline-variant hover:scale-110 transition-transform" for="star3">star</label>
<input class="hidden" id="star2" name="rating" type="radio" value="2"/>
<label class="material-symbols-outlined cursor-pointer text-[32px] text-outline-variant hover:scale-110 transition-transform" for="star2">star</label>
<input class="hidden" id="star1" name="rating" type="radio" value="1"/>
<label class="material-symbols-outlined cursor-pointer text-[32px] text-outline-variant hover:scale-110 transition-transform" for="star1">star</label>
</div>
<textarea class="w-full h-24 p-3 border border-outline-variant rounded-lg text-body-md focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all resize-none" placeholder="Share your experience with other learners..."></textarea>
<button class="w-full bg-on-surface text-surface-container-lowest py-3 rounded-lg font-label-md hover:opacity-90 transition-opacity">Submit Review</button>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- What's Next? Section -->
<section class="py-stack-lg bg-surface-container-low">
<div class="max-w-container-max mx-auto px-margin-desktop">
<div class="flex items-end justify-between mb-stack-lg">
<div>
<h2 class="font-headline-lg text-headline-lg mb-2">What's Next?</h2>
<p class="text-on-surface-variant text-body-lg">Recommended follow-up courses to expand your expertise.</p>
</div>
<a class="text-primary font-bold hover:underline hidden md:block" href="#">View all recommendations</a>
</div>
<div class="grid md:grid-cols-3 gap-gutter">
<!-- Recommended Course 1 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden soft-lift border border-outline-variant group">
<div class="aspect-video relative overflow-hidden">
<img alt="Cloud Architecture" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A sophisticated digital visualization of a cloud computing network with glowing blue data nodes and interconnected lines. The style is professional, high-tech, and minimal, featuring a clean white background with subtle depth and cinematic soft lighting consistent with a premium educational platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBfZAR-DTuq0vKUdF2hzbjWKmCefiC7509zLujoHnvaJmtXuhGrvia4xIa66IChg6m9qDMACdjNLYJa-p5LS4qBZ09FSEPBZBAmiuYst0PjiHrR2itz8zY1cq8aWVu8XlB7kkSJuH_mvZ4va_GeNibD2S3NaJ0H2ueWEZ3N5WqeZ4RvDh3unuShGcQ0V8OB1RDv7Q9aS6GXPefzfb5vK3PY5-UHNCuP2eGKlc3mE_YaTWQPFeXh4KqzJUT1JHSZZimaNeH355-2ks4p"/>
<div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-2 py-1 rounded text-label-sm font-bold text-primary">BESTSELLER</div>
</div>
<div class="p-stack-md">
<h3 class="font-headline-sm text-headline-sm mb-2 group-hover:text-primary transition-colors line-clamp-2">Cloud Architecture &amp; Scalable Systems</h3>
<p class="text-on-surface-variant text-label-md mb-4">Dr. Sarah Jenkins</p>
<div class="flex items-center gap-1 mb-4">
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-bold text-label-md">4.9</span>
<span class="text-on-surface-variant text-label-sm">(12.4k reviews)</span>
</div>
<div class="flex items-center justify-between">
<span class="text-primary font-bold text-headline-sm">$94.99</span>
<button class="p-2 rounded-full bg-primary/5 text-primary hover:bg-primary hover:text-white transition-all">
<span class="material-symbols-outlined">add_shopping_cart</span>
</button>
</div>
</div>
</div>
<!-- Recommended Course 2 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden soft-lift border border-outline-variant group">
<div class="aspect-video relative overflow-hidden">
<img alt="Data Science" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="A clean, editorial-style data visualization dashboard with elegant line charts and bar graphs in shades of primary blue and neutral slate. The image has a crisp, high-resolution aesthetic with soft shadows and a bright, modern lighting scheme suitable for a high-end corporate training platform." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvoo5RtVX5RpVnKRiP3CBMMObBKlkCqPY2jOF2Wc9IX5LzKCPLzrJu_qsLyA2mwmKkaCyRdZizsbbxs74iW_wktHJqjS31-ZcbhcSUaRSjqImuKZ4FnbPzWgzNaeoBxJVHvesNsgF5pXUkLWydDoXI4DCJpyETm9zTxQSRXTZDarvYDy1hPyg9Uq-uA1N9RVxbsCjsZMJ65VaDG5j1v7Ex2FwFz_DbUvGnJjHKElg_G7-TgQwFPKkpoK6C1LxHUx0XlabCWa8cv0er"/>
<div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-2 py-1 rounded text-label-sm font-bold text-secondary">INTERMEDIATE</div>
</div>
<div class="p-stack-md">
<h3 class="font-headline-sm text-headline-sm mb-2 group-hover:text-primary transition-colors line-clamp-2">Enterprise Data Science &amp; ML Ops</h3>
<p class="text-on-surface-variant text-label-md mb-4">Marcus Thorne</p>
<div class="flex items-center gap-1 mb-4">
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-bold text-label-md">4.8</span>
<span class="text-on-surface-variant text-label-sm">(8.2k reviews)</span>
</div>
<div class="flex items-center justify-between">
<span class="text-primary font-bold text-headline-sm">$89.99</span>
<button class="p-2 rounded-full bg-primary/5 text-primary hover:bg-primary hover:text-white transition-all">
<span class="material-symbols-outlined">add_shopping_cart</span>
</button>
</div>
</div>
</div>
<!-- Recommended Course 3 -->
<div class="bg-surface-container-lowest rounded-xl overflow-hidden soft-lift border border-outline-variant group">
<div class="aspect-video relative overflow-hidden">
<img alt="Cybersecurity" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="An abstract representation of cybersecurity featuring a glowing shield icon constructed from binary code and digital particles. The lighting is sophisticated with dark navy and bright primary blue highlights, creating a high-trust, secure, and professional technological atmosphere in a clean digital style." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBJ0GDZbFug21qG8zb8aAdZKy07r0F2e_1PnZSDAtlLviGsXXnWFYEReFSgndHHSnl2bqnTFVC7k-ytVLfjqiH6aJfwpNATaqatBy6HFMX8LR2oQvY3C67axbgMACn2yAEL2hFc9POQQg0w83NgXkt6aakbjD8ubJH8jPRzINMVeloafyUdyKsn1elBuTMhP2jpRetUBWkAVPDw7TDLqaiLEwzi-Ot1lLk1NUf98JdKCwSQtGDEy7z1_avlIcPp_r_Hv3bSUI5fONNr"/>
<div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-2 py-1 rounded text-label-sm font-bold text-error">ADVANCED</div>
</div>
<div class="p-stack-md">
<h3 class="font-headline-sm text-headline-sm mb-2 group-hover:text-primary transition-colors line-clamp-2">Cybersecurity for Full-Stack Engineers</h3>
<p class="text-on-surface-variant text-label-md mb-4">Elena Rodriguez</p>
<div class="flex items-center gap-1 mb-4">
<span class="material-symbols-outlined text-yellow-500 text-sm" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="font-bold text-label-md">5.0</span>
<span class="text-on-surface-variant text-label-sm">(3.1k reviews)</span>
</div>
<div class="flex items-center justify-between">
<span class="text-primary font-bold text-headline-sm">$109.99</span>
<button class="p-2 rounded-full bg-primary/5 text-primary hover:bg-primary hover:text-white transition-all">
<span class="material-symbols-outlined">add_shopping_cart</span>
</button>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-surface-container-low w-full py-stack-lg border-t border-outline-variant">
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-gutter px-margin-desktop max-w-container-max mx-auto">
<div class="col-span-2 lg:col-span-1">
<a class="text-headline-sm font-headline-sm font-bold text-on-surface" href="#">EduMarket</a>
<p class="mt-4 text-on-surface-variant text-body-md max-w-xs">Elevating careers through expert-led education and professional certification.</p>
</div>
<div>
<h5 class="font-label-md text-on-surface mb-4 uppercase tracking-wider">Company</h5>
<ul class="space-y-2">
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">About Us</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Careers</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Blog</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Affiliate</a></li>
</ul>
</div>
<div>
<h5 class="font-label-md text-on-surface mb-4 uppercase tracking-wider">Support</h5>
<ul class="space-y-2">
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Help and Support</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Sitemap</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Accessibility Statement</a></li>
</ul>
</div>
<div>
<h5 class="font-label-md text-on-surface mb-4 uppercase tracking-wider">Legal</h5>
<ul class="space-y-2">
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Terms</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Privacy Policy</a></li>
<li><a class="text-on-surface-variant hover:text-primary transition-colors text-body-md" href="#">Cookie Settings</a></li>
</ul>
</div>
</div>
<div class="max-w-container-max mx-auto px-margin-desktop mt-stack-lg pt-stack-md border-t border-outline-variant/30 text-center">
<p class="text-on-surface-variant text-label-sm">© 2024 EduMarket Inc. All rights reserved.</p>
</div>
</footer>
<script>
        // Simple Confetti Effect
        const canvas = document.getElementById('confetti');
        const ctx = canvas.getContext('2d');
        let particles = [];
        
        function resize() {
            canvas.width = window.innerWidth;
            canvas.height = 400; // Limit height to hero section
        }

        class Particle {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height - canvas.height;
                this.size = Math.random() * 8 + 4;
                this.speed = Math.random() * 3 + 2;
                this.angle = Math.random() * 360;
                this.spin = Math.random() * 2 - 1;
                this.color = ['#004ac6', '#b4c5ff', '#5c647a', '#d3e4fe', '#fbbf24'][Math.floor(Math.random() * 5)];
            }
            update() {
                this.y += this.speed;
                this.angle += this.spin;
                if (this.y > canvas.height) {
                    this.y = -10;
                    this.x = Math.random() * canvas.width;
                }
            }
            draw() {
                ctx.save();
                ctx.translate(this.x, this.y);
                ctx.rotate(this.angle * Math.PI / 180);
                ctx.fillStyle = this.color;
                ctx.fillRect(-this.size / 2, -this.size / 2, this.size, this.size);
                ctx.restore();
            }
        }

        function init() {
            resize();
            for (let i = 0; i < 100; i++) {
                particles.push(new Particle());
            }
            animate();
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animate);
        }

        window.addEventListener('resize', resize);
        init();

        // Rating interactivity
        const stars = document.querySelectorAll('.star-rating label');
        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                stars.forEach((s, i) => {
                    if (i >= index) {
                        s.style.fontVariationSettings = "'FILL' 1";
                        s.style.color = "#fbbf24";
                    } else {
                        s.style.fontVariationSettings = "'FILL' 0";
                        s.style.color = "#c3c6d7";
                    }
                });
            });
        });
    </script>
</body></html>