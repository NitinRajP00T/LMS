<!-- Popular Courses Carousel -->
<section class="bg-surface-container-low py-stack-lg">
    <div class="max-w-container-max mx-auto px-margin-desktop">
        <div class="flex items-center justify-between mb-stack-md">
            <h2 class="font-headline-lg text-headline-lg text-on-background">Popular Courses</h2>
            @if($popularCourses->count())
                <div class="flex gap-2">
                    <button type="button"
                            id="popular-prev"
                            class="w-10 h-10 rounded-full border border-outline flex items-center justify-center hover:bg-white transition-all"
                            aria-label="Previous courses">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button type="button"
                            id="popular-next"
                            class="w-10 h-10 rounded-full border border-outline flex items-center justify-center hover:bg-white transition-all"
                            aria-label="Next courses">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            @endif
        </div>

        @if($popularCourses->count())
            <div class="overflow-hidden" id="popular-carousel-viewport">
                <div class="flex gap-gutter transition-transform duration-500 ease-in-out" id="popular-carousel-track">
                    @foreach($popularCourses as $course)
                        @php
                            $originalPrice = $course->discount_percent > 0
                                ? $course->price / (1 - ($course->discount_percent / 100))
                                : null;
                        @endphp
                        <a href="{{ route('courses.detail', $course) }}"
                           class="popular-course-slide flex-shrink-0 w-full md:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] bg-white rounded-xl overflow-hidden soft-lift border border-outline-variant/30 group block hover:no-underline">
                            <div class="aspect-video overflow-hidden relative">
                                @if($course->image)
                                    <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                         alt="{{ $course->title }}"
                                         src="{{ Storage::url($course->image) }}"/>
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-primary to-primary-container flex items-center justify-center">
                                        <span class="material-symbols-outlined text-white text-5xl">school</span>
                                    </div>
                                @endif
                                @if($course->students_count > 100)
                                    <div class="absolute top-4 left-4">
                                        <span class="bg-white/90 backdrop-blur px-3 py-1 rounded font-label-sm text-label-sm text-primary font-bold">Bestseller</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-6">
                                <div class="flex items-center gap-2 mb-3">
                                    <span class="material-symbols-outlined text-tertiary-container text-[18px]" style="font-variation-settings: 'FILL' 1;">star</span>
                                    <span class="font-label-md text-label-md font-bold">{{ number_format($course->average_rating ?? 4.5, 1) }}</span>
                                    <span class="font-label-sm text-label-sm text-secondary">({{ $course->reviews_count ?? 0 }} reviews)</span>
                                </div>
                                <h3 class="font-headline-sm text-headline-sm mb-2 text-on-background group-hover:text-primary transition-colors line-clamp-2">
                                    {{ $course->title }}
                                </h3>
                                <p class="font-body-md text-body-md text-secondary mb-4 line-clamp-1">
                                    {{ $course->instructor->name ?? 'Instructor' }}
                                    @if($course->category)
                                        • {{ $course->category->name }}
                                    @endif
                                </p>
                                <div class="flex items-center justify-between pt-4 border-t border-outline-variant/30">
                                    <span class="font-headline-md text-headline-md text-primary">
                                        @if($course->price > 0)
                                            ₹{{ number_format($course->price, 2) }}
                                        @else
                                            Free
                                        @endif
                                    </span>
                                    @if($originalPrice && $originalPrice > $course->price)
                                        <span class="text-secondary line-through font-body-md text-body-md">₹{{ number_format($originalPrice, 2) }}</span>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-center gap-2 mt-6" id="popular-carousel-dots"></div>
        @else
            <p class="text-secondary font-body-md text-center py-8">No courses available yet. Check back soon!</p>
        @endif
    </div>
</section>

@if($popularCourses->count())
    @push('scripts')
    <script>
        (function () {
            const track = document.getElementById('popular-carousel-track');
            const viewport = document.getElementById('popular-carousel-viewport');
            const prevBtn = document.getElementById('popular-prev');
            const nextBtn = document.getElementById('popular-next');
            const dotsContainer = document.getElementById('popular-carousel-dots');
            if (!track || !viewport) return;

            const slides = Array.from(track.querySelectorAll('.popular-course-slide'));
            let currentIndex = 0;
            let autoTimer = null;
            const intervalMs = 4000;

            function visibleCount() {
                if (window.innerWidth >= 1024) return 3;
                if (window.innerWidth >= 768) return 2;
                return 1;
            }

            function maxIndex() {
                return Math.max(0, slides.length - visibleCount());
            }

            function slideWidth() {
                const slide = slides[0];
                if (!slide) return 0;
                const gap = parseFloat(getComputedStyle(track).gap) || 24;
                return slide.offsetWidth + gap;
            }

            function goTo(index) {
                currentIndex = Math.max(0, Math.min(index, maxIndex()));
                track.style.transform = `translateX(-${currentIndex * slideWidth()}px)`;
                updateDots();
            }

            function updateDots() {
                if (!dotsContainer) return;
                dotsContainer.querySelectorAll('button').forEach((dot, i) => {
                    dot.classList.toggle('bg-primary', i === currentIndex);
                    dot.classList.toggle('bg-outline-variant', i !== currentIndex);
                });
            }

            function buildDots() {
                if (!dotsContainer) return;
                dotsContainer.innerHTML = '';
                const total = maxIndex() + 1;
                for (let i = 0; i < total; i++) {
                    const dot = document.createElement('button');
                    dot.type = 'button';
                    dot.className = 'w-2.5 h-2.5 rounded-full transition-colors ' + (i === 0 ? 'bg-primary' : 'bg-outline-variant');
                    dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                    dot.addEventListener('click', () => {
                        goTo(i);
                        resetAuto();
                    });
                    dotsContainer.appendChild(dot);
                }
            }

            function next() {
                goTo(currentIndex >= maxIndex() ? 0 : currentIndex + 1);
            }

            function prev() {
                goTo(currentIndex <= 0 ? maxIndex() : currentIndex - 1);
            }

            function startAuto() {
                stopAuto();
                autoTimer = setInterval(next, intervalMs);
            }

            function stopAuto() {
                if (autoTimer) clearInterval(autoTimer);
            }

            function resetAuto() {
                stopAuto();
                startAuto();
            }

            prevBtn?.addEventListener('click', () => { prev(); resetAuto(); });
            nextBtn?.addEventListener('click', () => { next(); resetAuto(); });

            viewport.addEventListener('mouseenter', stopAuto);
            viewport.addEventListener('mouseleave', startAuto);

            window.addEventListener('resize', () => {
                buildDots();
                goTo(Math.min(currentIndex, maxIndex()));
            });

            buildDots();
            startAuto();
        })();
    </script>
    @endpush
@endif
