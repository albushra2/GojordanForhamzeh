<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function show()
    {
        return view('admin.profile.show', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.auth()->id(),
            'phone' => 'nullable|string|max:20'
        ]);

        auth()->user()->update($validated);

        return back()->with('success', 'Profile updated successfully');
    }
}