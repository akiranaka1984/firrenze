@extends('auth.layout')

@section('content')

<div class="login-container">
    <div class="login-form">
        <div class="login-content">
            <div class="tile-stats tile-primary"> 
                <h1 class="text-light">{{__('Registration')}}</h1>

                <script async src="https://telegram.org/js/telegram-widget.js?22" 
                    data-telegram-login="{{ $telegramCred->botname }}" 
                    data-size="large" 
                    data-onauth="onTelegramAuth(user)" 
                    data-request-access="write">
                </script>
                <script type="text/javascript">
                    function onTelegramAuth(user) {
                        document.getElementById('frm_id').value = user.id;
                        document.getElementById('frm_username').value = (user.username ? user.username : "");
                        document.getElementById('frm_photo_url').value = (user.photo_url ? user.photo_url : "");
                        document.getElementById('frm_auth_date').value = user.auth_date;
                        document.getElementById('frm_hash').value = user.hash;
                        document.getElementById('frm_first_name').value = user.first_name;
                        document.getElementById('frm_last_name').value = user.last_name;
                        document.getElementById('frm_comp_id').value = localStorage.getItem('comp_id');

                        $('#form_register').show()
                    }
                </script>
                
                <br/><br/>

                <form method="post" action="{{ route('user.register.save') }}" role="form" id="form_register" style="display:none;">
                    @csrf

                    <input type="hidden" class="form-control" id="frm_comp_id" name="comp_id" required />
                    <input type="hidden" class="form-control" id="frm_id" name="id" required />
                    <input type="hidden" class="form-control" id="frm_username" name="username"  />
                    <input type="hidden" class="form-control" id="frm_photo_url" name="photo_url"  />
                    <input type="hidden" class="form-control" id="frm_auth_date" name="auth_date" required />
                    <input type="hidden" class="form-control" id="frm_hash" name="hash" required />

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="text" class="form-control" id="frm_first_name" name="firstname" placeholder="{{__('Firstname')}}" readonly required />
                        </div>
                    </div>

                      <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="text" class="form-control" id="frm_last_name" name="lastname" placeholder="{{__('Lastname')}}" readonly required />
                        </div>
                    </div>

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
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="text" class="form-control" name="tel" placeholder="{{__('Tel')}}" autocomplete="off" required />
                            @if ($errors->has('tel'))
                                <span class="text-danger">{{ $errors->first('tel') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon text-light"><i class="entypo-user"></i> </div> 
                            <input type="text" class="form-control" name="lineid" placeholder="{{__('Line ID')}}" autocomplete="off" required />
                            @if ($errors->has('lineid'))
                                <span class="text-danger">{{ $errors->first('lineid') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group"> 
                        <button type="submit" class="btn btn-primary btn-lg btn-block btn-register"> 
                            <i class="entypo-login"></i>
                            {{__('SAVE')}}
                        </button> 
                    </div>

                </form>
                <hr/>
                <div class="login-bottom-links"> 
                    <a href="{{ route('user.login') }}" class="link">{{__('Sign In')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection