<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'package' => $this->package,
            'status' => $this->status,
            'quantity' => $this->quantity,
            'total' => $this->total,
            'travel_date' => Carbon::parse($this->travel_date)->isoFormat('dddd, D [de] MMMM [de] YYYY'),
            'created_at' => $this->created_at->diffForHumans() . ' ' . $this->created_at->format('d/m/y'),
        ];
    }
}
