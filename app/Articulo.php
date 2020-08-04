<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
    protected $primaryKey = 'idarticulo';
    public $timestamps = false;

    public $guarded = [];

     public function categoria()
     {
             return $this->belongsTo('App\Categoria', 'idcategoria', 'idcategoria');
     }

}
