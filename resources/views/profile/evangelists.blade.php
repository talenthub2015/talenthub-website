@extends('app')

@section('content')

    <div class="talent_profile">

        <div class="container">
            <div class="cover_pic">
                <img src="{{ $userProfile->profile_cover_image_path != "" ? $userProfile->profile_cover_image_path : asset('site_images/talenthub.jpg')}}">
            </div>

            <div class="row user_profile_details" ng-controller="ProfilePresented">
                <div class="col-xs-6 col-lg-3">
                    @include("errors.error_raw_list")
                    <div class="profile_image_container">
                        <img src="{{ $userProfile->profile_image_path }}">
                    </div>
                </div>

                <div class="col-xs-6 col-lg-4 user_personal_data_container">
                    <p class="user_name">{{ $userProfile->first_name }} {{ $userProfile->last_name }}</p>
                    <p class="user_sport"><span>{{ $userProfile->sport_type }}</span> | <span>{{ $userProfile->dob }}</span>
                    <p class="user_position"><span>{{ $userProfile->preferred_position }}</span></p>
                    <p class="user_management_level"><span>{{ $userProfile->management_level }}</span></p>
                    <p class="user_country">{{ $userProfile->country }}</p>
                </div>

                <div class="col-xs-12 col-lg-5 about_container">
                    <p class="about">{{ $userProfile->about ? $userProfile->about : "Tell something about yourself" }}</p>
                </div>
            </div>
        </div>

        <?php
        $active_menu=1; //For Profile Link
        ?>
        @include('templates.menu.user_profile_menu',compact('userProfile','active_menu'))


        <div class="profile_content_container">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-12">
                        <h1 class="headings">Evangelists</h1>
                        <div class="row evangelists_container">
                            @foreach($endorsements as $endorser)
                                <div class="col-xs-6 col-lg-3 endorser_container">
                                    <a href="{{url('profile/'.$endorser->user_id)}}">
                                        <img src="{{ $endorser->profile_image_path }}" class="img-thumbnail">
                                        <div class="endorser_name">{{ $endorser->first_name." ".$endorser->last_name }} </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>


@stop