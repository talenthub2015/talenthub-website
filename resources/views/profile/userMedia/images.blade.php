@extends('app')

@section('content')


    <div class="talent_profile">

        <?php
        $visitingUserId = \Illuminate\Support\Facades\Session::get(\talenthub\Repositories\SiteSessions::USER_ID);
        $profileEditable = false;

        ?>
        @include('profile.template.userIntroBanner',compact('userProfile','profileEditable'))

        <?php
        $active_menu=4; //For Images
        ?>
        @include('templates.menu.user_profile_menu',compact('userProfile','active_menu'))


        <div class="profile_content_container">
            <div class="container curriculum_vitae_container">
                <h1 class="headings">Images</h1>
                @if($userProfile->user_id == $visitingUserId)
                    <h4>Upload a new Image</h4>
                    {!! Form::open(['method'=>'post','url'=>'profile/Images','files'=>'true']) !!}
                    <div class="row form_container">
                        <div class="col-xs-6 col-lg-4">
                            <div class="form-group">
                                {!! Form::label('image','Select Image to upload:') !!}
                                {!! Form::input('file','image',null,['class'=>'form-control','data-validate'=>'require',
                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter a valid url']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-4">
                            <div class="form-group">
                                {!! Form::label('title','Video Title:') !!}
                                {!! Form::text('title',null,['class'=>'form-control','data-validate'=>'require',
                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter a title for the video.']) !!}
                            </div>
                        </div>
                        <div class="col-xs-6 col-lg-4">
                            <div class="form-group">
                                {!! Form::label('descriptions','Description:') !!}
                                {!! Form::textarea('descriptions',null,['class'=>'form-control','data-validate'=>'require',
                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter a description for the video.']) !!}
                            </div>
                        </div>
                    </div>
                    <div>{!! Form::submit("Save Image",['class'=>'btn t-button']) !!}</div>
                    {!! Form::close() !!}
                @endif
                <div class="row image_container">
                    <?php $imageCount = 0; ?>
                    @foreach($images as $key=>$image)
                        <?php
                        $imageCount++;
                        ?>
                        <div class="col-xs-4 col-lg-3">
                            <div class="images">
                                <img src="{{url($image->image_url)}}">
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

    </div>

@stop