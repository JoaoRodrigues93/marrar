@extends('layouts.main')
@section('title')
    Editar Disciplina
@stop
@section('body')

    <div class="container">
        <div class="jumbotron">
            <h2 class="text-center">Disciplina</h2>

            {!!  Form::open(['editarDisciplina']) !!}
            <a href="{{URL::to('disciplina_list')}}" class="">Clique aqui para ver a lista de disciplinas</a>
            <div class="form-group">
                {!! Form::label('nome','Introduza a disciplina:',['class'=>'text-primary']) !!}
                {!! Form::text('nome',$disciplinas->nome,['class'=>'form-control','id'=>'nome','rows'=>'1']) !!}
                {!! Form::hidden('id',$disciplinas->id,['class'=>'form-control','id'=>'id']) !!}


            </div>

            <button type="button" name="Gravar" class="btn btn-primary" onclick="gravarDisc()">Gravar</button>

            {!! Form::close() !!}
        </div>
    </div>


    <script>

        function gravarDisc(){

            var form = $('form[editarDisciplina]');
            var url = form.prop('action');
            var id= document.getElementById('id');
            $.ajax({
                url: url,
                data: form.serialize(),
                method: 'POST',
                success: function (data) {

                    alert('Dados alterados com sucesso');







                }

            });
        }

        document.onkeydown = function (evt) {
            var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
            if (keyCode == 13) {
                gravarDisc();
                evt.preventDefault();
            }

        };

    </script>
@stop