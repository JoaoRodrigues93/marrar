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

                {!! Form::label('disciplina','Selecione a disciplina',['class'=>'text-primary' ]) !!}
                {!! Form::select('disciplinas', $disciplinas , null, ['class' => 'form-control','id'=>'disciplinas'])
                !!}
                </div>

            <div class="form-group">
                {!! Form::label('nome','Introduza o nome do capitulo:',['class'=>'text-primary']) !!}
                {!! Form::text('nome',$capitulos->nome,['class'=>'form-control', 'rows'=>'1']) !!}
                {!! Form::hidden('id',$capitulos->id,['class'=>'form-control']) !!}

            </div>

            <div>
                <button type="submit" name="Gravar" class="btn btn-primary">Gravar</button>
                {!! Form::hidden('idDisc',$idDisc, ['id'=>'idDisc']) !!}
            </div>


            {!! Form::close() !!}
        </div>

        <script>

            var disciplinas = document.getElementById('disciplinas');
            var idDisciplina = document.getElementById('idDisc');
            encontrado = false;
            i = 0;

            while (encontrado == false && i < disciplinas.length) {
                if (disciplinas[i].value == idDisciplina.value) {
                    encontrado = true;
                    disciplinas.selectedIndex = i;

                }
                i++;

            }

        </script>
    </div>


@stop