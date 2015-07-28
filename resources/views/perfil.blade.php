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

            {!!Form::open(array('url'=>'registar-perfil'))!!}

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
                        <h1>Criar Perfil</h1>
                    </div>

                    <div class="row">
                        #nome_de_usuario
                    </div>

                    <div class="row">
                        <p>Texto Descritivo sobre a sua pessoa...</p>
                        <br/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="row">
                    <!-- Ta ai Nelson-->
                    <div class="col-lg-6">
                        {!!Form::label('nome','Nome Completo')!!}
                    </div>
                    <div class="col-lg-6">
                        {!!Form::text('nome-completo','',['placeholder'=>'Nome Completo','class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        {!!Form::label('nome-utilizador','Nome do Utilizador')!!}
                    </div>
                    <div class="col-lg-6">
                        {!!Form::text('nome-do-utilizador','',['placeholder'=>'Username','class'=>'form-control'])!!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('data-nascimento','Data de Nascimento')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' =>
                        'Date'])!!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('telefone','Telefone')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::text('telefone','',['placeholder'=>'8xxxxxxxx','class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('email','Email')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::email('email','',['placeholder'=>'Email','class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('cidade','Cidade')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::text('cidade','',['placeholder'=>'Cidade','class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('escola','Escola')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::text('escola','',['placeholder'=>'Escola','class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        {!!Form::label('sexo','Sexo')!!}
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                        <select class="form-control" name="sexo" form="registar">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="center-block" align="center">
                <br/>
                <br/>
                {!!Form::submit('Criar Perfil',['class'=>'btn-primary']) !!}

            </div>

            {!!Form::close()!!}
        </div>

    </div>

</div>

</body>


</html>