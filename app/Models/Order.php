<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'shipping_address',
        'city',
        'postal_code',
        'phone_number',
        'delivery_fee',
        'coupon_code',
        'discount_amount',
    ];

    // An order belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // An order has many OrderItems
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}