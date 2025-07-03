<?php
// app/Models/Category.php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class);
    }
}