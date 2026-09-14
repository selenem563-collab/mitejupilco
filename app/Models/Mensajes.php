<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensajes extends Model
{
    use HasFactory;

    protected $table = 'mensajes';
    public $timestamps = true;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    protected $fillable = [
        'contacto_id',
        'direccion',
        'id_mensaje_wa',
        'tipo',
        'cuerpo',
        'contenido_crudo',
        'estado',
        'codigo_error',
        'mensaje_error',
        'creado_en',
        'actualizado_en',
    ];

    public function contacto()
    {
        return $this->belongsTo(Contacto::class, 'contacto_id');
    }

    public function consultas()
    {
        return $this->hasMany(Consultas::class, 'mensaje_id');
    }
}

