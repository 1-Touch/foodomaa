<?php

namespace App\Http\Controllers;

use App\AcceptDelivery;
use App\Order;
use App\Restaurant;
use App\Setting;
use App\User;
use DB;
use Illuminate\Contracts\Cache\Factory;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    /**
     * @param Request $request
     */
    public function getRatableOrder(Request $request)
    {
        //check if order exists
        $order = Order::where('id', $request->order_id)->with('restaurant', 'orderitems')->first();

        if ($order) {
            //check if order belongs to the auth user
            if ($order->user->id == $request->user_id) {
                //check if order already rated,
                $rating = DB::table('ratings')->where('order_id', $order->id)->get();

                if ($rating->isEmpty()) {
                    //empty rating, that means not rated earlier
                    $response = [
                        'success' => true,
                        'order' => $order,
                    ];
                    return response()->json($response);
                } else {
                    $response = [
                        'success' => false,
                        'message' => 'Already rated',
                    ];
                    return response()->json($response);
                }
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Order doesnt belongs to user',
                ];
                return response()->json($response);
            }
        }

        $response = [
            'success' => false,
            'message' => 'No order found',
        ];
        return response()->json($response);
    }

    /**
     * @param Request $request
     */
    public function saveNewRating(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();

        if ($user) {
            //find the restaurant
            $order = Order::where('id', $request->order_id)->first();
            if ($order) {

                //rating the restaurant
                $restaurant = Restaurant::where('id', $order->restaurant_id)->first();
                $rating = new \willvincent\Rateable\Rating;
                $rating->rating = $request->restaurant_rating;
                $rating->comment = $request->comment;
                $rating->user_id = $user->id;
                $rating->order_id = $order->id;
                $restaurant->ratings()->save($rating);

                //rating the delivery guy
                $deliveryGuy = AcceptDelivery::where('order_id', $order->id)->first();
                $deliveryGuy = User::where('id', $deliveryGuy->user_id)->first();
                $rating = new \willvincent\Rateable\Rating;
                $rating->rating = $request->delivery_rating;
                $rating->comment = $request->comment;
                $rating->user_id = $user->id;
                $rating->order_id = $order->id;
                $deliveryGuy->ratings()->save($rating);

                $response = [
                    'success' => true,
                ];
                return response()->json($response);
            } else {
                $response = [
                    'success' => false,
                    'message' => 'No order found',
                ];
                return response()->json($response);
            }
        }
        $response = [
            'success' => false,
            'message' => 'No user found',
        ];
        return response()->json($response);
    }

    public function settings()
    {
        return view('admin.modules.ratingmodule.settings');
    }

    /**
     * @param Request $request
     * @param Factory $cache
     */
    public function updateSettings(Request $request, Factory $cache)
    {
        $allSettings = $request->except(['rarModEnHomeBanner', 'rarModShowBannerRestaurantName']);

        foreach ($allSettings as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            if ($setting != null) {
                $setting->value = $value;
                $setting->save();
            }
        }

        $setting = Setting::where('key', 'rarModEnHomeBanner')->first();
        if ($request->rarModEnHomeBanner == 'true') {
            $setting->value = 'true';
            $setting->save();
        } else {
            $setting->value = 'false';
            $setting->save();
        }
        $setting = Setting::where('key', 'rarModShowBannerRestaurantName')->first();
        if ($request->rarModShowBannerRestaurantName == 'true') {
            $setting->value = 'true';
            $setting->save();
        } else {
            $setting->value = 'false';
            $setting->save();
        }

        $cache->forget('settings');
        return redirect()->back()->with(['success' => 'Settings Updated']);
    }

    /**
     * @param Request $request
     */
    public function singleRatableOrder(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();

        if ($user) {
            //get latest order
            $userOrders = Order::where('user_id', $user->id)->where('orderstatus_id', 5)
                ->with('restaurant')
                ->with('orderitems')
                ->get()
                ->last();

            //check if any order exists
            if ($userOrders) {

                //check if order is already rated or not
                $rating = DB::table('ratings')->where('order_id', $userOrders->id)->get();
                if ($rating->isEmpty()) {
                    $response = [
                        'ratable' => true,
                        'data' => $userOrders,
                    ];
                    return response()->json($response);
                }

            }

            $response = [
                'ratable' => false,
            ];
            return response()->json($response);
        }
    }

    public function ratings()
    {
        $ratings = DB::table('ratings')
            ->orderBy('order_id')
            ->paginate(20);

        // dd($ratings);

        return view('admin.modules.ratingmodule.ratings', array(
            'ratings' => $ratings,
        ));
    }

    /**
     * @param Request $request
     */
    public function editRating($id)
    {
        $ratings = DB::table('ratings')
            ->where('order_id', $id)
            ->get();

        if (count($ratings) > 0) {
            foreach ($ratings as $key => $rating) {
                if ($key == 0) {
                    $restaurantRating = $rating->rating;
                    $comment = $rating->comment;
                }
                if ($key == 1) {
                    $deliveryRating = $rating->rating;
                }
            }

            return view('admin.modules.ratingmodule.editRating', array(
                'order_id' => $id,
                'restaurantRating' => $restaurantRating,
                'deliveryRating' => $deliveryRating,
                'comment' => $comment,
            ));
        } else {
            return redirect()->route('admin.ratings');
        }
    }

    /**
     * @param Request $request
     */
    public function updateRating(Request $request)
    {
        // dd($request->all());

        $ratings = DB::table('ratings')
            ->where('order_id', $request->id)
            ->get();

        if (count($ratings) > 0) {
            foreach ($ratings as $key => $rating) {
                if ($key == 0) {
                    DB::table('ratings')
                        ->where('id', $rating->id)
                        ->update(['rating' => $request->restaurantRating, 'comment' => $request->comment]);

                }
                if ($key == 1) {
                    DB::table('ratings')
                        ->where('id', $rating->id)
                        ->update(['rating' => $request->deliveryRating, 'comment' => $request->comment]);
                }
            }

            return redirect()->back()->with(['success' => 'Rating Updated']);
        } else {
            return redirect()->route('admin.ratings');
        }
    }
}
