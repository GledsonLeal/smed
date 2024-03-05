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
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('resposta_sintese_1');
            $table->tinyInteger('resposta_sintese_2');
            $table->tinyInteger('resposta_sintese_3');
            $table->tinyInteger('resposta_sintese_4');
            $table->tinyInteger('resposta_fonemica_5');
            $table->tinyInteger('resposta_fonemica_6');
            $table->tinyInteger('resposta_fonemica_7');
            $table->tinyInteger('resposta_fonemica_8');
            $table->tinyInteger('resposta_rima_9');
            $table->tinyInteger('resposta_rima_10');
            $table->tinyInteger('resposta_rima_11');
            $table->tinyInteger('resposta_rima_12');
            $table->tinyInteger('resposta_alteracao_13');
            $table->tinyInteger('resposta_alteracao_14');
            $table->tinyInteger('resposta_alteracao_15');
            $table->tinyInteger('resposta_alteracao_16');
            $table->tinyInteger('resposta_segmentacao_silabica_17');
            $table->tinyInteger('resposta_segmentacao_silabica_18');
            $table->tinyInteger('resposta_segmentacao_silabica_19');
            $table->tinyInteger('resposta_segmentacao_silabica_20');
            $table->tinyInteger('resposta_segmentacao_fonemica_21');
            $table->tinyInteger('resposta_segmentacao_fonemica_22');
            $table->tinyInteger('resposta_segmentacao_fonemica_23');
            $table->tinyInteger('resposta_segmentacao_fonemica_24');
            $table->tinyInteger('resposta_manipulacao_silabica_25');
            $table->tinyInteger('resposta_manipulacao_silabica_26');
            $table->tinyInteger('resposta_manipulacao_silabica_27');
            $table->tinyInteger('resposta_manipulacao_silabica_28');
            $table->tinyInteger('resposta_manipulacao_fonemica_29');
            $table->tinyInteger('resposta_manipulacao_fonemica_30');
            $table->tinyInteger('resposta_manipulacao_fonemica_31');
            $table->tinyInteger('resposta_manipulacao_fonemica_32');
            $table->tinyInteger('resposta_transposicao_silabica_33');
            $table->tinyInteger('resposta_transposicao_silabica_34');
            $table->tinyInteger('resposta_transposicao_silabica_35');
            $table->tinyInteger('resposta_transposicao_silabica_36');
            $table->tinyInteger('resposta_transposicao_fonemica_37');
            $table->tinyInteger('resposta_transposicao_fonemica_38');
            $table->tinyInteger('resposta_transposicao_fonemica_39');
            $table->tinyInteger('resposta_transposicao_fonemica_40');
            $table->unsignedBigInteger('aluno_id'); // Adiciona a chave estrangeira
            $table->foreign('aluno_id')->references('id')->on('alunos');
  
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
