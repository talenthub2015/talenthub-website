@extends('app')

@section('content')

    <div class="container image_setting_container">
        @if($image_type == "cover_image")
            <h3 class="alert alert-info">Adjust your Cover Image</h3>

            <div class="cover_image_setting_container">

                <div class="cover_image_demo">
                    <img src="{{$userProfile->profile_cover_image_path}}">
                </div>

            </div>
        @endif

        @if($image_type == "profile_image")
            <h3 class="alert alert-info">Adjust your Profile Image</h3>

            <div class="profile_image_setting_container">

                <div class="profile_image_demo">
                    <img src="{{$userProfile->profile_image_path}}">
                </div>

            </div>
        @endif

        <br>
        <p class="alert alert-info text-center">Drag Image to align as you want. Once done, click on 'save'</p>

        {!! Form::open(['method'=>'put','url'=>'profile/uploadImageSetting']) !!}
            {!! Form::hidden('image_type',$image_type) !!}
            {!! Form::input('hidden','top_adjusted',null,['id'=>'top_adjusted']) !!}
            @if($image_type == "profile_image")
                {!! Form::input('hidden','left_adjusted',null,['id'=>'left_adjusted']) !!}
            @endif
            {!! Form::submit('Save Adjustment',['class'=>'btn t-button']) !!}
        {!! Form::close() !!}

    </div>

    <script>
        $(document).ready(function(){
            $( ".cover_image_demo img" ).draggable({
                scroll: false,
                axis: "y",
                cursor: "s-resize",
                drag: function( event, ui ) {

                    y1 = $('.cover_image_demo').height();
                    y2 = $('.cover_image_demo').find('img').height();

                    if (ui.position.top >= 0) {
                        ui.position.top = 0;
                    }
                    else
                    if (ui.position.top <= (y1-y2)) {
                        ui.position.top = y1-y2;

                    }
                },
                stop: function(event, ui) {
                    $('input#top_adjusted').val(ui.position.top);
                }

            });

            $( ".profile_image_demo img" ).draggable({
                scroll: false,
                cursor: "all-scroll",
                drag: function( event, ui ) {

                    y1 = $('.profile_image_demo').height();
                    y2 = $('.profile_image_demo').find('img').height();

                    x1 = $('.profile_image_demo').width();
                    x2 = $('.profile_image_demo').find('img').width();

                    if(y1-y2 >=0)
                    {
                        if (ui.position.top >= (y1-y2)) {
                            ui.position.top = (y1-y2);
                        }
                        else
                        if (ui.position.top <= 0) {
                            ui.position.top = 0;

                        }
                    }
                    else
                    {
                        if (ui.position.top >= 0) {
                            ui.position.top = 0;
                        }
                        else
                        if (ui.position.top <= (y1-y2)) {
                            ui.position.top = (y1-y2);

                        }
                    }

                    if(ui.position.left >= 0)
                    {
                        ui.position.left = 0;
                    }
                    else if(ui.position.left <= (x1-x2))
                    {
                        ui.position.left = x1-x2;
                    }
                },
                stop: function(event, ui) {
                    $('input#left_adjusted').val(ui.position.left);
                    $('input#top_adjusted').val(ui.position.top);
                }

            });

        });
    </script>


@stop