@extends('layouts.maincontent')


@section('title')
    a marrar...
@stop
@section('links')
    @parent
    <link rel="stylesheet" href="{{URL::asset('css/marrar.css')}}">

@stop

@section('body')

    {{--<style>
        body{
            background-color: #f9f8f9;
        }
    </style>--}}

    <script >
        function alteraResposta(opcaoEscolhida, idEscolhido) {
            var botaoConfirmar = document.getElementById("hide");
            var valorDaOpcaoEsc = document.getElementById(opcaoEscolhida).innerHTML;
            botaoConfirmar.setAttribute("class", "btn btn-confirmar active");
            document.getElementById("hide").disabled=false;
            classe=document.getElementById('classe');

            deSeleciona(classe.value);
            document.getElementById('respostaEscolhida').setAttribute('value', valorDaOpcaoEsc);
            var opcaoEsc=document.getElementById(idEscolhido);

            opcaoEsc.setAttribute('class', 'bg-success '+classe.value);
            opcaoEsc.style.borderRadius="5px";
        }

        function deSeleciona(classe) {

            for (i = 1; i <= 5; i++)
                document.getElementById('opcao' + i).setAttribute('class', classe);
        }
        function check() {

            return confirm('Tem certeza que quer desistir?');
        }

    </script>


    <div class="well aestudar">

        <div {{--style="background: yellow"--}} class="quenomevoudar" onload="inicio()">
            <div  class="row exercicios" id="conteud">

                {{--<div onload="inicio()">--}}
                    {{--<div  class="content-fluid" id="conteud">--}}
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


                        <div id="divPrincipal">

                            <div class="row">

                                <div class="col-md-10 col-sm-10 col-xs-8" ><h2 class="text-primary">{!!$caminho!!}</h2>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-4">
                                    <a onclick="return check()" href="{{URL::to('capituloHome')}}"><p class="text-right text-danger">Desistir</p></a></div>
                            </div>
                            @if(!$pergunta)
                                Nao ha exercicio disponivel
                            @else
                                <div class="progress">
                                    <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-success active"
                                         role="progressbar" aria-valuenow="70"
                                         aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                        <span id="barMessage"></span>
                                    </div>
                                </div>
                                <div>


                                    {!!Form::open(array('url' => 'exercicio')) !!}
                                    <h3 class="text-capitalize"> {!! Form::label('questao',"", ['id'=>'questao']) !!}</h3>



                                    <div class="container opcoes">
                                        <div id="opcao1">

                                            {!! Form::radio('example', 1, false, ['class' =>
                                            'field radio','id'=>'example1','onclick'=>"alteraResposta('op1','opcao1')"])
                                            !!}
                                            <strong>A. </strong><label class="texto-pergunta" for="example1" id="op1"></label>

                                        </div>

                                        <div id="opcao2">

                                            {!! Form::radio('example', 1, false, ['class' => 'field radio',
                                            'id'=>'example2','onclick'=>"alteraResposta('op2','opcao2')"]) !!}
                                            <strong>B. </strong><label class="texto-pergunta" for="example2" id="op2"></label>
                                        </div>

                                        <div id="opcao3">

                                            {!! Form::radio('example', 1, false, ['class' => 'field radio',
                                            'id'=>'example3','onclick'=>"alteraResposta('op3','opcao3')"]) !!}
                                            <strong>C. </strong><label class="texto-pergunta" for="example3" id="op3"></label>
                                        </div>

                                        <div id="opcao4">

                                            {!! Form::radio('example', 1, false, ['class' => 'field radio',
                                            'id'=>'example4','onclick'=>"alteraResposta('op4','opcao4')"]) !!}
                                            <strong>D. </strong> <label class="texto-pergunta" for="example4" id="op4"></label>
                                        </div>

                                        <div id="opcao5">

                                            {!! Form::radio('example', 1, false, ['class' => 'field radio',
                                            'id'=>'example5','onclick'=>"alteraResposta('op5','opcao5')"]) !!}
                                            <strong>E. </strong> <label class="texto-pergunta" for="example5" id="op5"></label>

                                        </div>

                                        <div>

                                            <label id="perguntas" style="display: none"></label>
                                            {!!Form::hidden('respostaEscolhida','',array('id'=>'respostaEscolhida'))!!}
                                            {!!Form::hidden('id',"$pergunta->id",array('id'=>'id'))!!}
                                            {!!Form::hidden('proximo',$nrPerguntas,array('id'=>'proximo'))!!}
                                            {!!Form::hidden('classe','',array('id'=>'classe'))!!}

                                        </div>
                                    </div>



                                    <div id="envio" class="envio">
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 col-sm-8" id="content">
                                            </div>
                                            <div class="col-md-4 col-lg-4 col-sm-4">
                                                <div class="right">

                                                    {!!Form::button('Confirmar',['class'=>'btn btn-confirmar disabled',
                                                    'id'=>'hide','value'=>'Hide',"onclick"=>"respostaCorrecta()"]) !!}
                                                    {!!Form::button(' Continuar ',['class'=>'btn btn-continuar
                                                     ','id'=>'show','value'=>'Show', "onclick"=>"vaiPraProximo()"])!!}
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

            </div>

            <div class="teoria">

            </div>
        </div>

        <div class="row botoes">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <button id="btn_teoria" class="btn btn-teoria" onclick="abrirTeoria()">Teoria</button>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <button id="btn_exercicio" class="btn btn-exer" disabled onclick="abrirExercicio()">Exercicio</button>
            </div>
        </div>

    </div>



    <script>

        var nrPerguntas = parseInt("{{$nrPerguntas}}");
        var resposta;
        var contAcertos = 0;
        var contErros = 0;
        var perguntas;
        var perguntaActual=0;

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
            var envio=document.getElementById("envio");

            var respostaEscolhida = document.getElementById("respostaEscolhida");


            //  alert(resposta+' '+respostaEscolhida.value);


            //compara a resposta escolhida com a resposta certa
            var perguntas=document.getElementById("perguntas");
            perguntas.innerHTML=resposta;
            resposta=perguntas.innerHTML;


    /*
                if (resposta == respostaEscolhida.value) {
                    // alert("Resposta: "+resposta+" resposta escolhida: "+respostaEscolhida.value);
                    envio.setAttribute("class", 'envio-success');

                    content.innerHTML = "<p><strong>Parabéns!</strong> acertaste a resposta</p>";
                    contAcertos++;
                }
                else {
                    envio.setAttribute("class",  'alert envio-error')
                    content.innerHTML = "<p><strong>Que pena!</strong>A resposta escolhida está errada." +
                            " A resposta correcta é : " +resposta;
                    contErros++;
                }
    */

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
            barMessage.innerHTML = percent.toFixed(1) + "%";
            bar.style.width = '' + percent.toFixed(1) + '%';

            document.getElementById('show').disabled=false;
            document.getElementById("content").style.visibility="none";

        }
        //metodo ao clicar no botao proximo


        function vaiPraProximo() {

            var content= document.getElementById("content");
            content.innerHTML="";
            content.style.visibility="none";
            content.disabled=true;
            document.getElementById('show').disabled=true;
            document.getElementById("envio").setAttribute('class','envio');

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
                        mensagemFinal.setAttribute('class', "visible");


                        //mensagem com nr de acertos e nr de erros
                        var imagem = document.getElementById("imagem");
                        if (contAcertos == 0) {
                            imagem.setAttribute('src', '{{URL::asset('img/sad.png')}}');
                            mensg.innerHTML = "Estude mais e tente de novo!";
                            mensg.setAttribute('class','text-center');
                            mensg.style.color="red";

                        } else if (contErros == 0) {
                            imagem.setAttribute('src', '{{URL::asset('img/1437563374_happy.png')}}');
                            mensg.innerHTML = "Parabéns, acertaste todas questões";
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

                        return; //Para n�o executar o codigo abaixo
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
                        var classe=document.getElementById('classe');

                       if(pergunta.imagem==true){
                            div1.setAttribute('class','col-lg-2 col-md-2 col-sm-6 col-xs-12');
                            div2.setAttribute('class','col-lg-2 col-md-2 col-sm-6 col-xs-12');
                            div3.setAttribute('class','col-lg-2 col-md-2 col-sm-6 col-xs-12');
                            div4.setAttribute('class','col-lg-2 col-md-2 col-sm-6 col-xs-12');
                            div5.setAttribute('class','col-lg-2 col-md-2 col-sm-6 col-xs-12');

                           classe.value='col-lg-2 col-md-2 col-sm-6 col-xs-12';

                        }

                        else{
                            div1.setAttribute('class','');
                            div2.setAttribute('class','');
                            div3.setAttribute('class','');
                            div4.setAttribute('class','');
                            div5.setAttribute('class','');
                           classe.value='';

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
            var envio=document.getElementById("")
            var hide = document.getElementById("hide");//pega o elemento com id=hide
            var show = document.getElementById("show");
            hide.style.display = "block";//mostra o botao confirmar
            show.style.display = "none";//esconde o botao proximo

            hide.setAttribute('class', 'btn btn-confirmar disabled');//desabilita o botao confirmar
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


    <script >



        function abrirTeoria(){

//            $("#conteud").load("/teoria.html");

            $('.exercicios').css({
                'z-index': 1,
                'display': 'none'
            });

            $('.teoria').css({
                'z-index': 2,
                'display': 'block'
            });

            $('.teoria').load("/teoria.html");



            document.getElementById('btn_exercicio').disabled=false;
            document.getElementById('btn_teoria').disabled=true;


        }

        function abrirExercicio(){

            location.reload();
        }

        $(document).ready(function () {

            vaiPraProximo();

        });

    </script>

@stop