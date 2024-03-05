@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Lista Geral dos Alunos') }}</div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div>
                        @if (count($alunos) > 0)
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Idade</th>
                                    <th scope="col">Escola</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alunos as $aluno)
                                <tr>
                                    <th scope="row">{{ $aluno->codigo }}</th>
                                    <td>{{ $aluno->nome }}</td>
                                    <td>{{ \Carbon\Carbon::parse($aluno->nascimento)->diffInYears(\Carbon\Carbon::now()) }}</td>
                                    <td>{{ $aluno->escola->nome }}</td>
                                    <td><a href="{{ route('formulario.show', ['aluno' => $aluno->id]) }}">Iniciar Teste</a></td>
                                    <td><a href="{{ route('aluno.edit', ['aluno' => $aluno->id]) }}">Atualizar Aluno</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $alunos->links() }}
                        @else
                        <p>Nenhum aluno encontrado.</p>
                        @endif <!-- Adicione o Formulário de Busca Aqui -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection