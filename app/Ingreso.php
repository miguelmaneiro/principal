<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{

    protected $table = 'ingresos';
    protected $primaryKey = 'idingreso';
    public $timestamps = false;
    public $guarded = []; 

    public function personas()
    {
        return $this->belongsTo('App\Persona', 'idproveedor', 'idpersona');
    }

    public function detalle_ingresos2()
    {
        return $this->hasMany('App\detalleIngreso', 'idingreso', 'idingreso');
    }

    public function detalle_ingresos()
     {
         //NO BORRAR ESTO. FORMA 1: Calcular precio_compra cada articulo y sumar el total en la vista
         return $this->hasMany('App\detalleIngreso', 'idingreso', 'idingreso')->select('idingreso', \DB::raw('(cantidad*precio_compra) as total_compra'));

     }
} 
