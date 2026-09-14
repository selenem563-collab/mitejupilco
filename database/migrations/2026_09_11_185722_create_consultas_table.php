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
        Schema::create('consultas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contacto_id');
            $table->bigInteger('mensaje_id')->nullable();
            $table->text('texto_original');
            $table->text('texto_normalizado')->nullable()->fulltext('idx_consultas_texto_trgm');
            $table->string('intencion_detectada', 48)->nullable();
            $table->bigInteger('categoria_resuelta_id')->nullable();
            $table->text('palabras_extraidas')->nullable();
            $table->decimal('confianza', 4, 3)->nullable();
            $table->smallInteger('total_resultados')->default(0);
            $table->boolean('tuvo_resultados')->default(false);
            $table->string('estrategia_busqueda', 24)->nullable();
            $table->boolean('uso_ia')->default(false);
            $table->integer('tokens_entrada')->nullable();
            $table->integer('tokens_cache')->nullable();
            $table->integer('tokens_salida')->nullable();
            $table->integer('tiempo_respuesta_ms')->nullable();
            $table->timestampTz('creado_en')->default(DB::raw("now()"))->index('idx_consultas_creado');
            $table->index(['contacto_id', 'creado_en'], 'idx_consultas_contacto');
            $table->index(['tuvo_resultados', 'creado_en'], 'idx_consultas_sin_resultados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};
