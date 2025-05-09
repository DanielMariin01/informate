<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Horario_medico extends Model
{
    use HasFactory;
    protected $table = 'horario_medico'; // Nombre de la tabla en la base de datos
    protected $fillable = [
    'fk_medico',
    'fk_sede',
    'fecha_inicio',
    'fecha_fin',
    'hora_inicio',
    'hora_fin',
    'color',
    'created_by',
    'updated_by',
    ];
    protected $primaryKey = 'id_horario_medico'; //
    // Nombre de la clave primaria
    // Si la tabla tiene las columnas created_at y updated_at

    //relación con la tabla de médicos
    public function medico()
    {
        return $this->belongsTo(Medico::class, 'fk_medico');
    }
    //relación con la tabla de sedes
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'fk_sede');
    }
    public function createdBy()
{
    return $this->belongsTo(User::class, 'created_by');
}

// relación con la tabla de usuarios (usuario que actualizó el registro)
public function updatedBy()
{
    return $this->belongsTo(User::class, 'updated_by');
}
    //relación con la tabla de usuarios
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id(); // Asigna el ID del usuario autenticado al crear
            $model->updated_by = Auth::id(); // También asigna el ID al actualizar
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id(); // Asigna el ID del usuario autenticado al actualizar
        });
    }
}
