@extends('layouts.main')

@section('title')
    Gestão do Marrar
@stop
@section('body')

    <div class="abc container well" style="background: #FFFFFF; font-size: 36px">
           <h1>
               Bem vindo ao sistema de Gestão de conteudo do <span>Marrar</span>
           </h1>
    </div>

    <style>
        h1{
            color: rgba(0,0,0,0.7);
        }
        .abc{
            min-height: 400px;
            text-align: center;
        }

        .abc h1{
            padding: 10% 0;
            font-size: 7rem;

            color: #2C97DE;
            letter-spacing: 0.6px;
            text-shadow: 1px 1px 2px #999;
        }

        .abc h1 span{
            font-family: 'Cooper Black';
        }
    </style>

@stop