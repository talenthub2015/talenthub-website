@extends('app')

@section('content')

    <div class="settings_container">
        <div class="container">
            <h1>General Settings</h1>

            @if(Session::has("privacy_update_status"))
                <div class="alert alert-success">
                    Your setting updated successfully
                </div>
            @endif

            <div class="row short_form_container">
                <div class="col-xs-3 col-lg-2">
                    <p><span class="side_label">Account Type</span></p>
                </div>

                <div class="col-xs-3 col-lg-4">
                    <p>Talenthub BASIC</p>
                </div>

                <div class="col-xs-6 col-lg-3 col-lg-offset-3 text-right">
                    <p class="action">Talenthub PRO coming soon</p>
                </div>
            </div>

            <hr>

            {!! Form::open(['method'=>'put','url'=>'settings/general']) !!}
            {!! Form::hidden('setting_type',\talenthub\UserSettings::GENERAL_TYPE_EMAIL) !!}
            <div class="row form_container short_form_container">
                @if(Session::has("setting_type") && Session::get("setting_type") == \talenthub\UserSettings::GENERAL_TYPE_EMAIL)

                    @include('errors.error_raw_list')

                    @if(Session::get("general_update_status") == "successful")
                        <div class="col-xs-12">
                            <div class="alert alert-success">Your email address successfully changed.</div>
                        </div>
                    @endif
                @endif
                <div class="col-xs-3 col-lg-2">
                    <p><span class="side_label">Email</span></p>
                </div>

                <div class="col-xs-3 col-lg-4">
                    <div class="form-group">
                        {!! Form::text('email',$userProfile->username,['class'=>'form-control','data-validate'=>'require|email',
                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter a valid email']) !!}
                    </div>
                </div>

                <div class="col-xs-6 col-lg-3 col-lg-offset-3 text-right">
                    {!! Form::submit('Save',['class'=>'btn t-button']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            <hr>


            {!! Form::open(['method'=>'put','url'=>'settings/general']) !!}
            {!! Form::hidden('setting_type',\talenthub\UserSettings::GENERAL_TYPE_PASSWORD) !!}
            <div>
                @if(Session::has("setting_type") && Session::get("setting_type") == \talenthub\UserSettings::GENERAL_TYPE_PASSWORD)

                    @include('errors.error_raw_list')

                    @if(Session::get("general_update_status") == "successful")
                        <div class="col-xs-12">
                            <div class="alert alert-success">Your password updated successfully.</div>
                        </div>
                    @endif
                @endif
                <div class="row form_container short_form_container">
                    <div class="col-xs-3 col-lg-2">
                        <p><span class="side_label">New Password</span></p>
                    </div>

                    <div class="col-xs-3 col-lg-4">
                        <div class="form-group">
                            {!! Form::input('password','password',null,['class'=>'form-control','data-validate'=>'require',
                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Password is required']) !!}
                        </div>
                    </div>
                </div>
                <div class="row form_container short_form_container">
                    <div class="col-xs-3 col-lg-2">
                        <p><span class="side_label">Confirm Password</span></p>
                    </div>

                    <div class="col-xs-3 col-lg-4">
                        <div class="form-group">
                            {!! Form::input('password','password_confirmation',null,['class'=>'form-control','data-validate'=>'require|confirmPassword',
                            'data-password-field-id'=>'password','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Confirm your password correctly']) !!}
                        </div>
                    </div>

                    <div class="col-xs-6 col-lg-3 col-lg-offset-3 text-right">
                        {!! Form::submit('Change Password',['class'=>'btn t-button']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            <hr>


        </div>
    </div>

@stop