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


$table->uuid('id')->primary();
$table->string('title');
$table->longText('description');
$table->decimal('price', 10, 0);
$table->decimal('discount_price', 10, 0);
$table->decimal('discount_percentage', 5, 0);
$table->foreignUuid('category_id')->references('id')->on('categories')->onDelete('cascade');
$table->foreignUuid('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
$table->string('brand');
$table->decimal('rating')->nullable();
$table->decimal('total_reviews')->nullable();
$table->decimal('stock')->nullable();
$table->enum('is_featured', ['0','1',])->default('0');
$table->enum('is_trending', ['0','1',])->default('0');
$table->enum('status', ['0','1',])->default('1');
$table->decimal('clicks')->nullable();
$table->decimal('total_sold')->nullable();
$table->string('image');
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
