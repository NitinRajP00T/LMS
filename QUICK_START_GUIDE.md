# Quick Start Guide: Lesson Comments & Resources

## For Developers

### Setup

1. **No migrations needed** - Table structures already exist in database
2. **Controllers automatically imported** in routes/student.php
3. **Routes configured** - All API endpoints ready to use

### Usage in Views

```blade
<!-- Include comments component -->
@include('components.lesson-comments')

<!-- Include resources component -->
@include('components.lesson-resources')

<!-- Ensure these variables exist in controller view data:
     - $lesson (Lesson model)
     - $course (Course model)
-->
```

### Required Variables

Pass these to your view:
```php
return view('your-view', [
    'lesson' => $lesson,  // Lesson model instance
    'course' => $course,  // Course model instance
]);
```

### Testing API Endpoints

```bash
# Get all comments for lesson 1
curl http://localhost:8000/student/api/lessons/1/comments \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "X-CSRF-TOKEN: YOUR_CSRF_TOKEN"

# Create a comment
curl -X POST http://localhost:8000/student/api/lessons/1/comments \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "Content-Type: application/json" \
  -H "X-CSRF-TOKEN: YOUR_CSRF_TOKEN" \
  -d '{"content": "Great lesson!"}'

# Upload a resource
curl -X POST http://localhost:8000/student/api/lessons/1/resources \
  -H "Authorization: Bearer YOUR_TOKEN" \
  -H "X-CSRF-TOKEN: YOUR_CSRF_TOKEN" \
  -F "title=Lecture Slides" \
  -F "file=@/path/to/slides.pdf"
```

### File Structure

```
app/Http/Controllers/Student/
├── LessonCommentController.php    (New)
└── LessonResourceController.php   (New)

resources/views/components/
├── lesson-comments.blade.php      (New)
└── lesson-resources.blade.php     (New)

resources/views/Student/
└── Cource-learning-player..blade.php (Modified)

routes/
└── student.php                    (Modified)

Documentation/
├── LESSON_COMMENTS_RESOURCES_GUIDE.md    (New)
└── IMPLEMENTATION_SUMMARY.md             (New)
```

### Key Models & Relationships

```php
// Lesson Model
$lesson->comments()    // Get all top-level comments
$lesson->resources()   // Get all resources

// LessonComment Model
$comment->user()       // Get comment author
$comment->lesson()     // Get parent lesson
$comment->parent()     // Get parent comment (if reply)
$comment->replies()    // Get all replies

// LessonResource Model
$resource->lesson()    // Get parent lesson
```

### Component JavaScript API

Both components expose these global functions:

**Comments:**
- `loadComments()` - Reload all comments
- `postComment()` - Submit comment form
- `postReply(submitBtn)` - Submit reply
- `deleteComment(id)` - Delete a comment
- `toggleReplyForm(btn)` - Show/hide reply form
- `formatTime(dateString)` - Format timestamp

**Resources:**
- `loadResources()` - Reload all resources
- `uploadResource()` - Submit upload form
- `downloadResource(btn)` - Download/open resource
- `deleteResource(btn)` - Delete a resource
- `toggleUploadForm()` - Show/hide upload form

### Customization

#### Change Alert Notifications

In `lesson-comments.blade.php` and `lesson-resources.blade.php`:

```javascript
// Replace these functions with your notification system
function showSuccess(message) {
    // Your toast/notification library here
    toastr.success(message);
}

function showError(message) {
    toastr.error(message);
}
```

#### Style Customization

All components use Tailwind CSS classes. Modify:
- Colors: Use Tailwind utilities (e.g., `bg-primary`, `text-primary`)
- Spacing: Use Tailwind spacing (e.g., `gap-4`, `p-4`)
- Fonts: Use Tailwind typography (e.g., `font-headline-md`)

#### API Base URL

Both components use:
```javascript
const API_BASE = `/student/api/lessons/${LESSON_ID}`;
```

Change this if your routing differs.

### Extending Functionality

#### Add Comment Search

