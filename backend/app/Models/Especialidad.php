<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;
    protected $table = 'especialidad'; // Nombre de la tabla
    protected $primaryKey = 'id_especialidad'; // Clave primaria
    protected $keyType = 'int';
    protected $fillable = [
        'nombre',
     
    ];
}
