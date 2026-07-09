<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            
            // Link to the user who placed the order
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            
            // Order details
            $table->decimal('total_amount', 10, 2); 
            $table->string('status')->default('pending'); // pending, processing, completed, cancelled
            
            // Shipping details
            $table->string('shipping_address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('phone_number');
            
            // Optional: Coupon or delivery fee
            $table->decimal('delivery_fee', 10, 2)->default(0.00);
            $table->string('coupon_code')->nullable();
            $table->decimal('discount_amount', 10, 2)->default(0.00);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};