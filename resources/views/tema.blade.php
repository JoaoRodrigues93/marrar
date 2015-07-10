@extends('layouts.main')

@section('title')
    Tema
@stop
@section('body')

    <div class="container">
            <h2 class="text-center">Tema</h2>
            <form role="form" method="post">

                <div class="jumbotron">
                <div class="form-group">
                    <label for="sel3">Escolha a disciplina:</label>
                    <select class="form-control" id="sel3">
                        <option>Matematica</option>
                        <option>Portugues</option>
                        <option>Ingles</option>


                    </select>
                </div>
                <div class="form-group">
                    <label>Escolha o capitulo:</label>
                    <select class="form-control" id="sel1">
                        <option>trigonometria</option>
                        <option>Algebra</option>
                        <option>Limites</option>


                    </select>
                </div>

           </div>

                <div class="form-group">
                    <label>Introduza o nome do tema:</label>

                     <input type="text" name="tema" class="form-control" placeholder="Introduza o tema">
                </div>

                <div class="form-group">
                    <label id="sef1">Numero de questoes:</label>

                    <input type="number" name="tema" class="form-control" placeholder="10">
                </div>



                <div class="form-group">
                    <label for="comment">Conteudo</label>
                    <textarea class="form-control" rows="20" id="comment"></textarea>

                </div>

                <button type="submit" name="Gravar" class="btn btn-primary">Gravar</button>


            </form>
    </div>

@stop