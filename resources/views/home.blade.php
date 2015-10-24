@extends('layouts.maincontent')
<script>
        document.getElementById('voltar').removeAttribute('href');
        document.getElementById('marrar').removeAttribute('href');
        document.getElementById('marrar').style.cursor = auto;
</script>
@section('body')
        @include('disciplinaHome',['disciplinas'=>$disciplinas])
@stop