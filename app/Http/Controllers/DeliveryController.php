<?php

namespace App\Http\Controllers;

use App\AcceptDelivery;
use App\DeliveryCollection;
use App\GpsTable;
use App\Order;
use App\Orderitem;
use App\PushNotify;
use App\RestaurantEarning;
use App\User;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use JWTAuth;
use JWTAuthException;

class DeliveryController extends Controller
{
    /**
     * @param $email
     * @param $password
     * @return mixed
     */
    private function getToken($email, $password)
    {
        $token = null;
        try {
            if (!$token = JWTAuth::attempt(['email' => $email, 'password' => $password])) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'Password or email is invalid..',
                    'token' => $token,
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'Token creation failed',
            ]);
        }
        return $token;
    }

    /**
     * @param Request $request
     */
    public function login(Request $request)
    {
        $user = \App\User::where('email', $request->email)->get()->first();
        if ($user && \Hash::check($request->password, $user->password)) {

            if ($user->hasRole('Delivery Guy')) {
                $token = self::getToken($request->email, $request->password);
                $user->auth_token = $token;
                $user->save();

                $onGoingDeliveriesCount = AcceptDelivery::where('user_id', $user->id)->where('is_complete', 0)->count();
                $completedDeliveriesCount = AcceptDelivery::where('user_id', $user->id)->where('is_complete', 1)->count();

                $response = [
                    'success' => true,
                    'data' => [
                        'id' => $user->id,
                        'auth_token' => $user->auth_token,
                        'name' => $user->name,
                        'email' => $user->email,
                        'wallet_balance' => $user->balanceFloat,
                        'onGoingCount' => $onGoingDeliveriesCount,
                        'completedCount' => $completedDeliveriesCount,
                    ],
                ];
            } else {
                $response = ['success' => false, 'data' => 'Record doesnt exists'];
            }
        } else {
            $response = ['success' => false, 'data' => 'Record doesnt exists...'];
        }
        return response()->json($response, 201);
    }

    /**
     * @param Request $request
     */
    public function updateDeliveryUserInfo(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();

        if ($user) {
            $onGoingDeliveriesCount = AcceptDelivery::where('user_id', $user->id)->where('is_complete', 0)->count();
            $completedDeliveriesCount = AcceptDelivery::where('user_id', $user->id)->where('is_complete', 1)->count();

            $orders = AcceptDelivery::where('user_id', $user->id)->orderBy('id', 'DESC')->with(array('order' => function ($query) {
                $query->select('id', 'unique_order_id', 'address', 'payment_mode', 'payable');
            }))->get();

            $earnings = $user->transactions()->orderBy('id', 'DESC')->get();

            $response = [
                'success' => true,
                'data' => [
                    'id' => $user->id,
                    'auth_token' => $user->auth_token,
                    'name' => $user->name,
                    'email' => $user->email,
                    'wallet_balance' => $user->balanceFloat,
                    'onGoingCount' => $onGoingDeliveriesCount,
                    'completedCount' => $completedDeliveriesCount,
                    'orders' => $orders,
                    'earnings' => $earnings,
                ],
            ];
            return response()->json($response, 201);
        }

        $response = ['success' => false, 'data' => 'Record doesnt exists'];
    }

    /**
     * @param Request $request
     */
    public function getDeliveryOrders(Request $request)
    {
        $user = Auth::user();
        $userRestaurants = $user->restaurants;

        $orders = Order::where('orderstatus_id', '2')
            ->where('delivery_type', '1')
            ->with('restaurant')
            ->orderBy('id', 'DESC')
            ->get();

        $deliveryGuyNewOrders = collect();
        foreach ($orders as $order) {
            foreach ($userRestaurants as $ur) {
                //checking if delivery guy is assigned to that restaurant
                if ($order->restaurant->id == $ur->id) {
                    $deliveryGuyNewOrders->push($order);
                }
            }
        }

        $alreadyAcceptedDeliveries = collect();
        $acceptDeliveries = AcceptDelivery::where('user_id', Auth::user()->id)->where('is_complete', 0)->get();
        foreach ($acceptDeliveries as $ad) {
            $order = Order::where('id', $ad->order_id)->whereIn('orderstatus_id', ['3', '4'])->with('restaurant')->first();
            if ($order) {
                $alreadyAcceptedDeliveries->push($order);
            }
        }

        $response = [
            'accepted_orders' => $alreadyAcceptedDeliveries,
            'new_orders' => $deliveryGuyNewOrders,
        ];

        return response()->json($response);
    }

    /**
     * @param Request $request
     */
    public function getSingleDeliveryOrder(Request $request)
    {
        //find the order
        $singleOrder = Order::where('unique_order_id', $request->unique_order_id)->first();

        //get order id and delivery boy id
        $singleOrderId = $singleOrder->id;
        $deliveryBoyId = Auth::user()->id;

        $checkOrder = AcceptDelivery::where('order_id', $singleOrderId)
            ->where('user_id', $deliveryBoyId)
            ->first();

        //check if the loggedin delivery boy has accepted the order
        if ($checkOrder) {
            //this order was already accepted by this delivery boy
            //so send the order to him
            $singleOrder = Order::where('unique_order_id', $request->unique_order_id)
                ->with('restaurant')
                ->with('orderitems')
                ->with(array('user' => function ($query) {
                    $query->select('id', 'name', 'phone');
                }))
                ->first();
            // sleep(3);
            return response()->json($singleOrder);
        }

        //else other can view the order
        $singleOrder = Order::where('unique_order_id', $request->unique_order_id)
            ->where('orderstatus_id', 2)
            ->with('restaurant')
            ->with('orderitems')
            ->first();

        // sleep(3);
        return response()->json($singleOrder);
    }

    /**
     * @param Request $request
     */
    public function setDeliveryGuyGpsLocation(Request $request)
    {

        //get all the order IDs that this delivery guy has accepted, and is not completed
        $order_ids = AcceptDelivery::where('user_id', $request->user_id)
            ->where('is_complete', 0)
            ->get()
            ->pluck('order_id');

        //foreach orderIds in GPS table, update the lat, lng...

        foreach ($order_ids as $order_id) {
            $gps_table = GpsTable::where('order_id', $order_id)->first();

            if ($gps_table) {
                $gps_table->delivery_lat = $request->delivery_lat;
                $gps_table->delivery_long = $request->delivery_long;
                $gps_table->heading = $request->heading;
                $gps_table->save();
            }
        }

        $success = true;
        return response()->json($success);

    }

    /**
     * @param Request $request
     */
    public function getDeliveryGuyGpsLocation(Request $request)
    {
        $gps_table = GpsTable::where('order_id', $request->order_id)->first();
        if ($gps_table) {
            return response()->json($gps_table);
        }
    }

    /**
     * @param Request $request
     */
    public function setUserGpsLocation(Request $request)
    {
        $gps_table = GpsTable::where('order_id', $request->order_id)->first();

        if ($gps_table) {
            $gps_table->user_lat = $request->user_lat;
            $gps_table->user_long = $request->user_long;
            $gps_table->save();
            $success = true;
            return response()->json($success);
        }
    }

    /**
     * @param Request $request
     */
    public function acceptToDeliver(Request $request)
    {
        $order = Order::where('id', $request->order_id)->first();

        if ($order) {
            $checkOrder = AcceptDelivery::where('order_id', $order->id)->first();
            if (!$checkOrder) {
                $order->orderstatus_id = '3'; //Accepted by delivery boy (Deliery Boy Assigned)
                $order->save();

                $acceptDelivery = new AcceptDelivery();
                $acceptDelivery->order_id = $order->id;
                $acceptDelivery->user_id = $request->delivery_guy_id;
                $acceptDelivery->customer_id = $order->user->id;
                $acceptDelivery->save();

                $singleOrder = Order::where('id', $request->order_id)
                    ->with('restaurant')
                    ->with('orderitems')
                    ->with(array('user' => function ($query) {
                        $query->select('id', 'name', 'phone');
                    }))
                    ->first();
                // sleep(3);
                if (config('settings.enablePushNotificationOrders') == 'true') {
                    $notify = new PushNotify();
                    $notify->sendPushNotification('3', $order->user_id, $order->unique_order_id);
                }
                return response()->json($singleOrder);
            } else {
                $singleOrder = Order::where('id', $request->order_id)
                    ->with('restaurant')
                    ->with('orderitems')
                    ->first();
                $singleOrder->already_accepted = true;
                return response()->json($singleOrder);
            }
        }
    }

    /**
     * @param Request $request
     */
    public function pickedupOrder(Request $request)
    {
        $order = Order::where('id', $request->order_id)->first();

        if ($order) {
            $order->orderstatus_id = '4'; //Accepted by delivery boy (Deliery Boy Assigned)
            $order->save();

            $singleOrder = Order::where('id', $request->order_id)
                ->with('restaurant')
                ->with('orderitems')
                ->with(array('user' => function ($query) {
                    $query->select('id', 'name', 'phone');
                }))
                ->first();

            if (config('settings.enablePushNotificationOrders') == 'true') {
                $notify = new PushNotify();
                $notify->sendPushNotification('4', $order->user_id, $order->unique_order_id);
            }

            // $gps_table = GpsTable::where("order_id", $singleOrder->id)->first();
            // $customerLocation = collect();
            // $customerLocation->push($gps_table->customer_lat);
            // $customerLocation->push($gps_table->customer_long);
            // $singleOrder->customerLocation = $customerLocation;

            // sleep(4);
            return response()->json($singleOrder);
        }
    }

    /**
     * @param Request $request
     */
    public function deliverOrder(Request $request)
    {
        $order = Order::where('id', $request->order_id)->first();
        $user = $order->user;
        if ($order) {
            if (config('settings.enableDeliveryPin') == 'true') {
                if ($user->delivery_pin == strtoupper($request->delivery_pin)) {
                    $order->orderstatus_id = '5'; //Accepted by delivery boy (Deliery Boy Assigned)
                    $order->save();

                    $completeDelivery = AcceptDelivery::where('order_id', $order->id)->first();
                    $completeDelivery->is_complete = true;
                    $completeDelivery->save();

                    $singleOrder = Order::where('id', $request->order_id)
                        ->with('restaurant')
                        ->with('orderitems')
                        ->with(array('user' => function ($query) {
                            $query->select('id', 'name', 'phone');
                        }))
                        ->first();

                    if (config('settings.enablePushNotificationOrders') == 'true') {
                        $notify = new PushNotify();
                        $notify->sendPushNotification('5', $order->user_id, $order->unique_order_id);
                    }

                    //Update restautant earnings...
                    $restaurant_earning = RestaurantEarning::where('restaurant_id', $order->restaurant->id)
                        ->where('is_requested', 0)
                        ->first();
                    if ($restaurant_earning) {
                        $restaurant_earning->amount += $order->total - $order->delivery_charge;
                        $restaurant_earning->save();
                    } else {
                        $restaurant_earning = new RestaurantEarning();
                        $restaurant_earning->restaurant_id = $order->restaurant->id;
                        $restaurant_earning->amount = $order->total - $order->delivery_charge;
                        $restaurant_earning->save();
                    }

                    //Update delivery guy collection
                    if ($order->payment_mode == 'COD') {
                        $delivery_collection = DeliveryCollection::where('user_id', $completeDelivery->user_id)->first();
                        if ($delivery_collection) {
                            $delivery_collection->amount += $order->payable;
                            $delivery_collection->save();
                        } else {
                            $delivery_collection = new DeliveryCollection();
                            $delivery_collection->user_id = $completeDelivery->user_id;
                            $delivery_collection->amount = $order->payable;
                            $delivery_collection->save();
                        }
                    }

                    //Update delivery guy's earnings...
                    if (config('settings.enableDeliveryGuyEarning') == 'true') {
                        //if enabled, then check based on which value the commision will be calculated
                        $deliveryUser = AcceptDelivery::where('order_id', $order->id)->first();
                        if ($deliveryUser->user) {
                            if (config('settings.deliveryGuyCommissionFrom') == 'FULLORDER') {
                                //get order total and delivery guy's commission rate and transfer to wallet
                                $commission = $deliveryUser->user->delivery_guy_detail->commission_rate / 100 * $order->total;
                                $deliveryUser->user->deposit($commission * 100, ['description' => config('settings.deliveryCommissionMessage') . $order->unique_order_id]);
                            }
                            if (config('settings.deliveryGuyCommissionFrom') == 'DELIVERYCHARGE') {
                                //get order delivery charge and delivery guy's commission rate and transfer to wallet
                                $commission = $deliveryUser->user->delivery_guy_detail->commission_rate / 100 * $order->delivery_charge;
                                $deliveryUser->user->deposit($commission * 100, ['description' => config('settings.deliveryCommissionMessage') . $order->unique_order_id]);
                            }
                        }
                    }
                    return response()->json($singleOrder);
                } else {
                    $singleOrder = Order::where('id', $request->order_id)
                        ->whereIn('orderstatus_id', ['2', '3', '4'])
                        ->with('restaurant')
                        ->with('orderitems')
                        ->with(array('user' => function ($query) {
                            $query->select('id', 'name', 'phone');
                        }))
                        ->first();

                    $singleOrder->delivery_pin_error = true;
                    // sleep(3);
                    return response()->json($singleOrder);
                }
            } else {
                $order->orderstatus_id = '5'; //Accepted by delivery boy (Deliery Boy Assigned)
                $order->save();

                $completeDelivery = AcceptDelivery::where('order_id', $order->id)->first();
                $completeDelivery->is_complete = true;
                $completeDelivery->save();

                $singleOrder = Order::where('id', $request->order_id)
                    ->with('restaurant')
                    ->with('orderitems')
                    ->with(array('user' => function ($query) {
                        $query->select('id', 'name', 'phone');
                    }))
                    ->first();

                if (config('settings.enablePushNotificationOrders') == 'true') {
                    $notify = new PushNotify();
                    $notify->sendPushNotification('5', $order->user_id, $order->unique_order_id);
                }

                $restaurant_earning = RestaurantEarning::where('restaurant_id', $order->restaurant->id)
                    ->where('is_requested', 0)
                    ->first();
                if ($restaurant_earning) {
                    $restaurant_earning->amount += $order->total - $order->delivery_charge;
                    $restaurant_earning->save();
                } else {
                    $restaurant_earning = new RestaurantEarning();
                    $restaurant_earning->restaurant_id = $order->restaurant->id;
                    $restaurant_earning->amount = $order->total - $order->delivery_charge;
                    $restaurant_earning->save();
                }

                //Update delivery guy collection
                if ($order->payment_mode == 'COD') {
                    $delivery_collection = DeliveryCollection::where('user_id', $completeDelivery->user_id)->first();
                    if ($delivery_collection) {
                        $delivery_collection->amount += $order->payable;
                        $delivery_collection->save();
                    } else {
                        $delivery_collection = new DeliveryCollection();
                        $delivery_collection->user_id = $completeDelivery->user_id;
                        $delivery_collection->amount = $order->payable;
                        $delivery_collection->save();
                    }
                }

                //Update delivery guy's earnings...
                if (config('settings.enableDeliveryGuyEarning') == 'true') {
                    //if enabled, then check based on which value the commision will be calculated
                    $deliveryUser = AcceptDelivery::where('order_id', $order->id)->first();
                    if ($deliveryUser->user) {
                        if (config('settings.deliveryGuyCommissionFrom') == 'FULLORDER') {
                            //get order total and delivery guy's commission rate and transfer to wallet
                            $commission = $deliveryUser->user->delivery_guy_detail->commission_rate / 100 * $order->total;
                            $deliveryUser->user->deposit($commission * 100, ['description' => config('settings.deliveryCommissionMessage') . $order->unique_order_id]);
                        }
                        if (config('settings.deliveryGuyCommissionFrom') == 'DELIVERYCHARGE') {
                            //get order delivery charge and delivery guy's commission rate and transfer to wallet
                            $commission = $deliveryUser->user->delivery_guy_detail->commission_rate / 100 * $order->delivery_charge;
                            $deliveryUser->user->deposit($commission * 100, ['description' => config('settings.deliveryCommissionMessage') . $order->unique_order_id]);
                        }
                    }
                }
                return response()->json($singleOrder);
            }

        }
    }
}
