@extends('layouts.main')

@section('title')
    Editar Tema
@stop
@section('body')

    <div class="container">
        <h2 class="text-center">Tema</h2>

        {!! Form::open( array('url'=> 'editar-tema')) !!}


        <div class="jumbotron">
            {!! Form::hidden('id',$tema->id,['class'=>'form-control', 'placeholder'=>'Introduza o nome do
            tema','rows'=>'1']) !!}

            <div class="form-group">
                {!! Form::label('disciplinas','Escolha a disciplina:',['class'=>'text-primary']) !!}
                {!! Form::select('disciplinas', array('default'=>$disciplina)+$disciplinas,null,['class'=>'form-control','id'=>'disciplinas','onchange'=>"adicionaCapitulo()"]) !!}
               {{-- array('default'=>$disciplina)+--}}

            </div>
            <div class="form-group">
                {!! Form::label('capitulo','Escolhe o capitulo:',['class'=>'text-primary']) !!}
                {!! Form::select('capitulos', array('default'=>$capitulo)+[],null,['class' => 'form-control','id'=>'capitulos'] ) !!}
            </div>

        </div>

        <div class="form-group">
            {!! Form::label('nome','Introduza o nome do tema',['class'=>'text-primary']) !!}
            {!! Form::text('nome',$tema->nome,['class'=>'form-control', 'rows'=>'1']) !!}

        </div>

        <div class="form-group">
            {!! Form::label('questoes','Numero de questoes:',['class'=>'text-primary']) !!}
            {!! Form::text('questoes',$tema->numero_questoes,['class'=>'form-control',
            'placeholder'=>'10','rows'=>'1']) !!}

            {{--<input type="number" name="tema" class="form-control" placeholder="10">--}}
        </div>


        <div class="form-group">
            {!! Form::label('conteudo','Conteudo',['class'=>'text-primary']) !!}
            {!! Form::textarea('conteudo',$tema->conteudo,['class'=>'form-control','rows'=>'20']) !!}


        </div>

        <button type="submit" name="Gravar" class="btn btn-primary">Gravar</button>


        {!! Form::close() !!}
    </div>
    <script>

        //para comecar o select box com vazio
        // document.getElementById('disciplinas').selectedIndex=-1;


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
alert("oll");
                    var listaCapitulos = xmlhttp.responseText;
                    var capituloJson = JSON.parse(listaCapitulos);
                    var capitulo;


                    for(k=capitulos.options.length-1;k>=0;k--)
                    {
                        capitulos.remove(k);
                    }
                    if(capituloJson.capitulos.length<1){
                        capitulos.innerHTML="<option>Nenhuma Opção</option>";
                    }else{

                        for (var i = 0; i < capituloJson.capitulos.length; i++) {
                            var option = document.createElement("option");
                            capitulo = capituloJson.capitulos[i];
                            option.text = capitulo.nome;
                            capitulos.add(option);
                            capitulos.options[i].value=capitulo.id;

                        }

                        capitulos.selectedIndex=-1;

                    }}

            }
            xmlhttp.open("GET","capitulo-combobox/"+disciplinaSelecionada,true);

            xmlhttp.send();
        }

    </script>
@stop