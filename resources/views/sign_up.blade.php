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
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-lg-8">
                <h1 class="sign_in_container">The mission of Talenthub is to connect sport talent all over the world with the relevant managers of sport talent who can help progress the sport talents careers.</h1>
            </div>
            <div class="col-xs-12 col-lg-4">
                <h4>WHO ARE YOU?</h4>

                <div role="usertypetabpanel" class="usertypetabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" <?php if(Session::get('register_user_type')==\talenthub\Repositories\SiteConstants::USER_TALENT || Session::get('register_user_type')=='') echo "class='active'";?>><a href="#talent" aria-controls="home" role="tab" data-toggle="tab">Athlete</a></li>
                        <!--li role="presentation"><a href="#parent" aria-controls="profile" role="tab" data-toggle="tab">Parent</a></li-->
                        <li role="presentation" <?php if(Session::get('register_user_type')==\talenthub\Repositories\SiteConstants::USER_MANAGER) echo "class='active'";?>><a href="#coach" aria-controls="messages" role="tab" data-toggle="tab">Manager</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            </div>
                        @endif
                        <div role="usertypetabpanel" class="tab-pane fade in active" id="talent">
                            <div class="form_container">
                                {!! Form::open(['method'=>'post','url'=>'auth/register','name'=>'register_talent']) !!}
                                @include('templates.forms.registration',['user'=>\talenthub\Repositories\SiteConstants::USER_TALENT,'sport_types'=>$sport_types])
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <!--div role="usertypetabpanel" class="tab-pane fade" id="parent">
                                    <div class="form_container">
                                        {!! Form::open(['method'=>'post','url'=>'auth/register','name'=>'register_parent']) !!}
                                            @include('templates.forms/registration',['user'=>'parent'])
                                        {!! Form::close() !!}
                                    </div>
                                </div-->

                        <div role="usertypetabpanel" class="tab-pane fade" id="coach">
                            <div class="form_container">
                                {!! Form::open(['method'=>'post','url'=>'auth/register','name'=>'register_manager']) !!}
                                @include('templates.forms.registration',['user'=>\talenthub\Repositories\SiteConstants::USER_MANAGER,
                                'userManagerManagementLevel'=> $userManagerManagementLevel])
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</section>

@include('templates.guestFooter')
</body>
</html>
