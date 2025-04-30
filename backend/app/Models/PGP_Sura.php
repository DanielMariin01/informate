<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PGP_Sura extends Model
{
    use HasFactory;
    protected $table = 'pgp_sura';
    protected $primaryKey = 'id_pgp_sura';
    //crear la relación con la tabla ciudad
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'fk_ciudad');
    }
    protected $fillable = [
        'ips_adscrita',
        'incluye',
        'no_incluye',
        'observacion',
        'fk_ciudad',
        
    ];
    
}
//