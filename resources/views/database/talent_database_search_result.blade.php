@extends('app')

@section('content')

    <script src="{{asset('js/database_ajax_request.js')}}"></script>

    <?php
            $user_management_level = Session::get(\talenthub\Repositories\SiteSessions::USER_MANAGEMENT_LEVEL);
            ?>

    <div class="database_content_container">

        <div class="container">
            <h2>Scholarship Opportunities</h2>

            {!! Form::open(['method'=>'post','url'=>'database/searchOpportunities']) !!}

            <div class="row form_container">
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

            </div>
            {!! Form::submit('Search',['class'=>'btn btn-primary t-button']) !!}
            {!! Form::close() !!}
        </div>


        <div class="container">
            <h3>Search Result:</h3>
            <table class="table">
                <tr>
                    <th>Institute Name</th>
                    <th>Sport</th>
                    <th>Title</th>
                    <th>{{$user_management_level == \talenthub\Repositories\SiteConstants::USER_TALENT_MANAGEMENT_LEVEL_STUDENT ? "Coach Name" : "Manage Name"}}</th>
                    <th></th>
                </tr>
                @foreach($managers as $key=>$manager)
                    <?php
                        $already_contacted_status = 0;
                        if(in_array($manager->id,$managers_already_contacted) && \Carbon\Carbon::create($manager->contacted_on))
                            {
                                $already_contacted_status=1;
                            }
                            ?>
                    <tr>
                        <td>{{$manager->institution_name}}</td>
                        <td>{{$manager->sport_gender . " - " . $manager->sport_type}}</td>
                        <td>{{$manager->designation}}</td>
                        <td>{{$manager->coach_name}}</td>
                        <td width="200px"><a href class="btn {{$already_contacted_status == 0 ? "btn-primary" : "btn-success"}} contact_manager_link" data-target="#contactManagerModal"
                               data-manager-id="{{$manager->id}}" data-talent-id="{{$userProfile->user_id}}"
                               data-manager-contacted-status="{{$already_contacted_status}}">{{$already_contacted_status == 0 ? "Contact" : "Contacted"}}</a></td>
                    </tr>
                @endforeach

            </table>

            <br>
            {!! $managers->render() !!}
        </div>




        <!-- Modal -->
        <div class="modal fade" id="contactManagerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Contact Coach</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success hide">
                            <p>Mail sent to the manager/coach.</p>
                        </div>
                        <p class="confirm_message">Are you sure to contact the coach?</p>
                        <p class="alert alert-danger hide"></p>
                    </div>
                    <div class="show_loading_image hide">
                        <p class="alert-info">Please Wait!!</p>
                        <img src="{{ asset('site_images/loading.gif') }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-primary" id="contact_manager">Yes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop