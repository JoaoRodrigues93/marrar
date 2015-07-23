@extends('layouts.main')

@section('title')
    Marrar:Disciplinas
@stop
@section('body')






    <div class="container">
        <div class="jumbotron">


                <div class="panel panel-body">
                    <div class="row">
@foreach($disciplinas as $disciplina)


                        <div class="col-md-3 portfolio-item">

                            <a href="#">
                                <img class="img-responsive"  src="{{URL::asset('img/book.png')}} "  alt={{$disciplina->nome}}>
                            </a>
                            <h3>
                                <a href="capituloHome" >{{$disciplina->nome}}</a>
                            </h3>




                    </div>


    @endforeach
                        </div>
            </div>
        </div>
    </div>

@stop