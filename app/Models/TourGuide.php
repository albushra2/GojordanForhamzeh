<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourGuide extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'specialization', 
        'bio', 'languages', 'rating', 'reviews_count', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Relationships
    public function travelPackages()
    {
        return $this->hasMany(TravelPackage::class);
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}