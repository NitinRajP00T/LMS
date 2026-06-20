<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'video_url',
        'duration',
        'order',
        'is_preview',
    ];

    protected $casts = [
        'duration' => 'integer',
        'order' => 'integer',
        'is_preview' => 'boolean',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function comments()
    {
        return $this->hasMany(LessonComment::class)->whereNull('parent_id')->orderBy('created_at', 'desc');
    }

    public function resources()
    {
        return $this->hasMany(LessonResource::class)->orderBy('created_at', 'asc');
    }
}
