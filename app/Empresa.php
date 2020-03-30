<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    
	protected $table = 'empresa';

	protected $fillable = [
		'nombre', 'rif', 'usuario_id', 'direccion', 'telefono'
	];


	    public function comprobante()
    {
        return $this->hasMany('App\Models\Comprobante');
    }
}
