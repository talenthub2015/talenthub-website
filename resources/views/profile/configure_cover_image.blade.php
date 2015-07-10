@extends('app')

@section('content')

    <div class="container">
        <h3 class="alert alert-info">Adjust your Cover Image</h3>

        <div class="cover_image_setting_container">

            <div class="cover_image_demo">
                <img src="{{$userProfile->profile_cover_image_path}}">
            </div>

        </div>

        <br>
        <p class="alert alert-info text-center">Drag Image to align as you want. Once done, click on 'save'</p>

        {!! Form::open(['method'=>'put','url'=>'profile/uploadImageSetting']) !!}
            {!! Form::hidden('image_type',$image_type) !!}
            {!! Form::input('hidden','top_adjusted',null,['id'=>'top_adjusted']) !!}
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

        });
    </script>


@stop