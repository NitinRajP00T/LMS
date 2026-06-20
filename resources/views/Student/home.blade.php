@extends('layouts.app')

@section('title', 'Home')

@push('head')
    @include('components.theme.head')
@endpush

@push('styles')
<style>
    body { font-family: 'Inter', sans-serif; }
    .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        vertical-align: middle;
    }
    .soft-lift { box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05); }
    .soft-lift:hover {
        box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1);
        transform: translateY(-2px);
    }
    .hero-pattern {
        background-image: radial-gradient(circle at 2px 2px, #e2e8f0 1px, transparent 0);
        background-size: 40px 40px;
    }
</style>
@endpush

@section('content')
<main class="pt-[72px] bg-background text-on-background">
<!-- Hero Section -->
<section class="relative overflow-hidden bg-surface py-24 md:py-32 hero-pattern">
<div class="max-w-container-max mx-auto px-margin-desktop relative z-10 flex flex-col items-center text-center">
<div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-container text-on-primary-container rounded-full mb-8">
<span class="material-symbols-outlined text-[18px]">workspace_premium</span>
<span class="font-label-md text-label-md">Trusted by 50M+ Learners</span>
</div>
<h1 class="font-display-lg text-display-lg md:text-[64px] text-on-background max-w-4xl mb-6">
                    Master New Skills with Expert-Led Courses
                </h1>
<p class="font-body-lg text-body-lg text-secondary max-w-2xl mb-10">
                    Join over 50 million learners and start your journey today. Access world-class education from anywhere in the world.
                </p>
<div class="flex flex-col sm:flex-row gap-stack-sm w-full sm:w-auto">
<a href="{{ route('courses.browse') }}" class="px-8 py-4 bg-primary text-on-primary rounded-lg font-bold text-headline-sm hover:shadow-lg transition-all active:scale-95 inline-block text-center">
                        Explore Courses
                    </a>
<button class="px-8 py-4 bg-white border border-outline-variant text-on-surface rounded-lg font-bold text-headline-sm hover:bg-surface-container-low transition-all active:scale-95">
                        Try for Free
                    </button>
</div>
</div>
<!-- Decorative Elements -->
<div class="absolute -top-24 -right-24 w-96 h-96 bg-primary-fixed/20 rounded-full blur-[100px]"></div>
<div class="absolute -bottom-24 -left-24 w-96 h-96 bg-secondary-fixed/20 rounded-full blur-[100px]"></div>
</section>
@include("partion.Featured-Categories")
@include("partion.Trending-Section")
<!-- Trending Section (New & Noteworthy) -->
<section class="max-w-container-max mx-auto px-margin-desktop py-stack-lg">
<h2 class="font-headline-lg text-headline-lg text-on-background mb-stack-md">New &amp; Noteworthy</h2>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-gutter">
<!-- Trending Big 1 -->
<div class="flex flex-col md:flex-row bg-white rounded-xl overflow-hidden soft-lift border border-outline-variant/30 group cursor-pointer">
<div class="md:w-2/5 aspect-video md:aspect-auto">
<img class="w-full h-full object-cover" alt="Prompt Engineering course" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCDkYyLtS0fHRx3zwP9wHX4Kq4Y1vDjc60a4QZfc1w6qVVfrTmRqPwb8tfInarqrhJdQ7wqoObx-2oCUcsZhY0_avxgLFUpBHPu6d9OA5vcrd3ix2EoY-eo57Qkjzig7pETvODk1i9OvD8FMiY9IrRNLEUnUtQnqpvu93nuurbb3978hRc82Reaj1iLM4LddYhGuDN3q-axCgl0RBVU8eUNvWYy87KvDREALGZLxcm_ElR6NZF7AhDIFA97EG11ptn7kee0BIEk4sYs"/>
</div>
<div class="p-8 md:w-3/5 flex flex-col justify-center">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold mb-2">New Arrival</span>
<h3 class="font-headline-md text-headline-md mb-3 group-hover:text-primary transition-colors">Prompt Engineering for AI Professionals</h3>
<p class="font-body-md text-body-md text-secondary mb-4 line-clamp-2">Learn the art and science of communicating with advanced language models to maximize productivity and innovation.</p>
<div class="flex items-center gap-4">
<span class="font-label-md text-label-md font-bold py-1 px-3 bg-surface-container-high rounded">24 Lessons</span>
<span class="font-label-md text-label-md font-bold py-1 px-3 bg-surface-container-high rounded">Intermediate</span>
</div>
</div>
</div>
<!-- Trending Big 2 -->
<div class="flex flex-col md:flex-row bg-white rounded-xl overflow-hidden soft-lift border border-outline-variant/30 group cursor-pointer">
<div class="md:w-2/5 aspect-video md:aspect-auto">
<img class="w-full h-full object-cover" alt="Sustainable Finance course" src="https://lh3.googleusercontent.com/aida-public/AB6AXuADCgn7FxlbZjUJUt33qndCnkVWEgPFYL-8nMsrH8WTMrt75M7E4eCmDgwmez1obXvNKE-j3AuGBOYSLyycC3CNPJNBYqZuY98q5JRN2oXbXyH_v9DwgfO1t4WLi4q3JCFFiLgCocksqyo6bq9HSmkFpbedJIlofbuk84ys621uDLOBW3MmCd_qpeQdU-6E8RwZ-1MFYC0dtJl-Q06vTxEIbi4iLMHNqqduO3gOoNUepKFG65bhsZZ3deeil1dZkerW63pDW4s8YgOu"/>
</div>
<div class="p-8 md:w-3/5 flex flex-col justify-center">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-primary font-bold mb-2">Trending Now</span>
<h3 class="font-headline-md text-headline-md mb-3 group-hover:text-primary transition-colors">Sustainable Finance &amp; ESG Investing</h3>
<p class="font-body-md text-body-md text-secondary mb-4 line-clamp-2">Understand the framework for evaluating corporate sustainability and social impact in modern financial markets.</p>
<div class="flex items-center gap-4">
<span class="font-label-md text-label-md font-bold py-1 px-3 bg-surface-container-high rounded">18 Lessons</span>
<span class="font-label-md text-label-md font-bold py-1 px-3 bg-surface-container-high rounded">Advanced</span>
</div>
</div>
</div>
</div>
</section>
<!-- Newsletter / CTA Section -->
<section class="max-w-container-max mx-auto px-margin-desktop mb-stack-lg">
<div class="bg-primary-container rounded-3xl p-12 md:p-20 relative overflow-hidden text-center flex flex-col items-center">
<div class="relative z-10 max-w-2xl">
<h2 class="font-display-lg text-headline-lg md:text-[40px] text-on-primary-container mb-6">Stay ahead of the curve</h2>
<p class="font-body-lg text-body-lg text-on-primary-container/80 mb-10">Get the latest course updates, expert career advice, and exclusive discounts delivered to your inbox.</p>
<form class="flex flex-col sm:flex-row gap-stack-sm w-full" onsubmit="event.preventDefault()">
<input class="flex-grow px-6 py-4 rounded-lg border-none focus:ring-2 focus:ring-on-primary-container/30 bg-white/10 backdrop-blur-md text-white placeholder:text-white/60 font-body-md text-body-md" placeholder="Enter your email address" type="email"/>
<button class="px-8 py-4 bg-on-background text-white rounded-lg font-bold font-label-md text-label-md hover:bg-black transition-all active:scale-95 whitespace-nowrap">Subscribe Now</button>
</form>
</div>
<div class="absolute -top-10 -right-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
<div class="absolute -bottom-10 -left-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
</div>
</section>
</main>

@include('components.student.ai-assistant-fab')
@endsection

@push('scripts')
<script>
    window.addEventListener('scroll', () => {
        const nav = document.querySelector('nav');
        if (!nav) return;
        if (window.scrollY > 20) {
            nav.classList.add('shadow-md');
            nav.classList.remove('shadow-sm');
        } else {
            nav.classList.add('shadow-sm');
            nav.classList.remove('shadow-md');
        }
    });
</script>
@endpush
