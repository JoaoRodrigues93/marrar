@extends('layouts.main')

@section('title')
    Capitulo
@stop
@section('body')

    <div class="container">
        <div class="jumbotron">
            <h2 class="text-center">Capitulo</h2>
            @if(session('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>

            @endif
            {!!  Form::open(['gravarDisciplina']) !!}
            <a href="{{URL::to('capitulo_list')}}" class="">Clique aqui para ver a lista dos capitulos</a>

            <div class="form-group">
                {!! Form::label('disciplinas','Escolha a disciplina',['class'=>'text-primary']) !!}
                {!! Form::select('disciplinas', array('default'=>'')+$disciplinas , null,['class'=>'form-control','id'=>'disciplinas']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('nome','Introduza o nome do capitulo:',['class'=>'text-primary']) !!}
                {!! Form::text('nome','',['class'=>'form-control','id'=>'nome','rows'=>'1']) !!}

            </div>

            <div>
                <button type="button" name="Gravar" id="gravar" class="btn btn-primary" onclick="gravarDisc()">Gravar</button>
            </div>


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
                var  button2 = document.getElementById("gravar");
                button2.click();
            }

        };

    </script>


@stop