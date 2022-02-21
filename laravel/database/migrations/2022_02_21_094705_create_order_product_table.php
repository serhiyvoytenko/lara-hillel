<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('order_product', static function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('order_id')->constrained('orders');

            //Pivot fields
            $table->unsignedBigInteger('quantity');
            $table->unsignedFloat('single_price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
