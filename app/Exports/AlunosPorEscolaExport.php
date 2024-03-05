<?php

namespace App\Exports;

use App\Models\Aluno;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class AlunosPorEscolaExport implements FromCollection, WithHeadings, WithStyles, WithColumnFormatting, WithColumnWidths
{
    /**
    * @var string
    */
    protected $escola;

    /**
    * @param string $escola
    */
    public function __construct(string $escola)
    {
        $this->escola = $escola;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Aluno::whereHas('escola', function($query) {
            $query->where('nome', $this->escola);
        })->with('formularios')->get()->flatMap(function ($aluno) {
            return $aluno->formularios->map(function ($formulario) use ($aluno) {
                // Calcula a idade do aluno
                $dataNascimento = \Carbon\Carbon::parse($aluno->nascimento);
                $idade = $dataNascimento->age;

                return [
                    'Código' => $aluno->codigo,
                    'Nome' => $aluno->nome,
                    'Nascimento' => $dataNascimento->format('d/m/Y'), // Formata a data de nascimento
                    'Sexo' => $aluno->sexo,
                    'Raça' => $aluno->raca,
                    'Filiacao 1' => $aluno->filiacao_1,
                    'Filiacao 2' => $aluno->filiacao_2,
                    'Celular Contato' => $aluno->celular_contato,
                    'CEP' => $aluno->cep,
                    'Endereco' => $aluno->endereco,
                    'Etapa Aluno' => $aluno->etapa_aluno,
                    'Escore' => $formulario->escore,
                    'Pontuação Padrão' => $formulario->pontuacao_padrao,
                    'Resultado do Teste' => $formulario->resultado_teste,
                ];
            });
        });
    }

    /**
    * @return array
    */
    public function headings(): array
    {
        return [
            'Código',
            'Nome',
            'Nascimento',
            'Sexo',
            'Raça',
            'Filiacao 1',
            'Filiacao 2',
            'Celular Contato',
            'CEP',
            'Endereco',
            'Etapa Aluno',
            'Escore',
            'Pontuação Padrão',
            'Resultado do Teste'
        ];
    }

    /**
    * @param Worksheet $sheet
    * @return array
    */
    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para a linha de título
            1 => ['font' => ['bold' => true]],
        ];
    }

    /**
    * @return array
    */
    public function columnFormats(): array
    {
        return [
            // Adicione os formatos de coluna conforme necessário
            'A' => '0', // Código
            'B' => '@', // Nome
            'C' => 'dd/mm/yyyy', // Nascimento
            'D' => '@', // Sexo
            'E' => '@', // Raça
            'F' => '@', // Filiacao 1
            'G' => '@', // Filiacao 2
            'H' => '@', // Celular Contato
            'I' => '@', // CEP
            'J' => '@', // Endereco
            'K' => '@', // Etapa Aluno
            'L' => '0.00', // Escore
            'M' => '0.00', // Pontuação Padrão
            'N' => '@', // Resultado do Teste
        ];
    }

    /**
    * @return array
    */
    public function columnWidths(): array
    {
        return [
            'A' => 15, // Código
            'B' => 30, // Nome
            'C' => 15, // Nascimento
            'D' => 10, // Sexo
            'E' => 10, // Raça
            'F' => 30, // Filiacao 1
            'G' => 30, // Filiacao 2
            'H' => 15, // Celular Contato
            'I' => 15, // CEP
            'J' => 40, // Endereco
            'K' => 15, // Etapa Aluno
            'L' => 20, // Escore
            'M' => 20, // Pontuação Padrão
            'N' => 20, // Resultado do Teste
        ];
    }
}
