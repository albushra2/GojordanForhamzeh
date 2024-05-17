<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'travel_package_id' => 'required|exists:travel_packages,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number_phone' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Booking::create([
            'travel_package_id' => $request->travel_package_id,
            'name' => $request->name,
            'email' => $request->email,
            'number_phone' => $request->number_phone,
            'date' => $request->date,
        ]);

        return redirect()->back()->with('message', 'Booking successful!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('touristprofile')->with('message', 'Booking deleted successfully!');
    }
}
