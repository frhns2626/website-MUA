<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
        'category',
        'price',
        'description',
        'features',
        'color_gradient',
        'order',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }

    public function scopeWedding($query)
    {
        return $query->where('category', 'wedding');
    }

    public function scopeWisuda($query)
    {
        return $query->where('category', 'wisuda');
    }
}
