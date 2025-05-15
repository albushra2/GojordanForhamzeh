<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\TravelPackage; // Make sure this is imported
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Needed if you use Auth::check() or Auth::id() here

class BookingController extends Controller
{
    // Method to display the booking form
    // Use Route Model Binding to automatically get the TravelPackage
    public function create(TravelPackage $travelPackage)
    {
        // Optional: Check if user is authenticated before showing the form
        // if (!Auth::check()) {
        //     // Redirect to login or show an error
        //     return redirect()->route('tourist_user.login')->with('error', 'Please login to book a package.');
        // }

        return view('bookings.create', compact('travelPackage')); // Assume you have a bookings/create.blade.php view for the form
    }


    // إنشاء حجز جديد
    public function store(Request $request, TravelPackage $travelPackage)
    {
        // Ensure user is authenticated
         if (!Auth::check()) {
             abort(403, 'You must be logged in to book.'); // Or redirect
         }

        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today', // Changed 'after:today' to 'after_or_equal:today'
            'end_date' => 'required|date|after:start_date',
            'total_guests' => 'required|integer|min:1',
            'phone' => 'required|string|max:20', // Added phone validation as it's in migration
            'children_count' => 'nullable|integer|min:0', // Added children_count validation
            'group_type' => 'required|in:individual,family', // Added group_type validation
            'terms_agreed' => 'accepted', // Added terms_agreed validation
            'special_requests' => 'nullable|string|max:500'
        ]);

        $booking = $travelPackage->bookings()->create([
            'user_id' => Auth::id(), // Use Auth::id()
            'phone' => $validated['phone'],
            'children_count' => $validated['children_count'] ?? 0, // Use default 0 if not provided
            'group_type' => $validated['group_type'],
            'terms_agreed' => true, // Assuming 'accepted' means true
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_guests' => $validated['total_guests'],
            'special_requests' => $validated['special_requests'],
            'status' => 'pending'
        ]);

        return redirect()->route('bookings.show', $booking)->with('success', 'Booking created successfully.'); // Added success message
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

        // You might want to add checks here if the booking status allows cancellation
        if ($booking->status === 'pending') {
             $booking->update(['status' => 'cancelled']);
             return back()->with('success', 'Booking cancelled successfully.');
        } else {
             return back()->with('error', 'Booking cannot be cancelled at this stage.');
        }
    }
}