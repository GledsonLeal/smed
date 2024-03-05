<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;
    protected $fillable = [
        'resposta_sintese_1',
        'resposta_sintese_2',
        'resposta_sintese_3',
        'resposta_sintese_4',
        'resposta_fonemica_5',
        'resposta_fonemica_6',
        'resposta_fonemica_7',
        'resposta_fonemica_8',
        'resposta_rima_9',
        'resposta_rima_10',
        'resposta_rima_11',
        'resposta_rima_12',
        'resposta_alteracao_13',
        'resposta_alteracao_14',
        'resposta_alteracao_15',
        'resposta_alteracao_16',
        'resposta_segmentacao_silabica_17',
        'resposta_segmentacao_silabica_18',
        'resposta_segmentacao_silabica_19',
        'resposta_segmentacao_silabica_20',
        'resposta_segmentacao_fonemica_21',
        'resposta_segmentacao_fonemica_22',
        'resposta_segmentacao_fonemica_23',
        'resposta_segmentacao_fonemica_24',
        'resposta_manipulacao_silabica_25',
        'resposta_manipulacao_silabica_26',
        'resposta_manipulacao_silabica_27',
        'resposta_manipulacao_silabica_28',
        'resposta_manipulacao_fonemica_29',
        'resposta_manipulacao_fonemica_30',
        'resposta_manipulacao_fonemica_31',
        'resposta_manipulacao_fonemica_32',
        'resposta_transposicao_silabica_33',
        'resposta_transposicao_silabica_34',
        'resposta_transposicao_silabica_35',
        'resposta_transposicao_silabica_36',
        'resposta_transposicao_fonemica_37',
        'resposta_transposicao_fonemica_38',
        'resposta_transposicao_fonemica_39',
        'resposta_transposicao_fonemica_40',
        'escore',
        'pontuacao_padrao',
        'resultado_teste',
        'aluno_id'        
    ];
    
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

}
