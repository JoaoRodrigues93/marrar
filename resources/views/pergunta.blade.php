@extends('layouts.main')

@section('title')
    Registo de Perguntas
@stop


@section('body')
<h3 class="text-center"> Registo de perguntas</h3>
   <form method="post">

       <div class="form-group">
      <div class="jumbotron">
       <div  class="col-lg-12">

           <div class="col-lg-3">


           <label >Selecione a disciplina</label>
               <select id="disciplina"></select>
           </div>
            <div class="col-lg-4">
           <label >Selecione o capitulo</label>
           <select id="capitulo"></select>
           </div>
            <div class="col-lg-5">
           <label >Selecione o tema</label>
           <select id="tema"> </select>

            </div>
        </div>
      </div>

           <div  align="center">

           <div class="col-lg-12">
               <textarea id="pergunta" placeholder="introduza a pergunta" class="container" required></textarea>

           </div>
               <div class="col-lg-12">
                   <textarea id="resposta_certa" placeholder="introduza a resposta certa" class="container" required></textarea>

               </div>
                    <div class="col-lg-12">
                       <textarea id="resposta1"  placeholder="Introduza a 1ª resposta errada" class="container" required></textarea>

                   </div>
                    <div class="col-lg-12">

                           <textarea id="resposta2"  placeholder="Introduza a 2ª resposta errada" class="container" required></textarea>

                       </div>
                    <div class="col-lg-12">
                               <textarea id="resposta3"  placeholder="Introduza a 3ª resposta errada" class="container" required></textarea>

                    </div>
               <div class="col-lg-12">
                    <textarea id="resposta4"  placeholder="Introduza a 4ª resposta errada" class="container" required></textarea>
               </div>



           </div>

    <div class="center-block" align="center">

    <input class="btn-success" type="submit" value="Submeter pergunta">

    </div>
       </div>
    </form>

@stop