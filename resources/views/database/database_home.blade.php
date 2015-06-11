@extends('app')

@section('content')

<div class="database_content_container">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-6 strip_heading">
                <a href="">Scholarship Opportunities</a>
            </div>

            <div class="col-xs-12 col-lg-6 strip_heading">
                <a href="">Scholarship Process Help</a>
            </div>
        </div>

        <br>
        <p>Please select the state in which you want to pursue sport scholarship opportunities in. The number of University coaches available to be contacted in each state in indicated.</p>

        <br>

        {!! Form::open() !!}
        <div class="row form_container">
            <div class="col-xs-4 col-lg-3">
                <div class="form-group">
                    {!! Form::label('sport_type','Sport') !!}
                    {!! Form::text('sport_type',$userProfile->sport_type,['class'=>'form-control','disabled']) !!}
                </div>
            </div>
            <div class="col-xs-4 col-lg-3">
                <div class="form-group">
                    {!! Form::label('gender','Gender') !!}
                    {!! Form::text('gender',$userProfile->gender,['class'=>'form-control','disabled']) !!}
                </div>
            </div>
            <div class="col-xs-4 col-lg-3">
                <div class="form-group">
                    {!! Form::label('state','State') !!}
                    {!! Form::select('state',$state,null,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-4 col-lg-3">
               <div class="form-group">
                   {!! Form::label('institution_type','Institution Type') !!}
                   {!! Form::select('institution_type',$institution_type,null,['class'=>'form-control']) !!}
               </div>
            </div>

        </div>
        {!! Form::submit('Search',['class'=>'btn btn-primary t-button']) !!}
        {!! Form::close() !!}
    </div>

</div>

@stop