@extends('layouts.main')

@section('title')
    Tema
@stop

@section('links')
    @parent
    <script src="{{URL::asset('ckeditor/ckeditor.js')}}"></script>
@stop
@section('body')

    <div class="container">
        <h2 class="text-center">Tema</h2>
        @if(session('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>

        @endif
        {!!  Form::open(['gravarTem']) !!}
        <a href="{{URL::to('tema_list')}}" class="">Clique aqui para ver a lista dos temas</a>

        <div class="jumbotron">
            <div class="form-group">
                {!! Form::label('disciplinas','Escolha a disciplina:',['class'=>'text-primary']) !!}
                {!! Form::select('disciplinas', array('default'=>'')+$disciplinas , null,['class'=>'form-control','id'=>'disciplinas','onchange'=>"adicionaCapitulo()"]) !!}


            </div>
            <div class="form-group">
                {!! Form::label('capitulos','Escolhe o capitulo:',['class'=>'text-primary']) !!}
                {!! Form::select('capitulos',[],null,['class' => 'form-control','id'=>'capitulos'] ) !!}
            </div>

        </div>

        <div class="form-group">
            {!! Form::label('nome','Introduza o nome do tema',['class'=>'text-primary']) !!}
            {!! Form::text('nome','',['class'=>'form-control','rows'=>'1','id'=>'nome']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('questoes','Numero de questoes:',['class'=>'text-primary']) !!}
            {!! Form::text('questoes','',['class'=>'form-control','type'=>'number', 'placeholder'=>'10','rows'=>'1','id'=>'questoes']) !!}

            {{--<input type="number" name="tema" class="form-control" placeholder="10">--}}
        </div>



        <div class="form-group">
            {!! Form::label('conteudo','Conteudo',['class'=>'text-primary']) !!}
            {!! Form::textarea('conteudo','',['class'=>'form-control','rows'=>'20', 'id'=>'conteudo']) !!}


        </div>

        <button type="button" name="Gravar" id="gravar" class="btn btn-primary" onclick="gravarTema()">Gravar</button>


        {!! Form::close() !!}
    </div>

    <script>

        //para comecar o select box com vazio
        document.getElementById('disciplinas').selectedIndex = -1;

        CKEDITOR.replace('conteudo');

        //Funcao  que busca os capitulos da disciplina escolhida e adiciona a combobox capitulos
        function adicionaCapitulo() {

            var disciplina = document.getElementById('disciplinas');
            var capitulos = document.getElementById('capitulos');


            var disciplinaSelecionada = disciplina.options[disciplina.selectedIndex].value;

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();

            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {

                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    var listaCapitulos = xmlhttp.responseText;
                    var capituloJson = JSON.parse(listaCapitulos);
                    var capitulo;


                    for (k = capitulos.options.length - 1; k >= 0; k--) {
                        capitulos.remove(k);
                    }
                    if (capituloJson.capitulos.length < 1) {
                        capitulos.innerHTML = "<option>Nenhuma Opção</option>";
                    } else {

                        for (var i = 0; i < capituloJson.capitulos.length; i++) {
                            var option = document.createElement("option");
                            capitulo = capituloJson.capitulos[i];
                            option.text = capitulo.nome;
                            capitulos.add(option);
                            capitulos.options[i].value = capitulo.id;

                        }

                        capitulos.selectedIndex = -1;

                    }
                }

            }
            xmlhttp.open("GET", "capitulo-combobox/" + disciplinaSelecionada, true);

            xmlhttp.send();
        }


        function gravarTema() {

            var cnt=document.getElementById('conteudo');
            cnt.value=CKEDITOR.instances['conteudo'].getData();
            var form = $('form[gravarTem]');
            var url = form.prop('action');


            $.ajax({
                url: url,
                data: form.serialize(),
                method: 'POST',
                success: function (data) {

                   alert('Dados gravados com sucesso');
                   var nome= document.getElementById('nome');
                    var questoes =document.getElementById('questoes');
                   var conteudo =document.getElementById('conteudo');
                   nome.value='';
                    questoes.value='';
                    nome = document.getElementById('nome');
                    var questoes = document.getElementById('questoes');
                    var conteudo = document.getElementById('conteudo');
                    nome.value = '';
                    questoes.value = '';
                    conteudo.innerHTML = '';

//limpa campo de conteudo
                   CKEDITOR.instances['conteudo'].setData('');
                   // CKEDITOR.getChild(conteudo).clean();

                }

            });
        }

        document.onkeydown = function (evt) {
            var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
            if (keyCode == 13) {
                gravarTema();
                evt.preventDefault();
            }

        };


    </script>

@stop