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

            {!! Form::open(['method'=>'put','url'=>'']) !!}
            <div class="row short_form_container">
                <div class="col-xs-3 col-lg-2">
                    <p><span class="side_label">Email</span></p>
                </div>

                <div class="col-xs-3 col-lg-4">
                    <div class="form-group">
                        {!! Form::text('email',null,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="col-xs-6 col-lg-3 col-lg-offset-3 text-right">
                    {!! Form::submit('Save',['class'=>'btn t-button']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            <hr>


            {!! Form::open(['method'=>'put','url'=>'']) !!}
            <div>
                <div class="row short_form_container">
                    <div class="col-xs-3 col-lg-2">
                        <p><span class="side_label">New Password</span></p>
                    </div>

                    <div class="col-xs-3 col-lg-4">
                        <div class="form-group">
                            {!! Form::text('email',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row short_form_container">
                    <div class="col-xs-3 col-lg-2">
                        <p><span class="side_label">Confirm Password</span></p>
                    </div>

                    <div class="col-xs-3 col-lg-4">
                        <div class="form-group">
                            {!! Form::text('email',null,['class'=>'form-control']) !!}
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