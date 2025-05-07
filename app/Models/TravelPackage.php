<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use app\Models\Booking;
use Illuminate\Database\Eloquent\Builder;

class TravelPackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'type', 'location', 'price', 'duration_days',
        'description', 'itinerary', 'included', 'excluded', 'category_id',
        'tour_guide_id', 'average_rating', 'reviews_count'
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tourGuide()
    {
        return $this->belongsTo(TourGuide::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
        
    }
    // In TravelPackage model
public function scopeFilter($query, array $filters)
{
    $query->when($filters['category'] ?? false, fn($query, $category) =>
        $query->whereHas('category', fn($query) => 
            $query->where('slug', $category)
        )
    );

    $query->when($filters['type'] ?? false, fn($query, $type) =>
        $query->where('type', $type)
    );

    $query->when($filters['min_price'] ?? false, fn($query, $minPrice) =>
        $query->where('price', '>=', $minPrice)
    );

    $query->when($filters['max_price'] ?? false, fn($query, $maxPrice) =>
        $query->where('price', '<=', $maxPrice)
    );

    $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query->where(fn($query) => 
            $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('description', 'like', '%'.$search.'%')
        )
    );
}

public static function priceRange() 
{
    return (object) [
        'min' => (int) self::min('price'),
        'max' => (int) self::max('price')
    ];
}

public function scopeFeatured($query)
{
    return $query->where('is_featured', true);
}
}