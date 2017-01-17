@extends('layouts.app')

@section('head')
      <link rel="stylesheet" href="css/signin.css" type="text/css" media="screen" />
@endsection

@section('content')
    <div class="container">
          <div class="login-wrapper">
                <a href="index.html">
                    <img class="logo" src="img/logo-white.png" alt="logo" />
                </a>

                <div class="box">
                    <div class="content-wrap">
                        <h6>Log in</h6>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="E-mail address" required>
                            <input class="form-control" type="password" name="password" value="{{ old('password') }}" placeholder="Your password"
                            required>
                        
                            @if($errors->has('email'))
                                <strong class="has-error btn-block">{{ $errors->first('email') }}</strong>
                            @endif
                            
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                Forgot Your Password?
                            </a>      
                            <div class="remember">
                                <input id="remember-me" name="remember" type="checkbox"  {{ old('remember') ? 'checked' : ''}}>
                                <label for="remember-me">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary login">
                                Login
                            </button>
                        </form>

                       {{ var_dump($errors)}}
                    </div>
                </div>
                
                <div class="no-account">
                    <p>Don't have an account?</p>
                    <a href="{{ url('/register') }}">Sign up</a>
                </div>

          </div>
    </div>
@endsection

@section('scripts')
   <script type="text/javascript">
        $("html").css("background-image", "url('img/bgs/7.jpg')");
   </script>
@endsection

