<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class TrekkingGuide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'bio',
        'specialization',
        'languages',
        'experience_years',
        'certifications',
        'achievements',
        'phone',
        'email',
        'images',
        'profile_image',
        'mountains_expertise',
        'daily_rate',
        'services',
        'reviews',
        'rating',
        'total_trips',
        'is_available',
        'is_featured',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'languages' => 'array',
        'images' => 'array',
        'mountains_expertise' => 'array',
        'reviews' => 'array',
        'daily_rate' => 'decimal:2',
        'rating' => 'integer',
        'total_trips' => 'integer',
        'is_available' => 'boolean',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($guide) {
            if (empty($guide->slug)) {
                $guide->slug = Str::slug($guide->name);
            }
        });

        static::updating(function ($guide) {
            if ($guide->isDirty('name') && empty($guide->slug)) {
                $guide->slug = Str::slug($guide->name);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeBySpecialization($query, $specialization)
    {
        return $query->where('specialization', $specialization);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function getProfileImageAttribute()
    {
        if ($this->profile_image) {
            return $this->profile_image;
        }
        
        if ($this->images && !empty($this->images[0])) {
            return $this->images[0];
        }
        
        return 'https://via.placeholder.com/400x400/cccccc/666666?text=' . urlencode($this->name);
    }

    public function getFormattedRatingAttribute()
    {
        return number_format($this->rating, 1);
    }

    public function getFormattedDailyRateAttribute()
    {
        if ($this->daily_rate) {
            return '$' . number_format($this->daily_rate, 0) . '/day';
        }
        return 'Contact for rates';
    }

    public function getLanguagesListAttribute()
    {
        if ($this->languages && is_array($this->languages)) {
            return implode(', ', $this->languages);
        }
        return 'English';
    }

    public function getUrlAttribute()
    {
        return route('mountain-trekking.guides.show', $this->slug);
    }
}
