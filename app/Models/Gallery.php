<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'image', 'travel_package_id'];

    // Relationships
    public function travelPackage()
    {
        return $this->belongsTo(TravelPackage::class);
    }
}