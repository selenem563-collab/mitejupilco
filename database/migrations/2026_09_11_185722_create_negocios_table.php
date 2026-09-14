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
        Schema::create('negocios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->default(DB::raw('uuid_generate_v4()'));
            $table->bigInteger('municipio_id');
            $table->bigInteger('categoria_id')->index('idx_negocios_categoria');
            $table->string('nombre', 160)->fulltext('idx_negocios_nombre_trgm');
            $table->string('slug', 180);
            $table->string('nombre_dueno', 120)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('whatsapp', 20)->nullable();
            $table->boolean('whatsapp_contesta')->default(true);
            $table->text('referencia_ubicacion')->nullable();
            $table->string('direccion')->nullable();
            $table->text('url_mapa')->nullable();
            $table->boolean('va_a_domicilio')->default(false);
            $table->boolean('entrega_a_domicilio')->default(false);
            $table->text('formas_pago')->default('{efectivo}');
            $table->enum('nivel', ['gratis', 'premium', 'destacado'])->default('gratis');
            $table->enum('estado', ['sin_verificar', 'verificado', 'rechazado', 'baja'])->default('sin_verificar'); 
            $table->timestampTz('verificado_en')->nullable()->index('idx_negocios_verificado');
            $table->string('verificado_por', 120)->nullable();
            $table->integer('total_recomendaciones')->default(0);
            $table->text('notas')->nullable();
            $table->text('vector_busqueda')->nullable()->fulltext('idx_negocios_busqueda');
            $table->timestampTz('creado_en')->default(DB::raw("now()"));
            $table->timestampTz('actualizado_en')->default(DB::raw("now()"));
            $table->timestampTz('eliminado_en')->nullable();

            $table->unique(['municipio_id', 'slug'], 'negocios_slug_municipio_unico');
        });
        DB::statement("alter table \"negocios\" add column \"nivel\" nivel_negocio not null default 'gratis'");
        DB::statement("alter table \"negocios\" add column \"estado\" estado_negocio not null default 'sin_verificar'");
        DB::statement("create index \"idx_negocios_estado\" on \"negocios\" (\"estado\")");
        DB::statement("create index \"idx_negocios_nivel\" on \"negocios\" (\"nivel\")");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('negocios');
    }
};
