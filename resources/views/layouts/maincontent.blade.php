<?php
    $outrasDisciplinas = $_SESSION['disciplinas'];
    $disciplinaEscolhida = $_SESSION['disciplinaActual'];
    $estudante = $_SESSION['estudante'];
    $nrDisciplinas = count($outrasDisciplinas);
?>

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
        <script src="{{URL::asset('js/bootstrap.min.js')}} "></script>
    @show
</head>
<body>
<section id="wrap">
<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home"><img height="24" src="{{URL::asset('img/logo/logo51.png')}}" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li id="disciplinas" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$disciplinaEscolhida->nome}}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @for($i=0;$i<$nrDisciplinas;$i++)
                                <li><a href="disciplinaHome/{{$outrasDisciplinas[$i]->id}}">{{$outrasDisciplinas[$i]->nome}}</a></li>
                            @endfor
                        </ul>
                    </li>
                    <li id="exames" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Exames<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Normal</a></li>
                            <li><a href="#">Colectivo</a></li>
                        </ul>
                    </li>
                    <li id="username" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$estudante->nome}}
                            <span class="glyphicon glyphicon-user"></span>
                            </a>
                        <ul class="dropdown-menu" >
                            <li><a href="#">Perfil</a></li>
                            <li><a href="auth/logout">Sair</a></li>
                        </ul>
                    </li>
                    <li>
                       <a href="#"><img src="" alt="foto-perfil"/></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
            @yield('body')
        </div>
        <div class="jumbotron col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <h2>Ranking</h2>
        </div>
    </div>
</div>
</section>


@section('footer')
    {{--<footer class="footer">
        <div id="footer">
            <div class="container-fluid">
                <ul class="text-left">
                    <li><a href="#"><img width="24" height="24" alt="facebook" src="{{URL::asset('img/icons/facebook.png')}}" /></a></li>
                    <li><a href="#"><img width="24" height="24" alt="twitter" src="{{URL::asset('img/icons/twitter.png')}}" /></a></li>
                </ul>
                <ul class="text-right">
                    <li><a href="#">Sobre Nós</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="#">Testemunhos</a></li>
               </ul>
             </div>
            </div>
    </footer>--}}
@show
</body>
</html>