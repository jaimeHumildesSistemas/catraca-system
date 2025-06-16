<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
    Schema::create('conferencias', function (Blueprint $table) {
        $table->id();
        $table->foreignId('filial_id')->constrained('filiais')->onDelete('cascade');
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // quem conferiu
        $table->timestamp('data_conferencia')->useCurrent();
        $table->text('observacao')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferencias');
    }
};
