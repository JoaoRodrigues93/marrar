
@extends('layouts.maincontent')
@section('title')
    Marrar:Lista de Temas
@stop

@section('body')

    <div class="well">
        <div class="row">

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <label  style="text-align: left;">  <h4 class="text-primary" >{{$disciplina->nome}} | {{$capitulo->nome}}</h4><hr><h5 class="text-primary">Lista de temas</h5></label>

</div>
            </div>
    <div class="text-left text-danger">

        <div class="row">


<ol>
            @foreach($temas as $tema)

                <h5><li><a href="/exercicio/{{$capitulo->id}}/{{$tema->nome}}">

                {{$tema->nome}}
            </a></li></h5>

            @endforeach
</ol>

            <br>
            <button onclick="fazerTeste()" class="btn btn-primary form-control">Clique para Fazer o teste</button>
        </div>
    </div>
        <input type="hidden" value="/teste/{{$capitulo->nome}}/{{$capitulo->id}}" id="fazerTeste"/>
</div>

    <script>
        function fazerTeste(){

            document.location.href=document.getElementById('fazerTeste').value;
           // alert("Em desenvolvimento");
        }

    </script>
@stop