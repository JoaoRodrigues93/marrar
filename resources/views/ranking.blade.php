<?php
//session_start();
$gestorRanking = new \App\GestorRanking();
//$gestorDisciplinaEstudada = new \App\GestorDisciplinaEstudada();
$gestorTemaEstudada = new \App\GestorTemaEstudada();
$gestorTesteFeito = new \App\GestorTesteFeito();
if($gestorRanking)
    $rankingDados = $gestorRanking->rankingDisciplinaActual();
if($gestorTemaEstudada)
    $temasEstudadas = $gestorTemaEstudada->temaEstudadas();
if($gestorTesteFeito)
    $testesFeitos = $gestorTesteFeito->testesFeitos();
if (isset($rankingDados)){
    $rankingArray = $rankingDados['ranking'];
    $minhaPosicao = $rankingDados['posicao'];
}
$estudante  = Auth::user();

$disciplina = $_SESSION['disciplina'];
?>

<div class="container-fluid">
    <div id="disciplinasEstudadas" class="well">
        <h4>Temas Estudadas</h4>
        @if(isset($temasEstudadas))
            <ul>
                @foreach($temasEstudadas as $tema)
                    @if($tema->disciplina_id == $disciplina->id)
                        <li>{{$tema->tema}}</li>
                    @endif
                @endforeach
            </ul>
        @else
            <p>Até agora não estudou em nenhum tema. Escolha um tema e comece a estudar.</p>
        @endif
    </div>
    <div id="ranking" class="well">
        @if(isset($rankingArray))
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
        @else
            <h4>Classificação</h4>
            <p>Classificação não disponivel.</p>
        @endif

    </div>
    <div id="ultimosTestes" class="well">
        <h4>Último testes realizados</h4>
        @if(isset($testesFeitos))
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