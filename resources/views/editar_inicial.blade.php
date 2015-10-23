@extends('layouts.main')
@section('title')
    Editar Pagina Inicial
@endsection
@section('body')
    <div>
        {{ Form::open(array('url'=>'editar_inicial'))}}
        {{Form::label('titulo incial')}}
        {{Form::text('titulo-incial','',['placeholder'=>'titulo incial','class'=>'form-control'])}}
        {{Form::label('Titulo pode aprender')}}
        {{Form::text('Titulo-pode-aprender','',['placeholder'=>'titulo incial','class'=>'form-control'])}}
        {{Form::label('Descrin��o')}}
        {{Form::label('Titulo como funciona')}}
        {{Form::label('Titulo Materia Te�rico')}}
        {{Form::label('Titulo Descrinc�o')}}
        {{Form::label('Titulo Exercicios e Exames')}}
        {{Form::label('Titulo Descrinc�o')}}
        {{Form::label('Titulo Certificado')}}
        {{Form::label('Titulo Descrinc�o')}}
        {{Form::label('titulo o que dizem')}}
        {{Form::label('Testemunho 1')}}
        {{Form::label('Nome 1')}}
        {{Form::label('Testemunho 2')}}
        {{Form::label('Nome 2')}}
        {{Form::label('Testemunho 3')}}
        {{Form::label('Nome 3')}}
        {{Form::label('titulo')}}
        {{Form::close()}}
    </div>
@endsection