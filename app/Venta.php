<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'idventa';
    public $timestamps = false;
    public $guarded = []; 

    public function personas()
    {
        return $this->belongsTo('App\Persona', 'idcliente', 'idpersona');
    }

    public function detalle_ventas2()
    {
        return $this->hasMany('App\detalleVenta', 'idventa', 'idventa');
    }

    public function detalle_ventas()
     {
         //NO BORRAR ESTO. FORMA 1: Calcular precio_compra cada articulo y sumar el total en la vista
         return $this->hasMany('App\detalleVenta', 'idventa', 'idventa')->select('idventa', \DB::raw('(cantidad*precio_venta) as total_venta'));

     }
}
