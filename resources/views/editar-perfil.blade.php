<?php $ranking=true;  ?>
@extends('layouts.maincontent')
@section('body')
    <div class="form-group well">

        <div class="container">

            {!!Form::open(array('url'=>'edita-perfil', 'files' => true))!!}


            <div class="row perfil">
                <div class="col-sm-4">
                @if($perfil->foto)
                    <img class="perfil-foto img-responsive img-rounded" src="{{$perfil->foto}}">
                @else
                    <img class="perfil-foto img-responsive img-rounded" src="{{Request::root().'/img/pessoa.png'}}">
                @endif
                    {!! Form::file('image') !!}
                    {{--<input type="file" id="image" name="image" />--}}
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <h1 id="perfil-header">{!!$perfil->nome!!} {!!$perfil->apelido!!}</h1>
                        {!! Form::hidden('id',$perfil->id,['class'=>'form-control']) !!}
                    </div>

                    <div class="row">
                        <?php
                            if ($perfil->username != '')
                                echo "#".$perfil->username;
                        ?>
                    </div>

                    <div class="row">
                        <p>{!!$perfil->descricao!!}</p>
                        <br/>
                    </div>
                </div>
            </div>
            @if(session('message'))
                <div class="alert alert-danger">
                    {{Session::get('message')}}
                </div>

            @endif
            <div class="row">
                <br/>
                <br/>
                <div class="row">
                    <div class="col-sm-4"">
                        {!!Form::label('pnome','Primeiro Nome')!!}
                    </div>
                    <div class="col-sm-4"">
                        {!!Form::text('nome',$perfil->nome,['placeholder'=>'Nome
                        Completo','class'=>'form-control', ])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4"">
                        {!!Form::label('unome','Apelido')!!}
                    </div>
                    <div class="col-sm-4"">
                        {!!Form::text('apelido',$perfil->apelido,['placeholder'=>'Nome
                        Completo','class'=>'form-control'])!!}
                    </div>
                </div>
                <!--
                                <div class="row">
                                    <div class="col-lg-6">
                                        {!!Form::label('password','Password')!!}
                                    </div>
                                    Por alguma razao, a pass n ficou big.. U know why?
                                    <div class="col-lg-6">
                                        {!!Form::text('tmp',$perfil->password,['placeholder'=>'Username','class'=>'form-control'])!!}
                                        {!!Form::password('password','',['placeholder'=>'A Sua Senha','class'=>'form-control'])!!}
                                    </div>
                                </div>
                -->
                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('data-nascimento','Data de Nascimento')!!}
                    </div>
                    <div class="col-sm-4"">
                        {!!Form::input('date', 'date', $perfil->dataNascimento, ['class' => 'form-control',
                        'placeholder' =>
                        'Date'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('telefone','Telefone')!!}
                    </div>
                    <div class="col-sm-4"">
                        {!!Form::text('telefone',$perfil->telefone,['placeholder'=>'8xxxxxxxx','class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4"">
                        {!!Form::label('email','Email')!!}
                    </div>
                    <div class="col-sm-4"">
                        {!!Form::email('email',$perfil->email,['placeholder'=>'Email','class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4"">
                        {!!Form::label('provincia','Provincia')!!}
                    </div>
                    <div class="col-sm-4"">
                        {!!Form::select('provincia', array('Cabo Delgado' => 'Cabo Delgado', 'Gaza' => 'Gaza', 'Inhambane' =>
                        'Inhambane', 'Manica' => 'Manica', 'Maputo' => 'Maputo', 'Matola' => 'Matola', 'Nampula' =>
                        'Nampula', 'Niassa' => 'Niassa', 'Sofala' => 'Sofala', 'Tete' => 'Tete', 'Zambezia' =>
                        'Zambezia'), $perfil->cidade, ['class'=>'form-control']);!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('escola','Escola')!!}
                    </div>
                    <div class="col-sm-4"">
                        {!!Form::text('escola',$perfil->escola,['placeholder'=>'Escola','class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4"">
                        {!!Form::label('sexo','Sexo')!!}
                    </div>
                    <div class="col-sm-4">
                        {!!Form::select('sexo', array('Masculino' => 'Masculino', 'Feminino' =>
                        'Feminino'), $perfil->sexo, ['class'=>'form-control']);!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4"">
                        {!!Form::label('descricao','Descricao da Tua Pessoa')!!}
                    </div>
                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> -->
                    <div class="col-sm-4"">

                        {!!Form::textarea('descricao',$perfil->descricao,['rows'=> '2', 'placeholder'=>'Texto Descritivo sobre a sua pessoa','class'=>'form-control'])!!}

                    </div>
                </div>
            </div>
        </div>
        <div class="center-block" align="center">
            <br/>
            <br/>
            {!!Form::submit('Editar Perfil',['class'=>'btn-primary']) !!}

        </div>

    </div>
    {!!Form::close()!!}
@stop
