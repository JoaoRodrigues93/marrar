@extends('layouts.main_a_marrar')

@section('title')
    Marrar | A estudar
@stop

@section('conteudo')

    <div class="container" id="container">


    </div>

    <div class="container mainContainer">

        <div id="displayed" class="container segundoContainer">

            <?php

            function ainda($texto)
            {


                //coverter todas as entidades html em seus
                //correspondes de caracteres, isso não inclue tags
                $textoDecodificado = html_entity_decode($texto);

                //Retira espaço em branco (ou outros caracteres) do final da string
                $textoTrim = rtrim($textoDecodificado, [" ", "\t"]);

                

            }

            $texto = file_get_contents($conteudo);
            echo $texto;

            //$findme = '';

            //$pos = strpos($texto, $findme);



            //  $textoDividido = str_split($texto, 343);
            // foreach ($textoDividido as $chunk_content) {
            //    echo '<div class="container segundoContainer">';
            //     echo $chunk_content;
            //    echo '</div>';
            // }

            ?>

            {{--<script>
                $(function () {
                    $(document).on('load', function () {
                        var theText = $('#hidden').val();
                        var i = 200;
                        while (theText.length > 200) {
                            console.log('looping');
                            while (theText.charAt(i) !== '.') {
                                i++;
                            }

                            console.log(i);
                            $("#text_land").append("<p>" + theText.substring(0, i+1) + "</p>");
                            theText = theText.substring(i+1);
                            i = 200;
                        }

                        $('#text_land').append("<p>" + theText + "</p>");
                    })
                })
            </script>--}}
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
                <button role="button" class=" btnTeoExer btn btn-danger btn-md disabled">Teória</button>
            </div>
            <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
                <button role="button" class=" btnTeoExer btn btn-danger btn-md">Exercicio</button>
            </div>
        </div>
    </div>

@stop