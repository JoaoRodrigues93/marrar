@extends('layouts.maincontent')
@section('title')
    Marrar: Exame
@stop
@section('body')

    <script>
        var nrPerguntas = parseInt('{{$nrPerguntas}}');

        function escolheOpcao(id, nr, respota) {
            deSeleciona(nr);
            document.getElementById('opcao' + id).setAttribute('class', 'alert alert-info text-uppercase');
            var btn = document.getElementById('nav' + nr);
            var respostaEscolhida = document.getElementById("resposta" + nr);
            respostaEscolhida.value = respota;
            btn.style.color = "#fff";
            btn.style.backgroundColor = "#5cb85c";
            btn.style.borderColor = "#4cae4c";


        }
        function deSeleciona(nr) {
            for (i = 1; i <= 5; i++)
                document.getElementById('opcao' + i + '' + nr).setAttribute('class', '');
        }
    </script>
    <div class="well">
        <div class="exame-title">
            <h2 class="text-primary"><strong>Exame | {{$disciplina}}</strong></h2>
        </div>
        <div class="exame-time">
            <h4 id="timer" class="text-right text-danger"></h4>
        </div>

        <div class="tab-content">

            <?php
            $i = 0; $idPerguntas = "";
            foreach($perguntas as $pergunta) {
            $idPerguntas [$i] = $pergunta->id;
            $i++;
            ?>
            <div id="pergunta{{$i}}" class="tab-pane fade <?php if ($i == 1) echo "in active"; ?>">
                <h2>{{$pergunta->questao}}</h2>

                <div>
                    <div id="opcao1{{$i}}" class="">
                        <p class="text-left">
                            <input type="radio" id="resposta1{{$i}}" name="resposta{{$i}}"
                                   onclick="escolheOpcao('1{{$i}}','{{$i}}','{{$pergunta->opcao1}}')"/>
                            <label for="resposta1{{$i}}">{{$pergunta->opcao1}}</label>
                    </div>

                    <div id="opcao2{{$i}}">
                        <p class="text-left">
                            <input type="radio" id="resposta2{{$i}}" name="resposta{{$i}}"
                                   onclick="escolheOpcao('2{{$i}}','{{$i}}','{{$pergunta->opcao2}}')"/>
                            <label for="resposta2{{$i}}">{{$pergunta->opcao2}}</label>
                    </div>

                    <div id="opcao3{{$i}}">
                        <p class="text-left">
                            <input type="radio" id="resposta3{{$i}}" name="resposta{{$i}}"
                                   onclick="escolheOpcao('3{{$i}}','{{$i}}','{{$pergunta->opcao3}}')"/>
                            <label for="resposta3{{$i}}">{{$pergunta->opcao3}}</label>
                    </div>

                    <div id="opcao4{{$i}}">
                        <p class="text-left">
                            <input type="radio" id="resposta4{{$i}}" name="resposta{{$i}}"
                                   onclick="escolheOpcao('4{{$i}}','{{$i}}','{{$pergunta->opcao4}}')"/>
                            <label for="resposta4{{$i}}">{{$pergunta->opcao4}}</label>
                    </div>

                    <div id="opcao5{{$i}}">
                        <p class="text-left">
                            <input type="radio" id="resposta5{{$i}}" name="resposta{{$i}}"
                                   onclick="escolheOpcao('5{{$i}}','{{$i}}','{{$pergunta->opcao5}}')"/>
                            <label for="resposta5{{$i}}">{{$pergunta->opcao5}}</label>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        {!!Form::open(array('url' => 'examenormal','onsubmit'=>'return valido()')) !!}
        <ul class="nav nav-pills">
            <?php for($j = 1; $j <= $i; $j++) {
            ?>
            <li id="nav{{$j}}" class="<?php if ($j == 1) echo "active"; ?>"><a data-toggle="pill"
                                                                               href="#pergunta{{$j}}">{{$j}}</a></li>
            <?php }?>
            <?php
            $k = 0;
            for($j = 1; $j <= $i; $j++) {
            ?>
            <input type="hidden" id="pergunta{{$j}}" name="pergunta{{$j}}" value="<?php echo $idPerguntas[$k]; ?>">
            <input type="hidden" id="resposta{{$j}}" name="resposta{{$j}}" value="">
            <?php
            $k++;
            }?>
        </ul>
        <div>
           {!!Form::submit('Entregar',['class'=>'btn btn-primary right', 'id'=>'entregar']) !!}
        </div>
        {!!Form::close()!!}
        <br>
        <br>
    </div>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        var confirmacao;

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

            if (confirmacao == true || valido == true)
                return true;
            else
                return false;
        }

        function confirmarEnvio() {
            confirmacao = true;
            var btn = document.getElementById('entregar');
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

                if (diff == 30) {
                    modalAlert("Tempo de execução de Exame", "O exame termina em 30 segundos.");
                }

                if (diff == 0) {
                    clearInterval(myInterval);
                    modalAlert("Tempo de execução de Exame", "O tempo de execução do exame terminou");
                    confirmacao = true;
                    closeModal();
                    var btn = document.getElementById('entregar');
                    btn.click();
                }
            };
            timer();


        }

        window.onload = function () {
            var Minutes = 60 * 60, display = document.querySelector('#timer');
            startTimer(Minutes, display);
        };


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
    </script>
@stop