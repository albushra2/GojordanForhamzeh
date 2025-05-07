<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // إنشاء حجز جديد
    public function store(Request $request, TravelPackage $travelPackage)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'total_guests' => 'required|integer|min:1',
            'special_requests' => 'nullable|string|max:500'
        ]);

        $booking = $travelPackage->bookings()->create([
            'user_id' => auth()->id(),
            ...$validated,
            'status' => 'pending'
        ]);

        return redirect()->route('bookings.show', $booking);
    }

    // عرض الحجز
    public function show(Booking $booking)
    {
        $this->authorize('view', $booking);

        return view('bookings.show', [
            'booking' => $booking->load(['travelPackage.galleries', 'user'])
        ]);
    }

    // إلغاء الحجز
    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking);
        
        $booking->update(['status' => 'cancelled']);
        
        return back()->with('success', 'تم إلغاء الحجز بنجاح');
    }
}