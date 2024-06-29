<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'slug',
        'image',
        'price',
        'destination',
        'duration',
    ];


    public function items() : HasMany {
        return $this->hasMany(Item::class);
    }

    public function offer() : HasOne {
        return $this->hasOne(Offer::class);
    }

    public function category() : BelongsTo{
        return $this->belongsTo(Category::class);
    } 

}
