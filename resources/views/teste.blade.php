@extends('layouts.maincontent')


@section('title')
    Teste
@stop


@section('body')


    <div class="row ">

        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs" >


                        <div class="panel-group" style="position: fixed;">
                            <div class="panel panel-info">
                                <div class="panel panel-heading">
                                    {!! Form::label('perguntas',"Perguntas")!!}
                                </div>
                                <div class="panel-body">

                                    <ul>

                                        <?php $j=0;?>
                                        @foreach($perguntas as $pergunta)
                                            {!! Form::hidden('contador',$j=$j+1)!!}
                                            <li> <a href="#pergunta{{$j}}" id="panel{{$j}}" style="color: red" >
                                                    Pergunta {{$j}}

                                                </a></li>

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
            {!! Form::hidden("testeValidacao",'false',['id'=>"testeValidacao"]) !!}
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="background-color: #ffffff">

               <label> <h2 class="text-primary left text-capitalize col-lg-12 col-md-12 col-sm-12 col-xs-12" > Teste | {{$disciplina}} | {{$capitulo->nome}} </h2></label>
                <hr width="100%">



                {!! Form::open(['entregarTeste']) !!}


  <div class="form-group" >




                        <?php $i=0; ?>

                            {!! Form::hidden("vazio",$count,['id'=>"vazio"]) !!}
                          @if($count==0 )

                              <div align="center">

                                 <h3 class="alert alert-warning">Infelizmente nenhuma questão foi registada para esse capítulo.Tente outra hora!</h3>

                              </div>


                           @else
                        @foreach($perguntas as $pergunta)

                        {!! Form::hidden('id',$i=$i+1)  !!}


                        <div class="panel-group" id="pergunta{{$i}}">




                                    <div id="questao">

                                        <h4> {!! Form::label('questao','',['id'=>"perguntass$i"])!!}</h4>
                                        <p>
                                        <hr width="100%">

                                        @if($pergunta->imagem==true)

                                            <div id="opcao1{{$i}}" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                {!! Form::radio("example$i", 1, false, ['class' => 'field','id'=>'example1'.$i,'onclick'=>"alteraResposta('opcao1$i',$i,'op1$i','col-lg-4 col-md-4 col-sm-6 col-xs-12')",'style'=>"display:none"]) !!}
                                                <strong>A. </strong><label class="texto-pergunta"  id="op1{{$i}}" for="example1{{$i}}" ></label>



                                            </div>

                                            <div id="opcao2{{$i}}" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example2'.$i,'onclick'=>"alteraResposta('opcao2$i',$i,'op2$i','col-lg-4 col-md-4 col-sm-6 col-xs-12')",'style'=>"display:none"]) !!}
                                                <strong>B. </strong><label class="texto-pergunta"  id="op2{{$i}}" for="example2{{$i}}"></label>



                                            </div>

                                            <div id="opcao3{{$i}}" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example3'.$i,'onclick'=>"alteraResposta('opcao3$i',$i,'op3$i','col-lg-4 col-md-4 col-sm-6 col-xs-12')",'style'=>"display:none"]) !!}
                                                <strong>C. </strong><label class="texto-pergunta" id="op3{{$i}}" for="example3{{$i}}"></label>


                                            </div>

                                            <div id="opcao4{{$i}}" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example4'.$i,'onclick'=>"alteraResposta('opcao4$i',$i,'op4$i','col-lg-4 col-md-4 col-sm-6 col-xs-12')",'style'=>"display:none"]) !!}
                                                <strong>D. </strong><label class="texto-pergunta"  id="op4{{$i}}" for="example4{{$i}}"></label>


                                            </div>

                                            <div id="opcao5{{$i}}" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example5'.$i,'onclick'=>"alteraResposta('opcao5$i',$i,'op5$i','col-lg-4 col-md-4 col-sm-6 col-xs-12')",'style'=>"display:none"]) !!}
                                                <strong>E. </strong><label class="texto-pergunta"  id="op5{{$i}}" for="example5{{$i}}"></label>


                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div id="content{{$i}}" >

                                                </div>
                                            </div>
                                            {!! Form::hidden("escolhida$i",'',['id'=>"escolhida$i"]) !!}




                                            @else

                                        <div id="opcao1{{$i}}">
                                            {!! Form::radio("example$i", 1, false, ['class' => 'field','id'=>'example1'.$i,'onclick'=>"alteraResposta('opcao1$i',$i,'op1$i','')",'style'=>"display:none"]) !!}
                                            <strong>A. </strong><label class="texto-pergunta"  id="op1{{$i}}" for="example1{{$i}}" ></label>

                                            <hr width="100%" class="hidden-lg hidden-md">

                                        </div>

                                        <div id="opcao2{{$i}}">
                                            {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example2'.$i,'onclick'=>"alteraResposta('opcao2$i',$i,'op2$i','')",'style'=>"display:none"]) !!}
                                            <strong>B. </strong><label class="texto-pergunta"  id="op2{{$i}}" for="example2{{$i}}"></label>

                                            <hr width="100%" class="hidden-lg hidden-md">

                                        </div>

                                        <div id="opcao3{{$i}}">
                                            {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example3'.$i,'onclick'=>"alteraResposta('opcao3$i',$i,'op3$i','')",'style'=>"display:none"]) !!}
                                           <strong>C. </strong><label class="texto-pergunta" id="op3{{$i}}" for="example3{{$i}}"></label>

                                            <hr width="100%" class="hidden-lg hidden-md">

                                        </div>

                                        <div id="opcao4{{$i}}">
                                            {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example4'.$i,'onclick'=>"alteraResposta('opcao4$i',$i,'op4$i','')",'style'=>"display:none"]) !!}
                                            <strong>D. </strong><label class="texto-pergunta"  id="op4{{$i}}" for="example4{{$i}}"></label>

                                            <hr width="100%" class="hidden-lg hidden-md">

                                        </div>

                                        <div id="opcao5{{$i}}">
                                            {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example5'.$i,'onclick'=>"alteraResposta('opcao5$i',$i,'op5$i','')",'style'=>"display:none"]) !!}
                                            <strong>E. </strong><label class="texto-pergunta"  id="op5{{$i}}" for="example5{{$i}}"></label>


                                        </div>

                                        <div id="content{{$i}}">

                                        </div>
                                        {!! Form::hidden("escolhida$i",'',['id'=>"escolhida$i"]) !!}


                                        @endif
                                    </div>





                        </div>


                                <hr  width="100%">
                            @endforeach
                            @endif

                    </div>


                <div style="float: left">
                    {!! Form::hidden('nota','',['id'=>"nota"]) !!}
                    {!! Form::hidden("respCertas",'',['id'=>"respCertas"]) !!}
                    {!! Form::hidden("respErradas",'',['id'=>"respErradas"]) !!}
                    {!! Form::hidden("capituloId",$capitulo->id,['id'=>"capituloId"]) !!}

                    <label id="eliminaTag" class='texto-pergunta' style="display: none"></label>


                    <div id="testeFinal"></div>


                    <label id="resultado" class="alert alert-info" style="display: none"></label>
                </div>
                <div style="float: right">


                    {!!Form::button('Entregar',['class'=>'btn btn-primary','onclick'=>"processarPergunta()", 'id'=>'btn_entregar']) !!}
                </div>
                <hr width="100%">


                {!! Form::close() !!}
            </div>



                    <div class="col-lg-2 col-md-2 hidden-sm hidden-xs" style="float :left;">

                        <div class="panel-group" id="pergunta{{$i}}">
                            <div class="panel panel-info">
                                <div class="panel panel-heading">

                                    {!! Form::label('historico',"Histórico")!!}
                                </div>

                                <div class="panel-body">

                                    <h5 ><label>Testes feitos : </label><label id="feitos"> {{$total}}</label></h5>
                                    <p>
                                    <h5 ><label>Nota máxima : </label><label id="maxima">{{$max}}</label></h5>
                                    <p>
                                    <h5 ><label>Nota mínima  :</label><label id="minima">{{$min}}</label></h5>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


        <div id="resultadoTeste" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Resultado do teste do capitulo "{{$capitulo->nome}}"</h3>
                    </div>
                    <div class="modal-body">
                        <form method="get">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">

                            <div class="col-lg-12">
                                <div class="col-lg-6">

                            <h3 align="right">Nota do teste :</h3>
                                 </div>
                                <div class="col-lg-6">
                                      <h3 align="left">  <label id="notaTeste"></label></h3>
                                </div>
                            </div>

                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <h3 align="right"> Total de Perguntas :</h3>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3><label id="totalPerguntas"></label></h3>

                                    </div>

                                </div>


                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                    <h3 align="right"> Respostas certas :</h3>
                                                                    </div>
                                    <div class="col-lg-6">
                                        <h3><label id="certas"></label></h3>

                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <div class="col-lg-6">
                                        <h3 align="right"> Respostas Erradas :</h3>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3><label id="erradas"></label></h3>

                                    </div>
                                <div class="col-lg-12">

                                    <h4><label id="mensagem"></label></h4>

                                </div>


                                </div>

                            </div>
                            <div>

                            </div>
                        </form>
                    </div>
                    <br>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>

            </div>
        </div>




    <script>
        function alteraResposta(idEscolhido,id,opcaoEscolhida,classe){

            deSeleciona(id,classe);
            document.getElementById(idEscolhido).setAttribute('class','bg-success '+classe);
            opcao=document.getElementById(opcaoEscolhida);

            document.getElementById("escolhida"+id).setAttribute('value',opcao.innerHTML);


            var panel=document.getElementById("panel"+id);

            if(panel.style.color!="green") {
                panel.style.color = "green";
            }
        }

        function deSeleciona(id,classe){
            for (i=1;i<=5;i++)
                document.getElementById('opcao'+i+''+id).setAttribute('class',classe);
        }
    </script>



        <script>

            var vazio = document.getElementById('vazio');
            if(vazio.value==0){

                document.getElementById('btn_entregar').style.display="none";

            }

            function processarPergunta() {

                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();

                } else {

                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {


                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                        var perguntasJson = xmlhttp.responseText;

                        var perguntas = JSON.parse(perguntasJson);

                        //variavel usada para inicializar o teste
                        testeValidacao=document.getElementById('testeValidacao');

                        if(testeValidacao.value=='false'){
                            //inicializaTeste
                            testeValidacao.value='true';

                                for(i=0;i<perguntas.length;i++){

                                div1=document.getElementById('op1'+(i+1));
                                div2=document.getElementById('op2'+(i+1));
                                div3=document.getElementById('op3'+(i+1));
                                div4=document.getElementById('op4'+(i+1));
                                div5=document.getElementById('op5'+(i+1));

                                 var perguntass=document.getElementById('perguntass'+(i+1));

                                 perguntass.innerHTML=(i+1)+". "+perguntas[i].questao;


                                div1.innerHTML= perguntas[i].opcao1;
                                div2.innerHTML=perguntas[i].opcao2;
                                div4.innerHTML=perguntas[i].opcao4;
                                div3.innerHTML=perguntas[i].opcao3;
                                div5.innerHTML=perguntas[i].opcao5;

                            }

                        }

                        else{


                        var pergunta;
                        var perguntaEscolhida;
                        var j = 1;
                        var naoRespondidas = [];
                        var encontraNaoRespondida = false;


                        while (j <= perguntas.length) {

                            perguntaEscolhida = document.getElementById('escolhida'+j);
                            pergunta = perguntas[j-1];



                            if (perguntaEscolhida.value=='') {
                                naoRespondidas.push(" "+j+" ");
                                encontraNaoRespondida = true;

                            }
                            j++;
                        }
                        var text="";
                        if (encontraNaoRespondida==true) {

                            for(var k=0;k<naoRespondidas.length;k++){
                                text+= naoRespondidas[k];
                                if(k+1<naoRespondidas.length){
                                    if(naoRespondidas.length-(k+1)==1){
                                        text+=' e ';
                                    }
                                    else{
                                        text+=' , ';
                                    }
                                }
                            }
                            if(naoRespondidas.length==1){
                                alert("Responda todas as perguntas.A pergunta não respondida é a "+text);
                            }
                          else
                            {alert("Responda todas as perguntas.As perguntas não respondidas são "+text);}
                        }

                        else {

                            var nrCertas = 0;
                            for (i = 0; i < perguntas.length; i++) {
                                perguntaEscolhida = document.getElementById('escolhida' + (i + 1));


                                pergunta = perguntas[i];


                                var content = document.getElementById("content" + (i + 1));

                                var escolhida=perguntaEscolhida.value;
                                var correcta=document.getElementById('eliminaTag');
                                correcta.innerHTML=perguntas[i].opcaoCorrecta;
                                correcta=correcta.innerHTML;
                                if (escolhida == correcta) {

                                    content.setAttribute("class", "alert alert-success");
                                    content.innerHTML = "<strong>Certo</strong> Parabéns a resposta está certa";
                                    nrCertas++;

                                }

                                else {

                                    content.setAttribute("class", "alert alert-danger")
                                    content.innerHTML = "<strong>Errado</strong> A resposta correcta é " + pergunta.opcaoCorrecta;
                                }


                                document.getElementById('example1' + (i + 1)).disabled = true;
                                document.getElementById('example2' + (i + 1)).disabled = true;
                                document.getElementById('example3' + (i + 1)).disabled = true;
                                document.getElementById('example4' + (i + 1)).disabled = true;
                                document.getElementById('example5' + (i + 1)).disabled = true;

                            }

                            btn_entregar = document.getElementById('btn_entregar').disabled = true;

                            var resultado = document.getElementById('resultado');
                            var totalQuestoes = perguntas.length;
                            var percentagemCerto = (nrCertas * 100) / totalQuestoes;
                            resultado.style.display = "block";
                            var notaTeste = (percentagemCerto * 20) / 100;
                            resultado.innerHTML = "<strong>Resultado</strong> " + percentagemCerto.toFixed(2) + "% ( " + notaTeste.toFixed(2) + " Val.)   . Acertou " + nrCertas + " de " + totalQuestoes + " perguntas.";

                            var nota = document.getElementById('nota');
                            nota.value = notaTeste.toFixed(2);
                            var respCertas = document.getElementById('respCertas');
                            respCertas.value = nrCertas;
                            var respErradas = document.getElementById('respErradas');
                            respErradas.value = (totalQuestoes) - nrCertas;


                            var form = $('form[entregarTeste]');
                            var url = form.prop('action');

                            $.ajax({
                                url: url,
                                data: form.serialize(),
                                method: 'POST',
                                success: function (data) {

                                    document.getElementById('notaTeste').innerHTML = percentagemCerto.toFixed(2) + "% ( " + notaTeste.toFixed(2) + " Val)";
                                    document.getElementById('certas').innerHTML = nrCertas;
                                    document.getElementById('erradas').innerHTML = totalQuestoes - nrCertas;
                                    $total = document.getElementById('totalPerguntas').innerHTML = totalQuestoes;

                                    $msg = document.getElementById('mensagem');

                                    if (percentagemCerto < 50) {

                                        $msg.innerHTML = "<strong style=\"color: red\">Mau</strong> Precisa se esforçar mais na proxima vez."

                                    }


                                    else if (percentagemCerto > 50 && percentagemCerto < 75) {

                                        $msg.innerHTML = "<strong style=\"color: green\">Bom</strong> Continue assim e chegarás ao topo."

                                    }

                                    else if (percentagemCerto < 100) {

                                        $msg.innerHTML = "<strong style=\"color: green\">Muito Bom</strong> Continue assim e chegarás a nota máxima."
                                    }
                                    else if (percentagemCerto == 100) {

                                        $msg.innerHTML = "<strong style=\"color: green\">Excelente</strong> Parabéns atingiu a nota máxima."
                                    }

                                    $('#resultadoTeste').modal();


                                    var feitos = document.getElementById('feitos');
                                    var maxima = document.getElementById('maxima');
                                    var minima = document.getElementById('minima');

                                    /*if(feitos.innerHTML=='---'){
                                     feitos.inn;
                                     maxima.innerHTML=notaTeste.toFixed(2);
                                     minima.innerHTML=notaTeste.toFixed(2);
                                     }
                                     else {
                                     feitos.innerHTML = feitos.innerHTML + 1;

                                     if (notaTeste > maxima.innerHTML) {
                                     maxima.innerHTML = notaTeste.toFixed(2);

                                     }
                                     else if (notaTeste < maxima.innerHTML) {
                                     maxima.innerHTML = notaTeste.toFixed(2);

                                     }
                                     }*/
                                }

                            });

                        }
                        }
                    }

                }

                xmlhttp.open("GET","/teste-validacao",true);

                xmlhttp.send();
            }



            window.onbeforeunload = function() {
                return 'Estás prestes a abandonar esta página. Se abandonares a página vais perder o teste.'; };
        </script>


    <script>
//inicializa o teste
document.getElementById('btn_entregar').click();


    </script>


@stop