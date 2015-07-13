@extends('layouts.main')

@section('title')
   Lista de perguntas
@stop
@section('body')
    <div class="container">


        <script>
            function check(){

                return confirm('Tem certeza que pretente remover essa pergunta?');
            }

        </script>

        <h3 class="text-center">Lista de Perguntas</h3>
        <div class="jumbotron">
            {!! Form::label('filtros','Faltam alguns filtros',['class'=>'text-danger'])  !!}

    <table class="table table-bordered text-center">

     <thead class="text-capitalize">
        <tr>

            <th>#  </th>
            <th>Pergunta </th>
            <th>Resposta correcta </th>
            <th>1ª Resposta errada</th>
            <th>2ª Resposta errada</th>
            <th>3ª Resposta errada</th>
            <th>4ª Resposta errada</th>
            <th> Acção </th>

        </tr>

     </thead>


        <tbody>

        @foreach($perguntas as $pergunta)

        <tr>

        <th scope="row">{{$pergunta->id}}</th>
            <td> {{$pergunta->questao}}</td>
            <td>{{$pergunta->opcaoCorrecta}}</td>
            <td> {{$pergunta->opcao1}}</td>
            <td> {{$pergunta->opcao2}}</td>
            <td> {{$pergunta->opcao3}}</td>
            <td> {{$pergunta->opcao4}}</td>

            <td> <a href="{{URL::to('/perguntaview/editar/'.$pergunta->id)}}">Editar</a> | <a onclick="return check()" href="{{URL::to('/perguntaview/remover/'.$pergunta->id)}}">Remover</a></td>
        </tr>

            @endforeach
        </tbody>






    </table>


        </div>

    </div>




@stop