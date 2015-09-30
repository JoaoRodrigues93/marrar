@extends('layouts.maincontent')


@section('title')
    a marrar...
@stop
@section('links')
    @parent
    {{--<link rel="stylesheet" href="{{URL::asset('css/marrar.css')}}">--}}
    <link rel="stylesheet" href="{{URL::asset('css/estudar.css')}}">
@stop


@section('body')
    <div class="well estudar">

        <div class="row exer-teoria">
            <div class="teoria">
                Teória
            </div>
            <div class="exercicios">
                exercicios
            </div>

        </div>
        <div id="botoes" class="row botoes">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <button id="btn_teoria" class="btn btn-teoria" onclick="abrirTeoria()">Teória</button>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <button id="btn_exercicio" class="btn btn-exer" disabled onclick="abrirExercicio()">Exercicio</button>
            </div>
        </div>

    </div>


    <script>

        var val = false;

        function abrirTeoria() {


            document.getElementById('botoes').setAttribute('class', 'row botoes top' );

            if(!val){
                $('.teoria').load("/teoria.html");
                val = true;
            }
//            $("#conteud").load("/teoria.html");
            $('.teoria').css({
                'display': 'block'
            });

            $('.exercicios').css({
                'display': 'none'
            });

            /*$('body').css({
             'overflow-x': 'hidden'
             });*/



            document.getElementById('btn_exercicio').disabled = false;
            document.getElementById('btn_teoria').disabled = true;
        }

        function abrirExercicio() {

            $('.teoria').css({
                'display': 'none'
            });

            $('.exercicios').css({
                'display': 'block'
            });

            document.getElementById('botoes').setAttribute('class', 'row botoes');

            /*$('body').css({
             'overflow-x': 'scroll'
             });*/

            document.getElementById('btn_exercicio').disabled = true;
            document.getElementById('btn_teoria').disabled = false;
        }
    </script>

@stop