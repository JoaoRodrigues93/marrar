<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marrar</title>
    <link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/initial.css')}} " rel="stylesheet">
    <link href="{{URL::asset('css/main.css')}} " rel="stylesheet">
    <script src="{{URL::asset('js/jquery.min.js')}}" rel="script"></script>
    <script src="{{URL::asset('js/main.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.js')}} "></script>

    <script>
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
            var login = document.getElementById('login');
            var header, content;


            content ="<br>" +
            " <form method='post' url='login' > <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token() }}\" />"
            +"<input type='hidden' name='opLogin' id='opLogin' value='1' />  "+
            "<input type='email' name='login-email' id='login-email' class='form-control' placeholder='e-mail' /><br/>"+
            " <input type='password' name='login-password' id='login-password' class='form-control' placeholder='password' /></br>" +
            "<button type='submit' class='btn btn-success form-control'>entrar</button><br/>" +
            "</form>" +
            "<p class='text-center'><b>Ou</b></p>"+
            "<a class='btn btn-primary form-control' onclick='closePopover()' data-toggle='modal' data-target='#registo'>Registe-se</a> " +
            "<p class='text-center'><a href='#'>Esqueceu Senha</a></p>";
            login.setAttribute("data-content",content);
        });

        function closePopover(){
                $("[data-toggle='popover']").popover('hide');
        }
    </script>

</head>
<body>

<header>

    <div class="entreVamosMarrarOpc"></div>

    <div class="container sloganContainer">
        <h1 class="slogan"><a data-toggle="modal" href="#registo">entre!</a> vamos marrar</h1>
    </div>

    <nav class="navbar navbar-inverse navbar-fixed-top headerNav">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img class="logo" src="{{URL::asset('img/logo/logo61.png')}}"></a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <button class="btn btn-default" id="login" data-html=true
                           title="<div class='col-lg-6 col-md-6 col-sm-6' id='login-facebook'><a  href='login/facebook'>
                           <img width='22' height='22' alt='Facebook'
           src='{{URL::asset('img/facebook.png')}}'/>Facebook</a></div> <div class='col-lg-6 col-md-6 col-sm-6' id='login-google'>  <a  href='login/google'>
           <img width='22' height='22'   alt='Google+' src='{{URL::asset('img/google.png')}}'/>Google+<a> </div>"
                           data-placement="bottom" data-animation=true data-toggle="popover" data-content="Content">Entrar</button>

                    </li>
                </ul>
            </div>
        </div>
    </nav>


</header>

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
<!-- Dados para o registo --->
<div id="registo" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registo</h4>
            </div>
            <div class="modal-body">
                <form method="post" url="/">
                    <input type='hidden' name='opRegisto' id='opRegisto' value='1' />
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <p><input type="text" id="nome" name="nome" class="form-control" placeholder="nome"/>
                    <p><input type="text" id="apelido" name="apelido" class="form-control" placeholder="apelido"/>
                    <p><input type="text" id="username" name="username" class="form-control" placeholder="username"/>
                    <p><input type="email" id="email" name="email" class="form-control"
                              placeholder="exemplo@exemplo.co.mz"/>
                    <p><input type="password" id="password" name="password" class="form-control" placeholder="password"/>
                    </p>
                    <div>
                        <div class="col-lg-6 col-md6 col-sm-6"><input type="checkbox" name="termos" id="termos" />
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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