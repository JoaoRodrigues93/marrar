<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    @section('head')
        <link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
        <link href="{{URL::asset('js/bootstrap.js')}} " rel="script">
        <link href="{{URL::asset('css/main.css')}} " rel="stylesheet">
        <link href="{{URL::asset('css/aestudar.css')}}" rel="stylesheet">

    @show

</head>
<body>

<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img class="img-responsive logo" src="{{URL::asset('img/logo/logo61.png')}}"></a>
            </div>
            {{--<div>
                <ul class="nav navbar-nav navbar-right">
                    <li><button class="btn btn-default">Entrar</button></li>
                </ul>
            </div>--}}
        </div>
    </nav>
</header>


@yield('conteudo')

<footer>

    <div class="row">

        <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4">
            <nav>
                <ul>
                    <li><a target="_blank" href="http://www.facebook.com"></a></li>
                    <li><a target="_blank" href="http://www.twitter.com"></a></li>
                    <li><a target="_blank" href="http://www.plus.google.com"></a></li>
                </ul>
            </nav>
        </div>

        <div class="col-lg-8 col-sm-8 col-xs-8 col-md-8">
            <nav>
                <ul>
                    <li><a href="about.php">Sobre N&oacute;s</a></li>
                    <li><a href="http://www.blog.com">Blog</a></li>
                    <li><a href="escolas.php">Escolas</a></li>
                    <li><a href="provincias.php">Provicias</a></li>
                    <li><a href="parceiros.php">Parceiros</a></li>
                </ul>
            </nav>
        </div>
    </div>

</footer>

</body>
</html>