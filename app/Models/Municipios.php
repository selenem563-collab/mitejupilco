<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
{
    use HasFactory;

    protected $table = 'municipios';
    public $timestamps = true;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    protected $fillable = [
        'nombre',
        'slug',
        'entidad',
        'activo',
        'creado_en',
        'actualizado_en',
    ];

    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'municipio_id');
    }

    public function negocios()
    {
        return $this->hasMany(Negocios::class, 'municipio_id');
    }
}

