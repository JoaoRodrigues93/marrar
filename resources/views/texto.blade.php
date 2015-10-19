@extends('layouts.main')
@section('title')
    Texto-Português
@stop

@section('links')
    @parent
    <script src="{{URL::asset('ckeditor/ckeditor.js')}}"></script>
@stop

@section('body')


    <div class="container">

        {!! Form::open(['entregarTeste']) !!}
        <div class="jumbotron">
            <h2 class="text-primary">Disciplina de Português</h2>
            <hr width="100%">
            <h4 class="text-primary">Registo de Texto</h4>


            <p></p>

            <p></p>

            <p></p>

            <div class="form-group text-primary">
                <label class="text-primary">Introduza o título do texto </label>
                {!! Form::text('titulo','',['class'=>'form-control','id'=>'titulo','placeholder'=>'Introduza o título aqui']) !!}
            </div>

        </div>

        <div class="form-group text-primary">
            {!! Form::label('texto','Introduza todo texto (inclusive o título)',['class'=>'text-primary']) !!}
            {!! Form::textarea('textoCompleto','',['class'=>'form-control','id'=>'textoCompleto', 'placeholder'=>'Introduza o texto aqui','rows'=>'20']) !!}

        </div>
        <button type="button" name="Gravar" class="btn btn-primary left" style="width: 30%" onclick="gravarTexto()">
            Gravar
        </button>


        {!! Form::close() !!}
        <hr width="100%">
    </div>

    <br>
    <br>

    <script>

        function gravarTexto() {

            var form = $('form[entregarTeste]');
            var url = form.prop('action');

            $.ajax({
                url: url,
                data: form.serialize(),
                method: 'POST',
                success: function (data) {

                    alert('Dados gravados com sucesso');
                    var titulo = document.getElementById('titulo');
                    var texto = document.getElementById('textoCompleto');

                    titulo.value = '';
                    texto.value = '';


                }

            });
        }


        CKEDITOR.replaceAll();

    </script>

@stop