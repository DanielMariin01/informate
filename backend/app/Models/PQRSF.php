<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PQRSF extends Model
{
    use HasFactory;
    protected $table = 'pqrsf';
    protected $primaryKey = 'id_pqrsf';
    protected $fillable = [
        'caso',
        'descripcion',
     
    
    ];
}
