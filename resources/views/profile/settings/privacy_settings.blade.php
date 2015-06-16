@extends('app')

@section('content')

    <?php
    $profileChecked = "";
    $videoChecked = "";
    $imageChecked = "";

            foreach($userSettings as $key=>$setting)
            {
                if(in_array(\talenthub\UserSettings::PRIVACY_TYPE_PROFILE,$setting) && $setting["setting_value"] == \talenthub\UserSettings::PRIVACY_SET)
                {
                    $profileChecked="checked";
                }
                if(in_array(\talenthub\UserSettings::PRIVACY_TYPE_VIDEOS,$setting) && $setting["setting_value"] == \talenthub\UserSettings::PRIVACY_SET)
                {
                    $videoChecked="checked";
                }
                if(in_array(\talenthub\UserSettings::PRIVACY_TYPE_IMAGES,$setting) && $setting["setting_value"] == \talenthub\UserSettings::PRIVACY_SET)
                {
                    $imageChecked="checked";
                }

            }
    ?>

    <div class="settings_container">
        <div class="container">
            <h1>Privacy Settings</h1>
            <div class="row">
                <div class="col-xs-12 col-lg-12">
                    <p>Talenthub privacy settings are very straight forward, our core business of facilitating your connection with a manager of talent, and our purpose of exposing you to the greatest sporting opportunities available are not dependent on your most personal information, therefore we do not have many problems from our users with privacy settings.</p>
                </div>
            </div>
            @if(Session::has("privacy_update_status"))
                <div class="alert alert-success">
                    Your setting updated successfully
                </div>
            @endif
            {!! Form::open(['method'=>'put','url'=>'settings/privacy']) !!}
            <div class="row form_container">
                <div class="col-xs-12 col-lg-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="privacy_settings[]" value="{{\talenthub\UserSettings::PRIVACY_TYPE_PROFILE}}" {{$profileChecked}}>
                            Only Talenthub registered users can view my <strong>Profile</strong>.
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="privacy_settings[]" value="{{\talenthub\UserSettings::PRIVACY_TYPE_VIDEOS}}" {{$videoChecked}}>
                            Only Talenthub registered users can view my <strong>Videos</strong>.
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="privacy_settings[]" value="{{\talenthub\UserSettings::PRIVACY_TYPE_IMAGES}}" {{$imageChecked}}>
                            Only Talenthub registered users can view my <strong>Images</strong>.
                        </label>
                    </div>
                </div>
            </div>

            <div class="text-center form_container">
                {!! Form::submit("Save Settings",['class'=>'btn t-button']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop