<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('negocios', function (Blueprint $table) {
            $table->foreign(['categoria_id'], 'negocios_categoria_id_fkey')->references(['id'])->on('categorias')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['municipio_id'], 'negocios_municipio_id_fkey')->references(['id'])->on('municipios')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('negocios', function (Blueprint $table) {
            $table->dropForeign('negocios_categoria_id_fkey');
            $table->dropForeign('negocios_municipio_id_fkey');
        });
    }
};
