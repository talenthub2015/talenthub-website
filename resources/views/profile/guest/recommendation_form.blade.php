@extends('app')

@section('content')

    <div class="talent_profile">
        <div class="profile_content_container">
            <div class="container">
                <h1>Athlete Recommendation for <strong>{{\Illuminate\Support\Facades\Request::get("user_name")}}</strong></h1>

                @if($recommendationData->status == \talenthub\Repositories\SiteConstants::RECOMMENDATION_STATUS_COMPLETE)
                    <p>You have already provided the recommendation to the talent. Thanks.</p>
                @endif

                @if($recommendationData->status == \talenthub\Repositories\SiteConstants::RECOMMENDATION_STATUS_WAITING)
                    <p></p>
                    <p></p>
                    {!! Form::model($recommendationData,['method'=>'put','url'=>'external/user/post-recommendation']) !!}
                    {!! Form::hidden('recommendation_id',$recommendationData->recommendation_id) !!}
                    {!! Form::hidden('user_id',$recommendationData->user_id) !!}
                    @include("errors.error_raw_list")
                    <div class="row form_container">

                        <div class="col-xs-12 col-lg-12">
                            <div class="row">
                                <div class="col-xs-12 col-lg-3">
                                    <div class="form-group">
                                        {!! Form::label('name','Name:') !!}
                                        {!! Form::text('name',$recommendationData->name,['class'=>'form-control','data-validate'=>'require',
                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Provide a name']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-3">
                                    <div class="form-group">
                                        {!! Form::label('email','Email:') !!}
                                        {!! Form::text('email',$recommendationData->email,['class'=>'form-control','data-validate'=>'require|email',
                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter a valid email']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-3">
                                    <div class="form-group">
                                        {!! Form::label('organisation','Your Organisation:') !!}
                                        {!! Form::text('organisation',null,['class'=>'form-control','data-validate'=>'require',
                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter your organisation']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-3">
                                    <div class="form-group">
                                        {!! Form::label('position','Position:') !!}
                                        {!! Form::text('position',null,['class'=>'form-control','data-validate'=>'require',
                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter your position']) !!}
                                    </div>
                                </div>

                            </div>
                        </div>

                        <p></p>

                        <div class="col-xs-12 col-lg-12">
                            <h2>Athletic Ability</h2>
                            <table class="table">
                                <tr>
                                    <th colspan="2" align="center">Excellent</th>
                                    <th colspan="6" align="center">Average</th>
                                    <th colspan="2" align="center">Poor</th>
                                </tr>
                                <tr>
                                    <td>10<br>{!! Form::radio('athletic_ability','10',false) !!}</td>
                                    <td>9<br>{!! Form::radio('athletic_ability','9',false) !!}</td>
                                    <td>8<br>{!! Form::radio('athletic_ability','8',false) !!}</td>
                                    <td>7<br>{!! Form::radio('athletic_ability','7',false) !!}</td>
                                    <td>6<br>{!! Form::radio('athletic_ability','6',false) !!}</td>
                                    <td>5<br>{!! Form::radio('athletic_ability','5',false) !!}</td>
                                    <td>4<br>{!! Form::radio('athletic_ability','4',false) !!}</td>
                                    <td>3<br>{!! Form::radio('athletic_ability','3',false) !!}</td>
                                    <td>2<br>{!! Form::radio('athletic_ability','2',false) !!}</td>
                                    <td>1<br>{!! Form::radio('athletic_ability','1',false) !!}</td>
                                </tr>
                            </table>

                            <hr>
                            <h2>Leadership</h2>
                            <table class="table">
                                <tr>
                                    <th colspan="2" align="center">Excellent</th>
                                    <th colspan="6" align="center">Average</th>
                                    <th colspan="2" align="center">Poor</th>
                                </tr>
                                <tr>
                                    <td>10<br>{!! Form::radio('leadership','10',false) !!}</td>
                                    <td>9<br>{!! Form::radio('leadership','9',false) !!}</td>
                                    <td>8<br>{!! Form::radio('leadership','8',false) !!}</td>
                                    <td>7<br>{!! Form::radio('leadership','7',false) !!}</td>
                                    <td>6<br>{!! Form::radio('leadership','6',false) !!}</td>
                                    <td>5<br>{!! Form::radio('leadership','5',false) !!}</td>
                                    <td>4<br>{!! Form::radio('leadership','4',false) !!}</td>
                                    <td>3<br>{!! Form::radio('leadership','3',false) !!}</td>
                                    <td>2<br>{!! Form::radio('leadership','2',false) !!}</td>
                                    <td>1<br>{!! Form::radio('leadership','1',false) !!}</td>
                                </tr>
                            </table>

                            <hr>
                            <h2>Team Player</h2>
                            <table class="table">
                                <tr>
                                    <th colspan="2" align="center">Excellent</th>
                                    <th colspan="6" align="center">Average</th>
                                    <th colspan="2" align="center">Poor</th>
                                </tr>
                                <tr>
                                    <td>10<br>{!! Form::radio('team_player','10',false) !!}</td>
                                    <td>9<br>{!! Form::radio('team_player','9',false) !!}</td>
                                    <td>8<br>{!! Form::radio('team_player','8',false) !!}</td>
                                    <td>7<br>{!! Form::radio('team_player','7',false) !!}</td>
                                    <td>6<br>{!! Form::radio('team_player','6',false) !!}</td>
                                    <td>5<br>{!! Form::radio('team_player','5',false) !!}</td>
                                    <td>4<br>{!! Form::radio('team_player','4',false) !!}</td>
                                    <td>3<br>{!! Form::radio('team_player','3',false) !!}</td>
                                    <td>2<br>{!! Form::radio('team_player','2',false) !!}</td>
                                    <td>1<br>{!! Form::radio('team_player','1',false) !!}</td>
                                </tr>
                            </table>

                            <hr>
                            <h2>Easy to Work With</h2>
                            <table class="table">
                                <tr>
                                    <th colspan="2" align="center">Excellent</th>
                                    <th colspan="6" align="center">Average</th>
                                    <th colspan="2" align="center">Poor</th>
                                </tr>
                                <tr>
                                    <td>10<br>{!! Form::radio('easy_to_work','10',false) !!}</td>
                                    <td>9<br>{!! Form::radio('easy_to_work','9',false) !!}</td>
                                    <td>8<br>{!! Form::radio('easy_to_work','8',false) !!}</td>
                                    <td>7<br>{!! Form::radio('easy_to_work','7',false) !!}</td>
                                    <td>6<br>{!! Form::radio('easy_to_work','6',false) !!}</td>
                                    <td>5<br>{!! Form::radio('easy_to_work','5',false) !!}</td>
                                    <td>4<br>{!! Form::radio('easy_to_work','4',false) !!}</td>
                                    <td>3<br>{!! Form::radio('easy_to_work','3',false) !!}</td>
                                    <td>2<br>{!! Form::radio('easy_to_work','2',false) !!}</td>
                                    <td>1<br>{!! Form::radio('easy_to_work','1',false) !!}</td>
                                </tr>
                            </table>

                            <hr>

                            {!! Form::label('comment_athletic_ability','Comment on the player\'s athletic ability:') !!}
                            {!! Form::textarea('comment_athletic_ability',null,['class'=>'form-control','data-validate'=>'require',
                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Comment on athletic ability']) !!}


                            {!! Form::label('comment_player_personality','Comment on the player\'s personality:') !!}
                            {!! Form::textarea('comment_player_personality',null,['class'=>'form-control','data-validate'=>'require',
                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Comment on player personality']) !!}
                        </div>
                    </div>

                    <br>
                    <div class="row form_container">
                        <div class="col-xs-12 col-lg-4">
                            {!! Form::submit('Submit Recommendation',['class'=>'form-control btn t-button']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}
                @endif

            </div>
        </div>
    </div>

@stop