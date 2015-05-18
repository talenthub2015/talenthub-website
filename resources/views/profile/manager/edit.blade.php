@extends('app')

@section('content')

    <div ng-app="edit-profile">
        <div class="container edit-profile">

            <div class="row">
                {!! Form::model($managerProfile,['method'=>'PUT','url'=>'profile/'.Session::get('user_id'),'novalidate','name'=>'user_profile']) !!}
                <div class="col-xs-12 col-lg-3">
                    @include("templates.menu.left_menu_edit_profile")
                </div>
                <div class="col-xs-12 col-lg-9 ">
                    <h1>Personal Information</h1>
                    @include("errors.error_raw_list")

                    <div class="tab_panel">
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
                                    {!! Form::input('date','dob',null,['class'=>'form-control','data-validate'=>'date',
                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Date should be in "DD-MM-YYYY" format']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('gender','Gender:') !!}
                                    {!! Form::select('gender',$gender,null,['class'=>'form-control','data-validate'=>'select','data-invalidValue'=>'0',
                                    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select proper option from the list provided.']) !!}
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
                                    {!! Form::input('text','mobile_number',null,['class'=>'form-control',
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
                                    'data-invalidValue'=>'0','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                    'title'=>'Select proper option from the list provided.']) !!}
                                </div>
                            </div>

                        </div>

                        <h1>Academic History</h1>

                        <div class="row form_container">
                            <div class="col-xs-12 col-lg-4">
                                <div class="form-group">
                                    {!! Form::label('manager','Graduation Year:') !!}
                                    {!! Form::text('graduation_year',null,['class'=>'form-control','data-validate'=>'year',
                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Enter year in correct format "YYYY".']) !!}
                                </div>
                            </div>
                        </div>


                        <h1>Career History</h1>
                        <?php

                            $manager_career_information = $managerProfile->managerCareerInformation;

                            if(count($manager_career_information)==0)
                                {
                                    $manager_career_information[0]=new \talenthub\ManagerCareerInformation();
                                }
                        ?>

                        <div class="duplicate_content_container">

                            <div class="duplicate_this_content manager_career_history_information">
                                <div class="row form_container">
                                    <div class="col-xs-12 col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('company[]','Company:') !!}
                                            {!! Form::text('company[]',$manager_career_information[0]->company,['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('industry[]','Industry:') !!}
                                            {!! Form::text('industry[]',$manager_career_information[0]->industry,['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('position_held[]','Industry:') !!}
                                            {!! Form::text('position_held[]',$manager_career_information[0]->position_held,['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-lg-3">
                                        <div class="form-group">
                                            {!! Form::label('career_country[]','Country:') !!}
                                            {!! Form::select('career_country[]',$country, $manager_career_information[0]->career_country,
                                            ['class'=>'form-control','data-validate'=>'select',
                                            'data-invalidValue'=>'0','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                            'title'=>'Select proper option from the list provided.']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row form_container">
                                    <div class="col-xs-12 col-lg-12">
                                        <div class="form-group">
                                            {!! Form::label('duties[]','Duties:') !!}
                                            {!! Form::textarea('duties[]',$manager_career_information[0]->duties,['class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                </div>

                                <div class="row form_container">
                                    <div class="col-xs-12 col-lg-4">
                                        <div class="form-group">
                                            {!! Form::label('from_date[]','From Date:') !!}
                                            {!! Form::input('date','from_date[]',null,['class'=>'form-control','data-validate'=>'date',
                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Date should be in "DD-MM-YYYY" format']) !!}
                                        </div>


                                    </div>
                                    <div class="col-xs-12 col-lg-4 ">
                                        <div class="form-group">
                                            {!! Form::label('to_date[]','From Date:') !!}
                                            {!! Form::input('date','to_date[]',null,['class'=>'form-control','data-validate'=>'date',
                                            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Date should be in "DD-MM-YYYY" format']) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="place_duplicate_content_here manager_career_history_information_duplicated">

                                <?php
                                    if(count($manager_career_information)>1)
                                    {
                                        for($i=1;$i<count($manager_career_information);$i++)
                                        {
                                        ?>
                                        <div class="content_duplicated">
                                            <div class="row form_container">
                                                <div class="col-xs-12 col-lg-3">
                                                    <div class="form-group">
                                                        {!! Form::label('company[]','Company:') !!}
                                                        {!! Form::text('company[]',$manager_career_information[$i]->company,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-lg-3">
                                                    <div class="form-group">
                                                        {!! Form::label('industry[]','Industry:') !!}
                                                        {!! Form::text('industry[]',$manager_career_information[$i]->industry,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-lg-3">
                                                    <div class="form-group">
                                                        {!! Form::label('position_held[]','Industry:') !!}
                                                        {!! Form::text('position_held[]',$manager_career_information[$i]->position_held,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-lg-3">
                                                    <div class="form-group">
                                                        {!! Form::label('career_country[]','Country:') !!}
                                                        {!! Form::select('career_country[]',$country, $manager_career_information[$i]->career_country,
                                                        ['class'=>'form-control','data-validate'=>'select',
                                                        'data-invalidValue'=>'0','data-toggle'=>'tooltip','data-placement'=>'bottom',
                                                        'title'=>'Select proper option from the list provided.']) !!}
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row form_container">
                                                <div class="col-xs-12 col-lg-12">
                                                    <div class="form-group">
                                                        {!! Form::label('duties[]','Duties:') !!}
                                                        {!! Form::textarea('duties[]',$manager_career_information[$i]->duties,['class'=>'form-control']) !!}
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row form_container">
                                                <div class="col-xs-12 col-lg-4">
                                                    <div class="form-group">
                                                        {!! Form::label('from_date[]','From Date:') !!}
                                                        {!! Form::input('date','from_date[]',null,['class'=>'form-control','data-validate'=>'date',
                                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Date should be in "DD-MM-YYYY" format']) !!}
                                                    </div>


                                                </div>
                                                <div class="col-xs-12 col-lg-4 ">
                                                    <div class="form-group">
                                                        {!! Form::label('to_date[]','From Date:') !!}
                                                        {!! Form::input('date','to_date[]',null,['class'=>'form-control','data-validate'=>'date',
                                                        'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Date should be in "DD-MM-YYYY" format']) !!}
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

                            <div class="col-xs-12 col-lg-4 col-lg-offset-4">
                                <button class="duplicate_content_button btn form-control t-button"
                                        data-target-duplicate-content=".manager_career_history_information"
                                        data-place-duplicate-content=".manager_career_history_information_duplicated">Add Career History</button>
                            </div>

                        </div>

                    </div>


                    <div class="row form_container">
                        <div class="col-xs-12">
                            {!! Form::label('manager_additional_information','Duties:') !!}
                            {!! Form::textarea('manager_additional_information',null,['class'=>'form-control']) !!}
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


@stop