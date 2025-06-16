<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('filial_id')->constrained('filiais');
            $table->foreignId('forma_pagamento_id')->constrained('formas_pagamento');
            $table->enum('tipo', ['entrada', 'saida']);
            $table->decimal('valor', 10, 2);
            $table->text('descricao')->nullable();
            $table->timestamp('data_movimentacao');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('movimentacoes');
    }
};
