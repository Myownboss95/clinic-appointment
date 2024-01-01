<?php

namespace App\Http\Controllers;

use App\Services\LocationService;

class LocationController extends Controller
{
    public function __construct(public LocationService $service)
    {
    }

    public function countries()
    {
        return response()->json([
            'countries' => $this->service->countries(),
        ]);
    }

    public function states($country)
    {
        return response()->json([
            'country' => $country,
            'states' => $this->service->states($country),
        ]);
    }
}
