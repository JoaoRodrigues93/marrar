<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Marrar</title>
        <link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
        <link href="{{URL::asset('css/animate.css')}} " rel="stylesheet">
        <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/initial.css')}} " rel="stylesheet">
        <link href="{{URL::asset('css/marrar.css')}}" rel="stylesheet">
        <script src="{{URL::asset('js/jquery.min.js')}}" rel="script"></script>
        <script src="{{URL::asset('js/marrar.js')}}"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script src="{{URL::asset('js/WOW.min.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.js')}} "></script>

        <script>
        var errorMobile;
function closePopover() {
    $('#loginModal').modal('hide');
}

function closeModal(modalToClose) {
$('#' + modalToClose).modal('hide');
        }
$(document).ready(function () {
@if (isset($error))
        $('#errorModal').modal("show");
        @endif
        @if (isset($errorMobile))
        errorMobile = true;
        @endif
        });</script>


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
                            <ul class="nav navbar-nav navbar-right hidden-xs">
                                <li>
                                    <button  class="btn entrar btn-default" data-toggle="modal" data-target="#loginModal">Entrar</button>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </nav>

            <!-- Login -->


            <div id="login-registo-mobile" class="hidden-lg hidden-md hidden-sm container-fluid">
                <div class="col-xs-12" id="login-mobile">
                    <h3>Entrar</h3>
                    <div>
                        <form method="post" url="login">  
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <input type='hidden' name='opLogin' id='opLogin' value='1'/>
                            <input type='hidden' name='mobile' id='opLogin' value='1'/>
                            <input type="text" name="login-email" id="username-mobile" class="form-control" placeholder='e-mail ou nome de utilizaor' required="true" />
                            <input type="password" name="login-password" id="password-mobile" class="form-control" placeholder="password" required="true" />


                            @if(isset($errorMobile))
                            <label><strong>E-mail ou nome de utilizador e password não confere. Tente de novo</strong></label>
                            @endif
                            <button type="submit" class="btn btn-success form-control">Entrar</button>
                           <label class="text-center ">Ou entre usando:</label>
                            <div class="col-xs-12">
                                <a class="btn btn-primary col-xs-6" id="login-facebook" href='login/facebook'>facebook</a>
                                <a class="btn btn-primary col-xs-6" id="login-google" href='login/google'>google+</a>
                            </div>
                           <br>
                            <a href="#" onclick="abreRegistoMobile()" class="text-center">Registe-se</a>
                        </form>
                    </div>
                </div>
                <div class="col-xs-12 hidden-xs" id="registo-mobile">
                    <h3>Registe-se</h3>
                    <div>
                        <form method="post" url="/">
                            <input type='hidden' name='opRegisto' id='opRegisto' value='1'/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type='hidden' name='mobile' id='opLogin' value='1'/>    
                            <input type="text" id="nome-mobile" name="nome" class="form-control" placeholder="nome" required="true"/>

                            <input type="text" id="apelido-mobile" name="apelido" class="form-control" placeholder="apelido" required="true"/>

                            <input type="text" id="username-mobile" name="username" class="form-control" placeholder="nome de utilizador" required="true"/>

                            <input type="email" id="email-mobile" name="email" class="form-control"
                                   placeholder="exemplo@provedor.co.mz" required="true"/>

                            <input type="password" id="password-mobile" name="password" class="form-control"
                                   placeholder="password" required="true"/>

                            <div>
                                <div class="col-lg-6 col-md6 col-sm">
                                    <label for="termos"><input type="checkbox" name="termos" id="termos" required="true"/>Aceitos os termos e condições</label>
                                </div>
                                <div class="col-lg-6 col-md6 col-sm-6">
                                    <button type="submit" class="btn btn-success form-control">Registar</button>
                                    <a href="#" onclick="abreLoginMobile()" >Estás registado? Entre</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Fim de Login e Registo Mobile -->

            <div class="pub row text-center">
                <div class="container">
                    <div class="table">
                        <div class="header-text">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <h3 class="light white">Aprender.</h3>

                                    <h1 class="white typed">Nunca foi t&atilde;o f&#225;cil!</h1>
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
                        <h2 class="text-center">O que pode aprender?</h2>
                        <p class="text-faded"><b>Aprenda </b>
                            Matem&#225;tica, Portugu&#234;s,
                            F&#237;sica, Qu&#237;mica, Biologia,
                            Geografia, Hist&#243;ria, Ingl&#234;s,
                            Franc&#234;s e prepare-se
                            para seu exame de admiss&atilde;o
                            <b>gratuitamente</b>... Onde e Quando Quiser.</p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <img class="image nam animated swing img-responsive" data-wow-delay="0.36s"
                             src="{{URL::asset('img/aprender/aprender-1646.png')}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="mainComoFunciona">
            <div class="comoFunciona text-center container">
                <h2>Como funciona?</h2>

                <div class="funcionando row">
                    <div class="col-lg-3 col-md-6 col-sm-6 nam animated zoomIn">
                        <img src="{{URL::asset('img/teoria.png')}}" height="84" width="84">
                        <h4>Material Te&oacute;rico</h4>
                        <p class="text-muted">Come&ccedil;a pelo material de apoio &agrave;s
                            disciplinas e veja exemplos. Leia!
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 nam animated zoomIn" data-wow-delay="0.3s">
                        <img src="{{URL::asset('img/pratica.png')}}" height="84" width="84">
                        <h4>Exercic&iacute;os</h4>
                        <p class="text-muted">Resolva exerc&iacute;cios. Coloque em pr&aacute;tica o que aprendera. Pratique!
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 nam animated zoomIn" data-wow-delay="0.6s">
                        <img src="{{URL::asset('img/exame.png')}}" height="84" width="84">
                        <h4>Exames</h4>
                        <p class="text-muted">
                            Os exames s&atilde;o divertidos e interativos. Teste e mostre as suas capacidades.
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 nam animated zoomIn" data-wow-delay="0.9s">
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
                <h2>O que os outros dizem</h2>
                <div class="row dizendo">
                    <div class="pessoa col-lg-4 col-md-4 col-sm-4 nam animated fadeInUp" data-wow-delay="0.3s">
                        <img src="{{URL::asset('img/dizem/severino.jpg')}}" height="145" width="145">

                        <p class="text-center">&ldquo;Todos passamos pela fase de prepara&ccedil;&atilde;o
                            aos exames de admiss&atilde;o... Criamos uma plataforma que pudesse ajudar os
                            que est&atilde;o nesta fase.  Boa sorte a todos!&rdquo;
                        </p>
                        <h6 class="text-right">Severino Mateus</h6>
                    </div>

                    <div class="pessoa col-lg-4 col-md-4 col-sm-4 nam delay-05s animated fadeInUp" data-wow-delay="0.5s">
                        <img src="{{URL::asset('img/dizem/patricio.jpg')}}" height="145" width="145">

                        <p class="text-center">&ldquo;Est&atilde;o de Parab&eacute;ns, gostei
                            da vossa plataforma. A simplicidade aplicada &eacute; incr&iacute;vel, e ir&#225; ajudar muitos Estudantes...&rdquo;
                        </p>
                        <h6 class="text-right">PaTricio Sweez Jr.</h6>
                    </div>

                    <div class="pessoa col-lg-4 col-md-4 col-sm-4 nam animated fadeInUp" data-wow-delay="0.7s">
                        <img src="{{URL::asset('img/dizem/valdo.jpg')}}" height="145" width="145">

                        <p class="text-center">&ldquo;Dando suporte a um dos passos mais importantes da caminhada... Dos que pretendem chegar &agrave; Universidade:
                            "A PREPARA&Ccedil;&Atilde;O PARA O EXAME DE ADMISS&Atilde;O"...
                            AVANTE MARRAR!!!&rdquo;
                        </p>
                        <h6 class="text-right">Valdo Chuquela</h6>
                    </div>
                </div>

            </div>
        </div>

        <footer>

            <div class="row">
                <div class="rede col-lg-4 col-sm-4 col-md-4 col-xs-6">
                    <nav>
                        <ul>
                            <li><a target="_blank" href="http://www.facebook.com/marrarmoz"></a></li>
                            <li><a target="_blank" href="http://www.twitter.com/marrarmz"></a></li>
                            <li><a target="_blank" href="http://www.plus.google.com"></a></li>
                        </ul>
                    </nav>
                </div>

                <div class="menu col-lg-8 col-sm-8 col-md-8 col-xs-6">
                    <nav>
                        <ul>
                            <li><a href="#">Sobre N&oacute;s</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Escolas</a></li>
                            <li><a href="#">Provicias</a></li>
                            <li><a href="#">Parceiros</a></li>
                        </ul>
                    </nav>
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
                                <button type='submit' class='btn btn-success form-control'>Entrar</button>
                            </form>
                            <div class='text-center'><b>Ou</b></div>
                            <a class='btn btn-default form-control' onclick="closePopover()" data-toggle='modal'
                               data-target='#registoModal'>Registe-se</a>

                            <p class='text-center link'><a href='#'>Esqueceu Senha?</a></p>
                        </div>
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

        </footer>

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

        <script src="{{URL::asset('js/jquery.easing.min.js')}}" rel="script"></script>
        <script>
                                        function abreRegistoMobile (){
                                        var loginMobile, registoMobile;
                                                loginMobile = document.getElementById('login-mobile');
                                                loginMobile.setAttribute('class', 'hidden-xs');
                                                registoMobile = document.getElementById('registo-mobile');
                                                registoMobile.setAttribute('class', 'col-xs-12');
                                        }
                                function abreLoginMobile (){
                                var loginMobile, registoMobile;
                                        registoMobile = document.getElementById('registo-mobile');
                                        registoMobile.setAttribute('class', 'hidden-xs')
                                        loginMobile = document.getElementById('login-mobile');
                                        loginMobile.setAttribute('class', 'col-xs-12')


                                }
        </script>   
        <script>
            new WOW(
            {
            boxClass:     'nam',
                    mobile:       false
            }
            ).init();
        </script>

    </body>
</html>
