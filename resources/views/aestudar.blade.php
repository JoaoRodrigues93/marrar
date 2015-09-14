<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>a marrar...</title>
    <link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
    <link href="{{asset('css/marrar.css')}}" rel="stylesheet">
    <link href="{{asset('css/w3.css')}}" rel="stylesheet">
    <script src="{{URL::asset('js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap.js')}} "></script>
</head>
<body>

<div style="background: #F1F1F1">

    <div class="card w3-card-2">

        {{--<b>Aprenda </b>
        Matem&#225;tica, Portugu&#234;s,
        F&#237;sica, Qu&#237;mica, Biologia,
        Geografia, Hist&#243;ria, Ingl&#234;s,
        Franc&#234;s e prepare-se
        para seu exame de admiss&atilde;o
        <b>gratuitamente</b>...onde e quando quiser.</p>

        <b>Aprenda </b>
        Matem&#225;tica, Portugu&#234;s,
        F&#237;sica, Qu&#237;mica, Biologia,
        Geografia, Hist&#243;ria, Ingl&#234;s,
        Franc&#234;s e prepare-se
        para seu exame de admiss&atilde;o
        <b>gratuitamente</b>...onde e quando quiser.</p>

        mais escuro--}}

    </div>

</div>
<div style="background: #F5F5F5">

    <div class="card w3-card-2">
        {{--<b>Aprenda </b>
        Matem&#225;tica, Portugu&#234;s,
        F&#237;sica, Qu&#237;mica, Biologia,
        Geografia, Hist&#243;ria, Ingl&#234;s,
        Franc&#234;s e prepare-se
        para seu exame de admiss&atilde;o
        <b>gratuitamente</b>...onde e quando quiser.</p>

        <b>Aprenda </b>
        Matem&#225;tica, Portugu&#234;s,
        F&#237;sica, Qu&#237;mica, Biologia,
        Geografia, Hist&#243;ria, Ingl&#234;s,
        Franc&#234;s e prepare-se
        para seu exame de admiss&atilde;o
        <b>gratuitamente</b>...onde e quando quiser.</p>--}}



    </div>

</div>
<div style="background: #FAFAFA">

    <div class="card w3-card-2">

       {{-- <b>Aprenda </b>
        Matem&#225;tica, Portugu&#234;s,
        F&#237;sica, Qu&#237;mica, Biologia,
        Geografia, Hist&#243;ria, Ingl&#234;s,
        Franc&#234;s e prepare-se
        para seu exame de admiss&atilde;o
        <b>gratuitamente</b>...onde e quando quiser.</p>

        <b>Aprenda </b>
        Matem&#225;tica, Portugu&#234;s,
        F&#237;sica, Qu&#237;mica, Biologia,
        Geografia, Hist&#243;ria, Ingl&#234;s,
        Franc&#234;s e prepare-se
        para seu exame de admiss&atilde;o
        <b>gratuitamente</b>...onde e quando quiser.</p>--}}

    </div>

</div>

<style>
    div {
        width: calc(100%/3);
        height: 400px;

        margin-top: 50px;
        background: red;
        float: right;
    }

    div > div{
        width: 50%;
        height: 50%;
        background: white;
        float: none;
        vertical-align: middle;
        margin: 25% 0 0 25%;
    }

    .card {
        position: relative;
        margin-bottom: .75rem;
        background-color: #fff;
        border: .0625rem solid #e5e5e5;
        border-radius: .25rem;

        overflow: scroll;
        overflow-x: hidden;
    }
</style>

</body>
</html>