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

            {!!Form::open(array('url'=>'login'))!!}


            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-6">
                {!!Form::text('facebook','',['placeholder'=>'facebook','class'=>'form-control'])!!}
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-6">
                {!!Form::text('googleplus','',['placeholder'=>'googleplus','class'=>'form-control'])!!}
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-1-12">
                <hr/>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-1-12">
                {!!Form::text('username','',['placeholder'=>'Username','class'=>'form-control'])!!}
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-1-12">
                {!!Form::password('password',['placeholder'=>'Password','class'=>'form-control'])!!}
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-1-12">
                {!!Form::submit('login')!!}
            </div>


            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                <label for="aceitar">registar</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-1-12">
                <label for="aceitar">esqueceu a senha?</label>
            </div>

            {!!Form::close()!!}
        </div>

    </div>

</div>

</body>


</html>