<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>
        @yield('title')

    </title>
    @section('links')
    <link href="{{URL::asset('css/bootstrap.min.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}} " rel="stylesheet">
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.js')}} "></script>
    @show


</head>
<body>

<div class="container">

    <div class="form-group">

        <div class="container">

            {!!Form::open(array('url'=>'editar-perfil'))!!}

            <div class="row">
                <div class="col-lg-6">

                    <img src="{{URL::asset('img/pessoa.png')}}">
                </div>
                <div class="col-lg-6">
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
                        <p>Descricao do Usuario - Variavel nao existe na BD!</p>

                        <p>Aproveitando este espaco, este texto em sí deveria fazer parte para ser modificado, mas,
                            temos que todos sentarmos e discutirmos a respeito disto (Como poderemos modificar os dados,
                            e poder melhorar isto).</p>
                        <br/>
                    </div>
                </div>
            </div>

            <!-- Ta ai Nelson-->
            <div class="row">
                <div class="row">
                    <div class="col-lg-6">
                        {!!Form::label('nome','Nome completo (na BD tem variaveis Nome e Apelido, pvt after this)')!!}
                    </div>
                    <div class="col-lg-6">
                        {!!Form::text('nome-completo',$perfil->nome,['placeholder'=>'Nome
                        Completo','class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        {!!Form::label('nome-utilizador','Nome do Utilizador')!!}
                    </div>
                    <div class="col-lg-6">
                        {!!Form::text('nome-do-utilizador',$perfil->username,['placeholder'=>'Username','class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('data-nascimento','Data de Nascimento')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::input('date', 'date', $perfil->dataNascimento, ['class' => 'form-control',
                        'placeholder' =>
                        'Date'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('telefone','Telefone')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::text('telefone',$perfil->telefone,['placeholder'=>'8xxxxxxxx','class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('email','Email')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::email('email',$perfil->email,['placeholder'=>'Email','class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('provincia','Provincia')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::text('provincia',$perfil->cidade,['placeholder'=>'Provincia','class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('escola','Escola')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::text('escola',$perfil->escola,['placeholder'=>'Escola','class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('sexo','Sexo - Variavel em Falta na BD!')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                        <select class="form-control" name="sexo" form="registar">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
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
</div>

</body>


</html>