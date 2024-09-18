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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre del descuento
            $table->enum('type', ['percentage', 'fixed']); // Tipo de descuento: porcentaje o valor fijo
            $table->float('value'); // Valor del descuento (porcentaje o cantidad fija)
            $table->date('start_date')->nullable(); // Fecha de inicio del descuento
            $table->date('end_date')->nullable(); // Fecha de finalización del descuento
            $table->boolean('active')->default(true); // Si el descuento está activo o no
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
