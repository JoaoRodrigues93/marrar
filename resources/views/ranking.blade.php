<?php
$gestorRanking = new \App\GestorRanking();
$gestorDisciplinaEstudada = new \App\GestorDisciplinaEstudada();
$gestorTesteFeito = new \App\GestorTesteFeito();
$rankingDados = $gestorRanking->rankingDisciplinaActual();
$disciplinasEstudadas = $gestorDisciplinaEstudada->disciplinaEstudadas();
$testesFeitos = $gestorTesteFeito->testesFeitos();

$rankingArray = $rankingDados['ranking'];
$minhaPosicao = $rankingDados['posicao'];
$estudante  = Auth::user();

?>

<div class="container-fluid">
    <div id="disciplinasEstudadas" class="well">
        <h4>Disciplinas Estudadas</h4>
        @if($disciplinasEstudadas)
            <ul>
            @foreach($disciplinasEstudadas as $disciplina)
                <li>{{$disciplina->disciplina}}</li>
            @endforeach
            </ul>
        @else
        <p>Até agora não estudou nenhuma disciplina. Escolha uma disciplina e comece a estudar</p>
        @endif
    </div>
    <div id="ranking" class="well">
        <h4>Classificação: {{$_SESSION['disciplinaActual']->nome}}</h4>

            <ol>
                @foreach($rankingArray as $ranking)

                    <li>
                   <p> {{$ranking->estudante}} : <strong>{{ round($ranking->nota,1)}}</strong> valores</p>
                </li>
                @endforeach
            </ol>
        @if($minhaPosicao>5)
            <p>{{$minhaPosicao}}. {{$estudante->nome}}</p>
        @endif
    </div>
    <div id="ultimosTestes" class="well">
        <h4>Último testes realizados</h4>
        @if($testesFeitos)
            <ul>
                @foreach($testesFeitos as $teste)
                    <li>{{$teste->capitulo}} : {{$teste->nota}} valores</li>
                @endforeach
            </ul>
        @else
            <p>Até agora não fez nenhum teste. Faça um teste e comece a fazer</p>
        @endif
    </div>
</div>