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
        Schema::create('contactos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->default(DB::raw('uuid_generate_v4()'));
            $table->string('telefono_wa', 20)->unique('contactos_telefono_wa_unico');
            $table->string('nombre_perfil_wa', 120)->nullable();
            $table->string('nombre', 80)->nullable();
            $table->smallInteger('intentos_nombre')->default(0);
            $table->text('consulta_pendiente')->nullable();
            $table->bigInteger('municipio_id')->nullable();
            $table->timestampTz('aviso_privacidad_enviado_en')->nullable();
            $table->timestampTz('baja_solicitada_en')->nullable();
            $table->timestampTz('primer_contacto_en')->default(DB::raw("now()"));
            $table->timestampTz('ultimo_contacto_en')->default(DB::raw("now()"))->index('idx_contactos_ultimo_contacto');
            $table->integer('total_consultas')->default(0);
            $table->timestampTz('creado_en')->default(DB::raw("now()"));
            $table->timestampTz('actualizado_en')->default(DB::raw("now()"));
        });
        DB::statement("alter table \"contactos\" add column \"estado\" estado_contacto not null default 'nuevo'");
        DB::statement("create index \"idx_contactos_estado\" on \"contactos\" (\"estado\")");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
