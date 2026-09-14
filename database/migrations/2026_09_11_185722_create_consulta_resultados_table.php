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
        Schema::create('consulta_resultados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('consulta_id');
            $table->bigInteger('negocio_id');
            $table->smallInteger('posicion');
            $table->decimal('puntaje', 6, 3)->nullable();
            $table->timestampTz('creado_en')->default(DB::raw("now()"));
            $table->unique(['consulta_id', 'negocio_id'], 'consulta_resultados_unico');
            $table->index(['negocio_id', 'creado_en'], 'idx_consulta_resultados_negocio');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta_resultados');
    }
};
