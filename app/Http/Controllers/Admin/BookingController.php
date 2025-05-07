<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\TravelPackage;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['travelPackage', 'user'])
                        ->latest()
                        ->filter(request(['search', 'status']))
                        ->paginate(10)
                        ->withQueryString();
        
        return view('admin.bookings.index', compact('bookings'));
    }

    public function show(Booking $booking)
    {
        $booking->load(['travelPackage', 'user']);
        return view('admin.bookings.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('admin.bookings.index')
               ->with('success', 'Booking deleted successfully!');
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking->update(['status' => $request->status]);

        return back()->with('success', 'Booking status updated!');
    }
    // public function showBookingForm($destination)
    // {
    //     $travelPackage = TravelPackage::where('slug', $destination)->firstOrFail();
    //     return view('bookings.form', compact('travelPackage'));
    // }
    

}