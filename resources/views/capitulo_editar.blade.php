@extends('layouts.main')

@section('title')
    Editar Capitulo
@stop
@section('body')

    <div class="container">
        <div class="jumbotron">
            <h2 class="text-center">Capitulo</h2>
            {!! Form::open( array('url'=> 'editar-capitulo')) !!}

            <div class="form-group">
                {!! Form::label('disciplinas','Escolha a disciplina',['class'=>'text-primary']) !!}
                {!! Form::select('disciplinas',array('default'=> $disciplina)+$disciplinas,null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('nome','Introduza o nome do capitulo:',['class'=>'text-primary']) !!}
                {!! Form::text('nome',$capitulos->nome,['class'=>'form-control', 'rows'=>'1']) !!}
                {!! Form::hidden('id',$capitulos->id,['class'=>'form-control']) !!}

            </div>

            <div>
                <button type="submit" name="Gravar" class="btn btn-primary">Gravar</button>
            </div>


            {!! Form::close() !!}
        </div>
    </div>
@stop