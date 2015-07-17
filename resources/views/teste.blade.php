@extends('layouts.maincontent')

@section('title')
    Teste
@stop


@section('body')


        <br>

        <div class="col-lg-10 col-md-10 col-sm-9 col-lg-offset-2 col-md-offset-2 col-sm-offset-3">

            <div>
                <h2 class="text-danger left" > Teste | Trigonometria | Matematica</h2>
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
                                                    {!! Form::label('example1'.$i,$pergunta->opcao1)  !!}
                                                    <p>
                                                </div>

                                                <div id="opcao2{{$i}}">
                                                    {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example2'.$i,'onclick'=>"alteraResposta('opcao2$i',$i,'$pergunta->opcao2')"]) !!}
                                                    {!! Form::label('example2'.$i,$pergunta->opcao2)  !!}
                                                    <p>
                                                </div>

                                                <div id="opcao3{{$i}}">
                                                    {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example3'.$i,'onclick'=>"alteraResposta('opcao3$i',$i,'$pergunta->opcao3')"]) !!}
                                                    {!! Form::label('example3'.$i,$pergunta->opcao3)  !!}
                                                    <p>
                                                </div>

                                                <div id="opcao4{{$i}}">
                                                    {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example4'.$i,'onclick'=>"alteraResposta('opcao4$i',$i,'$pergunta->opcao4')"]) !!}
                                                    {!! Form::label('example4'.$i,$pergunta->opcao4)  !!}
                                                    <p>
                                                </div>

                                                <div id="opcao5{{$i}}">
                                                    {!! Form::radio("example$i", 1, false, ['class' => 'field', 'id'=>'example5'.$i,'onclick'=>"alteraResposta('opcao5$i',$i,'$pergunta->opcao5')"]) !!}
                                                    {!! Form::label('example5'.$i,$pergunta->opcao5)  !!}
                                                    <p>
                                                </div>
                                                {!! Form::hidden("escolhida$i",'',['id'=>"escolhida$i"]) !!}

                                            </div>


                                        </div>
                                    </div>

                                </div>



                                {!! Form::close() !!}




                            </div>
                        @endforeach
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 col-lg-offset-10 col-sm-offset-9 col-md-offset-10 col-xs-offset-8">
                            {!!Form::button('Entregar',['class'=>'btn btn-primary','onclick'=>"processarPergunta()"]) !!}
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

                        var perguntasJson =xmlhttp.responseText;

                       var   perguntas= JSON.parse(perguntasJson);
                            var pergunta;
                        var perguntaEscolhida;
                        for(i=0;i<perguntas.perguntas.length;i++){
                            perguntaEscolhida=document.getElementById('escolhida'+(i+1));

                          pergunta = perguntas.perguntas[i];


                           if(perguntaEscolhida.value==pergunta.opcaoCorrecta){

                                alert('Pergunta '+(i+1)+' esta certa');

                            }

                            else {
                                alert('Pergunta ' + (i + 1) + ' esta errada');
                            }

                        }

                    }


                }

                xmlhttp.open("GET","teste-validacao",true);

                xmlhttp.send();
            }
        </script>

@stop