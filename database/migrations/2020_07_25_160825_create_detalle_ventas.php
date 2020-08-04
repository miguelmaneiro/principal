<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->integer('iddetalle_venta');
            $table->integer('idventa');
            $table->foreign('idventa')->references('idventa')->on('ventas');
            $table->integer('idarticulo');
            $table->foreign('idarticulo')->references('idarticulo')->on('articulos');
            $table->decimal('precio_venta', 11, 2);
            $table->decimal('descuento', 11, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
