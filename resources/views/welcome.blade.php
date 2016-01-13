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
    <body ng-app="app" class="welcome_page">
        @include("templates.guestHeader")

        <section>
            <div class="container">
                <h1>Talenthub is the sport networking service that is helping sport talent connect with the relevant managers of talent who can help the sport talent to progress their careers.</h1>

                <div class="row">
                    <div class="col-xs-12 col-md-10 col-md-offset-1">
                        <p>Save yourself the pain of looking up coaches and sport agents contact details online, and stop wasting your money paying agencies to get you recruited. Sign up to Talenthub today, complete your online sport curriculum vitae with all of your achievements and references, add as many photos and video clips of yourself in action and make direct contact with 25,000 university sport coaches and 3,000 credible professional sport agents on our database.</p>

                        <div class="row">
                            <div class="col-xs-5 col-lg-5 text-center">
                                <a href="{{url('sign_up')}}" class="t-button">Sign Up - It's Free</a>
                            </div>
                            <div class="col-xs-2 col-lg-2 text-center">
                                <p>or</p>
                            </div>
                            <div class="col-xs-5 col-lg-5 text-center">
                                <a href="{{url('sign_in')}}" class="t-button">Sign In - Welcome Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="why_talenthub">
            <div class="container">
                <img src="{{asset('images/lp_sec2.png')}}" class="section_image">
            </div>
        </section>

        <section class="discover_talenthub">
            <div class="container">
                <div class="tab_container">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="col-xs-4" role="presentation"><a class="no_link">Discover Talenthub for:</a></li>
                        <li class="col-xs-4 active" role="presentation"><a href="#athletes" aria-controls="athletes" role="tab" data-toggle="tab">Athletes</a></li>
                        <li class="col-xs-4" role="presentation"><a href="#managers" aria-controls="managers" role="tab" data-toggle="tab">Managers</a></li>

                        {{--<li role="presentation">Discover Talenthub for:</li>--}}
                        {{--<li role="presentation" class="active"><a href="#athletes" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>--}}
                        {{--<li role="presentation"><a href="#managers" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>--}}
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="athletes">
                            <div class="row">
                                <div class="col-xs-12 col-lg-6 right_separation_line">
                                    <h4>Student Athletes</h4>
                                    <p>
                                        <strong>Student Athletes</strong> are athletes who are still in Primary School, Secondary/High School and University (or out of school but are at an age where they can still pursue sport scholarship opportunities at international or local universities).
                                    </p>
                                    <p>
                                        <strong>Student Athletes</strong> use Talenthub for the purposes of networking and making contacts with Secondary/High School and University sport coaches for sport scholarship opportunities. A <strong>Student Athlete</strong> account gives a Talenthub user access to our credible and growing database of 25,000 University Coaches from the USA.
                                    </p>

                                    <ul>
                                        <li><strong>Sign up to create a Talenthub account.</strong></li>
                                        <li><strong>Update/prepare your Talenthub sport profile</strong> (with sport curriculum vitae, academic information, sport and academic references, sport video clips and sport photos).</li>
                                        <li><strong>When your profile is complete: search for university sport coaches in your sport</strong> (search by preferred US State) <strong>and message them directly</strong> using our sample emails if you need help, and our 24/7 customer service team.
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-lg-6">
                                    <h4>Aspiring Professionals</h4>
                                    <p>
                                        <strong>Aspiring Professionals</strong> are athletes who are still in Secondary/High School, University and even out of school.
                                    </p>
                                    <p>
                                        <strong>Aspiring Professionals</strong> use Talenthub for the purposes of networking and making contacts with professional coaches, scouts and agents for professional sport trial opportunities.  An <strong>Aspiring Professional</strong> account gives a Talenthub user access to our credible and growing database of 3,000 professional coaches, scouts and agents from around the world.
                                    </p>

                                    <ul>
                                        <li><strong>Sign up to create a Talenthub account.</strong></li>
                                        <li><strong>Update/prepare your Talenthub sport profile</strong> (with sport curriculum vitae, sport references, sport video clips and sport photos).</li>
                                        <li><strong>When your profile is complete: search for professional coaches, scouts and/or agents in your sport</strong> (search by preferred country) <strong>and message them directly</strong> using our sample emails if you need help, and our 24/7 customer service team.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane managers" id="managers">
                            <ul class="nav">
                                <li class="col-xs-12 col-lg-4"><h4>Coaches</h4></li>
                                <li class="col-xs-12 col-lg-4"><h4>Scouts</h4></li>
                                <li class="col-xs-12 col-lg-4"><h4>Agents</h4></li>
                            </ul>

                            <p>We are looking for professional sport coaches, Scouts and Agents to grow our professional database. Quality aspiring professionals are using Talenthub everyday with the agenda of attracting professional sport opportunities. </p>

                            <p>What can Coaches/Scouts/Agents do on Talenthub? </p>

                            <ul>
                                <li>Create a basic managers profile on Talenthub</li>
                                <li>View sport resumes, reference reports and video clips of sport talent looking for opportunities</li>
                                <li>Message sport talent</li>
                            </ul>

                            <div class="row">
                                <div class="col-xs-12 col-lg-4 col-lg-offset-4">
                                    <a href="{{url('sign_up')}}" class="t-button">Sign Up - It's Free</a>
                                </div>
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
