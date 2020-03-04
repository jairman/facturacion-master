<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\TipoComprobante;
use App\Models\LineaProducto;
use App\Models\Moneda;
use App\Models\TipoPago;
use App\Models\User;

class Comprobante extends Model
{
    use SoftDeletes;
    
    protected $table = 'comprobantes';

    protected $fillable = [
                            'serie',
                            'numero',
                            'nombre_cliente', 
                            'direccion', 
                            'rif', 
                            'subTotal', 
                            'iva', 
                            'total', 
                            'cliente_id', 
                            'moneda_id', 
                            'cotizacion', 
                            'fecha_emision', 
                            'tipo_comprobante_id',
                            'tipo_pago_id',
                            'caja_id',
                            'usuario_id'
    ];

    protected $dates = ['deleted_at'];

    public function tipo(){
        return $this->belongsTo(TipoComprobante::class, 'tipo_comprobante_id');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function moneda(){
        return $this->belongsTo(Moneda::class, 'moneda_id');
    }

        public function tipoPago(){
        return $this->belongsTo(TipoPago::class, 'tipo_pago_id');
    }


    public function cliente(){
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function lineasProducto(){
        return $this->hasMany(LineaProducto::class);
    }

    public function factura(){
        return $this->hasOne(Factura::class);
    }


    // FILTROS
    
}
