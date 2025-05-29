<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre_usuario', 50)->unique();
            $table->string('clave', 100);
            $table->enum('rol', ['Administrador', 'Vendedor'])->default('Vendedor');
            $table->timestamps(); // Opcional
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
