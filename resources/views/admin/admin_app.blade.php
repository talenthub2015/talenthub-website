<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <title>Laravel</title>

    <link rel="stylesheet" href="{{url('fonts/fonts.css')}}">

    <link href="{!! asset(elixir('css/main.css')) !!}" rel="stylesheet">
    <link href="{!! asset('css/site_animation.css') !!}" rel="stylesheet">

    <!-- Disabling zooming on mobile phones -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script src="{!! asset('js/js-variables.js') !!}"></script>
    <script src="{!! asset('js/jquery-1.11.2.min.js') !!}"></script>
    <script src="{!! asset('js/jquery-ui.min.js')!!}"></script>
    <script src="{!! asset('js/angular.min.js')!!}"></script>
    <script src="{!! asset('js/angular-sanitize.min.js') !!}"></script>
    <script src="{!!asset('js/bootstrap.min.js')!!}"></script>
    <script src="{!!asset('js/html5shiv.min.js')!!}"></script>
    <script src="{!!asset('js/respond.min.js')!!}"></script>

    <script src="{!!asset('js/allangularscripts.js')!!}"></script>
    <script src="{!!asset('js/form-validations.js')!!}"></script>
    <script src="{!!asset('js/basic_site_animation.js')!!}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>



</head>
<body >


@if(Auth::check())
    @include('admin.template.admin_header')
@endif

<div class="body_container" >
    @yield('content')
</div>





</body>
</html>
