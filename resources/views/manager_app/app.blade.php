<!DOCTYPE html>
<html lang="en" ng-app="thub.manager_app">
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
    <script src="{!!asset('js/bootstrap.min.js')!!}"></script>
    <script src="{!!asset('js/html5shiv.min.js')!!}"></script>
    <script src="{!!asset('js/respond.min.js')!!}"></script>

    <script src="{!!asset('js/allangularscripts.js')!!}"></script>
    <script src="{!!asset('js/form-validations.js')!!}"></script>
    <script src="{!!asset('js/basic_site_animation.js')!!}"></script>
    <script src="{!!asset('js/app/manager_app/manager_app.js')!!}"></script>
    <script src="{!!asset('js/app/manager_app/class_lib.js')!!}"></script>
    <script src="{!!asset('js/app/manager_app/services/services.js')!!}"></script>
    <script src="{!!asset('js/app/manager_app/profile/manager_profile.js')!!}"></script>
    <script src="{!!asset('js/app/manager_app/profile/manager_profile_services.js')!!}"></script>
    <script src="{!!asset('js/app/manager_app/directive/request_loading.js')!!}"></script>
    <script src="{!! asset('js/app/manager_app/services/GetManagerCareerHistoryService.js') !!}"></script>

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
    <div ng-view></div>
</div>

<!-- Loading Overlay -->
<loading-request></loading-request>


@include('templates.userFooter')




</body>
</html>
