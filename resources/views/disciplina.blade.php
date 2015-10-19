@extends('layouts.main')
@section('title')
    Disciplina
@stop
@section('body')

    <div class="container">
        <div class="jumbotron">
            <h2 class="text-center">Disciplina</h2>
            @if(session('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>

            @endif
            {!!  Form::open(['gravarDisciplina']) !!}
            <a href="{{URL::to('disciplina_list')}}" class="">Clique aqui para ver a lista de disciplinas</a>

            <div class="form-group">
                {!! Form::label('nome','Introduza a disciplina:',['class'=>'text-primary']) !!}
                {!! Form::text('nome','',['class'=>'form-control','id'=>'nome','rows'=>'1']) !!}


            </div>

            <button type="button" name="Gravar" id="gravar" class="btn btn-primary" onclick="gravarDisc()">Gravar</button>

            {!! Form::close() !!}
        </div>
    </div>


    <script>

        function gravarDisc(){

            var form = $('form[gravarDisciplina]');
            var url = form.prop('action');

            $.ajax({
                url: url,
                data: form.serialize(),
                method: 'POST',
                success: function (data) {

                   alert('Dados gravados com sucesso');
                    var nome= document.getElementById('nome');


                    nome.value='';



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








