<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horarios_Excepciones extends Model
{
    use HasFactory;

    protected $table = 'horarios_excepciones';
    public $timestamps = false;
    const CREATED_AT = 'creado_en';

    protected $fillable = [
        'negocio_id',
        'fecha',
        'cerrado',
        'abre_a',
        'cierra_a',
        'motivo',
        'creado_en',
    ];

    public function negocio()
    {
        return $this->belongsTo(Negocios::class, 'negocio_id');
    }
}

