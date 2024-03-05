<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('codigo')->unique();
            $table->string('nome');
            $table->date('nascimento');
            $table->string('sexo');
            $table->string('raca');
            $table->string('filiacao_1');
            $table->string('filiacao_2');
            $table->string('celular_contato', 15);
            $table->string('cep');
            $table->string('endereco');
            $table->string('etapa_aluno');
            $table->string('escola_aluno');
            $table->unsignedBigInteger('escola_id'); // Adiciona a chave estrangeira
            $table->foreign('escola_id')->references('id')->on('escolas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
