<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>
    @section('links')
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="{{URL::asset('css/style.css')}} " rel="stylesheet">
        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    @show
</head>
<body>
@section('header')
    <nav class="navbar navbar-default menugestao">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/home">Marrar</a>
            </div>
            <div>
                <ul id="nav" class="nav navbar-nav">
                    <li class="active"><a href="/home">Home</a></li>
                    <li><a href="/disciplina">Disciplinas</a></li>
                    <li><a href="/capitulo">Capitulos</a></li>
                    <li><a href="/tema">Temas</a></li>
                    <li><a href="/pergunta">Perguntas</a></li>
                    <li><a href="/texto">Texto(Português)</a></li>
                    <li><a href="/PerguntaTexto">Perguntas/Texto</a></li>
                    <li><a href="/auth/logout">Sair</a></li>
                </ul>



            </div>

        </div>
    </nav>
@show
@yield('body')
@yield('script')
@section('footer')
    <p align="center">&copy; Marrar LDA {{date('Y')}}</p>
    <p align="center">&copy; Todos direitos reservados</p>
@show
</body>
</html>