<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeocoderController extends Controller
{
    /**
     * @param Request $request
     */
    public function coordinatesToAddress(Request $request)
    {
        try {
            $address = \Geocoder::getAddressForCoordinates($request->lat, $request->lng);
            return response()->json($address['formatted_address']);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 401);
        }

    }

    /**
     * @param Request $request
     */
    public function addressToCoordinates(Request $request)
    {
        $address = \Geocoder::getCoordinatesForAddress($request->string);
        return response()->json($address);
    }

}
