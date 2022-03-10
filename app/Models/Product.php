<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use InteractsWithViews;

    protected $casts = [
        'date' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
