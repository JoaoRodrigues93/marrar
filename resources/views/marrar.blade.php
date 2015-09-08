<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marrar</title>
    <link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/animate.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/initial.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/marrar.css')}}" rel="stylesheet">
    {{--<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>--}}
    <script src="{{URL::asset('js/jquery.min.js')}}" rel="script"></script>
    <script src="{{URL::asset('js/marrar.js')}}"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="{{URL::asset('js/WOW.min.js')}}"></script>


</head>
<body>


<span id="body"></span>

<header class="hero">

    <nav class="navbar navbar-inverse navbar-fixed-top headerNav">

        <div class="container">

            <div class="row nav-wrapper">

                <div class="navbar-header col-md-6 col-sm-6 col-xs-6 col-lg-6 text-left">
                    <a class="navbar-brand logo scrolar" href="#body">marrar</a>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <button class="btn btn-default">Entrar</button>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

    <div class="pub row text-center">
        <div class="container">
            <div class="table">
                <div class="header-text">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="light white">Aprender.</h3>

                            <h1 class="white typed">Nunca foi t&atilde;o fac&iacute;l!</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="down-arrow floating-arrow"><a class="scrolarAprender" href="#podeAprender"><i class="fa fa-angle-down"></i></a></div>

</header>

<div class="mainPodeAprender">
    <div id="podeAprender" class="podeAprender container">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <h2 class="text-center">o que pode aprender?</h2>
                <p class="text-faded"><b>Aprenda </b>
                    Matem&#225;tica, Portugu&#234;s,
                    F&#237;sica, Qu&#237;mica, Biologia,
                    Geografia, Hist&#243;ria, Ingl&#234;s,
                    Franc&#234;s e prepare-se
                    para seu exame de admiss&atilde;o
                    <b>gratuitamente</b>...onde e quando quiser.</p>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6">
                <img class="image wow animated swing img-responsive" data-wow-delay="0.36s"
                     src="{{URL::asset('img/aprender/aprender-1646.png')}}">
            </div>
        </div>
    </div>
</div>

<div class="mainComoFunciona">
    <div class="comoFunciona text-center container">
        <h2>como funciona?</h2>

        <div class="funcionando row">
            <div class="col-lg-3 col-md-6 col-sm-6 wow animated zoomIn">
                <img src="{{URL::asset('img/teoria.png')}}" height="84" width="84">
                <h4>Material Te&oacute;rico</h4>
                <p class="text-muted">Come&ccedil;a pelo material de apoio &agrave;s
                    disciplinas e veja exemplos. Leia!
                </p>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 wow animated zoomIn" data-wow-delay="0.3s">
                <img src="{{URL::asset('img/pratica.png')}}" height="84" width="84">
                <h4>Exercic&iacute;os</h4>
                <p class="text-muted">Resolva exerc&iacute;cios. Coloque em pr&aacute;tica o que aprendera. Pratique!
                </p>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 wow animated zoomIn" data-wow-delay="0.6s">
                <img src="{{URL::asset('img/exame.png')}}" height="84" width="84">
                <h4>Exames</h4>
                <p class="text-muted">
                      Os exames s&atilde;o divertidos e interativos. Teste e mostre as suas capacidades.
                </p>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 wow animated zoomIn" data-wow-delay="0.9s">
                <img src="{{URL::asset('img/ranking.png')}}" height="84" width="84">
                <h4>Ranking</h4>
                <p class="text-muted">Fique no topo do ranking e ter&aacute; mais chances de admitir. &Eacute; poss&iacute;vel!
                </p>
            </div>
        </div>
    </div>
</div>

<div class="mainQueDizem">
    <div class="queDizem text-center container">
        <h2>o que os outros dizem</h2>
        <div class="row dizendo">
            <div class="pessoa col-lg-4 col-md-4 col-sm-4 wow animated fadeInUp" data-wow-delay="0.3s">
                <img src="{{URL::asset('img/dizem/severino.jpg')}}" height="145" width="145">

                <p class="text-left">&ldquo;Todos passamos pela fase de prepara&ccedil;&atilde;o
                    aos exames de admiss&atilde;o...criamos uma plataforma que pudesse ajudar os
                    que est&atilde;o nesta fase.  Boa sorte a todos!&rdquo;
                </p>
                <h6 class="text-right">Severino Mateus</h6>
            </div>

            <div class="pessoa col-lg-4 col-md-4 col-sm-4 wow delay-05s animated fadeInUp" data-wow-delay="0.5s">
                <img src="{{URL::asset('img/dizem/patricio.jpg')}}" height="145" width="145">

                <p class="text-left">&ldquo;Est&atilde;o de Parab&eacute;ns gostei
                    [da vossa plataforma, a simplicidade aplicada &eacute; incr&iacute;vel]...ir&iacute;a ajudar muitos Estudantes...&rdquo;
                </p>
                <h6 class="text-right">PaTricio Sweez Jr.</h6>
            </div>

            <div class="pessoa col-lg-4 col-md-4 col-sm-4 wow animated fadeInUp" data-wow-delay="0.7s">
                <img src="{{URL::asset('img/dizem/valdo.jpg')}}" height="145" width="145">

                <p class="text-left">&ldquo;Dando suporte a um dos passos mais importantes da caminhada
                    ...dos que pretendem chegar &agrave; Universidade:
                    "A PREPARA&Ccedil;&Atilde;O PARA O EXAME DE ADMISS&Atilde;O"...
                    AVANTE MARRAR&rdquo;
                </p>
                <h6 class="text-right">Valdo Chuquela</h6>
            </div>
        </div>

    </div>
</div>

<footer>

    <div class="row">
        <div class="rede col-lg-4 col-sm-4 col-md-4">
            <nav>
                <ul>
                    <li><a target="_blank" href="http://www.facebook.com/marrarmoz"></a></li>
                    <li><a target="_blank" href="http://www.twitter.com/marrarmz"></a></li>
                    <li><a target="_blank" href="http://www.plus.google.com"></a></li>
                </ul>
            </nav>
        </div>

        <div class="menu col-lg-8 col-sm-8 col-md-8">
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

<script src="{{URL::asset('js/jquery.easing.min.js')}}" rel="script"></script>
<script src="{{URL::asset('js/noframework.waypoints.min.js')}}"></script>
<script>
    /*wow = new WOW(
            {
                boxClass:     'wow',      // default
                animateClass: 'animated', // default
                offset:       0,          // default
                mobile:       true,       // default
                live:         true        // default
            }
    )*/
    new WOW().init();
</script>

</body>
</html>