{{-- Floating AI Assistant — UI only. Wire route: Route::view('/student/ai-assistant', 'student.student-ai-assistant'); --}}
<a href="/student/ai-assistant"
   class="ai-fab group fixed bottom-5 right-5 sm:bottom-6 sm:right-6 z-[60] flex items-center justify-center w-14 h-14 sm:w-16 sm:h-16 rounded-full
          bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl border border-white/40 dark:border-slate-600/50
          shadow-[0_8px_32px_rgba(37,99,235,0.25)] hover:shadow-[0_12px_40px_rgba(37,99,235,0.4)]
          hover:scale-110 active:scale-95 transition-all duration-300"
   aria-label="Open AI Assistant"
   title="AI Learning Assistant">
    <span class="absolute inset-0 rounded-full bg-gradient-to-br from-blue-500/20 to-violet-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
    <span class="ai-fab-pulse absolute inset-0 rounded-full bg-blue-500/30"></span>
    <span class="relative flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-br from-blue-600 to-indigo-600 text-white shadow-inner">
        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                  d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/>
        </svg>
    </span>
</a>

@once
    @push('styles')
    <style>
        @keyframes ai-fab-pulse {
            0%, 100% { transform: scale(1); opacity: 0.4; }
            50% { transform: scale(1.35); opacity: 0; }
        }
        .ai-fab-pulse {
            animation: ai-fab-pulse 2.5s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        .ai-fab:hover .ai-fab-pulse {
            animation-duration: 1.5s;
        }
    </style>
    @endpush
@endonce
