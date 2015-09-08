@extends('layouts.main_a_marrar')

@section('title')
    Marrar | A estudar
@stop

@section('conteudo')

    <div class="container" id="container">


    </div>

    <div class="container mainContainer">

        <?php
        $texto = file_get_contents($conteudo);

        ?>

        <div id="displayer">
            <input id="conteudo" type="hidden" value="{{$texto}}">

            <div id="display" class="container segundoContainer">

            </div>
            <script type="text/javascript">
                for (i = 0; i < marrar() - 1; i++) {
                    <?php
                        echo '<div id="display" class="container segundoContainer"></div>';
                    ?>
                }
            </script>
        </div>

        <div class="row btnControle">
            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                <button role="button" class="btn anterior"></button>
            </div>
            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                <label>1</label>
            </div>
            <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4">
                <button role="button" class="btn proxima"></button>
            </div>
        </div>

        <div class="row btnSelectConteudo">
            <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
                <button role="button" class=" btnTeoExer btn btn-danger btn-md disabled">Te�ria</button>
            </div>
            <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
                <button role="button" class=" btnTeoExer btn btn-danger btn-md">Exercicio</button>
            </div>
        </div>

        <script type="text/javascript">
            var texto = document.getElementById('conteudo');
            document.getElementById('display').innerHTML = texto.value;


            function marrar() {
                var display = $('#display').height();
                var displayer = $('#displayer').height();
                return Math.round(display / displayer);
            }
        </script>

    </div>

@stop
