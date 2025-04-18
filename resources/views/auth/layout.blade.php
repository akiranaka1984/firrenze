<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Neon Admin Panel" />
        <meta name="author" content="Laborator.co" />
        <link rel="icon" href="{{ url('/assets/images/favicon.ico') }}">
        <title>管理パネル</title>
        <link rel="stylesheet" href="{{ url('/assets/css/jquery-ui-1.10.3.custom.min.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/entypo.css') }}">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
        <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/neon-core.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/neon-theme.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/neon-forms.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/custom.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/sweetalert2.min.css') }}" >

        <script src="{{ url('/assets/js/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ url('/assets/js/TweenMax.min.js') }}"></script>
        <script src="{{ url('/assets/js/jquery-ui-1.10.3.minimal.min.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap.js') }}"></script>
        <script src="{{ url('/assets/js/joinable.js') }}"></script>
        <script src="{{ url('/assets/js/resizeable.js') }}"></script>
        <script src="{{ url('/assets/js/neon-api.js') }}"></script>
        <script src="{{ url('/assets/js/cookies.min.js') }}"></script>
        <script src="{{ url('/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ url('/assets/js/neon-login.js') }}"></script>
        <script src="{{ url('/assets/js/neon-custom.js') }}"></script>
        <script src="{{ url('/assets/js/neon-demo.js') }}"></script>
        <script src="{{ url('/assets/js/sweetalert2.min.js') }}"></script>
        <script src="{{ url('/assets/js/custom-alert.js') }}"></script>
        <script src="{{ url('/assets/js/toastr.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap-datepicker.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap-timepicker.min.js') }}"></script>
        <script src="{{ url('/assets/js/moment.min.js') }}"></script>
    </head>

    <body class="page-body login-page login-form-fall" > 
        
        @yield('content') 

    </body>
    <script>
        @if(session('error'))
            simpleMessage('error',`{{session('error')}}`);
        @endif
        @if(session('success'))
            simpleMessage('success',`{{session('success')}}`);
        @endif
    </script>

</html>