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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 80)->nullable(false);
            $table->foreignId('tipo_mascota')->constrained('tipos_mascota')->onDelete('cascade')->onUpdate('Cascade');
            $table->foreignId('cliente')->constrained('clientes')->onDelete('cascade')->onUpdate('Cascade'); // ID del dueño
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
