<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PGP_Asmet extends Model
{
    use HasFactory;
    protected $table = 'procedimiento_asmet';
    protected $primaryKey = 'id_procedimiento_asmet';
    //crear la relación con la tabla ciudad     
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'fk_ciudad');
    }
    //crear relacion de procedimiento
    public function procedimiento()
    {
        return $this->belongsTo(Procedimiento::class, 'fk_procedimiento');
    }
    public function especialidad()
{
    return $this->belongsTo(Especialidad::class, 'fk_especialidad');
}
    
    protected $fillable = [
        'fk_procedimiento',
        'fk_ciuad',
    
    ];
}
