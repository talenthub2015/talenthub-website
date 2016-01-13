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
<body ng-app="app" class="sign_up_page">
@include("templates.guestHeader")

<section class="banner">
    <div class="">

        <div class="container">

            <div class="row">
                <div class="col-xs-12 col-lg-8">
                    {{--<h1 class="">The mission of Talenthub is to connect sport talent all over the world with the relevant managers of sport talent who can help progress the sport talents careers.</h1>--}}
                    <!--video controls height="300px">
                        {{--<source src="<?php echo asset('th_video/talenthub.mp4'); ?>" type="video/mp4">--}}
                        {{--Your browser doesn't support Video.--}}
                    </video-->
                    <div class="informative_tab_content">
                        <div role="usertypetabpanel" class="tab-pane fade in active talent">
                            <p>Save yourself the pain of looking up coaches and sport agents contact details online, and stop wasting your money paying agencies to get you recruited. Sign up to Talenthub today, complete your online sport curriculum vitae with all of your achievements and references, add as many photos and video clips of yourself in action and make direct contact with 25,000 university sport coaches and 3,000 credible professional sport agents on our database.</p>
                            <iframe width="600" height="340" src="https://www.youtube.com/embed/Te_9qFNzIho?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div role="usertypetabpanel" class="tab-pane fade coach">
                            <p>We are looking for professional sport Coaches, Scouts and Agents to grow our professional database. Quality aspiring professionals are using Talenthub everyday with the agenda of attracting professional sport opportunities. </p>

                            <div id="testimonials">
                                <div id="testimonials_crousels" class="carousel slide" data-ride="" data-interval="10000">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <li data-target="#testimonials_crousels" data-slide-to="0" class="active"></li>
                                        <li data-target="#testimonials_crousels" data-slide-to="1"></li>
                                        <li data-target="#testimonials_crousels" data-slide-to="2"></li>

                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner" role="listbox">
                                        <div class="item active">
                                            <video controls class="video">
                                                <source src="{{asset('th_video/video_3.mp4')}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>

                                        <div class="item">
                                            <video controls class="video">
                                                <source src="{{asset('th_video/video_2.mp4')}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                        <div class="item">
                                            <video controls class="video">
                                                <source src="{{asset('th_video/video_1.mp4')}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>

                                    </div>

                                    <!-- Controls -->
                                    <a class="left carousel-control" href="#testimonials_crousels" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#testimonials_crousels" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <script>
                                    $(document).ready(function(){
                                        $("#testimonials #testimonials_crousels").carousel('pause');
                                    });
                                </script>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-xs-12 col-lg-4">
                    <h4 class="form_heading">WHO ARE YOU?</h4>

                    <div role="usertypetabpanel" class="usertypetabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" <?php if(Session::get('register_user_type')==\talenthub\Repositories\SiteConstants::USER_TALENT || Session::get('register_user_type')=='') echo "class='active'";?>><a href=".talent" aria-controls="home" role="tab" data-toggle="tab">Athlete</a></li>
                            <!--li role="presentation"><a href="#parent" aria-controls="profile" role="tab" data-toggle="tab">Parent</a></li-->
                            <li role="presentation" <?php if(Session::get('register_user_type')==\talenthub\Repositories\SiteConstants::USER_MANAGER) echo "class='active'";?>><a href=".coach" aria-controls="messages" role="tab" data-toggle="tab">Manager</a></li>
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
                            <div role="usertypetabpanel" class="tab-pane fade in active talent">
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

                            <div role="usertypetabpanel" class="tab-pane fade coach">
                                <div class="form_container">
                                    {!! Form::open(['method'=>'post','url'=>'auth/register','name'=>'register_manager']) !!}
                                    @include('templates.forms.registration',['user'=>\talenthub\Repositories\SiteConstants::USER_MANAGER,
                                    'userManagerManagementLevel'=> $userManagerManagementLevel,'managerTypes'=>$managerTypes])
                                    {!! Form::close() !!}
                                </div>
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
