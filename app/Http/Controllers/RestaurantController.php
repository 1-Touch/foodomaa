<?php

namespace App\Http\Controllers;

use App\Item;
use App\Location;
use App\Restaurant;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class RestaurantController extends Controller
{

    /**
     * @param $latitudeFrom
     * @param $longitudeFrom
     * @param $latitudeTo
     * @param $longitudeTo
     * @return mixed
     */
    private function getDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo)
    {
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * 6371;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getDeliveryRestaurants(Request $request)
    {
        // get all active restauants doing delivery
        $restaurants = Restaurant::where('is_accepted', '1')
            ->where('is_active', '1')
            ->whereIn('delivery_type', [1, 3])
            ->get();

        //Create a new Laravel collection from the array data
        $nearMe = new Collection();

        foreach ($restaurants as $restaurant) {
            $distance = $this->getDistance($request->latitude, $request->longitude, $restaurant->latitude, $restaurant->longitude);
            if ($distance <= $restaurant->delivery_radius) {
                $nearMe->push($restaurant);
            }
        }
        // $nearMe = $nearMe->shuffle()->sortByDesc('is_featured');
        $nearMe = $nearMe->toArray();
        shuffle($nearMe);
        usort($nearMe, function ($left, $right) {
            return $right['is_featured'] - $left['is_featured'];
        });

        return response()->json($nearMe);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getSelfPickupRestaurants(Request $request)
    {
        // get all active restauants doing selfpickups
        $restaurants = Restaurant::where('is_accepted', '1')
            ->where('is_active', '1')
            ->whereIn('delivery_type', [2, 3])
            ->get();

        //Create a new Laravel collection from the array data
        $nearMe = new Collection();

        foreach ($restaurants as $restaurant) {
            $distance = $this->getDistance($request->latitude, $request->longitude, $restaurant->latitude, $restaurant->longitude);
            if ($distance <= $restaurant->delivery_radius) {
                $nearMe->push($restaurant);
            }
        }

        $nearMe = $nearMe->toArray();
        shuffle($nearMe);
        usort($nearMe, function ($left, $right) {
            return $right['is_featured'] - $left['is_featured'];
        });

        return response()->json($nearMe);
    }

    /**
     * @param $slug
     */
    public function getRestaurantInfo($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();
        // sleep(3);
        return response()->json($restaurant);
    }
    /**
     * @param $id
     */
    public function getRestaurantInfoById($id)
    {
        $restaurant = Restaurant::where('id', $id)->first();
        return response()->json($restaurant);
    }

    /**
     * @param $slug
     */
    public function getRestaurantItems($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->first();

        $recommended = Item::where('restaurant_id', $restaurant->id)->where('is_recommended', '1')
            ->where('is_active', '1')
            ->with('addon_categories', 'addon_categories.addons')
            ->get();

        // $items = Item::with('add')
        $items = Item::where('restaurant_id', $restaurant->id)
            ->join('item_categories', 'items.item_category_id', '=', 'item_categories.id')
            ->where('is_enabled', '1')
            ->where('is_active', '1')
            ->with('addon_categories', 'addon_categories.addons')
            ->get(array('items.*', 'item_categories.name as category_name'));

        $items = json_decode($items, true);

        $array = [];
        foreach ($items as $item) {
            $array[$item['category_name']][] = $item;
        }
        // sleep(10);
        return response()->json(array(
            'recommended' => $recommended,
            'items' => $array,
        ));
    }
    /**
     * @param Request $request
     */
    public function searchRestaurants(Request $request)
    {
        //get lat and lng and query from user...
        // get all active restauants doing delivery & selfpickup
        $restaurants = Restaurant::where('name', 'LIKE', "%$request->q%")
            ->where('is_accepted', '1')
            ->where('is_active', '1')
            ->take(20)->get();

        //Create a new Laravel collection from the array data
        $nearMeRestaurants = new Collection();

        foreach ($restaurants as $restaurant) {
            $distance = $this->getDistance($request->latitude, $request->longitude, $restaurant->latitude, $restaurant->longitude);
            if ($distance <= $restaurant->delivery_radius) {
                $nearMeRestaurants->push($restaurant);
            }
        }

        $items = Item::
            where('is_active', '1')
            ->where('name', 'LIKE', "%$request->q%")
            ->get();

        $nearMeItems = new Collection();
        foreach ($items as $item) {
            $itemRestro = $item->restaurant;
            $distance = $this->getDistance($request->latitude, $request->longitude, $itemRestro->latitude, $itemRestro->longitude);
            if ($distance <= $itemRestro->delivery_radius) {
                $nearMeItems->push($item);
            }

        }

        $response = [
            'restaurants' => $nearMeRestaurants,
            'items' => $nearMeItems->take(20),
        ];

        return response()->json($response);

    }

/**
 * @param Request $request
 */
    public function checkRestaurantOperationService(Request $request)
    {
        $status = false;

        $restaurant = Restaurant::where('id', $request->restaurant_id)->first();
        if ($restaurant) {
            $distance = $this->getDistance($request->latitude, $request->longitude, $restaurant->latitude, $restaurant->longitude);
            if ($distance <= $restaurant->delivery_radius) {
                $status = true;
            }
        }
        return response()->json($status);
    }

    /**
     * @param Request $request
     */
    public function getSingleItem(Request $request)
    {
        $item = Item::where('id', $request->id)
            ->where('is_active', '1')
            ->with('addon_categories', 'addon_categories.addons')
            ->first();

        if ($item) {
            return response()->json($item);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function getFilteredRestaurants(Request $request)
    {
        $restaurants = Restaurant::where('is_accepted', '1')
            ->where('is_active', '1')
            ->whereIn('delivery_type', [1, 3])
            ->whereHas('restaurant_categories', function ($query) use ($request) {
                $query->whereIn('restaurant_category_id', $request->category_ids);
            })->get();

        $nearMe = new Collection();

        foreach ($restaurants as $restaurant) {
            $distance = $this->getDistance($request->latitude, $request->longitude, $restaurant->latitude, $restaurant->longitude);
            if ($distance <= $restaurant->delivery_radius) {
                $nearMe->push($restaurant);
            }
        }
        // $nearMe = $nearMe->shuffle()->sortByDesc('is_featured');
        $nearMe = $nearMe->toArray();
        shuffle($nearMe);
        usort($nearMe, function ($left, $right) {
            return $right['is_featured'] - $left['is_featured'];
        });

        // sleep(5);

        return response()->json($nearMe);
    }
};
