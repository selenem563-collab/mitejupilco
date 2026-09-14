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
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('negocio_id');
            $table->smallInteger('dia_semana');
            $table->time('abre_a')->nullable();
            $table->time('cierra_a')->nullable();
            $table->boolean('cerrado')->default(false);
            $table->boolean('abierto_24h')->default(false);
            $table->timestampTz('creado_en')->default(DB::raw("now()"));
            $table->timestampTz('actualizado_en')->default(DB::raw("now()"));

            $table->index(['negocio_id', 'dia_semana'], 'idx_horarios_consulta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
