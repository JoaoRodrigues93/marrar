@section('title')
    Marrar:Disciplinas
@stop
<div class="jumbotron">
    <div class="panel panel-body">
        <div class="row">
            @foreach($disciplinas as $disciplina)
                <div class="col-md-3 portfolio-item">
                    <a href="{{URL::to('/disciplinaHome/'.$disciplina->id)}}">

                        <object data="{{URL::asset('img/livros/'.$disciplina->nome.'.png')}}" type="image/png">

                            <img class="img-responsive" src="{{URL::asset('img/livros/book.png')}} ">

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
