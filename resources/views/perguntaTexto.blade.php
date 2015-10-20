@extends('layouts.main')

@section('title')
    Registo de Perguntas
@stop
@section('links')
    @parent
    <script src="{{URL::asset('ckeditorstardard/ckeditor/ckeditor.js')}}"></script>
@stop

@section('body')


    <div class="container">


        {!! Form::open( ['perguntaTexto']) !!}
        <a href="{{URL::to('perguntaview')}}" class="text-right">Clique aqui para ver a lista de perguntas</a>

        <div class="jumbotron">
            <h2 class="text-primary">Disciplina de Português</h2>
            <hr width="100%">
            <h4 class="text-primary">Registo de Perguntas</h4>

            <p></p>

            <p></p>

            <p></p>

            <div class="form-group text-primary">
                @if(!$titulos)

                    <div align="center">

                        <h3 class="alert alert-warning">Infelizmente nenhum Texto foi registado.Registe e tente
                            novamente!</h3>

                    </div>
                @else

                    <label class="text-primary">Seleccione o título do texto </label>
                    {!! Form::select('titulos',array('default'=>'')+$titulos,null,['class' => 'form-control','id'=>'titulos'] ) !!}
                @endif
            </div>

        </div>

        <div class="form-group">

            {!! Form::label('pergunta','Pergunta',['class'=>'text-primary']) !!}
            {!! Form::textarea('questao','',['class'=>'form-control', 'id'=>'questao','placeholder'=>'Introduza a questao aqui','rows'=>'2']) !!}
            {!! Form::label('correcto','Resposta correcta',['class'=>'text-primary']) !!}
            {!! Form::textarea('opcaoCorrecta','',['class'=>'form-control','id'=>'opcaoCorrecta', 'placeholder'=>'Introduza a resposta correcta aqui','rows'=>'2']) !!}

            {!! Form::label('erradas','Respostas erradas',['class'=>'text-primary']) !!}
            {!! Form::textarea('opcao1','',['class'=>'form-control','id'=>'opcao1','placeholder'=>'Introduza a 1ª resposta errada aqui','rows'=>'2']) !!}
            {!! Form::textarea('opcao2','',['class'=>'form-control','id'=>'opcao2', 'placeholder'=>'Introduza a 2ª resposta errada aqui','rows'=>'2']) !!}
            {!! Form::textarea('opcao3','',['class'=>'form-control', 'id'=>'opcao3','placeholder'=>'Introduza a 3ª resposta errada aqui','rows'=>'2']) !!}
            {!! Form::textarea('opcao4','',['class'=>'form-control', 'id'=>'opcao4','placeholder'=>'Introduza a 4ª resposta errada aqui','rows'=>'2']) !!}

        </div>
        <div class="center-block" align="center">

            <button type="button" name="Gravar" class="btn btn-primary left" style="width: 30%"
                    onclick="gravarPerguntaTexto()">Gravar
            </button>

            <br>
            <hr width="100%">
        </div>


        {!! Form::close() !!}
        <br>
        <br>
        <br>

    </div>
    <script>

        CKEDITOR.replaceAll();
        CKEDITOR.addCss().marginBottom = '14px';

        function gravarPerguntaTexto() {

            titulo = document.getElementById('titulos');
            if (titulo.selectedIndex <= 0) {
                alert('Seleccione o título do texto');
            }

            else {
                var form = $('form[perguntaTexto]');
                var url = form.prop('action');

                $.ajax({
                    url: url,
                    data: form.serialize(),
                    method: 'POST',
                    success: function (data) {

                        alert('Dados gravados com sucesso');


                    }

                });
            }
        }


    </script>
@stop