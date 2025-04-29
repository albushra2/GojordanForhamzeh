<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class BookingController extends Controller
{
    public function create($location)
    {
        // التحقق من أن الموقع موجود وصالح
        $validLocations = ['amman', 'petra', 'wadi-rum']; // مثال
        if (!in_array(strtolower($location), $validLocations)) {
            abort(404, 'Location not found');
        }
    
        $closedDates = Booking::where('travel_package_id', $location)
                            ->where('date', '>=', now()->format('Y-m-d'))
                            ->pluck('date')
                            ->toArray();
    
        return view('bookings.form', [
            'location' => ucfirst(str_replace('-', ' ', $location)),
            'closedDates' => $closedDates,
            'minDate' => now()->format('Y-m-d'),
            'maxDate' => now()->addYear()->format('Y-m-d')
        ]);
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'number_phone' => 'required|string|max:20|regex:/^[0-9\+\-\s]+$/',
        'date' => 'required|date|after_or_equal:today',
        'guest_count' => 'required|integer|min:1|max:20',
        'guest_ages' => 'nullable|string|max:100',
        'group_type' => 'required|in:individual,family',
        'travel_package_id' => 'required|string',
        'terms_agreed' => 'required|accepted'
    ]);

    // إضافة user_id إذا كان مسجلاً
    if (auth()->check()) {
        $validated['user_id'] = auth()->id();
    }

    // حساب السعر التقديري
    $validated['estimated_price'] = $this->calculatePrice(
        $validated['travel_package_id'],
        $validated['guest_count'],
        $validated['group_type']
    );

    $booking = Booking::create($validated);

    return redirect()->route('bookings.success', $booking)
                   ->with('success', 'تم الحجز بنجاح!');
}

private function calculatePrice($package, $guests, $groupType)
{
    // هنا ضع منطق حساب السعر حسب الحزمة وعدد الضيوف
    $basePrices = [
        'amman' => 50,
        'petra' => 100,
        'wadi-rum' => 80
    ];

    $price = $basePrices[$package] ?? 50;
    $discount = $groupType === 'family' ? 0.1 : 0;
    
    return ($price * $guests) * (1 - $discount);
}

public function destroy($id)
{
    $booking = Booking::findOrFail($id);

    // استخدمي policy بدلاً من التحقق اليدوي
    $this->authorize('delete', $booking);

    if ($booking->date->subDay()->isPast()) {
        return back()->with('error', 'لا يمكن الإلغاء قبل أقل من 24 ساعة من الموعد');
    }

    $booking->delete();

    return auth()->user()->isAdmin() 
        ? redirect()->route('admin.bookings.index')->with('success', 'تم حذف الحجز')
        : redirect()->route('touristprofile')->with('success', 'تم إلغاء الحجز بنجاح');
}

public function show(Booking $booking)
{
    // التحقق من الصلاحيات باستخدام Policy (إن وجد)
    $this->authorize('view', $booking);

    // تحميل العلاقات إذا لزم الأمر
    $booking->load('travelPackage', 'user');

    return view('bookings.show', [
        'booking' => $booking,
        'canCancel' => !$booking->date->subDay()->isPast() && 
                      auth()->id() === $booking->user_id
    ]);
}
public function success(Booking $booking)
{
    $this->authorize('view', $booking);

    return view('bookings.success', [
        'booking' => $booking,
        'qrCode' => QrCode::format('svg')->size(150)->generate(
            route('bookings.show', ['booking' => $booking->id])
        )
    ]);
}
}
