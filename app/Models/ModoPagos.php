<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModoPagos extends Model
{
    protected $table = 'modo_pago';
    protected $primaryKey = 'id_modo_pago';

    protected $fillable = [
        'nb_modo_pago'
    ]; 



    public function pago()
    {
        return $this->hasMany('App\Models\ModoPago');
    } 

}
