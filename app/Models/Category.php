<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Models\TravelPackage;
use App\Models\Blog;
class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'image'];

    // Relationships
    public function travelPackages()
    {
        return $this->hasMany(TravelPackage::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}