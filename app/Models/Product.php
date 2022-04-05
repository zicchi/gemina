<?php

namespace App\Models;

use App\Helpers\Traits\ModelImageUrl;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use InteractsWithViews;
    use ModelImageUrl;

    protected $casts = [
        'date' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function initiator()
    {
        return $this->morphTo();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
