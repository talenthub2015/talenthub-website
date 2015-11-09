@extends("emails.base_structure")

@section('content')
        <p>Hello {{$data["manager"]->coach_name}},</p>

        {{--<p>{{$data["talent"]->first_name." ".$data["talent"]->last_name}} who is a {{$data["talent"]->sport_type}} player, wants to introduce to you.</p>--}}

        {{--<p>Please view the profile of this sports person by clicking <a href="{{url('external/profile/'.$data["talent"]->user_id)}}">here</a> or use below link.</p>--}}

        {{--<p>{{url('external/profile/'.$data["talent"]->user_id)}}</p>--}}

        {{--<p>Regards,<br>Talenthub Team</p>--}}
        <p>You have received a message from {{$data["talent"]->first_name." ".$data["talent"]->last_name}}.</p>
        <p style="padding:15px 20px;"><i>{!! nl2br($data["message"]) !!}</i></p>

        <br>

        <p>Please view the profile of this sports person by clicking <a href="{{url('external/profile/'.$data["talent"]->user_id)}}">here</a> or use below link.</p>

        <p>{{url('external/profile/'.$data["talent"]->user_id)}}</p>

        <p>Regards,<br>Talenthub Team</p>

@stop