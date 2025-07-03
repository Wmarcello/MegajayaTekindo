<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   public function category() {
    return $this->belongsTo(Category::class);
}

public function scopeFeatured($query)
{
    return $query->where('is_featured', true);
}

public function scopeActive($query)
{
    return $query->where('is_active', true);
}

public function scopeOrdered($query)
{
    return $query->orderBy('sort_order');
}

protected $fillable = [
    'category_id', 'name', 'slug', 'description', 'image', 'price', 'brand', 'type', 'specifications', 'is_featured', 'is_active', 'sort_order'
];
}
