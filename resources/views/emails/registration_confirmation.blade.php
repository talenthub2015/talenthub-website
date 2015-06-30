@extends('emails.base_structure')

@section('content')

        <p>Hello {{$data->first_name}},</p>

        <p>Thanks for registering to Talenthub. You can activate your profile by clicking on below link.</p>

        <p>{{url('auth/confirm-account/'.$data->user_id."?token=".$data->confirmation_token)}}</p>

        <p>Regards,<br>Talenthub Team</p>

@stop