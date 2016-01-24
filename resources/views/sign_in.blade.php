<!DOCTYPE html>
<html>
<head>
    <title>Talenthub</title>
    <link rel="stylesheet" href="{{url('fonts/fonts.css')}}">
    <link rel="stylesheet" href="{{asset(elixir("css/welcomepage.css"))}}">
    <!--link rel="stylesheet" href="css/welcomepage.css"-->

    <!-- Disabling zooming on mobile phones -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/html5shiv.min.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <script src="{{asset('js/basic_site_animation.js')}}"></script>

    <script src="{{asset('js/form-validations.js')}}"></script>
</head>
<body ng-app="app" class="sign_in_page">
@include("templates.guestHeader")

<section class="banner">
    <div class="">

        <div class="container">
            <h2>Talenthub is the sport networking service that is helping sport talent connect with the relevant managers of talent who can help the sport talent to progress their careers.</h2>

            <div class="row">
                <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                    <p>Save yourself the pain of looking up coaches and sport agents contact details online, and stop wasting your money paying agencies to get you recruited. Sign up to Talenthub today, complete your online sport curriculum vitae with all of your achievements and references, add as many photos and video clips of yourself in action and make direct contact with 25,000 university sport coaches and 3,000 credible professional sport agents on our database.</p>
                </div>
            </div>

            <div class="row form_container">
                <div class="col-xs-12 col-lg-12">
                    <div class="">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                        {!! Form::open(['method'=>'post','url'=>'auth/login']) !!}
                        @include("templates.forms.signin")
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>

    </div>

</section>

@include('templates.guestFooter')
</body>
</html>
