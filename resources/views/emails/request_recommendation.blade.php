@extends('emails.base_structure')

@section('content')

    <p>Hello {{$data["recommendation"]->name}},</p>

    <p>Hope you are doing well.</p>

    <p><strong>{{$data["userProfile"]->first_name." ".$data["userProfile"]->last_name}}</strong> has requested you to provide a recommendation.</p>

    <p>Please provide a recommendation for <strong>{{$data["userProfile"]->first_name." ".$data["userProfile"]->last_name}}</strong> by clicking on below link.</p>

    <p><a href="{{url('external/user/recommendation/'.$data["userProfile"]->user_id.'/'.$data["recommendation"]->recommendation_id.'/'.$data["recommendation"]->name)}}">{{url('user/recommendation/'.$data["userProfile"]->user_id.'/'.$data["recommendation"]->recommendation_id.'/'.$data["recommendation"]->name)}}</a></p>

    <p>Regards,<br>Talenthub Team</p>

@stop