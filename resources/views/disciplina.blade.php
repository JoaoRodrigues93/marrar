@extends('layouts.main')
@section('title')
   Disciplina
@stop
@section('body')

    <div class="container">
        <div class="jumbotron">
            <h2 class="text-center">Disciplina</h2>
            {!! Form::open( array('url'=> 'gravar-disciplina')) !!}

        <div class="form-group">
            {!! Form::label('nome','Introduza a disciplina:',['class'=>'text-primary']) !!}
            {!! Form::textarea('nome','',['class'=>'form-control', 'placeholder'=>'Introduza a disciplina','rows'=>'1'])  !!}


        </div>

         <button type="submit" name="Gravar" class="btn btn-primary">Gravar</button>

            {!! Form::close() !!}
        </div>
    </div>
@stop




