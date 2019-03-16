@extends('layouts.app')

@section('content')
<section class="hero is-fullheight is-light">
    <div class="hero-body">
        <div class="container">
            <center>
                <div class="box" style="width: 500px">
                    <!--Register-->
                    <h3 class="title is-3">{{ __('Register') }}</h3>
                    <br>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!--Input name-->
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input id="name" type="text" class="input is-rounded is-medium{{ $errors->has('name') ? ' is-danger' : '' }}" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                                @if ($errors->has('name'))
                                    <p class="help is-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </p>
                                @endif
                            </p>
                        </div>
                        <!--Input email-->
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
                        <!--Input password-->
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
                        <!--Password confirmation-->
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input id="password-confirm" type="password" class="input is-rounded is-medium" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </p>
                        </div>
                        <br>
                        <div class="field">
                            <div class="control">
                                <button class="button is-medium is-info is-fullwidth is-rounded" type="submit">{{ __('Register') }}</button>
                            </div>
                        </div>
                        <a class="button is-text is-rounded" href="{{ route('login') }}">{{ __('Kembali ke halaman login') }}</a>
                    </form>
                </div>
            </center>
        </div>
    </div>
</section>
@endsection
