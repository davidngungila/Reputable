<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class Mountain extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'location',
        'height',
        'height_unit',
        'coordinates',
        'trekking_info',
        'routes',
        'equipment_guide',
        'expert_guides',
        'images',
        'difficulty_level',
        'duration_days',
        'price_from',
        'best_season',
        'weather_info',
        'highlights',
        'status',
    ];

    protected $casts = [
        'coordinates' => 'array',
        'routes' => 'array',
        'equipment_guide' => 'array',
        'expert_guides' => 'array',
        'images' => 'array',
        'highlights' => 'array',
        'price_from' => 'decimal:2',
    ];
}
