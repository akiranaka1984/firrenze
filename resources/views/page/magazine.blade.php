@extends('page.layout')

@section('content')
    <section class="kv_main">
        <div class="kv_wrap">
            <img src="{{ url('assets/images/kv-model8.jpg') }}" alt="">
            <h2 class="kv_title">MAIL MAGAZINE</h2>
        </div>
    </section>

    <section id="mailmagazine" class="mailmagazine article-container">
        <div class="breadcrumbs">
            <div class="breadcrumb_inner">
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="クラブフィレンツェへ移動する" href="{{ route('page.index') }}" class="home">
                        <span property="name">HOME</span>
                    </a>
                    <meta property="position" content="1">
                </span>
                <i class="fas fa-angle-right" aria-hidden="true"></i>
                <span property="itemListElement" typeof="ListItem">
                    <span property="name" class="archive taxonomy category current-item">MAIL MAGAZINE</span>
                    <meta property="url" content="{{ route('page.magazine') }}">
                    <meta property="position" content="2">
                </span>
            </div>
        </div>
        <div class="wrapper">
            <div class="headline opacity_clear">
                <div class="headline mrgbtm0 opacity_clear">
                    <p class="ttl_en">MAIL MAGAZINE</p>
                    <h2 class="headline_ttl">
                        MAIL MAGAZINE </h2>
                    <p class="back_txt">MAIL MAGAZINE</p>
                </div>
                <p class="txt-left">メルマガ会員の皆様には、お得なキャンペーン情報、新人モデル登録情報等をリアルタイムでお届け致します。<br>
                    お客様の大切なメールアドレスが他に漏洩する事は一切ございませんので、ご安心下さい。</p>
            </div>
            <div class="mailForm">
                <form action="https://club-firenze.net/acmailer3/reg.cgi" method="post">
                    @csrf
        
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
        
                    <input type="text" name="name" placeholder="六本木 太郎" class="mail" required>
                    <input type="email" name="email" placeholder="abcde@gmail.com" class="mail" required>
                    <input type="hidden" name="reg" value="add">
                    <input type="hidden" name="encode" value="文字コード">
        
                    <div class="div">
                        <input type="submit" class="button" name="submit" value="登録する"/>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
