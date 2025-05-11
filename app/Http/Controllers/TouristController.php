<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\TravelUser;
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
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:travel_users',
            'phone' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);
    
        $user = TravelUser::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => 'tourist'
        ]);
    
        Auth::guard('travel_user')->login($user);
    
        return redirect()->route('touristprofile')
            ->with('success', 'Registration successful!');
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
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::guard('travel_user')->attempt($credentials)) {
        return redirect()->intended(route('touristprofile'))
            ->with('success', 'Logged in successfully!');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
}

    public function logout()
    {
        Auth::guard('travel_user')->logout();
        return redirect()->route('homepage');
    }

    public function profile()
    {
        $user = Auth::guard('travel_user')->user();
        
        $bookings = DB::table('bookings')
            ->join('travel_packages', 'bookings.travel_package_id', '=', 'travel_packages.id')
            ->select('bookings.*', 'travel_packages.location')
            ->where('bookings.user_id', $user->id) // تغيير هنا من email إلى user_id
            ->get();
    
        return view('tourist_user.profile', compact('user', 'bookings'));
    }
}