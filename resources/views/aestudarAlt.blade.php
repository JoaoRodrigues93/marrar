@extends('layouts.main_a_marrar')

@section('title')
    Marrar | A estudar
@stop

@section('conteudo')

    <div class="container mainContainer">

        <div class="container segundoContainer">
            <div class="row">
                <h3>Cossenos</h3>
            </div>

            <div class="row teoria">
                <p>
                    Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod semper.
                    Duis mollis, est non commodo luctus, nisi erat
                    porttitor ligula, eget lacinia odio sem nec elit.
                    Duis mollis, est non com-modo luctus, nisi erat
                    porttitor ligula, eget lacinia odio sem nec elit.
                </p>

                <p>
                    Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod semper.
                    Duis mollis, est non commodo luctus, nisi erat
                    porttitor ligula, eget lacinia odio sem nec elit.
                    Duis mollis, est non com-modo luctus, nisi erat
                    porttitor ligula, eget lacinia odio sem nec elit.
                </p>

                <p>
                    Nulla vitae elit libero, a pharetra augue.
                    Vestibulum id ligula porta felis euismod semper.
                    Duis mollis, est non commodo luctus, nisi erat
                    porttitor ligula, eget lacinia odio sem nec elit.
                    Duis mollis, est non com-modo luctus, nisi erat
                    porttitor ligula, eget lacinia odio sem nec elit.
                </p>

            </div>

            <div class="row pergunta">
                
                <div class="row apergunta">
                    <h3>
                        Nulla vitae elit libero, a pharetra augue.
                        Vestibulum id ligula porta felis euismod semper ??
                    </h3>
                </div>

                <div class="row respostas">
                    <div class="row radio resp1 form-group">

                        <label><input type="radio" name="optradio">Option 1</label>
                    </div>
                    <div class="row radio resp2 form-group ">
                        <label><input type="radio" name="optradio">Option 2</label>
                    </div>
                    <div class="row radio resp3 form-group">
                        <label><input type="radio" name="optradio">Option 3</label>
                    </div>
                    <div class="row radio resp4 form-group">
                        <label><input type="radio" name="optradio">Option 4</label>
                    </div>
                    <div class="row radio resp5 form-group">
                        <label><input type="radio" name="optradio">Option 5</label>
                    </div>
                </div>

                <div class="row cofirmacao">

                    <div class="col-lg-8"></div>
                    <div class="col-lg-4">
                        <button role="button" class="btn btn-success btn-md">Confirmar</button>
                    </div>
                </div>

            </div>
            <div class="row teoria">
                <p>
                    NósBlogEscolasCidadesParceirosCossenosNulla vitae elit libero,
                    a pharetra augue. Vestibulum id ligula porta felis euismod semper.
                    Duis mollis, est non com-modo luctus, nisi erat porttitor ligula,
                    eget lacinia odio sem nec elit. Duis mollis, est non commodo luctus,
                    nisi erat porttitor ligula, eget lacinia odio sem nec elit.
                </p>

                <p>
                    Lorem dictum suscipit vitae sit amet leo. d est, eget varius ligula interdum at.
                    lorem dictum suscipit vitae sit amet leo. d est, eget varius ligula interdum at.
                    lorem dictum suscipit vitae sit amet leo. d est, eget varius ligula interdum at.
                    lorem dictum suscipit vitae sit amet leo. d est, eget varius ligula interdum at.
                    lorem dictum suscipit vitae sit amet leo. d est, eget varius ligula interdum at.
                </p>

                <p>
                    Lorem dictum suscipit vitae sit amet leo. d est, eget varius ligula interdum at.
                    lorem dictum suscipit vitae sit amet leo. d est, eget varius ligula interdum at.
                    lorem dictum suscipit vitae sit amet leo. d est, eget varius ligula interdum at.
                    lorem dictum suscipit vitae sit amet leo. d est, eget varius ligula interdum at.
                    lorem dictum suscipit vitae sit amet leo. d est, eget varius ligula interdum at.
                </p>
            </div>

            <div class="row">
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

            <div class="row">
                <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
                    <button role="button" class=" btnTeoExer btn btn-danger btn-md disabled">Teória</button>
                </div>
                <div class="col-lg-6 col-xs-6 col-sm-6 col-md-6">
                    <button role="button" class=" btnTeoExer btn btn-danger btn-md">Exercicio</button>
                </div>
            </div>
        </div>
    </div>

@stop