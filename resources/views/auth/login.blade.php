@extends('layouts.app')

@section('content')
<section class="hero is-fullheight is-light">
    <div class="hero-body">
        <div class="container">
            <center>
                <div class="box" style="width: 500px">
                    <h3 class="title is-3">Login</h3>
                    <br>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input id="email" type="email" class="input is-rounded is-medium{{ $errors->has('email') ? ' is-danger' : '' }}" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autofocus>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                @if ($errors->has('email'))
                                    <p class="help is-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </p>
                                @endif
                            </p>
                        </div>
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input id="password" type="password" class="input is-rounded is-medium{{ $errors->has('password') ? ' is-danger' : '' }}" placeholder="{{ __('Password') }}" name="password" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                                @if ($errors->has('password'))
                                    <span class="help is-danger" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label class="checkbox" for="remember">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-medium is-info is-fullwidth is-rounded" type="submit">{{ __('Login') }}</button>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <a class="button is-medium is-light is-fullwidth is-rounded" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>
                        </div>
                        <br>
                        <div class="is-divider">
                            @if (Route::has('password.request'))
                                <a class="button is-text is-rounded" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </center>
        </div>
    </div>
</section>
@endsection
