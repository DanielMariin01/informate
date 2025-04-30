<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extension_sede extends Model
{
    use HasFactory;
    protected $table = 'extension_sede';
    protected $primaryKey = 'id_extension_sede';
    protected $fillable = [
        'fk_sede',
        'extension',
        'updated_at'
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'fk_sede');
    }

}
