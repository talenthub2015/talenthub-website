@extends('app')

@section('content')

    <div class="miscellaneous_content">
        <div class="container">
            @if(Session::has("resent_confirmation_link"))
                <p class="alert alert-success">Emailed you the confirmation link. Please check your email.</p>
            @endif
            <div class="alert alert-warning">
                <h1>Account Not Confirmed</h1>
                <p>Please confirm your account in order to use all available features of Talenthub.</p>
                <p><a href="{{url('resend-confirmation-link')}}">Resend Confirmation Link</a></p>
            </div>
        </div>
    </div>

@stop