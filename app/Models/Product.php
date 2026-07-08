<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // These are the columns we are allowed to fill via forms
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
        'is_active',
        'category_id',
    ];

    /**
     * THE RELATIONSHIP: 
     * This allows us to do things like: $product->category->name
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}