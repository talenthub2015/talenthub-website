@extends('app')

@section('content')

    <div>
        <div class="container edit-profile">
            <br><br>
            <br><br>
            <div class="row">
                <div class="col-xs-12 col-lg-8 col-lg-offset-2 alert alert-info">

                    <h3>Hi, thank you for your interest in Talenthub. Our site is currently under construction and so you will not be able to register at this moment.</h3>

                    <h3>We will keep your email address and notify you when we are ready for managers of talent to register.</h3>

                    <p class="text-center"><a href="{{url('auth/logout')}}"><button class="t-button">Cool, Let me know</button></a></p>

                </div>
            </div>

        </div>
    </div>