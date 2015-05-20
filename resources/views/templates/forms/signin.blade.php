<div class="row">
    <div class="col-xs-12 col-lg-4">
        <div class="form-group">
            {!! Form::label('username',"Email/Username:") !!}
            {!! Form::text('username',null,['class'=>'form-control','data-validate'=>'require|email',
            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Please provide a valid email']) !!}
            <div class="text-left">
                New to Talenthub? <a href="{{url('sign_up')}}">Join Now</a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-lg-4">
        <div class="form-group">
            {!! Form::label('password',"Password:") !!}
            {!! Form::input('password','password',null,['class'=>'form-control','data-validate'=>'require',
            'data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Please provide password']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-lg-4">
        <div class="row">
            <div class="col-xs-6 col-lg-6">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
            <div class="col-xs-6 col-lg-6 forget_div">
                <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
            </div>
        </div>

        <div class="form-group">
            {!! Form::submit('Sign In',['class'=>'form-control t-button']) !!}

        </div>
    </div>
</div>
