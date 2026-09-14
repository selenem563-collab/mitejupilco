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
        Schema::table('palabras_clave_negocio', function (Blueprint $table) {
            $table->foreign(['negocio_id'], 'palabras_clave_negocio_negocio_id_fkey')->references(['id'])->on('negocios')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('palabras_clave_negocio', function (Blueprint $table) {
            $table->dropForeign('palabras_clave_negocio_negocio_id_fkey');
        });
    }
};
