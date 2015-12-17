@extends('emails.base_structure')

@section('content')

    <p>Hello Team,</p>

    <p>A new user registered on Talenthub. You can review his/her profile, using below link.</p>

    <p>{{url('external/profile/'.$data->user_id)}}</p>

    <h4>User Profile:</h4>
    <p>Name : {{$data->first_name." ".$data->last_name}}<br>
        Email : {{$data->username}}<br>

    </p>


    <p>Regards,<br>Talenthub Team</p>

@stop