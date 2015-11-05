<?php $ranking = false;  ?>
@extends('layouts.maincontent')

@section('links')
    @parent
    <link rel="stylesheet" type="text/css" href={{URL::asset('css/tab/css/normalize.css')}}/>
    <link rel="stylesheet" type="text/css" href={{URL::asset('css/file/css/demo.css')}}/>
    <link rel="stylesheet" type="text/css" href={{URL::asset('css/tab/css/component.css')}}/>
@stop

<script>
    (function (e, t, n) {
        var r = e.querySelectorAll("html")[0];
        r.className = r.className.replace(/(^|\s)no-js(\s|$)/, "$1js$2")
    })(document, window, 0);
</script>


@section('body')

    <style>
        div.voltar:hover h3 a {
            opacity: 0;
            -webkit-transition-delay: 0.2s;
            transition-delay: 0.2s;
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
        }
    </style>

   {{-- Form::macro('myField', function()
    {
    return '<input type="submit">';
    });--}}

    <div class="form-group well">


        {!!Form::open(array('url'=>'edita-perfil', 'files' => true))!!}


        <div class="row perfil">

            <div class="col-lg-6 col-md-6 col-sm-6">
                @if($perfil->foto)
                    <img class="perfil-foto img-responsive img-rounded" src="{{$perfil->foto}}">
                @else
                    <img class="perfil-foto img-responsive img-rounded" src="{{Request::root().'/img/pessoa.png'}}">
                @endif

                {{--
                  <input type="file" name="file-3[]" id="file-3" class="inputfile inputfile-3" data-multiple-caption="{count} files selected" multiple />
                --}}


                <div class="box">
                    <input type="file" name="file-3[]" id="file-3" class="inputfile inputfile-3"
                           data-multiple-caption="{count} files selected" multiple/>
                    <label for="file-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                        </svg>
                        <span>Fotografia</span></label>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="row">
                    <h1 class="perfil-header">{!!$perfil->nome!!} {!!$perfil->apelido!!}</h1>
                    {!! Form::hidden('id',$perfil->id,['class'=>'form-control']) !!}
                </div>

                <div class="row">
                    <?php
                    if ($perfil->username != '')
                        echo "#" . $perfil->username;
                    ?>
                </div>

                <div class="row">
                    <p>{!!$perfil->descricao!!}</p>
                    <br/>
                </div>
            </div>
        </div>
        @if(session('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row perDesc">

            <br/>
            <br/>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::label('pnome','Primeiro Nome')!!}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::text('nome',$perfil->nome,['placeholder'=>'Nome
                    Completo','class'=>'form-control', 'readonly'])!!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::label('unome','Apelido')!!}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::text('apelido',$perfil->apelido,['placeholder'=>'Nome
                    Completo','class'=>'form-control', 'readonly'])!!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::label('data-nascimento','Data de Nascimento')!!}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::input('date', 'date', $perfil->dataNascimento, ['class' => 'form-control',
                    'placeholder' =>
                    'Date', 'readonly'])!!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::label('telefone','Telefone')!!}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::text('telefone',$perfil->telefone,
                    ['placeholder'=>'8xxxxxxxx','class'=>'form-control', 'readonly'])!!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::label('email','Email')!!}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::email('email',$perfil->email,
                    ['placeholder'=>'Email','class'=>'form-control', 'readonly'])!!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::label('provincia','Provincia')!!}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::select('provincia', array('' => 'Provincia', 'Cabo Delgado' => 'Cabo Delgado', 'Gaza' => 'Gaza', 'Inhambane' =>
                    'Inhambane', 'Manica' => 'Manica', 'Maputo' => 'Maputo', 'Matola' => 'Matola', 'Nampula' =>
                    'Nampula', 'Niassa' => 'Niassa', 'Sofala' => 'Sofala', 'Tete' => 'Tete', 'Zambezia' =>
                    'Zambezia'), $perfil->cidade, ['class'=>'form-control', 'readonly'])!!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::label('escola','Escola')!!}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::text('escola',$perfil->escola,
                    ['placeholder'=>'Escola','class'=>'form-control', 'readonly'])!!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::label('sexo','Sexo')!!}
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::select('sexo', array('' => 'Sexo', 'Masculino' => 'Masculino', 'Feminino' =>
                    'Feminino'), $perfil->sexo, ['class'=>'form-control', 'readonly'])!!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    {!!Form::label('descricao','Descricao da Tua Pessoa')!!}
                </div>
                <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> -->
                <div class="col-lg-6 col-md-6 col-sm-6">

                    {!!Form::textarea('descricao',$perfil->descricao,
                    ['rows'=> '2', 'placeholder'=>'Texto Descritivo sobre a sua pessoa',
                    'class'=>'form-control', 'readonly'])!!}

                </div>
            </div>
        </div>

        <div class="row center-block" align="right">
            <br/>
            <br/>
            {!!Form::submit('Editar Perfil',['class'=>'btn btn-primary']) !!}

        </div>

    </div>
    {!!Form::close()!!}

    <script src="{{URL::asset('css/file/js/jquery.custom-file-input.js')}}"></script>
@stop
