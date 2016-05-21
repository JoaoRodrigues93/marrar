@extends('layouts.main')
@section('title')
    Editar Texto
@stop
@section('links')
    @parent
    <script src="{{URL::asset('ckeditor/ckeditor.js')}}"></script>
@stop
@section('body')

    <div class="container">
        <div class="jumbotron">
            <h2 class="text-center">Texto</h2>

            {!!  Form::open(['editarTexto']) !!}
            
            <a href="{{URL::to('texto_list')}}" class="">Clique aqui para ver a lista de textos</a>
            <div class="form-group">
                {!! Form::label('titulo','Introduza o titulo do texto:',['class'=>'text-primary']) !!}
                {!! Form::text('titulo',$textos->titulo,['class'=>'form-control','id'=>'titulo','rows'=>'1']) !!}
                {!! Form::hidden('id',$textos->id,['class'=>'form-control','id'=>'id']) !!}

            </div>


            <div class="form-group text-primary">
                {!! Form::label('texto','Introduza todo texto',['class'=>'text-primary']) !!}
                {!! Form::textarea('textoCompleto',$textos->texto,['class'=>'form-control','id'=>'textoCompleto', 'placeholder'=>'Introduza o texto aqui','rows'=>'20']) !!}

            </div>

            <button type="button" name="Gravar" class="btn btn-primary" onclick="gravarTexto()">Gravar</button>

            {!! Form::close() !!}
        </div>
    </div>


    <script>

        function gravarTexto(){

            var texto =document.getElementById('textoCompleto');

            texto.value=CKEDITOR.instances['textoCompleto'].getData();

            var form = $('form[editarTexto]');
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
                gravarTexto();
                evt.preventDefault();
            }

        };

        CKEDITOR.replaceAll();

    </script>
@stop