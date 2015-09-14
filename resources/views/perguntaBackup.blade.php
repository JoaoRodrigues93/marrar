@extends('layouts.main')

@section('title')
    Registo de Perguntas
@stop


@section('body')
    <h3 class="text-center"> Registo de perguntas</h3>
    <div class="container">

        @if(session('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>

        @endif






            {!! Form::open( array('url'=> 'registar-pergunta')) !!}
        <a href="{{URL::to('perguntaview')}}" class="text-right">Clique aqui para ver a lista de perguntas</a>

        <div class="jumbotron">
            <div class="form-group" >

                {!! Form::label('disciplina','Selecione a disciplina',['class'=>'text-primary' ]) !!}
                {!! Form::select('disciplinas', $disciplinas , null, ['class' => 'form-control','id'=>'disciplinas','onchange'=>"adicionaCapitulo()"])
                !!}
                {!! Form::label('capitulo','Selecione o capitulo',['class'=>'text-primary']) !!}
                {!! Form::select('capitulos',[],null,['class' => 'form-control','id'=>'capitulos','onchange'=>"adicionaTema()"] ) !!}
                {!! Form::label('tema','Selecione o tema',['class'=>'text-primary']) !!}
                {!! Form::select('tema',[], null, ['class' => 'form-control', 'id'=>'temas']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('pergunta','Pergunta',['class'=>'text-primary']) !!}
            {!! Form::text('questao','',['class'=>'form-control', 'placeholder'=>'Introduza a questao aqui','rows'=>'2']) !!}
            {!! Form::label('correcto','Resposta correcta',['class'=>'text-primary']) !!}
            {!! Form::text('opcaoCorrecta','',['class'=>'form-control', 'placeholder'=>'Introduza a resposta correcta aqui','rows'=>'2']) !!}

            {!! Form::label('erradas','Respostas erradas',['class'=>'text-primary']) !!}
            {!! Form::text('opcao1','',['class'=>'form-control', 'placeholder'=>'Introduza a 1ª resposta errada aqui','rows'=>'2']) !!}
            {!! Form::text('opcao2','',['class'=>'form-control', 'placeholder'=>'Introduza a 2ª resposta errada aqui','rows'=>'2']) !!}
            {!! Form::text('opcao3','',['class'=>'form-control', 'placeholder'=>'Introduza a 3ª resposta errada aqui','rows'=>'2']) !!}
            {!! Form::text('opcao4','',['class'=>'form-control', 'placeholder'=>'Introduza a 4ª resposta errada aqui','rows'=>'2']) !!}

        </div>
        <div class="center-block" align="center">

            {!!Form::submit('Submeter pergunta',['class'=>'btn-primary']) !!}

        </div>


        <div class="bottom-right">


        </div>
        {!! Form::close() !!}


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



    </script>


@stop