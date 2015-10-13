@extends('layouts.maincontent')


@section('title')
    a marrar...
@stop
@section('links')
    @parent
    {{--<link rel="stylesheet" href="{{URL::asset('css/marrar.css')}}">--}}
    <link rel="stylesheet" href="{{URL::asset('css/estudar.css')}}">
    <script src="{{URL::asset("js/progressbar.js")}}"></script>
    <script src="{{URL::asset("js/progressbar.min.js")}}"></script>
@stop


@section('body')
    <div class="well estudar">
        <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a onclick="return check()" href="{{URL::to('capituloHome')}}"><p class="text-right"
                                                                                  style="color: grey">Desistir</p></a>
            </div>


        </div>
        <div>
            <div class="teoria">
                Teória
            </div>

            <script>
                /* window.onload = function () {
                 alert("funcionou");
                 var label = document.getElementById('op1');
                 label.style.border = "solid 20px red";
                 label.style.width = "100px";
                 label.style.height = "100px";

                 }*/
                function alteraResposta(opcaoEscolhida, idEscolhido) {
                    var botaoConfirmar = document.getElementById("hide");
                    var valorDaOpcaoEsc = document.getElementById(opcaoEscolhida).innerHTML;
                    botaoConfirmar.setAttribute("class", "btn btn-success btn-lg active");
                    document.getElementById("hide").disabled = false;
                    var classe = document.getElementById('classe');

                    deSeleciona(classe.value);
                    document.getElementById('respostaEscolhida').setAttribute('value', valorDaOpcaoEsc);
                    var opcaoEsc = document.getElementById(idEscolhido);

                    opcaoEsc.setAttribute('class', 'bg-success ' + classe.value);
                    opcaoEsc.style.borderRadius = "5px";
                }


                function deSeleciona(classe) {

                    for (i = 1; i <= 5; i++)
                        document.getElementById('opcao' + i).setAttribute('class', classe);
                }
                function check() {

                    return confirm('Tem certeza que quer desistir?');
                }

            </script>


            <div class="exercicios" onload="inicio()">

                <div class="content-fluid" id="conteud">
                    <div id="mensagemFinal" class="hidden">

                        {{--<div class="row"><h1></h1></div>
                        <div class="row"><h1></h1></div>
                        <div class="row"><h1></h1></div>--}}
                        <div class="">

                            <div id="resultadoF" class="row">


                                {{-- <img class="center-block" id="imagem" src=''/>--}}
                                <div class="row">
                                    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-3"></div>
                                    <div class="col-md-4 col-lg-4 col-sm-4 col-xs-6">
                                        <div class="progress-bar" id="example-percent-container" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:50% ; background-color:white;">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3"></div>

                                </div>

                                <h3 style="color: green" id="mensg"></h3>

                                <p class="text-center text-success" id="nrAcertos"></p>

                                <p class="text-center text-danger" id="nrErros"></p>


                            </div>


                            <div class="row"><h1></h1></div>
                            {{--    <div class="col-lg-1 col-md-1 col-sm-1">
                                    <div class="row"><h1></h1></div>
                                    <div class="row"><h1></h1></div>
                                    <div class="row"><h1></h1></div>
                                    <div class="row">
                                        <button id="seta1" class="seta" onclick="seta()"> → </button>
                                        <a href="/home">  <button id="seta2" class="seta" style="visibility: hidden">  → </button> </a>
                                    </div>
                                   <div class="row"></div>
                                </div>--}}

                        </div>
                        {{--  <div  class=" ">
                              <div class="row">

                                  <ul class="pager">
                                      <li class="previous"><button  class="btn btn-success btn-md left" id="cont1" style="margin-left: 5px" onclick="reload()">Refazer</button></li>
                                      <li class="next"><a style="padding: 0; margin: 5px"  href="/home">
                                              <button  class="btn btn-primary
                                              btn-md"  id="cont2">Terminar</button>

                                          </a></li>
                                  </ul>


                                     --}}{{-- <div class="left"  style="padding-right: 5px">
                                          <button  class="btn btn-success btn-lg left" id="cont1" style="margin-left: 5px" onclick="reload()">Refazer</button></div>
                                      <div class="right" style="padding-left: 5px">
                                          <a href="/home">
                                              <button  class="btn btn-primary
                                              btn-lg"  id="cont2">Terminar</button>

                                          </a>
                                          </div>
  --}}{{--
                                  <br>
                                  <br>
                              </div>
                          </div>--}}

                        {{--<div class="row"><h1></h1></div>
                        <div class="row"><h1></h1></div>
                        <div class="row"><h1></h1></div>
                        <div class="row"><h1></h1></div>
                        <div class="row"><h1></h1></div>
                        <div class="row"><h1></h1></div>
                        <div class="row"><h1></h1></div>
                        <div class="row"><h1></h1></div>--}}
                    </div>

                    <div id="divPrincipal">

                        <div class="row">

                            <div class="col-md-10 col-sm-10 col-xs-8"><h2 class="text-primary">{!!$caminho!!}</h2>
                            </div>

                        </div>
                        @if(!$pergunta)
                            Nao ha exercicio disponivel
                        @else
                            <div class="progress">
                                <div id="progressBar"
                                     class="progress-bar progress-bar-striped progress-bar-success active"
                                     role="progressbar" aria-valuenow="70"
                                     aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                    <span id="barMessage"></span>
                                </div>
                            </div>
                            <div>


                                {!!Form::open(array('url' => 'exercicio')) !!}
                                <h3 class="text-capitalize"> {!! Form::label('questao',"", ['id'=>'questao']) !!}</h3>


                                <div class="row" style="background-color: #ffffff">

                                    <div id="opcao1">

                                        {!! Form::radio('example', 1, false, ['class' =>
                                        'field radio','id'=>'example1','onclick'=>"alteraResposta('op1','opcao1')"])
                                        !!}
                                        <strong>A. </strong><label class="texto-pergunta" for="example1"
                                                                   id="op1"></label>

                                    </div>

                                    <div id="opcao2">

                                        {!! Form::radio('example', 1, false, ['class' => 'field radio',
                                        'id'=>'example2','onclick'=>"alteraResposta('op2','opcao2')"]) !!}
                                        <strong>B. </strong><label class="texto-pergunta" for="example2"
                                                                   id="op2"></label>
                                    </div>

                                    <div id="opcao3">

                                        {!! Form::radio('example', 1, false, ['class' => 'field radio',
                                        'id'=>'example3','onclick'=>"alteraResposta('op3','opcao3')"]) !!}
                                        <strong>C. </strong><label class="texto-pergunta" for="example3"
                                                                   id="op3"></label>
                                    </div>

                                    <div id="opcao4">

                                        {!! Form::radio('example', 1, false, ['class' => 'field radio',
                                        'id'=>'example4','onclick'=>"alteraResposta('op4','opcao4')"]) !!}
                                        <strong>D. </strong> <label class="texto-pergunta" for="example4"
                                                                    id="op4"></label>
                                    </div>

                                    <div id="opcao5">

                                        {!! Form::radio('example', 1, false, ['class' => 'field radio',
                                        'id'=>'example5','onclick'=>"alteraResposta('op5','opcao5')"]) !!}
                                        <strong>E. </strong> <label class="texto-pergunta" for="example5"
                                                                    id="op5"></label>

                                    </div>

                                    <div>

                                        <label id="perguntas" style="display: none"></label>
                                        {!!Form::hidden('respostaEscolhida','',array('id'=>'respostaEscolhida'))!!}
                                        {!!Form::hidden('id',"$pergunta->id",array('id'=>'id'))!!}
                                        {!!Form::hidden('proximo',$nrPerguntas,array('id'=>'proximo'))!!}
                                        {!!Form::hidden('classe','',array('id'=>'classe'))!!}
                                        {{--{!!Form::hidden('respostaCerta',$pergunta->opcaoCorrecta,array('id'=>'respostaCerta'))!!}--}}

                                    </div>
                                </div>




                                {{--    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6" id="content">
                                            </div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">

                                                {!!Form::button('Confirmar',['class'=>'btn btn-success btn-lg
                                                disabled','id'=>'hide','value'=>'Hide',"onclick"=>"respostaCorrecta()"]) !!}
                                                {!!Form::button(' Proximo ',['class'=>'btn btn-primary
                                                btn-lg','id'=>'show','value'=>'Show', "onclick"=>"vaiPraProximo()"])!!}
                                            </div>


                                        </div>

                                    </div>--}}

                                <div id="envio" class="well envio">
                                    <div class="row">
                                        <div class="col-md-8 col-lg-8 col-sm-8" id="content">
                                        </div>
                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                            <div class="right">

                                                {!!Form::button('Confirmar',['class'=>'btn btn-success btn-lg
                                                disabled','id'=>'hide','value'=>'Hide',"onclick"=>"respostaCorrecta()"]) !!}
                                                {!!Form::button('Continuar',['class'=>'btn btn-primary
                                                btn-lg','id'=>'show','value'=>'Show', "onclick"=>"vaiPraProximo()"])!!}
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                </div>

                                {!!Form::close()!!}
                                @endif
                            </div>

                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 col-lg-offset-10 col-md-offset-10 col-sm-offset-9 col-xs-offset-8"></div>

                    </div>
                    <div class="row"><p></p></div>

                </div>

            </div>

        </div>

        <div id="botoes" class="row botoes">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <button id="btn_teoria" class=" btn btn-teoria" onclick="abrirTeoria()">Teória</button>
                <button class="btn btn-primary " id="cont1" style="margin-left: 5px; display: none; float: right;"
                        onclick="reload()">Refazer
                </button>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <button id="btn_exercicio" class="btn btn-exer" disabled onclick="abrirExercicio()">Exercicio</button>
                <a id="a" href="/home">
                    <button class="btn btn-success " id="cont2" style="display: none">Terminar
                    </button>

                </a>

                <div id="right" class="right hidden">
                    <button href="" class="aumentarFont">
                        {{--                        <img src="{{URL::asset('img/icons/font_aumentar.png')}}">--}}
                        A<sup>+</sup>
                    </button>
                    <button href="" class="diminuirFont">
                        {{--                        <img src="{{URL::asset('img/icons/font_diminuir.png')}}">--}}
                        A<sup>-</sup>
                    </button>
                    <button href="" class="background">
                        {{--                        <img id="black" src="{{URL::asset('img/icons/black_white.png')}}">--}}
                        {{--                        <img id="white" hidden="true" src="{{URL::asset('img/icons/white_black.png')}}">--}}
                        A
                    </button>
                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript" charset="utf-8">
        var background = true;
        //        var $z = jQuery.noConflict();
        // Use jQuery com a variavel $e(...)
        $(document).ready(function () {
            $(".aumentarFont").click(function () { //inicia a função ao clicar no id="inc-font"
                var size = $(".teoria").css('font-size'); // altera o font size do <p> que esta dentro de .conteudo

                size = size.replace('px', '');
                size = parseInt(size) + 2; // aumenta 2px na fonte

                $(".teoria").css({'font-size': size + 'px'}); // animação ao alterar font
                return false;
            });
            //diminuindo a fonte
            $(".diminuirFont").click(function () { //inicia a função ao clicar no id="dec-font"
                var size = $(".teoria").css('font-size'); // altera o font size do <p> que esta dentro de .conteudo

                size = size.replace('px', '');
                size = parseInt(size) - 2; // diminuir 2px na fonte

                $(".teoria").css({'font-size': size + 'px'}); // animação ao alterar font
                return false;
            });

            $('.background').click(function () {
                if (background) {
                    $('.teoria').css({'background': 'rgba(0,0,0,0.66)', 'color': 'white'});
                    background = false;
//                    document.getElementById('black').hidden = true;
//                    document.getElementById('white').hidden = false;
                    $('.teoria').css({'background': 'rgba(0,0,0,.66)', 'color': 'white'});
                    $('.background').css({'background': 'white', 'color': 'rgba(0,0,0,.66)'});
                } else {
                    $('#teoria').css({'background': 'white', 'color': 'black'});
                    background = true;
//                    document.getElementById('black').hidden = false;
//                    document.getElementById('white').hidden = true;
                    $('.teoria').css({'background': 'white', 'color': 'black'});
                    $('.background').css({'background': 'rgba(0,0,0,.66)', 'color': 'white'});
                }
            });

        });
    </script>

    <script>
        /* ('#hide').click(function(){
         ('#content').hide();
         ('#hide').hide();
         ('#show').show();
         });*/

        var nrPerguntas = parseInt("{{$nrPerguntas}}");
        var resposta;
        var contAcertos = 0;
        var contErros = 0;
        var perguntas;
        var perguntaActual = 0;

        function inicio() {

            var content = document.getElementById("content");
            content.style.display = "none";
        }


        function respostaCorrecta() {
            //progressBar
            document.getElementById('hide').disabled = true;

            var respostaCorrecta, id, idResposta;
            idResposta = document.getElementById("id");
            id = idResposta.value;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    resposta = xmlhttp.responseText;

                    esconder();

                }
            }

            xmlhttp.open("GET", "/exercicio/resposta", true);
            xmlhttp.send();


        }

        //para esconder o botao confirmar e mostrar o botao proximo
        function
        esconder() {
            var content = document.getElementById("content");
            content.style.visibility = 'visible';
            var hide = document.getElementById("hide");//pega o elemento com id=hide
            var show = document.getElementById("show");
            hide.style.display = "none";//esconde o botao confirmar
            show.style.display = "block";//mostra o botao proximo
            //hide.setAttribute("class","");
            var envio = document.getElementById("envio");

            var respostaEscolhida = document.getElementById("respostaEscolhida");


            //  alert(resposta+' '+respostaEscolhida.value);


            //compara a resposta escolhida com a resposta certa
            var perguntas = document.getElementById("perguntas");
            perguntas.innerHTML = resposta;
            resposta = perguntas.innerHTML;


            if (resposta == respostaEscolhida.value) {
                // alert("Resposta: "+resposta+" resposta escolhida: "+respostaEscolhida.value);
                envio.setAttribute("class", 'well envio-success');

                content.innerHTML = "<p><strong>Certo!</strong></p>";
                contAcertos++;
            }
            else {
                envio.setAttribute("class", 'well alert envio-error')
                content.innerHTML = "<strong>Errado!</strong>" +
                " A resposta correcta é:" + resposta;
                contErros++;
            }

            //desabilita os radios button
            document.getElementById("example1").disabled = true;
            document.getElementById("example2").disabled = true;
            document.getElementById("example3").disabled = true;
            document.getElementById("example4").disabled = true;
            document.getElementById("example5").disabled = true;
            // var classe=document.getElementById('classe');
            // deSeleciona(classe.value);
//progress bar
            var bar = document.getElementById("progressBar");
            var barMessage = document.getElementById("barMessage");//mensagem no progress bar
            var percent = ((contAcertos + contErros) / nrPerguntas) * 100;
            barMessage.innerHTML = percent.toFixed(1) + "%";
            bar.style.width = '' + percent.toFixed(1) + '%';

            document.getElementById('show').disabled = false;
            document.getElementById("content").style.visibility = "none";


        }
        //metodo ao clicar no botao proximo

        function seta() {
            //botao de seta continuar
            var cont1 = document.getElementById("cont1");
            var cont2 = document.getElementById("cont2");
            cont1.style.display = "none";
            cont2.style.display = "block";

            var resultadoF = document.getElementById("resultadoF");
            var refazer = document.getElementById("refazer");
            refazer.setAttribute('class', ' panel-body visible');
            resultadoF.setAttribute('class', 'hidden');
            var ref = document.getElementById("ref");


        }

        function vaiPraProximo() {
            var content = document.getElementById("content");
            content.innerHTML = "";
            content.style.visibility = "none";
            content.disabled = true;
            document.getElementById('show').disabled = true;
            document.getElementById("envio").setAttribute('class', 'well envio');

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    var pergunta = xmlhttp.responseText;


                    if (pergunta == "vazio") {
                        var mensagemFinal = document.getElementById("mensagemFinal");
                        var btn_teoria = document.getElementById("btn_teoria");
                        var btn_exercicio = document.getElementById("btn_exercicio");

                        var divPrincipal = document.getElementById("divPrincipal");
                        divPrincipal.setAttribute("class", "hidden");
                        btn_exercicio.setAttribute('class', "hidden");
                        btn_teoria.setAttribute('class', "hidden");

                        var refazer = document.getElementById("cont1");
                        var terminar = document.getElementById("cont2");
                        refazer.style.display = "block";
                        terminar.style.display = "block";
                        var mensg = document.getElementById("mensg");
                        mensagemFinal.setAttribute('class', " panel-body visible");
                        var percentagemCerto = (contAcertos * 100) / nrPerguntas;
//alert(percentagemCerto);
                        var cor;
                        if (percentagemCerto < 50) {
                            cor = "#ff0000";
                        } else if (percentagemCerto > 75) {
                            cor = "#008000";
                        }
                        else {
                            cor = "#FFA500";
                        }
                        var circle = new ProgressBar.Circle('#example-percent-container', {


                            color: cor,
                            strokeWidth: 3,
                            trailWidth: 1,
                            duration: 1000,
                            text: {
                                value: '0'
                            },
                            step: function (state, bar) {
                                bar.setText((bar.value() * 100).toFixed(0) + "%");

                            }
                        });


                        circle.animate(1, function () {
                            circle.animate(percentagemCerto / 100);

                        });


                        //mensagem com nr de acertos e nr de erros
                        var imagem = document.getElementById("imagem");
                        if (percentagemCerto < 50) {
                            /* imagem.setAttribute('src', '
                            {{URL::asset('img/sad.png')}}');*/
                            mensg.innerHTML = "Estude mais e tente de novo!";
                            mensg.setAttribute('class', 'text-center');
                            mensg.style.color = "red";

                        } else if (percentagemCerto > 75) {
                            /* imagem.setAttribute('src', '
                            {{URL::asset('img/1437563374_happy.png')}}');*/
                            mensg.innerHTML = "Parabéns, acertaste todas questoes";
                            mensg.style.color = "green";
                            mensg.setAttribute('class', 'text-center');
                        }
                        else {
                            mensg.innerHTML = "Bom mas precisas praticar mais";
                            mensg.setAttribute('class', 'text-center');
                            mensg.style.color = "orange";
                        }

                        var nrAcertos = document.getElementById("nrAcertos");
                        nrAcertos.innerHTML = "Certas: " + contAcertos;
                        var nrErros = document.getElementById("nrErros");
                        nrErros.innerHTML = "Erradas: " + contErros;


                        return; //Para não executar o codigo abaixo
                    }

                    else {

                        //  alert(perguntasJson);
                        pergunta = JSON.parse(pergunta);
                        var questao = document.getElementById("questao");
                        var op1 = document.getElementById("op1");
                        var op2 = document.getElementById("op2");
                        var op3 = document.getElementById("op3");
                        var op4 = document.getElementById("op4");
                        var op5 = document.getElementById("op5");

//                               var pergunta;
//                               pergunta = perguntas.perguntas[2];

                        var div1 = document.getElementById("opcao1");
                        var div2 = document.getElementById("opcao2");
                        var div3 = document.getElementById("opcao3");
                        var div4 = document.getElementById("opcao4");
                        var div5 = document.getElementById("opcao5");
                        var classe = document.getElementById('classe');

                        if (pergunta.imagem == true) {

                            div1.setAttribute('class', 'col-lg-2 col-md-2 col-sm-6 col-xs-6');
                            div2.setAttribute('class', 'col-lg-2 col-md-2 col-sm-6 col-xs-6');
                            div3.setAttribute('class', 'col-lg-2 col-md-2 col-sm-6 col-xs-6');
                            div4.setAttribute('class', 'col-lg-2 col-md-2 col-sm-6 col-xs-6');
                            div5.setAttribute('class', 'col-lg-2 col-md-2 col-sm-6 col-xs-6');

                            classe.value = 'col-lg-2 col-md-2 col-sm-6 col-xs-6 opcaoExercicios';

                        }

                        else {
                            div1.setAttribute('class', 'selecionar');
                            div2.setAttribute('class', 'selecionar');
                            div3.setAttribute('class', 'selecionar');
                            div4.setAttribute('class', 'selecionar');
                            div5.setAttribute('class', 'selecionar');
                            classe.value = 'selecionar';

                        }

                        questao.innerHTML = pergunta.questao;
                        op1.innerHTML = pergunta.opcao1;
                        op2.innerHTML = pergunta.opcao2;
                        op3.innerHTML = pergunta.opcao3;
                        op4.innerHTML = pergunta.opcao4;
                        op5.innerHTML = pergunta.opcao5;
                        //  alert(questao.innerHTML+' ' +op1.value);
                        proximo();

                    }
                }

            }

            xmlhttp.open("GET", "/proximo", true);
            xmlhttp.send();
        }
        function proximo() {
            var content = document.getElementById("content");
            content.style.visibility = 'hidden';
            var envio = document.getElementById("")
            var hide = document.getElementById("hide");//pega o elemento com id=hide
            var show = document.getElementById("show");
            hide.style.display = "block";//mostra o botao confirmar
            show.style.display = "none";//esconde o botao proximo

            hide.setAttribute('class', 'btn btn-success btn-lg disabled');//desabilita o botao confirmar
            //desabilita os radios button
            var rad1 = document.getElementById("example1");
            rad1.disabled = false;
            rad1.checked = false;
            var rad2 = document.getElementById("example2");
            rad2.disabled = false;
            rad2.checked = false;
            var rad3 = document.getElementById("example3");
            rad3.disabled = false;
            rad3.checked = false;
            var rad4 = document.getElementById("example4");
            rad4.disabled = false;
            rad4.checked = false;
            var rad5 = document.getElementById("example5");
            rad5.disabled = false;
            rad5.checked = false;


        }

    </script>


    <script>

        var val = false;

        function abrirTeoria() {


            document.getElementById('botoes').setAttribute('class', 'row botoes top');

            if (!val) {
                $('.teoria').load("/teoria.html");
                val = true;
            }
//            $("#conteud").load("/teoria.html");
            $('.teoria').css({
                'display': 'block'
            });

            $('.exercicios').css({
                'display': 'none'
            });

            /*$('body').css({
             'overflow-x': 'hidden'
             });*/
            document.getElementById('right').setAttribute('class', 'right');
            document.getElementById('btn_exercicio').disabled = false;
            document.getElementById('btn_teoria').disabled = true;
        }


        function abrirExercicio() {

            $('.teoria').css({
                'display': 'none'
            });

            $('.exercicios').css({
                'display': 'block'
            });

            document.getElementById('botoes').setAttribute('class', 'row botoes');

            /*$('body').css({
             'overflow-x': 'scroll'
             });*/

            document.getElementById('right').setAttribute('class', 'hidden');
            document.getElementById('btn_exercicio').disabled = true;
            document.getElementById('btn_teoria').disabled = false;
        }

        $(document).ready(function () {

            vaiPraProximo();

        });

        function reload() {
            var uriActual = window.location.pathname;
            window.location.assign(uriActual);
        }

        window.onkeydown = function (event) {
            submeter1(event);


        }


        function submeter1(event) {
            var code = event.keyCode ? event.keyCode : event.which;
            var button1;
            if (code == 13) {
                button1 = document.getElementById("hide");
                button1.click();
            }
        }


        if (document.layers) {
            document.captureEvents(Event.KEYDOWN);
        }

        document.onkeydown = function (evt) {
            var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
            if (keyCode == 13) {
              var  button2 = document.getElementById("show");
                button2.click();
            }

        };

    </script>




@stop