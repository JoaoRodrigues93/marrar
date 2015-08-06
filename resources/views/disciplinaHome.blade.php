
@section('title')
    Marrar:Disciplinas
@stop
<link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
<link href="{{URL::asset('css/style.css')}} " rel="stylesheet">

    <div class="container">
<div class="jumbotron">
    <div class="panel panel-body">
        <div class="row">
            <?php $path="";?>
            @foreach($disciplinas as $disciplina)
                <div class="col-md-3 portfolio-item">
                    <a href="{{URL::to('/disciplinaHome/'.$disciplina->id)}}">


                        <?php
                        $disciplin= preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT', $disciplina->nome ) );
                            $disciplin=strtolower($disciplin);
                            switch($disciplin){

                                case "biologia": $path='biologia.png';break;
                                case "fisica"  : $path='fisica.png'; break;
                                case "filosofia"  : $path='filosofia.png'; break;
                                case "historia"  : $path='historia.png'; break;
                                case "matematica"  : $path='matematica.png'; break;
                                case "portugues"  : $path='portugues.png'; break;
                                case "quimica"  : $path='quimica.png'; break;
                                case "geografia"  : $path='geografia.png'; break;
                                default: $path='default.png'; break;
                            }
                        ?>
                            <object id="imagem" data="{{URL::asset('img/livros/'.$path)}}" type="image/png">

                                <img class="img-responsive" src="{{URL::asset('img/livros/default.png')}} ">

                            </object>



                        <h2 class="text-center">
                            {{$disciplina->nome}}
                        </h2>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
    </div>
