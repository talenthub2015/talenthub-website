@extends('app')

@section('content')

<div class="talent_profile">
    <div class="profile_content_container">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10">
                    <h1 class="headings">Request Recommendation</h1>
                    <p></p>
                    <p></p>

                    @if(Session::get('recommendation_request_status')=="success")
                        <div class="alert alert-success">
                            Your request successfully sent.
                        </div>
                    @endif
                    <div class="row form_container">
                        <div class="col-xs-12 col-lg-6">
                            @include('errors.error_raw_list')
                            {!! Form::open(['method'=>'post','url'=>'request-recommendation']) !!}

                            <div class="form-group">
                                {!! Form::label('name','Name:') !!}
                                {!! Form::text('name',null,['class'=>'form-control','data-validate'=>'require','data-toggle'=>'tooltip',
                                'data-placement'=>'bottom','title'=>'Provide a name']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('email','Email:') !!}
                                {!! Form::text('email',null,['class'=>'form-control','data-validate'=>'require|email','data-toggle'=>'tooltip',
                                'data-placement'=>'bottom','title'=>'Provide a valid email address']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('recommender_type','Recommendation from:') !!}
                                {!! Form::select('recommender_type',$recommender_type,null,['class'=>'form-control','data-validate'=>'require|select','data-invalid-value'=>'0','data-toggle'=>'tooltip',
                                'data-placement'=>'bottom','title'=>'Please select correct option']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::submit('Send Recommendation Request',['class'=>'form-control t-button']) !!}
                            </div>

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop