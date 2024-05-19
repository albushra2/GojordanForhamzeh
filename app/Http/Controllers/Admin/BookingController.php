<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    
    public function index()
    {
        $bookings = Booking::with('travel_package')->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show(string $id)
    {
        //
    }

   
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        //
    }

    
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->back()->with([
            'message' => 'success deleted !',
            'alert-type' => 'danger'
        ]);
    }
}
