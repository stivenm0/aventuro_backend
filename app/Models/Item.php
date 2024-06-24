<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'package_id',
        'name'
    ];

    public function package() : BelongsTo {
        return $this->belongsTo(Package::class);
    }
}
