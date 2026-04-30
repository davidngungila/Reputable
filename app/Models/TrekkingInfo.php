<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class TrekkingInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category',
        'sections',
        'images',
        'featured_image',
        'sort_order',
        'is_active',
        'is_featured',
    ];

    protected $casts = [
        'sections' => 'array',
        'images' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($info) {
            if (empty($info->slug)) {
                $info->slug = Str::slug($info->title);
            }
        });

        static::updating(function ($info) {
            if ($info->isDirty('title') && empty($info->slug)) {
                $info->slug = Str::slug($info->title);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    public function getFeaturedImageAttribute()
    {
        if ($this->featured_image) {
            return $this->featured_image;
        }
        
        if ($this->images && !empty($this->images[0])) {
            return $this->images[0];
        }
        
        return 'https://via.placeholder.com/800x600/cccccc/666666?text=' . urlencode($this->title);
    }

    public function getUrlAttribute()
    {
        return route('mountain-trekking.info.show', $this->slug);
    }
}
