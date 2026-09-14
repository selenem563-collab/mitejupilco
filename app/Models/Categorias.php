<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    public $timestamps = true;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';

    protected $fillable = [
        'padre_id',
        'nombre',
        'slug',
        'descripcion',
        'icono',
        'es_utilidad_publica',
        'orden',
        'activa',
        'creado_en',
        'actualizado_en',
    ];

    public function padre()
    {
        return $this->belongsTo(Categorias::class, 'padre_id');
    }

    public function hijos()
    {
        return $this->hasMany(Categorias::class, 'padre_id');
    }

    public function negocios()
    {
        return $this->hasMany(Negocios::class, 'categoria_id');
    }

    public function palabrasClaveCategoria()
    {
        return $this->hasMany(Palabras_Clave_Categoria::class, 'categoria_id');
    }
}

