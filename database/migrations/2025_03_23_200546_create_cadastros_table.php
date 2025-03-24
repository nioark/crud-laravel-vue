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
        Schema::create('cadastros', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255); // 'nome' field
            $table->string('cpf_cnpj', 18)->unique(); // 'cpf_cnpj' field, max length 18 for CPF/CNPJ
            $table->enum('tipo', ['cpf', 'cnpj']); // 'tipo' field with only two options: 'cpf' or 'cnpj'
            $table->string('telefone', 20)->nullable(); // 'telefone' field (nullable)
            $table->string('email', 255)->nullable(); // 'email' field (nullable)
            $table->timestamps(); // created_at and updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastros');
    }
};
