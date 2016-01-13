@extends('layouts.maincontent')
@section('title')
    Marrar: Exame
@stop

@section('links')
    @parent
    <link rel="stylesheet" type="text/css" href={{URL::asset('css/tab/css/demo.css')}}/>
    <link rel="stylesheet" type="text/css" href={{URL::asset('css/tab/css/tabs.css')}} />
    <link rel="stylesheet" type="text/css" href={{URL::asset('css/tab/css/tabstyles.css')}} />
    <script src={{URL::asset('css/tab/js/modernizr.custom.js')}}></script>
@stop
@section('body')


    <style>
        div.voltar:hover h3 a {
            opacity: 0;
            -webkit-transition-delay: 0.2s;
            transition-delay: 0.2s;
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%);
        }
    </style>

    <script>
        var nrPerguntas = parseInt('{{$nrPerguntas}}');


        function escolheOpcao(id, nr, respota, classe) {
            deSeleciona(nr, classe);
            opcaoEscolhida = document.getElementById('opcao' + id);
            opcaoEscolhida.setAttribute('class', 'bg-success ' + classe);
            opcaoEscolhida.style.borderRadius = "5px";
            var btn = document.getElementById('nav' + nr);
            opcao = document.getElementById(respota);
            var respostaEscolhida = document.getElementById("resposta" + nr);
            respostaEscolhida.value = opcao.innerHTML;
            btn.style.color = "#fff";
            btn.style.backgroundColor = "#5cb85c";
            btn.style.borderColor = "#4cae4c";
        }
        function deSeleciona(nr, classe) {
            for (i = 1; i <= 5; i++)
                document.getElementById('opcao' + i + '' + nr).setAttribute('class', classe);
        }

        $(window).on('load', function () {
            /*var filhos = $('.listaTab').children.length;
            alert(filhos);*/

            $('.listaTab').children[0].on('load', function(){
                   $('#well').css({'border-top-left-radius': '0'});
            });


        });

    </script>

    <section>
        <div class="tabs tabs-style-flip">
            <nav>
                <ul id="listaTab">
                    <li><a href="#section-flip-1" class="icon icon-plane"><span>Exame</span></a></li>
                    @if($texto)
                        <li><a href="#section-flip-2" class="icon icon-date"><span>Texto</span></a></li>
                    @endif
                </ul>
            </nav>
            <div id="well" class="content-wrap well" style="border-top-left-radius: 0">
                <section id="section-flip-1">

                    {{--<div>--}}
                    {{--<a class="link" onclick="desistir()" href="#"><p class="text-right">Desistir</p></a>--}}
                    <a class="desistir btn btn-default right" onclick="desistir()" href="#">Desistir</a>

                    <div class="exame-title row">
                        <h3 class="text-primary hidden-xs col-lg-9 col-md-9 col-sm-9">
                            <strong>
                                {{$disciplina->nome}}
                            </strong>
                        </h3>
                        <h4 class="text-primary hidden-lg hidden-md hidden-sm  col-xs-9">
                            {{$disciplina->nome}}
                        </h4>

                        <div class="exame-time  col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            <h4 id="timer" class="text-right text-danger"></h4>
                        </div>
                    </div>


                    <div class="tab-content">

                        <?php
                        $i = 0;
                        $idPerguntas = "";
                        foreach ($perguntas as $pergunta) {
                        $idPerguntas [$i] = $pergunta->id;
                        $i++;
                        ?>

                        @if($pergunta->imagem==true)


                            <div id="pergunta{{$i}}" class="tab-pane fade <?php if ($i == 1) echo "in active"; ?>">
                                <h2 class="hidden-xs" id="questaoH2{{$i}}"></h2>
                                <h4 class="hidden-lg hidden-md hidden-sm" id="questaoH4{{$i}}"></h4>

                                <div class="row">
                                    <div id="opcao1{{$i}}" class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <p class="text-left">

                                            <input type="radio" style="display: none" id="resposta1{{$i}}"
                                                   name="resposta{{$i}}"
                                                   onclick="escolheOpcao('1{{$i}}','{{$i}}','op1{{$i}}','col-lg-2 col-md-2 col-sm-4 col-xs-6')"/>
                                            <strong>A. </strong><label class="texto-pergunta" for="resposta1{{$i}}"
                                                                       id="op1{{$i}}"></label>
                                    </div>

                                    <div id="opcao2{{$i}}" class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <p class="text-left">

                                            <input type="radio" style="display: none" id="resposta2{{$i}}"
                                                   name="resposta{{$i}}"
                                                   onclick="escolheOpcao('2{{$i}}','{{$i}}','op2{{$i}}','col-lg-2 col-md-2 col-sm-4 col-xs-6')"/>
                                            <strong>B. </strong><label class="texto-pergunta" for="resposta2{{$i}}"
                                                                       id="op2{{$i}}"></label>
                                    </div>

                                    <div id="opcao3{{$i}}" class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <p class="text-left">

                                            <input type="radio" style="display: none" id="resposta3{{$i}}"
                                                   name="resposta{{$i}}"
                                                   onclick="escolheOpcao('3{{$i}}','{{$i}}','op3{{$i}}','col-lg-2 col-md-2 col-sm-4 col-xs-6')"/>
                                            <strong>C. </strong><label class="texto-pergunta" for="resposta3{{$i}}"
                                                                       id="op3{{$i}}"></label>
                                    </div>

                                    <div id="opcao4{{$i}}" class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <p class="text-left">

                                            <input type="radio" style="display: none" id="resposta4{{$i}}"
                                                   name="resposta{{$i}}"
                                                   onclick="escolheOpcao('4{{$i}}','{{$i}}','op4{{$i}}','col-lg-2 col-md-2 col-sm-4 col-xs-6')"/>
                                            <strong>D. </strong><label class="texto-pergunta" for="resposta4{{$i}}"
                                                                       id="op4{{$i}}"></label>
                                    </div>

                                    <div id="opcao5{{$i}}" class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                        <p class="text-left">
                                            <input type="radio" style="display: none" id="resposta5{{$i}}"
                                                   name="resposta{{$i}}"
                                                   onclick="escolheOpcao('5{{$i}}','{{$i}}','op5{{$i}}','col-lg-2 col-md-2 col-sm-4 col-xs-6')"/>
                                            <strong>E. </strong><label class="texto-pergunta" for="resposta5{{$i}}"
                                                                       id="op5{{$i}}"></label>
                                        </p>
                                    </div>
                                </div>
                            </div>




                        @else

                            <div id="pergunta{{$i}}" class="tab-pane fade <?php if ($i == 1) echo "in active"; ?>">
                                <h3 class="hidden-xs" id="questaoH2{{$i}}"></h3>
                                <h4 class="hidden-lg hidden-md hidden-sm" id="questaoH4{{$i}}"></h4>

                                <div>
                                    <div id="opcao1{{$i}}">
                                        <p class="text-left">

                                            <input type="radio" style="display: none" id="resposta1{{$i}}"
                                                   name="resposta{{$i}}"
                                                   onclick="escolheOpcao('1{{$i}}','{{$i}}','op1{{$i}}','')"/>
                                            <strong>A. </strong><label class="texto-pergunta" for="resposta1{{$i}}"
                                                                       id="op1{{$i}}"></label>
                                    </div>

                                    <div id="opcao2{{$i}}">
                                        <p class="text-left">

                                            <input type="radio" style="display: none" id="resposta2{{$i}}"
                                                   name="resposta{{$i}}"
                                                   onclick="escolheOpcao('2{{$i}}','{{$i}}','op2{{$i}}','')"/>
                                            <strong>B. </strong><label class="texto-pergunta" for="resposta2{{$i}}"
                                                                       id="op2{{$i}}"></label>
                                    </div>

                                    <div id="opcao3{{$i}}">
                                        <p class="text-left">

                                            <input type="radio" style="display: none" id="resposta3{{$i}}"
                                                   name="resposta{{$i}}"
                                                   onclick="escolheOpcao('3{{$i}}','{{$i}}','op3{{$i}}','')"/>
                                            <strong>C. </strong><label class="texto-pergunta" for="resposta3{{$i}}"
                                                                       id="op3{{$i}}"></label>
                                    </div>

                                    <div id="opcao4{{$i}}">
                                        <p class="text-left">

                                            <input type="radio" style="display: none" id="resposta4{{$i}}"
                                                   name="resposta{{$i}}"
                                                   onclick="escolheOpcao('4{{$i}}','{{$i}}','op4{{$i}}','')"/>
                                            <strong>D. </strong><label class="texto-pergunta" for="resposta4{{$i}}"
                                                                       id="op4{{$i}}"></label>
                                    </div>

                                    <div id="opcao5{{$i}}">
                                        <p class="text-left">
                                            <input type="radio" style="display: none" id="resposta5{{$i}}"
                                                   name="resposta{{$i}}"
                                                   onclick="escolheOpcao('5{{$i}}','{{$i}}','op5{{$i}}','')"/>
                                            <strong>E. </strong><label class="texto-pergunta" for="resposta5{{$i}}"
                                                                       id="op5{{$i}}"></label>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <?php } ?>
                    </div>
                    {!!Form::open(array("url" => "$action",'onsubmit'=>'return valido()')) !!}
                    <ul class="nav nav-pills col-xs-12 col-lg-12 col-md-12 col-sm-12">
                        <?php for ($j = 1; $j <= $i; $j++) {
                        ?>
                        <li id="nav{{$j}}" class="<?php if ($j == 1) echo "active"; ?>"><a data-toggle="pill"
                                                                                           href="#pergunta{{$j}}">{{$j}}</a>
                        </li>
                        <?php } ?>
                        <?php
                        $k = 0;
                        for ($j = 1; $j <= $i; $j++) {
                        ?>
                        <input type="hidden" id="pergunta{{$j}}" name="pergunta{{$j}}"
                               value="<?php echo $idPerguntas[$k]; ?>">
                        <input type="hidden" id="resposta{{$j}}" name="resposta{{$j}}" value="">
                        <input type="hidden" id="correcta{{$j}}" name="correcta{{$j}}" value="">
                        <label id="correcta" style="display: none"></label>
                        <?php
                        $k++;
                        }
                        ?>
                    </ul>
                    <div class="row">

                        {{--<a class="desistir btn btn-default right" onclick="desistir()" href="#">Desistir</a>--}}
                        {!!Form::submit('Entregar',['class'=>'btn btn-primary right', 'id'=>'entregar']) !!}

                    </div>
                    {!!Form::close()!!}


                    {{--</div>--}}
                    <div class="modal fade" id="mensagem" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 id="modal-title" class="modal-title">Modal Header</h4>
                                </div>
                                <div id="modal-body" class="modal-body">
                                    <p>Some text in the modal.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                @if($texto)

                    <section class="texto" id="section-flip-2"> <p> <strong>{{$texto->titulo}}</strong></p>  <p>{{$texto->texto}}</p></section>

                    @else

                    <input type="hidden" id="section-flip-2">

                @endif


            </div>
            <!-- /content -->
        </div>
        <!-- /tabs -->
    </section>

    <script>


        var confirmacao;
        var desistirPermitido = true;
        function valido() {
            var valido = true;
            var perguntaActualValida = true;
            var respostaEscolhidaActual;
            var valorEscolhido;
            var mensagem;
            for (i = 1; i <= nrPerguntas; i++) {
                respostaEscolhidaActual = document.getElementById("resposta" + i);
                valorEscolhido = respostaEscolhidaActual.value;
                if (valorEscolhido == "" || valorEscolhido == undefined) {
                    perguntaActualValida = false;
                    valido = false;
                }
            }


            if (valido == false && confirmacao != true) {

                mensagem = "<p>Deseja realmente enviar os dados do exames sem respondes todas questões?</p>"
                        + "<button name='confirmar' class='btn btn-success' id='confirmarEnvio' onclick='confirmarEnvio()' >Confirmar</button>"
                        + "    <button name='cancelar' class='btn btn-danger' id='cancelarEnvio' onclick='cancelarEnvio()'>Cancelar</button>";
                modalAlert("Exame", mensagem);
                xmlhttp = new XMLHttpRequest();
            }

            if (confirmacao == true || valido == true) {
                desistirPermitido = false;
                validaExame();
                return true;
            }
            else
                return false;
        }

        function confirmarEnvio() {
            confirmacao = true;
            var btn = document.getElementById('entregar');
            desistirPermitido = false;
            validaExame()
            btn.click();
            closeModal();
        }

        function cancelarEnvio() {
            closeModal();
            confirmacao = false;
        }

        function startTimer(duration, display) {
            var start = Date.now(), diff = 0, minutes, seconds, myInterval;
            myInterval = setInterval(function () {
                timer()
            }, 1000);
            function timer() {
                diff = duration - (((Date.now() - start) / 1000) | 0);
                minutes = (diff / 60) | 0;
                seconds = (diff % 60) | 0;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                display.textContent = minutes + ":" + seconds;
                if (diff == 600) {
                    modalAlert("Tempo de execução de Exame", "O exame termina em 30 segundos.");
                }

                if (diff == 0) {
                    clearInterval(myInterval);
                    modalAlert("Tempo de execução de Exame", "O tempo de execução do exame terminou");
                    confirmacao = true;
                    closeModal();
                    var btn = document.getElementById('entregar');
                    validaExame();
                    btn.click();
                }
            };
            timer();
        }
        //Inicializa exame

        var perguntasJson;
        window.onload = function () {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();

            } else {

                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {


                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    perguntasJson = xmlhttp.responseText;

                    var perguntas = JSON.parse(perguntasJson);
                    var Minutes = 60 * 60, display = document.querySelector('#timer');
                    startTimer(Minutes, display);


                    for (i = 0; i < perguntas.length; i++) {

                        div1 = document.getElementById('op1' + (i + 1));
                        div2 = document.getElementById('op2' + (i + 1));
                        div3 = document.getElementById('op3' + (i + 1));
                        div4 = document.getElementById('op4' + (i + 1));
                        div5 = document.getElementById('op5' + (i + 1));
                        var questaoH2 = document.getElementById('questaoH2' + (i + 1));
                        var questaoH4 = document.getElementById('questaoH4' + (i + 1));
                        questaoH2.innerHTML = (i + 1) + ". " + perguntas[i].questao;
                        questaoH4.innerHTML = (i + 1) + ". " + perguntas[i].questao;


                        div1.innerHTML = perguntas[i].opcao1;
                        div2.innerHTML = perguntas[i].opcao2;
                        div4.innerHTML = perguntas[i].opcao4;
                        div3.innerHTML = perguntas[i].opcao3;
                        div5.innerHTML = perguntas[i].opcao5;

                    }

                }

            }

            xmlhttp.open("GET", "/getExame", true);

            xmlhttp.send();

        };

        function validaExame() {

            var perguntas = JSON.parse(perguntasJson);

            for (i = 0; i < perguntas.length; i++) {
                opcaoCorrecta = document.getElementById('correcta' + (i + 1));

                var pergunta = perguntas[i];

                label = document.getElementById('correcta');
                label.innerHTML = pergunta.opcaoCorrecta;


                opcaoCorrecta.value = label.innerHTML;

            }
        }


        function modalAlert(title, message) {
            var titleDiv, messageDiv;
            titleDiv = document.getElementById("modal-title");
            messageDiv = document.getElementById("modal-body")
            titleDiv.innerHTML = "" + title;
            messageDiv.innerHTML = "<p>" + message + "</p>";
            $("#mensagem").modal();
        }

        function closeModal() {
            $("#mensagem").modal("hide");
        }

        function terminarExame() {
            var xmlhttp = new XMLHttpRequest();
        }

        function desistir() {
            mensagem = "<p>Deseja realmente abandonar o exame? Vais perder todo progresso até aqui.</p>"
                    + "<button name='confirmar' class='btn btn-success' id='confirmarEnvio' onclick='confirmarDesistencia ()'>Confirmar</button>"
                    + "    <button name='cancelar' class='btn btn-danger' id='cancelarEnvio' onclick='cancelarDesistencia ()'>Cancelar</button>";
            modalAlert("Exame", mensagem);
        }

        function confirmarDesistencia() {
            //window.location.assign("/home")
            desistirPermitido = false;
            window.location = "/home";
            closeModal();
        }

        function cancelarDesistencia() {
            closeModal();
        }


        window.onkeydown = function (event) {
            submeter(event)
        }


        function submeter(event) {
            var code = event.keyCode ? event.keyCode : event.which;
            var button;
            if (code == 13) {
                button = document.getElementById("entregar");
                validaExame();
                button.click();
            }
        }
        window.onbeforeunload = function () {
            if (desistirPermitido) return 'Estás prestes a abandonar está pagina. Se abandonares a página vais perder todo o progresso.';
        };
    </script>

    <script src={{URL::asset('css/tab/js/cbpFWTabs.js')}}></script>
    <script>
        (function () {

            [].slice.call(document.querySelectorAll('.tabs')).forEach(function (el) {
                new CBPFWTabs(el);
            });

        })();
    </script>
@stop