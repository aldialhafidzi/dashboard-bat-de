@extends('auth.layout')
@section('content')

<div class="login-form">
     <form method="POST" action="{{ route('password.email') }}">
        @csrf
            <div class="form-group">
                <label style="text-transform: none;">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                                
            </div>
            
            <button type="submit" class="btn btn-primary btn-flat m-b-15">Send Password Reset Link</button>
    </form>
</div>
@endsection

