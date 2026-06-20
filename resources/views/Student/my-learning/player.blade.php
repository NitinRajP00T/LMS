@extends('layouts.app')

@section('title', $course->title . ' — Learning Player')

@push('styles')
<style>
/* ── Layout ── */
.player-layout { display: flex; min-height: calc(100vh - 64px); }
.player-main   { flex: 1; overflow-y: auto; background: #fff; }
.player-sidebar { width: 340px; flex-shrink: 0; background: #f8fafc; border-left: 1px solid #e2e8f0; display: flex; flex-direction: column; }
@media (max-width: 1023px) {
    .player-layout  { flex-direction: column; }
    .player-sidebar { width: 100%; border-left: none; border-top: 1px solid #e2e8f0; }
}

/* ── Instructor Card (YT style) ── */
.instructor-card {
    display: flex; align-items: center; gap: 14px;
    padding: 16px 20px;
    background: linear-gradient(135deg, #f0f4ff 0%, #fafbff 100%);
    border: 1px solid #dde4f7;
    border-radius: 14px;
    margin: 20px 0;
    transition: box-shadow .25s;
}
.instructor-card:hover { box-shadow: 0 6px 24px rgba(99,102,241,.12); }
.inst-avatar {
    width: 52px; height: 52px; border-radius: 50%;
    border: 3px solid #6366f1;
    flex-shrink: 0; object-fit: cover;
}
.inst-info { flex: 1; min-width: 0; }
.inst-name  { font-weight: 700; font-size: .97rem; color: #1e293b; line-height: 1.2; }
.inst-sub   { font-size: .78rem; color: #64748b; margin-top: 2px; }
.inst-stats { font-size: .73rem; color: #94a3b8; margin-top: 4px; }
.inst-visit-btn {
    flex-shrink: 0;
    padding: 8px 18px;
    background: #6366f1;
    color: #fff;
    border-radius: 99px;
    font-size: .82rem; font-weight: 700;
    text-decoration: none;
    transition: background .2s, transform .15s;
    display: inline-flex; align-items: center; gap: 6px;
}
.inst-visit-btn:hover { background: #4f46e5; transform: translateY(-1px); }

/* ── Progress bar ── */
.prog-bar { height: 6px; background: #e2e8f0; border-radius: 99px; overflow: hidden; }
.prog-fill { height: 100%; background: linear-gradient(90deg, #6366f1, #8b5cf6); border-radius: 99px; transition: width .6s ease; }

/* ── Sidebar lesson item ── */
.lesson-item {
    display: flex; align-items: flex-start; gap: 12px;
    padding: 12px 16px; border-bottom: 1px solid #f1f5f9;
    text-decoration: none; color: inherit; transition: background .15s;
}
.lesson-item:hover          { background: #f8fafc; }
.lesson-item.active-lesson  { background: #eef2ff; border-left: 4px solid #6366f1; }
.lesson-item.done-lesson .lesson-num { background: #10b981; color: #fff; }
.lesson-num {
    width: 26px; height: 26px; border-radius: 50%; flex-shrink: 0;
    background: #e2e8f0; color: #64748b;
    font-size: .72rem; font-weight: 700;
    display: flex; align-items: center; justify-content: center; margin-top: 1px;
}
.lesson-title { font-size: .85rem; font-weight: 500; color: #1e293b; line-height: 1.35; }
.lesson-dur   { font-size: .72rem; color: #94a3b8; margin-top: 2px; }

/* ── Rating modal overlay ── */
#ratingOverlay {
    position: fixed; inset: 0; z-index: 9999;
    background: rgba(15,23,42,.55);
    backdrop-filter: blur(4px);
    display: flex; align-items: center; justify-content: center;
    opacity: 0; pointer-events: none; transition: opacity .3s;
}
#ratingOverlay.show { opacity: 1; pointer-events: all; }
.rating-modal {
    background: #fff; border-radius: 20px; padding: 36px 32px;
    width: 100%; max-width: 440px;
    box-shadow: 0 24px 64px rgba(15,23,42,.18);
    transform: translateY(20px); transition: transform .3s;
    text-align: center;
}
#ratingOverlay.show .rating-modal { transform: translateY(0); }

/* ── Star picker ── */
.star-picker { display: flex; justify-content: center; gap: 8px; margin: 20px 0 10px; }
.star-picker input { display: none; }
.star-picker label {
    font-size: 2.4rem; cursor: pointer; color: #cbd5e1;
    transition: color .15s, transform .15s;
    line-height: 1;
}
.star-picker label:hover,
.star-picker label.lit { color: #f59e0b; transform: scale(1.15); }

/* ── Toast ── */
.toast-bar {
    position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%) translateY(60px);
    background: #10b981; color: #fff;
    padding: 12px 24px; border-radius: 99px;
    font-weight: 600; font-size: .88rem;
    box-shadow: 0 8px 24px rgba(16,185,129,.3);
    transition: transform .4s cubic-bezier(.34,1.56,.64,1);
    z-index: 10000; white-space: nowrap;
}
.toast-bar.show { transform: translateX(-50%) translateY(0); }

/* ── Video watch progress strip ── */
#watchProgressWrap {
    height: 5px; background: #e2e8f0; border-radius: 0 0 14px 14px;
    overflow: hidden; margin-bottom: 6px;
}
#watchProgressFill {
    height: 100%;
    background: linear-gradient(90deg, #10b981, #6366f1);
    width: 0%; transition: width .4s linear;
    border-radius: 0 0 14px 14px;
}
#watchHint {
    font-size: .75rem; color: #94a3b8; margin-bottom: 12px;
    display: flex; align-items: center; gap: 6px;
}
#watchHint.unlocked { color: #10b981; }

/* ── Complete button states ── */
#completeBtnWrap form button {
    display:inline-flex;align-items:center;gap:6px;
    padding:9px 18px;border:none;border-radius:10px;
    font-size:.87rem;font-weight:700;cursor:pointer;
    transition: background .15s, opacity .2s;
}
#completeBtnWrap button.locked {
    background:#e2e8f0 !important; color:#94a3b8 !important;
    cursor:not-allowed !important; pointer-events:none;
}

/* ── Comment Section Styles (YouTube-like) ── */
.yt-comment {
    display:flex; gap:12px; padding:16px 0; border-bottom:1px solid #e2e8f0;
    transition:background .15s;
}
.yt-comment:hover { background:#fafbff; padding:16px 12px; margin:0 -12px; border-radius:8px; }
.yt-comment-avatar {
    width:36px; height:36px; border-radius:50%; flex-shrink:0;
    object-fit:cover;
}
.yt-comment-header {
    display:flex; align-items:center; gap:8px; margin-bottom:4px;
}
.yt-comment-author {
    font-weight:600; font-size:.87rem; color:#0f172a;
}
.yt-comment-instructor-badge {
    display:inline-flex; align-items:center; gap:4px;
    background:#eef2ff; color:#6366f1; padding:2px 8px;
    border-radius:4px; font-size:.7rem; font-weight:700;
}
.yt-comment-time {
    font-size:.78rem; color:#94a3b8;
}
.yt-comment-text {
    font-size:.87rem; color:#374151; line-height:1.5; word-break:break-word;
    margin-bottom:8px;
}
.yt-comment-actions {
    display:flex; gap:16px; font-size:.78rem; margin-top:8px;
}
.yt-comment-action-btn {
    background:none; border:none; color:#64748b; cursor:pointer;
    font-weight:600; transition:color .15s; padding:0; font-size:.78rem;
}
.yt-comment-action-btn:hover { color:#6366f1; }
.yt-reply {
    margin-left:48px; margin-top:12px; padding-left:12px; border-left:2px solid #e2e8f0;
}
.yt-reply-form {
    display:flex; gap:10px; margin-top:12px; padding:12px 0;
}
.yt-reply-form textarea {
    flex:1; padding:8px 12px; border:1px solid #e2e8f0; border-radius:6px;
    font-size:.85rem; font-family:inherit; min-height:60px; outline:none;
    transition:border .2s;
}
.yt-reply-form textarea:focus { border-color:#6366f1; }
.yt-reply-form button {
    padding:6px 12px; background:#6366f1; color:#fff; border:none;
    border-radius:6px; font-size:.8rem; font-weight:700; cursor:pointer;
    transition:background .15s;
}
.yt-reply-form button:hover { background:#4f46e5; }
.yt-reply-form .cancel-btn {
    background:transparent; color:#64748b; border:1px solid #e2e8f0;
}
.yt-reply-form .cancel-btn:hover { background:#f1f5f9; color:#374151; }

.comment-loading { opacity:.6; pointer-events:none; }
.empty-comments {
    text-align:center; padding:32px 16px; color:#94a3b8;
    font-size:.9rem;
}</style>
@endpush

@section('content')
@php
    $totalLessons    = $lessons->count();
    $completedCount  = count($completedLessonIds);
    $progressPercent = $totalLessons > 0 ? round(($completedCount / $totalLessons) * 100) : 0;
    $isComplete      = $progressPercent === 100;
    $activeIndex     = $activeLesson ? $lessons->search(fn($l) => $l->id === $activeLesson->id) : false;
    $prevLesson      = $activeIndex !== false && $activeIndex > 0            ? $lessons->values()[$activeIndex - 1] : null;
    $nextLesson      = $activeIndex !== false && $activeIndex < $totalLessons - 1 ? $lessons->values()[$activeIndex + 1] : null;
    $instructor      = $course->instructor;
    $instructorCourseCount = $instructor ? \App\Models\Course::where('user_id', $instructor->id)->where('is_published', true)->count() : 0;
    $instructorStudentCount = $instructor ? \App\Models\Course::where('user_id', $instructor->id)->where('is_published', true)->sum('students_count') : 0;
@endphp

{{-- Toast for review success --}}
@if(session('review_success'))
<div class="toast-bar show" id="reviewToast">
    ⭐ {{ session('review_success') }}
</div>
<script>setTimeout(() => document.getElementById('reviewToast')?.classList.remove('show'), 3500);</script>
@endif

<div class="player-layout">

    {{-- ════════════════════ MAIN CONTENT ════════════════════ --}}
    <section class="player-main">
        <div style="max-width:860px; margin:0 auto; padding: 24px 24px 48px;">

            {{-- Back link --}}
            <a href="{{ route('student.my-learning.index') }}"
               style="font-size:.82rem; color:#64748b; text-decoration:none; display:inline-flex; align-items:center; gap:6px; margin-bottom:16px;">
                ← Back to My Learning
            </a>

            {{-- Course title --}}
            <h1 style="font-size:1.4rem; font-weight:800; color:#0f172a; margin-bottom:4px; line-height:1.3;">
                {{ $course->title }}
            </h1>
            @if($activeLesson)
                <p style="color:#64748b; font-size:.9rem; margin-bottom:20px;">
                    Lesson {{ ($activeIndex !== false ? $activeIndex+1 : '–') }}: {{ $activeLesson->title }}
                </p>
            @endif

            {{-- Video --}}
            @if($activeLesson)
                <div style="border-radius:14px 14px 0 0; overflow:hidden; background:#0f172a; aspect-ratio:16/9; margin-bottom:0;">
                    @if($activeLesson->video_url)
                        @php
                            $vid = $activeLesson->video_url;
                            $isYoutube = false;
                            if (str_contains($vid, 'youtube.com/watch')) {
                                parse_str(parse_url($vid, PHP_URL_QUERY) ?? '', $p);
                                $vid = 'https://www.youtube.com/embed/' . ($p['v'] ?? '') . '?enablejsapi=1';
                                $isYoutube = true;
                            } elseif (str_contains($vid, 'youtu.be/')) {
                                $vid = 'https://www.youtube.com/embed/' . basename(parse_url($vid, PHP_URL_PATH)) . '?enablejsapi=1';
                                $isYoutube = true;
                            }
                        @endphp
                        @if($isYoutube)
                            <iframe id="ytPlayer" src="{{ $vid }}" class="w-full h-full"
                                    allowfullscreen style="width:100%;height:100%;border:none;"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                            </iframe>
                        @elseif(str_contains($vid, 'vimeo.com'))
                            <iframe src="{{ $vid }}" class="w-full h-full"
                                    allowfullscreen style="width:100%;height:100%;border:none;">
                            </iframe>
                        @else
                            <video id="html5Video" src="{{ $vid }}" controls
                                   style="width:100%;height:100%;">
                            </video>
                        @endif
                    @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;color:#475569;">
                            <div style="text-align:center;">
                                <div style="font-size:3rem;margin-bottom:8px;">🎬</div>
                                <p>No video available for this lesson</p>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Watch progress strip below video --}}
                @if($activeLesson->video_url)
                <div id="watchProgressWrap">
                    <div id="watchProgressFill"></div>
                </div>
                <div id="watchHint">
                    <span id="watchIcon">⏳</span>
                    <span id="watchText">Watch at least 80% of the video to mark as complete</span>
                </div>
                @endif
            @endif

            {{-- ══════════ INSTRUCTOR CARD (YouTube style) ══════════ --}}
            @if($instructor)
            <div class="instructor-card">
                <img class="inst-avatar"
                     src="https://ui-avatars.com/api/?name={{ urlencode($instructor->name) }}&size=104&background=6366f1&color=fff&bold=true"
                     alt="{{ $instructor->name }}">

                <div class="inst-info">
                    <div class="inst-name">{{ $instructor->name }}</div>
                    <div class="inst-sub">
                        <span style="background:#eef2ff;color:#6366f1;border-radius:6px;padding:1px 7px;font-size:.7rem;font-weight:700;margin-right:4px;">Instructor</span>
                        {{ $instructor->email }}
                    </div>
                    <div class="inst-stats">
                        📚 {{ $instructorCourseCount }} courses &nbsp;·&nbsp;
                        👥 {{ number_format($instructorStudentCount) }} students
                    </div>
                </div>

                <a href="{{ route('instructor.profile', $instructor) }}"
                   class="inst-visit-btn" target="_self">
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    View Channel
                </a>
            </div>
            @endif

            {{-- AI Help --}}
            @include('components.student.ai-lesson-help')

            {{-- Lesson description --}}
            @if($activeLesson && $activeLesson->description)
                <div style="margin:20px 0 16px; color:#374151;">
                    <h2 style="font-size:1rem; font-weight:700; margin-bottom:6px;">Lesson Overview</h2>
                    <p style="font-size:.92rem; line-height:1.65;">{{ $activeLesson->description }}</p>
                </div>
            @endif

            {{-- Navigation buttons --}}
            @if($activeLesson)
            <div style="display:flex; flex-wrap:wrap; gap:10px; margin-top:20px; align-items:center;">
                @if($prevLesson)
                    <a href="{{ route('student.my-learning.player', ['course' => $course->id, 'lesson' => $prevLesson->id]) }}"
                       style="display:inline-flex;align-items:center;gap:6px;padding:9px 18px;border:1.5px solid #e2e8f0;border-radius:10px;color:#374151;text-decoration:none;font-size:.87rem;font-weight:600;transition:background .15s;"
                       onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background='transparent'">
                        ← Previous
                    </a>
                @endif

                @if(!in_array($activeLesson->id, $completedLessonIds))
                    {{-- Mark as complete — controlled by 80% watch rule --}}
                    <div id="completeBtnWrap">
                        <form method="POST" action="{{ route('student.my-learning.complete', $activeLesson) }}">
                            @csrf
                            <button type="submit" id="completeBtn"
                                    class="locked"
                                    style="background:#e2e8f0;color:#94a3b8;pointer-events:none;"
                                    title="Watch 80% of the video first">
                                🔒 Watch 80% to Complete
                            </button>
                        </form>
                    </div>
                @else
                    <span style="display:inline-flex;align-items:center;gap:6px;padding:9px 18px;background:#ecfdf5;color:#059669;border-radius:10px;font-size:.87rem;font-weight:600;">
                        ✓ Completed
                    </span>
                @endif

                @if($nextLesson)
                    <a href="{{ route('student.my-learning.player', ['course' => $course->id, 'lesson' => $nextLesson->id]) }}"
                       style="display:inline-flex;align-items:center;gap:6px;padding:9px 18px;background:#6366f1;color:#fff;border-radius:10px;text-decoration:none;font-size:.87rem;font-weight:700;transition:background .15s;"
                       onmouseover="this.style.background='#4f46e5'" onmouseout="this.style.background='#6366f1'">
                        Next →
                    </a>
                @endif

                {{-- Rate course button — always visible when enrolled --}}
                <button onclick="openRating()"
                        style="display:inline-flex;align-items:center;gap:6px;padding:9px 18px;
                               background:{{ $existingReview ? '#fef3c7' : '#fffbeb' }};
                               color:#b45309;border:1.5px solid #fcd34d;
                               border-radius:10px;font-size:.87rem;font-weight:700;cursor:pointer;transition:background .15s;"
                        onmouseover="this.style.background='#fde68a'" onmouseout="this.style.background='{{ $existingReview ? '#fef3c7' : '#fffbeb' }}'">
                    ⭐ {{ $existingReview ? 'Update Rating' : 'Rate Course' }}
                </button>
            </div>
            @endif

            {{-- 🏆 COMPLETION BANNER --}}
            @if($isComplete)
            <div style="margin-top:28px; padding:24px 28px; background:linear-gradient(135deg,#ecfdf5,#d1fae5);
                        border:2px solid #6ee7b7; border-radius:16px; text-align:center;">
                <div style="font-size:2.5rem; margin-bottom:8px;">🏆</div>
                <h3 style="font-size:1.1rem;font-weight:800;color:#064e3b;margin-bottom:4px;">
                    Congratulations! You've completed this course!
                </h3>
                <p style="font-size:.88rem;color:#065f46; margin-bottom:16px;">
                    Share how this course helped you — your rating means a lot!
                </p>
                <button onclick="openRating()"
                        style="padding:11px 28px;background:#6366f1;color:#fff;border:none;border-radius:10px;
                               font-weight:700;cursor:pointer;font-size:.9rem;">
                    ⭐ {{ $existingReview ? 'Update Your Rating' : 'Rate This Course' }}
                </button>
            </div>
            @endif

            {{-- 💬 YOUTUBE-STYLE COMMENT SECTION --}}
            @if($activeLesson)
            <div style="margin-top:32px; padding-top:32px; border-top:1px solid #e2e8f0;">
                <h2 style="font-size:1.05rem; font-weight:700; color:#0f172a; margin-bottom:18px;">
                    💬 Comments
                </h2>

                {{-- Comment count --}}
                <div id="commentCountWrap" style="font-size:.87rem; color:#64748b; margin-bottom:16px;">
                    Loading comments...
                </div>

                {{-- Post comment section --}}
                <div style="display:flex; gap:12px; margin-bottom:24px; padding-bottom:24px; border-bottom:1px solid #e2e8f0;">
                    <img id="userAvatar"
                         src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&size=40&background=6366f1&color=fff&bold=true"
                         alt="{{ Auth::user()->name }}"
                         style="width:40px; height:40px; border-radius:50%; flex-shrink:0;">

                    <div style="flex:1;">
                        <textarea id="commentInput"
                                  placeholder="Share your thoughts about this lesson... (Press Ctrl+Enter to post)"
                                  style="width:100%; padding:10px 14px; border:1px solid #e2e8f0; border-radius:8px;
                                         font-size:.87rem; font-family:inherit; resize:vertical; min-height:80px;
                                         outline:none; transition:border .2s;"
                                  onfocus="this.style.borderColor='#6366f1'"
                                  onblur="this.style.borderColor='#e2e8f0'"
                                  onkeydown="if(event.ctrlKey && event.key==='Enter') submitComment()"></textarea>

                        <div style="display:flex; justify-content:flex-end; gap:8px; margin-top:8px;">
                            <button type="button" onclick="clearComment()"
                                    style="padding:8px 16px; background:transparent; border:1px solid #e2e8f0;
                                           border-radius:6px; font-size:.85rem; font-weight:600; color:#64748b;
                                           cursor:pointer; transition:all .15s;"
                                    onmouseover="this.style.background='#f1f5f9'"
                                    onmouseout="this.style.background='transparent'">
                                Cancel
                            </button>
                            <button type="button" onclick="submitComment()"
                                    id="submitCommentBtn"
                                    style="padding:8px 16px; background:#6366f1; color:#fff; border:none;
                                           border-radius:6px; font-size:.85rem; font-weight:700;
                                           cursor:pointer; transition:all .15s;"
                                    onmouseover="this.style.background='#4f46e5'"
                                    onmouseout="this.style.background='#6366f1'">
                                Comment
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Comments list --}}
                <div id="commentsList" style="space-y:16px;">
                    <!-- Comments loaded here -->
                </div>
            </div>
            @endif

        </div>
    </section>

    {{-- ════════════════════ SIDEBAR ════════════════════ --}}
    <aside class="player-sidebar">

        {{-- Progress header --}}
        <div style="padding:16px; border-bottom:1px solid #e2e8f0; background:#fff;">
            <div style="display:flex; justify-content:space-between; margin-bottom:8px; font-size:.85rem;">
                <span style="font-weight:600; color:#374151;">Course Progress</span>
                <span style="font-weight:700; color:#6366f1;">{{ $progressPercent }}%</span>
            </div>
            <div class="prog-bar">
                <div class="prog-fill" style="width:{{ $progressPercent }}%;"></div>
            </div>
            <p style="font-size:.72rem; color:#94a3b8; margin-top:6px;">
                {{ $completedCount }} of {{ $totalLessons }} lessons completed
                @if($isComplete)
                    &nbsp;🎉
                @endif
            </p>
        </div>

        {{-- Lesson list --}}
        <div style="flex:1; overflow-y:auto;">
            @forelse($lessons as $idx => $lesson)
                @php
                    $isDone   = in_array($lesson->id, $completedLessonIds);
                    $isActive = $activeLesson && $activeLesson->id === $lesson->id;
                @endphp
                <a href="{{ route('student.my-learning.player', ['course' => $course->id, 'lesson' => $lesson->id]) }}"
                   class="lesson-item {{ $isActive ? 'active-lesson' : '' }} {{ $isDone ? 'done-lesson' : '' }}">
                    <div class="lesson-num">
                        @if($isDone)
                            ✓
                        @elseif($isActive)
                            ▶
                        @else
                            {{ $idx + 1 }}
                        @endif
                    </div>
                    <div>
                        <p class="lesson-title" style="{{ $isActive ? 'color:#6366f1;font-weight:700;' : '' }}">
                            {{ $lesson->title }}
                        </p>
                        @if($lesson->duration)
                            <p class="lesson-dur">{{ $lesson->duration }} min</p>
                        @endif
                    </div>
                </a>
            @empty
                <p style="padding:16px;font-size:.85rem;color:#94a3b8;">No lessons in this course.</p>
            @endforelse
        </div>

        {{-- Rate button in sidebar --}}
        <div style="padding:16px; border-top:1px solid #e2e8f0; background:#fff;">
            <button onclick="openRating()"
                    style="width:100%;padding:11px;background:{{ $existingReview ? '#fef3c7' : '#6366f1' }};
                           color:{{ $existingReview ? '#92400e' : '#fff' }};
                           border:{{ $existingReview ? '1.5px solid #fcd34d' : 'none' }};
                           border-radius:10px;font-weight:700;cursor:pointer;font-size:.88rem;
                           transition:opacity .15s;"
                    onmouseover="this.style.opacity='.85'" onmouseout="this.style.opacity='1'">
                ⭐ {{ $existingReview ? 'Update My Rating (' . $existingReview->rating . '/5)' : 'Rate This Course' }}
            </button>
        </div>

    </aside>
</div>


{{-- ══════════════════════════════════════════
     RATING MODAL
══════════════════════════════════════════ --}}
<div id="ratingOverlay">
    <div class="rating-modal">
        <div style="font-size:2.4rem; margin-bottom:4px;">⭐</div>
        <h2 style="font-size:1.25rem; font-weight:800; color:#0f172a; margin-bottom:4px;">
            Rate this Course
        </h2>
        <p style="font-size:.85rem; color:#64748b; margin-bottom:4px;">
            <strong>{{ $course->title }}</strong>
        </p>
        <p style="font-size:.82rem; color:#94a3b8; margin-bottom:0;">
            Your feedback helps other students.
        </p>

        <form method="POST" action="{{ route('student.courses.review', $course) }}" id="reviewForm">
            @csrf

            {{-- Star picker --}}
            <div class="star-picker" id="starPicker">
                @for($s = 5; $s >= 1; $s--)
                    <input type="radio" name="rating" id="star{{ $s }}" value="{{ $s }}"
                           {{ isset($existingReview) && $existingReview->rating == $s ? 'checked' : '' }}>
                    <label for="star{{ $s }}" title="{{ $s }} stars">★</label>
                @endfor
            </div>
            <p id="ratingLabel" style="font-size:.82rem;color:#f59e0b;font-weight:700;min-height:18px;margin-bottom:12px;"></p>

            {{-- Comment --}}
            <textarea name="comment" rows="3"
                      placeholder="Share your thoughts about this course… (optional)"
                      style="width:100%;border:1.5px solid #e2e8f0;border-radius:10px;padding:10px 14px;
                             font-size:.87rem;resize:none;outline:none;transition:border .2s;box-sizing:border-box;"
                      onfocus="this.style.borderColor='#6366f1'" onblur="this.style.borderColor='#e2e8f0'"
            >{{ $existingReview?->comment }}</textarea>

            <div style="display:flex;gap:10px;margin-top:16px;">
                <button type="button" onclick="closeRating()"
                        style="flex:1;padding:11px;background:#f1f5f9;color:#475569;border:none;border-radius:10px;font-weight:600;cursor:pointer;">
                    Cancel
                </button>
                <button type="submit"
                        style="flex:1;padding:11px;background:#6366f1;color:#fff;border:none;border-radius:10px;font-weight:700;cursor:pointer;transition:background .2s;"
                        onmouseover="this.style.background='#4f46e5'" onmouseout="this.style.background='#6366f1'">
                    Submit Rating
                </button>
            </div>
        </form>
    </div>
</div>

@include('components.student.ai-assistant-fab')
@endsection

@push('scripts')
<script>
/* ── Rating modal ── */
const overlay = document.getElementById('ratingOverlay');
function openRating()  { overlay.classList.add('show'); document.body.style.overflow = 'hidden'; updateLabel(); }
function closeRating() { overlay.classList.remove('show'); document.body.style.overflow = ''; }

// Close on backdrop click
overlay.addEventListener('click', e => { if (e.target === overlay) closeRating(); });

// Escape key
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeRating(); });

/* ── Star label feedback ── */
const labels = ['', 'Poor', 'Fair', 'Good', 'Great', 'Excellent!'];
const ratingLabel = document.getElementById('ratingLabel');

function updateLabel() {
    const checked = document.querySelector('#starPicker input:checked');
    ratingLabel.textContent = checked ? labels[checked.value] : '';
}

document.querySelectorAll('#starPicker input').forEach(inp => {
    inp.addEventListener('change', updateLabel);
});

/* ════════════════════════════════════════
   💬 YOUTUBE-STYLE COMMENTS SYSTEM
════════════════════════════════════════ */

const LESSON_ID = {{ $activeLesson->id ?? 'null' }};
const COURSE_ID = {{ $course->id }};
const AUTH_USER = {
    id: {{ Auth::id() }},
    name: "{{ Auth::user()->name }}",
    role: "{{ Auth::user()->role }}"
};
const API_BASE = `/student/api/lessons/${LESSON_ID}`;

// Load comments on page load
document.addEventListener('DOMContentLoaded', () => {
    if (LESSON_ID) loadComments();
});

/**
 * Load and display all comments
 */
async function loadComments() {
    try {
        const response = await fetch(`${API_BASE}/comments`, {
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });

        const data = await response.json();
        if (data.success && data.data && data.data.data) {
            displayComments(data.data.data);
        }
    } catch (error) {
        console.error('Error loading comments:', error);
    }
}

/**
 * Display comments in the DOM
 */
function displayComments(comments) {
    const container = document.getElementById('commentsList');
    const countWrap = document.getElementById('commentCountWrap');

    // Update count
    const count = comments.length;
    countWrap.innerHTML = count > 0 
        ? `<strong>${count}</strong> ${count === 1 ? 'comment' : 'comments'}`
        : 'No comments yet. Be the first to share your thoughts!';

    if (count === 0) {
        container.innerHTML = '';
        return;
    }

    container.innerHTML = '';
    comments.forEach(comment => {
        container.appendChild(createCommentElement(comment));
    });
}

/**
 * Create a comment element (with replies)
 */
function createCommentElement(comment) {
    const wrapper = document.createElement('div');
    
    const commentDiv = document.createElement('div');
    commentDiv.className = 'yt-comment';
    commentDiv.innerHTML = `
        <img class="yt-comment-avatar" 
             src="https://ui-avatars.com/api/?name=${encodeURIComponent(comment.user.name)}&size=80&background=6366f1&color=fff&bold=true"
             alt="${comment.user.name}">
        
        <div style="flex:1;">
            <div class="yt-comment-header">
                <span class="yt-comment-author">${escapeHtml(comment.user.name)}</span>
                ${comment.user.role === 'instructor' ? `
                    <span class="yt-comment-instructor-badge">
                        👨‍🏫 Course Instructor
                    </span>
                ` : ''}
                <span class="yt-comment-time">${formatTime(comment.created_at)}</span>
            </div>
            <div class="yt-comment-text">${escapeHtml(comment.content)}</div>
            <div class="yt-comment-actions">
                <button class="yt-comment-action-btn" onclick="toggleReplyForm(this)">Reply</button>
                ${comment.user_id === AUTH_USER.id || AUTH_USER.role === 'instructor' ? `
                    <button class="yt-comment-action-btn" style="color:#ef4444;" onclick="deleteComment(${comment.id})">Delete</button>
                ` : ''}
            </div>

            {{-- Replies container --}}
            <div class="replies-container-${comment.id}" style="margin-top:12px;">
                ${comment.replies && comment.replies.length > 0 ? comment.replies.map(reply => `
                    <div class="yt-reply" style="display:flex; gap:12px; padding:12px 0; border:none;">
                        <img class="yt-comment-avatar" 
                             src="https://ui-avatars.com/api/?name=${encodeURIComponent(reply.user.name)}&size=80&background=6366f1&color=fff&bold=true"
                             alt="${reply.user.name}"
                             style="width:32px; height:32px;">
                        
                        <div style="flex:1;">
                            <div class="yt-comment-header">
                                <span class="yt-comment-author">${escapeHtml(reply.user.name)}</span>
                                ${reply.user.role === 'instructor' ? `
                                    <span class="yt-comment-instructor-badge">
                                        👨‍🏫 Course Instructor
                                    </span>
                                ` : ''}
                                <span class="yt-comment-time">${formatTime(reply.created_at)}</span>
                            </div>
                            <div class="yt-comment-text">${escapeHtml(reply.content)}</div>
                            <div class="yt-comment-actions">
                                ${reply.user_id === AUTH_USER.id || AUTH_USER.role === 'instructor' ? `
                                    <button class="yt-comment-action-btn" style="color:#ef4444;" onclick="deleteReply(${reply.id})">Delete</button>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                `).join('') : ''}
            </div>

            {{-- Reply form (hidden by default) --}}
            <div class="reply-form-container-${comment.id}" style="display:none;">
                <div class="yt-reply-form">
                    <textarea placeholder="Write a reply..." class="reply-textarea-${comment.id}"></textarea>
                    <div style="display:flex; flex-direction:column; gap:6px;">
                        <button type="button" onclick="submitReply(${comment.id})">Reply</button>
                        <button type="button" class="cancel-btn" onclick="toggleReplyForm(this.closest('.yt-reply-form').parentElement.previousElementSibling.querySelector('.yt-comment-action-btn'))">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    `;

    wrapper.appendChild(commentDiv);
    return wrapper;
}

/**
 * Toggle reply form visibility
 */
function toggleReplyForm(btn) {
    const commentDiv = btn.closest('.yt-comment');
    const parent = commentDiv.querySelector('div').parentElement;
    const form = parent.querySelector('[class*="reply-form-container-"]');
    
    if (form) {
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
        if (form.style.display === 'block') {
            form.querySelector('textarea').focus();
        }
    }
}

/**
 * Submit a new comment
 */
async function submitComment() {
    const textarea = document.getElementById('commentInput');
    const content = textarea.value.trim();

    if (!content) {
        alert('Please write a comment');
        return;
    }

    const btn = document.getElementById('submitCommentBtn');
    btn.disabled = true;
    btn.textContent = 'Posting...';

    try {
        const response = await fetch(`${API_BASE}/comments`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ content })
        });

        if (response.ok) {
            textarea.value = '';
            loadComments();
        } else {
            alert('Failed to post comment');
        }
    } catch (error) {
        console.error('Error posting comment:', error);
        alert('Error posting comment');
    } finally {
        btn.disabled = false;
        btn.textContent = 'Comment';
    }
}

/**
 * Submit a reply to a comment
 */
async function submitReply(commentId) {
    const textarea = document.querySelector(`.reply-textarea-${commentId}`);
    const content = textarea.value.trim();

    if (!content) {
        alert('Please write a reply');
        return;
    }

    const btn = event.target;
    btn.disabled = true;
    btn.textContent = 'Replying...';

    try {
        const response = await fetch(`${API_BASE}/comments`, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ 
                content,
                parent_id: commentId
            })
        });

        if (response.ok) {
            loadComments();
        } else {
            alert('Failed to post reply');
        }
    } catch (error) {
        console.error('Error posting reply:', error);
        alert('Error posting reply');
    } finally {
        btn.disabled = false;
        btn.textContent = 'Reply';
    }
}

/**
 * Delete a comment
 */
async function deleteComment(commentId) {
    if (!confirm('Delete this comment?')) return;

    try {
        const response = await fetch(`${API_BASE}/comments/${commentId}`, {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });

        if (response.ok) {
            loadComments();
        } else {
            alert('Failed to delete comment');
        }
    } catch (error) {
        console.error('Error deleting comment:', error);
        alert('Error deleting comment');
    }
}

/**
 * Delete a reply
 */
async function deleteReply(replyId) {
    if (!confirm('Delete this reply?')) return;

    try {
        const response = await fetch(`${API_BASE}/comments/${replyId}`, {
            method: 'DELETE',
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        });

        if (response.ok) {
            loadComments();
        } else {
            alert('Failed to delete reply');
        }
    } catch (error) {
        console.error('Error deleting reply:', error);
        alert('Error deleting reply');
    }
}

/**
 * Clear comment input
 */
function clearComment() {
    document.getElementById('commentInput').value = '';
}

/**
 * Format time to relative format (e.g., "2 hours ago")
 */
function formatTime(dateString) {
    const date = new Date(dateString);
    const now = new Date();
    const diff = Math.floor((now - date) / 1000);

    if (diff < 60) return 'Just now';
    if (diff < 3600) return `${Math.floor(diff / 60)}m ago`;
    if (diff < 86400) return `${Math.floor(diff / 3600)}h ago`;
    if (diff < 604800) return `${Math.floor(diff / 86400)}d ago`;
    
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: date.getFullYear() !== now.getFullYear() ? 'numeric' : undefined });
}

/**
 * Escape HTML to prevent XSS
 */
function escapeHtml(text) {
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// Hover effect on stars
document.querySelectorAll('#starPicker label').forEach((lbl, idx, arr) => {
    lbl.addEventListener('mouseenter', () => {
        arr.forEach((l, i) => l.classList.toggle('lit', i >= idx));
    });
    lbl.addEventListener('mouseleave', () => {
        arr.forEach(l => l.classList.remove('lit'));
        updateLabel();
    });
});

// Auto-open modal if course just completed and no review yet
@if($isComplete && !$existingReview)
    setTimeout(() => openRating(), 800);
@endif

// Initial label
updateLabel();

/* ════════════════════════════════════════════════
   80% VIDEO WATCH TRACKING
   Works for: HTML5 <video>, YouTube iFrame API
   No-video lessons → button unlocked immediately
════════════════════════════════════════════════ */

const WATCH_THRESHOLD = 0.80;   // 80%
const hasVideo = {{ $activeLesson && $activeLesson->video_url ? 'true' : 'false' }};
const alreadyDone = {{ in_array($activeLesson?->id ?? 0, $completedLessonIds) ? 'true' : 'false' }};
const isYoutube = {{ isset($isYoutube) && $isYoutube ? 'true' : 'false' }};

const completeBtn  = document.getElementById('completeBtn');
const progressFill = document.getElementById('watchProgressFill');
const watchHint    = document.getElementById('watchHint');
const watchText    = document.getElementById('watchText');
const watchIcon    = document.getElementById('watchIcon');

let unlocked = false;

function unlockComplete() {
    if (unlocked || !completeBtn) return;
    unlocked = true;
    completeBtn.classList.remove('locked');
    completeBtn.removeAttribute('title');
    completeBtn.style.cssText = 'background:#10b981;color:#fff;pointer-events:auto;cursor:pointer;';
    completeBtn.innerHTML = '✓ Mark as Complete';
    if (progressFill) progressFill.style.width = '100%';
    if (watchHint) watchHint.classList.add('unlocked');
    if (watchIcon) watchIcon.textContent = '✅';
    if (watchText) watchText.textContent = 'You can now mark this lesson as complete!';
}

function updateWatchUI(pct) {
    if (progressFill) progressFill.style.width = Math.min(pct * 100, 100) + '%';
    if (watchText && !unlocked) {
        const rem = Math.ceil((WATCH_THRESHOLD - pct) * 100);
        watchText.textContent = rem > 0
            ? `Watch ${rem}% more to unlock completion`
            : 'Almost there…';
    }
    if (pct >= WATCH_THRESHOLD) unlockComplete();
}

// ── If no video or already completed → unlock immediately ──
if (!hasVideo || alreadyDone) {
    unlockComplete();
    if (watchHint) watchHint.style.display = 'none';
    if (document.getElementById('watchProgressWrap'))
        document.getElementById('watchProgressWrap').style.display = 'none';
}

// ── HTML5 <video> tracking ──
const html5Video = document.getElementById('html5Video');
if (html5Video && !alreadyDone) {
    let maxReached = 0;
    html5Video.addEventListener('timeupdate', () => {
        if (!html5Video.duration) return;
        const pct = html5Video.currentTime / html5Video.duration;
        if (pct > maxReached) maxReached = pct;   // track max, not current (skip-proof)
        updateWatchUI(maxReached);
    });
}

// ── YouTube IFrame API tracking ──
if (isYoutube && !alreadyDone) {
    // Load YouTube IFrame API if not already loaded
    if (!window.YT) {
        const tag = document.createElement('script');
        tag.src = 'https://www.youtube.com/iframe_api';
        document.head.appendChild(tag);
    }

    let ytPlayer;
    let maxYTReached = 0;
    let ytInterval;

    window.onYouTubeIframeAPIReady = function () {
        ytPlayer = new YT.Player('ytPlayer', {
            events: {
                onReady: () => {
                    // Poll every second for time progress
                    ytInterval = setInterval(() => {
                        if (!ytPlayer || !ytPlayer.getDuration) return;
                        const dur = ytPlayer.getDuration();
                        const cur = ytPlayer.getCurrentTime();
                        if (!dur || dur <= 0) return;
                        const pct = cur / dur;
                        if (pct > maxYTReached) maxYTReached = pct;
                        updateWatchUI(maxYTReached);
                        if (maxYTReached >= WATCH_THRESHOLD) clearInterval(ytInterval);
                    }, 1000);
                },
                onStateChange: (e) => {
                    // YT.PlayerState.PLAYING = 1
                    if (e.data === 1 && !ytInterval) {
                        ytInterval = setInterval(() => {
                            if (!ytPlayer.getDuration) return;
                            const dur = ytPlayer.getDuration();
                            const cur = ytPlayer.getCurrentTime();
                            if (!dur) return;
                            const pct = cur / dur;
                            if (pct > maxYTReached) maxYTReached = pct;
                            updateWatchUI(maxYTReached);
                            if (maxYTReached >= WATCH_THRESHOLD) clearInterval(ytInterval);
                        }, 1000);
                    }
                }
            }
        });
    };

    // If API already loaded (navigating between lessons)
    if (window.YT && window.YT.Player) {
        window.onYouTubeIframeAPIReady();
    }
}
</script>
@endpush
