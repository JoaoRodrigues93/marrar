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

        <div class="row">

            {!!Form::open(array('url'=>'registar'))!!}


            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::label('nome','Nome completo:')!!}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::text('nome-completo','',['placeholder'=>'Ultimo Nome','class'=>'form-control'])!!}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::label('nome-utilizador','Nome completo:')!!}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::text('nome-do-utilizador','',['placeholder'=>'Ultimo Nome','class'=>'form-control'])!!}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::label('data-nascimento','Data de nascimento:')!!}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date'])!!}
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::label('telefone','Telefone:')!!}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::text('telefone','',['placeholder'=>'8xxxxxxxx','class'=>'form-control'])!!}
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::label('email','Email:')!!}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::email('email','',['placeholder'=>'Email','class'=>'form-control'])!!}
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::label('provincia','Província:')!!}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::text('provincia','',['placeholder'=>'Província','class'=>'form-control'])!!}
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::label('escola','Escola:')!!}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::text('escola','',['placeholder'=>'Escola','class'=>'form-control'])!!}
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::label('sexo','Sexo:')!!}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                {!!Form::text('sexo','',['placeholder'=>'Sexo','class'=>'form-control'])!!}
            </div>


            {!!Form::close()!!}
        </div>

    </div>

</div>

</body>


</html>