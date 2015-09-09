<?php $ranking=true;  ?>
@extends('layouts.maincontent')
@section('body')
    <div class="form-group">

        <div class="container">

            {!!Form::open(array('url'=>'edito-perfil', 'files' => true))!!}


            <div class="row" style="text-align: center;">

                <div class="col-sm-4">
                    <img src="
                        <?php
                    if ($perfil->foto == '')
                        echo "http://192.168.0.100:8000/img/pessoa.png";
                    else
                        echo $perfil -> foto;
                    ?>" class="img-responsive img-rounded"  width="250" height="250" style="margin: 0 auto;">
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <style>
                            h1 {
                                color: #2c97de;
                            }
                        </style>
                        <h1>{!!$perfil->nome!!} {!!$perfil->apelido!!}</h1>
                        {!! Form::hidden('id',$perfil->id,['class'=>'form-control']) !!}
                    </div>

                    <div class="row">
                        #{!!$perfil->username!!}
                    </div>

                    <div class="row">
                        <p>{!!$perfil->descricao!!}</p>
                        <br/>
                    </div>
                </div>
            </div>

            <div class="row">
                <br/>
                <br/>
                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('pnome','Primeiro Nome')!!}
                    </div>
                    <div class="col-sm-4">
                        {!!Form::text('nome',$perfil->nome,['placeholder'=>'Nome
                        Completo','class'=>'form-control', 'disabled' => 'disabled'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('unome','Apelido')!!}
                    </div>
                    <div class="col-sm-4">
                        {!!Form::text('apelido',$perfil->apelido,['placeholder'=>'Nome
                        Completo','class'=>'form-control', 'disabled' => 'disabled'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('data-nascimento','Data de Nascimento')!!}
                    </div>
                    <div class="col-sm-4">
                        {!!Form::input('date', 'date', $perfil->dataNascimento, ['class' => 'form-control',
                        'placeholder' =>
                        'Date', 'disabled' => 'disabled'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('telefone','Telefone')!!}
                    </div>
                    <div class="col-sm-4">
                        {!!Form::text('telefone',$perfil->telefone,['placeholder'=>'8xxxxxxxx','class'=>'form-control', 'disabled' => 'disabled'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('email','Email')!!}
                    </div>
                    <div class="col-sm-4">
                        {!!Form::email('email',$perfil->email,['placeholder'=>'Email','class'=>'form-control', 'disabled' => 'disabled'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('provincia','Provincia')!!}
                    </div>
                    <div class="col-sm-4">
                        {!!Form::select('provincia', array('' => '', 'Cabo Delgado' => 'Cabo Delgado', 'Gaza' => 'Gaza', 'Inhambane' =>
                        'Inhambane', 'Manica' => 'Manica', 'Maputo' => 'Maputo', 'Matola' => 'Matola', 'Nampula' =>
                        'Nampula', 'Niassa' => 'Niassa', 'Sofala' => 'Sofala', 'Tete' => 'Tete', 'Zambezia' =>
                        'Zambezia'), $perfil->cidade, ['class'=>'form-control', 'disabled' => 'disabled']);!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('escola','Escola')!!}
                    </div>
                    <div class="col-sm-4">
                        {!!Form::text('escola',$perfil->escola,['placeholder'=>'Escola','class'=>'form-control', 'disabled' => 'disabled'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('sexo','Sexo')!!}
                    </div>
                    <div class="col-sm-4">
                        {!!Form::select('sexo', array('Masculino' => 'Masculino', 'Feminino' =>
                        'Feminino'), $perfil->sexo, ['class'=>'form-control', 'disabled' => 'disabled']);!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        {!!Form::label('descricao','Descricao da Tua Pessoa')!!}
                    </div>
                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6"> -->
                    <div class="col-sm-4">

                        {!!Form::textarea('descricao',$perfil->descricao,['rows'=> '2', 'placeholder'=>'Texto Descritivo sobre a sua pessoa','class'=>'form-control', 'disabled' => 'disabled'])!!}

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
