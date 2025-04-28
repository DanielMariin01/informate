<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    protected $table = 'ciudad'; // Nombre de la tabla
    protected $primaryKey = 'id_ciudad'; // Clave primaria


    protected $keyType = 'int';
    
    protected $fillable = [
        'nombre',
        'fk_departamento', // Relación con el departamento
    ];
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'fk_departamento');
    }
}
