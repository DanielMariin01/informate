<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nexxa extends Model
{
    use HasFactory;
    protected $table = 'nexxa';
    protected $primaryKey = 'id_nexxa';
    protected $fillable = [
        'codigo_estado',
        'estado_nexxa_aquila',
        'descripcion',
        'escalamiento_realizar',
    ];
    
}
