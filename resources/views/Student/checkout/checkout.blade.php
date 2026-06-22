<!DOCTYPE html>

<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Checkout | EduMarket</title>
@include('components.theme.head')
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .soft-lift {
            box-shadow: 0px 4px 20px rgba(15, 23, 42, 0.05);
            transition: all 0.3s ease;
        }
        .soft-lift:hover {
            box-shadow: 0px 10px 30px rgba(15, 23, 42, 0.1);
            transform: translateY(-2px);
        }
        .checkout-input:focus {
            outline: none;
            border-color: #004ac6;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
    </style>
</head>
<body class="bg-background text-on-surface font-body-md min-h-screen">
<!-- TopNavBar (Shell Suppression: Included as this is a primary checkout flow step but needs simplified header) -->
<nav class="fixed top-0 w-full z-50 h-[72px] bg-surface/80 backdrop-blur-md border-b border-outline-variant shadow-sm">
<div class="flex items-center justify-between px-margin-desktop max-w-container-max mx-auto w-full h-full">
<div class="text-headline-md font-bold text-primary">EduMarket</div>
<div class="flex items-center gap-stack-md">
<div class="hidden md:flex items-center gap-base text-on-surface-variant font-label-md">
<span class="material-symbols-outlined text-[20px]">lock</span>
                    Secure Checkout
                </div>
<button class="material-symbols-outlined text-on-surface-variant p-2 hover:bg-surface-container-low rounded-full transition-all">close</button>
</div>
</div>
</nav>
<main class="pt-[104px] pb-stack-lg px-margin-mobile md:px-margin-desktop max-w-container-max mx-auto">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Left Column: Order Summary (Span 5) -->
<aside class="lg:col-span-5 order-2 lg:order-1">
<div class="sticky top-[104px]">
<h2 class="font-headline-md text-headline-md mb-stack-md">Order Summary</h2>
<!-- Course Summary Card -->
<div class="bg-surface-container-lowest rounded-xl border border-outline-variant p-stack-md soft-lift mb-stack-md">
<div class="flex gap-stack-md">
<div class="w-24 h-24 md:w-32 md:h-20 flex-shrink-0 rounded-lg overflow-hidden">
<img alt="Course Thumbnail" class="w-full h-full object-cover" data-alt="A professional high-angle shot of a sleek laptop displaying complex data visualization charts in a bright, modern corporate office. The aesthetic is clean and high-trust, using a palette of blues and whites. Natural soft sunlight streams through large windows, creating a serene and focused educational atmosphere." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCmzmVkbTqQX-O7ERwH6ChJBiOds7olPV6lEBKfuEnKwcYs02ialdYACJ_E6FMdqH4-fg3iC5UKMrce0FUuAOMh_cLUNUIQ2XqJYUwnFjR12eCLQSY__g8P5sWgtOjg21a7as8ENHMsOSyK0JblFa1EgY3eh1hWyerz2cmYUlvpDQbaCYa1cal-QPYM1yumboeiw_5kowDbCkp3YukszT3DxzfhiQI7Hn5dFk8UZWzPyogEL7JWspD761zU1jCCxxWr8OT4aRf_zS-0"/>
</div>
<div class="flex flex-col justify-between py-1">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface leading-tight mb-1">Advanced Data Analytics for Strategic Leadership</h3>
<p class="text-on-surface-variant font-label-sm">By Dr. Elena Richardson</p>
</div>
<div class="flex items-center gap-stack-sm">
<span class="text-primary font-bold text-body-lg">$149.00</span>
<span class="text-on-surface-variant line-through text-label-md">$199.00</span>
</div>
</div>
</div>
</div>
<!-- Coupon Section -->
<div class="bg-surface-container-low rounded-xl p-stack-md mb-stack-md">
<label class="block font-label-md text-on-surface mb-2">Have a coupon code?</label>
<div class="flex gap-2">
<input class="checkout-input flex-grow bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-2 text-body-md transition-all" placeholder="Enter code" type="text"/>
<button class="bg-secondary text-on-secondary px-6 py-2 rounded-lg font-label-md hover:opacity-90 transition-opacity">Apply</button>
</div>
</div>
<!-- Pricing Breakdown -->
<div class="space-y-stack-sm border-b border-outline-variant pb-stack-sm mb-stack-sm">
<div class="flex justify-between text-body-md text-on-surface-variant">
<span>Original Price</span>
<span>$199.00</span>
</div>
<div class="flex justify-between text-body-md text-on-surface-variant">
<span>Discounts</span>
<span class="text-emerald-600">-$50.00</span>
</div>
<div class="flex justify-between text-body-md text-on-surface-variant">
<span>Taxes (Estimated)</span>
<span>$0.00</span>
</div>
</div>
<div class="flex justify-between items-center mb-stack-lg">
<span class="font-headline-sm text-headline-sm">Total</span>
<span class="font-headline-md text-headline-md text-primary">$149.00</span>
</div>
<!-- Trust Badges -->
<div class="grid grid-cols-2 gap-stack-sm">
<div class="flex items-center gap-2 p-3 bg-surface-container-high rounded-lg">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">verified_user</span>
<div class="leading-tight">
<p class="font-label-md text-on-surface">Secure SSL</p>
<p class="text-[10px] text-on-surface-variant uppercase tracking-wider">Encrypted</p>
</div>
</div>
<div class="flex items-center gap-2 p-3 bg-surface-container-high rounded-lg">
<span class="material-symbols-outlined text-primary" style="font-variation-settings: 'FILL' 1;">published_with_changes</span>
<div class="leading-tight">
<p class="font-label-md text-on-surface">30-Day</p>
<p class="text-[10px] text-on-surface-variant uppercase tracking-wider">Money Back</p>
</div>
</div>
</div>
</div>
</aside>
<!-- Right Column: Checkout Form (Span 7) -->
<div class="lg:col-span-7 order-1 lg:order-2">
<div class="bg-surface-container-lowest rounded-2xl border border-outline-variant p-stack-md md:p-stack-lg shadow-sm">
<h1 class="font-headline-lg text-headline-lg mb-stack-md">Secure Checkout</h1>
<!-- Payment Tabs -->
<div class="flex gap-stack-sm mb-stack-md">
<button class="flex-1 flex items-center justify-center gap-2 py-4 rounded-xl border-2 border-primary bg-primary-fixed/10 text-primary font-bold transition-all" id="cardTab">
<span class="material-symbols-outlined">credit_card</span>
                            Credit Card
                        </button>
<button class="flex-1 flex items-center justify-center gap-2 py-4 rounded-xl border border-outline-variant hover:bg-surface-container-low transition-all" id="paypalTab">
<span class="material-symbols-outlined">account_balance_wallet</span>
                            PayPal
                        </button>
</div>
<!-- Credit Card Form -->
<form class="space-y-stack-md" id="paymentForm">
<div class="space-y-stack-sm">
<label class="block font-label-md text-on-surface">Cardholder Name</label>
<input class="checkout-input w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 text-body-md transition-all" placeholder="John Doe" type="text"/>
</div>
<div class="space-y-stack-sm">
<label class="block font-label-md text-on-surface">Card Number</label>
<div class="relative">
<input class="checkout-input w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 pl-12 text-body-md transition-all" placeholder="0000 0000 0000 0000" type="text"/>
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">credit_card</span>
</div>
</div>
<div class="grid grid-cols-2 gap-gutter">
<div class="space-y-stack-sm">
<label class="block font-label-md text-on-surface">Expiry Date</label>
<input class="checkout-input w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 text-body-md transition-all" placeholder="MM / YY" type="text"/>
</div>
<div class="space-y-stack-sm">
<label class="block font-label-md text-on-surface">CVC / CVV</label>
<input class="checkout-input w-full bg-surface-container-lowest border border-outline-variant rounded-lg px-4 py-3 text-body-md transition-all" placeholder="•••" type="password"/>
</div>
</div>
<div class="pt-stack-sm">
<label class="flex items-start gap-3 cursor-pointer group">
<div class="relative flex items-center justify-center mt-1">
<input class="peer appearance-none w-5 h-5 border-2 border-outline rounded focus:ring-0 checked:bg-primary checked:border-primary transition-all" type="checkbox"/>
<span class="material-symbols-outlined absolute text-on-primary scale-0 peer-checked:scale-100 transition-transform text-[16px]">check</span>
</div>
<span class="text-body-md text-on-surface-variant group-hover:text-on-surface transition-colors">
                                    Securely save my payment information for future purchases. Your data is encrypted and handled via PCI-compliant servers.
                                </span>
</label>
</div>
<button class="w-full bg-primary text-on-primary py-4 rounded-xl font-headline-sm hover:opacity-95 active:scale-[0.98] transition-all flex items-center justify-center gap-2 shadow-lg shadow-primary/20" type="submit">
                            Complete Payment
                            <span class="material-symbols-outlined">arrow_forward</span>
</button>
<p class="text-center text-label-sm text-on-surface-variant">
                            By clicking "Complete Payment", you agree to the <a class="text-primary underline" href="#">Terms of Service</a> and <a class="text-primary underline" href="#">Privacy Policy</a>.
                        </p>
</form>
</div>
<!-- Secondary Trust Area -->
<div class="mt-stack-lg grid grid-cols-1 md:grid-cols-3 gap-stack-md opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
<div class="flex flex-col items-center text-center gap-2">
<img alt="Stripe Logo" class="h-8 object-contain" data-alt="A minimalist logo for a high-security payment processor featuring a stylized lock and shield in professional blue and gray tones. The background is a clean white, emphasizing transparency and trust. The style is modern corporate minimalism with crisp vector-like edges." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCWWjGyMfB9IvfhJkX437Gw_A6nTeGHGRORs0NMK17NHwYQOIy7oEt4L4Y7PkmLl8bYMz6AeIOeVxtl7dK7RkLu1NbiViVM474POpkROGPRfEknfUt8ipD-7Ro-cCUvaMWyneLLOcg3ijeoU47dXWNo6v_7FAPajRe4vWv2fNcVB-nk0kZeFes8ffuH2lPCi9VvjCkm7HO-BgE47siLlJDfSzbmpyY52Kr1b5QtiOlt-gN-s_e3Aihr8Qr6qaL_XGRXt_cafrc_s6a-"/>
<span class="text-label-sm">PCI Compliant</span>
</div>
<div class="flex flex-col items-center text-center gap-2">
<img alt="Verified Logo" class="h-8 object-contain" data-alt="A clean, simple representation of a verified merchant badge with a prominent checkmark inside a circular seal. Soft gradients of sky blue and slate gray are used to convey security and reliability. The overall lighting is bright and even, fitting a high-end light-mode UI." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBdZAxC1iSkQr63ibSvHBVKR4S2pcLbtYbj1rCm-Z9iLZLjVFI6tvzGB5c6Uq-n0Ljbkd34p77b6_VfqFJppNoUZlApGA-nUa2TE8d-MifnU-9n8MG7xQBCNmhwmZec_6WTrNFW78PXXT1NNWTb9AfQLi7DaGfPy1CYAwLJkxbBhVmIy8dku3VmRZ7XrYxDrnzAzUdm2Li_PBBndZSKRoXUVXb-4ry4Si0FYRxNOxRB4GtW9KQhr_EsuSWUVR8VGzm3Ez-UzFWodqL9"/>
<span class="text-label-sm">Verified Merchant</span>
</div>
<div class="flex flex-col items-center text-center gap-2">
<img alt="Support Logo" class="h-8 object-contain" data-alt="A small, elegant icon depicting 24/7 global support with a headset and a subtle world map background. The aesthetic uses a refined palette of deep navy and soft white. The image is crisp and professional, symbolizing round-the-clock customer care and accessibility." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBdTG4Rc4yWFd8MCpao3Ngdso9iv0VDEiBTE19_e6N9BD278Pj57WuJ7OVSEjVIcSiqLTp8MGOqRMo0REDuggw5w5lJpnTzOXpvinSgsIUZSQVq1AOgIyIQ3B0BTx6kI27mDlDczbfizKEtPlX21OEZRiS4ZgTWCy8KjpsjcNEakDQqWTPKJdXJqbStOmyWupSmxq11h_g5SFOMhS3wpeJmHV802jjKDvXHZ6MMsJC4eHmiRzQ27NgZF_MMQgNIy5gCcw9sTtPLsuXw"/>
<span class="text-label-sm">24/7 Support</span>
</div>
</div>
</div>
</div>
</main>
<!-- Footer (Suppressed active navigation as it's a focus screen) -->
<footer class="w-full py-stack-lg bg-surface-container-low mt-stack-lg">
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-gutter px-margin-desktop max-w-container-max mx-auto">
<div class="col-span-2 lg:col-span-1">
<div class="text-headline-sm font-bold text-on-surface mb-stack-sm">EduMarket</div>
<p class="text-on-surface-variant font-body-md mb-4">Empowering professionals with market-leading expertise.</p>
</div>
<div class="flex flex-col gap-2">
<h4 class="font-label-md text-on-surface mb-2">Platform</h4>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Courses</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Instructors</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Enterprise</a>
</div>
<div class="flex flex-col gap-2">
<h4 class="font-label-md text-on-surface mb-2">Support</h4>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Help Center</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Terms</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Privacy</a>
</div>
<div class="flex flex-col gap-2">
<h4 class="font-label-md text-on-surface mb-2">Connect</h4>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">LinkedIn</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Twitter</a>
<a class="text-on-surface-variant hover:text-primary transition-colors" href="#">Instagram</a>
</div>
</div>
<div class="px-margin-desktop max-w-container-max mx-auto mt-stack-lg pt-stack-md border-t border-outline-variant">
<p class="text-on-surface-variant text-label-sm text-center">© 2024 EduMarket Inc. All rights reserved.</p>
</div>
</footer>
<script>
        // Micro-interactions for tab switching
        const cardTab = document.getElementById('cardTab');
        const paypalTab = document.getElementById('paypalTab');
        const paymentForm = document.getElementById('paymentForm');

        cardTab.addEventListener('click', () => {
            cardTab.classList.add('border-primary', 'bg-primary-fixed/10', 'text-primary', 'border-2');
            cardTab.classList.remove('border-outline-variant', 'hover:bg-surface-container-low');
            
            paypalTab.classList.remove('border-primary', 'bg-primary-fixed/10', 'text-primary', 'border-2');
            paypalTab.classList.add('border-outline-variant', 'hover:bg-surface-container-low');
        });

        paypalTab.addEventListener('click', () => {
            paypalTab.classList.add('border-primary', 'bg-primary-fixed/10', 'text-primary', 'border-2');
            paypalTab.classList.remove('border-outline-variant', 'hover:bg-surface-container-low');
            
            cardTab.classList.remove('border-primary', 'bg-primary-fixed/10', 'text-primary', 'border-2');
            cardTab.classList.add('border-outline-variant', 'hover:bg-surface-container-low');
        });

        // Simple form submission animation
        paymentForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = `<span class="material-symbols-outlined animate-spin">progress_activity</span> Processing...`;
            
            setTimeout(() => {
                btn.innerHTML = `<span class="material-symbols-outlined">check_circle</span> Payment Successful`;
                btn.classList.replace('bg-primary', 'bg-emerald-600');
            }, 2000);
        });
    </script>
</body></html>