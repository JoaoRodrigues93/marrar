<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marrar</title>
    <link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/style.js')}} " rel="stylesheet">
    <link href="{{URL::asset('css/initial.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/main.css')}} " rel="stylesheet">
    <script src="{{URL::asset('js/jquery.min.js')}}" rel="script"></script>
    <script src="{{URL::asset('marmarrar.js)}}"></script>


</head>
<body>
<span id="body"></span>

<header>

    <div class="entreVamosMarrarOpc"></div>

    <div class="container sloganContainer">
        <h1 class="slogan"><a>entre!</a> vamosmarrar</h1>
    </div>

    <nav class="navbar navbar-inverse navbar-fixed-top headerNav">
        <div class="container-fluid row">
            <div class="navbar-header col-lg-10 col-sm-10 col-xs-10 col-md-10">
                <a class="navbar-brand logo scrolar" href="#body">marrar</a>
            </div>
            <div class="col-lg-2 col-sm-2 col-xs-2 col-md-2">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <button class="btn btn-default">Entrar</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="mainPodeAprender">
    <div class="podeAprender container">

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="row">
                    <h1>o que pode aprender...</h1>
                </div>
                <div class="row podeAprenderDesc">
                    <p class="text-faded text-center -align-center"> Nulla vitae elit libero, a pharetra augue. Vestibulum id ligula
                        porta felis euismod semper. Duis mollis, est non commodo
                        luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                        Duis mollis, est non commodo luctus, nisi erat porttitor ligula,
                        eget lacinia odio sem nec elit.
                    </p>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <img data-wow-delay=".2s"
                     class="img-responsive fa fa-4x fa-newspaper-o wow bounceIn text-primary"
                     src="{{URL::asset('img/aprender.png')}}">
            </div>
        </div>
    </div>
</div>

<div class="mainComoFunciona">

    <div class="comoFunciona text-center container">


        <h1>como funciona?</h1>


        <div class="funcionando row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <img class="fa fa-4x fa-newspaper-o wow bounceIn text-primary"
                     src="{{URL::asset('img/teoria.png')}}" height="84" width="84">

                <h3>Material Teorico</h3>

                <p class="text-muted">Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis.o
                </p>

            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <img class="fa fa-4x fa-newspaper-o wow bounceIn text-primary"
                     src="{{URL::asset('img/pratica.png')}}" height="84" width="84">

                <h3>Exercicios</h3>

                <p class="text-muted">Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper.
                </p>

            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <img class="fa fa-4x fa-newspaper-o wow bounceIn text-primary"
                     src="{{URL::asset('img/exame.png')}}" height="84" width="84">

                <h3>Exames</h3>

                <p class="text-muted">Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo
                </p>

            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <img class="fa fa-4x fa-newspaper-o wow bounceIn text-primary"
                     src="{{URL::asset('img/ranking.png')}}" height="84" width="84">

                <h3>Ranking</h3>

                <p class="text-muted">Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper.
                </p>

            </div>
        </div>
    </div>

</div>

<div class="mainQueDizem">

    <div class="queDizem text-center container">

        <h1>o que os outros dizem</h1>

        <div class="row dizendo">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <img class="img-circle" src="{{URL::asset('img/pessoa.png')}}">

                <p>&ldquo;Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo&rdquo;
                </p>
                <h4>Cras justo odio, dapibus</h4>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <img src="{{URL::asset('img/pessoa.png')}}">

                <p>&ldquo;Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo&rdquo;
                </p>
                <h4>Cras justo odio, dapibus</h4>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <img src="{{URL::asset('img/pessoa.png')}}">

                <p>&ldquo;Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo&rdquo;
                </p>
                <h4>Cras justo odio, dapibus</h4>
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

</body>
</html>