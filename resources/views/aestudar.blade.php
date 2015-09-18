@extends('layouts.maincontent')


@section('title')
    a marrar...
@stop
@section('links')
    @parent
    <link rel="stylesheet" href="{{URL::asset('css/marrar.css')}}">
@stop

@section('body')


    <div class="well aestudar">

        <div class="quenomevoudar">
            <div class="row exercicios">

                <div class="row lendo">

                </div>

                <div class="row confirmar">

                </div>

            </div>

            <div class="teoria">

            </div>
        </div>

        <div class="row botoes">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <button class="btn btn-teoria">Teoria</button>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <button class="btn btn-exer">Exercicio</button>
            </div>
        </div>

    </div>

@stop