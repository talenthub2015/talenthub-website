@extends('emails.base_structure')

@section('content')

    <div class="banner_image_container">
        <img src="{{asset('images/email_banner_img.jpg')}}" class="banner_image">
    </div>

    <p>Hello {{$data["recommendation"]->name}},</p>

    <p>Hope you are doing well.</p>

    <p><strong>{{$data["userProfile"]->first_name." ".$data["userProfile"]->last_name}}</strong> has requested you to provide a recommendation.</p>

    <p>Please provide a recommendation for <strong>{{$data["userProfile"]->first_name." ".$data["userProfile"]->last_name}}</strong> by clicking on below link.</p>

    <p><a href="{{url('external/user/recommendation/'.$data["userProfile"]->user_id.'/'.$data["recommendation"]->recommendation_id.'/'.$data["recommendation"]->name)}}">{{url('external/user/recommendation/'.$data["userProfile"]->user_id.'/'.$data["recommendation"]->recommendation_id.'/'.$data["recommendation"]->name)}}</a></p>

    <p>Regards,<br>Talenthub Team</p>

@stop