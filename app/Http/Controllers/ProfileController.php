<?php

// namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Hash;
// use App\Http\Requests\ProfileUpdateRequest;

// class ProfileController extends Controller
// {
//     public function show()
//     {
//         return view('auth.profile');
//     }

//     public function update(ProfileUpdateRequest $request)
//     {
//         if ($request->password) {
//             auth()->user()->update(['password' => Hash::make($request->password)]);
//         }

//         auth()->user()->update([
//             'name' => $request->name,
//             'email' => $request->email,
//         ]);

//         return redirect()->route('admin.dashboard')->with('success', 'Profile updated.');
//     }
//     public function bookings()
// {
//     $bookings = auth()->user()->bookings()
//                     ->with('travelPackage')
//                     ->orderBy('date', 'desc')
//                     ->get();

//     return view('profile.bookings', compact('bookings'));
// }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // تحديث الملف الشخصي
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.auth()->id(),
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('avatar')) {
            if (auth()->user()->avatar) {
                Storage::delete(auth()->user()->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        auth()->user()->update($validated);

        return back()->with('success', 'تم تحديث الملف الشخصي بنجاح');
    }
}