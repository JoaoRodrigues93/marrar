@extends('layouts.maincontent')
@section('title')
    Marrar: Exame
@stop
@section('body')

<script>
    function escolheOpcao(id,nr){
        deSeleciona(nr);
        document.getElementById('opcao'+id).setAttribute('class','bg-success');
        var btn = document.getElementById('nav'+nr);
        btn.style.color ="#fff";
        btn.style.backgroundColor="#5cb85c";
        btn.style.borderColor="#4cae4c";

    }
    function deSeleciona(nr){
        for (i=1;i<=5;i++)
            document.getElementById('opcao'+i+''+nr).setAttribute('class','');
    }
</script>

    <br>
    <br>
    <div class="container well">
        <div class="exame-title">
            <h2 class="text-danger">Exame | {{$disciplina}}</h2>
        </div>
        <div class="exame-time">
                <h4 id="timer" onload="startTime()" class="text-right text-danger"></h4>
        </div>
        {!!Form::open(array('url' => 'exame')) !!}
       <div class="tab-content">

         <?php
            $i=0;
            foreach($perguntas as $pergunta) {
            $i++;
            ?>
             <div id="pergunta{{$i}}" class="tab-pane fade <?php if($i==1) echo "in active"; ?>">
            <h2>{{$pergunta->questao}}</h2>
             <div class="container">
                <div id="opcao1{{$i}}" class="">
                <p class="text-left">
                 <input type="radio" id="resposta1{{$i}}" name="resposta{{$i}}" onclick="escolheOpcao('1{{$i}}','{{$i}}')"/>
                 <label for="resposta1{{$i}}">{{$pergunta->opcao1}}</label>
                </div>

                <div id="opcao2{{$i}}" >
                    <p class="text-left">
                        <input type="radio" id="resposta2{{$i}}" name="resposta{{$i}}" onclick="escolheOpcao('2{{$i}}','{{$i}}')" />
                        <label for="resposta2{{$i}}">{{$pergunta->opcao2}}</label>
                </div>

                <div id="opcao3{{$i}}">
                    <p class="text-left">
                        <input type="radio" id="resposta3{{$i}}" name="resposta{{$i}}" onclick="escolheOpcao('3{{$i}}','{{$i}}')" />
                        <label for="resposta3{{$i}}">{{$pergunta->opcao3}}</label>
                </div>

                <div id="opcao4{{$i}}">
                    <p class="text-left">
                        <input type="radio" id="resposta4{{$i}}" name="resposta{{$i}}" onclick="escolheOpcao('4{{$i}}','{{$i}}')" />
                        <label for="resposta4{{$i}}">{{$pergunta->opcao4}}</label>
                </div>

                <div id="opcao5{{$i}}">
                    <p class="text-left">
                        <input type="radio" id="resposta5{{$i}}" name="resposta{{$i}}" onclick="escolheOpcao('5{{$i}}','{{$i}}')" />
                        <label for="resposta5{{$i}}">{{$pergunta->opcao5}}</label>
                    </p>
                </div>
                 </div>
            </div>
            <?php } ?>
            </div>
                <ul class="nav nav-pills">
                    <?php for($j=1; $j<=$i; $j++) {
                    ?>
                            <li id="nav{{$j}}"  class="<?php if($j==1) echo "active"; ?>" ><a  data-toggle="pill" href="#pergunta{{$j}}">{{$j}}</a></li>
                    <?php }?>
                </ul>
          <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 col-lg-offset-10 col-sm-offset-9 col-md-offset-10 col-xs-offset-8">
         {!!Form::submit('Entregar',['class'=>'btn btn-primary']) !!}
        </div>
        {!!Form::close()!!}
    </div>
    <script>
        function startTimer(duration, display) {
            var start = Date.now(),
                    diff,
                    minutes,
                    seconds;
            function timer() {
                // get the number of seconds that have elapsed since
                // startTimer() was called
                diff = duration - (((Date.now() - start) / 1000) | 0);

                // does the same job as parseInt truncates the float
                minutes = (diff / 60) | 0;
                seconds = (diff % 60) | 0;

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (diff <= 0) {
                    // add one second so that the count down starts at the full duration
                    // example 05:00 not 04:59
                    start = Date.now() + 1000;
                }
            };
            // we don't want to wait a full second before the timer starts
            timer();
            setInterval(timer, 1000);
        }

        window.onload = function () {
            var fiveMinutes = 60 * 60,
                    display = document.querySelector('#timer');
            startTimer(fiveMinutes, display);
        };
    </script>
@stop