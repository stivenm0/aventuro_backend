<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\BookingStoreRequest;
use App\Http\Resources\V1\BookingResource;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $bookings = $request->user()->bookings()
        ->with('package:id,title,slug')
        ->orderBy('id', 'desc')->paginate(9);

        return BookingResource::collection($bookings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingStoreRequest $request)
    {
        $package = Package::find($request['package_id']);
        $request->user()->bookings()->create([
            'package_id'=> $package->id,
            'travel_date'=> $request['travel_date'],
            'phone'=> $request['phone'],
            'address'=> $request['address'],
            'quantity'=> $request['quantity'],
            'total'=> $package->priced() ? 
            $package->priced() * $request['quantity'] : 
            $package->price * $request['quantity'] 
        ]);

        return response()->json(status: 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
