<!--Temp Exame Colectivo -->

<?php
    $mytime = Carbon\Carbon::now();
?>
<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
    <script src={{URL::asset('js/countdown.js')}}></script>
    <script src="/"></script>

    <style>
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';

        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 7rem;
            margin-bottom: 40px;
            font-family: 'Cooper Black';
            color: #349BDF;
            letter-spacing: 0.6px;
            text-shadow: 1px 1px 2px #999;
        }

        .message {
            font-size: 31px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<script src="js/countdown.js"></script>
<script>
    var callbackfuction = function() {
        console.log('Finished');
    }
    countdown('11/09/2015 06:00:00 PM', ['days', 'hours', 'minutes', 'seconds'], callbackfuction());
</script>

<div class="container">
    <div class="content">
        <div class="title">marrar</div>
        <div class="message">
            <p>Exames Colectivos brevemente :)</p>
            Em:
            <span id="days">00</span>
            <span> Dias, </span>
            <span id="hours">00</span>
            <span> Horas, </span>
            <span id="minutes">00</span>
            <span> Minutos e </span>
            <span id="seconds">00</span>
            <span> Segundos. </span>
        </div>
    </div>
</div>


</body>

</html>
