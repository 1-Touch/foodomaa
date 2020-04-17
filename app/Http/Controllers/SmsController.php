<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Twilio\Rest\Client;

class SmsController extends Controller
{

    /**
     * @param Request $request
     */
    public function sendOtp(Request $request)
    {
        $sid = config('settings.twilioSid');
        $token = config('settings.twilioAccessToken');
        $verification_service = config('settings.twilioServiceId');

        $twilio = new Client($sid, $token);

        //check if the phone number is unique in the db
        $userPhone = User::where('phone', $request->phone)->first();
        $userEmail = User::where('email', $request->email)->first();

        //if email exits in db and token is in the request, proceed to login
        if ($userEmail && $request->accessToken != null) {
            // check auth token from facebook or google
            $validation = $this->validateAccessToken($request->email, $request->provider, $request->accessToken);
            //if auth token valid, proceed login
            if ($validation) {
                $response = [
                    'proceed_login' => true,
                ];
                return response()->json($response);
            } else {
                $response = false;
                return response()->json($response);
            }
        }

        if (!$userEmail && $request->accessToken != null) {
            // check auth token from facebook or google
            $validation = $this->validateAccessToken($request->email, $request->provider, $request->accessToken);
            if ($validation) {
                $response = [
                    'enter_phone_after_social_login' => true,
                ];
                return response()->json($response);
            } else {
                $response = false;
                return response()->json($response);
            }

        }

        if ($userPhone || $userEmail) {
            $response = [
                'email_phone_already_used' => true,
            ];
            return response()->json($response);
        } else {
            //it is a new number so proceed
            // phone number should be in E.164 format twilio.com/docs/glossary/what-e164
            try {
                //sms verification
                $verification = $twilio->verify->v2->services($verification_service)
                    ->verifications
                    ->create($request->phone, 'sms');
                $response = [
                    'otp' => true,
                ];
                return response()->json($response);
            } catch (Exception $e) {
                $response = [
                    'otp' => false,
                ];
                return response()->json($response);
            } catch (\Twilio\Rest\RestException $e) {
                $response = [
                    'otp' => false,
                ];
                return response()->json($response);
            } catch (\Twilio\Exceptions\RestException $e) {
                $response = [
                    'otp' => false,
                ];
                return response()->json($response);
            }
            $response = [
                'otp' => false,
            ];
            return response()->json($response);
        }
    }

    /**
     * @param Request $request
     */
    public function verifyOtp(Request $request)
    {
        $sid = config('settings.twilioSid');
        $token = config('settings.twilioAccessToken');
        $verification_service = config('settings.twilioServiceId');

        $twilio = new Client($sid, $token);

        try {
            $verification_check = $twilio->verify->v2->services($verification_service)
                ->verificationChecks
                ->create($request->otp, // code
                    array('to' => $request->phone) //phone number to verify
                );

            if ($verification_check->status === 'approved') {
                $response = [
                    'valid_otp' => true,
                ];
                return response()->json($response);
            } else {
                $response = [
                    'valid_otp' => false,
                ];
                return response()->json($response);
            }
        } catch (Exception $e) {
            $response = [
                'valid_otp' => false,
            ];
            return response()->json($response);
        } catch (\Twilio\Rest\RestException $e) {
            $response = [
                'valid_otp' => false,
            ];
            return response()->json($response);
        } catch (\Twilio\Exceptions\RestException $e) {
            $response = [
                'valid_otp' => false,
            ];
            return response()->json($response);
        }
        $response = [
            'valid_otp' => false,
        ];
        return response()->json($response);
    }

    /**
     * @param $provider
     * @param $accessToken
     */
    private function validateAccessToken($email, $provider, $accessToken)
    {
        if ($provider == 'facebook') {
            // validate facebook access token
            $curl = Curl::to('https://graph.facebook.com/app/?access_token=' . $accessToken)->get();
            $curl = json_decode($curl);

            if (isset($curl->id)) {
                if ($curl->id == config('settings.facebookAppId')) {
                    return true;
                }
                return false;
            }
            return false;

        }
        if ($provider == 'google') {
            // validate google access token
            $curl = Curl::to('https://www.googleapis.com/oauth2/v3/tokeninfo?access_token=' . $accessToken)->get();
            $curl = json_decode($curl);

            if (isset($curl->email)) {
                if ($curl->email == $email) {
                    return true;
                }
                return false;
            }
            return false;
        }
    }
}
