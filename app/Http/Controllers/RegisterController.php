<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * @param Request $request
     */
    public function registerRestaurantDelivery(Request $request)
    {
        // dd($request->all());
        $rules = [
            'captcha' => ['required', 'captcha'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
            // return redirect()->back()->withErrors($validator);
            return redirect()->back()->with(['message' => 'Something went wrong. Please try again.']);
        } else {

            try {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'delivery_pin' => strtoupper(str_random(5)),
                    'password' => \Hash::make($request->password),
                ]);

                if ($request->has('role')) {
                    if ($request->role == 'DELIVERY') {
                        $user->assignRole('Delivery Guy');
                        //return session message...
                        return redirect()->back()->with(['delivery_register_message' => 'Delivery User Registered', 'success' => 'Delivery User Registered']);
                    }
                    if ($request->role == 'RESOWN') {
                        $user->assignRole('Restaurant Owner');
                        // login and redirect to dashbaord...
                        Auth::loginUsingId($user->id);
                    }
                }
                return redirect()->back()->with(['success' => 'User Created']);

            } catch (\Illuminate\Database\QueryException $qe) {
                return redirect()->back()->with(['message' => 'Something went wrong. Please try again.']);
            } catch (Exception $e) {
                return redirect()->back()->with(['message' => 'Something went wrong. Please try again.']);
            } catch (\Throwable $th) {
                return redirect()->back()->with(['message' => 'Something went wrong. Please try again.']);
            }
        }
    }
}
