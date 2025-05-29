<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputadorasTable extends Migration
{
    public function up()
    {
        Schema::create('computadoras', function (Blueprint $table) {
            $table->id('codigo_tienda');
            $table->integer('almacenamiento')->unsigned();
            $table->integer('ram')->unsigned();
            $table->string('tarjeta_grafica', 100);
            $table->decimal('precio', 10, 2)->unsigned();
            $table->text('descripcion')->nullable();
            $table->string('imagen')->nullable();
            $table->string('procesador', 100);
            $table->timestamps(); // Opcional
        });
    }

    public function down()
    {
        Schema::dropIfExists('computadoras');
    }
}
