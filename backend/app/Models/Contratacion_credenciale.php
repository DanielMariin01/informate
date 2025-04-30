<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratacion_credenciale extends Model
{
    use HasFactory;
    protected $table = 'credenciales_contratacion';
   
    protected $primaryKey = 'id_credenciales_contratacion';
    protected $fillable = [
        'cliente_anterior',
        'cliente_nuevo',
        'fk_empresa',
        'fk_ciudad',
        'codigo_cliente',
        'descripcion',
        'soporte',
      
    ];

    // Relación con la empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'fk_empresa');
    }
    // Relación con la ciudad   
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'fk_ciudad');
    }

}
