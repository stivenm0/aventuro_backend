<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected function casts(): array
    {
        return [
            'price' => 'integer',
        ];
    }


    public function items() : HasMany {
        return $this->hasMany(Item::class);
    }

    public function offer() : HasOne {
        return $this->hasOne(Offer::class);
    }

    public function category() : BelongsTo{
        return $this->belongsTo(Category::class);
    } 

    // public function getRouteKeyName(): string
    // {
    //     return 'slug';
    // }

    public function priced()  {
        if($offer = $this->offer){
            $start = $offer->start_date;
            $end = $offer->end_date;

            if(now()->between($start, $end, false)){
                return intval($this->price - (($offer->discount * $this->price) / 100));
            }else{
                return  null;
            }
        }
        ;
    }

}
