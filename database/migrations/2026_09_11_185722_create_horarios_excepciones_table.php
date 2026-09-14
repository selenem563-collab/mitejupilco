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
        Schema::create('horarios_excepciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('negocio_id');
            $table->date('fecha');
            $table->boolean('cerrado')->default(true);
            $table->time('abre_a')->nullable();
            $table->time('cierra_a')->nullable();
            $table->string('motivo', 160)->nullable();
            $table->timestampTz('creado_en')->default(DB::raw("now()"));

            $table->unique(['negocio_id', 'fecha'], 'horarios_excepciones_unico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_excepciones');
    }
};
