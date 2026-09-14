<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripciones extends Model
{
    use HasFactory;

    protected $table = 'suscripciones';
    public $timestamps = true;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    protected $fillable = [
        'negocio_id',
        'nivel',
        'monto_mxn',
        'periodo',
        'estado',
        'inicia_el',
        'termina_el',
        'ultimo_pago_el',
        'notas',
        'creado_en',
        'actualizado_en'
    ];

    public function negocio()
    {
        return $this->belongsTo(Negocios::class, 'negocio_id');
    }
}

