@extends('layouts.main')

@section('title')
    Lista de perguntas
@stop
@section('body')

    <script>
        function check() {

            return confirm('Tem certeza que pretente remover essa pergunta?');
        }

    </script>

    <div class="container">

        <h3 class="text-center">Lista de Perguntas</h3>
        <div class="container">

            <div class="container">
            <div class="col-lg-3 col-md-5 col-md-offset-7 col-lg-offset-9" style="float: right">

                {!! Form::text('search','',['class'=>'form-control','id'=>'search' ,'placeholder'=>'Procurar Pergunta']) !!}
                {!!Form::hidden('perguntas',"$perguntas",array('id'=>'id'))!!}

            </div>

            </div>

            <div class="row">

<div class=" col-lg-12">


    <p></p>
    <p></p>
                <div class="col-lg-4 col-md-4">
                    {!! Form::label('disciplina','Selecione a disciplina',['class'=>'text-primary' ]) !!}
                    {!! Form::select('disciplinas', $disciplinas , null, ['class' => 'form-control','id'=>'disciplinas','onchange'=>"adicionaCapitulo()"])!!}
             </div>
                <div class="col-lg-4 col-md-4">
                    {!! Form::label('capitulo','Selecione o capitulo',['class'=>'text-primary']) !!}
                    {!! Form::select('capitulos',[],null,['class' => 'form-control','id'=>'capitulos','onchange'=>"adicionaTema()"] ) !!}
                 </div>

                <div class="col-lg-4 col-md-4">
                    {!! Form::label('tema','Selecione o tema',['class'=>'text-primary']) !!}
                    {!! Form::select('tema',[], null, ['class' => 'form-control', 'id'=>'temas']) !!}
                </div>

</div>

            </div>

            </div>

        <hr>

        <div class="container">

            <table class="table table-bordered text-center" id="tabelaPerguntas">

                <thead class="text-capitalize">
                <tr>

                    <th>#</th>
                    <th>Pergunta</th>
                    <th>Resposta correcta</th>
                    <th>1ª Resposta errada</th>
                    <th>2ª Resposta errada</th>
                    <th>3ª Resposta errada</th>
                    <th>4ª Resposta errada</th>
                    <th> Acção</th>

                </tr>

                </thead>


                <tbody>

                @foreach($perguntas as $pergunta)

                    <tr>

                        <th scope="row">{{$pergunta->id}}</th>
                        <td> {{$pergunta->questao}}</td>
                        <td>{{$pergunta->opcaoCorrecta}}</td>
                        <td> {{$pergunta->opcao1}}</td>
                        <td> {{$pergunta->opcao2}}</td>
                        <td> {{$pergunta->opcao3}}</td>
                        <td> {{$pergunta->opcao4}}</td>

                        <td><a href="{{URL::to('/perguntaview/editar/'.$pergunta->id)}}">Editar</a> | <a
                                    onclick="return check()" href="{{URL::to('/perguntaview/remover/'.$pergunta->id)}}">Remover</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>


            </table>


        </div>

    </div>


    <script>

        document.getElementById('disciplinas').selectedIndex=-1;


        //Funcao  que busca os capitulos da disciplina escolhida e adiciona a combobox capitulos
        function adicionaCapitulo() {

            var  disciplina = document.getElementById('disciplinas');
            var  capitulos = document.getElementById('capitulos');
            var  temas = document.getElementById('temas');

            var disciplinaSelecionada = disciplina.options[disciplina.selectedIndex].value;

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();

            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    var listaCapitulos = xmlhttp.responseText;
                    var capituloJson = JSON.parse(listaCapitulos);
                    var capitulo;


                    for(k=capitulos.options.length-1;k>=0;k--)
                    {
                        capitulos.remove(k);
                    }

                    for(j=temas.options.length-1;j>=0;j--)
                    {
                        temas.remove(j);
                    }

                    for (var i = 0; i < capituloJson.capitulos.length; i++) {
                        var option = document.createElement("option");
                        capitulo = capituloJson.capitulos[i];
                        option.text = capitulo.nome;
                        capitulos.add(option);
                        capitulos.options[i].value=capitulo.id;

                    }

                    capitulos.selectedIndex=-1;
                    temas.selectedIndex=-1;
                }

            }
            xmlhttp.open("GET","capitulo-combobox/"+disciplinaSelecionada,true);

            xmlhttp.send();
        }

        //Funcao  que busca os temas do capitulo escolhido e adiciona a combobox temas
        function adicionaTema(){

            var  temas = document.getElementById('temas');
            var  capitulos = document.getElementById('capitulos');


            var capituloSelecionado = capitulos.options[capitulos.selectedIndex].value;

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();

            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


                    var listatemas = xmlhttp.responseText;
                    var temaJson = JSON.parse(listatemas);
                    var tema;


                    for(k=temas.options.length-1;k>=0;k--)
                    {
                        temas.remove(k);
                    }

                    for (i = 0; i < temaJson.temas.length; i++) {
                        var option = document.createElement("option");
                        tema = temaJson.temas[i];
                        option.text = tema.nome;
                        temas.add(option);
                        temas.options[i].value=tema.id;

                    }

                    temas.selectedIndex=-1;
                }

            }
            xmlhttp.open("GET","tema-combobox/"+capituloSelecionado,true);

            xmlhttp.send();



        }



        function devolveDados(){
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();

            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {





                }



            }

            xmlhttp.open("GET","devolveDados/"+capituloSelecionado,true);

            xmlhttp.send();






        }





function preecheTabela() {
    var table = document.getElementById('tabelaPerguntas');
    var linhas = table.rows;

    alert(linhas.length);

    for (i = linhas.length - 1; i >= 0; i--) {
        alert(linhas[i].innerHTML);
        t
        if (i != 1) {
            table.deleteRow(i);
        }

}
        // var row = table.insertRow(1);
            //row.innerHTML = "<td>"+nome+"</td> <td>"+presidio+"</td><td>"+cidade+"</td><td>"+status+"</td>";

        }




    </script>

@stop