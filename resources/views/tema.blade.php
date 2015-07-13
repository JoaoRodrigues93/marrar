@extends('layouts.main')

@section('title')
    Tema
@stop
@section('body')

    <div class="container">
            <h2 class="text-center">Tema</h2>
        @if(session('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>

        @endif
        {!! Form::open( array('url'=> 'tema')) !!}
        <a href="{{URL::to('tema_list')}}"  class="">Clique aqui para ver a lista dos temas</a>

                <div class="jumbotron">
                <div class="form-group">
                    {!! Form::label('disciplinas','Escolha a disciplina:',['class'=>'text-primary'])  !!}
                    {!! Form::select('disciplinas', $disciplinas , Input::old('disciplinas'),['class'=>'form-control']) !!}


                </div>
                <div class="form-group">
                    {!! Form::label('capitulo','Escolhe o capitulo:',['class'=>'text-primary'])  !!}
                    {!! Form::select('capitulos', $capitulos , Input::old('capitulos'),['class' => 'form-control'] ) !!}
                </div>

           </div>

                <div class="form-group">
                    {!! Form::label('nome','Introduza o nome do tema',['class'=>'text-primary'])  !!}
                    {!! Form::textarea('nome','',['class'=>'form-control', 'placeholder'=>'Introduza o nome do tema','rows'=>'1'])  !!}

                </div>

                <div class="form-group">
                    {!! Form::label('questoes','Numero de questoes:',['class'=>'text-primary'])  !!}
                    {!! Form::textarea('questoes','',['class'=>'form-control', 'placeholder'=>'10','rows'=>'1'])  !!}

                    {{--<input type="number" name="tema" class="form-control" placeholder="10">--}}
                </div>



                <div class="form-group">
                    {!! Form::label('conteudo','Conteudo',['class'=>'text-primary'])  !!}
                    {!! Form::textarea('conteudo','',['class'=>'form-control','rows'=>'20'])  !!}


                </div>

                <button type="submit" name="Gravar" class="btn btn-primary">Gravar</button>


        {!! Form::close() !!}
    </div>

@stop