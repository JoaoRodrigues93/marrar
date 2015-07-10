
@extends('layouts.main')
@section('title')
   Disciplina
@stop
@section('body')

    <div class="container">
        <div class="jumbotron">
            <h2 class="text-center">Disciplina</h2>
     <form role="form" method="post">

        <div class="form-group">
            <label for="txt">Introduza a disciplina:</label>

           <input type="text" name="disciplina" class="form-control" placeholder="Introduza a disciplina">
        </div>

         <button type="submit" name="Gravar" class="btn btn-primary">Gravar</button>

     </form>
        </div>
    </div>
@stop