<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;
    protected $table = 'departamento'; // Nombre de la tabla
    protected $primaryKey = 'id_departamento'; // Clave primaria
    protected $keyType = 'int';
    protected $fillable = [
        'nombre',
  
    ];
    public function ciudades()
    {
        return $this->hasMany(Ciudad::class, 'fk_departamento');
    }
}
