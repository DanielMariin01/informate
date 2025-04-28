<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimiento extends Model
{
    use HasFactory;
    protected $table = 'procedimiento'; // Nombre de la tabla
    protected $primaryKey = 'id_procedimiento'; // Clave primaria
    protected $keyType = 'int';
    protected $fillable = [
        'codigo_radiologos',
        'codigo_cedicaf',
        'codigo_diaxme',
        'codigo_resolucion',
        'nombre',
        'descripcion',
        'redond_particular_2025',
        'redond_10_2025',
        'tipo_tarifa_10',
        'redond_20_2025',
        'tipo_tarifa_20',
        'redond_30_2025',
        'tipo_tarifa_30',
        'redond_40_2025',
        'tipo_tarifa_40',
        'redond_medi_mer_privado_2025',
        'tipo_tarifa_medi_mer',
        'inclusiones',
        'observaciones',
        'fk_especialidad',
        'link',
       
        
        // Relación con la especialidad
        // Relación con la ciudad
    ];
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'fk_especialidad');
    }
}
