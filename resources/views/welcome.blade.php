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
                    <h3><a href="#" data-target="#th_video" data-toggle="modal"><span class="glyphicon glyphicon-thumbs-up"></span> How does Talenthub help sport talent?</a></h3>
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



        <!-- Modal -->
        <div class="modal fade" id="th_video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div-->
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/Te_9qFNzIho?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

	</body>
</html>
