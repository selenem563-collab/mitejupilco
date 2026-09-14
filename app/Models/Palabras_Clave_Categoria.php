<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palabras_Clave_Categoria extends Model
{
    use HasFactory;

    protected $table = 'palabras_clave_categoria';
    public $timestamps = false;
    const CREATED_AT = 'creado_en';

    protected $fillable = [
        'categoria_id',
        'palabra',
        'creado_en',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }
}

