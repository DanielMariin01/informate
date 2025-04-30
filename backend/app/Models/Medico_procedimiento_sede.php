<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico_procedimiento_sede extends Model
{
    use HasFactory;
    protected $table = 'medico_procedimiento_sede'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria
    protected $keyType = 'int';
    protected $fillable = [
        'fk_medico', // Relación con el médico
        'fk_procedimiento', // Relación con el procedimiento
        'fk_sede', 
        'cupos_diarios', // Cupos diarios
        'duracion', // Duración
        'observaciones', // Observaciones
        // Relación con la sede // Relación con la especialidad
         // Relación con la empresa
    ];
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'fk_medico');
    }
    public function procedimiento()
    {
        return $this->belongsTo(Procedimiento::class, 'fk_procedimiento');
    }
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'fk_sede');
    }
}
