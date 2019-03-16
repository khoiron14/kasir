@extends('layouts.app')

@section('content')
<section class="hero is-fullheight is-light">
    <div class="hero-body">
        <div class="container">
            <center>
                <div class="box" style="width: 500px">
                    <!--Reset Password-->
                    <h3 class="title is-3">{{ __('Reset Password') }}</h3>
                    <br>
                    @if (session('status'))
                        <div class="help is-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="field">
                            <p class="control has-icons-left has-icons-right">
                                <input id="email" type="email" class="input is-rounded is-medium{{ $errors->has('email') ? ' is-danger' : '' }}" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
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
                        <br>
                        <div class="field">
                            <div class="control">
                                <button class="button is-medium is-info is-fullwidth is-rounded" type="submit">{{ __('Send Password Reset Link') }}</button>
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
