@extends('auth.layout')

@section('content')

<div class="login-container">
    <div class="login-form">
        <div class="login-content">
            <div class="tile-stats tile-primary"> 
                <h2 class="text-light">{{__('Reset Your Password')}}</h2>

                <form method="post" action="{{ route('reset_password_save') }}" role="form" id="form_login">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="email" class="form-control" name="email" placeholder="{{__('Email address')}}" value="{{ $email }}" autocomplete="off" readonly required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"> <i class="entypo-key"></i> </div> 
                            <input type="password" class="form-control" name="password" placeholder="{{__('Password')}}" autocomplete="off" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"> <i class="entypo-key"></i> </div> 
                            <input type="password" class="form-control" name="confirm_password" placeholder="{{__('Confirm Password')}}" autocomplete="off" required />
                        </div>
                    </div>
                    <div class="form-group"> 
                        <button type="submit" class="btn btn-primary btn-block btn-login"> 
                            <i class="entypo-login"></i>
                            {{__('Save')}}
                        </button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection