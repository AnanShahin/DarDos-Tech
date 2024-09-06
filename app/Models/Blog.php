<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = "blogs";

    protected $fillable = [
        'title_en',
        'title_ar',
        'slug',
        'image',
        'description_en',
        'description_ar',
        'status',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
