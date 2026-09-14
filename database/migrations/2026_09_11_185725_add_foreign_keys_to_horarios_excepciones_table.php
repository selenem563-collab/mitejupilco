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
        Schema::table('horarios_excepciones', function (Blueprint $table) {
            $table->foreign(['negocio_id'], 'horarios_excepciones_negocio_id_fkey')->references(['id'])->on('negocios')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('horarios_excepciones', function (Blueprint $table) {
            $table->dropForeign('horarios_excepciones_negocio_id_fkey');
        });
    }
};
