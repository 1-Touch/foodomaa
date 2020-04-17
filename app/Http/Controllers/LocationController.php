<?php

namespace App\Http\Controllers;

use App\Location;
use App\PopularGeoPlace;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * @param $query
     */
    public function searchLocation($query)
    {
        if ($query) {
            $locations = Location::where('name', 'LIKE', "%$query%")
                ->where('is_active', '1')
                ->get();
            return response()->json($locations);
        } else {
            //return popular cities
            $locations = Location::where('is_popular', '1')
                ->where('is_active', '1')
                ->get()
                ->take(5);
            return response()->json($locations);
        }
    }
    public function popularLocations()
    {
        $locations = Location::where('is_popular', '1')
            ->where('is_active', '1')
            ->get()
            ->take(20);

        // sleep(5);
        return response()->json($locations);
    }

    /**
     * @param Request $request
     */
    public function popularGeoLocations(Request $request)
    {
        $locations = PopularGeoPlace::where('is_active', '1')
            ->get()
            ->take(20);

        // sleep(5);
        return response()->json($locations);
    }
}
