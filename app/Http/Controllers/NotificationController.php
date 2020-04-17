<?php

namespace App\Http\Controllers;

use App\Alert;
use App\PushToken;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Ixudra\Curl\Facades\Curl;

class NotificationController extends Controller
{
    /**
     * @param Request $request
     */
    public function saveToken(Request $request)
    {
        $pushToken = PushToken::where('user_id', $request->user_id)->first();

        if ($pushToken) {
            //update the existing token
            $pushToken->token = $request->push_token;
            $pushToken->save();
        } else {
            //create new token for user
            $pushToken = new PushToken();
            $pushToken->token = $request->push_token;
            $pushToken->user_id = $request->user_id;
            $pushToken->save();
        }
        $success = $request->push_token;
        return response()->json($success);
    }
    /**
     * @param Request $request
     */
    public function saveRestaurantOwnerNotificationToken(Request $request)
    {
        $pushToken = PushToken::where('user_id', $request->user_id)->first();

        if ($pushToken) {
            //update the existing token
            $pushToken->token = $request->push_token;
            $pushToken->save();
        } else {
            //create new token for user
            $pushToken = new PushToken();
            $pushToken->token = $request->push_token;
            $pushToken->user_id = $request->user_id;
            $pushToken->save();
        }
        $success = $request->push_token;
        return response()->json($success);
    }

    public function notifications()
    {
        $pushTokens = PushToken::all();
        $count = count($pushTokens);
        $users = User::all();

        return view('admin.notifications', array(
            'count' => $count,
            'users' => $users,
        ));
    }

    /**
     * @param Request $request
     */
    public function sendNotifiaction(Request $request)
    {
        $secretKey = 'key=' . config('settings.firebaseSecret');

        $data = $request->except(['_token']);

        $alertData = $request->except(['_token']);
        $alertData = json_encode($alertData);
        $alertData = json_decode($alertData);
        $alertData = array(
            'title' => $alertData->data->title,
            'message' => $alertData->data->message,
            'badge' => $alertData->data->badge,
            'icon' => $alertData->data->icon,
            'click_action' => $alertData->data->click_action,
            'unique_order_id' => null,
            'custom_notification' => true,
            'custom_image' => $alertData->data->image,
        );

        /* Save to Alerts table */
        $subscribers = User::all();
        foreach ($subscribers as $subscriber) {
            $alert = new Alert();
            $alert->data = json_encode($alertData);
            $alert->user_id = $subscriber->id;
            $alert->save();
        }
        /*  END Save to Alerts Table */

        $data = json_encode($data);

        $data = substr($data, 0, -1);

        $pushTokens = PushToken::where('is_active', '1')->get(['token'])->pluck('token')->toArray();

        if (count($pushTokens)) {

            $i = 0;
            $len = count($pushTokens);
            $last = $len - 1;
            $tokens = ', "registration_ids": [';

            foreach ($pushTokens as $key => $value) {
                if ($i == $last) {
                    $tokens .= '"' . $value . '"]}';
                } else {
                    $tokens .= '"' . $value . '",';
                }
                $i++;
            }

            $fullData = $data . $tokens;
            $response = Curl::to('https://fcm.googleapis.com/fcm/send')
                ->withHeader('Content-Type: application/json')
                ->withHeader("Authorization: $secretKey")
                ->withData($fullData)
                ->post();

            $response = json_decode($response);
        }

        return redirect()->back()->with(['success' => 'Notifications & Alerts Sent']);

    }

    /**
     * @param Request $request
     */
    public function sendNotificationToSelectedUsers(Request $request)
    {
        $secretKey = 'key=' . config('settings.firebaseSecret');

        $data = $request->except(['_token']);

        $alertData = $request->except(['_token']);
        $alertData = json_encode($alertData);
        $alertData = json_decode($alertData);
        $alertData = array(
            'title' => $alertData->data->title,
            'message' => $alertData->data->message,
            'badge' => $alertData->data->badge,
            'icon' => $alertData->data->icon,
            'click_action' => $alertData->data->click_action,
            'unique_order_id' => null,
            'custom_notification' => true,
            'custom_image' => $alertData->data->image,
        );

        /* Save to Alerts table */
        $subscribers = User::whereIn('id', $request->users)->get();
        foreach ($subscribers as $subscriber) {
            $alert = new Alert();
            $alert->data = json_encode($alertData);
            $alert->user_id = $subscriber->id;
            $alert->save();
        }
        /*  END Save to Alerts Table */

        $data = json_encode($data);

        $data = substr($data, 0, -1);

        $pushTokens = PushToken::where('is_active', '1')
            ->whereIn('user_id', $request->users)
            ->get(['token'])
            ->pluck('token')
            ->toArray();
        if (count($pushTokens)) {
            $i = 0;
            $len = count($pushTokens);
            $last = $len - 1;
            $tokens = ', "registration_ids": [';

            foreach ($pushTokens as $key => $value) {
                if ($i == $last) {
                    $tokens .= '"' . $value . '"]}';
                } else {
                    $tokens .= '"' . $value . '",';
                }
                $i++;
            }

            $fullData = $data . $tokens;
            $response = Curl::to('https://fcm.googleapis.com/fcm/send')
                ->withHeader('Content-Type: application/json')
                ->withHeader("Authorization: $secretKey")
                ->withData($fullData)
                ->post();

            $response = json_decode($response);

            // return redirect()->back()->with(['success' => 'Success: ' . $response->success . ' & Failed: ' . $response->failure]);
        }
        return redirect()->back()->with(['success' => 'Notifications & Alerts Sent']);
    }

    /**
     * @param Request $request
     */
    public function uploadNotificationImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . '-' . str_random(10) . '.' . $image->getClientOriginalExtension();
            Image::make($request->file)->resize(1600, 1100)->save(base_path('/assets/img/various/' . $filename));
            return response()->json(['success' => $filename]);
        }
    }

    /**
     * @param Request $request
     */
    public function getUserNotifications(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();

        if ($user) {
            $notifications = Alert::where('user_id', $user->id)
                ->orderBy('id', 'DESC')
                ->whereDate('created_at', '>', Carbon::now()->subDays(7))
                ->get()
                ->take(20);
            return response()->json($notifications);
        }
    }

    /**
     * @param Request $request
     */
    public function markAllNotificationsRead(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();

        if ($user) {
            $notifications = Alert::where('user_id', $user->id)->get();
            foreach ($notifications as $notification) {
                $notification->is_read = true;
                $notification->save();
            }
            $notifications = Alert::where('user_id', $user->id)
                ->orderBy('id', 'DESC')
                ->whereDate('created_at', '>', Carbon::now()->subDays(7))
                ->get()
                ->take(20);
            return response()->json($notifications);
        }
    }

    /**
     * @param Request $request
     */
    public function markOneNotificationRead(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $notification = Alert::where('id', $request->notification_id)->first();

        if ($user && $notification) {

            $notification->is_read = true;
            $notification->save();

            $notifications = Alert::where('user_id', $user->id)
                ->orderBy('id', 'DESC')
                ->whereDate('created_at', '>', Carbon::now()->subDays(7))
                ->get()
                ->take(20);
            return response()->json($notifications);
        }
    }
}
