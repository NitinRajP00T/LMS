<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'discount_percent',
        'is_active',
        'expires_at',
    ];

    protected $casts = [
        'discount_percent' => 'integer',
        'is_active' => 'boolean',
        'expires_at' => 'datetime',
    ];
}
