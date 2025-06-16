<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('formas_pagamento', function (Blueprint $table) {
            $table->id();
            $table->string('descricao'); // Ex: Dinheiro, Pix, Cartão Visa
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('formas_pagamento');
    }
};
