<?php

namespace App\Models;
use App\Models\Comprobante;
use App\Models\Producto;


use Illuminate\Database\Eloquent\Model;

class TasaDolar extends Model
{
   protected $table = 'tasa_dolar';

    protected $fillable = [
    	 'tasa'
    ];

    public function productos(){
    	return $this->hasMany(Producto::class);
    }

    public function comprobantes(){
    	return $this->hasMany(Comprobante::class);
    }
}
