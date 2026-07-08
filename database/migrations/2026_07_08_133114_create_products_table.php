<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            
            // Basic details
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            
            // Pricing and Stock
            $table->decimal('price', 10, 2); // 10 total digits, 2 after decimal (e.g., 99999999.99)
            $table->integer('stock')->default(0);
            
            // Image
            $table->string('image')->nullable(); // We will save the file path here later
            
            // Status
            $table->boolean('is_active')->default(true);
            
            // THE MAGIC LINK: Connects this product to a category
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};