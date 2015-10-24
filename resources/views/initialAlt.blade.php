<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marrar</title>
    <link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
    {{--<script src="{{URL::asset('js/bootstrap.js')}} "></script>
    <link href="{{URL::asset('css/style.js')}} " rel="stylesheet">--}}
    <link href="{{URL::asset('css/initialAlt.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/mainAlt.css')}} " rel="stylesheet">

</head>
<body>

<header>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img class="logo" src="{{URL::asset('img/logo/logo61.png')}}"></a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <button class="btn btn-default">Entrar</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


</header>

<div class="container imgmarrar">
    <div class="entreVamosMarrarOpc"></div>

    <div class="container sloganContainer">
        <h1 class="slogan"><a>entre!</a> vamosmarrar</h1>
    </div>
</div>

<div class="mainPodeAprender">
    <div class="podeAprender container">

        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <h1>o que pode aprender...</h1>
                </div>
                <div class="row podeAprenderDesc">
                    <p>Nulla vitae elit libero, a pharetra augue. Vestibulum id ligula
                        porta felis euismod semper. Duis mollis, est non commodo
                        luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                        Duis mollis, est non commodo luctus, nisi erat porttitor ligula,
                        eget lacinia odio sem nec elit.
                    </p>
                </div>

            </div>
            <div class="col-lg-6">
                <img class="img-responsive" src="{{URL::asset('img/aprender.png')}}">
            </div>
        </div>
    </div>
</div>

<div class="mainComoFunciona">

    <div class="comoFunciona text-center container">


        <h1>como funciona?</h1>


        <div class="row">
            <div class="col-lg-4">
                <img src="{{URL::asset('img/MaterialTeorico.png')}}">

                <h1>Material Teorico</h1>

                <p>Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo
                </p>

            </div>
            <div class="col-lg-4">
                <img src="{{URL::asset('img/exerciciosExames.png')}}">

                <h1>Exercicios e Exames</h1>

                <p>Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo
                </p>

            </div>
            <div class="col-lg-4">
                <img src="{{URL::asset('img/certificado.png')}}">

                <h1>Certificados</h1>

                <p>Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo
                </p>

            </div>
        </div>
    </div>

</div>

<div class="mainQueDizem">

    <div class="queDizem text-center container">

        <h1>o que os outros dizem</h1>

        <div class="row">
            <div class="col-lg-4">
                <img class="img-circle" src="{{URL::asset('img/pessoa.png')}}">

                <p>&ldquo;Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo&rdquo;
                </p>
                <h4>Cras justo odio, dapibus</h4>
            </div>

            <div class="col-lg-4">
                <img src="{{URL::asset('img/pessoa.png')}}">

                <p>&ldquo;Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo&rdquo;
                </p>
                <h4>Cras justo odio, dapibus</h4>
            </div>

            <div class="col-lg-4">
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

        <div class="col-lg-4">
            <nav>
                <ul>
                    <li><a target="_blank" href="http://www.facebook.com"></a></li>
                    <li><a target="_blank" href="http://www.twitter.com"></a></li>
                    <li><a target="_blank" href="http://www.plus.google.com"></a></li>
                </ul>
            </nav>
        </div>

        <div class="col-lg-8">
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