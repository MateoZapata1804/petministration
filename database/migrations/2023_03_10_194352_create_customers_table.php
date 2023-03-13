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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('documento_id', 80)->unique()->nullable(false);
            $table->string('nombre1', 40)->nullable(false);
            $table->string('nombre2', 40)->nullable();
            $table->string('apellido1', 40)->nullable(false);
            $table->string('apellido2', 40)->nullable();
            $table->string('celular', 40)->nullable(false);
            $table->string('email', 255)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
