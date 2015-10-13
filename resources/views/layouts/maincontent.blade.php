<?php
    $outrasDisciplinas = $_SESSION['disciplinas'];
    $disciplinaEscolhida = $_SESSION['disciplinaActual'];
    $estudante = $_SESSION['estudante'];
    $nrDisciplinas = count($outrasDisciplinas);
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>
    @section('links')
        <link href="{{URL::asset('css/bootstrap.min.css')}} " rel="stylesheet">
        <link href="{{URL::asset('css/style.css')}} " rel="stylesheet">
        <script src="{{URL::asset('js/jquery.min.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.min.js')}} "></script>
        <link href="{{URL::asset('favs/m_marrar_32.png')}} " rel="shortcut icon">


    @show
</head>
<body>
<section id="wrap">
<header>
    <nav class="navbar navbar-default navbar-fixed-top bottom">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/home"><img height="24" src="{{URL::asset('img/logo/logo51.png')}}" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li id="disciplinas" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">@if($disciplinaEscolhida){{$disciplinaEscolhida->nome}}
                            @else
                                 Escolhe disciplina
                            @endif
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @for($i=0;$i<$nrDisciplinas && $i<4;$i++)
                                <li><a href="/disciplinaHome/{{$outrasDisciplinas[$i]->id}}">{{$outrasDisciplinas[$i]->nome}}</a></li>
                            @endfor
                            @if($nrDisciplinas >4)
                                <li>
                                    <a href="/home/maisDisciplinas">Mais Disciplinas</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    @if($disciplinaEscolhida)
                    <li id="exames" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Exames<span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <li><a href="/examenormal">Normal</a></li>
                            <li><a href="/examecolectivo">Colectivo</a></li>

                        </ul>
                    </li>
                    @else
                      <li>   <a href="#" data-toggle="tooltip" data-placement="bottom" title="Escolhe uma disciplina " >Exames</a> </li>
                    @endif
                    <li id="username" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{$estudante->nome}}
                        @if($estudante->foto)

                        @else
                            <span class="glyphicon glyphicon-user"></span>
                            @endif
                            </a>
                            <ul class="dropdown-menu" >
                                <li><a href="/perfil">Perfil</a></li>
                                <li><a href="/auth/logout">Sair</a></li>
                            </ul>
                    <li>
                        <!-- Validacao de Redes Sociais Comexa aki -->
                        <?php
                        if (starts_with($estudante->foto, 'http'))
                        {
                            //Imagem para os que criaram usando redes sociais
                            $fotolink = $estudante->foto;
                        }
                        else {
                            if ($estudante->foto == "")
                            {
                                //Sem Imagem Definida
                                $fotolink = Request::root()."img/pessoa.png";
                            }
                            else
                            {
                                //Imagem para os que criaram perfil no site
                                $fotolink = Request::root().$estudante->foto;
                            }
                        }
                        ?>
                        <a><img width="24" height="24" class="img-responsive" src="{{$fotolink}}"/></a>
                        </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


<div class="container">
        <div class="row">
            <?php
                if(isset($ranking))
                    {
                    ?>

                <div class="bordaCircular tema col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    @yield('body')
                </div>
                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                    @include('ranking')
                </div>
                {{-- Será usado quando o ranking estiver pronto --}}
                {{--
                <div class="col-lg-12 col-md-9 col-sm-9 col-xs-12">
                    @yield('body')
                </div>
                <div class="well col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <h2>Ranking</h2>
                </div>--}}
                <?php } else { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @yield('body')
                </div>
            <?php }?>
        </div>
</div>
</section>


@section('footer')

@show

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
