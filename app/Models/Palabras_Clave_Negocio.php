<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palabras_Clave_Negocio extends Model
{
    use HasFactory;

    protected $table = 'palabras_clave_negocio';
    public $timestamps = false;
    const CREATED_AT = 'creado_en';

    protected $fillable = [
        'negocio_id',
        'palabra',
        'peso',
        'creado_en',
    ];

    public function negocio()
    {
        return $this->belongsTo(Negocios::class, 'negocio_id');
    }
}

