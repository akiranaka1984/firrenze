<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('MAIL_FROM_NAME')}}</title>
    <style>
        h3,
        p,
        h4 {
            color: #333333;
        }

        a {
            color: #008fa9;
        }

        .wl-mail-box {
            max-width: 768px;
            background: #fefefe;
            margin: 30px auto;
            /*box-shadow: 0 0 28px #bbbbbb;*/
            text-align: center;
            /*border-radius: 10px;*/
            /*border-style: solid;*/
            overflow: hidden;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .wl-mail-footer {
            padding: 0px;
        }

        .wl-mail-footer p {
            margin: 0;
            padding: 0;
        }

        .wl-mail-footer p small {
            font-size: 10px;
        }

        .wl-logo {
            max-width: 115px;
        }
    </style>
</head>

<body>
    <div class="wl-mail-box">
        <div class="wl-mail-body">
            @yield('content')
        </div>
    </div>
</body>

</html>