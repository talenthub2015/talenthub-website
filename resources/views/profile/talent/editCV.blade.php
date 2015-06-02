@extends('app')

@section('content')

    <?php

            $sport_type=Session::get(\talenthub\Repositories\SiteSessions::USER_SPORT_TYPE);

            $userProfileExtraParamsKey = \talenthub\Repositories\SportsRepository::getExtraParamsKeysUserProfile();

    ?>
    <div ng-app="edit-profile">
        <div class="container edit-profile" ng-controller="tabController as tab">

            <div class="row">
                <div class="col-xs-12 col-lg-3">
                    @include("templates.menu.left_menu_edit_profile")
                </div>
                <div class="col-xs-12 col-lg-9">
                    <div class="row">
                        {!! Form::model($talentProfile,['method'=>'PUT','url'=>'profile/CV','novalidate','name'=>'talent_CV']) !!}
                        <div class="col-xs-12 col-lg-12 ">
                            <h1>Curriculum Vitae</h1>
                            @include("errors.error_raw_list")
                            <div ng-show="tab.isTabClicked(1)" class="tab_panel">
                                <div class="row form_container">
                                    <div class="col-xs-12 col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('positions','Positions:') !!}
                                            {!! Form::select('positions[]',$sportPositions,$talentProfile->positions,['class'=>'form-control','multiple']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('preferred_position','Preferred Position:') !!}
                                            {!! Form::select('preferred_position',$sportPositions,$talentProfile->preferred_position,['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    @if($sport_type == \talenthub\Repositories\SportsRepository::BASKETBALL)
                                        <div class="col-xs-12 col-lg-3">
                                            <div class="form-group">
                                                {!! Form::label($userProfileExtraParamsKey["dominant_hand"],'Dominant Hand:') !!}
                                                {!! Form::select($userProfileExtraParamsKey["dominant_hand"],
                                                ['0'=>'--Select Option --','Left Hand'=>'Left Hand','Right Hand'=>'Right Hand','Ambidextrous'=>'Ambidextrous'],
                                                $talentProfile->params["dominant_hand"],['class'=>'form-control','data-validate'=>'numberDecimal',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter a number correctly']) !!}
                                            </div>
                                        </div>
                                    @endif

                                    @if($sport_type == \talenthub\Repositories\SportsRepository::SOCCER)
                                        <div class="col-xs-12 col-lg-3">
                                            <div class="form-group">
                                                {!! Form::label($userProfileExtraParamsKey["dominant_foot"],'Dominant Foot:') !!}
                                                {!! Form::select($userProfileExtraParamsKey["dominant_foot"],
                                                ['0'=>'--Select Option --','Left'=>'Left','Right'=>'Right'],
                                                $talentProfile->params["dominant_foot"],['class'=>'form-control','data-validate'=>'select',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter a number correctly']) !!}
                                            </div>
                                        </div>
                                    @endif

                                    @if($sport_type == \talenthub\Repositories\SportsRepository::RUGBY)

                                        <div class="col-xs-12 col-lg-2">
                                            <div class="form-group">
                                                {!! Form::label($userProfileExtraParamsKey["speed_40"],'Speed(40m):') !!}
                                                {!! Form::text($userProfileExtraParamsKey["speed_40"],$talentProfile->params["speed_40"],['class'=>'form-control',
                                                'data-validate'=>'numberDecimal','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter a number correctly']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-2">
                                            <div class="form-group">
                                                {!! Form::label($userProfileExtraParamsKey["speed_100"],'Speed(100m):') !!}
                                                {!! Form::text($userProfileExtraParamsKey["speed_100"],$talentProfile->params["speed_100"],['class'=>'form-control',
                                                'data-validate'=>'numberDecimal','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter a number correctly']) !!}
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-2">
                                            <div class="form-group">
                                                {!! Form::label($userProfileExtraParamsKey["bench_press"],'Bench Press:') !!}
                                                {!! Form::text($userProfileExtraParamsKey["bench_press"],$talentProfile->params["bench_press"],['class'=>'form-control',
                                                'data-validate'=>'numberDecimal','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter a number correctly']) !!}
                                            </div>
                                        </div>
                                    @endif

                                </div>

                                <?php

                                    if(count($clubCareerInformation)==0)
                                    {
                                        $clubCareerInformation[0]=new talenthub\TalentCareerInformation();
                                    }
                                ?>

                                <div class="duplicate_content_container" id="club_career_information">
                                    <div class="duplicate_this_content full_club_information_for_duplication">
                                        <h1>Club Information</h1>
                                        <div class="row form_container">
                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('club_club_school_name[]','Current Club Name:') !!}
                                                    {!! Form::text('club_club_school_name[]',$clubCareerInformation[0]->club_school_name,
                                                    ['class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('club_club_school_country[]','Country:') !!}
                                                    {!! Form::select('club_club_school_country[]',$country,$clubCareerInformation[0]->club_school_country,
                                                    ['class'=>'form-control','data-validate'=>'select','data-invalid-value'=>'',
                                                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_container">
                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('club_club_league_name[]','League Name:') !!}
                                                    {!! Form::text('club_club_league_name[]',$clubCareerInformation[0]->club_league_name,
                                                    ['class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('club_club_league_level[]','League Level:') !!}
                                                    {!! Form::select('club_club_league_level[]',$clubLeagueLevel,
                                                    $clubCareerInformation[0]->club_league_level,['class'=>'form-control',
                                                    'data-validate'=>'select','data-invalid-value'=>'','data-toggle'=>'tooltip',
                                                    'data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('club_club_season_played[]','Seasons Played:') !!}
                                                    {!! Form::text('club_club_season_played[]',$clubCareerInformation[0]->club_season_played,
                                                    ['class'=>'form-control','data-validate'=>'number',
                                                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter numeric value']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_container">
                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('club_club_average_league_status[]','Club Average League Status:') !!}
                                                    {!! Form::select('club_club_average_league_status[]',$clubLeagueStatus,
                                                    $clubCareerInformation[0]->club_average_league_status,['class'=>'form-control',
                                                    'data-validate'=>'select','data-invalid-value'=>'','data-toggle'=>'tooltip',
                                                    'data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('club_club_school_most_played_position[]','Most Played Position for club:') !!}
                                                    {!! Form::select('club_club_school_most_played_position[]',$sportPositions,
                                                    $clubCareerInformation[0]->club_school_most_played_position,['class'=>'form-control',
                                                    'data-validate'=>'select','data-invalid-value'=>'','data-toggle'=>'tooltip',
                                                    'data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_container">
                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('club_club_school_coach_name[]','Club Coach First Name:') !!}
                                                    {!! Form::text('club_club_school_coach_name[]',$clubCareerInformation[0]->club_school_coach_name,
                                                    ['class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('club_club_school_coach_email[]','Club Coach Email Address:') !!}
                                                    {!! Form::text('club_club_school_coach_email[]',$clubCareerInformation[0]->club_school_coach_email,
                                                    ['class'=>'form-control','data-validate'=>'email',
                                                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter email in correct format.']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('club_club_school_coach_mobile_number[]','Club Coach Mobile Number:') !!}
                                                    {!! Form::text('club_club_school_coach_mobile_number[]',$clubCareerInformation[0]->club_school_coach_mobile_number,
                                                    ['class'=>'form-control','data-validate'=>'phoneNumber','data-toggle'=>'tooltip',
                                                    'data-placement'=>'bottom','title'=>'Enter phone number in correct format.']) !!}
                                                </div>
                                            </div>

                                        </div>

                                        <h1>Club Statistics</h1>
                                        <?php
                                            $sportDataMap = $clubDataMap;
                                            $sportStatistics = $clubCareerInformation[0]->careerSportStatistics(Session::get(\talenthub\Repositories\SiteSessions::USER_SPORT_TYPE))->get();

                                            //dd($sport_type);
                                        ?>

                                        @include('profile.talent.TalentCVForms.getSportCVView',compact('sport_type','sportDataMap','sportStatistics'))


                                        <?php

                                            $clubReferences=$clubCareerInformation[0]->careerReferences()->get();
                                            if(count($clubReferences)==0)
                                            {
                                                $clubReferences[0]=new talenthub\TalentCareerReferences();
                                            }
                                        ?>
                                        <h1>Club References</h1>
                                        <div class="duplicate_content_container form_container">
                                            <div class="duplicate_this_content club_references_duplication_content">
                                                <div class="row form_container">
                                                    <div class="col-xs-12 col-lg-3">
                                                        <div class="form-group">
                                                            {!! Form::label('club_name[0][]','Name:') !!}
                                                            {!! Form::text('club_name[0][]',$clubReferences[0]->name,['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-2">
                                                        <div class="form-group">
                                                            {!! Form::label('club_relationship[0][]','Relationship:') !!}
                                                            {!! Form::text('club_relationship[0][]',$clubReferences[0]->relationship,['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-2">
                                                        <div class="form-group">
                                                            {!! Form::label('club_occupation[0][]','Occupation:') !!}
                                                            {!! Form::text('club_occupation[0][]',$clubReferences[0]->occupation,['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-3">
                                                        <div class="form-group">
                                                            {!! Form::label('club_email[0][]','Email:') !!}
                                                            {!! Form::text('club_email[0][]',$clubReferences[0]->email,['class'=>'form-control',
                                                            'data-validate'=>'email','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                            'title'=>'Enter email in correct format.']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-2">
                                                        <div class="form-group">
                                                            {!! Form::label('club_contact_number[0][]','Contact Number:') !!}
                                                            {!! Form::text('club_contact_number[0][]',$clubReferences[0]->contact_number,['class'=>'form-control',
                                                            'data-validate'=>'phoneNumber','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                            'title'=>'Enter contact number correctly.']) !!}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="place_duplicate_content_here club_references_duplicated_content">
                                                <?php
                                                    if(count($clubReferences)>1)
                                                    {
                                                        for($k=1;$k<count($clubReferences);$k++)
                                                        {
                                                        ?>
                                                            <div class="content_duplicated">

                                                                <div class="row form_container">
                                                                    <div class="col-xs-12 col-lg-3">
                                                                        <div class="form-group">
                                                                            {!! Form::label('club_name[0][]','Name:') !!}
                                                                            {!! Form::text('club_name[0][]',$clubReferences[$k]->name,['class'=>'form-control']) !!}
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xs-12 col-lg-2">
                                                                        <div class="form-group">
                                                                            {!! Form::label('club_relationship[0][]','Relationship:') !!}
                                                                            {!! Form::text('club_relationship[0][]',$clubReferences[$k]->relationship,['class'=>'form-control']) !!}
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xs-12 col-lg-2">
                                                                        <div class="form-group">
                                                                            {!! Form::label('club_occupation[0][]','Occupation:') !!}
                                                                            {!! Form::text('club_occupation[0][]',$clubReferences[$k]->occupation,['class'=>'form-control']) !!}
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xs-12 col-lg-3">
                                                                        <div class="form-group">
                                                                            {!! Form::label('club_email[0][]','Email:') !!}
                                                                            {!! Form::text('club_email[0][]',$clubReferences[$k]->email,['class'=>'form-control',
                                                                            'data-validate'=>'email','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                            'title'=>'Enter email in correct format.']) !!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-12 col-lg-2">
                                                                        <div class="form-group">
                                                                            {!! Form::label('club_contact_number[0][]','Contact Number:') !!}
                                                                            {!! Form::text('club_contact_number[0][]',$clubReferences[$k]->contact_number,
                                                                            ['class'=>'form-control','data-validate'=>'phoneNumber','data-toggle'=>'tooltip',
                                                                            'data-placement'=>'bottom','title'=>'Enter contact number correctly.']) !!}
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="close_duplicate delete_duplicate_content_button">X</div>
                                                            </div>
                                                        <?php
                                                        }
                                                    }
                                                ?>

                                            </div>
                                            <div class="text-center">
                                                <button class="t-button duplicate_content_button" type="button"
                                                        data-target-duplicate-content=".club_references_duplication_content"
                                                        data-place-duplicate-content=".club_references_duplicated_content">Add more</button>"
                                            </div>
                                        </div>

                                        <div class="row form_container">

                                        </div>

                                        <div class="row form_container">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('club_additional_information[]','Additional Club Information:') !!}
                                                    {!! Form::textarea('club_additional_information[]',$clubCareerInformation[0]->additional_information,['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="place_duplicate_content_here club_information_for_duplicated_data">
                                        <?php
                                        if(count($clubCareerInformation)>1)
                                        {
                                            for($i=1;$i<count($clubCareerInformation);$i++)
                                            {
                                        ?>
                                            <div class="content_duplicated">
                                                <h1>Club Information</h1>
                                                <div class="row form_container">
                                                    <div class="col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            {!! Form::label('club_club_school_name[]','Current Club Name:') !!}
                                                            {!! Form::text('club_club_school_name[]',$clubCareerInformation[$i]->club_school_name,
                                                            ['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            {!! Form::label('club_club_school_country[]','Country:') !!}
                                                            {!! Form::select('club_club_school_country[]',$country,$clubCareerInformation[$i]->club_school_country,
                                                            ['class'=>'form-control','data-validate'=>'select','data-invalid-value'=>'',
                                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row form_container">
                                                    <div class="col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            {!! Form::label('club_club_league_name[]','League Name:') !!}
                                                            {!! Form::text('club_club_league_name[]',$clubCareerInformation[$i]->club_league_name,
                                                            ['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            {!! Form::label('club_club_league_level[]','League Level:') !!}
                                                            {!! Form::select('club_club_league_level[]',$clubLeagueLevel,
                                                            $clubCareerInformation[$i]->club_league_level,['class'=>'form-control',
                                                            'data-validate'=>'select','data-invalid-value'=>'','data-toggle'=>'tooltip',
                                                            'data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            {!! Form::label('club_club_season_played[]','Seasons Played:') !!}
                                                            {!! Form::text('club_club_season_played[]',$clubCareerInformation[$i]->club_season_played,
                                                            ['class'=>'form-control','data-validate'=>'number',
                                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter numeric value']) !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row form_container">
                                                    <div class="col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            {!! Form::label('club_club_average_league_status[]','Club Average League Status:') !!}
                                                            {!! Form::select('club_club_average_league_status[]',$clubLeagueStatus,
                                                            $clubCareerInformation[$i]->club_average_league_status,['class'=>'form-control',
                                                            'data-validate'=>'select','data-invalid-value'=>'','data-toggle'=>'tooltip',
                                                            'data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            {!! Form::label('club_club_school_most_played_position[]','Most Played Position for club:') !!}
                                                            {!! Form::select('club_club_school_most_played_position[]',$sportPositions,
                                                            $clubCareerInformation[$i]->club_school_most_played_position,['class'=>'form-control','data-validate'=>'select','data-invalid-value'=>'',
                                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row form_container">
                                                    <div class="col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            {!! Form::label('club_club_school_coach_name[]','Club Coach First Name:') !!}
                                                            {!! Form::text('club_club_school_coach_name[]',$clubCareerInformation[$i]->club_school_coach_name,
                                                            ['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            {!! Form::label('club_club_school_coach_email[]','Club Coach Email Address:') !!}
                                                            {!! Form::text('club_club_school_coach_email[]',$clubCareerInformation[$i]->club_school_coach_email,
                                                            ['class'=>'form-control','data-validate'=>'email',
                                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter email in correct format.']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-4">
                                                        <div class="form-group">
                                                            {!! Form::label('club_club_school_coach_mobile_number[]','Club Coach Mobile Number:') !!}
                                                            {!! Form::text('club_club_school_coach_mobile_number[]',$clubCareerInformation[$i]->club_school_coach_mobile_number,
                                                            ['class'=>'form-control','data-validate'=>'phoneNumber','data-toggle'=>'tooltip',
                                                            'data-placement'=>'bottom','title'=>'Enter phone number in correct format.']) !!}
                                                        </div>
                                                    </div>

                                                </div>


                                                <h1>Club Statistics</h1>
                                                <?php
                                                    $sportDataMap = $clubDataMap;
                                                    $sportStatistics = $clubCareerInformation[$i]->careerSportStatistics(Session::get(\talenthub\Repositories\SiteSessions::USER_SPORT_TYPE))->get();
                                                ?>

                                                @include('profile.talent.TalentCVForms.getSportCVView',compact('sport_type','sportDataMap','sportStatistics'))

                                                <?php
                                                $clubReferences=$clubCareerInformation[$i]->careerReferences()->get();
                                                if(count($clubReferences)==0)
                                                {
                                                    $clubReferences[0]=new talenthub\TalentCareerReferences();
                                                }
                                                ?>
                                                <h1>Club References</h1>
                                                <div class="duplicate_content_container form_container">
                                                    <div class="duplicate_this_content club_references_duplication_content">
                                                        <div class="row form_container">
                                                            <div class="col-xs-12 col-lg-3">
                                                                <div class="form-group">
                                                                    {!! Form::label('club_name[0][]','Name:') !!}
                                                                    {!! Form::text('club_name[0][]',$clubReferences[0]->name,['class'=>'form-control']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-12 col-lg-2">
                                                                <div class="form-group">
                                                                    {!! Form::label('club_relationship[0][]','Relationship:') !!}
                                                                    {!! Form::text('club_relationship[0][]',$clubReferences[0]->relationship,['class'=>'form-control']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-12 col-lg-2">
                                                                <div class="form-group">
                                                                    {!! Form::label('club_occupation[0][]','Occupation:') !!}
                                                                    {!! Form::text('club_occupation[0][]',$clubReferences[0]->occupation,['class'=>'form-control']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-12 col-lg-3">
                                                                <div class="form-group">
                                                                    {!! Form::label('club_email[0][]','Email:') !!}
                                                                    {!! Form::text('club_email[0][]',$clubReferences[0]->email,['class'=>'form-control',
                                                                    'data-validate'=>'email','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                    'title'=>'Enter email in correct format.']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-lg-2">
                                                                <div class="form-group">
                                                                    {!! Form::label('club_contact_number[0][]','Contact Number:') !!}
                                                                    {!! Form::text('club_contact_number[0][]',$clubReferences[0]->contact_number,['class'=>'form-control',
                                                                    'data-validate'=>'phoneNumber','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                    'title'=>'Enter contact number correctly.']) !!}
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="place_duplicate_content_here club_references_duplicated_content">
                                                        <?php
                                                        if(count($clubReferences)>1)
                                                        {
                                                        for($k=1;$k<count($clubReferences);$k++)
                                                        {
                                                        ?>
                                                        <div class="content_duplicated">

                                                            <div class="row form_container">
                                                                <div class="col-xs-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        {!! Form::label('club_name[0][]','Name:') !!}
                                                                        {!! Form::text('club_name[0][]',$clubReferences[$k]->name,['class'=>'form-control']) !!}
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-12 col-lg-2">
                                                                    <div class="form-group">
                                                                        {!! Form::label('club_relationship[0][]','Relationship:') !!}
                                                                        {!! Form::text('club_relationship[0][]',$clubReferences[$k]->relationship,['class'=>'form-control']) !!}
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-12 col-lg-2">
                                                                    <div class="form-group">
                                                                        {!! Form::label('club_occupation[0][]','Occupation:') !!}
                                                                        {!! Form::text('club_occupation[0][]',$clubReferences[$k]->occupation,['class'=>'form-control']) !!}
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        {!! Form::label('club_email[0][]','Email:') !!}
                                                                        {!! Form::text('club_email[0][]',$clubReferences[$k]->email,['class'=>'form-control',
                                                                        'data-validate'=>'email','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                        'title'=>'Enter email in correct format.']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-lg-2">
                                                                    <div class="form-group">
                                                                        {!! Form::label('club_contact_number[0][]','Contact Number:') !!}
                                                                        {!! Form::text('club_contact_number[0][]',$clubReferences[$k]->contact_number,['class'=>'form-control',
                                                                        'data-validate'=>'phoneNumber','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                        'title'=>'Enter contact number correctly.']) !!}
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="close_duplicate delete_duplicate_content_button">X</div>
                                                        </div>
                                                        <?php
                                                        }
                                                        }
                                                        ?>

                                                    </div>
                                                    <div class="text-center">
                                                        <button class="t-button duplicate_content_button" type="button"
                                                                data-target-duplicate-content=".club_references_duplication_content"
                                                                data-place-duplicate-content=".club_references_duplicated_content">Add more</button>"
                                                    </div>
                                                </div>


                                                <div class="row form_container">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            {!! Form::label('club_additional_information[]','Additional Club Information:') !!}
                                                            {!! Form::textarea('club_additional_information[]',$clubCareerInformation[$i]->additional_information,['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="close_duplicate delete_duplicate_content_button">X</div>
                                            </div>

                                        <?php
                                            }
                                        }

                                        ?>
                                    </div>
                                    <div>
                                        <button class="t-button duplicate_content_button" type="button"
                                                data-target-duplicate-content=".full_club_information_for_duplication"
                                                data-place-duplicate-content=".club_information_for_duplicated_data">Add more</button>
                                    </div>
                                </div>




                                <!-- School Team Information -->

                                <?php



                                if(count($schoolCareerInformation)==0)
                                {
                                    $schoolCareerInformation[0]=new talenthub\TalentCareerInformation();
                                }
                                ?>

                                <div class="duplicate_content_container" id="school_career_information">
                                    <div class="duplicate_this_content full_school_information_for_duplication">
                                        <h1>School Team Information</h1>
                                        <div class="row form_container">
                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('school_school_type[]','Current School Type:') !!}
                                                    {!! Form::select('school_school_type[]',$institutionType,$schoolCareerInformation[0]->school_type,
                                                    ['class'=>'form-control','data-validate'=>'select','data-invalid-value'=>'',
                                                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('school_club_school_name[]','Current School Name:') !!}
                                                    {!! Form::text('school_club_school_name[]',$schoolCareerInformation[0]->club_school_name,
                                                    ['class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('school_club_school_country[]','Country of School:') !!}
                                                    {!! Form::select('school_club_school_country[]',$country,$schoolCareerInformation[0]->club_school_country,
                                                    ['class'=>'form-control','data-validate'=>'select','data-invalid-value'=>'',
                                                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form_container">
                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('school_school_team_reputation[]','School Team Reputation:') !!}
                                                    {!! Form::select('school_school_team_reputation[]',$schoolTeamReputation,$schoolCareerInformation[0]->school_team_reputation,
                                                    ['class'=>'form-control','data-validate'=>'select','data-invalid-value'=>'',
                                                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('school_school_team_side_level[]','School Team Side Level:') !!}
                                                    {!! Form::select('school_school_team_side_level[]',$schoolTeamSideLevel
                                                    ,$schoolCareerInformation[0]->school_team_side_level,['class'=>'form-control',
                                                    'data-validate'=>'select','data-invalid-value'=>'','data-toggle'=>'tooltip',
                                                    'data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('school_club_school_most_played_position[]','Most Played Position for School:') !!}
                                                    {!! Form::select('school_club_school_most_played_position[]',$sportPositions,
                                                    $schoolCareerInformation[0]->club_school_most_played_position,['class'=>'form-control','data-validate'=>'select',
                                                    'data-invalid-value'=>'','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row form_container">
                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('school_club_school_coach_name[]','School Coach First Name:') !!}
                                                    {!! Form::text('school_club_school_coach_name[]',$schoolCareerInformation[0]->club_school_coach_name,
                                                    ['class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('school_club_school_coach_email[]','School Coach Email Address:') !!}
                                                    {!! Form::text('school_club_school_coach_email[]',$schoolCareerInformation[0]->club_school_coach_email,
                                                    ['class'=>'form-control','data-validate'=>'email','data-toggle'=>'tooltip',
                                                    'data-placement'=>'bottom','title'=>'Enter email in correct format.']) !!}
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-lg-4">
                                                <div class="form-group">
                                                    {!! Form::label('school_club_school_coach_mobile_number[]','School Coach Mobile Number:') !!}
                                                    {!! Form::text('school_club_school_coach_mobile_number[]',$schoolCareerInformation[0]->club_school_coach_mobile_number,
                                                    ['class'=>'form-control','data-validate'=>'phoneNumber','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                    'title'=>'Enter phone number in correct format.']) !!}
                                                </div>
                                            </div>

                                        </div>

                                        <h1>School Statistics</h1>
                                        <?php
                                        $sportDataMap = $schoolDataMap;
                                        $sportStatistics = $schoolCareerInformation[0]->careerSportStatistics(Session::get(\talenthub\Repositories\SiteSessions::USER_SPORT_TYPE))->get();
                                        ?>
                                        @include('profile.talent.TalentCVForms.getSportCVView',compact('sport_type','sportDataMap','sportStatistics'))

                                        <h1>School References</h1>

                                        <?php
                                            $schoolReferences=$schoolCareerInformation[0]->careerReferences()->get();
                                            if(count($schoolReferences)==0)
                                            {
                                                $schoolReferences[0]=new talenthub\TalentCareerReferences();
                                            }
                                        ?>

                                        <div class="duplicate_content_container form_container school_references">
                                            <div class="duplicate_this_content school_references_duplication_content">
                                                <div class="row form_container">
                                                    <div class="col-xs-12 col-lg-3">
                                                        <div class="form-group">
                                                            {!! Form::label('school_name[0][]','Name:') !!}
                                                            {!! Form::text('school_name[0][]',$schoolReferences[0]->name,['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-2">
                                                        <div class="form-group">
                                                            {!! Form::label('school_relationship[0][]','Relationship:') !!}
                                                            {!! Form::text('school_relationship[0][]',$schoolReferences[0]->relationship,['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-2">
                                                        <div class="form-group">
                                                            {!! Form::label('school_occupation[0][]','Occupation:') !!}
                                                            {!! Form::text('school_occupation[0][]',$schoolReferences[0]->occupation,['class'=>'form-control']) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-xs-12 col-lg-3">
                                                        <div class="form-group">
                                                            {!! Form::label('school_email[0][]','Email:') !!}
                                                            {!! Form::text('school_email[0][]',$schoolReferences[0]->email,['class'=>'form-control',
                                                            'data-validate'=>'email','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                            'title'=>'Enter email in correct format.']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-lg-2">
                                                        <div class="form-group">
                                                            {!! Form::label('school_contact_number[0][]','Contact Number:') !!}
                                                            {!! Form::text('school_contact_number[0][]',$schoolReferences[0]->contact_number,['class'=>'form-control',
                                                            'data-validate'=>'phoneNumber','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                            'title'=>'Enter contact number correctly.']) !!}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="place_duplicate_content_here school_references_duplicated_content">

                                                <?php
                                                if(count($schoolReferences)>1)
                                                {
                                                    for($k=1;$k<count($schoolReferences);$k++)
                                                    {
                                                    ?>
                                                    <div class="content_duplicated">

                                                        <div class="row form_container">
                                                            <div class="col-xs-12 col-lg-3">
                                                                <div class="form-group">
                                                                    {!! Form::label('school_name[0][]','Name:') !!}
                                                                    {!! Form::text('school_name[0][]',$schoolReferences[$k]->name,['class'=>'form-control']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-12 col-lg-2">
                                                                <div class="form-group">
                                                                    {!! Form::label('school_relationship[0][]','Relationship:') !!}
                                                                    {!! Form::text('school_relationship[0][]',$schoolReferences[$k]->relationship,['class'=>'form-control']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-12 col-lg-2">
                                                                <div class="form-group">
                                                                    {!! Form::label('school_occupation[0][]','Occupation:') !!}
                                                                    {!! Form::text('school_occupation[0][]',$schoolReferences[$k]->occupation,['class'=>'form-control']) !!}
                                                                </div>
                                                            </div>

                                                            <div class="col-xs-12 col-lg-3">
                                                                <div class="form-group">
                                                                    {!! Form::label('school_email[0][]','Email:') !!}
                                                                    {!! Form::text('school_email[0][]',$schoolReferences[$k]->email,['class'=>'form-control',
                                                                    'data-validate'=>'email','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                    'title'=>'Enter email in correct format.']) !!}
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-lg-2">
                                                                <div class="form-group">
                                                                    {!! Form::label('school_contact_number[0][]','Contact Number:') !!}
                                                                    {!! Form::text('school_contact_number[0][]',$schoolReferences[$k]->contact_number,['class'=>'form-control',
                                                                    'data-validate'=>'phoneNumber','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                    'title'=>'Enter contact number correctly.']) !!}
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="close_duplicate delete_duplicate_content_button">X</div>
                                                    </div>
                                                    <?php
                                                    }
                                                }
                                                ?>

                                            </div>
                                            <div class="text-center">
                                                <button class="t-button duplicate_content_button" type="button"
                                                        data-target-duplicate-content=".school_references_duplication_content"
                                                        data-place-duplicate-content=".school_references_duplicated_content">Add more</button>"
                                            </div>
                                        </div>

                                        <div class="row form_container">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::label('school_additional_information[]','Additional School Information:') !!}
                                                    {!! Form::textarea('school_additional_information[]',$schoolCareerInformation[0]->additional_information,['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="place_duplicate_content_here school_information_for_duplicated_data">

                                        <?php

                                        if(count($schoolCareerInformation)>1)
                                        {
                                            for($i=1;$i<count($schoolCareerInformation);$i++)
                                            {
                                            ?>

                                                <div class="content_duplicated">

                                                    <h1>School Team Information</h1>
                                                    <div class="row form_container">
                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                {!! Form::label('school_school_type[]','Current School Type:') !!}
                                                                {!! Form::select('school_school_type[]',$institutionType,$schoolCareerInformation[$i]->school_type,
                                                                ['class'=>'form-control','data-validate'=>'select','data-invalid-value'=>'',
                                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                {!! Form::label('school_club_school_name[]','Current School Name:') !!}
                                                                {!! Form::text('school_club_school_name[]',$schoolCareerInformation[$i]->club_school_name,
                                                                ['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                {!! Form::label('school_club_school_country[]','Country of School:') !!}
                                                                {!! Form::select('school_club_school_country[]',$country,$schoolCareerInformation[$i]->club_school_country,
                                                                ['class'=>'form-control','data-validate'=>'select','data-invalid-value'=>'',
                                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form_container">
                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                {!! Form::label('school_school_team_reputation[]','School Team Reputation:') !!}
                                                                {!! Form::select('school_school_team_reputation[]',$schoolTeamReputation,$schoolCareerInformation[$i]->school_team_reputation,
                                                                ['class'=>'form-control','data-validate'=>'select','data-invalid-value'=>'',
                                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                {!! Form::label('school_school_team_side_level[]','School Team Side Level:') !!}
                                                                {!! Form::select('school_school_team_side_level[]',$schoolTeamSideLevel
                                                                ,$schoolCareerInformation[$i]->school_team_side_level,['class'=>'form-control',
                                                                'data-validate'=>'select','data-invalid-value'=>'','data-toggle'=>'tooltip',
                                                                'data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                {!! Form::label('school_club_school_most_played_position[]','Most Played Position for School:') !!}
                                                                {!! Form::select('school_club_school_most_played_position[]',$sportPositions,
                                                                $schoolCareerInformation[$i]->club_school_most_played_position,['class'=>'form-control','data-validate'=>'select',
                                                                'data-invalid-value'=>'','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                'title'=>'Select proper option from the list provided.']) !!}
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row form_container">
                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                {!! Form::label('school_club_school_coach_name[]','School Coach First Name:') !!}
                                                                {!! Form::text('school_club_school_coach_name[]',$schoolCareerInformation[$i]->club_school_coach_name,
                                                                ['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                {!! Form::label('school_club_school_coach_email[]','School Coach Email Address:') !!}
                                                                {!! Form::text('school_club_school_coach_email[]',$schoolCareerInformation[$i]->club_school_coach_email,
                                                                ['class'=>'form-control','data-validate'=>'email','data-toggle'=>'tooltip',
                                                                'data-placement'=>'bottom','title'=>'Enter email in correct format.']) !!}
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 col-lg-4">
                                                            <div class="form-group">
                                                                {!! Form::label('school_club_school_coach_mobile_number[]','School Coach Mobile Number:') !!}
                                                                {!! Form::text('school_club_school_coach_mobile_number[]',$schoolCareerInformation[$i]->club_school_coach_mobile_number,
                                                                ['class'=>'form-control','data-validate'=>'phoneNumber','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                'title'=>'Enter phone number in correct format.']) !!}
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <h1>School Statistics</h1>
                                                    <?php

                                                    $sportDataMap = $schoolDataMap;
                                                    $sportStatistics = $schoolCareerInformation[$i]->careerSportStatistics(Session::get(\talenthub\Repositories\SiteSessions::USER_SPORT_TYPE))->get();

                                                    ?>
                                                    @include('profile.talent.TalentCVForms.getSportCVView',compact('sport_type','sportDataMap','sportStatistics'))

                                                    <h1>School References</h1>

                                                    <?php

                                                    $schoolReferences=$schoolCareerInformation[$i]->careerReferences;


                                                    if(count($schoolReferences)==0)
                                                    {
                                                        $schoolReferences[0]=new talenthub\TalentCareerReferences();
                                                    }

                                                    ?>

                                                    <div class="duplicate_content_container form_container school_references">
                                                        <div class="duplicate_this_content school_references_duplication_content">
                                                            <div class="row form_container">
                                                                <div class="col-xs-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        {!! Form::label('school_name[0][]','Name:') !!}
                                                                        {!! Form::text('school_name[0][]',$schoolReferences[0]->name,['class'=>'form-control']) !!}
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-12 col-lg-2">
                                                                    <div class="form-group">
                                                                        {!! Form::label('school_relationship[0][]','Relationship:') !!}
                                                                        {!! Form::text('school_relationship[0][]',$schoolReferences[0]->relationship,['class'=>'form-control']) !!}
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-12 col-lg-2">
                                                                    <div class="form-group">
                                                                        {!! Form::label('school_occupation[0][]','Occupation:') !!}
                                                                        {!! Form::text('school_occupation[0][]',$schoolReferences[0]->occupation,['class'=>'form-control']) !!}
                                                                    </div>
                                                                </div>

                                                                <div class="col-xs-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        {!! Form::label('school_email[0][]','Email:') !!}
                                                                        {!! Form::text('school_email[0][]',$schoolReferences[0]->email,['class'=>'form-control',
                                                                        'data-validate'=>'email','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                        'title'=>'Enter email in correct format.']) !!}
                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-12 col-lg-2">
                                                                    <div class="form-group">
                                                                        {!! Form::label('school_contact_number[0][]','Contact Number:') !!}
                                                                        {!! Form::text('school_contact_number[0][]',$schoolReferences[0]->contact_number,['class'=>'form-control',
                                                                        'data-validate'=>'phoneNumber','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                        'title'=>'Enter contact number correctly.']) !!}
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="place_duplicate_content_here school_references_duplicated_content">

                                                            <?php

                                                            if(count($schoolReferences)>1)
                                                            {

                                                                for($k=1;$k<count($schoolReferences);$k++)
                                                                {
                                                                ?>
                                                                <div class="content_duplicated">

                                                                    <div class="row form_container">
                                                                        <div class="col-xs-12 col-lg-3">
                                                                            <div class="form-group">
                                                                                {!! Form::label('school_name[0][]','Name:') !!}
                                                                                {!! Form::text('school_name[0][]',$schoolReferences[$k]->name,['class'=>'form-control']) !!}
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xs-12 col-lg-2">
                                                                            <div class="form-group">
                                                                                {!! Form::label('school_relationship[0][]','Relationship:') !!}
                                                                                {!! Form::text('school_relationship[0][]',$schoolReferences[$k]->relationship,['class'=>'form-control']) !!}
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xs-12 col-lg-2">
                                                                            <div class="form-group">
                                                                                {!! Form::label('school_occupation[0][]','Occupation:') !!}
                                                                                {!! Form::text('school_occupation[0][]',$schoolReferences[$k]->occupation,['class'=>'form-control']) !!}
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xs-12 col-lg-3">
                                                                            <div class="form-group">
                                                                                {!! Form::label('school_email[0][]','Email:') !!}
                                                                                {!! Form::text('school_email[0][]',$schoolReferences[$k]->email,['class'=>'form-control',
                                                                                'data-validate'=>'email','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                                                'title'=>'Enter email in correct format.']) !!}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-xs-12 col-lg-2">
                                                                            <div class="form-group">
                                                                                {!! Form::label('school_contact_number[0][]','Contact Number:') !!}
                                                                                {!! Form::text('school_contact_number[0][]',$schoolReferences[$k]->contact_number,
                                                                                ['class'=>'form-control','data-validate'=>'phoneNumber','data-toggle'=>'tooltip',
                                                                                'data-placement'=>'bottom','title'=>'Enter contact number correctly.']) !!}
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="close_duplicate delete_duplicate_content_button">X</div>
                                                                </div>
                                                                <?php
                                                                }
                                                            }
                                                            ?>

                                                        </div>
                                                        <div class="text-center">
                                                            <button class="t-button duplicate_content_button" type="button"
                                                                    data-target-duplicate-content=".school_references_duplication_content"
                                                                    data-place-duplicate-content=".school_references_duplicated_content">Add more</button>"
                                                        </div>
                                                    </div>

                                                    <div class="row form_container">
                                                        <div class="col-xs-12">
                                                            <div class="form-group">
                                                                {!! Form::label('school_additional_information[]','Additional School Information:') !!}
                                                                {!! Form::textarea('school_additional_information[]',$schoolCareerInformation[$i]->additional_information,['class'=>'form-control']) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="close_duplicate delete_duplicate_content_button">X</div>
                                                </div>

                                            <?php
                                            }
                                        }
                                        ?>

                                    </div>
                                    <div>
                                        <button class="t-button duplicate_content_button" type="button"
                                                data-target-duplicate-content=".full_school_information_for_duplication"
                                                data-place-duplicate-content=".school_information_for_duplicated_data">Add more</button>
                                    </div>
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-xs-12 col-lg-4 col-lg-offset-4">
                                    {!! Form::submit('Update Profile Data',['class'=>'btn btn-primary form-control']) !!}
                                </div>

                            </div>


                        </div>
                        {!! Form::close() !!}
                    </div>

                </div>

            </div>



        </div>
    </div>



    <script>
        $(document).ready(function(){

            //Script for Properly Updating form input indexes - For Club Information Part
            $("#club_career_information").on('content-duplicated',function(event){

                event.stopPropagation();

                //Step 1. Get .duplicate_this_content/.full_club_information_for_duplication
                var clubDuplicateThisContent = $(this).find('.full_club_information_for_duplication');

                //Step 2. Loop every element of the .duplicate_this_content and assign index as 0
                $(clubDuplicateThisContent).find('input,select,textarea').each(function(index,elem){
                    updateInputNameAndID(index,elem,0);
                });

                //Step 3. Get .club_information_for_duplicated_data and select children .content_duplicated
                var clubInformationDuplicatedData = $(this).children(".club_information_for_duplicated_data");
                var contentDuplicated = $(clubInformationDuplicatedData).children(".content_duplicated");

                //Step 4. Assign index of all inputs as index starting from 1 to number of .content_duplicated divs

                $(contentDuplicated).each(function(index,elem){
                    var updateIndex = index+1;
                    $(elem).find("input,select,textarea").each(function(inputIndex,inputElem){
                        updateInputNameAndID(inputIndex,inputElem,updateIndex);
                    });
                });
            });



            //Script for Properly Updating form input indexes - For School Information Part
            $("#school_career_information").on('content-duplicated',function(event){

                event.stopPropagation();

                //Step 1. Get .duplicate_this_content/.full_school_information_for_duplication
                var schoolDuplicateThisContent = $(this).find('.full_school_information_for_duplication');

                //Step 2. Loop every element of the .duplicate_this_content and assign index as 0
                $(schoolDuplicateThisContent).find('input,select,textarea').each(function(index,elem){
                    updateInputNameAndID(index,elem,0);
                });

                //Step 3. Get .school_information_for_duplicated_data and select children .content_duplicated
                var schoolInformationDuplicatedData = $(this).children(".school_information_for_duplicated_data");
                var contentDuplicated = $(schoolInformationDuplicatedData).children(".content_duplicated");

                //Step 4. Assign index of all inputs as index starting from 1 to number of .content_duplicated divs

                $(contentDuplicated).each(function(index,elem){
                    var updateIndex = index+1;
                    $(elem).find("input,select,textarea").each(function(inputIndex,inputElem){
                        updateInputNameAndID(inputIndex,inputElem,updateIndex);
                    });
                });
            });


            //Updating first index of Name and ID of an input
            function updateInputNameAndID(inputIndex,inputElem,updateIndex)
            {
                var name=$(inputElem).attr('name');
                var id=$(inputElem).attr('name');

                var lastIndexOfName = ($(inputElem).attr('name')).indexOf('[');
                var secondHalfIndex = ($(inputElem).attr('name')).indexOf(']');

                name = name.substring(0,lastIndexOfName)+"["+updateIndex+name.substring(secondHalfIndex);
                id = name;
                $(inputElem).attr('name',name);
                $(inputElem).attr('id',id);
            }


            $("#club_career_information, #school_career_information").trigger("content-duplicated");


        });
    </script>


@stop