@extends('layouts.maincontent')
@section('links')
    @parent
    {{--<link rel="stylesheet" href="{{URL::asset('css/marrar.css')}}">--}}
    <link rel="stylesheet" href="{{URL::asset('css/estudar.css')}}">
@stop

@section('body')
<div class="well">
    <h1 class="text-success text-center">Resultado do exame
        <small>Disciplina de {{$_SESSION['disciplinaActual']->nome}}</small>
    </h1>
    <h3>Nota:@if($examenormal->nota >= 10) <strong class="text-success">{{$examenormal->nota}}</strong>
        @else
            <strong class="text-danger">{{$examenormal->nota}}</strong>
        @endif
    </h3>

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

    <div  class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <button class="btn btn-primary  " style="margin-left: 5px; float: right;"
                    onclick="reload()">Refazer
            </button>

        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <a id="a" href="/home">
                <button class="btn btn-success "  >Terminar
                </button>

            </a>
</div>
    </div>
</div>

    <script>
        function reload() {
            var uriActual = window.location.pathname;
            window.location.assign(uriActual);
        }
    </script>
@stop