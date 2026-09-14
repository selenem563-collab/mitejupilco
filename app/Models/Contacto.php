<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contactos';
    public $timestamps = true;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    protected $fillable = [
        'uuid',
        'telefono_wa',
        'nombre_perfil_wa',
        'nombre',
        'estado',
        'intentos_nombre',
        'consulta_pendiente',
        'municipio_id',
        'aviso_privacidad_enviado_en',
        'baja_solicitada_en',
        'primer_contacto_en',
        'ultimo_contacto_en',
        'total_consultas',
        'creado_en',
        'actualizado_en',
    ];

    public function municipio()
    {
        return $this->belongsTo(Municipios::class, 'municipio_id');
    }

    public function mensajes()
    {
        return $this->hasMany(Mensajes::class, 'contacto_id');
    }

    public function consultas()
    {
        return $this->hasMany(Consultas::class, 'contacto_id');
    }
}

