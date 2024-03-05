@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bem vindo ao teste!') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center" style="height: 300px;">
                    <!-- Adicionando a imagem aqui -->
                    <img src="{{ asset('img/Design_a_playful_logo_for_an_assessment_to_be_a__2_-removebg.png') }}" alt="Descrição da imagem" style="width: 30%;" class="mx-auto">
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="text-align: justify;">
                        <strong>A Prova de Consciência Fonológica</strong> <br><br>
                        A Prova de Consciência Fonológica (ou PCF) foi desenvolvida para avaliar a habilidade das crianças de manipular os sons da fala. Baseia-se no Teste de Consciência Fonológica, de Santos e Pereira (no prelo) e no teste Sound Linkage, desenvolvido por Hatcher (1994). A PCF é composta por dez subtestes, sendo que cada um deles é composto por quatro itens. Cada subteste é composto ainda por dois exemplos iniciais em que o aplicador explica à criança o que deve ser feito, e corrige sua resposta caso seja incorreta. O resultado das crianças na PCF é aqui apresentado como escore ou freqüência de acertos, sendo que o máximo possível era de 40 acertos.
                        <br>
                        Referência: <a href="https://www.researchgate.net/publication/288347387_Prova_de_Consciencia_Fonologica_Desenvolvimento_de_dez_habilidades_da_pre-escola_a_segunda_serie" target="_blank"> Capovilla, A. G. S. & Capovilla, F. C. (1998). Prova de
                        Consciência Fonológica: desenvolvimento de dez
                        habilidades da pré-escola à segunda série. <em>Temas sobre
                        Desenvolvimento</em>, 7(37), 14-20.
                    </div>
                    <div>
                    <br>
                        <a href="{{ route('aluno.index') }}" class="btn btn-primary">Buscar aluno</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
