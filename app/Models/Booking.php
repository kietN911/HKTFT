<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'screening_id',
        'customer_name',
        'customer_email',
        'seats'
    ];

    public function screening(): BelongsTo
    {
        return $this->belongsTo(Screening::class);
    }
}
