@extends('app')

@section('content')

    <div ng-app="edit-profile">
        <div class="container edit-profile" ng-controller="tabController as tab">

            <div class="row">
                <div class="col-xs-12 col-lg-3">
                    @include("templates.menu.left_menu_edit_profile")
                </div>
                <div class="col-xs-12 col-lg-9">
                    <ul class="nav nav-tabs">
                        <li ng-class="{active:tab.isTabClicked(1)}"><a href ng-click="tab.tabClicked(1)" >Personal Info</a></li>
                        @if(Session::get("user_type")!=101)
                            <li ng-class="{active:tab.isTabClicked(2)}"><a href ng-click="tab.tabClicked(2)" >Parent(s) Info</a></li>
                            <li ng-class="{active:tab.isTabClicked(3)}"><a href ng-click="tab.tabClicked(3)" >Guardian Info</a></li>
                            <li ng-class="{active:tab.isTabClicked(4)}"><a href ng-click="tab.tabClicked(4)" >Academic Info</a></li>
                            <li ng-class="{active:tab.isTabClicked(5)}"><a href ng-click="tab.tabClicked(5)" >Academic Achievements and Aspirations</a></li>
                        @endif
                    </ul>
                    <div class="row">
                        {!! Form::model($userProfile,['method'=>'PUT','url'=>'profile/edit/'.Session::get('user_id'),'novalidate','name'=>'user_profile']) !!}
                        <div class="col-xs-12 col-lg-12 ">
                            <h1>Personal Information</h1>
                            @include("errors.error_raw_list")
                            <div ng-show="tab.isTabClicked(1)" class="tab_panel">
                                <div class="row form_container">
                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('first_name','First Name:') !!}
                                            {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('middle_name','Middle Name:') !!}
                                            {!! Form::text('middle_name',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('last_name','Last Name:') !!}
                                            {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row form_container">
                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('dob','Date of Birth:') !!}
                                            {!! Form::input('text','dob',null,['class'=>'form-control datepicker','data-validate'=>'date',
                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Date should be in "DD-MM-YYYY" format']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('gender','Gender:') !!}
                                            {!! Form::select('gender',$gender,null,['class'=>'form-control','data-validate'=>'select','data-invalid-value'=>'',
                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group">
                                            {!! Form::label('height','Height:') !!}
                                            {!! Form::input('text','height',null,['class'=>'form-control','data-validate'=>'number',
                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter numeric value']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-2">
                                        <div class="form-group">
                                            {!! Form::label('weight','Weight:') !!}
                                            {!! Form::input('text','weight',null,['class'=>'form-control','data-validate'=>'number',
                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter numeric value']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row form_container">
                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('nationality','Nationality:') !!}
                                            {!! Form::text('nationality',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('mobile_number','Mobile Number:') !!}
                                            {!! Form::input('text','mobile_number',null,['class'=>'form-control','max'=>'12',
                                            'data-validate'=>'phoneNumber','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter numeric value']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('home_number','Home Number:') !!}
                                            {!! Form::text('home_number',null,['class'=>'form-control','data-validate'=>'phoneNumber',
                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter numeric value']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row form_container">
                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('address_type','Address Type:') !!}
                                            {!! Form::select('address_type',$addressType,null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('street_address','Street Address:') !!}
                                            {!! Form::text('street_address',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('state_province','State/Province:') !!}
                                            {!! Form::text('state_province',null,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row form_container">
                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('zip','Zip:') !!}
                                            {!! Form::text('zip',null,['class'=>'form-control','data-validate'=>'zip',
                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter zip correctly.']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('country','Country:') !!}
                                            {!! Form::select('country',$country,null,['class'=>'form-control','data-validate'=>'select',
                                            'data-invalid-value'=>'','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                            'title'=>'Select proper option from the list provided.']) !!}
                                        </div>
                                    </div>

                                </div>

                                @if(Session::get("user_type")!=101)
                                    <div class="row form_container">
                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('graduation_year','Graduation Year:') !!}
                                                {!! Form::text('graduation_year',null,['class'=>'form-control','data-validate'=>'year',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter year in correct format "YYYY".']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('graduating_from','Graduating From:') !!}
                                                {!! Form::select('graduating_from',$instituteType,null,['class'=>'form-control',
                                                'data-validate'=>'select','data-invalid-value'=>'','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                'title'=>'Select proper option from the list provided.']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('ncaa','NCAA Clearning ID:') !!}
                                                {!! Form::text('ncaa',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                    </div>
                                @endif


                            </div>

                            @if(Session::get("user_type")!=101)
                                <div ng-show="tab.isTabClicked(2)" class="tab_panel">
                                    <div class="row form_container">
                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('father_name','Father Name:') !!}
                                                {!! Form::text('father_name',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('father_occupation','Father Occupation:') !!}
                                                {!! Form::text('father_occupation',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('father_email','Father Email:') !!}
                                                {!! Form::text('father_email',null,['class'=>'form-control','data-validate'=>'email',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter email in correct format.']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row form_container">
                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('father_mobile_number','Father Mobile Number:') !!}
                                                {!! Form::text('father_mobile_number',null,['class'=>'form-control','data-validate'=>'phoneNumber',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter correct mobile number.']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('father_alumni','Father Alumni:') !!}
                                                {!! Form::text('father_alumni',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('father_living_with','Father Living With:') !!}
                                                {!! Form::select('father_living_with',$livingWith,null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row form_container">
                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('mother_name','Mother Name:') !!}
                                                {!! Form::text('mother_name',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('mother_occupation','Mother Occupation:') !!}
                                                {!! Form::text('mother_occupation',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('mother_email','Mother Email:') !!}
                                                {!! Form::text('mother_email',null,['class'=>'form-control','data-validate'=>'email',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter email in correct format.']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row form_container">
                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('mother_mobile_number','Mother Mobile Number:') !!}
                                                {!! Form::text('mother_mobile_number',null,['class'=>'form-control','data-validate'=>'phoneNumber',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter correct mobile number.']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('mother_alumni','Mother Alumni:') !!}
                                                {!! Form::text('mother_alumni',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('mother_living_with','Mother Living With:') !!}
                                                {!! Form::select('mother_living_with',$livingWith,null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div ng-show="tab.isTabClicked(3)" class="tab_panel">
                                    <div class="row form_container">
                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('guardian_name','Guardian Name:') !!}
                                                {!! Form::text('guardian_name',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('guardian_occupation','Guardian Occupation:') !!}
                                                {!! Form::text('guardian_occupation',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('guardian_email','Guardian Email:') !!}
                                                {!! Form::text('guardian_email',null,['class'=>'form-control','data-validate'=>'email',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter email in correct format.']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row form_container">
                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('guardian_mobile_number','Guardian Mobile Number:') !!}
                                                {!! Form::text('guardian_mobile_number',null,['class'=>'form-control','data-validate'=>'phoneNumber',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter correct mobile number.']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('guardian_alumni','Guardian Alumni:') !!}
                                                {!! Form::text('guardian_alumni',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('guardian_living_with','Guardian Living With:') !!}
                                                {!! Form::select('guardian_living_with',$livingWith,null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div ng-show="tab.isTabClicked(4)" class="tab_panel">

                                    <div class="row form_container">
                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('school_type','School Type:') !!}
                                                {!! Form::select('school_type',$instituteType,null,['class'=>'form-control',
                                                'data-validate'=>'select','data-invalid-value'=>'','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                'title'=>'Select proper option from the list provided.']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('school_name','School Name:') !!}
                                                {!! Form::text('school_name',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row form_container">

                                        <div class="col-xs-12 col-lg-3">
                                            <div class="form-group">
                                                {!! Form::label('school_address','School Address:') !!}
                                                {!! Form::text('school_address',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-3">
                                            <div class="form-group">
                                                {!! Form::label('school_city','School City:') !!}
                                                {!! Form::text('school_city',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-3">
                                            <div class="form-group">
                                                {!! Form::label('school_state_province','School State Province:') !!}
                                                {!! Form::text('school_state_province',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-3">
                                            <div class="form-group">
                                                {!! Form::label('school_zip','School Zip Code:') !!}
                                                {!! Form::text('school_zip',null,['class'=>'form-control','data-validate'=>'zip',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter zip correctly.']) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row form_container">
                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('school_country','School Country:') !!}
                                                {!! Form::select('school_country',$country,null,['class'=>'form-control',
                                                'data-validate'=>'select','data-invalid-value'=>'','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                'title'=>'Select proper option from the list provided.']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row form_container">

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('school_contact_person_name','School Contact Person Name:') !!}
                                                {!! Form::text('school_contact_person_name',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('school_contact_person_email','School Contact Person Email:') !!}
                                                {!! Form::text('school_contact_person_email',null,['class'=>'form-control','data-validate'=>'email',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter email correctly.']) !!}
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('school_contact_person_phone','School Contact Person Phone:') !!}
                                                {!! Form::text('school_contact_person_phone',null,['class'=>'form-control','data-validate'=>'phoneNumber',
                                                'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter contact number correctly.']) !!}
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div ng-show="tab.isTabClicked(5)" class="tab_panel">

                                    <div class="row form_container">

                                        <div class="col-xs-12 col-lg-4">
                                            <div class="form-group">
                                                {!! Form::label('grade_avg','Current Grade Average:') !!}
                                                {!! Form::select('grade_avg',$gradeAverage,null,['class'=>'form-control',
                                                'data-validate'=>'select','data-invalid-value'=>'','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                'title'=>'Select proper option from the list provided.']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row form_container">

                                        <div class="col-xs-12 col-lg-12">
                                            <div class="form-group">
                                                {!! Form::label('academic_achivements','List any Academic Honours/Achievements:') !!}
                                                {!! Form::textarea('academic_achivements',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="collapse-content">
                                        <h1 class="">College Admission Test Scores</h1>
                                        <div class="collapsed-content">
                                            <div class="row form_container">

                                                <div class="col-xs-12 col-lg-2">
                                                    <div class="form-group">
                                                        {!! Form::label('sat_verbal','Sat (verbal):') !!}
                                                        {!! Form::text('sat_verbal',null,['class'=>'form-control',
                                                        'data-validate'=>'numberDecimal','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                        'title'=>'Enter score in proper numeric format.']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-lg-2">
                                                    <div class="form-group">
                                                        {!! Form::label('sat_math','Sat (Math):') !!}
                                                        {!! Form::text('sat_math',null,['class'=>'form-control',
                                                        'data-validate'=>'numberDecimal','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                        'title'=>'Enter score in proper numeric format.']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-lg-2">
                                                    <div class="form-group">
                                                        {!! Form::label('sat_writing','Sat (Writing):') !!}
                                                        {!! Form::text('sat_writing',null,['class'=>'form-control',
                                                        'data-validate'=>'numberDecimal','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                        'title'=>'Enter score in proper numeric format.']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-lg-2">
                                                    <div class="form-group">
                                                        {!! Form::label('sat_reading','Sat (Reading):') !!}
                                                        {!! Form::text('sat_reading',null,['class'=>'form-control',
                                                        'data-validate'=>'numberDecimal','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                        'title'=>'Enter score in proper numeric format.']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-lg-2">
                                                    <div class="form-group">
                                                        {!! Form::label('sat_overall','Sat (Overall):') !!}
                                                        {!! Form::text('sat_overall',null,['class'=>'form-control',
                                                        'data-validate'=>'numberDecimal','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                        'title'=>'Enter score in proper numeric format.']) !!}
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row form_container">

                                                <div class="col-xs-12 col-lg-2">
                                                    <div class="form-group">
                                                        {!! Form::label('pact','PACT:') !!}
                                                        {!! Form::text('pact',null,['class'=>'form-control',
                                                        'data-validate'=>'numberDecimal','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                        'title'=>'Enter score in proper numeric format.']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-lg-2">
                                                    <div class="form-group">
                                                        {!! Form::label('act','ACT:') !!}
                                                        {!! Form::text('act',null,['class'=>'form-control',
                                                        'data-validate'=>'numberDecimal','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                        'title'=>'Enter score in proper numeric format.']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-2">
                                                    <div class="form-group">
                                                        {!! Form::label('psat','PSAT:') !!}
                                                        {!! Form::text('psat',null,['class'=>'form-control',
                                                        'data-validate'=>'numberDecimal','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                        'title'=>'Enter score in proper numeric format.']) !!}
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>


                                    <div class="collapse-content">
                                        <h1 class="">College Intentions</h1>
                                        <div class="collapsed-content">
                                            <div class="row form_container">

                                                <div class="col-xs-12 col-lg-4">
                                                    <div class="form-group">
                                                        {!! Form::label('potential_major_category_1','Potential Major (1st Choice:)') !!}
                                                        {!! Form::text('potential_major_category_1',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-lg-4">
                                                    <div class="form-group">
                                                        {!! Form::label('potential_major_category_2','Potential Major (2nd Choice:)') !!}
                                                        {!! Form::text('potential_major_category_2',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-lg-4">
                                                    <div class="form-group">
                                                        {!! Form::label('potential_major_category_3','Potential Major (3rd Choice:)') !!}
                                                        {!! Form::text('potential_major_category_3',null,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>



                                </div>
                            @endif


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


@stop