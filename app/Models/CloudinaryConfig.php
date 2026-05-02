<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CloudinaryConfig extends Model
{
    protected $fillable = [
        'cloud_name',
        'api_key',
        'api_secret',
        'cloud_url',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }
}
