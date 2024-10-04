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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('moto_id')->constrained('motos')->onDelete('cascade');
            $table->date('fecha_entrada');
            $table->date('fecha_salida')->nullable();
            $table->text('descripcion');
            $table->enum('estado', ['pendiente', 'en_proceso', 'finalizada']);
            $table->decimal('costo_total', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
