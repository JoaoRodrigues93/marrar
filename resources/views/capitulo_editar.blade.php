@extends('layouts.main')

@section('title')
    Editar Capitulo
@stop
@section('body')



    <div class="container">
        <div class="jumbotron">
            <h2 class="text-center">Capitulo</h2>
            {!!  Form::open(['gravarCapitulo']) !!}
            <a href="{{URL::to('capitulo_list')}}" class="">Clique aqui para ver a lista dos capitulos</a>
            <div class="form-group">

                {!! Form::label('disciplina','Selecione a disciplina',['class'=>'text-primary' ]) !!}
                {!! Form::select('disciplinas', $disciplinas , null, ['class' => 'form-control','id'=>'disciplinas'])
                !!}
                </div>

            <div class="form-group">
                {!! Form::label('nome','Introduza o nome do capitulo:',['class'=>'text-primary']) !!}
                {!! Form::text('nome',$capitulos->nome,['class'=>'form-control', 'rows'=>'1','id'=>'nome']) !!}
                {!! Form::hidden('id',$capitulos->id,['class'=>'form-control','id'=>'id']) !!}

            </div>

            <div>
                <button type="button" name="Gravar" id="gravar" class="btn btn-primary" onclick="gravarCapitulo()">Gravar</button>
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
            function gravarCapitulo(){

                var form = $('form[gravarCapitulo]');
                var url = form.prop('action');
               /* var id=document.getElementById('id');
                alert('id');*/
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
                    gravarCapitulo();
                    evt.preventDefault();
                }

            };

        </script>
    </div>


@stop