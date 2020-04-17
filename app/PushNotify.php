<?php

namespace App;

use App\Alert;
use App\Orderstatus;
use App\PushToken;
use App\Translation;
use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;

class PushNotify
{
    /**
     * @param $orderstatus_id
     * @param $user_id
     */
    public function sendPushNotification($orderstatus_id, $user_id, $unique_order_id = null)
    {

        //check if admin has set a default translation?
        $translation = Translation::where('is_default', 1)->first();
        if ($translation) {
            //if yes, then take the default translation and use instread of translations from config
            $translation = json_decode($translation->data);

            $runningOrderPreparingTitle = $translation->runningOrderPreparingTitle;
            $runningOrderPreparingSub = $translation->runningOrderPreparingSub;
            $runningOrderDeliveryAssignedTitle = $translation->runningOrderDeliveryAssignedTitle;
            $runningOrderDeliveryAssignedSub = $translation->runningOrderDeliveryAssignedSub;
            $runningOrderOnwayTitle = $translation->runningOrderOnwayTitle;
            $runningOrderOnwaySub = $translation->runningOrderOnwaySub;
            $runningOrderDelivered = !empty($translation->runningOrderDelivered) ? $translation->runningOrderDelivered : config('settings.runningOrderDelivered');
            $runningOrderDeliveredSub = !empty($translation->runningOrderDeliveredSub) ? $translation->runningOrderDelivered : config('settings.runningOrderDeliveredSub');
            $runningOrderCanceledTitle = $translation->runningOrderCanceledTitle;
            $runningOrderCanceledSub = $translation->runningOrderCanceledSub;
            $runningOrderReadyForPickup = $translation->runningOrderReadyForPickup;
            $runningOrderReadyForPickupSub = $translation->runningOrderReadyForPickupSub;
            $restaurantNewOrderNotificationMsg = $translation->restaurantNewOrderNotificationMsg;
            $restaurantNewOrderNotificationMsgSub = $translation->restaurantNewOrderNotificationMsgSub;
            $deliveryGuyNewOrderNotificationMsg = $translation->deliveryGuyNewOrderNotificationMsg;
            $deliveryGuyNewOrderNotificationMsgSub = $translation->deliveryGuyNewOrderNotificationMsgSub;

        } else {
            //else use from config
            $runningOrderPreparingTitle = config('settings.runningOrderPreparingTitle');
            $runningOrderPreparingSub = config('settings.runningOrderPreparingSub');
            $runningOrderDeliveryAssignedTitle = config('settings.runningOrderDeliveryAssignedTitle');
            $runningOrderDeliveryAssignedSub = config('settings.runningOrderDeliveryAssignedSub');
            $runningOrderOnwayTitle = config('settings.runningOrderOnwayTitle');
            $runningOrderOnwaySub = config('settings.runningOrderOnwaySub');
            $runningOrderDelivered = config('settings.runningOrderDelivered');
            $runningOrderDeliveredSub = config('settings.runningOrderDeliveredSub');
            $runningOrderCanceledTitle = config('settings.runningOrderCanceledTitle');
            $runningOrderCanceledSub = config('settings.runningOrderCanceledSub');
            $runningOrderReadyForPickup = config('settings.runningOrderReadyForPickup');
            $runningOrderReadyForPickupSub = config('settings.runningOrderReadyForPickupSub');
            $restaurantNewOrderNotificationMsg = config('settings.restaurantNewOrderNotificationMsg');
            $restaurantNewOrderNotificationMsgSub = config('settings.restaurantNewOrderNotificationMsgSub');
            $deliveryGuyNewOrderNotificationMsg = config('settings.deliveryGuyNewOrderNotificationMsg');
            $deliveryGuyNewOrderNotificationMsgSub = config('settings.deliveryGuyNewOrderNotificationMsgSub');
        }

        $secretKey = 'key=' . config('settings.firebaseSecret');

        $token = PushToken::where('user_id', $user_id)->first();

        if ($token) {
            if ($orderstatus_id == '2') {
                $msgTitle = $runningOrderPreparingTitle;
                $msgMessage = $runningOrderPreparingSub;
                $click_action = config('settings.storeUrl') . '/running-order/';
            }
            if ($orderstatus_id == '3') {
                $msgTitle = $runningOrderDeliveryAssignedTitle;
                $msgMessage = $runningOrderDeliveryAssignedSub;
                $click_action = config('settings.storeUrl') . '/running-order/';
            }
            if ($orderstatus_id == '4') {
                $msgTitle = $runningOrderOnwayTitle;
                $msgMessage = $runningOrderOnwaySub;
                $click_action = config('settings.storeUrl') . '/running-order/';
            }
            if ($orderstatus_id == '5') {
                $msgTitle = $runningOrderDelivered;
                $msgMessage = $runningOrderDeliveredSub;
                $click_action = config('settings.storeUrl') . '/my-orders/';
            }
            if ($orderstatus_id == '6') {
                $msgTitle = $runningOrderCanceledTitle;
                $msgMessage = $runningOrderCanceledSub;
                $click_action = config('settings.storeUrl') . '/my-orders/';
            }
            if ($orderstatus_id == '7') {
                $msgTitle = $runningOrderReadyForPickup;
                $msgMessage = $runningOrderReadyForPickupSub;
                $click_action = config('settings.storeUrl') . '/my-orders/';
            }
            if ($orderstatus_id == 'TO_RESTAURANT') {
                $msgTitle = $restaurantNewOrderNotificationMsg;
                $msgMessage = $restaurantNewOrderNotificationMsgSub;
                $click_action = config('settings.storeUrl') . '/public/restaurant-owner/dashboard';
            }
            if ($orderstatus_id == 'TO_DELIVERY') {
                $msgTitle = $deliveryGuyNewOrderNotificationMsg;
                $msgMessage = $deliveryGuyNewOrderNotificationMsgSub;
                $click_action = config('settings.storeUrl') . '/delivery/';
            }
            $msg = array(
                'title' => $msgTitle,
                'message' => $msgMessage,
                'badge' => '/assets/img/favicons/favicon-96x96.png',
                'icon' => '/assets/img/favicons/favicon-512x512.png',
                'click_action' => $click_action,
                'unique_order_id' => $unique_order_id,
            );

            $alert = new Alert();
            $alert->data = json_encode($msg);
            $alert->user_id = $user_id;
            $alert->save();

            $fullData = array(
                'to' => $token->token,
                'data' => $msg,
            );

            $response = Curl::to('https://fcm.googleapis.com/fcm/send')
                ->withHeader('Content-Type: application/json')
                ->withHeader("Authorization: $secretKey")
                ->withData(json_encode($fullData))
                ->post();
        }
    }

    /**
     * @param $user_id
     * @param $amount
     * @param $message
     * @param $type
     */
    public function sendWalletAlert($user_id, $amount, $message, $type)
    {

        $amountWithCurrency = config('settings.currencySymbolAlign') == 'left' ? config('settings.currencyFormat') . $amount : $amount . config('settings.currencyFormat');

        $msg = array(
            'title' => config('settings.walletName'),
            'message' => $amountWithCurrency . ' ' . $message,
            'is_wallet_alert' => true,
            'transaction_type' => $type,
        );

        $alert = new Alert();
        $alert->data = json_encode($msg);
        $alert->user_id = $user_id;
        $alert->save();

    }

}
