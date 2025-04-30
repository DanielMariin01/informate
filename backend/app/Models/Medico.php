<?php

// app/Models/Medico.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    // Especificar que la clave primaria es 'id_medico'
    protected $primaryKey = 'id_medico';

    // Especificar que la tabla es 'medico'
    protected $table = 'medico';

    // Hacer que la columna 'id_medico' sea un entero (por defecto es 'int')
    protected $keyType = 'int';

    // Definir la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'fk_usuario');
    }
    
    public function procedimientosSedes()
    {
        return $this->hasMany(Medico_procedimiento_sede::class, 'fk_medico');
    }
    // Asegúrate de que los campos que pueden ser asignados masivamente estén protegidos o asignados
    protected $fillable = [
        'nombre',
        'trial999',
        'fk_usuario',
    ];

}