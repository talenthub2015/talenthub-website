<?php

?>

{!! Form::hidden('user_type',$user) !!}
<div class="form-group">
    {!! Form::label('username',"Email:") !!}
    {!! Form::text('username',null,['class'=>'form-control','data-validate'=>'require|email',
    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Please provide a valid email']) !!}
</div>

<div class="form-group">
    {!! Form::label('password',"Password:") !!}
    {!! Form::input('password','password',null,['class'=>'form-control','data-validate'=>'require',
    'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Please provide a valid email']) !!}
</div>

<div class="form-group">
    {!! Form::label('password_confirmation',"Confirm Password:") !!}
    {!! Form::input('password','password_confirmation',null,['class'=>'form-control','data-validate'=>'require|confirmPassword',
    'data-password-field'=>'password','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Please confirm your password correctly']) !!}
</div>

<div class="form-group">
    {!! Form::label('sport_type',"Sports:") !!}
    {!! Form::select('sport_type',$sport_types,null,['class'=>'form-control','data-validate'=>'require|select',
    'data-invalid-value'=>'0','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select a valid option']) !!}
</div>

@if($user == "talent")
    <div class="form-group">
        {!! Form::label('talent_type',"Talent Type:") !!}
        {!! Form::select('talent_type',['0'=>'-- Select Option --','1'=>'Student','2'=>'Aspiring Professional'],null,
        ['class'=>'form-control','data-validate'=>'require|select','data-invalid-value'=>'0','data-toggle'=>'tooltip','data-placement'=>'bottom',
        'title'=>'Select a valid option']) !!}
    </div>
@endif

@if($user == "manager")
<div class="form-group">
    {!! Form::label('managerType',"Manager Type:") !!}
    {!! Form::select('managerType',['0'=>'-- Select Option --','1'=>'Coach','2'=>'Agent','3'=>'Scout'],null,['class'=>'form-control',
    'data-validate'=>'require|select','data-invalid-value'=>'0','data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Select a valid option']) !!}
</div>
<div class="form-group">
    {!! Form::label('managementLevel',"Management Level:") !!}
    {!! Form::select('managementLevel',array_map("ucfirst",$userManagerManagementLevel),null,['class'=>'form-control',
    'data-validate'=>'require|select','data-toggle'=>'tooltip','data-placement'=>'bottom',
    'title'=>'Select a valid option']) !!}
</div>
@endif


<div class="form-group">
    {!! Form::submit('Create a Free Profile',['class'=>'form-control t-button']) !!}
</div>