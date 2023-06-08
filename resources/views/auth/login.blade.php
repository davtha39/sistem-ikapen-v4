@extends('layouts.app')

@section('content')

<section class="login-page">
    <div class="login-box">
        <div class="card">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a href="{{url('/')}}" class="h1"><b>SIKAP</b></a>
                </div>
            </div>
            <div class="card card-outline card-body">   
                @if ($message = Session::get('succes'))
                    <div class="alert alert-success" role="alert">
                        <p>{{$message}}</p>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                          </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                    </div>
                    <div class="icheck-primary">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">
                          Remember Me
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-8">    
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link login-box-msg" href="{{ route('password.request') }}">
                                        {{ __('Lupa Password?') }}
                                    </a>
                                @endif
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>                                
                </form>
            </div>

        </div>

    </div>
</body>
@endsection
