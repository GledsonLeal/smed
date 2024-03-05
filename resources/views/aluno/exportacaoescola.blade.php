@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Exportar resultados por escola') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div>
                        <div>
                            <form method="post" action="{{ route('aluno.exportacaoescolapost') }}">
                                @csrf
                                <!-- Adicione o Formulário de Busca Aqui -->

                                <div class="form-group">
                                    <label for="escola_id">Selecione a escola:</label>
                                    <select class="form-control" id="escola_id" name="escola_id">
                                        <option value="">Selecione a Escola</option>
                                        @foreach($escolas as $escola)
                                        <option value="{{ $escola->id }}">{{ $escola->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-primary">Exportar</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection