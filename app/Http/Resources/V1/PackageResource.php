<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $offer = $this->offer;
        $start = Carbon::parse($this->offer->start_date);
        $end = Carbon::parse($this->offer->start_end);

        if(now()->between($start, $end)){
            $priced = $this->price - (($offer->discount * $this->price) / 100);
        }

        return [
            'id' => $this->id,
            'category' => $this->category->name,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => asset('/storage/packages/'.$this->image),
            'items' => $this->whenLoaded('items', fn()=> $this->items),
            'offer' => $this->whenLoaded('offer', fn ()=> [
                'discount' => $this->offer->discount,
            ]),
            'destination' => $this->destination,
            'duration' => $this->duration,
            'price'=> $this->price,
            'priced'=> $priced
        ];
    }


}
