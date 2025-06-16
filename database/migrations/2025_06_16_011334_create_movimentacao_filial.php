<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filial_id')->constrained('filiais')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('valor', 10, 2);
            $table->string('tipo_pagamento'); // ex: dinheiro, pix, cartão
            $table->string('bandeira')->nullable(); // ex: visa, master, amex
            $table->string('descricao')->nullable();
            $table->timestamp('data_movimentacao')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('movimentacoes');
    }
};

