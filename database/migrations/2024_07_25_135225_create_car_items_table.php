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
        Schema::create('car_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId("car_id")->on("cars")->onDelete("CASCADE");
            $table->foreignId("product_id")->on("products")->onDelete("CASCADE");
            $table->integer("quantity");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_items');
    }
};
