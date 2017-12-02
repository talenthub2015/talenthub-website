@extends('emails.base_structure_internal_team')

@section('content')

    <p>Hello Team,</p>

    <p>A user is asking for help. Below are the details.</p>

    <p>
        Name: {{$user["first_name"] . " " . $user["last_name"]}}
        Username/Email: {{$user["username"]}}}<br/>
    </p>

    <p><strong>Question Asked:</strong><br/>
        {{$helpCenter["query"]}}
    </p>

    <p>Regards,<br>Talenthub Team</p>

@stop