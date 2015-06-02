@extends('app')

@section('content')


    <div class="talent_profile">

        <?php

        $profileEditable = false;

        ?>
        @include('profile.template.userIntroBanner',compact('userProfile','profileEditable'))

        <?php
        $active_menu=3; //For Videos
        ?>
        @include('templates.menu.user_profile_menu',compact('userProfile','active_menu'))


        <div class="profile_content_container">
            <div class="container curriculum_vitae_container">
                <h1 class="headings">Videos</h1>

                <div class="row">
                    <div class="col-xs-4 col-lg-3">
                        <div class="video_container">
                            <iframe width="560" height="315" src="https://youtu.be/EzC_sHTW43c" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@stop