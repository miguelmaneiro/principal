<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalleIngreso extends Model
{
    protected $table = 'detalle_ingresos';
    protected $primaryKey = 'iddetalle_ingreso';
    public $timestamps = false;
    public $guarded = []; 

    public function ingresos()
    {
            return $this->belongsTo('App\Ingreso', 'idingreso', 'ingreso');
    }
    public function articulos()
    {
            return $this->belongsTo('App\Articulo', 'idarticulo', 'idarticulo')->select('idarticulo','nombre','codigo');
    }
}
