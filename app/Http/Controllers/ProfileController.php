<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Profile updated.');
    }
    public function bookings()
{
    $bookings = auth()->user()->bookings()
                    ->with('travelPackage')
                    ->orderBy('date', 'desc')
                    ->get();

    return view('profile.bookings', compact('bookings'));
}
}
