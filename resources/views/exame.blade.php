@extends('layouts.maincontent')
@section('title')
Marrar: Exame
@stop
@section('body')


<script>
    var nrPerguntas = parseInt('{{$nrPerguntas}}');
            function escolheOpcao(id, nr) {
            deSeleciona(nr);
                    opcaoEscolhida = document.getElementById('opcao' + id);
                    opcaoEscolhida.setAttribute('class', 'bg-primary');
                    opcaoEscolhida.style.borderRadius = "5px";
                    var btn = document.getElementById('nav' + nr);
                    var respostaEscolhida = document.getElementById("resposta" + nr);
                    var divResposta = document.getElementById('alinea'+id);
                    respostaEscolhida.value = id;
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
    <a class="link" onclick="desistir()" href="#"><p class="text-right">Desistir</p></a>
    <div class="exame-title">
        <h2 class="text-primary hidden-xs"><strong>Exame | {{$disciplina->nome}}</strong></h2>
        <h4 class="text-primary hidden-lg hidden-md hidden-sm">Exame | {{$disciplina->nome}}</h4>
    </div>
    <div class="exame-time">
        <h4 id="timer" class="text-right text-danger"></h4>
    </div>

    <div class="tab-content">

        <?php
        $i = 0;
        $idPerguntas = "";
        foreach ($perguntas as $pergunta) {
            $idPerguntas [$i] = $pergunta->id;
            $i++;
            ?>
            <div id="pergunta{{$i}}" class="tab-pane fade <?php if ($i == 1) echo "in active"; ?>">
                <h2 class="hidden-xs"><?=$pergunta->questao?></h2>
                <h4 class="hidden-lg hidden-md hidden-sm"><?=$pergunta->questao?></h4>

                <div>
                    <div id="opcao1{{$i}}" class="opcao-exame" onclick="escolheOpcao('1{{$i}}','{{$i}}')">
                        <p class="text-left">

                            <input type="radio" id="resposta1{{$i}}" name="resposta{{$i}}"
                                   />
                            <div class="row" for="resposta1{{$i}}"><strong class="col-md-1 col-lg-1 col-sm-1 col-xs-1 text-right">A. </strong><div class='alinea col-md-11 col-lg-11 col-sm-11 col-xs-11' id="alinea1{{$i}}"><?= $pergunta->opcao1 ?></div></div>
                    </div>

                    <div id="opcao2{{$i}}" class="opcao-exame" onclick="escolheOpcao('2{{$i}}','{{$i}}')">
                        <p class="text-left">

                            <input type="radio" id="resposta2{{$i}}" name="resposta{{$i}}"
                                   />
                            <div class="row" for="resposta2{{$i}}"><strong class="col-md-1 col-lg-1 col-sm-1 col-xs-1 text-right">B. </strong><div class='alinea col-md-11 col-lg-11 col-sm-11 col-xs-11' id="alinea2{{$i}}"><?= $pergunta->opcao2 ?></div></div>
                    </div>
                    <div id="opcao3{{$i}}" class="opcao-exame" onclick="escolheOpcao('3{{$i}}','{{$i}}')">
                        <p class="text-left">

                            <input type="radio" id="resposta3{{$i}}" name="resposta{{$i}}"
                                   />
                            <div class="row" for="resposta3{{$i}}"><strong class="col-md-1 col-lg-1 col-sm-1 col-xs-1 text-right">C. </strong><div class='alinea col-md-11 col-lg-11 col-sm-11 col-xs-11' id="alinea3{{$i}}"><?= $pergunta->opcao3 ?></div></div>
                    </div>
                    <div id="opcao4{{$i}}" class="opcao-exame" onclick="escolheOpcao('4{{$i}}','{{$i}}')">
                        <p class="text-left">

                            <input type="radio" id="resposta4{{$i}}" name="resposta{{$i}}"
                                   />
                            <div class="row" for="resposta4{{$i}}"><strong class="col-md-1 col-lg-1 col-sm-1 col-xs-1 text-right">D. </strong><div class='alinea col-md-11 col-lg-11 col-sm-11 col-xs-11' id="alinea4{{$i}}"><?= $pergunta->opcao4 ?></div></div>
                    </div>
                    <div id="opcao5{{$i}}" class="opcao-exame" onclick="escolheOpcao('5{{$i}}','{{$i}}')">
                        <p class="text-left">

                            <input type="radio" id="resposta5{{$i}}" name="resposta{{$i}}"
                                   />
                            <div class="row" for="resposta5{{$i}}"><strong class="col-md-1 col-lg-1 col-sm-1 col-xs-1 text-right">E. </strong><div class='alinea col-md-11 col-lg-11 col-sm-11 col-xs-11' id="alinea5{{$i}}"><?= $pergunta->opcao5 ?></div></div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    {!!Form::open(array("url" => "$action",'onsubmit'=>'return valido()')) !!}
    <ul class="nav nav-pills">
        <?php for ($j = 1; $j <= $i; $j++) {
            ?>
            <li id="nav{{$j}}" class="<?php if ($j == 1) echo "active"; ?>"><a data-toggle="pill"
                                                                               href="#pergunta{{$j}}">{{$j}}</a></li>
            <?php } ?>
            <?php
            $k = 0;
            for ($j = 1; $j <= $i; $j++) {
                ?>
            <input type="hidden" id="pergunta{{$j}}" name="pergunta{{$j}}" value="<?php echo $idPerguntas[$k]; ?>">
            <input type="hidden" id="resposta{{$j}}" name="resposta{{$j}}" value="">
            <?php
            $k++;
        }
        ?>
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
        </div>

    </div>
</div>
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
                    return true;
            }
            else
                    return false;
            }

    function confirmarEnvio() {
    confirmacao = true;
            var btn = document.getElementById('entregar');
            desistirPermitido = false;
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
                    btn.click();
            }
            };
            timer();
    }

    window.onload = function () {
    var Minutes = 60 * 60, display = document.querySelector('#timer');
            retiraRadioButton ();
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

    function desistir() {
    mensagem = "<p>Deseja realmente abandonar o exame? Vais perder todo progresso até aqui.</p>"
            + "<button name='confirmar' class='btn btn-success' id='confirmarEnvio' onclick='confirmarDesistencia ()'>Confirmar</button>"
            + "    <button name='cancelar' class='btn btn-danger' id='cancelarEnvio' onclick='cancelarDesistencia ()'>Cancelar</button>";
            modalAlert("Exame", mensagem);
    }

    function confirmarDesistencia (){
    //window.location.assign("/home")
    desistirPermitido = false;
            window.location = "/home";
            closeModal();
    }

    function cancelarDesistencia (){
    closeModal();
    }

    function retiraRadioButton () {
    var radioButton1;
            for (i = 1; i <= nrPerguntas; i++){
    for (j = 1; j <= 5; j++) {
    radioButton1 = document.getElementById("resposta" + j + "" + i);
            radioButton1.style.display = "none";
    }
    }
    }


    window.onkeydown = function (event){
    submeter(event)
    }


    function submeter(event) {
    var code = event.keyCode ? event.keyCode : event.which;
            var button;
            if (code == 13){
    button = document.getElementById("entregar");
            button.click();
    }
    }
    window.onbeforeunload = function() {
    if (desistirPermitido) return 'Estás prestes a abandonar está pagina. Se abandonares a página vais perder todo o progresso.'; };
</script>
@stopa
