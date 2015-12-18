@extends('app')

@section('content')

    <div class="talent_profile">

        @include('profile.template.userIntroBanner',compact('userProfile'))

        <?php
        $active_menu=1; //For Profile Link
        ?>
        @include('templates.menu.user_profile_menu',compact('userProfile','active_menu'))


        <div class="profile_content_container">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-12">
                        <h1 class="headings">Favourites</h1>
                        <div class="row evangelists_container">
                            @foreach($favourites as $favourited)
                                <div class="col-xs-6 col-lg-3 endorser_container">
                                    <a href="{{url('profile/'.$favourited->user_id)}}">
                                        <img src="{{ $favourited->profile_image_path }}" class="img-thumbnail">
                                        <div class="endorser_name">{{ $favourited->first_name." ".$favourited->last_name }} </div>
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