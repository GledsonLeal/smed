@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Resultados da Prova') }}</div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    Nome do Aluno: {{ $aluno->nome }}
                    <br>
                    Idade: {{ $idade }} anos
                    <br>
                    Escola: {{ $escola }}
                    <br>
                    Escore: {{ $escore }}
                    <br>
                    Pontuação Padrão: {{ $pontuacaoPadrao }}
                    <br>
                    Resultado do Teste: {{ $resultadoTeste }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection