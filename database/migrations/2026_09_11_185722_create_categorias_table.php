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
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('padre_id')->nullable()->index('idx_categorias_padre');
            $table->string('nombre', 120);
            $table->string('slug', 120)->unique('categorias_slug_key');
            $table->text('descripcion')->nullable();
            $table->string('icono', 16)->nullable();
            $table->boolean('es_utilidad_publica')->default(false);
            $table->smallInteger('orden')->default(0);
            $table->boolean('activa')->default(true);
            $table->timestampTz('creado_en')->default(DB::raw("now()"));
            $table->timestampTz('actualizado_en')->default(DB::raw("now()"));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
