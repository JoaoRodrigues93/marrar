@extends('layouts.main')

@section('title')
    Lista de Temas
@stop
@section('body')
    <div class="container">


        <script>
            function check() {

                return confirm('Tem certeza que pretente remover esse tema?');
            }

        </script>

        <h3 class="text-center">Lista de Temas</h3>

        <div class="container">

            <div class="container">
                <div class="col-lg-3 col-md-5 col-md-offset-7 col-lg-offset-9" style="float: right">

                    {!! Form::text('search','',['class'=>'form-control','id'=>'search' ,'placeholder'=>'Procurar tema']) !!}

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
                        {!! Form::select('capitulos',[],null,['class' => 'form-control','id'=>'capitulos','onchange'=>"procuraCapitulo()"] ) !!}
                    </div>

                </div>

            </div>

        </div>

        <p>
        <p>
        <div class="container">


            <table class="table table-bordered text-center" id="tabelatemas" style="background-color:#ffffff">

                <thead class="text-capitalize">
                <tr>

                    <th></th>
                    <th>Nome do Tema</th>

                    <th> Acção</th>

                </tr>

                </thead>


                <tbody>

                </tbody>


            </table>


        </div>

    </div>

<script>

    disciplinas=document.getElementById('disciplinas');
    if(disciplinas.length>0) {
    disciplinas.selectedIndex = 0;
    adicionaCapitulo();
    }

    //Funcao  que busca os capitulos da disciplina escolhida e adiciona a combobox capitulos
    function adicionaCapitulo() {

    var  disciplina = document.getElementById('disciplinas');
    var  capitulos = document.getElementById('capitulos');

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



    for (var i = 0; i < capituloJson.capitulos.length; i++) {
    var option = document.createElement("option");
    capitulo = capituloJson.capitulos[i];
    option.text = capitulo.nome;
    capitulos.add(option);
    capitulos.options[i].value=capitulo.id;

    }

    capitulos.selectedIndex=-1;


    if(disciplina.selectedIndex!=-1)
    devolveDados(disciplinaSelecionada,0);

    }

    }
    xmlhttp.open("GET","capitulo-combobox/"+disciplinaSelecionada,true);

    xmlhttp.send();
    }


    function procuraCapitulo(){

        var  capitulo = document.getElementById('capitulos');

        var capituloSelecionado = capitulo.options[capitulo.selectedIndex].value;
        if(capitulo.selectedIndex!=-1)
            devolveDados(0,capituloSelecionado);

    }

    function devolveDados( disciplina, capitulo){
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();

        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {

            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


                var temas = JSON.parse(xmlhttp.responseText);
                preencheTabela(temas);

            }



        }
        if(capitulo==0)
        {
            xmlhttp.open("GET","/devolveTemasDisc/"+disciplina,true);}
        else
            xmlhttp.open("GET","/devolveTemasCapi/"+capitulo,true);

        xmlhttp.send();






    }





    function preencheTabela(temas) {
        var table = document.getElementById('tabelatemas');
        var linhas = table.rows;


        for (i = linhas.length - 1; i >= 0; i--) {

            if (i != 0) {
                table.deleteRow(i);
            }
        }


        for (i = 0; i < temas.length; i++) {
            tema = temas[i];
            row = table.insertRow(i + 1);
            row.innerHTML ="<th scope=\"row\">"+(i+1)+"</th>"+
            "<td>" + tema.nome+ "</td >" +

            "<td><a href=\"/tema_list/editar/"+tema.id+"\">Editar</a> | <a onclick=\"return check()\" href=\"/tema_list/remover/"+tema.id+"\">Remover</a></td>";

        }

    }


</script>

@stop