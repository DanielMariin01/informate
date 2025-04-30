<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimiento_sos_cedicaf extends Model
{
    use HasFactory;
    protected $table = 'procedimiento_sos_cedicaf';
    protected $primaryKey = 'id_soscedicaf';
    protected $fillable = [
        'cups',
        'descripcion',
        'homologo_iss',
        'tarifario_negociado',
        'descuento_incremento',
        'valor_tarifa',
        'incluye',
        'bienestar_ambulatorio',
    
    
    ];
}
