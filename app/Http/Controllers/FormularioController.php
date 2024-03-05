<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Formulario;
use App\Models\Pontuacao;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.

     * > php artisan make:controller --resource FormularioController --model=Formulario
     * --resource vai criar os métodos para CRUD
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('formulario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'resposta_sintese_1' => 'required|numeric|in:0,1',
            'resposta_sintese_2' => 'required|numeric|in:0,1',
            'resposta_sintese_3' => 'required|numeric|in:0,1',
            'resposta_sintese_4' => 'required|numeric|in:0,1',
            'resposta_fonemica_5' => 'required|numeric|in:0,1',
            'resposta_fonemica_6' => 'required|numeric|in:0,1',
            'resposta_fonemica_7' => 'required|numeric|in:0,1',
            'resposta_fonemica_8' => 'required|numeric|in:0,1',
            'resposta_rima_9' => 'required|numeric|in:0,1',
            'resposta_rima_10' => 'required|numeric|in:0,1',
            'resposta_rima_11' => 'required|numeric|in:0,1',
            'resposta_rima_12' => 'required|numeric|in:0,1',
            'resposta_alteracao_13' => 'required|numeric|in:0,1',
            'resposta_alteracao_14' => 'required|numeric|in:0,1',
            'resposta_alteracao_15' => 'required|numeric|in:0,1',
            'resposta_alteracao_16' => 'required|numeric|in:0,1',
            'resposta_segmentacao_silabica_17' => 'required|numeric|in:0,1',
            'resposta_segmentacao_silabica_18' => 'required|numeric|in:0,1',
            'resposta_segmentacao_silabica_19' => 'required|numeric|in:0,1',
            'resposta_segmentacao_silabica_20' => 'required|numeric|in:0,1',
            'resposta_segmentacao_fonemica_21' => 'required|numeric|in:0,1',
            'resposta_segmentacao_fonemica_22' => 'required|numeric|in:0,1',
            'resposta_segmentacao_fonemica_23' => 'required|numeric|in:0,1',
            'resposta_segmentacao_fonemica_24' => 'required|numeric|in:0,1',
            'resposta_manipulacao_silabica_25' => 'required|numeric|in:0,1',
            'resposta_manipulacao_silabica_26' => 'required|numeric|in:0,1',
            'resposta_manipulacao_silabica_27' => 'required|numeric|in:0,1',
            'resposta_manipulacao_silabica_28' => 'required|numeric|in:0,1',
            'resposta_manipulacao_fonemica_29' => 'required|numeric|in:0,1',
            'resposta_manipulacao_fonemica_30' => 'required|numeric|in:0,1',
            'resposta_manipulacao_fonemica_31' => 'required|numeric|in:0,1',
            'resposta_manipulacao_fonemica_32' => 'required|numeric|in:0,1',
            'resposta_transposicao_silabica_33' => 'required|numeric|in:0,1',
            'resposta_transposicao_silabica_34' => 'required|numeric|in:0,1',
            'resposta_transposicao_silabica_35' => 'required|numeric|in:0,1',
            'resposta_transposicao_silabica_36' => 'required|numeric|in:0,1',
            'resposta_transposicao_fonemica_37' => 'required|numeric|in:0,1',
            'resposta_transposicao_fonemica_38' => 'required|numeric|in:0,1',
            'resposta_transposicao_fonemica_39' => 'required|numeric|in:0,1',
            'resposta_transposicao_fonemica_40' => 'required|numeric|in:0,1',
        ],
        [
            'required'=>'O campo :attribute precisa ser preenchido!',
            'numeric' => 'O campo :attribute precisa ser 0 ou 1!',
            'in' => 'O campo :attribute precisa ser 0 ou 1!'
        ]);

        $values = $request->only([
            'resposta_sintese_1', 'resposta_sintese_2', 'resposta_sintese_3', 'resposta_sintese_4',
            'resposta_fonemica_5', 'resposta_fonemica_6', 'resposta_fonemica_7', 'resposta_fonemica_8',
            'resposta_rima_9', 'resposta_rima_10', 'resposta_rima_11', 'resposta_rima_12',
            'resposta_alteracao_13', 'resposta_alteracao_14', 'resposta_alteracao_15', 'resposta_alteracao_16',
            'resposta_segmentacao_silabica_17', 'resposta_segmentacao_silabica_18', 'resposta_segmentacao_silabica_19', 'resposta_segmentacao_silabica_20',
            'resposta_segmentacao_fonemica_21', 'resposta_segmentacao_fonemica_22', 'resposta_segmentacao_fonemica_23', 'resposta_segmentacao_fonemica_24',
            'resposta_manipulacao_silabica_25', 'resposta_manipulacao_silabica_26', 'resposta_manipulacao_silabica_27', 'resposta_manipulacao_silabica_28',
            'resposta_manipulacao_fonemica_29', 'resposta_manipulacao_fonemica_30', 'resposta_manipulacao_fonemica_31', 'resposta_manipulacao_fonemica_32',
            'resposta_transposicao_silabica_33', 'resposta_transposicao_silabica_34', 'resposta_transposicao_silabica_35', 'resposta_transposicao_silabica_36',
            'resposta_transposicao_fonemica_37', 'resposta_transposicao_fonemica_38', 'resposta_transposicao_fonemica_39', 'resposta_transposicao_fonemica_40',
        ]);

        // Somar os valores
        $escore = array_sum($values);
        //dd($escore);
        $alunoId = $request->input('aluno');

        $aluno = Aluno::find($alunoId);

        $alunoEscola = $aluno->escola;
        $alunoEscolaNome = $alunoEscola->nome;
        //dd($aluno->nome);
        // Calcular a idade com base na data de nascimento
        $dataNascimento = Carbon::parse($aluno->nascimento);
        $idade = $dataNascimento->age;
        //dd($idade);

        if($escore == 0){
            return view('aluno.resultados_prova_zerada', [
                'aluno' => $aluno,
                'escore' => $escore,
                'idade' => $idade,
                'escola'=> $alunoEscolaNome
            ]);
        }

        $LinhaTabela = Pontuacao::find($escore);
        //dd($LinhaTabela);

        if($LinhaTabela){
            $idadeTres = $LinhaTabela->tres;
            $idadeQuatro = $LinhaTabela->quatro;
            $idadeCinco = $LinhaTabela->cinco;
            $idadeSeis = $LinhaTabela->seis;
        }
        //dd($idadeTres, $idadeQuatro, $idadeCinco, $idadeSeis);
        if($idade == 5) $pontuacaoPadrao = $idadeCinco;

        elseif($idade == 6) $pontuacaoPadrao = $idadeSeis;

        elseif($idade == 4) $pontuacaoPadrao = $idadeQuatro;

        elseif($idade == 3) $pontuacaoPadrao = $idadeTres;

        elseif($idade != 3 && $idade != 4 && $idade != 5 && $idade != 6) $pontuacaoPadrao = 'idade não confere';
        //dd($pontuacaoPadrao);
        //dd($pontuacaoPadrao, $idade);
        if($pontuacaoPadrao < 70) $resultadoTeste = 'muito baixa';

        if($pontuacaoPadrao >= 70 && $pontuacaoPadrao <= 84) $resultadoTeste = 'baixa';

        if($pontuacaoPadrao >= 85 && $pontuacaoPadrao <= 114) $resultadoTeste = 'média';

        if($pontuacaoPadrao >= 115 && $pontuacaoPadrao <= 129) $resultadoTeste = 'alta';

        if($pontuacaoPadrao >= 130) $resultadoTeste = 'muito alta';

        $dadosRequest = $request->all();
        $dadosAdicionais = [
            'escore'=>$escore,
            'pontuacao_padrao' => $pontuacaoPadrao,
            'resultado_teste' => $resultadoTeste,
            'aluno_id' => $alunoId
        ];

        $dadosCompletos = array_merge($dadosRequest, $dadosAdicionais);
        //dd($dadosCompletos);
        Formulario::create($dadosCompletos);


        return view('aluno.resultados_prova', [
            'aluno' => $aluno,
            'escore' => $escore,
            'idade' => $idade,
            'pontuacaoPadrao' => $pontuacaoPadrao,
            'resultadoTeste' => $resultadoTeste,
            'escola'=> $alunoEscolaNome,
            'success' => 'Prova realizada com sucesso!'
        ])->with('success', 'Prova realizada com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show($alunoId)
    {
        // Recupere os detalhes do aluno com base em $alunoId
        $aluno = Aluno::find($alunoId);
        $alunoEscola = $aluno->escola;
        $alunoEscolaNome = $alunoEscola->nome;


        // Passe os detalhes do aluno para a view
        return view('formulario.create', ['aluno' => $aluno, 'escola'=>$alunoEscolaNome]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formulario $formulario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formulario $formulario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formulario $formulario)
    {
        //
    }
}
