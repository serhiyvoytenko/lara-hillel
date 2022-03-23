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
        Schema::create('products', static function (Blueprint $table) {
            $table->id();
            $table->string('title', 50);
            $table->string('description');
            $table->string('short_description');
            $table->string('sku', 50)->unique();
            $table->unsignedBigInteger('category_id');
            $table->unsignedFloat('price');
            $table->integer('discount');
            $table->integer('count');
            $table->string('thumbnail');
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
        Schema::dropIfExists('products');
    }
};
