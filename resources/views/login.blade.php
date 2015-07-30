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
        <script src="{{URL::asset('js/bootstrap.js')}} "></script>
    @show
<script>
    $(document).ready(function(){
        $('[data-toggle="popover"]').popover();
        var login = document.getElementById('login');
        var header, content;

        header = "<br/>" +
        "<img alt='Facebook' src='{{URL::asset('img/facebook.png')}}'/>  <img alt='Google+' src='{{URL::asset('img/google.png')}}'/>";
        content =" <form method='post' url='login' > <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token() }}\" />"
        +"<input type='hidden' name='opLogin' id='opLogin' value='1' />  "+
        "<input type='email' name='login-email' id='login-email' class='form-control' placeholder='e-mail' />"+
                " <input type='password' name='login-password' id='login-password' class='form-control' placeholder='password' />" +
        "<button type='submit' class='btn btn-success form-control'>entrar</button> " +
        "</form>" +
                "<p class='text-center'><b>Ou </b></p>"+
        "<p><a class='btn btn-primary form-control' data-toggle='modal' data-target='#registo'>Registe-se</a></p> <p class='text-center'><a href='#'>Esqueceu Senha</a></p>";
        login.setAttribute("data-content",content);
    });
</script>

</head>
<body>
<div class="container">
    <br>
    <br>
    <p>
        <a class="btn btn-success" id="login" href="#" data-html=true
           title="<div class='col-lg-7 col-md-7 col-sm-7' id='login-facebook'><a  href='login/facebook'><img width='20' height='20' alt='Facebook'
           src='{{URL::asset('img/facebook.png')}}'/>Facebook</a></div> <div class='col-lg-5 col-md-5 col-sm-5' id='login-google'>  <a  href='login/google'>
           <img width='20' height='20'   alt='Google+' src='{{URL::asset('img/google.png')}}'/>Google<a> </div>"
           data-placement="bottom" data-toggle="popover" data-trigger="focus" data-content="Content">Entrar</a>
    </p>
    <p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registo">Registar</button>
    </p>
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
                <form method="post" url="login">
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

</body>
</html>