@extends('layouts.main')

@section('title')
    Lista de Capitulos
@stop
@section('body')
    <div class="container">

{{--script Para aparecer a mensagem de para confirmar--}}
        <script>
            function check() {

                return confirm('Tem certeza que pretente remover esse capitulo?');
            }

        </script>
       

        <h3 class="text-center">Lista de Capitulos</h3>

        <div class="container">
            <div class="col-lg-3 col-md-5 col-md-offset-7 col-lg-offset-9" style="float: right">

                {!! Form::text('search','',['class'=>'form-control','id'=>'search' ,'placeholder'=>'Procurar capitulo']) !!}

            </div>

        </div>

        <div class="row">

            <div class=" col-lg-12">


                <p></p>
                <p></p>
                <div class="col-lg-4 col-md-4">
                    {!! Form::label('disciplina','Selecione a disciplina',['class'=>'text-primary' ]) !!}
                    {!! Form::select('disciplinas', $disciplinas , null, ['class' => 'form-control','id'=>'disciplinas','onchange'=>"procuraDisciplina()"])!!}
                </div>
                
            </div>

        </div>

    </div>

    <p>
    <p>
        
        
        
        <div class="container">


            <table class="table table-bordered text-center" id="tabelacapitulos" style="background-color:#ffffff">

                <thead class="text-capitalize">
                <tr>

                    <th></th>
                    <th>Nome do capitulo</th>
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
            procuraDisciplina();
        }

        function procuraDisciplina(){

            var  disciplina = document.getElementById('disciplinas');

            var disciplinaSelecionado = disciplina.options[disciplina.selectedIndex].value;
            if(disciplina.selectedIndex!=-1)
                devolveDados(disciplinaSelecionado);

        }

        function devolveDados( disciplina){
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();

            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {


                    var capitulos = JSON.parse(xmlhttp.responseText);
                    preencheTabela(capitulos);

                }



            }
                xmlhttp.open("GET","/devolveCapitulosDisc/"+disciplina,true);
            xmlhttp.send();

}
        function preencheTabela(capitulos) {
            var table = document.getElementById('tabelacapitulos');
            var linhas = table.rows;


            for (i = linhas.length - 1; i >= 0; i--) {

                if (i != 0) {
                    table.deleteRow(i);
                }
            }


            for (i = 0; i < capitulos.length; i++) {
                capitulo = capitulos[i];
                row = table.insertRow(i + 1);
                row.innerHTML ="<th scope=\"row\">"+(i+1)+"</th>"+
                "<td>" + capitulo.nome+ "</td >" +

                "<td><a href=\"/capitulo_list/editar/"+capitulo.id+"\">Editar</a> | <a onclick=\"return check()\" href=\"/capitulo_list/remover/"+capitulo.id+"\">Remover</a></td>";

            }

        }





    </script>


@stop