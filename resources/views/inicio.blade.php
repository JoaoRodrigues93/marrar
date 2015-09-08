<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marrar - Pagina Inicial</title>

    <link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/main.css')}} " rel="stylesheet">
    <script src="{{URL::asset('js/jquery.min.js')}}" rel="script"></script>
    <script src="{{URL::asset('marmarrar.js)}}"></script>
    <script src="{{URL::asset('js/bootstrap.js')}} "></script>

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
          rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
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
    <script>
        $(document).ready(function () {
            @if(isset($error))
            $('#errorModal').modal("show");
            @endif
            });



        function closePopover() {
            $('#loginModal').modal('hide');
        }

        function closeModal(modalToClose){
            $('#'+modalToClose).modal('hide');
        }
    </script>
</head>

<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">marrar
                {{--<h2 class="text-lowercase" style="font-family:'Cooper Black'; color: #ffffff;">marrar</h2>--}}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="#about">o que aprender</a>
                </li>
                <li>
                    <a class="page-scroll" href="#services">Como Funciona</a>
                </li>
                <li>
                <a>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#loginModal">
                        Entrar
                    </button>
                </a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<header>
    <div class="header-content">
        <div class="header-content-inner">
            {{--<h2 style="text-shadow: 0px 0px 200px rgba(0,0,0,0); font-family:'Cooper Black'; color: #ffffff; font-size: 6em">marrar</h2>--}}
            <h2 style="text-shadow: 0px 0px 200px rgba(0,0,0,0);  color: #ffffff; font-family: Circular,Helvetica,Arial,sans-serif;">
                Estude de maneira inteligente!</h2>
            <a href="#about" class="btn btn-primary btn-xl page-scroll">O que aprender</a>
        </div>
    </div>
</header>

<section class="bg-primary" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center" style="color:#000">
                <h2 class="section-heading">O que aprender?</h2>
                <hr class="primary">
                <div class="col-lg-8">
                    <p class="text-faded text-right" style="color:#585e53;font-family: Circular,Helvetica,Arial,sans-serif;"><br/>Prepare-se
                        para seu exame de admissão onde quer que esteja!
                        Participe dos exames colectivos e testarás sua chance de admitir na vida real.
                        Proporcionamos material organizado de acordo com as disciplinas, exercicios de cada capitulo e
                        exames para estudares brincando.</p>
                    {{-- <a href="#" class="btn btn-default btn btn-default btn-xl">Get Started!</a>--}}
                </div>
                <div class="col-lg-4">
                    <img src="{{URL::asset('start/img/cross.png')}}" data-wow-delay=".2s"
                         class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" height="240" width="240">
                </div>


            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Como Funciona</h2>
                <hr class="orange">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    {{--<i class="fa fa-4x fa-diamond wow bounceIn text-primary"></i>--}}
                    <img src="{{URL::asset('start/img/teoria.png')}}" data-wow-delay=".2s"
                         class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" height="84" width="84">{{----}}
                    <h3>Material Teórico</h3>

                    <p class="text-muted">Estude com nosso material teórico bem organizado.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    {{--<i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>--}}
                    <img src="{{URL::asset('start/img/pratica.png')}}" data-wow-delay=".2s"
                         class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" height="84" width="84">

                    <h3>Exercicios</h3>

                    <p class="text-muted">Realize exercicios da matéria estudada.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    {{--<i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>--}}
                    <img src="{{URL::asset('start/img/exame.png')}}" data-wow-delay=".2s"
                         class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" height="84" width="84">

                    <h3>Exames</h3>

                    <p class="text-muted">Realize exames para testar as tuas capacidades.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    {{--<i class="fa fa-4x wow bounceIn text-primary" data-wow-delay=".3s"></i>--}}
                    <img src="{{URL::asset('start/img/ranking.png')}}" data-wow-delay=".2s"
                         class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" height="84" width="84">

                    <h3>Ranking</h3>

                    <p class="text-muted">Fique no topo do ranking e terá mais chances de admitir</p>
                </div>
            </div>
        </div>
    </div>
</section>

