<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('palabras_clave_categoria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('categoria_id');
            $table->string('palabra', 80)->index('idx_palabras_categoria_palabra');
            $table->timestampTz('creado_en')->default(DB::raw("now()"));

            $table->unique(['categoria_id', 'palabra'], 'palabras_clave_categoria_unico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palabras_clave_categoria');
    }
};
