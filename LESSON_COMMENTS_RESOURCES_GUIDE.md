# Lesson Comments & Resources Implementation Guide

## Overview
This document describes the implementation of commenting and resource-sharing features for video lessons in the LMS platform. Students can comment on lessons, instructors can reply, and instructors can upload course resources.

## Features Implemented

### 1. **Student Comments & Discussion**
- Students can post comments on any lesson
- Threaded replies: Instructors and students can reply to comments
- Instructor badge: Replies from instructors show an "Instructor" badge
- Comment management: Users can delete their own comments, instructors can delete any comment
- Real-time comment loading with pagination

### 2. **Resource Sharing**
- Instructors can upload files or external links as course resources
- Resources appear below the video in a dedicated "Resources" tab
- Students can download files or access external links
- File type detection with appropriate icons (PDF, Video, Spreadsheet, etc.)
- Resource management: Instructors can edit and delete resources

### 3. **Responsive Tab System**
- Overview tab: Course description and learning objectives
- Q&A tab: All comments and discussion threads
- Resources tab: Course materials and links
- Smooth tab switching with active state indicators

## Database Tables

### lesson_comments
```
id: bigint
lesson_id: bigint (foreign key -> lessons)
user_id: bigint (foreign key -> users)
parent_id: bigint (nullable, foreign key -> lesson_comments for replies)
content: text
created_at: timestamp
updated_at: timestamp
```

### lesson_resources
```
id: bigint
lesson_id: bigint (foreign key -> lessons)
title: string
url: string (nullable, for external links)
file_path: string (nullable, for uploaded files)
created_at: timestamp
updated_at: timestamp
```

## API Endpoints

### Comments API
- `GET /student/api/lessons/{lesson}/comments` - Get all comments
- `POST /student/api/lessons/{lesson}/comments` - Create a new comment
- `GET /student/api/lessons/{lesson}/comments/{comment}` - Get a comment with replies
- `PUT /student/api/lessons/{lesson}/comments/{comment}` - Update a comment (author only)
- `DELETE /student/api/lessons/{lesson}/comments/{comment}` - Delete a comment (author/instructor)
- `GET /student/api/lessons/{lesson}/comments/{comment}/replies` - Get all replies

### Resources API
- `GET /student/api/lessons/{lesson}/resources` - Get all resources
- `POST /student/api/lessons/{lesson}/resources` - Upload a new resource (instructor only)
- `GET /student/api/lessons/{lesson}/resources/{resource}` - Get a resource
- `PUT /student/api/lessons/{lesson}/resources/{resource}` - Update a resource (instructor only)
- `DELETE /student/api/lessons/{lesson}/resources/{resource}` - Delete a resource (instructor only)

## Controllers

### LessonCommentController
**Location:** `app/Http/Controllers/Student/LessonCommentController.php`

Methods:
- `index()` - Get paginated top-level comments for a lesson
- `store()` - Create a new comment or reply
- `show()` - Get a single comment with all replies
- `update()` - Edit a comment (author only)
- `destroy()` - Delete a comment (author/instructor)
- `getReplies()` - Get all replies for a comment

### LessonResourceController
**Location:** `app/Http/Controllers/Student/LessonResourceController.php`

Methods:
- `index()` - Get all resources for a lesson
- `store()` - Upload a new resource (instructor only, supports files up to 100MB)
- `show()` - Get a specific resource
- `update()` - Update resource metadata or file (instructor only)
- `destroy()` - Delete a resource (instructor only)

## Components

### lesson-comments.blade.php
**Location:** `resources/views/components/lesson-comments.blade.php`

Features:
- Dynamic comment loading and rendering
- Reply form with nested structure
- Comment/reply editing and deletion
- Instructor badge display
- Relative time formatting (e.g., "2 hours ago")
- Form validation and error handling

### lesson-resources.blade.php
**Location:** `resources/views/components/lesson-resources.blade.php`

Features:
- File upload form with drag-and-drop support
- External link input with URL validation
- Resource list with file type icons
- Download/access functionality
- Resource management (delete, update)
- File size formatting
- Upload progress feedback

## Views

### Course Learning Player
**Location:** `resources/views/Student/Cource-learning-player..blade.php`

Updated sections:
- Tab system with Overview, Q&A, and Resources tabs
- Integration of lesson-comments component
- Integration of lesson-resources component
- Tab switching functionality with JavaScript

## Routes

**File:** `routes/student.php`

Added routes (protected by auth and student/instructor role):
```php
// Comments API
GET /student/api/lessons/{lesson}/comments
POST /student/api/lessons/{lesson}/comments
GET /student/api/lessons/{lesson}/comments/{comment}
PUT /student/api/lessons/{lesson}/comments/{comment}
DELETE /student/api/lessons/{lesson}/comments/{comment}
GET /student/api/lessons/{lesson}/comments/{comment}/replies

// Resources API
GET /student/api/lessons/{lesson}/resources
POST /student/api/lessons/{lesson}/resources
GET /student/api/lessons/{lesson}/resources/{resource}
PUT /student/api/lessons/{lesson}/resources/{resource}
DELETE /student/api/lessons/{lesson}/resources/{resource}
```

## Models

### Lesson.php (Updated)
```php
public function comments()
{
    return $this->hasMany(LessonComment::class)
        ->whereNull('parent_id')
        ->orderBy('created_at', 'desc');
}

public function resources()
{
    return $this->hasMany(LessonResource::class)
        ->orderBy('created_at', 'asc');
}
```

### LessonComment.php
- Supports hierarchical comments (parent_id for replies)
- Relationships: user(), lesson(), parent(), replies()

### LessonResource.php
- Supports both file uploads and external URLs
- Relationship: lesson()

## Usage Instructions

### For Students

1. **Posting a Comment:**
   - Navigate to a lesson and click the "Q&A" tab
   - Type your question or comment in the textarea
   - Click "Post Comment"

2. **Replying to a Comment:**
   - Click "Reply" on any comment
   - Type your response in the reply box
   - Click "Reply" to submit

3. **Deleting Your Comment:**
   - Click the "Delete" button on your comment (visible on hover)
   - Confirm the deletion

4. **Accessing Resources:**
   - Click the "Resources" tab below the video
   - Download files or click external links
   - Resources are organized by creation date

### For Instructors

1. **Uploading Resources:**
   - Navigate to a lesson and click the "Resources" tab
   - Click "Upload Resource"
   - Choose between uploading a file or providing an external link
   - Enter a descriptive title
   - Click "Upload"

2. **Managing Resources:**
   - Hover over any resource to see management options
   - Click the delete icon to remove a resource
   - Click the download icon to preview or download

3. **Replying to Comments:**
   - When you post a reply, it automatically shows an "Instructor" badge
   - Your replies appear in a slightly different style (light blue background)

4. **Moderating Comments:**
   - You can delete any comment in your course
   - Deleted comments are permanently removed

## Authorization & Security

- **Comments:** Students and instructors can only post/reply to their own comments. Instructors can delete any comment.
- **Resources:** Only the course instructor can upload, edit, or delete resources.
- **Authentication:** All endpoints require user authentication and appropriate role.
- **File Validation:** Uploaded files are limited to 100MB and stored in `storage/app/public/lesson-resources/`

## File Storage

- **Location:** `storage/app/public/lesson-resources/{lesson_id}/`
- **URL:** `/storage/lesson-resources/{lesson_id}/{filename}`
- **Public Access:** Files are stored in the public disk for easy access

## Frontend Technologies

- **Vanilla JavaScript:** No framework dependencies
- **Fetch API:** For AJAX requests
- **Blade Templates:** Server-side rendering
- **Material Design Icons:** For UI elements

## API Response Format

All API endpoints return JSON with the following structure:

```json
{
  "success": true/false,
  "data": {...},
  "message": "Success or error message"
}
```

## Error Handling

- **400 Bad Request:** Missing or invalid parameters
- **403 Unauthorized:** User doesn't have permission
- **404 Not Found:** Resource doesn't exist
- **422 Unprocessable Entity:** Validation failed
- **500 Server Error:** Internal server error

## Notifications

The system uses browser alert() for notifications. Consider implementing:
- Toast notifications for better UX
- Success/error banners
- Loading spinners during async operations

## Future Enhancements

1. **Edit Comments:** Allow comment authors to edit their comments
2. **Comment Reactions:** Add emoji reactions or upvotes
3. **Search:** Search comments by keyword
4. **Notifications:** Notify users of replies to their comments
5. **Attachments in Comments:** Allow image/file attachments in comments
6. **Pinned Comments:** Instructors can pin important comments
7. **Comment Threads:** Expand all replies without pagination
8. **Rich Text Editor:** WYSIWYG editor for comments and resources description

## Testing

### Create a Test Lesson
```php
// In routes or a seeder
$lesson = Lesson::find(1);
$course = $lesson->course;
```

### Test Comment Flow
1. Create comment: POST `/student/api/lessons/1/comments`
2. Get comments: GET `/student/api/lessons/1/comments`
3. Reply to comment: POST `/student/api/lessons/1/comments` with parent_id
4. Delete comment: DELETE `/student/api/lessons/1/comments/1`

### Test Resource Flow
1. Upload resource: POST `/student/api/lessons/1/resources`
2. Get resources: GET `/student/api/lessons/1/resources`
3. Download resource: Click download button or GET `/storage/lesson-resources/1/file.pdf`
4. Delete resource: DELETE `/student/api/lessons/1/resources/1`

## Troubleshooting

### CSRF Token Missing
- Ensure meta tag exists: `<meta name="csrf-token" content="{{ csrf_token() }}">`
- Check that JavaScript is reading it correctly

### Comments Not Loading
- Check browser console for JavaScript errors
- Verify API endpoint URLs
- Check user authentication

### Resources Not Uploading
- Check file size (max 100MB)
- Verify storage permissions: `chmod -R 755 storage/`
- Check `config/filesystems.php` for public disk configuration

### Instructor Badge Not Showing
- Verify user role in database is "instructor"
- Check that course.user_id matches Auth::id()

## Migration Files Needed

If not already created, run these migrations:

```bash
php artisan migrate
```

Ensure these tables exist:
- lesson_comments
- lesson_resources

The migrations are included in the existing database schema.
