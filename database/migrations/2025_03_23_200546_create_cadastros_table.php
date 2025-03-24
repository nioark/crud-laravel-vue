<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Faker\Factory;


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

        
        // seed cadastros table with 50 records
        $faker = Factory::create('pt_BR');
        $nomes = ['Ana', 'Pedro', 'Maria', 'João', 'Felipe', 'Sofia', 'Luiza', 'Gabriel', 'Benedita', 'Eduardo', 'Leticia', 'Paulo', 'Clarice', 'Rafael', 'Adriana', 'Bruno'];
        $sobrenomes = ['Silva', 'Santos', 'Oliveira', 'Pereira', 'Rodrigues', 'Almeida', 'Melo', 'Carvalho', 'Duarte', 'Gomes', 'Fernandes', 'Costa', 'Batista', 'Lima', 'Mendes', 'Martins', 'Farias', 'Pinto'];
        $tipos = ['cpf', 'cnpj'];
        $empresas = ['Tech Solutions', 'Comércio XYZ', 'Construtora ABC', 'Indústria Brasileira', 'Logística Express', 'Consultoria Financeira', 'AgroTech', 'Móveis Modernos', 'Engenharia e Serviços', 'Marketing Digital Pro'];
        $dados = [];
        
        foreach (range(1, 50) as $i) {
            $tipo = $faker->randomElement($tipos);
            
            if ($tipo === 'cpf') {
                $nome = $faker->randomElement($nomes) . ' ' . $faker->randomElement($sobrenomes);
                $cpf_cnpj = $faker->cpf(true);
            } else {
                $nome = $faker->randomElement($empresas);
                $cpf_cnpj = $faker->cnpj(true);
            }
            
            $dados[] = [
                'nome' => $nome,
                'cpf_cnpj' => $cpf_cnpj,
                'telefone' => $faker->phoneNumber(),
                'email' => $faker->email(),
                'tipo' => $tipo,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        
        DB::table('cadastros')->insert($dados);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastros');
    }
};
