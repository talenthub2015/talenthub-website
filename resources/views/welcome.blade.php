<!DOCTYPE html>
<html>
	<head>
		<title>Talenthub</title>
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
    <body ng-app="app">
        @include("templates.guestHeader")

        <section class="banner">
            <div class="container">

                <h1>The mission of talenthub is to connect talent all over the world with managers of talent.</h1>
                <div class="row form_container">
                    <div class="col-xs-12 col-lg-12">
                        <h4>Sign In</h4>
                        <div class="sign_in_container">
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

        </section>

        @include('templates.guestFooter')
	</body>
</html>
