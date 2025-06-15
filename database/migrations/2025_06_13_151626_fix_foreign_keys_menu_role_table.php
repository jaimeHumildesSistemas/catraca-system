<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('menu_role', function (Blueprint $table) {
            // Primeiro, remova as FKs quebradas (se existirem)
            $table->dropForeign(['menu_id']);
            $table->dropForeign(['role_id']);

            // Adicione novamente as FKs corretamente
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('menu_role', function (Blueprint $table) {
            $table->dropForeign(['menu_id']);
            $table->dropForeign(['role_id']);
        });
    }
};
