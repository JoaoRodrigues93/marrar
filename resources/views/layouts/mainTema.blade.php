<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>
        @yield('title')

    </title>
    @section('links')
        <link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
        <link href="{{URL::asset('css/style.css')}} " rel="stylesheet">
        <script src="{{URL::asset('js/jquery.min.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.js')}} "></script>
        <script src="{{URL::asset('ckeditor/ckeditor.js')}}"></script>
    @show


</head>
<body>


@section('header')
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">

                <a class="navbar-brand" href="/home">Marrar</a>


            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/home">Home</a></li>
                    <li><a href="/disciplina">Disciplinas</a></li>
                    <li><a href="/capitulo">Capitulos</a></li>
                    <li><a href="/tema">Temas</a></li>
                    <li><a href="/pergunta">Perguntas</a></li>
                    <li><a href="/texto">Texto(Português)</a></li>
                    <li><a href="/PerguntaTexto">Perguntas/Texto</a></li>
                </ul>
            </div>
        </div>
    </nav>
@show

@yield('body')

@yield('script')

@section('footer')

    <p align="center">&copy; Marrar  {{date('Y')}}</p>
    <p align="center">&copy; Todos direitos reservados</p>
@show
</body>
</html>