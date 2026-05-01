<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'nationality',
        'tour_id',
        'travel_date',
        'duration',
        'group_size',
        'message',
        'status',
        'admin_notes',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'travel_date' => 'date',
    ];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => '<span class="badge bg-warning">Pending</span>',
            'responded' => '<span class="badge bg-info">Responded</span>',
            'closed' => '<span class="badge bg-success">Closed</span>',
            default => '<span class="badge bg-secondary">Unknown</span>',
        };
    }
}
