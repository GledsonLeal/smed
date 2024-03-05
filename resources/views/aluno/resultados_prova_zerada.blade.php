@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Resultados da Prova') }}</div>
                <div class="card-body">
                    Aluno com pontuação zerada.
                    <br>
                    Nome do Aluno: {{ $aluno->nome }}
                    <br>
                    Idade: {{ $idade }} anos
                    <br>
                    Escola: {{ $escola }} 
                    <br>
                    Escore: {{ $escore }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
