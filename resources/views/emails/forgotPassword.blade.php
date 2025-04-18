@extends('emails.layout')
@section('content')
<div style="text-align: left;">
    <h3>{{$name}} 様,</h3>
    <br>
    <p><strong>パスワードをリセットするために下記の「パスワードリセット」リンクにクリックしてください。<strong></p>
    <br>
    <a href="{{url('resetpassword/' . $token)}}" target="_blank">パスワードリセット</a>
    <br/>
    <p>ありがとう</p>
</div>

@stop