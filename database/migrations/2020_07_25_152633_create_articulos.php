<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->integer('idarticulo')->autoIncrement();
            $table->integer('idcategoria');
            $table->foreign('idcategoria')->references('idcategoria')->on('categorias');
            $table->string('codigo', 50)->nullable();
            $table->string('nombre', 100);
            $table->integer('stock');
            $table->string('descripcion', 512)->nullable();
            $table->string('imagen', 50)->nullable();
            $table->string('estado', 20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
