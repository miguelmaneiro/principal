<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalleVenta extends Model
{ 
    protected $table = 'detalle_ventas';
    protected $primaryKey = 'iddetalle_venta';
    public $timestamps = false;
    public $guarded = []; 

    public function ingresos()
    {
            return $this->belongsTo('App\Venta', 'idventa', 'idventa');
    }
    public function articulos()
    {
            return $this->belongsTo('App\Articulo', 'idarticulo', 'idarticulo')->select('idarticulo','nombre','codigo');
    }
}
