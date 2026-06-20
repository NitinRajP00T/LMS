<!-- Lesson Comments & Replies Component -->
<div id="lesson-discussion" class="space-y-stack-md">
    <!-- Comments List -->
    <div id="comments-list" class="space-y-stack-md">
        <!-- Comments will be loaded here -->
    </div>

    <!-- Add Comment Input -->
    <div class="flex items-start gap-4 pt-stack-md">
        <div class="w-10 h-10 rounded-full bg-secondary-container flex items-center justify-center text-secondary font-bold">
            {{ substr(Auth::user()->name, 0, 2) }}
        </div>
        <div class="flex-1">
            <textarea 
                id="comment-textarea"
                class="w-full bg-white border border-outline-variant rounded-xl p-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none min-h-[100px]" 
                placeholder="Ask a question or share your thoughts..."
            ></textarea>
            <div class="flex justify-end mt-stack-sm gap-2">
                <button 
                    type="button"
                    onclick="resetCommentForm()"
                    class="px-6 py-2 border border-outline-variant rounded-lg font-label-md text-on-surface hover:bg-surface-container-low transition-colors"
                >
                    Cancel
                </button>
                <button 
                    type="button"
                    onclick="postComment()"
                    class="bg-primary text-white px-6 py-2 rounded-lg font-label-md hover:bg-primary-container transition-colors shadow-sm"
                >
                    Post Comment
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Comment Item Template (hidden, used for cloning) -->
<template id="comment-template">
    <div class="flex items-start gap-4">
        <div class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold flex-shrink-0">
            <span class="user-initials"></span>
        </div>
        <div class="flex-1">
            <div class="bg-surface-container-low p-4 rounded-xl border border-outline-variant/30">
                <div class="flex items-center justify-between mb-2 gap-2 flex-wrap">
                    <div class="flex items-center gap-2">
                        <span class="font-label-md text-on-surface user-name"></span>
                        <span class="bg-primary/10 text-primary px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider instructor-badge" style="display: none;">Instructor</span>
                    </div>
                    <span class="text-label-sm text-on-surface-variant comment-time"></span>
                </div>
                <p class="text-body-md text-on-surface comment-content"></p>
                <div class="flex items-center gap-4 mt-3 comment-actions">
                    <button class="text-label-sm text-primary hover:font-bold transition-colors reply-btn" onclick="toggleReplyForm(this)">Reply</button>
                    <button class="text-label-sm text-error hover:font-bold transition-colors delete-btn" style="display: none;" onclick="deleteComment(this)">Delete</button>
                </div>
            </div>

            <!-- Replies Container -->
            <div class="ml-12 mt-4 space-y-4 replies-container"></div>

            <!-- Reply Form (hidden by default) -->
            <div class="ml-12 mt-4 reply-form" style="display: none;">
                <div class="flex items-start gap-4">
                    <div class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center text-secondary font-bold text-sm">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                    <div class="flex-1">
                        <textarea 
                            class="w-full bg-white border border-outline-variant rounded-xl p-3 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none min-h-[80px] reply-textarea"
                            placeholder="Write a reply..."
                        ></textarea>
                        <div class="flex justify-end mt-stack-sm gap-2">
                            <button 
                                type="button"
                                class="px-4 py-2 border border-outline-variant rounded-lg font-label-md text-on-surface hover:bg-surface-container-low transition-colors text-sm cancel-reply-btn"
                                onclick="toggleReplyForm(this.closest('.reply-form').previousElementSibling.querySelector('.reply-btn'))"
                            >
                                Cancel
                            </button>
                            <button 
                                type="button"
                                class="bg-primary text-white px-4 py-2 rounded-lg font-label-md hover:bg-primary-container transition-colors shadow-sm text-sm submit-reply-btn"
                                onclick="postReply(this)"
                            >
                                Reply
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<!-- Reply Item Template (hidden, used for cloning) -->
<template id="reply-template">
    <div class="flex items-start gap-4">
        <img alt="Reply author" class="w-8 h-8 rounded-full object-cover flex-shrink-0 user-avatar" src="" />
        <div class="flex-1 bg-primary/5 p-4 rounded-xl border border-primary/10">
            <div class="flex items-center justify-between mb-1 gap-2 flex-wrap">
                <div class="flex items-center gap-2">
                    <span class="font-label-md text-on-surface user-name"></span>
                    <span class="bg-primary/10 text-primary px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider instructor-badge" style="display: none;">Instructor</span>
                </div>
                <span class="text-label-sm text-on-surface-variant reply-time"></span>
            </div>
            <p class="text-body-md text-on-surface reply-content"></p>
            <div class="flex items-center gap-4 mt-2 reply-actions">
                <button class="text-label-sm text-error hover:font-bold transition-colors delete-reply-btn" style="display: none;" onclick="deleteReply(this)">Delete</button>
            </div>
        </div>
    </div>
