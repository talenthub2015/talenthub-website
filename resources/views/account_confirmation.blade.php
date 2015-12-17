@extends('app')

@section('content')

    <div class="miscellaneous_content">
        <div class="container">
            @if($account_confirmation)
                <div class="alert alert-success">
                    <h1>Confirmed</h1>
                    Your account is successfully confirmed.
                </div>
            @endif

            @if(!$account_confirmation)
                <div class="alert alert-danger">
                <h1>Token Mis-match</h1>
                Your account cannot be confirmed because confirmation token doesn't match records.
                </div>
            @endif
        </div>
    </div>

@stop