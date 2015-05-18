<?php

?>

{!! Form::hidden('user_type',$user) !!}
<div class="form-group">
    {!! Form::label('username',"Email:") !!}
    {!! Form::text('username',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password',"Password:") !!}
    {!! Form::password('password',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password_confirmation',"Confirm Password:") !!}
    {!! Form::password('password_confirmation',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('sport_type',"Sports:") !!}
    {!! Form::select('sport_type',$sport_types) !!}
</div>

@if($user == "talent")
    <div class="form-group">
        {!! Form::label('talent_type',"Talent Type:") !!}
        {!! Form::select('talent_type',['0'=>'-- Select Option --','1'=>'Student','2'=>'Aspiring Professional'],['class'=>'form-control']) !!}
    </div>
@endif

@if($user == "manager")
<div class="form-group">
    {!! Form::label('managerType',"Manager Type:") !!}
    {!! Form::select('managerType',['1'=>'Coach','2'=>'Agent','3'=>'Scout'],['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('managementLevel',"Management Level:") !!}
    {!! Form::select('managementLevel',array_map("ucfirst",$userManagerManagementLevel),['class'=>'form-control']) !!}
</div>
@endif


<div class="form-group">
    {!! Form::submit('Create a Free Profile',['class'=>'form-control']) !!}
</div>