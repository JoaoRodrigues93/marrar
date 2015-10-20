<?php $ranking=true; ?>
@extends('layouts.maincontent')
@section('title')
    Marrar:Capitulos
@stop


<style>
    div.voltar svg{
        opacity: 0;
    }
</style>

@section('body')

    <div class="panel panel-body">
        <div align="center">
            <label>  <h2 class="text-primary" >{{$disciplina->nome}}</h2></label>
            <hr width="100%">

        </div>
        <div class="row">

            @foreach($capitulos as $capitulo)

                <div class="col-md-3 col-lg-3 col-sm-4 col-xs-6 portfolio-item">
                    <a href="{{URL::to('/capituloHomeMobile/'.$capitulo->id)}}">


                        <?php
                        $disciplin= preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $capitulo->nome ) );
                        $disciplin=strtolower($disciplin[0]);
                        $disciplin=$disciplin.".png";

                        ?>
                        <object id="imagem" data="{{URL::asset("expander/images/$disciplin")}}" type="image/png">
                            <img class="img-responsive" src="{{URL::asset('expander/images/what.png')}} ">
                        </object>



                        <h4 class="text-center">
                            {{$capitulo->nome}}
                        </h4>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
<script>


</script>

@stop