<?php

namespace App\Http\Controllers;

//require __DIR__.'/vendor/autoload.php';

use App\Models\Aluno;
use App\Models\Escola;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AlunosExport;
use App\Exports\AlunosPorEscolaExport;
use Illuminate\Support\Str;



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        /*
        //método retorna TRUE se o usuário está logado e FALSE se não estiver logado
        if(auth()->check()){
            return 'Página de tarefa. Usuário logado';
        } else {
            return 'Não logado no sistema.';
        }
        */
        //$id = auth()->user()->id;
        //$name = auth()->user()->name;
        //$email = auth()->user()->email;

        //return "Usuário logado: Id: $id  | Nome: $name | E-mail: $email";

        return view('aluno.index');
    }

    public function buscar(Request $request)
    {
        $termoBusca = $request->input('busca');
        // Verifica se o termo de busca é numérico (código do aluno)
        if (is_numeric($termoBusca)) {
            $alunos = Aluno::where('codigo', $termoBusca)->get();
        } else {
            // Caso contrário, busca por nome
            $alunos = Aluno::where('nome', 'like', "%$termoBusca%")->get();
        }

        $resultados = [];
        $alunosForaDoIntervalo = false; // Flag para indicar se há alunos fora do intervalo

        foreach ($alunos as $aluno) {
            $dataNascimento = Carbon::parse($aluno->nascimento);
            $idade = $dataNascimento->age;

            if ($idade < 3 || $idade > 6) {

                $aluno->foraDoIntervalo = true;
                $alunosForaDoIntervalo = true;
            }

            $formularios = $aluno->formularios;

            $resultados[] = [
                'aluno' => $aluno,
                'formularios' => $formularios,
            ];
        }

        // Se houver alunos fora do intervalo, redirecione para a view de erro
        if ($alunosForaDoIntervalo) {
            return view('aluno.erros_resultados_busca', compact('resultados', 'idade'));
        }

        // Se nenhum aluno estiver fora do intervalo, retorne a view normal com os resultados
        return view('aluno.resultados_busca', compact('alunos'));
        //return redirect()->route('aluno.buscar', ['page' => $alunos->currentPage()])->with(compact('alunos'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $escolas = Escola::all();
        return view('aluno.create', compact('escolas'));
    }

    /**
     * Store a newly created resource in storage.
     * Armazene um recurso recém-criado no armazenamento.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        $request->validate(
            [
                'nome' => 'required',
                'nascimento' => 'required',
                'sexo' => 'required',
                'filiacao_1' => 'required',
                'filiacao_2' => 'required',
                'celular_contato' => 'required',
                'cep' => 'required',
                'endereco' => 'required',
                'etapa_aluno' => 'required',
                'escola_aluno' => 'required',
                'codigo' => 'required|unique:alunos,codigo',
            ],
            [
                'required' => 'O campo :attribute precisa ser preenchido!',
                'codigo.unique' => 'O código informado já está em uso.',
            ]
        );
        // Verificar se a escola com o ID fornecido existe
        $escolaId = $request->input('escola_aluno');
        $escola = Escola::find($escolaId);

        if (!$escola) {
            // Lidar com o caso em que a escola não é encontrada (por exemplo, redirecionar de volta ao formulário com uma mensagem de erro)
            return redirect()->back()->withErrors(['escola_aluno' => 'Escola não encontrada.']);
        }

        // Associar a escola ao aluno
        $aluno = new Aluno($request->all());
        $aluno->escola()->associate($escola);
        $aluno->save();

        return redirect()->route('aluno.create');
    }

    /**
     * Display the specified resource.
     * Exiba o recurso especificado.
     */
    public function show()
    {
        $alunos = Aluno::with('escola')->paginate(50);
        //dd($alunos);
        return view('aluno.listar', ['alunos' => $alunos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        //
        $escolas = Escola::all();
        return view('aluno.update', compact('aluno', 'escolas'));
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno)
    {
        // Valide os dados recebidos do formulário
        $request->validate([
            'nome' => 'required',
            'nascimento' => 'required',
            'sexo' => 'required',
            'filiacao_1' => 'required',
            'filiacao_2' => 'required',
            'celular_contato' => 'required',
            'cep' => 'required',
            'endereco' => 'required',
            'etapa_aluno' => 'required',
            'escola_aluno' => 'required',
        ]);

        // Verifique se a escola com o ID fornecido existe
        $escolaId = $request->input('escola_aluno');
        $escola = Escola::find($escolaId);

        if (!$escola) {
            // Lidar com o caso em que a escola não é encontrada (por exemplo, redirecionar de volta ao formulário com uma mensagem de erro)
            return redirect()->back()->withErrors(['escola_aluno' => 'Escola não encontrada.']);
        }

        // Atualize os dados do aluno
        $aluno->update($request->all());

        // Associe a escola atualizada ao aluno
        $aluno->escola()->associate($escola);
        $aluno->save();

        return redirect()->route('aluno.show', ['aluno' => $aluno->id])->with('success', "Cadastro do aluno $aluno->nome atualizado com sucesso!");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        //
    }

    public function exportacao()
    {
        // Obtenha todos os alunos do banco de dados
        $alunos = Aluno::with('formularios')->get();

        // Crie uma nova planilha
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Adicione cabeçalhos
        $headers = [
            'Código',
            'Nome',
            'Data de Nascimento',
            'Idade',
            'Data do Teste',
            'Escore',
            'Pontuação Padrão',
            'Resultado do Teste',
            'Sexo',
            'Raça',
            'Filiação 1',
            'Filiação 2',
            'Celular Contato',
            'CEP',
            'Endereço',
            'Etapa Aluno',
            'Escola Aluno'
        ];
        $sheet->fromArray([$headers], null, 'A1');

        // Adicione os dados dos alunos
        $row = 2; // Início dos dados na segunda linha
        foreach ($alunos as $aluno) {
            foreach ($aluno->formularios as $formulario) {
                // Calcula a idade do aluno
                $dataNascimento = Carbon::parse($aluno->nascimento);
                $idade = $dataNascimento->age;

                $data = [
                    $aluno->codigo,
                    $aluno->nome,
                    $dataNascimento->format('d/m/Y'),
                    $idade,
                    $formulario->created_at->format('d/m/Y'),
                    $formulario->escore,
                    $formulario->pontuacao_padrao,
                    $formulario->resultado_teste,
                    $aluno->sexo,
                    $aluno->raca,
                    $aluno->filiacao_1,
                    $aluno->filiacao_2,
                    $aluno->celular_contato,
                    $aluno->cep,
                    $aluno->endereco,
                    $aluno->etapa_aluno,
                    $aluno->escola->nome
                ];

                $sheet->fromArray([$data], null, "A$row");

                $row++;
            }
        }

        // Configurar o cabeçalho de resposta para forçar o download do arquivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="alunos.xlsx"');
        header('Cache-Control: max-age=0');

        // Salvar a planilha em um arquivo temporário
        $writer = new Xlsx($spreadsheet);
        $tempFilePath = tempnam(sys_get_temp_dir(), 'export_');
        $writer->save($tempFilePath);

        // Ler e enviar o arquivo para o navegador
        readfile($tempFilePath);

        // Excluir o arquivo temporário após o download
        unlink($tempFilePath);

        exit(); // Termina a execução do script
    }
    public function exportacaoescola()
    {
        $escolas = Escola::all();
        //dd($escolas);
        return view('aluno.exportacaoescola', compact('escolas'));
    }
    public function exportacaoescolapost(Request $request)
    {
        $escolaId = $request->input('escola_id');
        //dd($escolaId);
        $escola = Escola::find($escolaId);
        //dd($escola);
        if (!$escola) {
            return redirect()->back()->withErrors(['escola_id' => 'Escola não encontrada.']);
        }

        $alunos = Aluno::with('formularios')->where('escola_id', $escolaId)->get();

        // Verificar se não há alunos com testes realizados
        if ($alunos->isEmpty()) {
            return redirect()->back()->withErrors(['nenhum_aluno' => 'Não há alunos com testes realizados para esta escola.']);
        }

        // Crie uma nova planilha
        $spreadsheet = new Spreadsheet();

        // Adicione cabeçalhos
        $headers = [
            'Código',
            'Nome',
            'Data de Nascimento',
            'Idade',
            'Data do Teste',
            'Escore',
            'Pontuação Padrão',
            'Resultado do Teste',
            'Sexo',
            'Raça',
            'Filiação 1',
            'Filiação 2',
            'Celular Contato',
            'CEP',
            'Endereço',
            'Etapa Aluno',
            'Escola Aluno'
        ];
        $spreadsheet->getActiveSheet()->fromArray([$headers], null, 'A1');

        // Adicione os dados dos alunos
        $row = 2; // Início dos dados na segunda linha
        foreach ($alunos as $aluno) {
            foreach ($aluno->formularios as $formulario) {
                // Calcula a idade do aluno
                $dataNascimento = Carbon::parse($aluno->nascimento);
                $idade = $dataNascimento->age;

                $data = [
                    $aluno->codigo,
                    $aluno->nome,
                    $dataNascimento->format('d/m/Y'),
                    $idade,
                    $formulario->created_at->format('d/m/Y'),
                    $formulario->escore,
                    $formulario->pontuacao_padrao,
                    $formulario->resultado_teste,
                    $aluno->sexo,
                    $aluno->raca,
                    $aluno->filiacao_1,
                    $aluno->filiacao_2,
                    $aluno->celular_contato,
                    $aluno->cep,
                    $aluno->endereco,
                    $aluno->etapa_aluno,
                    $aluno->escola->nome
                ];

                $spreadsheet->getActiveSheet()->fromArray([$data], null, "A$row");

                $row++;
            }
        }

        // Configurar o cabeçalho de resposta para forçar o download do arquivo
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="alunos_' . $escola->nome . '.xlsx"');
        header('Cache-Control: max-age=0');

        // Salvar a planilha em um arquivo temporário
        $writer = new Xlsx($spreadsheet);
        $tempFilePath = tempnam(sys_get_temp_dir(), 'export_');
        $writer->save($tempFilePath);

        // Ler e enviar o arquivo para o navegador
        readfile($tempFilePath);

        // Excluir o arquivo temporário após o download
        unlink($tempFilePath);

        exit(); // Termina a execução do script
    }


    /* 
    public function exportacao()
    {
        return Excel::download(new AlunosExport, 'Resultado PCFO Geral.xlsx');
    }

    public function exportacaoescola()
    {
        $escolas = Escola::all();
        //dd($escolas);
        return view('aluno.exportacaoescola', compact('escolas'));
    }

    public function exportacaoescolapost(Request $request)
    {
        // Validar os dados recebidos do formulário
        $request->validate([
            'escola_aluno' => 'required|exists:escolas,id',
        ]);

        // Obter o ID da escola do formulário
        $escolaId = $request->input('escola_aluno');

        // Encontrar a escola com base no ID fornecido
        $escola = Escola::find($escolaId);

        // Verificar se a escola foi encontrada
        if (!$escola) {
            // Se a escola não for encontrada, redirecionar de volta com uma mensagem de erro
            return back()->withErrors(['escola_aluno' => 'Escola não encontrada.']);
        }

        // Iniciar a exportação passando o nome da escola como argumento
        $export = new AlunosPorEscolaExport($escola->nome);

        // Realizar o download do arquivo Excel com os resultados
        return Excel::download($export, 'Resultado PCFO ' . Str::slug($escola->nome) . '.xlsx');
    }
    */
}
