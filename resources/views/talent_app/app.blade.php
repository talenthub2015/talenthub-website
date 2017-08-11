<!DOCTYPE html>
<html lang="en" ng-app="thub.talentApp">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <title>Talenthub</title>

    <link rel="stylesheet" href="{!! url('fonts/fonts.css') !!}">
    <link href="{!! asset(elixir('css/main.css')) !!}" rel="stylesheet">
    <link href="{!! asset('css/site_animation.css') !!}" rel="stylesheet">

    <!-- Disabling zooming on mobile phones -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <script src="{!! asset('js/js-variables.js') !!}"></script>
    <script src="{!! asset('js/jquery-1.11.2.min.js') !!}"></script>
    <script src="{!! asset('js/jquery-ui.min.js')!!}"></script>
    <script src="{!! asset('js/angular.min.js')!!}"></script>
    <script src="{!! asset('js/angular-sanitize.min.js') !!}"></script>
    <script src="{!! asset('js/angular-animate.min.js') !!}"></script>
    <script src="{!! asset('js/angular-cookies.min.js') !!}"></script>
    <script src="{!! asset('js/angular-route.min.js') !!}"></script>
    <script src="{!! asset('js/angular-messages.min.js')!!}"></script>
    <script src="{!! asset('js/angular-ui-router.min.js') !!}"></script>
    <script src="{!! asset('js/lodash.js') !!}"></script>
    <script src="{!!asset('js/bootstrap.min.js')!!}"></script>
    <script src="{!!asset('js/html5shiv.min.js')!!}"></script>
    <script src="{!!asset('js/respond.min.js')!!}"></script>
    <script src="{!!asset('js/basic_site_animation.js')!!}"></script>

    @include('manager_app.js-include')
    @include('talent_app.js-include')

    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
        });
    </script>



</head>
<body >


@if(Auth::check())
    @include('templates.userHeader')
@endif
@if(!Auth::check())
    @include('templates.guestHeader')
@endif

<div class="body_container manager_app">
    <div class="container">
        <div ui-view></div>
    </div>
</div>

<!-- Loading Overlay -->
<loading-request></loading-request>


@include('templates.userFooter')


</body>
</html>
