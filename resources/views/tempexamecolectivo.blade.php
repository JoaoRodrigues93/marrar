<!--Temp Exame Colectivo -->
@extends('layouts.maincontent')
@section('links')
    @parent
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <script src={{URL::asset('js/countdown.js')}}></script>
    <script src="/"></script>
<script src="js/countdown.js"></script>
    @stop

@section('body')
<?php
$mytime = Carbon\Carbon::now();
?>

<script>
    var callbackfuction = function() {
        console.log('Finished');
    }
    countdown('12/03/2015 11:40:00 PM', ['days', 'hours', 'minutes', 'seconds'], callbackfuction());
</script>

<div>
    <div class="Sevcontent">
        <div class="Sevtitle">marrar</div>
        <div class="Sevmessage">
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

@stop