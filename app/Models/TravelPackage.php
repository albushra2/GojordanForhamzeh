<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Booking;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Review;
use App\Models\TourGuide;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class TravelPackage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'location',
        'price',
        'duration_days',
        'description',
        'itinerary',
        'included',
        'excluded',
        'category_id',
        'tour_guide_id',
        'featured_image', // Add this
        'average_rating',
        'reviews_count'
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
        return $this->hasMany(Gallery::class)->withTrashed();
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
protected static function boot()
{
    parent::boot();

    static::creating(function ($package) {
        $slug = Str::slug($package->title);
        $count = TravelPackage::where('slug', 'like', "{$slug}%")->count();
        $package->slug = $count ? "{$slug}-" . ($count + 1) : $slug;
    });

    static::updating(function ($package) {
        if ($package->isDirty('title')) {
            $slug = Str::slug($package->title);
            $count = TravelPackage::where('slug', 'like', "{$slug}%")
                ->where('id', '!=', $package->id)
                ->count();
            $package->slug = $count ? "{$slug}-" . ($count + 1) : $slug;
        }
    });
}
protected $appends = ['image_url'];

public function getImageUrlAttribute()
{
    return $this->featured_image 
        ? Storage::url($this->featured_image)
        : asset('images/placeholder.jpg');
}
}