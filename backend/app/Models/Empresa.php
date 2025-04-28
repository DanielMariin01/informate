<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresa'; // Nombre de la tabla
    protected $primaryKey = 'id_empresa'; // Clave primaria
    protected $keyType = 'int';
    protected $fillable = [
        'nombre',
    
    ];

}
