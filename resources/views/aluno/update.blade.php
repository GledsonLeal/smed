@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Aluno') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('aluno.update', ['aluno' => $aluno->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Coluna 1: Informações Pessoais -->
                            <div class="col-md-">
                                <div class="row mb-3">
                                    <!-- Código e Nome na mesma linha -->
                                    <div class="col-md-3">
                                        <label class="form-label">Código</label>
                                        <input type="text" class="form-control" name="codigo" value="{{ $aluno->codigo }}" disabled>
                                    </div>
                                    <div class="col-md-9">
                                        <label class="form-label">Nome</label>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control @if($errors->has('nome')) is-invalid @endif" value="{{ $aluno->nome }}" name="nome">
                                            @if($errors->has('nome'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('nome') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <!-- Nascimento, Sexo e Raça na mesma linha -->
                                    <div class="col-md-4">
                                        <label class="form-label">Nascimento</label>
                                        <div class="input-group has-validation">
                                            <input type="date" class="form-control @if($errors->has('nascimento')) is-invalid @endif" value="{{ $aluno->nascimento }}" name="nascimento">
                                            @if($errors->has('nascimento'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('nascimento') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Sexo</label>
                                        <div class="input-group has-validation">
                                            <select class="form-select @if($errors->has('sexo')) is-invalid @endif" name="sexo">
                                                <option value="">Selecione</option>
                                                <option value="masculino" {{ $aluno->sexo === 'masculino' ? 'selected' : '' }}>Masculino</option>
                                                <option value="feminino" {{ $aluno->sexo === 'feminino' ? 'selected' : '' }}>Feminino</option>
                                            </select>
                                            @if($errors->has('sexo'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('sexo') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Cor ou Raça</label>
                                        <div class="input-group has-validation">
                                            <select class="form-select @if($errors->has('raca')) is-invalid @endif" name="raca">
                                                <option value="">Selecione</option>
                                                <option value="pardo" {{ $aluno->raca === 'pardo' ? 'selected' : '' }}>Pardo</option>
                                                <option value="branco" {{ $aluno->raca === 'branco' ? 'selected' : '' }}>Branco</option>
                                                <option value="negro" {{ $aluno->raca === 'negro' ? 'selected' : '' }}>Negro</option>
                                                <option value="indigena" {{ $aluno->raca === 'indigena' ? 'selected' : '' }}>Indígena</option>
                                                <option value="amarelo" {{ $aluno->raca === 'amarelo' ? 'selected' : '' }}>Amarelo</option>
                                            </select>
                                            @if($errors->has('raca'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('raca') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4"> <!-- Linha horizontal -->

                        <!-- Coluna 2: Informações de Filiação e Contato -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Filiação 1</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('filiacao_1')) is-invalid @endif" value="{{ $aluno->filiacao_1 }}" name="filiacao_1">
                                        @if($errors->has('filiacao_1'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('filiacao_1') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Filiação 2</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('filiacao_2')) is-invalid @endif" value="{{ $aluno->filiacao_2 }}" name="filiacao_2">
                                        @if($errors->has('filiacao_2'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('filiacao_2') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Celular do Contato</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('celular_contato')) is-invalid @endif" value="{{ $aluno->celular_contato }}" name="celular_contato" id="celular_contato">
                                        @if($errors->has('celular_contato'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('celular_contato') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4"> <!-- Linha horizontal -->

                        <!-- Coluna 3: Informações de Endereço -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">CEP</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('cep')) is-invalid @endif" value="{{ $aluno->cep }}" name="cep" id="cep">
                                        @if($errors->has('cep'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('cep') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Endereço</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('endereco')) is-invalid @endif" value="{{ $aluno->endereco }}" name="endereco">
                                        @if($errors->has('endereco'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('endereco') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4"> <!-- Linha horizontal -->

                        <!-- Coluna 4: Informações Acadêmicas -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Etapa do Aluno</label>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('etapa_aluno')) is-invalid @endif" value="{{ $aluno->etapa_aluno }}" name="etapa_aluno">
                                        @if($errors->has('etapa_aluno'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('etapa_aluno') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Escola do Aluno</label>
                                    <div class="input-group has-validation">
                                        <select class="form-select @if($errors->has('escola_aluno')) is-invalid @endif" name="escola_aluno">
                                            <option value="">Selecione</option>
                                            @foreach($escolas as $escola)
                                            <option value="{{ $escola->id }}" {{ $escola->id === $aluno->escola->id ? 'selected' : '' }}>{{ $escola->nome }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('escola_aluno'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('escola_aluno') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Função para formatar o número do celular
    function formatarCelular(celular) {
        const regex = /^(\d{2})(\d{5})(\d{4})$/;
        return celular.replace(regex, '($1) $2-$3');
    }

    // Adiciona um ouvinte de evento ao campo de entrada
    document.getElementById('celular_contato').addEventListener('input', function(event) {
        // Obtém o valor atual do campo
        let valorAtual = event.target.value;

        // Remove caracteres não numéricos
        valorAtual = valorAtual.replace(/\D/g, '');

        // Formata o número do celular
        const celularFormatado = formatarCelular(valorAtual);

        // Atualiza o valor do campo com o número formatado
        event.target.value = celularFormatado;
    });

    // Função para formatar o CEP
    function formatarCep(cep) {
        const regex = /^(\d{5})(\d{3})$/;
        return cep.replace(regex, '$1-$2');
    }

    // Adiciona um ouvinte de evento ao campo de entrada
    document.getElementById('cep').addEventListener('input', function(event) {
        // Obtém o valor atual do campo
        let valorAtual = event.target.value;

        // Remove caracteres não numéricos
        valorAtual = valorAtual.replace(/\D/g, '');

        // Formata o CEP
        const cepFormatado = formatarCep(valorAtual);

        // Atualiza o valor do campo com o CEP formatado
        event.target.value = cepFormatado;
    });
</script>
@endsection
