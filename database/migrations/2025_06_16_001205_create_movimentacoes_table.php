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
    Schema::create('movimentacoes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // colaborador
        $table->enum('tipo', ['entrada', 'saida']); // tipo da movimentação
        $table->decimal('valor', 10, 2); // valor da movimentação
        $table->string('descricao'); // descrição do motivo
        $table->timestamp('data')->useCurrent(); // data do lançamento
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacoes');
    }
};
