<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea_entidade extends Model
{
    use HasFactory;
    protected $table = 'linea_entidad';
    protected $primaryKey = 'id_linea_entidad';
    protected $fillable = [
        'fk_entidad',
        'linea',
        'autorizacion_fisica',
        'observacion',
        'valor_sedacion',

    ];
    public function entidad()
    {
        return $this->belongsTo(Entidad::class, 'fk_entidad');
    }
}
