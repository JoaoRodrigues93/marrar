@extends('layouts.main')

@section('title')
    Capitulo
@stop
@section('body')

    <div class="container">
        <div class="jumbotron">
            <h2 class="text-center">Capitulo</h2>
            <form role="form" method="post">

                <div class="form-group">
                   <label for="txt">Escolha a disciplina</label>
                  <select class="form-control" id="sel1">
                        <option>Matematica</option>
                        <option>Portugues</option>
                        <option>Ingles</option>


                    </select>
                </div>

                <div class="form-group">
                    <label for="txt">Introduza o nome do capitulo:</label>

                     <input type="text" name="disciplina" class="form-control" placeholder="Introduza o capitulo">
                </div>

                <div>  <button type="submit" name="Gravar" class="btn btn-primary">Gravar</button>
                </div>



            </form>
        </div>
    </div>
@stop