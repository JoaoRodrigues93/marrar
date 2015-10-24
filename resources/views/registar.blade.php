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
    {!!Form::text('primeiro-nome','',['placeholder'=>'Primeiro Nome','class'=>'form-control'])!!}
    </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
    {!!Form::text('ultimo-nome','',['placeholder'=>'Ultimo Nome','class'=>'form-control'])!!}
    </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-1-12">
        {!!Form::text('username','',['placeholder'=>'Username','class'=>'form-control'])!!}
            </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-1-12">
    {!!Form::email('email','',['placeholder'=>'Email','class'=>'form-control'])!!}
            </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-1-12">
    {!!Form::password('password',['placeholder'=>'Password','class'=>'form-control'])!!}
            </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
    {!!Form::checkbox('aceitar')!!}
            <label for="aceitar">Concordo com os termos e condições de uso do marrar</label>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
    {!!Form::submit('registar')!!}
        </div>

    {!!Form::close()!!}
</div>

</div>

</div>

</body>


</html>


