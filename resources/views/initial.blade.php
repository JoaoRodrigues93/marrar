<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marrar</title>
    <link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
    <link href="{{URL::asset('js/bootstrap.js')}} " rel="script">
    <link href="{{URL::asset('css/style.js')}} " rel="stylesheet">
    <link href="{{URL::asset('css/initial.css')}} " rel="stylesheet">
</head>
<body>

<div class="container">

    <header>

        <div class="row">
            <div class="col-lg-6 logo">
                <a><img src="{{URL::asset('img/logo.png')}}"></a>
            </div>
            <div class="col-lg-6">
                <button>Entrar</button>
            </div>
        </div>

    </header>

    <div class="entreVamosMarrar">
        <h1><a>entre.</a> vamos marrar</h1>
        <!--<img src="{{URL::asset('img/vamosmarrar.jpg')}}">-->
    </div>

    <div class="podeAprender">

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

    <div class="comoFunciona">

        <div class="row">
            <h1>como funciona?</h1>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <img src="{{URL::asset('img/MaterialTeorico.png')}}">
            </div>
            <div class="col-lg-4">
                <img src="{{URL::asset('img/exerciciosExames.png')}}">
            </div>
            <div class="col-lg-4">
                <img src="{{URL::asset('img/certificado.png')}}">
            </div>
        </div>
        <div class="row comoFuncionaTitulo">
            <div class="col-lg-4">
                <h1>Material Teorico</h1>
            </div>

            <div class="col-lg-4">
                <h1>Exercicios e Exames</h1>
            </div>

            <div class="col-lg-4">
                <h1>Certificados</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <p>Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo
                </p>
            </div>
            <div class="col-lg-4">
                <p>Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo
                </p>
            </div>
            <div class="col-lg-4">
                <p>Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo
                </p>
            </div>
        </div>

    </div>

    <div class="queDizem">

        <div class="row">
            <h1>o que os outros dizem</h1>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <img src="{{URL::asset('img/pessoa.png')}}">
            </div>

            <div class="col-lg-4">
                <img src="{{URL::asset('img/pessoa.png')}}">
            </div>

            <div class="col-lg-4">
                <img src="{{URL::asset('img/pessoa.png')}}">
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4">
                <p>Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo
                </p>
            </div>

            <div class="col-lg-4">
                <p>Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo
                </p>
            </div>

            <div class="col-lg-4">
                <p>Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod
                    semper. Duis mollis, est non commodo
                </p>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-4">
                <h4>Cras justo odio, dapibus</h4>
            </div>

            <div class="col-lg-4">
                <h4>Cras justo odio, dapibus</h4>
            </div>
            <div class="col-lg-4">
                <h4>Cras justo odio, dapibus</h4>
            </div>
        </div>

    </div>

    <footer>

        <div class="row">
            <div class="col-lg-4">
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Google+</li>
                </ul>
            </div>
            <div class="col-lg-4">
                <ul>
                    <li><a>Sobre Nós</a></li>
                    <li><a>Blog</a></li>
                    <li><a>Escolas</a></li>
                    <li><a>Cidades</a></li>
                    <li><a>Parceiros</a></li>
                </ul>
            </div>
        </div>

    </footer>

</div>
</body>
</html>