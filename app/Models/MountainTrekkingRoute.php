<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class MountainTrekkingRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'mountain_name',
        'duration',
        'difficulty',
        'duration_days',
        'price_from',
        'price_to',
        'success_rate',
        'highlights',
        'itinerary',
        'included',
        'excluded',
        'best_season',
        'images',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'highlights' => 'array',
        'itinerary' => 'array',
        'included' => 'array',
        'excluded' => 'array',
        'images' => 'array',
        'price_from' => 'decimal:2',
        'price_to' => 'decimal:2',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($route) {
            if (empty($route->slug)) {
                $route->slug = Str::slug($route->name);
            }
        });

        static::updating(function ($route) {
            if ($route->isDirty('name') && empty($route->slug)) {
                $route->slug = Str::slug($route->name);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByMountain($query, $mountain)
    {
        return $query->where('mountain_name', $mountain);
    }

    public function scopeByDifficulty($query, $difficulty)
    {
        return $query->where('difficulty', $difficulty);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function getFormattedPriceAttribute()
    {
        if ($this->price_to && $this->price_to > $this->price_from) {
            return '$' . number_format($this->price_from, 0) . ' - $' . number_format($this->price_to, 0);
        }
        return '$' . number_format($this->price_from, 0);
    }

    public function getMainImageAttribute()
    {
        if ($this->images && !empty($this->images[0])) {
            return $this->images[0];
        }
        return 'https://via.placeholder.com/800x600/cccccc/666666?text=' . urlencode($this->name);
    }

    public function getUrlAttribute()
    {
        return route('mountain-trekking.routes.show', $this->slug);
    }
}
