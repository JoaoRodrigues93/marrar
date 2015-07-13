<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>
        @yield('title')

    </title>
    @section('links')
        <link href="{{URL::asset('css/bootstrap.css')}} " rel="stylesheet">
        <link href="{{URL::asset('js/bootstrap.js')}} " rel="script" >
        <link href="{{URL::asset('css/style.js')}} " rel="stylesheet" >

    @show


</head>
<body>
@yield('body')

@section('footer')

    <p align="center">&copy; Marrar  {{date('Y')}}</p>
    <p align="center">&copy; Todos direitos reservados</p>
@show
</body>
</html>