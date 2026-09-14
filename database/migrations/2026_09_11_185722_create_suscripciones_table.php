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
        Schema::create('suscripciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('negocio_id')->index('idx_suscripciones_negocio');
            $table->decimal('monto_mxn', 10);
            $table->string('periodo', 16)->default('mensual');
            $table->date('inicia_el');
            $table->date('termina_el')->nullable();
            $table->date('ultimo_pago_el')->nullable();
            $table->text('notas')->nullable();
            $table->timestampTz('creado_en')->default(DB::raw("now()"));
            $table->timestampTz('actualizado_en')->default(DB::raw("now()"));
        });
        DB::statement("alter table \"suscripciones\" add column \"nivel\" nivel_negocio not null");
        DB::statement("alter table \"suscripciones\" add column \"estado\" estado_suscripcion not null default 'activa'");
        DB::statement("create index \"idx_suscripciones_estado\" on \"suscripciones\" (\"estado\", \"termina_el\")");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscripciones');
    }
};
