@extends('layouts.maincontent')

@section('title')
    Marrar:Exercicios
    @stop
@section('body')


    <script>
        function alteraResposta(idEscolhido){
            deSeleciona();
            document.getElementById(idEscolhido).setAttribute('class','bg-success');
        }

        function deSeleciona(){
            for (i=1;i<=5;i++)
                document.getElementById('opcao'+i).setAttribute('class','');
        }
    </script>s

    <div class="container">
        <div class="jumbotron">

            <h2 class="text-danger left" >{!!$caminho!!}</h2>

                <div class="progress">
                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="70"
                         aria-valuemin="0" aria-valuemax="100" style="width:10%">
                        <span class="sr-only">10% Complete</span>
                    </div>
                </div>
                <div>
                    {!!Form::open(array('url' => 'exercicio')) !!}
                    <h3> {!! Form::label($pergunta->questao)  !!}</h3>
                    <p>

                    <div class="container">

                        <div id="opcao1">
                            {!! Form::radio('example', 1, false, ['class' => 'field','id'=>'example1','onclick'=>"alteraResposta('opcao1')"]) !!}
                            {!! Form::label('example1',$pergunta->opcao1)  !!}
                            <p>
                        </div>

                        <div id="opcao2">
                            {!! Form::radio('example', 1, false, ['class' => 'field', 'id'=>'example2','onclick'=>"alteraResposta('opcao2')"]) !!}
                            {!! Form::label('example2',$pergunta->opcao2)  !!}
                            <p>
                        </div>

                        <div id="opcao3">
                            {!! Form::radio('example', 1, false, ['class' => 'field', 'id'=>'example3','onclick'=>"alteraResposta('opcao3')"]) !!}
                            {!! Form::label('example3',$pergunta->opcao3)  !!}
                            <p>
                        </div>

                        <div id="opcao4">
                            {!! Form::radio('example', 1, false, ['class' => 'field', 'id'=>'example4','onclick'=>"alteraResposta('opcao4')"]) !!}
                            {!! Form::label('example4',$pergunta->opcao4)  !!}
                            <p>
                        </div>

                        <div id="opcao5">
                            {!! Form::radio('example', 1, false, ['class' => 'field', 'id'=>'example5','onclick'=>"alteraResposta('opcao5')"]) !!}
                            {!! Form::label('example5',$pergunta->opcao5)  !!}
                            <p>
                        </div>

                        <div>
                        {!!Form::hidden('respostaCerta',$pergunta->opcaoCorrecta,array('id'=>'respostaCerta'))!!}
                        {!!Form::hidden('respostaEscolhida','',array('id'=>'respostaEscolhida'))!!}
                        </div>
                    </div>


                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 col-lg-offset-10 col-md-offset-10 col-sm-offset-9 col-xs-offset-8" >

                        {!!Form::submit('Confirmar',['class'=>'btn btn-success btn-md']) !!}




                    </div>
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>

                    @endif
{!!Form::close()!!}
                </div>


            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <button type="button" class="btn btn-danger">Teoria</button>
                    <button type="button" class="btn btn-danger disabled">Exercicio</button>
                </div>

</div>
        </div>
    </div>

@stop