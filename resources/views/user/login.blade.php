@extends('auth.layout')

@section('content')

<div class="login-container">
    <div class="login-form">
        <div class="login-content">
            <div class="tile-stats tile-primary"> 
                <h1 class="text-light">{{__('Sign In')}}</h1>
                <p class="text-light mb-3">{{__('Log in to your account to continue.')}}</p>

                <form method="post" action="{{ route('user.login') }}" role="form" id="form_login">
                    @csrf

                    <input type="hidden" class="form-control" name="wbr" value="{{ $wbr }}" required />

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="email" class="form-control" name="email" placeholder="{{__('Email address')}}" autocomplete="off" required />
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"> <i class="entypo-key"></i> </div> 
                            <input type="password" class="form-control" name="password" placeholder="{{__('Password')}}" autocomplete="off" required />
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group"> 
                        <button type="submit" class="btn btn-primary btn-lg btn-block btn-login"> 
                            <i class="entypo-login"></i>
                            {{__('Log In')}}
                        </button> 
                    </div>
                </form>
                <hr/>
                <div class="login-bottom-links"> 
                    <a href="{{ route('user.register') }}" class="link">{{__('Registration')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection