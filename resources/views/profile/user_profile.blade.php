@extends('app')

@section('content')
<script src="<%asset('js/talent-profile.js')%>"></script>

<script>angular.module("talentProfile").constant("CSRF_TOKEN", '{!! csrf_token() !!}');</script>

<?php
    $visitingUserId = \Illuminate\Support\Facades\Session::get(\talenthub\Repositories\SiteSessions::USER_ID);
?>

<div class="talent_profile" ng-app="talentProfile">

    <div class="container">
        <div class="cover_pic">
            <img src="<% $userProfile->profile_cover_image_path != "" ? $userProfile->profile_cover_image_path : asset('site_images/talenthub.jpg')%>">
        </div>

        <div class="row user_profile_details" ng-controller="ProfilePresented">
            <div class="col-xs-6 col-lg-3">
                @include("errors.error_raw_list")
                <div class="profile_image_container">
                    <img src="<% $userProfile->profile_image_path %>">
                    @if($profileEditable)
                        <div class="change_profile_image">
                            <a href data-toggle="modal" data-target="#uploadProfileImageModal">Change Photo</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-xs-6 col-lg-4 user_personal_data_container">
                <p class="user_name"><span ng-init="first_name = '<% $userProfile->first_name %>'">{{first_name}}</span> <span ng-init="last_name = '<% $userProfile->last_name %>'">{{last_name}}</span>
                    @if($profileEditable)
                        <a href class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#updateProfileData"></a>
                    @endif
                </p>
                <p class="user_sport"><span><% $userProfile->sport_type %></span> | <span><% $userProfile->dob %></span>
                <p class="user_position"><span><% $userProfile->preferred_position %></span></p>
                <p class="user_management_level"><span><% $userProfile->management_level %></span></p>
                <p class="user_country"><span ng-init="country = '<% $userProfile->country %>'">{{country}}</span>
                    @if($profileEditable)
                        <a href class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#updateProfileData"></a>
                    @endif
                </p>
            </div>

            <div class="col-xs-12 col-lg-5 about_container">
                <p class="about"><span ng-init="about = '<% $userProfile->about ? $userProfile->about : "Tell something about yourself" %>'">{{about}}</span>
                    @if($profileEditable)
                        <a href class="edit glyphicon glyphicon-pencil" data-toggle="modal" data-target="#updateProfileData"></a>
                    @endif
                </p>


                @if($profileEditable && $visitingUserId == $userProfile->user_id)
                    <p class="request_recommendations_container"><a href="<% url('request-recommendation') %>" class="t-button">Request Recommendations</a></p>
                @endif
                @if($visitingUserId != $userProfile->user_id)
                    <p class="visiting_user_operations" ng-controller="VisitingUserOperationController"
                            ng-init="user_id = <% $userProfile->user_id %>">
                        <span class="operation_button" ng-init="favourited = <% $visitingUserFavourited %>">
                            <a href class="t-button" ng-click="favouriteUserEvent()">
                                <span ng-show="favourite_request_in_progress != 1" class="glyphicon" ng-class="{'glyphicon-star-empty' : favourited == 0, 'glyphicon-star' : favourited == 1}"></span>
                                <span ng-show="favourite_request_in_progress == 1"><img src="<% asset('site_images/loading.gif')%>" class="loading"></span>
                                {{favourited == 1 ? favourite_status = "Favourite" : favourite_status = "Favourite" }}
                            </a>
                        </span>

                        <span class="operation_button" ng-init="endorsed = <% $visitingUserEndorsed %>">
                            <a href class="t-button" ng-click="endorseUserEvent()" ng-show="endorsed == 0">
                                <span class="glyphicon" ng-class="{'glyphicon-plus' : endorsed == 0}"></span>
                                <span ng-show="endorse_request_in_progress == 1"><img src="<% asset('site_images/loading.gif')%>" class="loading"></span>
                                {{endorsed == 1 ? endorse_status = "Already Endorsed" : endorse_status = "Endorse"}}
                            </a>
                        </span>

                        <span class="operation_button"><a href class="t-button" data-toggle="modal" data-target="#send_message_container"><span class="glyphicon glyphicon-envelope"></span> Send a message</a></span>
                    </p>
                @endif
            </div>
        </div>

        @if($profileEditable)
            <div class="change_cover_pic_container">
                <span class="glyphicon glyphicon-camera" title="Change Cover Image" data-toggle="modal" data-target="#updateCoverImage"></span>
            </div>
        @endif
    </div>

    <?php
        $active_menu=1; //For Profile Link
    ?>
    @include('templates.menu.user_profile_menu',compact('userProfile','active_menu'))


    <div class="profile_content_container" ng-controller="ProfileDataController">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10">
                    <h1 class="headings">Summary</h1>
                    <p ng-init="summary = '<% $userProfile->summary !="" ? $userProfile->summary : "Please Provide summary about your profile." %>'">{{summary}}
                        @if($profileEditable)
                            <a href class="edit glyphicon glyphicon-pencil" data-toggle="modal" data-target="#updateProfileSummary" title="Edit Summary"></a>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10">
                    <h1 class="headings">History</h1>
                    <ul class="user_histroy">
                        @foreach($userCareerHistory as $careerInformation)
                            <%$careerInformation->getMutatedData = false%>
                            @if($careerInformation->career_type == \talenthub\Repositories\SiteConstants::CAREER_TYPE_CLUB)
                                <li>
                                    <h2 class="title"><% ucfirst($careerInformation->club_school_name) %>, <span class="country"><% ucfirst($careerInformation->club_school_country) %></span></h2>
                                    <p><span class="position"><% ucfirst($careerInformation->club_school_most_played_position) %></span></p>
                                    <p><span class="league"><% ucfirst($careerInformation->club_league_name) %></span> <span class="league_level"><% ucfirst($careerInformation->club_league_level) %></span>
                                        <span class="league_status"><% ucfirst($careerInformation->club_average_league_status) %></span></p>
                                    <p class="additional_information"><% ucfirst($careerInformation->additional_information) %></p>
                                </li>
                            @endif

                            @if($careerInformation->career_type == \talenthub\Repositories\SiteConstants::CAREER_TYPE_SCHOOL)
                                <li>
                                    <h2 class="title"><% ucfirst($careerInformation->club_school_name) %> - <% ucfirst($careerInformation->school_type) %>, <span class="country"><% ucfirst($careerInformation->club_school_country) %></span></h2>
                                    <p><span class="position"><% ucfirst($careerInformation->club_school_most_played_position) %></span></p>
                                    <p><span class="league">School Team Reputation : <% ucfirst($careerInformation->school_team_reputation) %></span><Br>School Team Level: <span class="league_level"><% ucfirst($careerInformation->school_team_side_level) %></span>
                                        <span class="league_status"><% ucfirst($careerInformation->club_average_league_status) %></span></p>
                                    <p class="additional_information"><% ucfirst($careerInformation->additional_information) %></p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-10">
                    <h1 class="headings">Awards</h1>
                    <p ng-init="awards = '<% $awards->award_details !="" ? preg_replace("/\r?\n/","<br>",$awards->award_details) : "Please enter some of your awards." %>'"><span ng-bind-html='awards'></span>
                        @if($profileEditable)
                            <a href class="edit glyphicon glyphicon-pencil" data-toggle="modal" data-target="#updateAwards" title="Add/Edit Awards"></a>
                        @endif
                    </p>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-12">
                    <h1 class="headings">Evangelists</h1>
                    <div class="evangelists_container">
                        @foreach($endorsements as $endorser)
                            <div class="endorser_container">
                                <a href="<% url('profile/'.$endorser->user_id) %>">
                                    <img src="<% $endorser->profile_image_path %>" class="img-thumbnail">
                                    <div class="endorser_name"><% $endorser->first_name." ".$endorser->last_name %> </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <a href="<% url('profile/'.$userProfile->user_id.'/evangelists')%>" class="t-button">View All Evangelists</a>
                </div>
            </div>
        </div>



    </div>

    @if($profileEditable)
        <!-- All Modals Container -->
        <div ng-controller="UserProfileUpdate">


                <div class="modal fade" id="uploadProfileImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {!! Form::open(['method'=>'put','url'=>'profile/uploadProfileImage','files'=>'true']) !!}
                            {!! Form::hidden("image_type","profile_image") !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Upload Profile Image</h4>
                            </div>
                            <div class="modal-body" ng-show="sending_Data_to_server == false">
                                <div class="form_container">
                                    <div class="form-group">
                                        {!! Form::label('profile_image',"Select Image") !!}
                                        {!! Form::input('file','profile_image',null,['class'=>'form-control','data-validate'=>'require|image',
                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select some image file to upload']) !!}
                                    </div>
                                    <!--div class="form-group">
                                        {!! Form::submit('Upload Image',['class'=>'form-control t-button']) !!}
                                    </div-->
                                </div>
                            </div>
                            <div class="show_loading_image" ng-show="sending_Data_to_server == true">
                                <p class="alert-info">Please Wait!!</p>
                                <img src="<%asset('site_images/loading.gif')%>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" ng-click="showLoading()">Upload Image</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

                <!-- Modal for Updating Cover Image -->
                <div class="modal fade" id="updateCoverImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {!! Form::open(['method'=>'put','url'=>'profile/uploadProfileImage','files'=>'true']) !!}
                            {!! Form::hidden("image_type","cover_image") !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Upload Profile Image</h4>
                            </div>
                            <div class="modal-body" ng-show="sending_Data_to_server == false">
                                <div class="form_container">
                                    <div class="form-group">
                                        {!! Form::label('cover_image',"Select Image") !!}
                                        {!! Form::input('file','cover_image',null,['class'=>'form-control','data-validate'=>'require|image',
                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select some image file to upload']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="show_loading_image" ng-show="sending_Data_to_server == true">
                                <p class="alert-info">Please Wait!!</p>
                                <img src="<%asset('site_images/loading.gif')%>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" ng-click="showLoading()">Upload Cover Image</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>


                <!-- Modal for Updating Profile Data -->
                <div class="modal fade" id="updateProfileData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Update Profile Data</h4>
                            </div>
                            <div class="modal-body" ng-show="sending_Data_to_server == false">
                                <div class="alert-success" ng-show="data_saved == true">
                                    <p>Your changes successfully updated.</p>
                                </div>
                                {!! Form::open(['method'=>'put','name'=>'profile_data']) !!}
                                {!! Form::hidden('user_id',$userProfile->user_id,['ng-model'=>'user_id'])!!}
                                {!! Form::hidden('csrf_token',csrf_token(),['ng-model'=>'_token','id'=>'_token']) !!}
                                <div class="form_container">
                                    <div class="row">
                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('first_name',"First Name:") !!}
                                                {!! Form::text('first_name',$userProfile->first_name,['class'=>'form-control','data-validate'=>'require',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Value is required',
                                                'ng-model'=>'first_name','ng-init'=>'first_name = "'.$userProfile->first_name.'"']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('last_name',"Last Name:") !!}
                                                {!! Form::text('last_name',$userProfile->last_name,['class'=>'form-control',
                                                'ng-model'=>'last_name','ng-init'=>'last_name = "'.$userProfile->last_name.'"']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                <?php
                                                $countryCode = array_search($userProfile->country,\talenthub\Repositories\BasicSiteRepository::getListOfCountries());
                                                ?>
                                                {!! Form::label('country',"Country:") !!}
                                                {!! Form::select('country',$country,$countryCode,['class'=>'form-control','data-validate'=>'select',
                                                'data-invalidValue'=>'0','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                'title'=>'Select proper option from the list provided.','ng-model'=>'country',
                                                'ng-init'=>'country = "'.$countryCode.'"']) !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-lg-12">
                                            <div class="form-group">
                                                {!! Form::label('about',"About:") !!}
                                                {!! Form::textarea('about',null,['class'=>'form-control','ng-model'=>'about',
                                                'ng-init'=>'about = "'.$userProfile->about.'"']) !!}
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                {!! Form::close()!!}
                            </div>
                            <div class="show_loading_image" ng-show="sending_Data_to_server == true">
                                <p class="alert-info">Please Wait!!</p>
                                <img src="<%asset('site_images/loading.gif')%>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" ng-click='updateProfileData()'>Update Profile</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for Updating Summary of the Profile -->
                <div class="modal fade" id="updateProfileSummary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {!! Form::open(['method'=>'put','url'=>'profile/profileSummary','files'=>'true']) !!}
                            {!! Form::hidden('user_id',$userProfile->user_id,['ng-model'=>'user_id'])!!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Update your Profile Summary</h4>
                            </div>
                            <div class="modal-body" ng-show="sending_Data_to_server == false">
                                <div class="alert-success" ng-show="data_saved == true">
                                    <p>Your changes successfully updated.</p>
                                </div>
                                <div class="form_container">
                                    <div class="form-group">
                                        {!! Form::label('summary',"Profile Summary:") !!}
                                        {!! Form::textarea('summary',null,['class'=>'form-control','data-validate'=>'require',
                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Please provide some summary',
                                        'ng-model'=>'summary','ng-init'=>'summary ="'.$userProfile->summary.'"']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="show_loading_image" ng-show="sending_Data_to_server == true">
                                <p class="alert-info">Please Wait!!</p>
                                <img src="<%asset('site_images/loading.gif')%>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" ng-click="updateProfileSummary()">Update Summary</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>



                <!-- Modal for Adding or Editing Awards of the Profile -->
                <div class="modal fade" id="updateAwards" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {!! Form::open(['method'=>'put','url'=>'profile/profileAwards','files'=>'true']) !!}
                            {!! Form::hidden('user_id',$userProfile->user_id,['ng-model'=>'user_id'])!!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Add/Edit Awards</h4>
                            </div>
                            <div class="modal-body" ng-show="sending_Data_to_server == false">
                                <div class="alert-success" ng-show="data_saved == true">
                                    <p>Your changes successfully updated.</p>
                                </div>
                                <div class="form_container">
                                    <div class="form-group">
                                        {!! Form::label('awards',"Awards:") !!}
                                        {!! Form::textarea('awards',null,['class'=>'form-control','data-validate'=>'require',
                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Please provide some summary',
                                        'ng-model'=>'awards','ng-init'=>'awards ="'.$awards->award_details.'"']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="show_loading_image" ng-show="sending_Data_to_server == true">
                                <p class="alert-info">Please Wait!!</p>
                                <img src="<%asset('site_images/loading.gif')%>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" ng-click="updateAwards()">Update Awards</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

        </div>
        <!-- Modal -->
    @endif

    @if($visitingUserId != $userProfile->user_id)
        <!-- Moodals for Users visiting this user profile -->
        <div ng-controller="VisitingUserModalOperationsController">

            <!-- Modal for Sending a message to the user-->
            <div class="modal fade" id="send_message_container" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Send a Message</h4>
                        </div>
                        {!! Form::open([]) !!}

                        <span>
                            <label ng-init="user_id=<%$visitingUserId%>"></label>
                            <label ng-init="to_user_id=<%$userProfile->user_id%>"></label>
                        </span>
                        <div class="modal-body" ng-show="sending_Data_to_server == false">
                            <div class="alert-success" ng-show="message_sent == true">
                                <p>Your message sent successfully.</p>
                            </div>
                            <div class="form_container">
                                <div class="form-group">
                                    <h4>To: <% $userProfile->first_name  %></h4>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('subject','Subject:') !!}
                                    {!! Form::text('subject',null,['class'=>'form-control','data-validate'=>'require',
                                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Please provide a subject',
                                    'ng-model'=>'subject']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('message',"Message:") !!}
                                    {!! Form::textarea('message',null,['class'=>'form-control','data-validate'=>'require',
                                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Please enter some message',
                                    'ng-model'=>'message']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="show_loading_image" ng-show="sending_Data_to_server == true">
                            <p class="alert-info">Please Wait!!</p>
                            <img src="<%asset('site_images/loading.gif')%>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" ng-click="sendMessage()">Send Message</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>
        @endif

</div>


@stop