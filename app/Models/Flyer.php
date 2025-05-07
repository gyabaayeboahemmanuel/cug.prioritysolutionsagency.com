<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Flyer extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'faculty',
        'programme',
        'mode',
        'image_path',
        'slug',
        'is_featured',
    ];

    /**
     * Automatically generate slug from title on creating a new flyer.
     */
    protected static function booted()
    {
        static::creating(function ($flyer) {
            $flyer->slug = Str::slug($flyer->title);
        });

        static::updating(function ($flyer) {
            if ($flyer->isDirty('title')) {
                $flyer->slug = Str::slug($flyer->title);
            }
        });
    }
}
