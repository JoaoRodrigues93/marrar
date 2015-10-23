@extends('layouts.main')
@section('title')
    Lista de Disciplinas
@stop
@section('body')
    <div class="container">
        <script>
            function check() {
                return confirm('Tem certeza que pretente remover essa disciplina?');
            }
        </script>
        @if(session('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <h3 class="text-center">Lista de Disciplinas</h3>

        <div class="jumbotron">
            <table class="table table-bordered text-center">
                <thead class="text-capitalize">
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th> Acção</th>
                </tr>
                </thead>
                <tbody>
                @foreach($disciplinas as $disciplina)
                    <tr>
                        <th scope="row">{{$disciplina->id}}</th>
                        <td> {{$disciplina->nome}}</td>
                        <td><a href="{{URL::to('/disciplina_list/editar/'.$disciplina->id)}}">Editar</a> | <a
                                    onclick="return check()"
                                    href="{{URL::to('/disciplina_list/remover/'.$disciplina->id)}}">Remover</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop