<!DOCTYPE html>
<html lang="en">
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

@if(!Auth::check())
    @include('templates.guestHeader')
@endif

<div class="body_container manager_app">
    <div class="container">
        <div class="container view_manager_profile">
            <!-- Manager Profile Controller -->
            <div>
                <div>
                    <div class="manager_profile_image_container">
                        <div class="manager_cover_image"></div>
                        <!-- Profile Image -->
                        <div class="row">
                            <div class="col-xs-12 col-lg-2 col-lg-offset-5">
                                <div class="manager_profile_image">
                                    <img src="/site_images/profile_image_placeholder.png">
                                </div>
                                @if($manager["verification"]["verificationStatus"]==1)
                                    <div class="verified_logo">
                                        <img src="/site_images/verified.png">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-lg-4 col-lg-offset-4">
                                <div class="manager_bio text-center">
                                    <p class="manager_name">{{$manager['first_name']." ".$manager['middle_name']." ".$manager['last_name']}}</p>
                                    <p class="institution_name">{{$manager['institution_name']}}</p>
                                    <p class="manager_designation">Under - 20's Head Coach</p>
                                    <p class="manager_location">{{$manager['state'].", ".$manager['country']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Manager Profile Summary -->
                    <div class="manager_profile_summary">
                        <p>{{$manager['bio']}}</p>
                    </div>
                    <!-- Manager Career History -->
                    <div class="manager_career_history">
                        <h1>Career History</h1>
                        @foreach($manager["career_history"] as $careerHistory)
                            <p>
                            @foreach($careerHistory["achievements"] as $achievement)
                                    <span>{{$careerHistory["career_year"].": ".$achievement["achievement"]}}</span><br>
                            @endforeach
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('templates.userFooter')


</body>
</html>
