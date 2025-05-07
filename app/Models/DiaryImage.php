<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiaryImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['image', 'diary_id'];

    // Relationships
    public function diary()
    {
        return $this->belongsTo(Diary::class);
    }
}