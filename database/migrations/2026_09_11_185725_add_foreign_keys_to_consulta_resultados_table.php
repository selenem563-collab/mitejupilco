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
        Schema::table('consulta_resultados', function (Blueprint $table) {
            $table->foreign(['consulta_id'], 'consulta_resultados_consulta_id_fkey')->references(['id'])->on('consultas')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['negocio_id'], 'consulta_resultados_negocio_id_fkey')->references(['id'])->on('negocios')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consulta_resultados', function (Blueprint $table) {
            $table->dropForeign('consulta_resultados_consulta_id_fkey');
            $table->dropForeign('consulta_resultados_negocio_id_fkey');
        });
    }
};
