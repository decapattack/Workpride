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
        Schema::create('tipos_usuarios', function (Blueprint $table) {
            $table->id();
            // Cria a coluna para a chave estrangeira e a restrição
            // Isso garante que cada 'usuario_id' aqui deve existir na tabela 'users'
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Cria a coluna 'tipo_usuario' como VARCHAR(100)
            $table->string('tipo_usuario', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_usuarios');
    }
};
