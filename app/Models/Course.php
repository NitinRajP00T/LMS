<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'learning_points',
        'image',
        'price',
        'discount_percent',
        'requirements',
        'level',
        'language',
        'is_published',
        'published_at',
        'students_count',
        'average_rating',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount_percent' => 'integer',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'students_count' => 'integer',
        'average_rating' => 'decimal:2',
    ];

    /**
     * Scope to filter published courses
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Relationships
     */
    public function instructor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order', 'asc');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
