<?php

namespace App\Http\Controllers;

use App\Models\TravelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class TouristController extends Controller
{
    public function register()
    {
        if (Auth::guard('travel_user')->check()) {
            return redirect()->route('touristprofile');
        }
        return view('tourist_user.register');
    }

    public function registerPost(Request $request)
    {
        $user = new TravelUser();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);

        $user->save();

        Auth::guard('travel_user')->login($user);

        return redirect()->route('touristprofile')->with('success', 'Register successfully');
    }


    public function login()
    {
        if (Auth::guard('travel_user')->check()) {
            return redirect()->route('touristprofile');
        }
        return view('tourist_user.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('travel_user')->attempt($credentials)) {
            return response()->json(['success' => true, 'redirect' => route('touristprofile')]);
        }

        return response()->json(['success' => false, 'message' => 'Incorrect email or password']);
    }


    public function logout()
    {
        Auth::guard('travel_user')->logout();
        return redirect()->route('homepage');
    }

    public function profile()
    {public function profile()
        {
            $user = Auth::guard('travel_user')->user();
            $bookings = DB::table('bookings')->where('email', $user->email)->get();
            return view('tourist_user.profile', compact('user', 'bookings'));
        }
    }

}
