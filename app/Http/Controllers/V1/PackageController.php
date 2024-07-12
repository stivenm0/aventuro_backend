<?php

namespace App\Http\Controllers\V1;

use App\Filters\PackageFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PackageResource;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PackageFilter();
        $queryItems = $filter->transform($request);

         $packages =Package::with(['offer', 'category'])
        ->where($queryItems)
        ->paginate(2)
        ->appends($request->query());
        
        return PackageResource::collection($packages);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $package = Package::with('category', 'items', 'offer')
        ->where('slug', $slug)->firstOrFail();
        
        return response()->json([
            'package' => new PackageResource($package)
        ]);
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
