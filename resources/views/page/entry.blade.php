@extends('page.layout')

@section('content')

    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}

    <article id="event">
        <h2 class="ttl"><span>募集要項・応募フォーム</span></h2>
        <div class="contents">
            {!!  $entry->text_data1 !!}
            {!!  $entry->text_data2 !!}
            {!!  $entry->text_data3 !!}
        </div>
    </article>

    <article id="reservation" class="inner">
        <h2 class="ttl"><span>オンライン予約 </span></h2>
        <div class="contents">
            <p class="txt"></p>
            <div class="form" id="reserve_inner">
                <div id="entry_box">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form id="recruitForm" action="{{ route('page.entry.save') }}" method="post"  enctype="multipart/form-data" >
                    @csrf
                    <dl class="clearfix">
                        <dt>お名前<span>*必須</span></dt>
                        <dd class="frm-inpt">
                            <input type="text" name="rec_name" value="" placeholder="例)　田中" class="" data-prompt-position="topLeft">
                        </dd>
                        <dt>メールアドレス<span>*必須</span></dt>
                        <dd class="frm-inpt">
                            <input type="text" name="rec_mail" value="" placeholder="例)　xxx-xxx@xxxxx.ne.jp" class="" id="recMail" data-prompt-position="topLeft">
                        </dd>
                        <dt>メールアドレス確認用<span>*必須</span></dt>
                        <dd class="frm-inpt">
                            <input type="text" name="rec_mail2" value="" placeholder="確認のため再度ご入力ください" class="" data-prompt-position="topLeft">
                        </dd>
                        <dt>お電話番号<span>*必須</span></dt>
                        <dd class="frm-inpt">
                            <input type="text" name="rec_tel" value="" placeholder="例)　080-1234-5678" class="" data-prompt-position="topLeft">
                        </dd>
                        <dt>LINE ID</dt>
                        <dd>
                            <input type="text" name="rec_lineid" value="">
                            <span class="linetxt">当クラブのLINE(アカウント名○○○○)より連絡をご希望の場合は、ID検索許可に設定の上、こちらにご入力ください。</span>
                        </dd>
                        <dt>お問い合わせ内容<span>*必須</span></dt>
                        <dd>
                            <select name="rec_require" class="middle" data-prompt-position="topLeft">
                                <option value="">選択してください</option>
                                <option value="求人応募">求人応募</option>
                                <option value="お問い合わせ">お問い合わせ</option>
                            </select>

                            <span class="linetxt">お問い合わせの場合は、お聞きになりたい内容をフォーム下部【自由記入欄】にご入力ください。</span>
                        </dd>

                        <dt>ご年齢<span>*必須</span></dt>
                        <dd class="frm-inpt">
                            <input type="text" name="rec_age" value="" placeholder="" class="" data-prompt-position="topLeft"> 歳
                        </dd>

                        <dt>身長</dt>
                        <dd class="frm-inpt">
                            <input type="text" name="rec_height" value="" placeholder="" class="" data-prompt-position="topLeft"> cm
                        </dd>

                        <dt>体重</dt>
                        <dd class="frm-inpt">
                            <input type="text" name="rec_weight" value="" placeholder="" class="" data-prompt-position="topLeft">
                        </dd>

                        <dt>バストサイズ</dt>
                        <dd class="frm-inpt">
                            <select class="small" name="rec_bust">
                                <option value="">--</option>
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
                            </select> カップ
                        </dd>

                        <dt class="textarea">タトゥーや傷跡の有無についてご記入ください</em></dt>
                        <dd class="textarea"><textarea name="rec_biko"></textarea></dd>

                        <dt class="large">事前に写真面接をご希望の場合は、こちらからお写真の添付をお願い致します</dt>
                        <dd class="large">
                            <input type="file" name="rec_photo" value="">
					    </dd>
					    <dt class="day">面接のご希望日時</dt>
                        <dd class="day">
                            <ul class="reserve_list2">
                                <li>
                                    <div class="frm-inpt d-grid">
                                        <select name="rec_interview1_m" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>月&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="rec_interview1_d" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>日&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="rec_interview1_h" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
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
                                        </select>
                                    </div>時&nbsp;
                                    <div class="frm-inpt d-grid">
                                        <select name="rec_interview1_min" class="" data-prompt-position="topLeft">
                                            <option value="">--</option>
                                            <option value="00">00</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>分
                                </li>
                            </ul>
						    <p class="txt">ご希望日に面接が出来ない場合は、返信の際にこちらから別日の提案をさせていただきます。</p>
					    </dd>

                        <dt class="textarea">タトゥーや傷跡の有無についてご記入ください</em></dt>
                        <dd class="textarea"><textarea name="rec_cmnt"></textarea></dd>

                    </dl>
					<p class="contact_bottom_txt"><em>※確認画面は表示されませんので、送信前に内容のご確認をお願い致します。</em><br>
                        ※ドメイン指定受信されているお客様は「info@club-firenze.net」からのメールを受信できるよう、設定の変更をお願い致します。</p>

                    <div id="reserve_btn">
                        <div class="g-recaptcha" data-callback="syncerRecaptchaCallback" data-sitekey="6LfSKB4eAAAAAOfyQgh9NS9c1-SHhtCFsTMiNQsr">
                            <div style="width: 304px; height: 78px;"><div>
                                <iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LfSKB4eAAAAAOfyQgh9NS9c1-SHhtCFsTMiNQsr&amp;co=aHR0cHM6Ly9jbHViLWZpcmVuemUubmV0OjQ0Mw..&amp;hl=en&amp;v=3kTz7WGoZLQTivI-amNftGZO&amp;size=normal&amp;cb=xqn7un5p8edf" width="304" height="78" role="presentation" name="a-80082gkzxcsp" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation"></iframe>
                            </div>
                            <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                        </div>
                    </div>
                    <button name="submit" disabled="" >上記内容を送信する</button>
                </form>
                <script type="text/javascript">
                    function syncerRecaptchaCallback(code) {
                        if(code !== ""){
                            $('button[name=submit]').removeAttr("disabled");
                        }
                    }
                </script>
            </div>
        </div>
    </article>


    <nav id="breadcrumbs">
        <ul class="contents" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.index') }}"><span itemprop="name">渋谷デリヘル</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.recruit') }}"><span itemprop="name">求人情報</span></a>
                <meta itemprop="position" content="2" />
            </li>

            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.entry') }}"><span itemprop="name">募集要項・応募フォーム</span></a>
                <meta itemprop="position" content="2" />
            </li>
        </ul>
    </nav>


    <script>
        $(document).ready(function(){
            $('#recruitForm').validate({
                ignore: [],
                debug: false,
                rules: {
                    rec_name: { required: true },
                    rec_mail: { required: true, email: true },
                    rec_mail2: { required: true, email: true, equalTo: "#recMail" },
                    rec_tel: { required: true },
                    rec_require: { required: true },
                    rec_age: { required: true },
                },
                messages: {
                    rec_name: { required: "{{ __('This field is required') }}" },
                    rec_mail: { required: "{{ __('This field is required') }}", email: "{{ __('Invalid email address') }}" },
                    rec_mail2: { required: "{{ __('This field is required') }}", email: "{{ __('Invalid email address') }}", equalTo: "{{ __('Email not matched') }}" },
                    rec_tel: { required: "{{ __('This field is required') }}" },
                    rec_require: { required: "{{ __('This field is required') }}" },
                    rec_age: { required: "{{ __('This field is required') }}" }
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.frm-inpt').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        })
    </script>

@endsection
