<?php

namespace App\Http\Controllers;

use App\Models\TravelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TouristController extends Controller
{
    public function register()
    {
        return view('tourist_user.register');
    }

    public function registerPost(Request $request)
    {
        $travel_user = new TravelUser();

        $travel_user->name = $request->name;
        $travel_user->email = $request->email;
        $travel_user->password = Hash::make($request->password);

        $travel_user->save();

        Auth::guard('travel_user')->login($travel_user);

        return redirect()->route('touristprofile')->with('success', 'Register successfully');
    }

    public function login()
    {
        return view('tourist_user.login');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('travel_user')->attempt($credentials)) {
            return redirect()->route('touristprofile')->with('success', 'Login Success');
        }

        return back()->with('error', 'Error Email or Password');
    }

    public function logout()
    {
        Auth::guard('travel_user')->logout();
        return redirect()->route('touristlogin');
    }

    public function profile()
    {
        return view('tourist_user.profile');
    }
}
