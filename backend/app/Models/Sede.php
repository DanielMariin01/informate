<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    protected $table = 'sede'; // Nombre de la tabla
    protected $primaryKey = 'id_sede'; // Clave primaria
    protected $keyType = 'int';
    protected $fillable = [
        'nombre',
        'fk_empresa', // Relación con la empresa
        'fk_ciudad',
        'direccion',
    ];
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'fk_empresa');
    }
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'fk_ciudad');
    }

}
