@extends('auth.layout')
@section('content')

<div class="login-form">
  <form method="POST" action="{{ route('login') }}">
    @csrf

    <div class="form-group">
      <label style="text-transform: none;">Email</label>
      <input id="email" type="email" placeholder="Please insert your email here" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
      <label style="text-transform: none;">Password</label>
      <input id="password" type="password" placeholder="Please insert your password here" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    
    <div class="checkbox">
      <label >
        <input type="checkbox" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
        Remember Me
      </label>
    </div>
  
    <div style="padding-top:40px; padding-bottom: 20px;">
      <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Sign in</button>
    </div>
    
    <div class="form-group text-center">
      @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">Forgot Password ?</a>
      @endif
    </div>
    
    <div class="register-link m-t-15 text-center">
      <p>Don't have account ? <a class="small" href="{{ url('/register')}}">Create an Account!</a> 
    </div>
  </form>
</div>
@endsection
