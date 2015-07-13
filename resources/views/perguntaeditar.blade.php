@extends('layouts.main')

@section('title')
    Editar pergunta
@stop


@section('body')
    <h3 class="text-center"> Editar  pergunta</h3>
    <div class="container">


        {!! Form::open( array('url'=> 'editar-pergunta')) !!}

        <div class="jumbotron">

            <div class="form-group">

                {!! Form::label('disciplina','Selecione a disciplina',['class'=>'text-primary'])  !!}
                {!! Form::select('disciplinas', $disciplinas , Input::old('disciplinas'), ['class' => 'form-control']) !!}
                {!! Form::label('capitulo','Selecione o capitulo',['class'=>'text-primary'])  !!}
                {!! Form::select('capitulos', $capitulos , Input::old('capitulos'),['class' => 'form-control'] ) !!}
                {!! Form::label('tema','Selecione o tema',['class'=>'text-primary'])  !!}
                {!! Form::select('tema', $tema , Input::old('tema'),['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">

            {!! Form::label('questao','Pergunta',['class'=>'text-primary'])  !!}
            {!! Form::textarea('questao',$pergunta->questao,['class'=>'form-control', 'placeholder'=>'Introduza a pergunta aqui','rows'=>'2'])  !!}
            {!! Form::hidden('id',$pergunta->id,['class'=>'form-control'])  !!}
            {!! Form::label('correcto','Resposta correcta',['class'=>'text-primary'])  !!}
            {!! Form::textarea('opcaoCorrecta',$pergunta->opcaoCorrecta,['class'=>'form-control', 'placeholder'=>'Introduza a resposta correcta aqui','rows'=>'2'])  !!}
            {!! Form::label('erradas','Respostas erradas',['class'=>'text-primary'])  !!}
            {!! Form::textarea('opcao1',$pergunta->opcao1,['class'=>'form-control', 'placeholder'=>'Introduza a 1ª resposta errada aqui','rows'=>'2'])  !!}
            {!! Form::textarea('opcao2',$pergunta->opcao2,['class'=>'form-control', 'placeholder'=>'Introduza a 2ª resposta errada aqui','rows'=>'2'])  !!}
            {!! Form::textarea('opcao3',$pergunta->opcao3,['class'=>'form-control', 'placeholder'=>'Introduza a 3ª resposta errada aqui','rows'=>'2'])  !!}
            {!! Form::textarea('opcao4',$pergunta->opcao4,['class'=>'form-control', 'placeholder'=>'Introduza a 4ª resposta errada aqui','rows'=>'2'])  !!}

        </div>
        <div class="center-block" align="center">

            {!!Form::submit('Submeter pergunta',['class'=>'btn-primary']) !!}

        </div>


        <div>




        </div>
        {!! Form::close() !!}


    </div>



@stop