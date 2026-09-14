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
        Schema::table('palabras_clave_categoria', function (Blueprint $table) {
            $table->foreign(['categoria_id'], 'palabras_clave_categoria_categoria_id_fkey')->references(['id'])->on('categorias')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('palabras_clave_categoria', function (Blueprint $table) {
            $table->dropForeign('palabras_clave_categoria_categoria_id_fkey');
        });
    }
};
