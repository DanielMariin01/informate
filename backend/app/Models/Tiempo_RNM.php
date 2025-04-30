<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiempo_RNM extends Model
{
    use HasFactory;
    protected $table = 'procedimiento_tiempo_rnm';
    protected $primaryKey = 'id_tiempo_rnm';

    protected $fillable = [
        'fk_equipo',
        'fk_sede',
        'codigo_interno',
        'examen',
        'SM',
        'GD',
        'sedacion',
        'es_especial',
        'observacion',
    
    ];
    // Relación con la tabla de equipos
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'fk_equipo');
    }
    // Relación con la tabla de sedes
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'fk_sede');
    }

}
