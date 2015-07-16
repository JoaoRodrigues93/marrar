<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>
        @yield('title')

    </title>
    @section('links')
        <link href="{{URL::asset('css/bootstrap.min.css')}} " rel="stylesheet">
        <script src="{{URL::asset('js/jquery.min.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.js')}} "></script>
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