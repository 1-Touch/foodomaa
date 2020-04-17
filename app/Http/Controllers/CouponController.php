<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * @param Request $request
     */
    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon)->first();

        if ($coupon && $coupon->is_active) {
            if ($coupon->restaurant_id !== null) {
                if ($coupon->restaurant_id == $request->restaurant_id || $coupon->restaurant_id == 0) {
                    if ($coupon->expiry_date->gt(Carbon::now()) && $coupon->count < $coupon->max_count) {
                        return response()->json($coupon);
                    } else {
                        $success = false;
                        return response()->json($success);
                    }
                } else {
                    $success = false;
                    return response()->json($success);
                }
            } else {
                $success = false;
                return response()->json($success);
            }
        } else {
            $success = false;
            return response()->json($success);
        }
    }

    public function coupons()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        $restaurants = Restaurant::all();
        $todaysDate = Carbon::now()->format('m-d-Y');
        return view('admin.coupons', array(
            'coupons' => $coupons,
            'restaurants' => $restaurants,
            'todaysDate' => $todaysDate,
        ));
    }

    /**
     * @param Request $request
     */
    public function saveNewCoupon(Request $request)
    {
        $coupon = new Coupon();

        $coupon->name = $request->name;
        $coupon->description = $request->description;
        $coupon->code = $request->code;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->expiry_date = Carbon::parse($request->expiry_date)->format('Y-m-d H:i:s');
        $coupon->restaurant_id = $request->restaurant_id;
        $coupon->max_count = $request->max_count;

        if ($request->is_active == 'true') {
            $coupon->is_active = true;
        } else {
            $coupon->is_active = false;
        }

        try {
            $coupon->save();
            return redirect()->back()->with(['success' => 'Coupon Updated']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['message' => $th]);
        }
    }

    /**
     * @param $id
     */
    public function getEditCoupon($id)
    {
        $coupon = Coupon::where('id', $id)->first();
        $restaurants = Restaurant::all();
        if ($coupon) {
            return view('admin.editCoupon', array(
                'coupon' => $coupon,
                'restaurants' => $restaurants,
            ));
        }
        return redirect()->route('admin.coupons');
    }

    /**
     * @param Request $request
     */
    public function updateCoupon(Request $request)
    {
        $coupon = Coupon::where('id', $request->id)->first();

        if ($coupon) {

            $coupon->name = $request->name;
            $coupon->description = $request->description;
            $coupon->code = $request->code;
            $coupon->discount_type = $request->discount_type;
            $coupon->discount = $request->discount;
            $coupon->expiry_date = Carbon::parse($request->expiry_date)->format('Y-m-d H:i:s');
            $coupon->restaurant_id = $request->restaurant_id;
            $coupon->max_count = $request->max_count;

            if ($request->is_active == 'true') {
                $coupon->is_active = true;
            } else {
                $coupon->is_active = false;
            }

            try {
                $coupon->save();
                return redirect()->back()->with(['success' => 'Coupon Updated']);
            } catch (\Throwable $th) {
                return redirect()->back()->with(['message' => $th]);
            }
        }
    }

    /**
     * @param $id
     */
    public function deleteCoupon($id)
    {
        $coupon = Coupon::where('id', $id)->first();

        if ($coupon) {
            $coupon->delete();
            return redirect()->back()->with(['success' => 'Coupon Deleted']);
        }
        return redirect()->route('admin.coupons');
    }
}
