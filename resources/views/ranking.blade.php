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
        <?php $temaCont = false; ?>
        @foreach($temasEstudadas as $tema)
            @if($tema->disciplina_id == $disciplina->id)
                <?php $temaCont = true; ?>
            @endif
        @endforeach

        @if($temaCont)
            <h4>Temas Estudadas:</h4>
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
            <?php $rankCont = false; ?>
            @foreach($rankingArray as $ranking)
                @if ($ranking->estudante != null)
                    <?php $rankCont = true; ?>
                @endif
            @endforeach

            @if($rankCont)
                <h4>Classificação: {{$_SESSION['disciplinaActual']->nome}}</h4>
                <ol>
                    @foreach($rankingArray as $ranking)
                        <li>
                            <p> {{$ranking->estudante}} : <strong>{{ round($ranking->nota,1)}}</strong> valores</p>
                        </li>
                    @endforeach
                        @if($minhaPosicao>5)
                            <p>{{$minhaPosicao}}. {{$estudante->nome}}</p>
                        @endif
                </ol>
            @else
                <h4>Classificação</h4>
                <p>Classificação não disponivel.</p>
            @endif

    </div>
    <div id="ultimosTestes" class="well">
        <?php $utCont = false; ?>
        @foreach($testesFeitos as $teste)
                @if ($teste->nota != null)
<!-- Ele aqui está a devolver todos os testes feitos pelo usuário.. tenho que mudar para todos os testes mais recentes com sua maior nota! -->
                    <?php $utCont = true; ?>
                @endif
        @endforeach

        @if($utCont)
                <h4>Últimos testes realizados:</h4>
                <ul>
                    @foreach($testesFeitos as $teste)
                        <li>{{$teste->capitulo}} : {{$teste->nota}} valores</li>
                    @endforeach
                </ul>
        @else
                <p>Até agora não fez nenhum teste. Faça um teste para entrar na lista!</p>
        @endif
    </div>
</div>