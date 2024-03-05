<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formulario;

class Aluno extends Model
{
    /*
    1º - criar a migration: php artisan make:migration create_alunos_table
    2º - lá no arquivo migration, criar a tabela
    3º - dar o php artisan migrate
    4º - php artisan make:controller --resource AlunoController --model=Aluno
    */
    use HasFactory;
    protected $fillable = [
            'codigo',
            'nome',
            'nascimento',
            'sexo',
            'raca',
            'filiacao_1',
            'filiacao_2',
            'celular_contato',
            'cep',
            'endereco',
            'etapa_aluno',
            'escola_aluno',
    ];
    protected $dates = ['nascimento'];
    public function escola()
    {
        return $this->belongsTo(Escola::class);
    }
    public function formularios()
    {
        return $this->hasMany(Formulario::class);
    }
}
