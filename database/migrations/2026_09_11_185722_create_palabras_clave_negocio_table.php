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
        Schema::create('palabras_clave_negocio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('negocio_id');
            $table->string('palabra', 80)->index('idx_palabras_negocio_palabra');
            $table->smallInteger('peso')->default(1);
            $table->timestampTz('creado_en')->default(DB::raw("now()"));

            $table->fullText(['palabra'], 'idx_palabras_negocio_trgm');
            $table->unique(['negocio_id', 'palabra'], 'palabras_clave_negocio_unico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palabras_clave_negocio');
    }
};
