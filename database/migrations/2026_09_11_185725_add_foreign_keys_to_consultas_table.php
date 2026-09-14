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
        Schema::table('consultas', function (Blueprint $table) {
            $table->foreign(['categoria_resuelta_id'], 'consultas_categoria_resuelta_id_fkey')->references(['id'])->on('categorias')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['contacto_id'], 'consultas_contacto_id_fkey')->references(['id'])->on('contactos')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['mensaje_id'], 'consultas_mensaje_id_fkey')->references(['id'])->on('mensajes')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->dropForeign('consultas_categoria_resuelta_id_fkey');
            $table->dropForeign('consultas_contacto_id_fkey');
            $table->dropForeign('consultas_mensaje_id_fkey');
        });
    }
};
