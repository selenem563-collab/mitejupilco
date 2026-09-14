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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('contacto_id');
            $table->string('id_mensaje_wa', 128)->nullable()->unique('mensajes_id_wa_unico');
            $table->string('tipo', 32)->default('texto');
            $table->text('cuerpo')->nullable();
            $table->jsonb('contenido_crudo')->nullable();
            $table->string('codigo_error', 32)->nullable();
            $table->text('mensaje_error')->nullable();
            $table->timestampTz('creado_en')->default(DB::raw("now()"));
            $table->timestampTz('actualizado_en')->default(DB::raw("now()"));

            $table->index(['contacto_id', 'creado_en'], 'idx_mensajes_contacto');
        });
        DB::statement("alter table \"mensajes\" add column \"direccion\" direccion_mensaje not null");
        DB::statement("alter table \"mensajes\" add column \"estado\" estado_mensaje not null default 'pendiente'");
        DB::statement("create index \"idx_mensajes_estado\" on \"mensajes\" (\"estado\")");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
