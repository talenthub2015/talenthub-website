@extends('emails.base_structure')

@section('content')

    <div class="banner_image_container">
        <img src="{{asset('images/email_banner_img.jpg')}}" class="banner_image">
    </div>

        <p>Hello {{$data->first_name}},</p>

        <p>Thanks for registering to Talenthub. You can activate your profile by clicking on below link.</p>

        <p><a href="{{url('auth/confirm-account/'.$data->user_id."?token=".$data->confirmation_token)}}">{{url('auth/confirm-account/'.$data->user_id."?token=".$data->confirmation_token)}}</a></p>

        <p>If above link does not work, please copy and paste the link in your browser window.</p>

        <p>Regards,<br>Talenthub Team</p>

@stop