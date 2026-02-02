@extends('auth.layout')

@section('content')
<div class="login-card">
    <div class="login-logo-wrap">
        <img src="{{ url('assets/images/firenze_logo_gold.png') }}" alt="Club Firenze">
        <p class="login-brand">Member Login</p>
    </div>

    <form method="post" action="{{ route('user.login.submit') }}" role="form" id="form_login">
        @csrf
        <input type="hidden" name="wbr" value="{{ $wbr }}" />

        <div class="login-field">
            <label for="loginEmail">メールアドレス</label>
            <div class="login-input-wrap">
                <i class="entypo-user login-input-icon"></i>
                <input type="email" id="loginEmail" name="email" placeholder="メールアドレスを入力" autocomplete="off" required />
            </div>
            @if ($errors->has('email'))
                <span class="login-error">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="login-field">
            <label for="loginPassword">パスワード</label>
            <div class="login-input-wrap">
                <i class="entypo-key login-input-icon"></i>
                <input type="password" id="loginPassword" name="password" placeholder="パスワードを入力" autocomplete="off" required />
            </div>
            @if ($errors->has('password'))
                <span class="login-error">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <button type="submit" class="login-submit">ログイン</button>
    </form>

    <div class="login-footer">
        <a href="{{ route('user.register') }}">新規登録はこちら</a>
    </div>
</div>
@endsection