```php
// In LessonCommentController
public function search(Lesson $lesson, Request $request)
{
    $query = $request->get('q');
    return $lesson->comments()
        ->where('content', 'like', '%' . $query . '%')
        ->get();
}
```

#### Add Comment Reactions

```php
// Add to models and controllers
public function reactions()
{
    return $this->morphMany(Reaction::class, 'reactable');
}
```

#### Add Edit Comments

```javascript
// In lesson-comments component
async function editComment(commentId, newContent) {
    const response = await fetch(`${API_BASE}/comments/${commentId}`, {
        method: 'PUT',
        body: JSON.stringify({ content: newContent }),
        // ... headers
    });
}
```

### Debugging

#### Check Comments in Database
```bash
php artisan tinker
>>> App\Models\LessonComment::with('user')->get()
```

#### Check Resources in Database
```bash
php artisan tinker
>>> App\Models\LessonResource::all()
```

#### View API Response
Open browser DevTools → Network tab → Look for `/student/api/lessons/` requests

#### Console Errors
```javascript
// Open browser console and check for JavaScript errors
console.log(API_BASE);  // Should show correct API path
console.log(LESSON_ID); // Should show lesson ID
```

### Performance Optimization

#### Add Caching for Comments
```php
public function index(Lesson $lesson)
{
    $cacheKey = 'lesson_comments_' . $lesson->id;
    return cache()->remember($cacheKey, 3600, function() use ($lesson) {
        return $lesson->comments()->with('user', 'replies.user')->get();
    });
}
```

#### Add Database Indexing
```php
// In migration
Schema::table('lesson_comments', function (Blueprint $table) {
    $table->index('lesson_id');
    $table->index('user_id');
    $table->index('parent_id');
});

Schema::table('lesson_resources', function (Blueprint $table) {
    $table->index('lesson_id');
});
```

### Common Customizations

#### Restrict Comments to Enrolled Students Only

```php
// In LessonCommentController
public function store(Request $request, Lesson $lesson)
{
    $user = Auth::user();
    
    // Check enrollment
    if ($user->isStudent() && !$user->isTakenCourse($lesson->course_id)) {
        return response()->json(['success' => false, 'message' => 'Not enrolled'], 403);
    }
    // ... continue
}
```

#### Add Comment Moderation

```php
// Add pending status field
$comment->pending_moderation = true;

// Add approvals
public function approve(LessonComment $comment)
{
    $comment->update(['pending_moderation' => false]);
}
```

#### Limit Comments per User

```php
public function store(Request $request, Lesson $lesson)
{
    $limit = LessonComment::where('user_id', Auth::id())
        ->where('created_at', '>=', now()->subHour())
        ->count();
    
    if ($limit >= 10) {
        return response()->json(['success' => false, 'message' => 'Rate limit'], 429);
    }
    // ... continue
}
```

### Integration with Other Systems

#### Send Email on Instructor Reply
```php
public function store(Request $request, Lesson $lesson)
{
    $comment = LessonComment::create([...]);
    
    // Send email to original comment author
    if ($comment->parent_id && Auth::user()->role === 'instructor') {
        Mail::send(new InstructorReplied($comment));
    }
}
```

#### Log Activity
```php
public function store(Request $request, Lesson $lesson)
{
    $comment = LessonComment::create([...]);
    activity('lesson_comment')
        ->performedBy(Auth::user())
        ->on($lesson)
        ->log('created');
    return $comment;
}
```

### Browser Compatibility

- Chrome/Edge: Full support ✅
- Firefox: Full support ✅
- Safari: Full support ✅
- IE 11: Not supported ✗ (Uses Fetch API)

### Mobile Responsive

All components are fully responsive:
- Tablets: Full layout
- Mobile: Stacked layout with appropriate margins
- Touch-friendly: Buttons > 44px

### Accessibility

Components include:
- Semantic HTML
- ARIA labels (in progress)
- Keyboard navigation
- Color contrast compliance

---

**Need Help?** Refer to `LESSON_COMMENTS_RESOURCES_GUIDE.md` for detailed documentation.