<aside class="bg-dark">
    <div class="container text-center">
        <div class="call-to-action">
            {{-- <h2>Free Download at Start Bootstrap!</h2>--}}
            <a href="#registoModal" class="btn btn-default btn-xl wow tada" data-toggle='modal'
               data-target='#registoModal'
               style="border-color: #43ba14; background-color: #43ba14; color:#fff;">Comece Agora!</a>

            <div><br/><br/></div>

            <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
                <a href="https://www.facebook.com/marrarmoz" style="float: left;"><img
                            src="{{URL::asset('start/img/facebook.png')}}" data-wow-delay=".2s"
                            class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" height="32" width="32">
                </a>
                <a href="https://twitter.com/marrarmz" style="float: left;"><img
                            src="{{URL::asset('start/img/twitter.png')}}" data-wow-delay=".2s"
                            class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" height="32" width="32">
                </a></div>
            <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
                <a href="" style="float: right;"><p style="color: #ffffff">Sobre nós</p></a>
            </div>

        </div>
    </div>
</aside>


<!--- Registo -->
<div id="registoModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registo</h4>
            </div>
            <div class="modal-body">
                <form method="post" url="/">
                    <input type='hidden' name='opRegisto' id='opRegisto' value='1'/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <p><input type="text" id="nome" name="nome" class="form-control" placeholder="nome" required="true"/>

                    <p><input type="text" id="apelido" name="apelido" class="form-control" placeholder="apelido" required="true"/>

                    <p><input type="text" id="username" name="username" class="form-control" placeholder="nome de utilizador" required="true"/>

                    <p><input type="email" id="email" name="email" class="form-control"
                              placeholder="exemplo@provedor.co.mz" required="true"/>

                    <p><input type="password" id="password" name="password" class="form-control"
                              placeholder="password" required="true"/>
                    </p>

                    <div>
                        <div class="col-lg-6 col-md6 col-sm-6"><input type="checkbox" name="termos" id="termos" required="true"/>
                            <label for="termos">Aceitos os termos e condições</label>
                        </div>
                        <div class="col-lg-6 col-md6 col-sm-6">
                            <button type="submit" class="btn btn-success form-control">Registar</button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <br>

            <div class="modal-footer">
            </div>
        </div>

    </div>
</div>

<!-- Login -->
<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Entrar</h4>
            </div>

            <div class="modal-body">
                <a class="btn btn-primary form-control" id="login-facebook" href='login/facebook'>
                    Entrar com facebook</a>
                <a class="btn btn-primary form-control" id="login-google" href='login/google'>Entrar com google</a>

                <form method='post' url='login'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                    <input type='hidden' name='opLogin' id='opLogin' value='1'/>
                    <input type='text' name='login-email' id='login-email' class='form-control'
                           placeholder='e-mail ou nome de utilizaor' required="true" /><br/>
                    <input type='password' name='login-password' id='login-password' class='form-control'
                           placeholder='password' required="true"/></br>
                    <button type='submit' class='btn btn-success form-control'>entrar</button>
                </form>
                <div class='text-center'><b>Ou</b></div>
                <a class='btn btn-default form-control' onclick="closePopover()" data-toggle='modal'
                   data-target='#registoModal'>Registe-se</a>

                <p class='text-center link'><a href='#'>Esqueceu Senha?</a></p>
            </div>

           {{-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>--}}
        </div>

    </div>
</div>

<div id="errorModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Erro de Login</h4>
            </div>

            <div class="modal-body">
                <p class="text-danger"><strong>O username ou email e password não são válidos</strong></p>
                <button onclick="closeModal('errorModal')" class="btn btn-primary form-control"
                        data-toggle='modal'
                        data-target='#loginModal'
                        >Tente de Novo: Entrar</button>
                    <div class="text-center">OU</div>
                <button onclick="closeModal('errorModal')" class="btn btn-success form-control"
                        data-toggle='modal'
                        data-target='#registoModal'
                        >Registe-se aqui</button>
            </div>

            <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
             </div>
        </div>

    </div>
</div>


<!-- Plugin JavaScript -->
<script src="start/js/jquery.easing.min.js"></script>
<script src="start/js/jquery.fittext.js"></script>
<script src="start/js/wow.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="start/js/creative.js"></script>


</body>

</html>
