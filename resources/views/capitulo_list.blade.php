@extends('layouts.main')

@section('title')
    Lista de Capitulos
@stop
@section('body')
    <div class="container">


        <script>
            function check(){

                return confirm('Tem certeza que pretente remover esse capitulo?');
            }

        </script>
        @if(session('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>

        @endif

        <h3 class="text-center">Lista de Capitulos</h3>
        <div class="jumbotron">


            <table class="table table-bordered text-center">

                <thead class="text-capitalize">
                <tr>

                    <th> </th>
                    <th>Nome </th>
                    <th> Acção </th>

                </tr>

                </thead>


                <tbody>

                @foreach($capitulos as $capitulo)

                    <tr>

                        <th scope="row">{{$capitulo->id}}</th>
                        <td> {{$capitulo->nome}}</td>


                        <td> <a href="{{URL::to('/capitulo_list/editar/'.$capitulo->id)}}">Editar</a> | <a onclick="return check()" href="{{URL::to('/capitulo_list/remover/'.$capitulo->id)}}">Remover</a></td>
                    </tr>

                @endforeach
                </tbody>






            </table>


        </div>

    </div>




@stop