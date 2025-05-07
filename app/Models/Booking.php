<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use app\Models\User;
use Illuminate\Database\Eloquent\Builder;
use App\Models\TravelPackage;
class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'travel_package_id', 'phone', 'start_date', 'end_date',
        'total_guests', 'children_count', 'special_requests', 'terms_agreed',
        'group_type', 'status', 'is_reviewed'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function travelPackage()
    {
        return $this->belongsTo(TravelPackage::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        // Filter by Status
        // Use when() for cleaner conditional queries
        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where('status', $status);
        });

        // Filter by Search Term
        $query->when($filters['search'] ?? false, function ($query, $search) {
            // Customize which columns you want to search
            return $query->where(function ($query) use ($search) {
                 $query->where('id', 'like', '%' . $search . '%') // Example: Search booking ID
                       ->orWhere('some_other_booking_field', 'like', '%' . $search . '%') // Add other booking fields
                       // Example: Search related user name (requires join or whereHas)
                       ->orWhereHas('user', function ($query) use ($search) {
                           $query->where('name', 'like', '%' . $search . '%');
                       })
                       // Example: Search related travel package title (requires join or whereHas)
                       ->orWhereHas('travelPackage', function ($query) use ($search) {
                            $query->where('title', 'like', '%' . $search . '%');
                       });
             });
        });

        // Return the modified query builder
        return $query;
    }
}