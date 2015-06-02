@extends('app')

@section('content')


    <div class="talent_profile">

        <?php
            $visitingUserId = \Illuminate\Support\Facades\Session::get(\talenthub\Repositories\SiteSessions::USER_ID);
            $userProfile = $talentProfile;
            $profileEditable = false;

        ?>
        @include('profile.template.userIntroBanner',compact('userProfile','profileEditable'))

        <?php
        $active_menu=2; //For Curriculum Vitae
        ?>
        @include('templates.menu.user_profile_menu',compact('userProfile','active_menu'))


        <div class="profile_content_container">
            <div class="container curriculum_vitae_container">
                <h1 class="headings">Curriculum Vitae</h1>

                <div class="row">
                    <div class="col-xs-12 col-lg-3">
                        <!-- Nav tabs -->
                        <ul class="nav left_menu_container" role="tablist" id="curriculum">
                            <li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">Personal Information</a></li>
                            <li role="presentation"><a href="#academic" aria-controls="academic" role="tab" data-toggle="tab">Academic Information</a></li>
                            <li role="presentation"><a href="#club" aria-controls="club" role="tab" data-toggle="tab">Club Information</a></li>
                            <li role="presentation"><a href="#school" aria-controls="school" role="tab" data-toggle="tab">School Information</a></li>
                            <li role="presentation"><a href="#awards" aria-controls="awards" role="tab" data-toggle="tab">Awards</a></li>
                            <li role="presentation"><a href="#recommendations" aria-controls="recommendations" role="tab" data-toggle="tab">Recommendations</a></li>
                        </ul>
                    </div>

                    <div class="col-xs-12 col-lg-9">
                        <div class="tab-content">
                            <!-- Showing personal Information -->
                            <div role="tabpanel" class="tab-pane fade in active" id="personal">
                                <h3 class="tab_heading">Personal Information
                                    @if($visitingUserId == $talentProfile->user_id)
                                        <a href="{{url('profile/edit')}}" class="edit_link">Edit</a>
                                    @endif
                                </h3>
                                <div class="row">
                                    <div class="col-xs-6 col-lg-4">
                                        <div class="user_data_container">
                                            <label class="label">Gender:</label>
                                            <span class="user_data">{{$talentProfile->gender}}</span>
                                        </div>

                                        <div class="user_data_container">
                                            <label class="label">Height:</label>
                                            <span class="user_data">{{$talentProfile->height}}</span>
                                        </div>


                                        <div class="user_data_container">
                                            <label class="label">Weight:</label>
                                            <span class="user_data">{{$talentProfile->weight}}</span>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-lg-4">
                                        <div class="user_data_container">
                                            <label class="label">Mobile Number:</label>
                                            <span class="user_data">{{$talentProfile->gender}}</span>
                                        </div>

                                        <div class="user_data_container">
                                            <label class="label">Home Number:</label>
                                            <span class="user_data">{{$talentProfile->height}}</span>
                                        </div>

                                        @if($talentProfile->address_type != 0)
                                            <div class="user_data_container">
                                                <label class="label">{{$talentProfile->address_type }} Address:</label>
                                                <span class="user_data">{{$talentProfile->weight}}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="col-xs-6 col-lg-4">
                                        <div class="user_data_container">
                                            <label class="label">Graduation Year:</label>
                                            <span class="user_data">{{$talentProfile->gender}}</span>
                                        </div>

                                        <div class="user_data_container">
                                            <label class="label">Graduating From:</label>
                                            <span class="user_data">{{$talentProfile->height}}</span>
                                        </div>


                                        <div class="user_data_container">
                                            <label class="label">NCAA Clearning ID:</label>
                                            <span class="user_data">{{$talentProfile->weight}}</span>
                                        </div>
                                    </div>
                                </div>

                                @if($talentProfile->father_name !="" || $talentProfile->mother_name !="" || $talentProfile->guardian_name !="")
                                <h4 class="tab_heading">Parent/Guardian Information
                                    @if($visitingUserId == $talentProfile->user_id)
                                        <a href="{{url('profile/edit')}}" class="edit_link">Edit</a>
                                    @endif
                                </h4>
                                @endif
                                <!-- Father's Detail -->
                                @if($talentProfile->father_name !="")
                                    <div class="row">
                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Father' Name:</label>
                                                <span class="user_data">{{$talentProfile->father_name}}</span>
                                            </div>

                                            <div class="user_data_container">
                                                <label class="label">Father Occupation:</label>
                                                <span class="user_data">{{$talentProfile->father_occupation}}</span>
                                            </div>

                                        </div>

                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Father Mobile Number:</label>
                                                <span class="user_data">{{$talentProfile->father_mobile_number}}</span>
                                            </div>

                                            <div class="user_data_container">
                                                <label class="label">Father Alumni:</label>
                                                <span class="user_data">{{$talentProfile->father_alumni}}</span>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Father Email:</label>
                                                <span class="user_data">{{$talentProfile->father_email}}</span>
                                            </div>

                                            <div class="user_data_container">
                                                <label class="label">Living with Father:</label>
                                                <span class="user_data">{{$talentProfile->father_living_with}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($talentProfile->mother_name !="")
                                    <div class="row">
                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Mother' Name:</label>
                                                <span class="user_data">{{$talentProfile->mother_name}}</span>
                                            </div>

                                            <div class="user_data_container">
                                                <label class="label">Mother Occupation:</label>
                                                <span class="user_data">{{$talentProfile->mother_occupation}}</span>
                                            </div>

                                        </div>

                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Mother Mobile Number:</label>
                                                <span class="user_data">{{$talentProfile->mother_mobile}}</span>
                                            </div>

                                            <div class="user_data_container">
                                                <label class="label">Mother Alumni:</label>
                                                <span class="user_data">{{$talentProfile->mother_alumni}}</span>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Mother Email:</label>
                                                <span class="user_data">{{$talentProfile->mother_email}}</span>
                                            </div>

                                            <div class="user_data_container">
                                                <label class="label">Living with Mother:</label>
                                                <span class="user_data">{{$talentProfile->mother_living_with}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if($talentProfile->guardian_name !="")
                                    <div class="row">
                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Guardian' Name:</label>
                                                <span class="user_data">{{$talentProfile->guardian_name}}</span>
                                            </div>

                                            <div class="user_data_container">
                                                <label class="label">Guardian Occupation:</label>
                                                <span class="user_data">{{$talentProfile->guardian_occupation}}</span>
                                            </div>

                                        </div>

                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Guardian Mobile Number:</label>
                                                <span class="user_data">{{$talentProfile->guardian_mobile}}</span>
                                            </div>

                                            <div class="user_data_container">
                                                <label class="label">Guardian Alumni:</label>
                                                <span class="user_data">{{$talentProfile->guardian_alumni}}</span>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Guardian Email:</label>
                                                <span class="user_data">{{$talentProfile->guardian_email}}</span>
                                            </div>

                                            <div class="user_data_container">
                                                <label class="label">Living with Guardian:</label>
                                                <span class="user_data">{{$talentProfile->guardian_living_with}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>

                            <!-- Showing academic Information -->
                            <div role="tabpanel" class="tab-pane fade" id="academic">
                                <h3 class="tab_heading">Academic Information
                                    @if($visitingUserId == $talentProfile->user_id)
                                        <a href="{{url('profile/edit')}}" class="edit_link">Edit</a>
                                    @endif
                                </h3>

                                <div class="row">
                                    <div class="col-xs-6 col-lg-6">
                                        <div class="user_data_container">
                                            <label class="label">School Type:</label>
                                            <span class="user_data">{{$talentProfile->school_type}}</span>
                                        </div>

                                        <div class="user_data_container">
                                            <label class="label">School Address:</label>
                                            <span class="user_data">{{$talentProfile->school_address .", ".$talentProfile->school_city.", ".$talentProfile->school_state_province."-".$talentProfile->school_zip}}</span>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-lg-6">
                                        <div class="user_data_container">
                                            <label class="label">School Name:</label>
                                            <span class="user_data">{{$talentProfile->school_name}}</span>
                                        </div>

                                        <div class="user_data_container">
                                            <label class="label">School Country:</label>
                                            <span class="user_data">{{$talentProfile->school_country}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-lg-12">
                                        <div class="user_data_container">
                                            <label class="label">School Contact Person Name:</label>
                                            <span class="user_data">{{$talentProfile->school_contact_person_name}}</span>
                                        </div>

                                        <div class="user_data_container">
                                            <label class="label">School Contact Person Email:</label>
                                            <span class="user_data">{{$talentProfile->school_contact_person_email}}</span>
                                        </div>


                                        <div class="user_data_container">
                                            <label class="label">School Contact Person Phone:</label>
                                            <span class="user_data">{{$talentProfile->school_contact_person_phone}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6 col-lg-12">
                                        <div class="user_data_container">
                                            <label class="label">Current Grade Average:</label>
                                            <span class="user_data">{{$talentProfile->grade_avg}}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="user_data_container">
                                    <label class="label">Academic Honours/Achievements:</label><br>
                                    <span class="user_data">{!! $talentProfile->academic_achivements !!}</span>
                                </div>

                                @if($talentProfile->sat_verbal != "" || $talentProfile->sat_math != "" || $talentProfile->sat_writing != "" ||
                                    $talentProfile->sat_reading != "" || $talentProfile->sat_overall != "" || $talentProfile->pact != "" ||
                                    $talentProfile->act != "" || $talentProfile->psat != "")
                                    <h4 class="tab_heading">College Admission Test Scores</h4>
                                    <div class="row">
                                        <div class="col-xs-4 col-lg-3">
                                            <div class="user_data_container">
                                                <label class="label">Sat (verbal):</label>
                                                <span class="user_data">{{$talentProfile->sat_verbal}}</span>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-lg-3">
                                            <div class="user_data_container">
                                                <label class="label">Sat (Math):</label>
                                                <span class="user_data">{{$talentProfile->sat_math}}</span>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-lg-3">
                                            <div class="user_data_container">
                                                <label class="label">Sat (Writing):</label>
                                                <span class="user_data">{{$talentProfile->sat_writing}}</span>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-lg-3">
                                            <div class="user_data_container">
                                                <label class="label">Sat (Reading):</label>
                                                <span class="user_data">{{$talentProfile->sat_reading}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-4 col-lg-3">
                                            <div class="user_data_container">
                                                <label class="label">Sat (Overall):</label>
                                                <span class="user_data">{{$talentProfile->sat_overall}}</span>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-lg-3">
                                            <div class="user_data_container">
                                                <label class="label">PACT:</label>
                                                <span class="user_data">{{$talentProfile->pact}}</span>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-lg-3">
                                            <div class="user_data_container">
                                                <label class="label">ACT:</label>
                                                <span class="user_data">{{$talentProfile->act}}</span>
                                            </div>
                                        </div>

                                        <div class="col-xs-4 col-lg-3">
                                            <div class="user_data_container">
                                                <label class="label">PSAT:</label>
                                                <span class="user_data">{{$talentProfile->psat}}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($talentProfile->potential_major_category_1 != "" || $talentProfile->potential_major_category_2 != "" ||
                                    $talentProfile->potential_major_category_3 != "")
                                    <h4 class="tab_heading">College Intentions</h4>
                                    <div class="row">
                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Potential Major (1st Choice:)</label>
                                                <span class="user_data">{{$talentProfile->school_contact_person_email}}</span>
                                            </div>
                                        </div>

                                        @if($talentProfile->potential_major_category_2 != "")
                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Potential Major (2nd Choice:)</label>
                                                <span class="user_data">{{$talentProfile->school_contact_person_email}}</span>
                                            </div>
                                        </div>
                                        @endif

                                        @if($talentProfile->potential_major_category_3 != "")
                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">Potential Major (3rd Choice:)</label>
                                                <span class="user_data">{{$talentProfile->school_contact_person_email}}</span>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <!-- Showing club Information -->
                            <?php
                                $clubCareerInformation = $talentProfile->careerInformation()->where('career_type','=',\talenthub\Repositories\SiteConstants::CAREER_TYPE_CLUB)->get();
                            ?>
                            <div role="tabpanel" class="tab-pane fade" id="club">
                                <h3 class="tab_heading">Club Information
                                    @if($visitingUserId == $talentProfile->user_id)
                                        <a href="{{url('profile/editCV')}}" class="edit_link">Edit</a>
                                    @endif
                                </h3>
                                @foreach($clubCareerInformation as $key=>$club)
                                    <?php
                                        $sportStatistics = $club->careerSportStatistics($talentProfile->sport_type)->get();
                                        $clubReferences = $club->careerReferences;
                                        $club->getMutatedData = false;
                                    ?>

                                    <div class="user_data_container">
                                        <p class="cv_heading">{{$club->club_school_name.", ".$club->club_school_country}}</p>
                                        <p>{{ucfirst($club->club_school_most_played_position) .", Seasons:".$club->club_season_played}}</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">League Name:</label>
                                                <span class="user_data">{{$club->club_league_name}}</span>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-lg-4">
                                            <div class="user_data_container">
                                                <label class="label">League Level:</label>
                                                <span class="user_data">{{$club->club_league_level}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user_data_container">
                                        <label class="label">Club Average League Status:</label>
                                        <span class="user_data">{{$club->club_average_league_status}}</span>
                                    </div>

                                    <div class="user_data_container">
                                        <p><strong>Coach</strong> - {{$club->club_school_coach_name." - ".$club->club_school_coach_email." - ".$club->club_school_coach_mobile_number}}</p>
                                    </div>

                                    <div class="sport_statistics">
                                        <?php
                                            $sport_type=$talentProfile->sport_type;
                                        ?>
                                        <br>
                                        <h4 class="cv_heading">Sport Statistics</h4>
                                        @include('profile.talent.ViewStatistics.getSportCVView',compact('sportStatistics','sport_type'))
                                    </div>

                                    <h4 class="cv_heading">Club References</h4>
                                    <ul>
                                    @foreach($clubReferences as $key => $reference)
                                        <div class="user_data_container">
                                            <li><p>
                                                <strong>{{$reference->name.", ".$reference->occupation}}</strong><br>
                                                {{$reference->email." - ".$reference->contact_number}}<br>
                                                <Strong>Relationship</strong> : {{$reference->relationship}}
                                            </p>
                                            </li>
                                        </div>
                                    @endforeach
                                    </ul>

                                    <br>
                                    <hr>
                                    <br>

                                @endforeach
                            </div>

                            <!-- Showing school Information -->
                            <?php
                            $schoolCareerInformation = $talentProfile->careerInformation()->where('career_type','=',\talenthub\Repositories\SiteConstants::CAREER_TYPE_SCHOOL)->get();
                            ?>
                            <div role="tabpanel" class="tab-pane fade" id="school">
                                <h3 class="tab_heading">School Information
                                    @if($visitingUserId == $talentProfile->user_id)
                                        <a href="{{url('profile/editCV')}}" class="edit_link">Edit</a>
                                    @endif
                                </h3>

                                @foreach($schoolCareerInformation as $key=>$school)
                                    <?php
                                    $sportStatistics = $school->careerSportStatistics($talentProfile->sport_type)->get();
                                    $schoolReferences = $school->careerReferences;
                                    $school->getMutatedData = false;
                                    ?>

                                    <div class="user_data_container">
                                        <p class="cv_heading">{{$school->club_school_name.", ".$school->club_school_country}}<br>{{$school->school_type}}</p>
                                        <p>{{ucfirst($school->club_school_most_played_position)}}</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-6 col-lg-6">
                                            <div class="user_data_container">
                                                <label class="label">Team Reputation:</label>
                                                <span class="user_data">{{$school->school_team_reputation}}</span>
                                            </div>
                                        </div>

                                        <div class="col-xs-6 col-lg-6">
                                            <div class="user_data_container">
                                                <label class="label">Team Side Level:</label>
                                                <span class="user_data">{{$school->school_team_side_level}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="user_data_container">
                                        <p><strong>Coach</strong> - {{$school->club_school_coach_name." - ".$school->club_school_coach_email." - ".$school->club_school_coach_mobile_number}}</p>
                                    </div>

                                    <div class="sport_statistics">
                                        <?php
                                        $sport_type=$talentProfile->sport_type;
                                        ?>
                                        <br>
                                        <h4 class="cv_heading">Sport Statistics</h4>
                                        @include('profile.talent.ViewStatistics.getSportCVView',compact('sportStatistics','sport_type'))
                                    </div>

                                    <h4 class="cv_heading">School References</h4>
                                    <ul>
                                        @foreach($schoolReferences as $key => $reference)
                                            <div class="user_data_container">
                                                <li><p>
                                                        <strong>{{$reference->name.", ".$reference->occupation}}</strong><br>
                                                        {{$reference->email." - ".$reference->contact_number}}<br>
                                                        <Strong>Relationship</strong> : {{$reference->relationship}}
                                                    </p>
                                                </li>
                                            </div>
                                        @endforeach
                                    </ul>

                                    <br>
                                    <hr>
                                    <br>

                                @endforeach
                            </div>

                            <!-- Showing awards Information -->
                            <?php
                                $awards = $talentProfile->awards;
                            ?>

                            <div role="tabpanel" class="tab-pane fade" id="awards">
                                <h3 class="tab_heading">Awards Information</h3>
                                @if(count($awards)>0)
                                    <p>{!! $awards->award_details !!}</p>
                                @else
                                    <p>No awards posted</p>
                                @endif

                            </div>


                            <!-- Showing recommendations Information -->
                            <?php
                                $recommendations = $talentProfile->recommendations;
                            ?>
                                <div role="tabpanel" class="tab-pane fade" id="recommendations">
                                    <h3 class="tab_heading">Recommedations Information</h3>
                                    @if(count($recommendations)>0)
                                        <ul>
                                        @foreach($recommendations as $key=>$recommendation)
                                            <li>
                                                <p><strong>{{$recommendation->name.", ".$recommendation->position." - ".$recommendation->organisation}}</strong></p>
                                                <p>{{$recommendation->email}}</p>

                                                <div class="user_data_container">
                                                    <strong>Athletic Ability</strong>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$recommendation->athletic_ability}}" aria-valuemin="0" aria-valuemax="10" style="width: {{$recommendation->athletic_ability*10}}%">
                                                        </div>
                                                    </div>

                                                    <strong>Leadership Ability</strong>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$recommendation->leadership}}" aria-valuemin="0" aria-valuemax="10" style="width: {{$recommendation->leadership*10}}%">
                                                        </div>
                                                    </div>

                                                    <strong>Team player</strong>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$recommendation->team_player}}" aria-valuemin="0" aria-valuemax="10" style="width: {{$recommendation->team_player*10}}%">
                                                        </div>
                                                    </div>

                                                    <strong>Easy to work</strong>
                                                    <div class="progress">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$recommendation->easy_to_work}}" aria-valuemin="0" aria-valuemax="10" style="width: {{$recommendation->easy_to_work*10}}%">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="user_data_container">
                                                    <strong>Comment on Athletic Ability</strong>
                                                    <p>{{$recommendation->comment_athletic_ability}}</p>
                                                </div>
                                                <div class="user_data_container">
                                                    <strong>Comment on Player Ability</strong>
                                                    <p>{{$recommendation->comment_player_personality}}</p>
                                                </div>
                                            </li>
                                        @endforeach
                                        </ul>
                                        @else
                                        <p>No recommendations requested.
                                            @if($visitingUserId == $talentProfile->user_id)
                                                <a href="{{url('request-recommendation')}}">Request Recommendation</a>
                                            @endif
                                        </p>
                                    @endif
                                </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@stop