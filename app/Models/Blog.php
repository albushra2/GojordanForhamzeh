<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'image', 'description', 'reads', 'category_id', 'user_id'
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopePublished($query)
{
    return $query->whereNull('deleted_at');
}

public function scopePopular($query)
{
    return $query->orderBy('reads', 'desc');
}

public function scopeFilter(Builder $query, array $filters) // Note the 'scope' prefix
    {
        // Filter by search term
        $query->when($filters['search'] ?? false, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                      ->orWhere('body', 'like', '%' . $search . '%');
            });
        });

        // Filter by category slug
        $query->when($filters['category'] ?? false, function ($query, $category) {
            $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        // Filter by author username
        $query->when($filters['author'] ?? false, function ($query, $author) {
             $query->whereHas('user', function ($query) use ($author) {
                 $query->where('username', $author); // Assuming 'username' is the field for author
             });
        });
    }
    public function comments()
{
    return $this->hasMany(Comment::class)->latest();
}
}