@extends('app')

@section('content')

<div class="database_content_container">

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-lg-6 strip_heading">
                @if(Session::get(\talenthub\Repositories\SiteSessions::USER_MANAGEMENT_LEVEL) == \talenthub\Repositories\SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_ASPIRING_PRO)
                    <a>Professional Opportunities  </a>
                @endif
                @if(Session::get(\talenthub\Repositories\SiteSessions::USER_MANAGEMENT_LEVEL) == \talenthub\Repositories\SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_STUDENT)
                        <a>Scholarship Opportunities</a>
                @endif

            </div>

            <div class="col-xs-12 col-lg-6 strip_heading">
                @if(Session::get(\talenthub\Repositories\SiteSessions::USER_MANAGEMENT_LEVEL) == \talenthub\Repositories\SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_ASPIRING_PRO)
                    <a href="{{url('pro-process-help')}}">Professional Opportunities  </a>
                @endif
                @if(Session::get(\talenthub\Repositories\SiteSessions::USER_MANAGEMENT_LEVEL) == \talenthub\Repositories\SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_STUDENT)
                        <a href="{{url('scholarship-process')}}">Scholarship Process Help</a>
                @endif

            </div>
        </div>

        <br>
        @if(Session::get(\talenthub\Repositories\SiteSessions::USER_MANAGEMENT_LEVEL) == \talenthub\Repositories\SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_ASPIRING_PRO)
            <p>Please select the country in which you wish to pursue professional sport opportunities in.</p>
        @endif
        @if(Session::get(\talenthub\Repositories\SiteSessions::USER_MANAGEMENT_LEVEL) == \talenthub\Repositories\SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_STUDENT)
            <p>Please select the state in which you want to pursue sport scholarship opportunities in. The number of University coaches available to be contacted in each state in indicated.</p>
        @endif

        <br>

        {!! Form::open(['method'=>'post','url'=>'database/searchOpportunities']) !!}

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

            @if(Session::get(\talenthub\Repositories\SiteSessions::USER_MANAGEMENT_LEVEL) == \talenthub\Repositories\SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_STUDENT)
                <div class="col-xs-4 col-lg-3">
                    <div class="form-group">
                        {!! Form::label('state','US State') !!}
                        {!! Form::select('state',$state,null,['class'=>'form-control','data-validate'=>'require|select',
                        'data-invalid-value'=>'0','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Select a valid option"]) !!}
                    </div>
                </div>

                <div class="col-xs-4 col-lg-3">
                   <div class="form-group">
                       {!! Form::label('institution_type','Institution Type') !!}
                       {!! Form::select('institution_type',$institution_type,null,['class'=>'form-control','data-validate'=>'require|select',
                       'data-invalid-value'=>'0','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Select a valid option"]) !!}
                   </div>
                </div>
            @endif

            @if(Session::get(\talenthub\Repositories\SiteSessions::USER_MANAGEMENT_LEVEL) == \talenthub\Repositories\SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_ASPIRING_PRO)
                <div class="col-xs-4 col-lg-3">
                    <div class="form-group">
                        {!! Form::label('country','Country of Interest') !!}
                        {!! Form::select('country',$country,null,['class'=>'form-control','data-validate'=>'require|select',
                        'data-invalid-value'=>'0','data-toggle'=>"tooltip", 'data-placement'=>"bottom", 'title'=>"Select a valid option"]) !!}
                    </div>
                </div>
            @endif



        </div>
        {!! Form::submit('Search',['class'=>'btn btn-primary t-button']) !!}
        {!! Form::close() !!}
    </div>

</div>

@stop