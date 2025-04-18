@extends('page.layout')

@section('content')
   
    <section class="kv_main">
        <div class="kv_wrap">
            <img src="{{ url('/assets/images/contact_bg_mb.png') }}" alt="">
            <h2 class="kv_title">CONTACT</h2>
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
                    <span property="name" class="archive taxonomy category current-item">CONTACT</span>
                    <meta property="url" content="{{ route('page.contact') }}">
                    <meta property="position" content="2">
                </span>
            </div>
        </div>
        <div class="wrapper">
            <div class="ex_wrap fadeUpTrigger smooth opacity_clear">
                <h3 class="ex_headline opacity_clear color_bk">CONTACT</h3>
                <p class="ex_txt color_bk">当店に関するご質問がございましたら、以下フォームにご入力の上でお問合せください。</p>
            </div>

            <div class="reservation">
                <form action="{{ route('page.contact.save') }}" class="form" method="POST">
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
                    <div id="mw_wp_form_mw-wp-form-59" class="mw_wp_form mw_wp_form_input  ">
                        <dl>
                            <dt>メールアドレス<span>必須</span></dt>
                            <dd>
                                <input type="email" name="email" placeholder="例)　xxx-xxx@xxxxx.ne.jp" class="wide" id="reserveMail" data-prompt-position="topLeft" required>
                            </dd>
                        </dl>
                        <dl>
                            <dt>ご用件<span>必須</span></dt>
                            <dd>
                                <input type="text" name="subject" placeholder="例)　～に関するお問い合わせ" class="wide" id="reserveTitle" data-prompt-position="topLeft" required>
                            </dd>
                        </dl>
                        <dl>
                            <dt>メッセージ<span>必須</span></dt>
                            <dd>
                                <textarea type="text" name="message" placeholder="問い合わせ内容について記載ください" rows="10"></textarea>
                            </dd>
                        </dl>
                        <button type="submit" class="recruit_btn">送信する</button>
                    </div>
                </form>
            </div>

        </div>
    </section>
@endsection
