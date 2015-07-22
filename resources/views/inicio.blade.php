<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marrar - Pagina Inicial</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="start/css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="start/font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="start/css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="start/css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll text-lowercase" href="#page-top">marrar</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="#about">Sobre</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Como Funciona</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contacto</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact"><button class="btn btn-primary btn-sm">Entrar</button></a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<header>
    <div class="header-content">
        <div class="header-content-inner">
            <h1>marrar</h1>
            <h2>A todo lugar e a todo momento. Estude de forma divertida e prepare o seu futuro!</h2>
            <a href="#services" class="btn btn-primary btn-xl page-scroll">Como Funciona</a>
        </div>
    </div>
</header>

<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">O que aprender?</h2>
                <hr class="light">
                <p class="text-faded">Prepare-se para seu exame de admissão onde quer que esteja!
                    Participe dos exames colectivos e testarás sua chance de admitir na vida real.
                Proporcionamos material organizado de acordo com as disciplinas, exercicios de cada capitulo e exames para estudares brincando.</p>
               {{-- <a href="#" class="btn btn-default btn btn-default btn-xl">Get Started!</a>--}}
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Como Funciona</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>
                    <h3>Material Teórico</h3>
                    <p class="text-muted">Estude com nosso material teórico bem organizado.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                    <h3>Exercicios</h3>
                    <p class="text-muted">Realize exercicios da matéria estudada.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                    <h3>Exames</h3>
                    <p class="text-muted">Realize exames para testar suas capacidades.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                    <h3>Ranking</h3>
                    <p class="text-muted">Fique no topo do ranking e terás mais chances de admitir</p>
                </div>
            </div>
        </div>
    </div>
</section>

<aside class="bg-dark">
    <div class="container text-center">
        <div class="call-to-action">
            {{-- <h2>Free Download at Start Bootstrap!</h2>--}}
            <a href="#" class="btn btn-default btn-xl wow tada">Comece Agora!</a>
        </div>
    </div>
</aside>



<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">Entre em contacto connosco!</h2>
                <hr class="primary">
                <p>Duvidas? Sugestoes? Parceria? Contacte!</p>
            </div>
            <div class="col-lg-4 col-lg-offset-2 text-center">
                <i class="fa fa-phone fa-3x wow bounceIn"></i>
                <p>820000000</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                <p><a target="_blank" href="https://www.facebook.com/marrarmoz">Marrar-Facebook</a></p>
            </div>
        </div>
    </div>
</section>

<!-- jQuery -->
<script src="start/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="start/js/bootstrap.min.js"></script>

<!-- Plugin JavaScript -->
<script src="start/js/jquery.easing.min.js"></script>
<script src="start/js/jquery.fittext.js"></script>
<script src="start/js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="start/js/creative.js"></script>

</body>

</html>
