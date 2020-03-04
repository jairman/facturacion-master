<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Preferencias extends Model
{
    protected $table = 'preferencias';
    protected $primaryKey = 'usuario_id';

    protected $fillable = [
        'usuario_id', 'estilo'
    ];

    public function usuario(){
    	return $this->belongsTo(User::class, 'usuario_id');
    }
}
