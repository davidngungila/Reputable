<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'location', 'duration_days', 
        'base_price', 'international_price_min', 'international_price_max',
        'best_season', 'package_highlights', 'route', 'difficulty', 'difficulty_level',
        'max_altitude', 'altitude_gain', 'package_type', 'route_name', 'base_location', 
        'starting_gate', 'detailed_inclusions', 'optional_extras', 'common_wildlife',
        'occasional_wildlife', 'rare_wildlife', 'detailed_exclusions', 'extra_activities',
        'accommodation_id',
        'images', 'inclusions', 'exclusions',
        'package_destinations', 'target_markets',
        'interactive_features', 'addons', 'conversion_triggers',
        'featured', 'status',
        // New fields for enhanced functionality
        'tour_type', 'max_group_size', 'min_age', 'what_to_bring', 'highlights'
    ];

    protected $casts = [
        'images' => 'array',
        'inclusions' => 'array',
        'exclusions' => 'array',
        'package_destinations' => 'array',
        'target_markets' => 'array',
        'interactive_features' => 'array',
        'addons' => 'array',
        'conversion_triggers' => 'array',
        'common_wildlife' => 'array',
        'occasional_wildlife' => 'array',
        'rare_wildlife' => 'array',
        'detailed_inclusions' => 'array',
        'optional_extras' => 'array',
        'detailed_exclusions' => 'array',
        'extra_activities' => 'array',
        'what_to_bring' => 'array',
        'highlights' => 'array',
        'featured' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function itineraries(): HasMany
    {
        return $this->hasMany(Itinerary::class)->orderBy('day_number');
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    // New relationships
    public function destinations(): BelongsToMany
    {
        return $this->belongsToMany(Destination::class, 'tour_destinations');
    }

    public function equipment(): BelongsToMany
    {
        return $this->belongsToMany(Equipment::class, 'tour_equipment');
    }

    public function recommendedGuides(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class, 'tour_guide_recommendations');
    }

    public function guides(): BelongsToMany
    {
        return $this->belongsToMany(Staff::class, 'tour_guide_recommendations');
    }
}
