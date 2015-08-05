
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
                            switch($disciplina->nome){
                                case "Biologia": $path='biologia.png';break;
                                case "Física"  : $path='fisica.png'; break;
                                case "Filosofia"  : $path='filosofia.png'; break;
                                case "História"  : $path='historia.png'; break;
                                case "Matemática"  : $path='matematica.png'; break;
                                case "Português"  : $path='portugues.png'; break;
                                case "Química"  : $path='quimica.png'; break;
                                case "Geografia"  : $path='geografia.png'; break;
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
