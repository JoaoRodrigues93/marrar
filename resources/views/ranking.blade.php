<?php
$gestorTemaEstudada = new \App\GestorTemaEstudada();
$gestorTesteFeito = new \App\GestorTesteFeito();
if ($gestorTemaEstudada)
    $temasEstudadas = $gestorTemaEstudada->temaEstudadas();
if ($gestorTesteFeito)
    $testesFeitos = $gestorTesteFeito->testesFeitos();
$estudante = Auth::user();
$disciplina = $_SESSION['disciplina'];
?>
<div class="container-fluid">
    <div id="disciplinasEstudadas" class="well">
        <h4>Temas Estudados:</h4>
        <?php $temaCont = false; ?>
        @foreach($temasEstudadas as $tema)
            @if($tema->disciplina_id == $disciplina->id)
                <?php $temaCont = true; ?>
            @endif
        @endforeach
        @if($temaCont)
            <ul>
                @foreach($temasEstudadas as $tema)
                    @if($tema->disciplina_id == $disciplina->id)
                        <li><a href="estudar/{{$tema->capitulo_id}}/{{$tema->tema}}">{{$tema->tema}}</a></li>
                    @endif
                @endforeach
            </ul>
        @else
            <p>Até agora não estudou em nenhum tema. Escolha um tema e comece a estudar.</p>
        @endif
    </div>
    <div id="ultimosTestes" class="well">
        <h4>Últimos testes realizados:</h4>
        <?php $utCont = false; ?>
        @foreach($testesFeitos as $teste)
            @if ($teste->disciplina_id == $disciplina->id)
                <?php $utCont = true; ?>
            @endif
        @endforeach
        @if($utCont)
            <ul>
                @foreach($testesFeitos as $teste)
                    @if ($teste->disciplina_id == $disciplina->id)
                        <li>{{$teste->capitulo}} : {{$teste->nota}} valores</li>
                    @endif
                @endforeach
            </ul>
        @else
            <p>Até agora não fez nenhum teste. Escolha um Capítulo e comece a fazer.</p>
        @endif
    </div>
</div>