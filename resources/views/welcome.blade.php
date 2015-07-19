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
    <body ng-app="app">
        @include("templates.guestHeader")

        <section class="banner">
            <div class="black_gloss">
                <div class="container">
                    <h1 class="">The mission of Talenthub is to connect sport talent all over the world with the relevant managers of sport talent who can help progress the sport talents careers.</h1>
                    <br>
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
