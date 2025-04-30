<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizacion_por_entidad extends Model
{
    use HasFactory;
    protected $table = 'autorizacion_entidad'; // Nombre de la tabla
    protected $primaryKey = 'id_autorizacion_entidad'; // Clave primaria
    protected $keyType = 'int';
    protected $fillable = [
        'fk_entidad',
        'autorizacion',
        'ejemplo',
        'observacion',
        'created_at',
        'updated_at',
    ];
    // Definir la relación con el modelo Entidad
    public function entidad()
    {
        return $this->belongsTo(Entidad::class, 'fk_entidad');
    }
}
