<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\Factura;
use App\Models\Comprobante;
use App\Models\User;

class Recibo extends Model
{
    protected $table = 'recibos';

    protected $fillable = [
        'concepto', 'lugar', 'fecha', 'usuario_id', 'moneda_id', 'cliente_id', 'monto'
    ];

    protected $dates = ['deleted_at'];    

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function moneda(){
        return $this->belongsTo(Moneda::class, 'moneda_id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }
    
    public function facturas(){
        return $this->belongsToMany(Factura::class, 'recibo_facturas', 'recibo_id', 'factura_id')->withPivot('deuda_inicial', 'deuda_final');
    }    
}
