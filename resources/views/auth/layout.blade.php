<!DOCTYPE html>
<html lang="ja">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Club Firenze Admin" />
        <link rel="icon" href="{{ url('/assets/images/favicon.ico') }}">
        <title>Club Firenze - ログイン</title>
        <link rel="stylesheet" href="{{ url('/assets/css/bootstrap.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/entypo.css') }}">
        <link rel="stylesheet" href="{{ url('/assets/css/neon-core.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/neon-forms.css') }}" >
        <link rel="stylesheet" href="{{ url('/assets/css/sweetalert2.min.css') }}" >
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600&family=Noto+Sans+JP:wght@400;500;600&display=swap">

        <style>
            *, *::before, *::after { box-sizing: border-box; }

            body.login-page-redesign {
                margin: 0;
                padding: 0;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #09090b;
                font-family: 'Inter', 'Noto Sans JP', sans-serif;
                position: relative;
                overflow: hidden;
            }

            /* Subtle background pattern */
            body.login-page-redesign::before {
                content: '';
                position: absolute;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: radial-gradient(ellipse at 30% 20%, rgba(168,137,58,0.06) 0%, transparent 50%),
                            radial-gradient(ellipse at 70% 80%, rgba(168,137,58,0.04) 0%, transparent 50%);
                pointer-events: none;
            }

            .login-card {
                position: relative;
                width: 100%;
                max-width: 420px;
                margin: 20px;
                background: #0f0f12;
                border: 1px solid rgba(168,137,58,0.15);
                border-radius: 12px;
                padding: 48px 40px 40px;
                box-shadow: 0 20px 60px rgba(0,0,0,0.5),
                            0 0 0 1px rgba(255,255,255,0.03) inset;
            }

            /* Logo */
            .login-logo-wrap {
                text-align: center;
                margin-bottom: 32px;
            }

            .login-logo-wrap img {
                display: block;
                margin: 0 auto 16px;
                width: 140px;
                opacity: 0.95;
            }

            .login-brand {
                font-family: 'Cormorant Garamond', serif;
                font-size: 14px;
                font-weight: 500;
                color: rgba(168,137,58,0.6);
                letter-spacing: 0.2em;
                text-transform: uppercase;
                margin: 0;
            }

            /* Form */
            .login-field {
                margin-bottom: 16px;
            }

            .login-field label {
                display: block;
                font-size: 11px;
                font-weight: 600;
                color: rgba(255,255,255,0.4);
                text-transform: uppercase;
                letter-spacing: 0.08em;
                margin-bottom: 6px;
            }

            .login-input-wrap {
                position: relative;
            }

            .login-input-wrap .login-input-icon {
                position: absolute;
                left: 14px;
                top: 50%;
                transform: translateY(-50%);
                color: rgba(168,137,58,0.4);
                font-size: 16px;
                pointer-events: none;
            }

            .login-input-wrap input {
                width: 100%;
                padding: 12px 14px 12px 42px;
                background: rgba(255,255,255,0.04);
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 6px;
                color: #e8e8e8;
                font-size: 14px;
                font-family: 'Inter', 'Noto Sans JP', sans-serif;
                transition: border-color 0.2s ease, background 0.2s ease;
                outline: none;
            }

            .login-input-wrap input::placeholder {
                color: rgba(255,255,255,0.2);
            }

            .login-input-wrap input:focus {
                border-color: rgba(168,137,58,0.5);
                background: rgba(255,255,255,0.06);
            }

            .login-error {
                display: block;
                font-size: 11px;
                color: #f27066;
                margin-top: 4px;
            }

            /* Button */
            .login-submit {
                width: 100%;
                padding: 12px;
                margin-top: 8px;
                border: none;
                border-radius: 6px;
                background: linear-gradient(135deg, #a8893a, #c9a84c);
                color: #09090b;
                font-size: 14px;
                font-weight: 600;
                font-family: 'Inter', 'Noto Sans JP', sans-serif;
                cursor: pointer;
                transition: opacity 0.2s ease, transform 0.1s ease;
                letter-spacing: 0.02em;
            }

            .login-submit:hover {
                opacity: 0.9;
            }

            .login-submit:active {
                transform: scale(0.99);
            }

            /* Footer */
            .login-footer {
                text-align: center;
                margin-top: 24px;
                padding-top: 20px;
                border-top: 1px solid rgba(255,255,255,0.05);
            }

            .login-footer a {
                font-size: 12px;
                color: rgba(168,137,58,0.5);
                text-decoration: none;
                transition: color 0.2s ease;
            }

            .login-footer a:hover {
                color: rgba(168,137,58,0.8);
            }

            /* Responsive */
            @media (max-width: 480px) {
                .login-card {
                    padding: 36px 24px 32px;
                    margin: 12px;
                }
                .login-logo-wrap img {
                    width: 110px;
                }
            }
        </style>

        <script src="{{ url('/assets/js/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ url('/assets/js/bootstrap.js') }}"></script>
        <script src="{{ url('/assets/js/jquery.validate.min.js') }}"></script>
        <script src="{{ url('/assets/js/sweetalert2.min.js') }}"></script>
        <script src="{{ url('/assets/js/custom-alert.js') }}"></script>
        <script src="{{ url('/assets/js/toastr.js') }}"></script>
    </head>

    <body class="login-page-redesign">
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
