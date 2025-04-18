@extends('page.layout')

@section('content')

    {!! $recruit->text_data1 !!}
    
    <section class="recruit_page" id="recruit_page">
        <div class="wrapper">
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
                        <span property="name" class="post post-page current-item">採用情報</span>
                        <meta property="url" content="{{ route('page.recruit') }}">
                        <meta property="position" content="2">
                    </span>
                </div>
            </div>
            <div class="ex_wrap">
                <h3 class="ex_headline">採用情報</h3>
                <p class="ex_txt">当クラブに関する情報ならびに、報酬体系など以下よりご確認いただきご応募ください。一緒に働ける素敵な仲間のご応募をお待ちしております。 </p>
            </div>
            <div class="ex_wrap">
                <ul class="tab">
                    <li class="active"><a href="#requirements">募集要項/<br> 応募フォーム</a></li>
                    <li><a href="#service">当クラブと<br> サービスについて</a></li>
                    <li><a href="#reward">登録女性の特徴と<br> 報酬について</a></li>
                </ul>
                <div id="requirements" class="area is-active">
                    {!! $recruit->text_data2 !!}
                    <h3 class="head mgb_30 mgt_30 ttl_rev">応募フォーム</h3>
                    <div class="recruitment">
                       
                        <form action="{{ route('page.recruit.save') }}" class="form" method="POST" enctype="multipart/form-data">
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
                                    <dt>お名前<span>必須</span></dt>
                                    <dd>
                                        <input type="text" name="name" id="wide" class="wide" size="60" value="" placeholder="山田太郎" required>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>メールアドレス<span>必須</span></dt>
                                    <dd>
                                        <input type="email" name="mail" id="wide" class="wide" size="60" value="" placeholder="例)　xxx-xxx@xxxxx.ne.jp" required>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>メールアドレス(確認用)<span>必須</span></dt>
                                    <dd>
                                        <input type="email" name="mail2" id="wide" class="wide" size="60" value="" placeholder="確認のため再度ご入力ください" required>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>お電話番号<span>必須</span></dt>
                                    <dd>
                                        <input type="text" name="tel" class="tel wide" size="60" value="" placeholder="例)　080-1234-5678" required>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>LINE ID</dt>
                                    <dd>
                                        <input type="text" name="lineid" id="line" class="wide" size="60" value="" placeholder="maimai">
                                        <p class="sub_ex_txt2">当クラブのLINE(アカウント名○○○)より連絡をご希望の場合は、ID検索許可に設定の上、こちらにご入力ください。</p>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>ご年齢<span>必須</span></dt>
                                    <dd class="age">
                                        <input type="text" name="age" id="age" class="wide _age" size="60" value="" placeholder="24" required>
                                        <span>歳</span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>身長</dt>
                                    <dd class="height">
                                        <input type="text" name="height" id="height" class="wide _height" size="60" value="" placeholder="160">
                                        <span>cm</span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>体重</dt>
                                    <dd class="weight">
                                        <input type="text" name="weight" id="weight" class="wide _weight" size="60" value="" placeholder="50">
                                        <span>kg</span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>バストサイズ</dt>
                                    <dd class="bust">
                                        <select class="wide _bust" name="bust">
                                            <option value="" selected disabled>--</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                            <option value="G">G</option>
                                            <option value="H">H</option>
                                            <option value="I">I</option>
                                            <option value="J">J</option>
                                            <option value="K">K</option>
                                        </select>
                                        <span>カップ</span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>■タトゥーや刺青の有無</dt>
                                    <dd class="tt">
                                        <select name="tattoo" id="tattoo" class="tattoo">
                                            <option value="" selected="selected" disabled> 選択してください </option>
                                            <option value="0"> 無し </option>
                                            <option value="1"> 有り </option>
                                        </select>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>事前に写真面接をご希望の場合は、こちらからお写真の添付をお願い致します。</dt>
                                    <dd>
                                        <input type="file" name="photo" id="attach" class="wide">
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>面接希望日</dt>
                                    <dd class="preferred">
                                        <select name="interview_month" class="wide" data-prompt-position="topLeft">
                                            <option value="" disabled>--</option>
                                            <option value="1" {{ ($month == 1) ? 'selected' : '' }} >1</option>
                                            <option value="2" {{ ($month == 2) ? 'selected' : '' }} >2</option>
                                            <option value="3" {{ ($month == 3) ? 'selected' : '' }} >3</option>
                                            <option value="4" {{ ($month == 4) ? 'selected' : '' }} >4</option>
                                            <option value="5" {{ ($month == 5) ? 'selected' : '' }} >5</option>
                                            <option value="6" {{ ($month == 6) ? 'selected' : '' }} >6</option>
                                            <option value="7" {{ ($month == 7) ? 'selected' : '' }} >7</option>
                                            <option value="8" {{ ($month == 8) ? 'selected' : '' }} >8</option>
                                            <option value="9" {{ ($month == 9) ? 'selected' : '' }} >9</option>
                                            <option value="10" {{ ($month == 10) ? 'selected' : '' }} >10</option>
                                            <option value="11" {{ ($month == 11) ? 'selected' : '' }} >11</option>
                                            <option value="12" {{ ($month == 12) ? 'selected' : '' }} >12</option>
                                        </select>月&nbsp;
                                        <select name="interview_date" class="wide" data-prompt-position="topLeft">
                                            <option value="" disabled>--</option>
                                            <option value="1" {{ ($day == 1) ? 'selected' : '' }} >1</option>
                                            <option value="2" {{ ($day == 2) ? 'selected' : '' }} >2</option>
                                            <option value="3" {{ ($day == 3) ? 'selected' : '' }} >3</option>
                                            <option value="4" {{ ($day == 4) ? 'selected' : '' }} >4</option>
                                            <option value="5" {{ ($day == 5) ? 'selected' : '' }} >5</option>
                                            <option value="6" {{ ($day == 6) ? 'selected' : '' }} >6</option>
                                            <option value="7" {{ ($day == 7) ? 'selected' : '' }} >7</option>
                                            <option value="8" {{ ($day == 8) ? 'selected' : '' }} >8</option>
                                            <option value="9" {{ ($day == 9) ? 'selected' : '' }} >9</option>
                                            <option value="10" {{ ($day == 10) ? 'selected' : '' }} >10</option>
                                            <option value="11" {{ ($day == 11) ? 'selected' : '' }} >11</option>
                                            <option value="12" {{ ($day == 12) ? 'selected' : '' }} >12</option>
                                            <option value="13" {{ ($day == 13) ? 'selected' : '' }} >13</option>
                                            <option value="14" {{ ($day == 14) ? 'selected' : '' }} >14</option>
                                            <option value="15" {{ ($day == 15) ? 'selected' : '' }} >15</option>
                                            <option value="16" {{ ($day == 16) ? 'selected' : '' }} >16</option>
                                            <option value="17" {{ ($day == 17) ? 'selected' : '' }} >17</option>
                                            <option value="18" {{ ($day == 18) ? 'selected' : '' }} >18</option>
                                            <option value="19" {{ ($day == 19) ? 'selected' : '' }} >19</option>
                                            <option value="20" {{ ($day == 20) ? 'selected' : '' }} >20</option>
                                            <option value="21" {{ ($day == 21) ? 'selected' : '' }} >21</option>
                                            <option value="22" {{ ($day == 22) ? 'selected' : '' }} >22</option>
                                            <option value="23" {{ ($day == 23) ? 'selected' : '' }} >23</option>
                                            <option value="24" {{ ($day == 24) ? 'selected' : '' }} >24</option>
                                            <option value="25" {{ ($day == 25) ? 'selected' : '' }} >25</option>
                                            <option value="26" {{ ($day == 26) ? 'selected' : '' }} >26</option>
                                            <option value="27" {{ ($day == 27) ? 'selected' : '' }} >27</option>
                                            <option value="28" {{ ($day == 28) ? 'selected' : '' }} >28</option>
                                            <option value="29" {{ ($day == 29) ? 'selected' : '' }} >29</option>
                                            <option value="30" {{ ($day == 30) ? 'selected' : '' }} >30</option>
                                            <option value="31" {{ ($day == 31) ? 'selected' : '' }} >31</option>
                                        </select>日&nbsp;
                                        <select name="interview_hour" class="wide" data-prompt-position="topLeft">
                                            <option value="" selected disabled>--</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                        </select>時&nbsp;
                                        <select name="interview_minute" class="wide" data-prompt-position="topLeft">
                                            <option value="" selected disabled>--</option>
                                            <option value="00">00</option>
                                            <option value="30">30</option>
                                        </select>分
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>お問い合わせ内容<span>必須</span></dt>
                                    <dd class="height">
                                        <select class="wide _height" name="require">
                                            <option value="" selected disabled>--</option>
                                            <option value="求人応募">求人応募</option>
                                            <option value="お問い合わせ">お問い合わせ</option>
                                        </select>
                                    </dd>
                                </dd>
                                </dl>
                                <dl>
                                    <dt>お問い合わせ内容</dt>
                                    <dd>
                                        <textarea name="inquiry" cols="50" rows="10" placeholder="何かご質問などございましたらこちらに記入ください。"></textarea>
                                    </dd>
                                </dl>
                                <p class="contact_bottom_txt">
                                    <em>※確認画面は表示されませんので、送信前に内容のご確認をお願い致します。</em><br>
                                    ※ドメイン指定受信されているお客様は「info@club-firenze.net」からのメールを受信できるよう、設定の変更をお願い致します。
                                </p>
                                <button type="submit" class="recruit_btn">送信する</button>
                            </div>
                        </form>
                    </div>
                </div>
                {!! $recruit->text_data3 !!}
            </div>
        </div>
    </section>

@endsection
