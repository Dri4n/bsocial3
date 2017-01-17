@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="css/signup.css" type="text/css" media="screen" />
@endsection

@section('content')

<div class="container" style="margin-top:5%;">

    <div class="login-wrapper">
        <div class="box">
            <div class="content-wrap">
                <h6>Sign Up</h6>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <!-- TODO : MAXLENGHT -->
                    <input type="hidden" name="campus_id" value="1">
                    <input type="text" class="form-control" type="text" name="first_name" placeholder="last name..." value="{{ old('first_name') }}"/>
                    <input type="text" class="form-control" type="text" name="last_name" placeholder="first name..." value="{{ old('last_name') }}"/>
                    <input class="form-control" name="name" type="text" placeholder="User name"
                    value="{{ old('name') }}">
                    <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    <input class="form-control" name="password" type="password" placeholder="Password"
                    value={{ old('password') }}>
                    <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password">
                    <div class="action">
                        <button type="submit" class="btn-glow primary signup">Sign up</a>
                    </div>   
                </form>   
            </div>
        </div>

        
        <div class="already">
            <p>Already have an account?</p>
            <a href="{{url('/login')}}">Sign in</a>
        </div>

{{--         <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>
        </form> --}}
    </div>
    </div>
</div>
@endsection
