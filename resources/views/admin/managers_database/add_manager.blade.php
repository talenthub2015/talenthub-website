@extends('admin.admin_app')

@section('content')

    <div class="container">
        <h1>Add Managers</h1>
    </div>

    <div class="container">
        {!! Form::open(['method'=>'post','url'=>'addManagers']) !!}

        <div class="duplicate_content_container">
            <div class="duplicate_this_content manager_data">
                    <h4 class="heading">Manager's Data</h4>
                    <div class="row form_container">

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('coach_name[]','Coach Name:') !!}
                            {!! Form::text('coach_name[]',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('manager_type[]','Manager Type:') !!}
                            {!! Form::select('manager_type[]',['0'=>'--'],null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('management_level[]','Management Level:') !!}
                            {!! Form::select('management_level[]',['0'=>'--'],null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('sport_type[]','Sport:') !!}
                            {!! Form::select('sport_type[]',['0'=>'--'],null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('sport_gender[]','Sport Gender:') !!}
                            {!! Form::select('sport_gender[]',['0'=>'--'],null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('designation[]','Designation:') !!}
                            {!! Form::text('designation[]',null,['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="row form_container">

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('email[]','Email:') !!}
                            {!! Form::text('email[]',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('contact_no[]','Contact No:') !!}
                            {!! Form::text('contact_no[]',null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('country[]','Country:') !!}
                            {!! Form::select('country[]',['0'=>'--'],null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('state[]','State:') !!}
                            {!! Form::select('state[]',['0'=>'--'],null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('institution_type[]','Institution Type:') !!}
                            {!! Form::select('institution_type[]',['0'=>'--'],null,['class'=>'form-control']) !!}
                        </div>

                        <div class="col-xs-6 col-lg-2">
                            {!! Form::label('institution_name[]','Institution Name:') !!}
                            {!! Form::text('institution_name[]',null,['class'=>'form-control']) !!}
                        </div>
                    </div>

            </div>

            <div class="place_duplicate_content_here duplicated_manager_data">
            </div>

            <br>
            <div class="text-center">
                <button class="t-button duplicate_content_button" type="button"
                        data-target-duplicate-content=".manager_data"
                        data-place-duplicate-content=".duplicated_manager_data">Add more</button>
            </div>

        </div>

        {!! Form::close() !!}

    </div>

@stop