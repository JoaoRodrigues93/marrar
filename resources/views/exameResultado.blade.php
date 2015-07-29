@extends('layouts.maincontent')
@section('body')
<div class="well">
    <h1 class="text-success text-center">Resultado do exame
        <small>Disciplina de {{$_SESSION['disciplinaActual']->nome}}</small>
    </h1>
    <p>Nota:@if($examenormal->nota >= 10) <strong class="text-success">{{$examenormal->nota}}</strong>
        @else
            <strong class="text-danger">{{$examenormal->nota}}</strong>
        @endif
    </p>

    <p>Respostas correctas:@if($examenormal->respostasCertas > $examenormal->respostasErradas) <strong
                class="text-success">{{$examenormal->respostasCertas}}</strong>
        @else
            <strong class="text-danger">{{$examenormal->respostasCertas}}</strong>
        @endif
    </p>

    <p>Respostas erradas:@if($examenormal->respostasErradas < $examenormal->respostasCertas) <strong
                class="text-success">{{$examenormal->respostasErradas}}</strong>
        @else

            <strong class="text-danger">{{$examenormal->respostasErradas}}</strong>
        @endif
    </p>

    <p>Total de Perguntas:<strong
                class="text-success">{{$examenormal->nrPerguntas}}</strong>
    </p>

    @if ($examenormal->nota >=10)
        <p class="alert-success"><strong>Parabens!</strong> conseguiste um resultado positivo.</p>
    @else
        <p class="alert-danger"><strong>Que pena!</strong> O resultado não é positivo.</p>
    @endif
</div>
@stop