</template>

<style>
    .comment-loading {
        opacity: 0.6;
        pointer-events: none;
    }
    
    .instructor-badge {
        display: none;
    }
    
    .instructor-badge.show {
        display: inline-block;
    }
</style>

<script>
    const LESSON_ID = {{ $lesson->id }};
    const AUTH_USER_ID = {{ Auth::id() }};
    const AUTH_USER_ROLE = "{{ Auth::user()->role }}";
    const AUTH_USER_NAME = "{{ Auth::user()->name }}";
    const API_BASE = `/student/api/lessons/${LESSON_ID}`;

    // Load comments on page load
    document.addEventListener('DOMContentLoaded', function() {
        loadComments();
    });

    /**
     * Load all comments for the lesson
     */
    async function loadComments() {
        try {
            const response = await fetch(`${API_BASE}/comments`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            if (!response.ok) throw new Error('Failed to load comments');

            const data = await response.json();
            
            if (data.success && data.data && data.data.data) {
                renderComments(data.data.data);
            }
        } catch (error) {
            console.error('Error loading comments:', error);
            showError('Failed to load comments');
        }
    }

    /**
     * Render comments in the DOM
     */
    function renderComments(comments) {
        const commentsList = document.getElementById('comments-list');
        commentsList.innerHTML = '';

        if (comments.length === 0) {
            commentsList.innerHTML = '<p class="text-center text-on-surface-variant font-body-md">No comments yet. Be the first to comment!</p>';
            return;
        }

        comments.forEach(comment => {
            const commentEl = renderComment(comment);
            commentsList.appendChild(commentEl);
        });
    }

    /**
     * Render a single comment with its replies
     */
    function renderComment(comment) {
        const template = document.getElementById('comment-template');
        const clone = template.content.cloneNode(true);

        // Set comment data
        const userInitials = comment.user.name.split(' ').map(n => n[0]).join('').toUpperCase();
        clone.querySelector('.user-initials').textContent = userInitials;
        clone.querySelector('.user-name').textContent = comment.user.name;
        clone.querySelector('.comment-content').textContent = comment.content;
        clone.querySelector('.comment-time').textContent = formatTime(comment.created_at);

        // Show instructor badge if user is instructor
        if (comment.user.role === 'instructor') {
            clone.querySelector('.instructor-badge').style.display = 'inline-block';
        }

        // Show delete button only for comment author or instructors
        if (comment.user_id === AUTH_USER_ID || AUTH_USER_ROLE === 'instructor') {
            clone.querySelector('.delete-btn').style.display = 'block';
            clone.querySelector('.delete-btn').onclick = () => deleteComment(comment.id);
        }

        // Set comment ID for reference
        const commentDiv = clone.querySelector('.flex-1').parentElement;
        commentDiv.dataset.commentId = comment.id;
        commentDiv.dataset.userId = comment.user_id;

        // Render replies
        if (comment.replies && comment.replies.length > 0) {
            const repliesContainer = clone.querySelector('.replies-container');
            comment.replies.forEach(reply => {
                const replyEl = renderReply(reply);
                repliesContainer.appendChild(replyEl);
            });
        }

        const wrapper = document.createElement('div');
        wrapper.appendChild(clone);
        return wrapper.firstElementChild;
    }

    /**
     * Render a single reply
     */
    function renderReply(reply) {
        const template = document.getElementById('reply-template');
        const clone = template.content.cloneNode(true);

        clone.querySelector('.user-name').textContent = reply.user.name;
        clone.querySelector('.reply-content').textContent = reply.content;
        clone.querySelector('.reply-time').textContent = formatTime(reply.created_at);
        clone.querySelector('.user-avatar').src = reply.user.avatar_url || 'https://via.placeholder.com/32';

        // Show instructor badge if user is instructor
        if (reply.user.role === 'instructor') {
            clone.querySelector('.instructor-badge').style.display = 'inline-block';
        }

        // Show delete button only for reply author or instructors
        if (reply.user_id === AUTH_USER_ID || AUTH_USER_ROLE === 'instructor') {
            clone.querySelector('.delete-reply-btn').style.display = 'block';
            clone.querySelector('.delete-reply-btn').onclick = () => deleteReply(reply.id);
        }

        const wrapper = document.createElement('div');
        wrapper.appendChild(clone);
        return wrapper.firstElementChild;
    }

    /**
     * Post a new comment
     */
    async function postComment() {
        const textarea = document.getElementById('comment-textarea');
        const content = textarea.value.trim();

        if (!content) {
            showError('Please enter a comment');
            return;
        }

        const button = event.target;
        button.disabled = true;
        button.textContent = 'Posting...';

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

            if (!response.ok) throw new Error('Failed to post comment');

            const data = await response.json();
            
            if (data.success) {
                resetCommentForm();
                loadComments();
                showSuccess('Comment posted successfully');
            }
        } catch (error) {
            console.error('Error posting comment:', error);
            showError('Failed to post comment');
        } finally {
            button.disabled = false;
            button.textContent = 'Post Comment';
        }
    }

    /**
     * Toggle reply form visibility
     */
    function toggleReplyForm(replyBtn) {
        const replyForm = replyBtn.closest('.comment-actions').parentElement.nextElementSibling;
        const isHidden = replyForm.style.display === 'none';
        
        // Close all other reply forms
        document.querySelectorAll('.reply-form').forEach(form => {
            form.style.display = 'none';
        });

        if (isHidden) {
            replyForm.style.display = 'block';
            replyForm.querySelector('.reply-textarea').focus();
        }
    }

    /**
     * Post a reply to a comment
     */
    async function postReply(submitBtn) {
        const replyForm = submitBtn.closest('.reply-form');
        const textarea = replyForm.querySelector('.reply-textarea');
        const content = textarea.value.trim();
        const commentDiv = replyForm.closest('.flex.items-start.gap-4').querySelector('[data-comment-id]');
        const parentId = commentDiv?.dataset.commentId;

        if (!content) {
            showError('Please enter a reply');
            return;
        }

        if (!parentId) {
            showError('Unable to find parent comment');
            return;
        }

        submitBtn.disabled = true;
        submitBtn.textContent = 'Replying...';

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
                    parent_id: parseInt(parentId)
                })
            });

            if (!response.ok) throw new Error('Failed to post reply');

            const data = await response.json();
            
            if (data.success) {
                replyForm.style.display = 'none';
                textarea.value = '';
                loadComments();
                showSuccess('Reply posted successfully');
            }
        } catch (error) {
            console.error('Error posting reply:', error);
            showError('Failed to post reply');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Reply';
        }
    }

    /**
     * Delete a comment
     */
    async function deleteComment(commentId) {
        if (!confirm('Are you sure you want to delete this comment? This action cannot be undone.')) {
            return;
        }

        try {
            const response = await fetch(`${API_BASE}/comments/${commentId}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            if (!response.ok) throw new Error('Failed to delete comment');

            const data = await response.json();
            
            if (data.success) {
                loadComments();
                showSuccess('Comment deleted successfully');
            }
        } catch (error) {
            console.error('Error deleting comment:', error);
            showError('Failed to delete comment');
        }
    }

    /**
     * Delete a reply
     */
    async function deleteReply(replyId) {
        if (!confirm('Are you sure you want to delete this reply? This action cannot be undone.')) {
            return;
        }

        try {
            const response = await fetch(`${API_BASE}/comments/${replyId}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            if (!response.ok) throw new Error('Failed to delete reply');

            const data = await response.json();
            
            if (data.success) {
                loadComments();
                showSuccess('Reply deleted successfully');
            }
        } catch (error) {
            console.error('Error deleting reply:', error);
            showError('Failed to delete reply');
        }
    }

    /**
     * Reset comment form
     */
    function resetCommentForm() {
        document.getElementById('comment-textarea').value = '';
    }

    /**
     * Format time to relative format
     */
    function formatTime(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diff = Math.floor((now - date) / 1000);

        if (diff < 60) return 'Just now';
        if (diff < 3600) return `${Math.floor(diff / 60)} minutes ago`;
        if (diff < 86400) return `${Math.floor(diff / 3600)} hours ago`;
        if (diff < 604800) return `${Math.floor(diff / 86400)} days ago`;
        
        return date.toLocaleDateString();
    }

    /**
     * Show success message
     */
    function showSuccess(message) {
        console.log('Success:', message);
        // Add your toast/notification implementation here
        alert(message);
    }

    /**
     * Show error message
     */
    function showError(message) {
        console.error('Error:', message);
        // Add your toast/notification implementation here
        alert('Error: ' + message);
    }
</script>
