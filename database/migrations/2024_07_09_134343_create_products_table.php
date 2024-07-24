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
            $table->string("nombre");
            $table->string("foto")->nullable()->default("https://random.imagecdn.app/500/150");
            $table->integer("cantidad")->default(0);
            $table->float("precio")->default(0.0);
            $table->boolean("activo")->default(false);
            // $table->foreignId("provider_id")->constrained("providers")->onDelete("cascade");
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
