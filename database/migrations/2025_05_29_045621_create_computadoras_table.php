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
        Schema::create('computadoras', function (Blueprint $table) {
            $table->id('codigo_tienda');
            $table->integer('almacenamiento');
            $table->integer('ram');
            $table->string('tarjeta_grafica', 100);
            $table->decimal('precio', 10, 2);
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('procesador', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computadoras');
    }
};
