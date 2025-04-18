@extends('auth.layout')

@section('content')

<div class="login-container">
    <div class="login-form">
        <div class="login-content">
            <div class="tile-stats tile-primary tile-login"> 
                <img src="{{ url('assets/images/firenze_logo_gold.png') }}" alt="フィレンツェ" class="login_logo">
                <h1 class="text-light login-ttl">{{__('Sign In')}}</h1>
                <p class="text-light mb-3">{{__('Log in to your account to continue.')}}</p>
                <form method="post" action="{{ route('admin.login') }}" role="form" id="form_login">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light login-icon"><i class="entypo-user"></i> </div> 
                            <input type="email" class="form-control" name="email" placeholder="{{__('Email address')}}" autocomplete="off" required />
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light login-icon"> <i class="entypo-key"></i> </div> 
                            <input type="password" class="form-control" name="password" placeholder="{{__('Password')}}" autocomplete="off" required />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group"> 
                        <button type="submit" class="btn login-btn-color btn-primary btn-block btn-login"> 
                            <i class="entypo-login"></i>
                            {{__('Log In')}}
                        </button> 
                    </div>
                </form>
                <!-- <div class="login-bottom-links"> 
                    <a href="{{ route('forgot_password') }}" class="link">{{__('Forgot Password?')}}</a>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection