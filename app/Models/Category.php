<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active'
    ];

    /**
     * THE MISSING BRIDGE:
     * This allows us to do things like: $category->products 
     * or count them using Category::withCount('products')
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}