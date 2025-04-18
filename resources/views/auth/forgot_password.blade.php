@extends('auth.layout')

@section('content')
<div class="login-container">
    <div class="login-form">
        <div class="login-content">
            <div class="tile-stats tile-primary"> 
                <h2 class="text-light">{{__('Password Recovery')}}</h2>
                <p class="text-light mb-3">{{__('Enter your email and instructions will sent to you!')}}</p>
                <form method="post" action="{{ route('forgot_password_save') }}" role="form" id="form_login">
                    @csrf
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
                        <button type="submit" class="btn btn-primary btn-block btn-login"> 
                            <i class="entypo-login"></i>
                            {{__('Reset')}}
                        </button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection