<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LessonComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lesson_id',
        'parent_id',
        'content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function parent()
    {
        return $this->belongsTo(LessonComment::class, 'parent_id');
    }

    public function replies()
    {
        return $this->hasMany(LessonComment::class, 'parent_id')->orderBy('created_at', 'asc');
    }
}
