<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{asset(elixir("css/main.css"))}}" rel="stylesheet">
    <link href="{{asset('css/site_animation.css')}}" rel="stylesheet">

    <!-- Disabling zooming on mobile phones -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/angular.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/html5shiv.min.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <script src="{{asset('js/basic_site_animation.js')}}"></script>

    <script src="{{asset('js/allangularscripts.js')}}"></script>
    <script src="{{asset('js/form-validations.js')}}"></script>


</head>
<body >


    @include('templates.userHeader')


    <div class="body_container" >
        @yield('content')
    </div>


    @include('templates.userFooter')




</body>
</html>
