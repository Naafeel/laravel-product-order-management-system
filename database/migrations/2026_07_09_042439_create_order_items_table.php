<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            
            // Link to the main order
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            
            // Link to the product
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            
            // What was the quantity and price AT THE TIME OF PURCHASE?
            $table->integer('quantity');
            $table->decimal('price', 10, 2); // We save the price here so if the product price changes later, the old order history doesn't change!

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};