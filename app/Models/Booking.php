<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'travel_date',
        'quantity',
        'total',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function package() : BelongsTo {
        return $this->belongsTo(Package::class);
    }
}
