@extends('layouts.maincontent')

@section('title')
    Teste
@stop


@section('body')


        <br>

        <div class="col-lg-10 col-md-10 col-sm-9 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">

            <div>
                <h2 class="text-danger left" > Teste |  {{$disciplina}} |{{$capitulo}}</h2>
                <hr>

            </div>

        </div>

    <div class="row">

        <div class="col-lg-2 col-md-2 col-sm-3">

            <div class="col-lg-2 col-md-2 col-sm-0 " style="position: fixed; float: right">
                <br>
                <br>

                <aside role="complementary">
                    <div>
                        <div class="panel-group">
                            <div class="panel panel-info">
                                <div class="panel panel-heading">
                                    {!! Form::label('perguntas',"Perguntas")!!}
                                </div>
                                <div class="panel-body">

                                    <ul style="overflow: auto">

                                        <?php $j=0;?>
                                        @foreach($perguntas as $pergunta)
                                            {!! Form::hidden('contador',$j=$j+1)!!}
                                            <li> <a href="#panel{{$j}}">
                                                    Pergunta {{$j}}

                                                </a></li>

                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>





                </aside>

            </div>

        </div>

        </div>

        <div class="col-lg-10 col-md-10 col-sm-9 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">

            <div style="overflow: hidden">

                <div class="row">



                    <div class="col-lg-9 col-md-9 col-sm-12">


                        <br>
                        <br>
                        <?php $i=0; ?>
                        @foreach($perguntas as $pergunta)



                            <div class="form-group">


                                {!! Form::open() !!}
                                {!! Form::hidden('id',$i=$i+1)  !!}


                                <div class="panel-group" id="panel{{$i}}">
                                    <div class="panel panel-info">
                                        <div class="panel panel-heading">

                                            {!! Form::label('pergunta',"Pergunta $i")!!}
                                        </div>
                                        <div class="panel-body">


                                            <div id="questao">

                                                <h4> {!! Form::label('questao',$pergunta->questao)!!}</h4>
                                                <p>



                                                <div id="opcao1{{$i}}">
                                                    {!! Form::radio("example$i", 1, false, ['class' => 'field','id'=>'example1'.$i,'onclick'=>"alteraResposta('opcao1$i',$i,'$pergunta->opcao1')"]) !!}
                                                    <label   for="example1{{$i}}" >{{$pergunta->opcao1}}</label>
                                                    <p>
                                                </div>

                                                <div id="opcao2{{$i}}">
                                                    {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example2'.$i,'onclick'=>"alteraResposta('opcao2$i',$i,'$pergunta->opcao2')"]) !!}
                                                    <label   for="example2{{$i}}">{{$pergunta->opcao2}}</label>
                                                    <p>
                                                </div>

                                                <div id="opcao3{{$i}}">
                                                    {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example3'.$i,'onclick'=>"alteraResposta('opcao3$i',$i,'$pergunta->opcao3')"]) !!}
                                                    <label   for="example3{{$i}}">{{$pergunta->opcao3}}</label>
                                                    <p>
                                                </div>

                                                <div id="opcao4{{$i}}">
                                                    {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example4'.$i,'onclick'=>"alteraResposta('opcao4$i',$i,'$pergunta->opcao4')"]) !!}
                                                    <label   for="example4{{$i}}">{{$pergunta->opcao4}}</label>
                                                    <p>
                                                </div>

                                                <div id="opcao5{{$i}}">
                                                    {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example5'.$i,'onclick'=>"alteraResposta('opcao5$i',$i,'$pergunta->opcao5')"]) !!}
                                                    <label   for="example5{{$i}}">{{$pergunta->opcao5}}</label>

                                                    <p>
                                                </div>

                                                <div id="content{{$i}}">

                                                </div>
                                                {!! Form::hidden("escolhida$i",'',['id'=>"escolhida$i"]) !!}



                                            </div>


                                        </div>
                                    </div>

                                </div>



                                {!! Form::close() !!}




                            </div>
                        @endforeach

                        <div style="float: left">

                            <label id="resultado" class="alert alert-info" style="display: none"></label>
                        </div>
                        <div style="float: right">


                            {!!Form::button('Entregar',['class'=>'btn btn-primary','onclick'=>"processarPergunta()", 'id'=>'btn_entregar']) !!}
                        </div>



                    </div>


                </div>

            </div>
        </div>



    <script>
        function alteraResposta(idEscolhido,id,opcaoEscolhida){

            deSeleciona(id);
            document.getElementById(idEscolhido).setAttribute('class','bg-success');
            document.getElementById("escolhida"+id).setAttribute('value',opcaoEscolhida);
        }

        function deSeleciona(id){
            for (i=1;i<=5;i++)
                document.getElementById('opcao'+i+''+id).setAttribute('class','');
        }
    </script>



        <script>
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
                        var pergunta;
                        var perguntaEscolhida;

                        var j = 1;
                        var naoRespondidas = [];
                        var encontraNaoRespondida = false;


                        while (j <= perguntas.perguntas.length) {

                            perguntaEscolhida = document.getElementById('escolhida'+j);
                            pergunta = perguntas.perguntas[j-1];



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
                            }
                          alert("Responda todas as perguntas.As perguntas nao respondidas sao "+text);
                        }

                        else {

                            var nrCertas=0;
                            for (i = 0; i < perguntas.perguntas.length; i++) {
                                perguntaEscolhida = document.getElementById('escolhida' + (i + 1));


                                pergunta = perguntas.perguntas[i];


                                var content = document.getElementById("content" + (i + 1));
                                if (perguntaEscolhida.value == pergunta.opcaoCorrecta) {

                                    content.setAttribute("class", "alert alert-success");
                                    content.innerHTML = "<strong>Certo</strong> Parabens a resposta está certa";
                                    nrCertas++;

                                }

                                else {

                                    content.setAttribute("class", "alert alert-danger")
                                    content.innerHTML = "<strong>Errado</strong> A resposta correcta é " + pergunta.opcaoCorrecta;
                                }


                                document.getElementById('example1'+(i+1)).disabled=true;
                                document.getElementById('example2'+(i+1)).disabled=true;
                                document.getElementById('example3'+(i+1)).disabled=true;
                                document.getElementById('example4'+(i+1)).disabled=true;
                                document.getElementById('example5'+(i+1)).disabled=true;

                            }

                            btn_entregar=document.getElementById('btn_entregar').disabled=true;

                            var resultado = document.getElementById('resultado');
                            var totalQuestoes=perguntas.perguntas.length;
                            var percentagemCerto=(nrCertas*100)/totalQuestoes;
                            resultado.style.display = "block";
                            resultado.innerHTML="<strong>Resultado</strong> "+percentagemCerto.toPrecision(3)+"%  . Acertou "+nrCertas+" de "+totalQuestoes+ " dperguntas.";


                        }
                    }

                }

                xmlhttp.open("GET","teste-validacao",true);

                xmlhttp.send();
            }
        </script>

@stop