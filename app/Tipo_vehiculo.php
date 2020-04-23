<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_vehiculo extends Model
{
    //protected $fillable = ['nombre', 'descripcion'];
    public $timestamps = false;
    //Relacion con la tabla tarifas
    public function tarifa()
    {
        return $this->hasMany('App\Tarifa');
    }
}
