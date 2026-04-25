<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'activity_type',
        'location',
        'duration',
        'difficulty_level',
        'age_requirement',
        'group_size',
        'price',
        'highlights',
        'inclusions',
        'exclusions',
        'what_to_bring',
        'safety_info',
        'best_time',
        'images',
        'status',
        'featured',
    ];

    protected $casts = [
        'highlights' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'what_to_bring' => 'array',
        'safety_info' => 'array',
        'images' => 'array',
        'featured' => 'boolean',
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function destinations(): BelongsToMany
    {
        return $this->belongsToMany(Destination::class, 'activity_destinations');
    }

    public function tours(): BelongsToMany
    {
        return $this->belongsToMany(Tour::class, 'tour_activities');
    }

    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(Booking::class, 'booking_activities');
    }

    // Scopes for different activity types
    public function scopeCultural($query)
    {
        return $query->where('activity_type', 'cultural');
    }

    public function scopeBeach($query)
    {
        return $query->where('activity_type', 'beach');
    }

    public function scopeWildlife($query)
    {
        return $query->where('activity_type', 'wildlife');
    }

    public function scopeAdventure($query)
    {
        return $query->where('activity_type', 'adventure');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
