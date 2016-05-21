@extends('layouts.main')

@section('title')
    Lista de Disciplinas
@stop

@section('body')
    <div class="container">


        <script>

            function check() {

                return confirm('Tem certeza que pretente remover esse texto?');
            }
        </script>

        @if(session('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>

        @endif
        <h3 class="text-center">Lista de Textos</h3>

        <div class="jumbotron">


            <table class="table table-bordered text-center">

                <thead class="text-capitalize">
                <tr>

                    <th></th>
                    <th>Titulo</th>
                    <th> Acção</th>

                </tr>

                </thead>


                <tbody>
                <?php
                $i=0;
                ?>
                @foreach($textos as $texto)
                    <?php
                    $i++;
                    ?>
                    <tr>

                        <th scope="row">{{$i}}</th>
                        <td> {{$texto->titulo}}</td>


                        <td><a href="{{URL::to('/texto_list/editar/'.$texto->id)}}">Editar</a> | <a
                                    onclick="return check()"
                                    href="{{URL::to('/texto_list/remover/'.$texto->id)}}">Remover</a></td>
                    </tr>

                @endforeach
                </tbody>


            </table>


        </div>


    </div>
@stop