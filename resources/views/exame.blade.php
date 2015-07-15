@extends('layouts.maincontent')
@section('title')
    Marrar: Exame
@stop
@section('body')

<script>
    function escolheOpcao(id){
        var text = '<?php echo $examesJSON; ?>';
        obj = JSON.parse(text);
        alert(obj.perguntas[1].questao);
        deSeleciona();
        document.getElementById(id).setAttribute('class','bg-success');
    }
    function deSeleciona(){
        for (i=1;i<=5;i++)
            document.getElementById('opcao'+i).setAttribute('class','');
    }
</script>


    <br>
    <br>
    <div class="container well">
        <div class="exame-title">
            <h2 class="text-danger">Exame | Matemática</h2>
        </div>
        <div class="exame-time">
                <h4 class="text-right">25:12</h4>
        </div>

        <div class="exame-question">
         {!!Form::open(array('url' => 'exame')) !!}
         <h2>Qual a raiz da seguinte equação linear x+2=0: </h2>
            <div class="container question-options">
                <div id="opcao1">
                <p>
                {!!Form::radio('resposta','a',false,['id'=>'resposta1','onclick'=>"escolheOpcao('opcao1')"]) !!}
                {!!Form::label('resposta1','-2') !!}
                </div>
                <div id="opcao2">
                <p>
                {!!Form::radio('resposta','b',false,['id'=>'resposta2', 'onclick'=>"escolheOpcao('opcao2')"]) !!}
                {!!Form::label('resposta2','2') !!}
                </div>
                <div id="opcao3">
                <p>
                {!!Form::radio('resposta','c',false,['id'=>'resposta3','onclick'=>"escolheOpcao('opcao3')"]) !!}
                {!!Form::label('resposta3','1') !!}
                </div>
                <div id="opcao4">
                <p>
                {!!Form::radio('resposta','d',false,['id'=>'resposta4','onclick'=>"escolheOpcao('opcao4')"]) !!}
                {!!Form::label('resposta4','-1') !!}
                </div>
                <div id="opcao5">
                <p>
                {!!Form::radio('resposta','e',false,['id'=>'resposta5','onclick'=>"escolheOpcao('opcao5')"]) !!}
                {!!Form::label('resposta5','Nenhuma das opções') !!}
                </p>
                </div>

            </div>

            <div class="question-list">
                <ul class="pagination">
                    <?php for($i=0; $i<$nrPerguntas; $i++) { ?>
                    <li><a href="#"><?php echo($i+1); ?></a></li>
                    <?php }?>
                </ul>
            </div>
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 col-lg-offset-10 col-sm-offset-9 col-md-offset-10 col-xs-offset-8">
         {!!Form::submit('Entregar',['class'=>'btn btn-primary']) !!}

          </div>
            {!!Form::close()!!}
        </div>
    </div>
@stop