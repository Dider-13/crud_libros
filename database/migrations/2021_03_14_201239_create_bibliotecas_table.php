<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBibliotecasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliotecas', function (Blueprint $table) {
            $table->id(); // defaul autoincremental
            // creación para la tabla y migraciones
            $table->string('Titulo');
            $table->string('Autor');
            $table->string('DescripcionCorta');
            $table->string('DescripcionLarga');
            $table->string('barra');
            $table->string('editorial');
            $table->string('pais');
            $table->string('numeroPaginas');
            $table->string('año');
            $table->string('Portada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bibliotecas');
    }
}
