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

        header = "<img alt='Facebook' src='{{URL::asset('img/facebook.png')}}'/>  <img alt='Google+' src='{{URL::asset('img/google.png')}}'/>";
        content =" <form method='post' url='login' > <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token() }}\" />"
        +"<input type='hidden' name='opLogin' id='opLogin' value='1' />  "+
        "<input type='email' name='login-email' id='login-email' class='form-control' placeholder='e-mail' />"+
                " <input type='password' name='login-password' id='login-password' class='form-control' placeholder='password' />" +
        "<button type='submit' class='btn btn-success form-control'>entrar</button> " +
        "</form>" +
        "<p><a href='#'>Registar</a> <a href='#'>Esqueceu Senha</a></p>";
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
           title="<img alt='Facebook'
           src='{{URL::asset('img/facebook.png')}}'/>  <img alt='Google+' src='{{URL::asset('img/google.png')}}'/>"
           data-placement="bottom" data-toggle="popover" data-content="Content">Entrar</a>
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
                    <input type="text" id="nome" name="nome" class="form-control" placeholder="nome"/>
                    <input type="text" id="apelido" name="apelido" class="form-control" placeholder="apelido"/>
                    <input type="text" id="username" name="username" class="form-control" placeholder="username"/>
                    <input type="email" id="email" name="email" class="form-control"
                           placeholder="exemplo@exemplo.co.mz"/>
                    <input type="password" id="password" name="password" class="form-control" placeholder="password"/>
                    <div>
                    <input type="checkbox" name="termos" id="termos" />
                     <label for="termos">Aceitos os termos e condições</label>
                    <button type="submit" class="btn btn-success">Registar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

</body>
</html>