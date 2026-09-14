<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultas extends Model
{
    use HasFactory;

    protected $table = 'consultas';
    public $timestamps = false;
    const CREATED_AT = 'creado_en';

    protected $fillable = [
        'contacto_id',
        'mensaje_id',
        'texto_original',
        'texto_normalizado',
        'intencion_detectada',
        'categoria_resuelta_id',
        'palabras_extraidas',
        'confianza',
        'total_resultados',
        'tuvo_resultados',
        'estrategia_busqueda',
        'uso_ia',
        'tokens_entrada',
        'tokens_cache',
        'tokens_salida',
        'tiempo_respuesta_ms',
        'creado_en',
    ];

    public function contacto()
    {
        return $this->belongsTo(Contacto::class, 'contacto_id');
    }

    public function mensaje()
    {
        return $this->belongsTo(Mensajes::class, 'mensaje_id');
    }

    public function categoriaResuelta()
    {
        return $this->belongsTo(Categorias::class, 'categoria_resuelta_id');
    }
}

