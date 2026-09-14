<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocios extends Model
{
    use HasFactory;

    protected $table = 'negocios';
    public $timestamps = true;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    protected $fillable = [
        'uuid',
        'municipio_id',
        'categoria_id',
        'nombre',
        'slug',
        'nombre_dueno',
        'descripcion',
        'telefono',
        'whatsapp',
        'whatsapp_contesta',
        'referencia_ubicacion',
        'direccion',
        'url_mapa',
        'va_a_domicilio',
        'entrega_a_domicilio',
        'formas_pago',
        'nivel',
        'estado',
        'verificado_en',
        'verificado_por',
        'total_recomendaciones',
        'notas',
        'vector_busqueda',
        'creado_en',
        'actualizado_en',
        'eliminado_en',
    ];

    public function municipio()
    {
        return $this->belongsTo(Municipios::class, 'municipio_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }

    public function horarios()
    {
        return $this->hasMany(Horarios::class, 'negocio_id');
    }

    public function horariosExcepciones()
    {
        return $this->hasMany(Horarios_Excepciones::class, 'negocio_id');
    }

    public function palabrasClaveNegocio()
    {
        return $this->hasMany(Palabras_Clave_Negocio::class, 'negocio_id');
    }

    public function suscripciones()
    {
        return $this->hasMany(Suscripciones::class, 'negocio_id');
    }
    protected $casts = [
        'formas_pago' => 'array',
    ];
}

