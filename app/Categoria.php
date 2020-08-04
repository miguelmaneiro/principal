<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{ 
    protected $table = 'categorias';
    protected $primaryKey = 'idcategoria';
    public $timestamps = false;

    public $guarded = [];

 
    public function articulos()
    {
        return $this->hasMany('App\Articulo', 'idcategoria', 'idcategoria');
    } 
}
