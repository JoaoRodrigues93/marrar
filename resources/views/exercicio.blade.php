@extends('layouts.maincontent')

@section('title')
    Marrar:Exercicios
@stop
@section('body')


    <script>
        function alteraResposta(respostaEscolhida, idEscolhido) {
            deSeleciona();
            document.getElementById('respostaEscolhida').setAttribute('value', respostaEscolhida);
            document.getElementById(idEscolhido).setAttribute('class', 'bg-success');
        }

        function deSeleciona() {
            for (i = 1; i <= 5; i++)
                document.getElementById('opcao' + i).setAttribute('class', '');
        }
    </script>



    <div class="container" onload="inicio()">
        <div class="jumbotron">

            <h2 class="text-danger left">{!!$caminho!!}</h2>

            <div class="progress">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70"
                     aria-valuemin="0" aria-valuemax="100" style="width:10%">
                    <span class="sr-only">10% Complete</span>
                </div>
            </div>
            <div>
                {!!Form::open(array('url' => 'exercicio')) !!}
                <h3> {!! Form::label($pergunta->questao) !!}</h3>

                <p>

                <div class="container">

                    <div id="opcao1">
                        {!! Form::radio('example', 1, false, ['class' =>
                        'field','id'=>'example1','onclick'=>"alteraResposta($pergunta->opcao1,'opcao1')"]) !!}
                        {!! Form::label('example1',$pergunta->opcao1) !!}
                        <p>
                    </div>

                    <div id="opcao2">
                        {!! Form::radio('example', 1, false, ['class' => 'field',
                        'id'=>'example2','onclick'=>"alteraResposta($pergunta->opcao2,'opcao2')"]) !!}
                        {!! Form::label('example2',$pergunta->opcao2) !!}
                        <p>
                    </div>

                    <div id="opcao3">
                        {!! Form::radio('example', 1, false, ['class' => 'field',
                        'id'=>'example3','onclick'=>"alteraResposta($pergunta->opcao3,'opcao3')"]) !!}
                        {!! Form::label('example3',$pergunta->opcao3) !!}
                        <p>
                    </div>

                    <div id="opcao4">
                        {!! Form::radio('example', 1, false, ['class' => 'field',
                        'id'=>'example4','onclick'=>"alteraResposta($pergunta->opcao4,'opcao4')"]) !!}
                        {!! Form::label('example4',$pergunta->opcao4) !!}
                        <p>
                    </div>

                    <div id="opcao5">
                        {!! Form::radio('example', 1, false, ['class' => 'field',
                        'id'=>'example5','onclick'=>"alteraResposta($pergunta->opcao5,'opcao5')"]) !!}
                        {!! Form::label('example5',$pergunta->opcao5) !!}
                        <p>
                    </div>

                    <div>
                        {!!Form::hidden('respostaCerta',$pergunta->opcaoCorrecta,array('id'=>'respostaCerta'))!!}
                        {!!Form::hidden('respostaEscolhida','',array('id'=>'respostaEscolhida'))!!}
                    </div>
                </div>

                <script>
                   /* ('#hide').click(function(){
                        ('#content').hide();
                        ('#hide').hide();
                        ('#show').show();
                    });*/

                   function inicio () {
                       alert("Executou");
                       var content = document.getElementById("content");
                       content.style.display = "none";
                   }

                    function esconder(){
                        var hide = document.getElementById("hide");
                        var show = document.getElementById("show");
                        hide.style.display = "none";
                        show.style.display = "block";
                        //hide.setAttribute("class","");
                        var content =document.getElementById("content");


                        var resposta = document.getElementById("respostaCerta");
                        var respostaEscolhida = document.getElementById("respostaEscolhida");
                        if(resposta.value == respostaEscolhida.value){
                            content.setAttribute("class","alert alert-success");
                            content.innerHTML="<strong>Certo</strong> parabens a resposta está certa";
                        }
                        else{
                            content.setAttribute("class","alert alert-danger")
                            content.innerHTML="<strong>Errado</strong> parabens a resposta está certa";
                        }
                    }



                </script>

                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 col-lg-offset-10 col-md-offset-10 col-sm-offset-9 col-xs-offset-8">

                    {!!Form::button('Confirmar',['class'=>'btn btn-success btn-md','id'=>'hide','value'=>'Hide',"onclick"=>"esconder()"]) !!}
                    {!!Form::button('Proximo',['class'=>'btn btn-primary btn-md','id'=>'show','value'=>'Show'])!!}


                </div>
                <div>
                <div  id="content">
                </div>
                </div>
                <div class="row"></div>
                <div class="row">
                    <div class="col-md-5"></div>
                    <div class="col-md-7">
                        <button type="button" class="btn btn-danger">Teoria</button>
                        <button type="button" class="btn btn-danger disabled" >Exercicio</button>
                    </div>

                </div>

                {!!Form::close()!!}
            </div>



        </div>
    </div>

@stop