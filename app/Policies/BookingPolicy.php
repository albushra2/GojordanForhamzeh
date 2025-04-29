<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;

class BookingPolicy
{
    public function viewAny(User $user): bool
    {
        // أضيفي المنطق هنا
        return true;
    }

    public function view(User $user, Booking $booking): bool
    {
        return $user->id === $booking->user_id;
    }

    public function create(User $user): bool
    {
        return true; // أو منطق حسب الحاجة
    }

    public function update(User $user, Booking $booking): bool
    {
        return $user->id === $booking->user_id;
    }

    public function delete(User $user, Booking $booking): bool
    {
        return $user->id === $booking->user_id;
    }

    public function restore(User $user, Booking $booking): bool
    {
        return $user->id === $booking->user_id;
    }

    public function forceDelete(User $user, Booking $booking): bool
    {
        return $user->id === $booking->user_id;
    }
}
