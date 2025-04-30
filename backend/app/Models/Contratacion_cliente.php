<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ciudad;
use App\Models\Empresa;

class Contratacion_cliente extends Model
{
    use HasFactory;
    protected $table = 'cliente_contratacion';
    protected $primaryKey = 'id_cliente_contratacion';
    protected $fillable = [
        'cliente_anterior',
        'cliente_nuevo',
        'fk_empresa',
        'fk_ciudad',
        'director_contrato',
        'codigo_cliente',
        'descripcion',
        'contenido_contrato',
        'soporte_admision',
        'copagos_cuotas_moderadoras',
        'exclusiones_contrato',
        'observaciones_autorizacion',
        'sedacion_998702',
        'medio_contraste_hidrosoluble_fluoroscopia',
        'contraste_farmacologico_caverjet',
        'contraste_hepatoespecifico_primovist',
        'incluye_eco_881431',
        'incluye_eco_881401',
        'consulta_cardiologia_primera_vez',
        'doppler_extremidades',
        'particularidades',
        'validacion_autorizacion_linea',
        'validacion_autorizacion_pagina',
        'servicios_contratados',
        
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
