
<div class="form-group">
    {!! Form::label('username',"Email:") !!}
    {!! Form::text('username',null,['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password',"Password:") !!}
    {!! Form::password('password',null,['class'=>'form-control']) !!}
</div>
<div>
    <label>
        <input type="checkbox" name="remember"> Remember Me
    </label>
</div>


<div class="form-group">
    {!! Form::submit('Sign In',['class'=>'form-control']) !!}
    <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
</div>