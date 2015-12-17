@extends('app')

@section('content')

    <div ng-app="edit-profile">
        <div class="container edit-profile">
            <br><br>
            <br><br>
            <div class="row">
                <div class="col-xs-12 col-lg-6 col-lg-offset-3 alert-success">

                    <br>
                    <p>
                        Congratulation! Your profile and curriculum vitae is done, you are now ready to customize your personal settings and profile page.
                    </p>
                    <p>
                        Do not forget to add as many photos and videos clips of yourself in action, for coaches to form a more credible opinion of you.
                    </p>
                    <p class="text-center"><a href="{{url('profile')}}"><button class="t-button">Cool, take me to my Profile</button></a></p>

                </div>
            </div>

        </div>
    </div>