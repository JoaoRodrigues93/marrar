@extends('layouts.maincontent');
@section('body');
<?php
        $nota = $dadosExame['nota'];
        $respostasCertas = $dadosExame['respostasCertas'];
        $respostasErradas =$dadosExame['respostasErradas'];

        ?>
@section('body')
<div class="well">
    <h1 class="text-success text-center">Resultado do exame
        de {{$_SESSION['disciplinaActual']->nome}}
    </h1>

    <div class="alert alert-info">
    <p>
        <strong>Atenção!</strong>Poderá ver o resultado do exame no fim do dia na secção do Ranking.
    </p>
    </div>

    <p>Nota:@if( $nota>= 10) <strong class="text-success">{{$nota}}</strong>
        @else
            <strong class="text-danger">{{$nota}}</strong>
        @endif
    </p>

    <p>Respostas correctas:@if($respostasCertas > $respostasErradas) <strong
                class="text-success">{{$respostasCertas}}</strong>
        @else
            <strong class="text-danger">{{$respostasCertas}}</strong>
        @endif
    </p>

    <p>Respostas erradas:@if($respostasErradas < $respostasCertas) <strong
                class="text-success">{{$respostasErradas}}</strong>
        @else

            <strong class="text-danger">{{$respostasErradas}}</strong>
        @endif
    </p>

    <p>Total de Perguntas:<strong
                class="text-success">{{$nrPerguntas}}</strong>
    </p>

    @if ($nota >=10)
        <p class="alert-success"><strong>Parabens!</strong> conseguiste um resultado positivo.</p>
    @else
        <p class="alert-danger"><strong>Que pena!</strong> O resultado não é positivo.</p>
    @endif

 </div>

 @stop