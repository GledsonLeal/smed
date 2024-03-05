<?php

namespace App\Exports;

use App\Models\Aluno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AlunosExport implements FromCollection, WithHeadings, WithStyles, WithColumnFormatting, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
{
    $alunos = Aluno::with('formularios', 'escola')->get();

    return $alunos->map(function ($aluno) {
        return $aluno->formularios->map(function ($formulario) use ($aluno) {
            // Calcula a idade do aluno
            $dataNascimento = \Carbon\Carbon::parse($aluno->nascimento);
            $idade = $dataNascimento->age;

            return [
                'Código' => $aluno->codigo,
                'Nome' => $aluno->nome,
                'Data de Nascimento' => $dataNascimento->format('d/m/Y'), // Formata a data de nascimento
                'Idade' => $idade, // Idade do aluno
                'Data do Teste' => $formulario->created_at->format('d/m/Y'),
                'Escore' => $formulario->escore,
                'Pontuação Padrão' => $formulario->pontuacao_padrao,
                'Resultado do Teste' => $formulario->resultado_teste,
                'Sexo' => $aluno->sexo,
                'Raça' => $aluno->raca,
                'Filiacao 1' => $aluno->filiacao_1,
                'Filiacao 2' => $aluno->filiacao_2,
                'Celular Contato' => $aluno->celular_contato,
                'CEP' => $aluno->cep,
                'Endereco' => $aluno->endereco,
                'Etapa Aluno' => $aluno->etapa_aluno,
                'Escola Aluno' => $aluno->escola->nome, // Acesso ao nome da escola
            ];
        });
    })->collapse();
    
}

    /*
    
    */
    public function headings(): array
    {
        return [
            'Código',
            'Nome',
            'Nascimento',
            'Idade',
            'Data do Teste',
            'Escore',
            'Pontuação Padrão',
            'Resultado do Teste',
            'Sexo',
            'Raça',
            'Filiação 1',
            'Filiação 2',
            'Contato',
            'CEP',
            'Endereço',
            'Etapa do Aluno',
            'Escola do Aluno',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para a linha de título
            1 => ['font' => ['bold' => true]],
        ];
    }
    
    public function columnFormats(): array
    {
        return [
            // Adicione os formatos de coluna conforme necessário
            'A' => '0', // Código
            'B' => '@', // Nome
            'C' => 'dd/mm/yyyy', // Data de Nascimento
            'D' => '0', // Idade
            'E' => 'Data do Teste',
            'F' => '0.00', // Escore
            'G' => '0.00', // Pontuação Padrão
            'H' => '@', // Resultado do Teste
            'I' => '@', // Sexo
            'J' => '@', // Raça
            'K' => '@', // Filiação 1
            'L' => '@', // Filiação 2
            'M' => '@', // Celular Contato
            'N' => '@', // CEP
            'O' => '@', // Endereço
            'P' => '@', // Etapa Aluno
            'Q' => '@', // Escola Aluno
        ];
    }
    
    
    public function columnWidths(): array
    {
        return [
            'A' => 10, 
            'B' => 30, 
            'C' => 15, 
            'D' => 6, 
            'E' => 15, 
            'F' => 7, 
            'G' => 10, 
            'H' => 10, 
            'I' => 15, 
            'J' => 10, 
            'K' => 30, 
            'L' => 30, 
            'M' => 15, 
            'N' => 15, 
            'O' => 40, 
            'P' => 15,
            'Q' => 30, 
        ];
    }
    
}
