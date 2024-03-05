@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Resultados da Busca por Aluno') }}</div>
                <div class="card-body">
                    @if (count($resultados) > 0)
                        <ul>
                            @foreach ($resultados as $resultado)
                                <li>
                                    {{ $resultado['aluno']->nome }} - Código: {{ $resultado['aluno']->codigo }} - O aluno não poderá fazer o teste porque tem {{ $idade }} anos. Por favor, refaça a busca.
                                    <ul>
                                        @foreach ($resultado['formularios'] as $formulario)
                                            <li>
                                                Data do teste anterior: {{ $formulario->created_at->format('d/m/Y') }} Resultado: {{ $formulario->resultado_teste }} {{-- Substitua pelo nome real dos campos do formulário --}}
                                                {{-- Adicione mais campos conforme necessário --}}
                                            </li>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('aluno.index') }}" class="btn btn-primary">Refazer a busca por aluno</a>
                                    <a href="{{ route('aluno.edit', $resultado['aluno']->id) }}" class="btn btn-primary">Atualizar Aluno</a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p>Nenhum aluno encontrado.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

