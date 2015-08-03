
@section('title')
    Marrar:Disciplinas
@stop
<link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
<link href="{{URL::asset('css/style.css')}} " rel="stylesheet">

    <div class="container">
<div class="jumbotron">
    <div class="panel panel-body">
        <div class="row">
            @foreach($disciplinas as $disciplina)
                <div class="col-md-3 portfolio-item">
                    <a href="{{URL::to('/disciplinaHome/'.$disciplina->id)}}">

                        <object id="imagem" data="{{URL::asset('img/livros/'.$disciplina->nome.'.png')}}" type="image/png">

                            <img class="img-responsive" src="{{URL::asset('img/livros/quimica.png')}} ">

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
