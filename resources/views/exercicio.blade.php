@extends('layouts.main')

@section('title')
    Marrar:Exercicios
@stop
@section('body')


    <script xmlns="http://www.w3.org/1999/html">
        function alteraResposta(opcaoEscolhida, idEscolhido) {
            var botao = document.getElementById("hide");
            var valorDaOpcaoEsc = document.getElementById(opcaoEscolhida).innerHTML;
            botao.setAttribute("class", "btn btn-success btn-lg active");
            document.getElementById('hide').disabled=false;
            deSeleciona();
            document.getElementById('respostaEscolhida').setAttribute('value', valorDaOpcaoEsc);
            document.getElementById(idEscolhido).setAttribute('class', 'bg-success');
        }

        function deSeleciona() {
            for (i = 1; i <= 5; i++)
                document.getElementById('opcao' + i).setAttribute('class', '');
        }
        function check() {

            return confirm('Tem certeza que quer desistir?');
        }

    </script>




    <div class="container" onload="inicio()">
        <div class="jumbotron">
            <div id="mensagemFinal" class="hidden">
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>

                <div class=" row">
                    <img class="center-block" id="imagem" src=''/>

                    <h1 style="color: green" id="mensg"></h1>
{{--<small> <p  id="nrAcertos"></p>
    <p  id="nrErros"></p></small>--}}


                        <p class="text-center text-success" id="nrAcertos"></p>
                        <p  class="text-center text-danger" id="nrErros"></p>


                </div>
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>
                <div class="row"><h1></h1></div>
            </div>
            <div id="divPrincipal" class="container">
                <div class="panel panel-body">

                    <div class="row">

                        <div class="col-md-11"><h2 class="text-danger left">{!!$caminho!!}</h2>
                        </div>
                        <div class="col-md-1">
                            <a onclick="return check()" href="{{URL::to('capitulo_list')}}">Desistir</a></div>
                    </div>

                    <div class="progress">
                        <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-success active"
                             role="progressbar" aria-valuenow="70"
                             aria-valuemin="0" aria-valuemax="100" style="width:0%">
                            <span id="barMessage"></span>
                        </div>
                    </div>
                    <div>


                        {!!Form::open(array('url' => 'exercicio')) !!}
                        <h3> {!! Form::label('questao',$pergunta->questao, ['id'=>'questao']) !!}</h3>

                        <p>

                        <div class="container">

                            <div id="opcao1">
                                <p>
                                    {!! Form::radio('example', 1, false, ['class' =>
                                    'field','id'=>'example1','onclick'=>"alteraResposta('op1','opcao1')"])
                                    !!}
                                    <label for="example1" id="op1">{{$pergunta->opcao1}}</label>

                            </div>

                            <div id="opcao2">
                                <p>
                                    {!! Form::radio('example', 1, false, ['class' => 'field',
                                    'id'=>'example2','onclick'=>"alteraResposta('op2','opcao2')"]) !!}
                                    <label for="example2" id="op2">{{$pergunta->opcao2}}</label>
                            </div>

                            <div id="opcao3">
                                <p>
                                    {!! Form::radio('example', 1, false, ['class' => 'field',
                                    'id'=>'example3','onclick'=>"alteraResposta('op3','opcao3')"]) !!}
                                    <label for="example3" id="op3">{{$pergunta->opcao3}}</label>
                            </div>

                            <div id="opcao4">
                                <p>
                                    {!! Form::radio('example', 1, false, ['class' => 'field',
                                    'id'=>'example4','onclick'=>"alteraResposta('op4','opcao4')"]) !!}
                                    <label for="example4" id="op4">{{$pergunta->opcao4}}</label>
                            </div>

                            <div id="opcao5">
                                <p>
                                    {!! Form::radio('example', 1, false, ['class' => 'field',
                                    'id'=>'example5','onclick'=>"alteraResposta('op5','opcao5')"]) !!}
                                    <label for="example5" id="op5">{{$pergunta->opcao5}}</label>
                                </p>
                            </div>

                            <div>
                                {!!Form::hidden('respostaEscolhida','',array('id'=>'respostaEscolhida'))!!}
                                {!!Form::hidden('id',"$pergunta->id",array('id'=>'id'))!!}
                                {!!Form::hidden('proximo',$nrPerguntas,array('id'=>'proximo'))!!}
                                {{--{!!Form::hidden('respostaCerta',$pergunta->opcaoCorrecta,array('id'=>'respostaCerta'))!!}--}}


                            </div>
                        </div>

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

                            function inicio() {

                                var content = document.getElementById("content");
                                content.style.display = "none";
                            }

                            function respostaCorrecta() {
                                //progressBar
                                document.getElementById('hide').disabled=true;

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

                                xmlhttp.open("GET", "exercicio/resposta", true);
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


                                var respostaEscolhida = document.getElementById("respostaEscolhida");


                              //  alert(resposta+' '+respostaEscolhida.value);


                                //compara a resposta escolhida com a resposta certa

                                if (resposta == respostaEscolhida.value) {
                                    // alert("Resposta: "+resposta+" resposta escolhida: "+respostaEscolhida.value);
                                    content.setAttribute("class", "col-md-6 alert alert-success");

                                    content.innerHTML = "<strong>Certo</strong> Parabens a resposta está certa";
                                    contAcertos++;
                                }
                                else {
                                    content.setAttribute("class", "col-md-6 alert alert-danger")
                                    content.innerHTML = "<strong>Errado</strong> A resposta correcta é " + resposta;
                                    contErros++;
                                }
                                //desabilita os radios button
                                document.getElementById("example1").disabled = true;
                                document.getElementById("example2").disabled = true;
                                document.getElementById("example3").disabled = true;
                                document.getElementById("example4").disabled = true;
                                document.getElementById("example5").disabled = true;
                                deSeleciona();
//progress bar
                                var bar = document.getElementById("progressBar");
                                var barMessage = document.getElementById("barMessage");//mensagem no progress bar
                                var percent = ((contAcertos + contErros) / nrPerguntas) * 100;
                                barMessage.innerHTML = percent + "%";
                                bar.style.width = '' + percent + '%';

                                document.getElementById('show').disabled=false;
                            }
                            //metodo ao clicar no botao proximo


                            function vaiPraProximo() {
                                //  alert('Aqui');
                                document.getElementById('show').disabled=true;

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

                                            var divPrincipal = document.getElementById("divPrincipal");
                                            divPrincipal.setAttribute("class", "hidden");
                                            var divWidth = divPrincipal.clientWidth;
                                            var divHeight = divPrincipal.clientHeight;

                                            var mensg = document.getElementById("mensg");
                                            mensagemFinal.setAttribute('class', "panel panel-body visible");


                                            //mensagem com nr de acertos e nr de erros
                                            var imagem = document.getElementById("imagem");
                                            if (contAcertos == 0) {
                                                imagem.setAttribute('src', '{{URL::asset('img/sad.png')}}');
                                                mensg.innerHTML = "Estude mais e tente de novo!";
                                                mensg.setAttribute('class','text-center');
                                                mensg.style.color="red";

                                            } else if (contErros == 0) {
                                                imagem.setAttribute('src', '{{URL::asset('img/1437563374_happy.png')}}');
                                                mensg.innerHTML = "Parabens, es super inteligente";
                                                mensg.style.color="green";
                                                mensg.setAttribute('class','text-center');
                                            }
                                            else {
                                                mensg.innerHTML = "Bom mas precisas praticar mais";
                                                mensg.setAttribute('class','text-center');
                                                mensg.style.color="orange";
                                            }

                                            var nrAcertos = document.getElementById("nrAcertos");
                                            nrAcertos.innerHTML = "Certas: " + contAcertos ;
                                            var nrErros = document.getElementById("nrErros");
                                            nrErros.innerHTML = "Erradas: " + contErros ;

                                            return; //Para não executar o codigo abaixo
                                        }

                                        else {

                                            //  alert(perguntasJson);
                                            var pergunta = JSON.parse(pergunta);
                                            var questao = document.getElementById("questao");
                                            var op1 = document.getElementById("op1");
                                            var op2 = document.getElementById("op2");
                                            var op3 = document.getElementById("op3");
                                            var op4 = document.getElementById("op4");
                                            var op5 = document.getElementById("op5");

//                               var pergunta;
//                               pergunta = perguntas.perguntas[2];

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

                                xmlhttp.open("GET", "proximo", true);
                                xmlhttp.send();
                            }
                            function proximo() {
                                var content = document.getElementById("content");
                                content.style.visibility = 'hidden';
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


                        <div class="container">
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

                        </div>


                        {!!Form::close()!!}

                    </div>

                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 col-lg-offset-10 col-md-offset-10 col-sm-offset-9 col-xs-offset-8"></div>
                </div>
            </div>
            <div class="row"></div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <button type="button" class="btn btn-danger">Teoria</button>
                    <button type="button" class="btn btn-danger disabled">Exercicio</button>
                </div>

            </div>
        </div>
    </div>

@stop