@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buscar aluno') }}</div>
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
                        <div>
                            <!-- Adicione o Formulário de Busca Aqui -->
                            <form action="{{ route('aluno.buscar') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="busca">Busca pelo código do aluno:</label>
                                    <input type="text" name="busca" class="form-control" placeholder="Digite o código do aluno: ">
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection