@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Teste') }}
                    <div>
                        Aluno: {{ $aluno->nome }}
                    </div>
                    <div>
                        Escola: {{$escola}}
                    </div>
                    
                </div>
                
                
                <div class="card-body">
                    <form method="POST" action="{{ route('formulario.store') }}">
                        <input type="hidden" name="aluno" value="{{ $aluno->id }}">
                    @csrf
                        <div class="table-responsive">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>Síntese Silábica</th>
                                        <th>Resposta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1. lan - che</td>
                                        <td class="text-right">
                                            <div class="input-group has-validation">
                                                <input class="form-control @if($errors->has('resposta_sintese_1')) is-invalid @endif" type="text" value="{{ old('resposta_sintese_1') }}" name="resposta_sintese_1">
                                                @if($errors->has('resposta_sintese_1'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('resposta_sintese_1') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                    <tr>
                                    <td>2. ca - ne - ta</td>
                                    <td class="text-right">
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_sintese_2')) is-invalid @endif" type="text" value="{{ old('resposta_sintese_2') }}" name="resposta_sintese_2">
                                            @if($errors->has('resposta_sintese_2'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_sintese_2') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>3. pe - dra</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_sintese_3')) is-invalid @endif" type="text" value="{{ old('resposta_sintese_3') }}" name="resposta_sintese_3">
                                            @if($errors->has('resposta_sintese_3'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_sintese_3') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4. bi - ci - cle - ta</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_sintese_4')) is-invalid @endif" type="text" value="{{ old('resposta_sintese_4') }}" name="resposta_sintese_4">
                                            @if($errors->has('resposta_sintese_4'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_sintese_4') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                            <table class="table" style="border-spacing: 0">
                                <thead>
                                    <tr>
                                        <th>Síntese Fonêmica</th>
                                        <th class="text-right">Resposta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Linha 4 -->
                                <tr>
                                    <td>5. s - ó</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_fonemica_5')) is-invalid @endif" type="text" value="{{ old('resposta_fonemica_5') }}" name="resposta_fonemica_5">
                                            @if($errors->has('resposta_fonemica_5'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_fonemica_5') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Linha 5 -->
                                <tr>
                                    <td>6. m - ãe</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_fonemica_6')) is-invalid @endif" type="text" value="{{ old('resposta_fonemica_6') }}" name="resposta_fonemica_6">
                                            @if($errors->has('resposta_fonemica_6'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_fonemica_6') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Linha 6 -->
                                <tr>
                                    <td>7. g - a - t - o</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_fonemica_7')) is-invalid @endif" type="text" value="{{ old('resposta_fonemica_7') }}" name="resposta_fonemica_7">
                                            @if($errors->has('resposta_fonemica_7'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_fonemica_7') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Linha 7 -->
                                <tr>
                                    <td>8. c - a - rr - o</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_fonemica_8')) is-invalid @endif" type="text" value="{{ old('resposta_fonemica_8') }}" name="resposta_fonemica_8">
                                            @if($errors->has('resposta_fonemica_8'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_fonemica_8') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                            <table class="table" style="border-spacing: 0">
                                <thead>
                                    <tr>
                                        <th>Rima</th>
                                        <th class="text-right">Resposta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- Linha 8 -->
                                <tr>
                                    <td>9. mão - pão - só</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_rima_9')) is-invalid @endif" type="text" value="{{ old('resposta_rima_9') }}" name="resposta_rima_9">
                                            @if($errors->has('resposta_rima_9'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_rima_9') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Linha 9 -->
                                <tr>
                                    <td>10. queijo - moça - beijo</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_rima_10')) is-invalid @endif" type="text" value="{{ old('resposta_rima_10') }}" name="resposta_rima_10">
                                            @if($errors->has('resposta_rima_10'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_rima_10') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Linha 10 -->
                                <tr>
                                    <td>11. peito - rolha - bolha</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_rima_11')) is-invalid @endif" type="text" value="{{ old('resposta_rima_11') }}" name="resposta_rima_11">
                                            @if($errors->has('resposta_rima_11'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_rima_11') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Linha 11 -->
                                <tr>
                                    <td>12. até - bola - sopé</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_rima_12')) is-invalid @endif" type="text" value="{{ old('resposta_rima_12') }}" name="resposta_rima_12">
                                            @if($errors->has('resposta_rima_12'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_rima_12') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                </tbody>
                            </table>

                            <table class="table" style="border-spacing: 0">
                                <thead>
                                    <tr>
                                        <th>Aliteração</th>
                                        <th>Resposta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <!-- Linha 12 -->
                                <tr>
                                    <td>13. boné - rato - raiz</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_alteracao_13')) is-invalid @endif" type="text" value="{{ old('resposta_alteracao_13') }}" name="resposta_alteracao_13">
                                            @if($errors->has('resposta_alteracao_13'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_alteracao_13') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Linha 13 -->
                                <tr>
                                    <td>14. colar - fada - coelho</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_alteracao_14')) is-invalid @endif" type="text" value="{{ old('resposta_alteracao_14') }}" name="resposta_alteracao_14">
                                            @if($errors->has('resposta_alteracao_14'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_alteracao_14') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Linha 14 -->
                                <tr>
                                    <td>15. inveja - inchar - união</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_alteracao_15')) is-invalid @endif" type="text" value="{{ old('resposta_alteracao_15') }}" name="resposta_alteracao_15">
                                            @if($errors->has('resposta_alteracao_15'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_alteracao_15') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <!-- Linha 15 -->
                                <tr>
                                    <td>16. trabalho - mesa - trazer</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input class="form-control @if($errors->has('resposta_alteracao_16')) is-invalid @endif" type="text" value="{{ old('resposta_alteracao_16') }}" name="resposta_alteracao_16">
                                            @if($errors->has('resposta_alteracao_16'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_alteracao_16') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Segmentação Silábica</th>
                                        <th>Resposta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td>17. bola</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_segmentacao_silabica_17')) is-invalid @endif" value="{{ old('resposta_segmentacao_silabica_17') }}" name="resposta_segmentacao_silabica_17">
                                        @if($errors->has('resposta_segmentacao_silabica_17'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_segmentacao_silabica_17') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>18. lápis</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_segmentacao_silabica_18')) is-invalid @endif" value="{{ old('resposta_segmentacao_silabica_18') }}" name="resposta_segmentacao_silabica_18">
                                        @if($errors->has('resposta_segmentacao_silabica_18'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_segmentacao_silabica_18') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>19. fazenda</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_segmentacao_silabica_19')) is-invalid @endif" value="{{ old('resposta_segmentacao_silabica_19') }}" name="resposta_segmentacao_silabica_19">
                                        @if($errors->has('resposta_segmentacao_silabica_19'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_segmentacao_silabica_19') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>20. gelatina</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_segmentacao_silabica_20')) is-invalid @endif" value="{{ old('resposta_segmentacao_silabica_20') }}" name="resposta_segmentacao_silabica_20">
                                        @if($errors->has('resposta_segmentacao_silabica_20'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_segmentacao_silabica_20') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                                </tbody>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Segmentação Fonêmica</th>
                                        <th>Resposta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <td>21. pé</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_segmentacao_fonemica_21')) is-invalid @endif" value="{{ old('resposta_segmentacao_fonemica_21') }}" name="resposta_segmentacao_fonemica_21">
                                        @if($errors->has('resposta_segmentacao_fonemica_21'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_segmentacao_fonemica_21') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>22. aço</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_segmentacao_fonemica_22')) is-invalid @endif" value="{{ old('resposta_segmentacao_fonemica_22') }}" name="resposta_segmentacao_fonemica_22">
                                        @if($errors->has('resposta_segmentacao_fonemica_22'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_segmentacao_fonemica_22') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>23. casa</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_segmentacao_fonemica_23')) is-invalid @endif" value="{{ old('resposta_segmentacao_fonemica_23') }}" name="resposta_segmentacao_fonemica_23">
                                        @if($errors->has('resposta_segmentacao_fonemica_23'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_segmentacao_fonemica_23') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>24. chave</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_segmentacao_fonemica_24')) is-invalid @endif" value="{{ old('resposta_segmentacao_fonemica_24') }}" name="resposta_segmentacao_fonemica_24">
                                        @if($errors->has('resposta_segmentacao_fonemica_24'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_segmentacao_fonemica_24') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                                </tbody>
                            </table>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Manipulação Silábica</th>
                                        <th>Resposta</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>25. per + na (no fim)</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control @if($errors->has('resposta_manipulacao_silabica_25')) is-invalid @endif" value="{{ old('resposta_manipulacao_silabica_25') }}" name="resposta_manipulacao_silabica_25">
                                            @if($errors->has('resposta_manipulacao_silabica_25'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_manipulacao_silabica_25') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>26. bater - ba</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control @if($errors->has('resposta_manipulacao_silabica_26')) is-invalid @endif" value="{{ old('resposta_manipulacao_silabica_26') }}" name="resposta_manipulacao_silabica_26">
                                            @if($errors->has('resposta_manipulacao_silabica_26'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_manipulacao_silabica_26') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>27. neca + bo (início)</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control @if($errors->has('resposta_manipulacao_silabica_27')) is-invalid @endif" value="{{ old('resposta_manipulacao_silabica_27') }}" name="resposta_manipulacao_silabica_27">
                                            @if($errors->has('resposta_manipulacao_silabica_27'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_manipulacao_silabica_27') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>28. salada - da</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control @if($errors->has('resposta_manipulacao_silabica_28')) is-invalid @endif" value="{{ old('resposta_manipulacao_silabica_28') }}" name="resposta_manipulacao_silabica_28">
                                            @if($errors->has('resposta_manipulacao_silabica_28'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_manipulacao_silabica_28') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Manipulação Fonêmica</th>
                                    <th>Resposta</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>29. pisca + r (no fim)</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_manipulacao_fonemica_29')) is-invalid @endif" value="{{ old('resposta_manipulacao_fonemica_29') }}" name="resposta_manipulacao_fonemica_29">
                                        @if($errors->has('resposta_manipulacao_fonemica_29'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_manipulacao_fonemica_29') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>30. falta -f</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_manipulacao_fonemica_30')) is-invalid @endif" value="{{ old('resposta_manipulacao_fonemica_30') }}" name="resposta_manipulacao_fonemica_30">
                                        @if($errors->has('resposta_manipulacao_fonemica_30'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_manipulacao_fonemica_30') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>31. ouça + l (início)</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_manipulacao_fonemica_31')) is-invalid @endif" value="{{ old('resposta_manipulacao_fonemica_31') }}" name="resposta_manipulacao_fonemica_31">
                                        @if($errors->has('resposta_manipulacao_fonemica_31'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_manipulacao_fonemica_31') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>32. calor -r</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_manipulacao_fonemica_32')) is-invalid @endif" value="{{ old('resposta_manipulacao_fonemica_32') }}" name="resposta_manipulacao_fonemica_32">
                                        @if($errors->has('resposta_manipulacao_fonemica_32'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_manipulacao_fonemica_32') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Transposição Silábica</th>
                                    <th>Resposta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>33. boca</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control @if($errors->has('resposta_transposicao_silabica_33')) is-invalid @endif" value="{{ old('resposta_transposicao_silabica_33') }}" name="resposta_transposicao_silabica_33">
                                            @if($errors->has('resposta_transposicao_silabica_33'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_transposicao_silabica_33') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>34. lobo</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control @if($errors->has('resposta_transposicao_silabica_34')) is-invalid @endif" value="{{ old('resposta_transposicao_silabica_34') }}" name="resposta_transposicao_silabica_34">
                                            @if($errors->has('resposta_transposicao_silabica_34'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_transposicao_silabica_34') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>35. toma</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control @if($errors->has('resposta_transposicao_silabica_35')) is-invalid @endif" value="{{ old('resposta_transposicao_silabica_35') }}" name="resposta_transposicao_silabica_35">
                                            @if($errors->has('resposta_transposicao_silabica_35'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_transposicao_silabica_35') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>36. faço</td>
                                    <td>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control @if($errors->has('resposta_transposicao_silabica_36')) is-invalid @endif" value="{{ old('resposta_transposicao_silabica_36') }}" name="resposta_transposicao_silabica_36">
                                            @if($errors->has('resposta_transposicao_silabica_36'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('resposta_transposicao_silabica_36') }}
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Transposição Fonêmica</th>
                                    <th>Resposta</th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>37. olá</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_transposicao_fonemica_37')) is-invalid @endif" value="{{ old('resposta_transposicao_fonemica_37') }}" name="resposta_transposicao_fonemica_37">
                                        @if($errors->has('resposta_transposicao_fonemica_37'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_transposicao_fonemica_37') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>38. sala</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_transposicao_fonemica_38')) is-invalid @endif" value="{{ old('resposta_transposicao_fonemica_38') }}" name="resposta_transposicao_fonemica_38">
                                        @if($errors->has('resposta_transposicao_fonemica_38'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_transposicao_fonemica_38') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>39. olé</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_transposicao_fonemica_39')) is-invalid @endif" value="{{ old('resposta_transposicao_fonemica_39') }}" name="resposta_transposicao_fonemica_39">
                                        @if($errors->has('resposta_transposicao_fonemica_39'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_transposicao_fonemica_39') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>40. alisa</td>
                                <td>
                                    <div class="input-group has-validation">
                                        <input type="text" class="form-control @if($errors->has('resposta_transposicao_fonemica_40')) is-invalid @endif" value="{{ old('resposta_transposicao_fonemica_40') }}" name="resposta_transposicao_fonemica_40">
                                        @if($errors->has('resposta_transposicao_fonemica_40'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('resposta_transposicao_fonemica_40') }}
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                    <button type="submit" class="btn btn-primary">Gravar Teste</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
