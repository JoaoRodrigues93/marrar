@extends('layouts.main')

@section('title')
    Lista de Temas
@stop
@section('body')
    <div class="container">


        <script>
            function check(){

                return confirm('Tem certeza que pretente remover esse tema?');
            }

        </script>
        @if(session('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>

        @endif

        <h3 class="text-center">Lista de Temas</h3>
        <div class="jumbotron">


            <table class="table table-bordered text-center">

                <thead class="text-capitalize">
                <tr>

                    <th> </th>
                    <th>Nome </th>
                    <th>Numero de Questoes</th>

                    <th> Acção </th>

                </tr>

                </thead>


                <tbody>

                @foreach($temas as $tema)

                    <tr>

                        <th scope="row">{{$tema->id}}</th>
                        <td> {{$tema->nome}}</td>
                        <td>{{$tema->numero_questoes}}</td>


                        <td> <a href="{{URL::to('/tema_list/editar/'.$tema->id)}}">Editar</a> | <a onclick="return check()" href="{{URL::to('/tema_list/remover/'.$tema->id)}}">Remover</a></td>
                    </tr>

                @endforeach
                </tbody>






            </table>


        </div>

    </div>




@stop