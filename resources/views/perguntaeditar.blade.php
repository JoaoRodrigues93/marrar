@extends('layouts.main')

@section('title')
    Editar pergunta
@stop
@section('links')
    @parent
    <script src="{{URL::asset('ckeditor/ckeditor.js')}}"></script>
@stop
@section('body')
    <h3 class="text-center"> Editar pergunta</h3>
    <div class="container">


        {!!  Form::open(['gravarPergunt']) !!}
        <a href="{{URL::to('perguntaview')}}" class="text-right">Clique aqui para ver a lista de perguntas</a>


        <div class="container">
            <div class="form-group" >

                {!! Form::label('disciplina','Selecione a disciplina',['class'=>'text-primary' ]) !!}
                {!! Form::select('disciplinas', $disciplinas , null, ['class' => 'form-control','id'=>'disciplinas','onchange'=>"adicionaCapitulo()"])
                !!}
                {!! Form::label('capitulo','Selecione o capitulo',['class'=>'text-primary']) !!}
                {!! Form::select('capitulos',$capitulos,null,['class' => 'form-control','id'=>'capitulos','onchange'=>"adicionaTema()"] ) !!}
                {!! Form::label('tema','Selecione o tema',['class'=>'text-primary']) !!}
                {!! Form::select('tema',$tema, null, ['class' => 'form-control', 'id'=>'temas']) !!}
            </div>
        </div>
        <div class="form-group">

            {!! Form::label('questao','Pergunta',['class'=>'text-primary']) !!}
            {!! Form::text('questao',$pergunta->questao,['class'=>'form-control', 'placeholder'=>'Introduza a
            pergunta aqui','rows'=>'2']) !!}
            {!! Form::hidden('id',$pergunta->id,['class'=>'form-control','id'=>'id']) !!}
            {!! Form::label('correcto','Resposta correcta',['class'=>'text-primary']) !!}
            {!! Form::text('opcaoCorrecta',$pergunta->opcaoCorrecta,['class'=>'form-control',
            'placeholder'=>'Introduza a resposta correcta aqui','rows'=>'2']) !!}
            {!! Form::label('erradas','Respostas erradas',['class'=>'text-primary']) !!}
            {!! Form::text('opcao1',$pergunta->opcao1,['class'=>'form-control', 'placeholder'=>'Introduza a 1ª
            resposta errada aqui','rows'=>'2']) !!}
            {!! Form::text('opcao2',$pergunta->opcao2,['class'=>'form-control', 'placeholder'=>'Introduza a 2ª
            resposta errada aqui','rows'=>'2']) !!}
            {!! Form::text('opcao3',$pergunta->opcao3,['class'=>'form-control', 'placeholder'=>'Introduza a 3ª
            resposta errada aqui','rows'=>'2']) !!}
            {!! Form::text('opcao4',$pergunta->opcao4,['class'=>'form-control', 'placeholder'=>'Introduza a 4ª
            resposta errada aqui','rows'=>'2']) !!}
            {!! Form::text('dica',$pergunta->dica,['class'=>'form-control', 'placeholder'=>'Introduza a dica','rows'=>'2']) !!}

        </div>
        <div class="center-block" align="center">

            <button type="button" name="Gravar" id="gravar" class="btn btn-primary" onclick="gravarPergunta()">Gravar</button>
            {!! Form::hidden('idTema',$idTema, ['id'=>'idTema']) !!}
            {!! Form::hidden('idCap',$idCap, ['id'=>'idCap']) !!}
            {!! Form::hidden('idDisc',$idDisc, ['id'=>'idDisc']) !!}
        </div>


        <div>


        </div>
        {!! Form::close() !!}


    </div>




    <script>

        var formSubmitted = false;
        $("#submeterPergunta").on('click', function (e) {
            if (formSubmitted === true) {
                formSubmitted = false;
                return;
            }

            e.preventDefault();

            //para a questão
            var editorQuestao = CKEDITOR.instances.questao;
            var htmlQuestao = editorQuestao.getData();
            htmlQuestao.replace("<p>", " ");
            htmlQuestao.replace("</p>", " ");
            editorQuestao.setData(htmlQuestao);

            //para a resposta correcta
            var editorOpcaoCorrecta = CKEDITOR.instances.opcaoCorrecta;
            var htmlOpcaoCorrecta = editorOpcaoCorrecta.getData();
            htmlOpcaoCorrecta.replace("<p>", " ");
            htmlOpcaoCorrecta.replace("</p>", " ");
            editorOpcaoCorrecta.setData(htmlOpcaoCorrecta);

            //para a opção1
            var editorOpcao1 = CKEDITOR.instances.opcao1;
            var htmlOpcao1 = editorOpcao1.getData();
            htmlOpcao1.replace("<p>", " ");
            htmlOpcao1.replace("</p>", " ");
            editorOpcao1.setData(htmlOpcao1);

            //para a opção2
            var editorOpcao2 = CKEDITOR.instances.opcao2;
            var htmlOpcao2 = editorOpcao2.getData();
            htmlOpcao2.replace("<p>", " ");
            htmlOpcao2.replace("</p>", " ");
            editorOpcao2.setData(htmlOpcao2);

            //para a opção3
            var editorOpcao3 = CKEDITOR.instances.opcao3;
            var htmlOpcao3 = editorOpcao3.getData();
            htmlOpcao3.replace("<p>", " ");
            htmlOpcao3.replace("</p>", " ");
            editorOpcao3.setData(htmlOpcao3);

            //para a opção4
            var editorOpcao4 = CKEDITOR.instances.opcao4;
            var htmlOpcao4 = editorOpcao4.getData();
            htmlOpcao4.replace("<p>", " ");
            htmlOpcao4.replace("</p>", " ");
            editorOpcao4.setData(htmlOpcao4);

            //para a dica
            var editorDica = CKEDITOR.instances.dica;
            var htmlDica = editorDica.getData();
            htmlDica.replace("<p>", " ");
            htmlDica.replace("</p>", " ");
            editorDica.setData(htmlDica);

            formSubmitted = true;
            $(this).trigger('click');
        });
    </script>

    <script>
        CKEDITOR.replaceAll();

            var temas = document.getElementById('temas1');
            var idTema = document.getElementById('idTema');

            var encontrado = false;
            var i = 0;
            while (encontrado == false && i < temas.length) {
                if (temas[i].value == idTema.value) {
                    encontrado = true;
                    temas.selectedIndex = i;
                    i = 0;
                }
                i++;
            }

            var disciplinas = document.getElementById('disciplinas');
            var idDisciplina = document.getElementById('idDisc');
            encontrado = false;


            while (encontrado == false && i < disciplinas.length) {
                if (disciplinas[i].value == idDisciplina.value) {
                    encontrado = true;
                    disciplinas.selectedIndex = i;
                    i = 0;
                }
                i++;

            }

            var capitulos = document.getElementById('capitulos');
            var idCapitulos = document.getElementById('idCap');
            encontrado = false;


            while (encontrado == false && i < capitulos.length) {
                if (capitulos[i].value == idCapitulos.value) {
                    encontrado = true;
                    capitulos.selectedIndex = i;
                    i = 0;
                }
                i++;
            }









    </script>

    <script>


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

        function gravarPergunta(){

            var opcao1= document.getElementById('opcao1');
            var opcao2= document.getElementById('opcao2');
            var opcao3= document.getElementById('opcao3');
            var opcao4= document.getElementById('opcao4');
            var dica= document.getElementById('dica');
            var opcaoCorrecta= document.getElementById('opcaoCorrecta');
            var questao =document.getElementById('questao');

            opcao1.value=CKEDITOR.instances['opcao1'].getData();
            opcao2.value=CKEDITOR.instances['opcao2'].getData();
            opcao3.value=CKEDITOR.instances['opcao3'].getData();
            opcao4.value=CKEDITOR.instances['opcao4'].getData();
            dica.value=CKEDITOR.instances['dica'].getData();
            opcaoCorrecta.value=CKEDITOR.instances['opcaoCorrecta'].getData();
            questao.value=CKEDITOR.instances['questao'].getData();

            var form = $('form[gravarPergunt]');
            var url = form.prop('action');

            $.ajax({
                url: url,
                data: form.serialize(),
                method: 'POST',
                success: function (data) {

                    alert('Dados alterados com sucesso');

                    //limpa campos
                    CKEDITOR.instances['opcao1'].setData('');
                    CKEDITOR.instances['opcao2'].setData('');
                    CKEDITOR.instances['opcao3'].setData('');
                    CKEDITOR.instances['opcao4'].setData('');
                    CKEDITOR.instances['dica'].setData('');
                    CKEDITOR.instances['opcaoCorrecta'].setData('');
                    CKEDITOR.instances['questao'].setData('');


                }

            });
        }

        document.onkeydown = function (evt) {
            var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
            if (keyCode == 13) {
                gravarPergunta();
                evt.preventDefault();
            }

        };


    </script>


@stop