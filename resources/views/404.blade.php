@extends('layouts.maincontent')

@section('links')
    @parent
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
@stop

@section('title')
    Erro 404 - Marrar

@stop
@section('body')

    <div class="Sevcontent">
        <div class="Sevtitle">marrar</div>
        <div class="Sevmessage">Página não Encontrada :(</div>
    </div>

@stop