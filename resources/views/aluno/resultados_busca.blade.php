@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Resultados da Busca por Aluno') }}</div>
                <div class="card-body">
                @if (count($alunos) > 0)
                    <ul>
                        @foreach ($alunos as $aluno)
                            <li>
                                {{ $aluno->nome }} - Código: {{ $aluno->codigo }}
                                <ul>
                                    @foreach ($aluno->formularios as $formulario)
                                        <li>
                                            Data do teste anterior: {{ $formulario->created_at->format('d/m/Y') }} Resultado: {{ $formulario->resultado_teste }} {{-- Substitua pelo nome real dos campos do formulário --}}
                                            {{-- Adicione mais campos conforme necessário --}}
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="{{ route('formulario.show', ['aluno' => $aluno->id]) }}" class="btn btn-primary">Iniciar Teste</a>
                                <a href="{{ route('aluno.edit', ['aluno' => $aluno->id]) }}" class="btn btn-primary">Atualizar Aluno</a>
                            </li>
                        @endforeach
                        
                    </ul>



                @else
                    <p>Nenhum aluno encontrado.</p>
                    <a href="{{ route('aluno.index') }}" class="btn btn-primary">Refazer a busca por aluno</a>
                @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

