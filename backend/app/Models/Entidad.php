<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;
    protected $table = 'entidad'; // Nombre de la tabla
    protected $primaryKey = 'id_entidad'; // Clave primaria
    protected $keyType = 'int';
    protected $fillable = [
        'nombre',
       
    ];
    // Definir la relación con el modelo Autorizacion_por_entidad
    public function autorizacionPorEntidad()
    {
        return $this->hasMany(Autorizacion_por_entidad::class, 'fk_entidad');
    }

}
