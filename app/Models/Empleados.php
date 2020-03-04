<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
	protected $fillable = [
		'nb_nombre', 'nb_apellido', 'nu_cedula', 'fe_ingreso', 'telefono','nb_profesion','usuario_id'
	];

}
