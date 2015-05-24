@extends('app')

@section('content')
<script src="<%asset('js/talent-profile.js')%>"></script>


<div class="talent_profile" ng-app="talentProfile">

    <div class="container">
        <div class="cover_pic">
        </div>

        <div class="row user_profile_details" ng-controller="ProfilePresented as profile">
            <div class="col-xs-6 col-lg-3">
                @include("errors.error_raw_list")
                <div class="profile_image_container">
                    <img src="<% $userProfile->profile_image_path %>">
                    <div class="change_profile_image">
                        <a href data-toggle="modal" data-target="#uploadProfileImageModal">Change Photo</a>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-lg-4 user_personal_data_container">
                <p class="user_name"><span ng-model="first_name"><% $userProfile->first_name %></span> <span ng-model="last_name"><% $userProfile->last_name  %></span>
                    <a href class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#updateProfileData"></a></p>
                <p class="user_sport"><span><% $userProfile->sport_type %></span> | <span><% $userProfile->dob %></span>
                    <a href class="glyphicon glyphicon-pencil" data-toggle="modal" data-target="#updateProfileData"></a></p>
                <p class="user_position"><span><% $userProfile->preferred_position %></span></p>
                <p class="user_management_level"><span><% $userProfile->management_level %></span></p>
                <p class="user_country"><span><% $userProfile->country %></span> <a href class="glyphicon glyphicon-pencil"
                                                                                    data-toggle="modal" data-target="#updateProfileData"></a></p>
            </div>

            <div class="col-xs-12 col-lg-5 about_container">
                <p class="about"><% $userProfile->country %><a href class="glyphicon glyphicon-pencil" data-toggle="modal"
                                                               data-target="#updateProfileData"></a></p>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="uploadProfileImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Upload Profile Image</h4>
                </div>
                <div class="modal-body">
                    <div class="form_container">
                        {!! Form::open(['method'=>'put','url'=>'profile/uploadProfileImage','files'=>'true']) !!}
                            <div class="form-group">
                                {!! Form::label('profile_image',"Select Image") !!}
                                {!! Form::input('file','profile_image',null,['class'=>'form-control','data-validate'=>'require|image',
                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select some image file to upload']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Upload Image',['class'=>'form-control t-button']) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="updateProfileData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
            ng-controller="UserProfileUpdate">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Update Profile Data</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['method'=>'put','name'=>'profile_data']) !!}
                    <div class="form_container">
                        <div class="row">
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('first_name',"First Name:") !!}
                                    {!! Form::text('first_name',$userProfile->first_name,['class'=>'form-control','data-validate'=>'require',
                                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Value is required']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('last_name',"Last Name:") !!}
                                    {!! Form::text('last_name',$userProfile->last_name,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('dob',"Date of Birth:") !!}
                                    {!! Form::input('text','dob',$userProfile->dob,['class'=>'form-control datepicker','data-validate'=>'date',
                                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Date should be in "DD-MM-YYYY" format']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <?php
                                        $countryCode = array_search($userProfile->country,\talenthub\Repositories\BasicSiteRepository::getListOfCountries());
                                    ?>
                                    {!! Form::label('country',"Country:") !!}
                                    {!! Form::select('country',$country,$countryCode,['class'=>'form-control','data-validate'=>'select',
                                    'data-invalidValue'=>'0','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                    'title'=>'Select proper option from the list provided.']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('preferred_position','Preferred Position:') !!}
                                    {!! Form::select('preferred_position',$sportPositions,$userProfile->preferred_position,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    {!! Form::label('about',"About:") !!}
                                    {!! Form::textarea('about',null,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            {!! Form::button('Update Profile',['class'=>'form-control t-button validate_this_form']) !!}
                        </div>


                    </div>
                    {!! Form::close()!!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>


@stop