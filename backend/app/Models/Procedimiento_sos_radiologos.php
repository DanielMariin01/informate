<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimiento_sos_radiologos extends Model
{
    use HasFactory;
    protected $table = 'procedimiento_sos_radiologos';
    protected $primaryKey = 'id_sos_radiologo';

    protected $fillable = [
        'cups',
        'descripcion',
        'valor_vigente',
        'incluye',
        'consideracion',
        'Observaciones',
        'bienestar_ambulatorio',

    
    ];

}
