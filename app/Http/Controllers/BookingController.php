<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function showBookingForm($destination)
    {
        // جيب الأيام اللي فيها 20 شخص أو أكثر
        $fullDates = Booking::select('date')
                    ->where('destination', $destination)
                    ->groupBy('date')
                    ->havingRaw('SUM(visitors) >= 20')
                    ->pluck('date')
                    ->map(function($date) {
                        return $date->format('Y-m-d'); // تأكد من تنسيق التاريخ
                    });
    
        // نرسل الوجهة والأيام المغلقة للفورم
        return view('booking.form', compact('destination', 'fullDates'));
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|email',
            'date' => 'required|date|after:today',
            'visitors' => 'required|integer|min:1'
        ]);

        // حساب السعر بناءً على الوجهة
        $prices = [
            'petra' => 50,
            'dead-sea' => 30,
            'wadi-rum' => 40,
            'jerash' => 25
        ];

        $price = $prices[strtolower($validated['destination'])] ?? 0;
        $total = $price * $validated['visitors'];

        Booking::create([
            'destination' => $validated['destination'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'visitors' => $validated['visitors'],
            'total_price' => $total,
            'date' => $validated['date'],
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
