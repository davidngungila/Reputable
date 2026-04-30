<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class TrekkingEquipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category',
        'is_required',
        'is_provided',
        'specifications',
        'care_instructions',
        'images',
        'featured_image',
        'price',
        'rental_info',
        'tips',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'images' => 'array',
        'is_required' => 'boolean',
        'is_provided' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'price' => 'decimal:2',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($equipment) {
            if (empty($equipment->slug)) {
                $equipment->slug = Str::slug($equipment->name);
            }
        });

        static::updating(function ($equipment) {
            if ($equipment->isDirty('name') && empty($equipment->slug)) {
                $equipment->slug = Str::slug($equipment->name);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeRequired($query)
    {
        return $query->where('is_required', true);
    }

    public function scopeProvided($query)
    {
        return $query->where('is_provided', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function getFeaturedImageAttribute()
    {
        if ($this->featured_image) {
            return $this->featured_image;
        }
        
        if ($this->images && !empty($this->images[0])) {
            return $this->images[0];
        }
        
        return 'https://via.placeholder.com/400x400/cccccc/666666?text=' . urlencode($this->name);
    }

    public function getFormattedPriceAttribute()
    {
        if ($this->price) {
            return '$' . number_format($this->price, 2);
        }
        return 'Price on request';
    }

    public function getUrlAttribute()
    {
        return route('mountain-trekking.equipment.show', $this->slug);
    }
}
