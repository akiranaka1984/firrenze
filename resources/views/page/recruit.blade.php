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
                       
                        <form action="{{ route('page.recruit.save') }}" class="form" method="POST" enctype="multipart/form-data" id="recruitForm">
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
                            
                            <!-- デバッグ用 -->
                            <div style="background: yellow; padding: 10px; margin: 10px 0;">
                                セッション成功: {{ session('success') ?? 'なし' }}<br>
                                セッションエラー: {{ session('error') ?? 'なし' }}
                            </div>

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
                                    <dt>ご年齢</dt>
                                    <dd class="age">
                                        <input type="text" name="age" id="age" class="wide _age" size="60" value="" placeholder="24">
                                        <span>歳</span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>身長</dt>
                                    <dd class="height">
                                        <input type="text" name="height" id="hight" class="wide _height" size="60" value="" placeholder="160">
                                        <span>cm</span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>体重</dt>
                                    <dd class="weight">
                                        <input type="text" name="weight" id="weight" class="wide _weight" size="60" value="" placeholder="45">
                                        <span>kg</span>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>■バストサイズ</dt>
                                    <dd class="bust">
                                        <select name="bust" id="bust" class="wide _bust" data-prompt-position="topLeft">
                                            <option value="" selected="selected"> 選択してください </option>
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
                                        <select name="interview_month" class="wide" data-prompt-position="topLeft" style="width: 30%;">
                                            <option value="" disabled>--</option>
                                            <option value="1" {{ ($month == 1) ? 'selected' : '' }}>1</option>
                                            <option value="2" {{ ($month == 2) ? 'selected' : '' }}>2</option>
                                            <option value="3" {{ ($month == 3) ? 'selected' : '' }}>3</option>
                                            <option value="4" {{ ($month == 4) ? 'selected' : '' }}>4</option>
                                            <option value="5" {{ ($month == 5) ? 'selected' : '' }}>5</option>
                                            <option value="6" {{ ($month == 6) ? 'selected' : '' }}>6</option>
                                            <option value="7" {{ ($month == 7) ? 'selected' : '' }}>7</option>
                                            <option value="8" {{ ($month == 8) ? 'selected' : '' }}>8</option>
                                            <option value="9" {{ ($month == 9) ? 'selected' : '' }}>9</option>
                                            <option value="10" {{ ($month == 10) ? 'selected' : '' }}>10</option>
                                            <option value="11" {{ ($month == 11) ? 'selected' : '' }}>11</option>
                                            <option value="12" {{ ($month == 12) ? 'selected' : '' }}>12</option>
                                        </select>月&nbsp;
                                        <select name="interview_date" class="wide" data-prompt-position="topLeft" style="width: 30%;">
                                            <option value="" disabled>--</option>
                                            @for ($i = 1; $i <= 31; $i++)
                                                <option value="{{ $i }}" {{ ($day == $i) ? 'selected' : '' }}>{{ $i }}</option>
                                            @endfor
                                        </select>日&nbsp;
                                        <select name="interview_hour" class="wide" data-prompt-position="topLeft" style="width: 30%;">
                                            <option value="">時間を選択</option>
                                            @for ($i = 1; $i <= 23; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>時
                                        <input type="hidden" name="interview_minute" value="0">
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>お問い合わせ内容</dt>
                                    <dd class="height">
                                        <select class="wide _height" name="require">
                                            <option value="求人応募" selected>求人応募</option>
                                            <option value="お問い合わせ">お問い合わせ</option>
                                        </select>
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
                                <button type="submit" class="recruit_btn" id="submitBtn">送信する</button>
                            </div>
                        </form>
                    </div>
                </div>
                {!! $recruit->text_data3 !!}
            </div>
        </div>
    </section>

    <!-- ポップアップモーダル -->
    <div id="popupModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 9999;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 30px; border-radius: 10px; text-align: center; min-width: 300px; max-width: 500px; max-height: 80vh; overflow-y: auto;">
            <p id="popupMessage" style="font-size: 16px; margin-bottom: 20px; white-space: pre-line; text-align: left;"></p>
            <button onclick="closePopup()" style="padding: 10px 30px; background-color: #C92F59; color: white; border: none; border-radius: 5px; cursor: pointer;">閉じる</button>
        </div>
    </div>

    <script>
    // ページ読み込み時にセッションメッセージをチェック
    window.addEventListener('load', function() {
        @if(session('success'))
            showPopup('{{ session('success') }}');
        @endif
        
        @if(session('error'))
            showPopup('{{ session('error') }}');
        @endif
    });
    
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('recruitForm');
        
        // フォームのバリデーション（送信前チェック）
        form.addEventListener('submit', function(e) {
            // 必須項目のチェック
            const requiredFields = {
                'name': 'お名前',
                'mail': 'メールアドレス',
                'mail2': 'メールアドレス(確認用)',
                'tel': 'お電話番号'
            };
            
            let hasError = false;
            let errorMessages = [];
            
            for (let fieldName in requiredFields) {
                const field = form.elements[fieldName];
                if (!field || !field.value.trim()) {
                    hasError = true;
                    errorMessages.push(requiredFields[fieldName] + 'を入力してください');
                }
            }
            
            // メールアドレスの一致チェック
            if (form.elements['mail'].value !== form.elements['mail2'].value) {
                hasError = true;
                errorMessages.push('メールアドレスが一致しません');
            }
            
            if (hasError) {
                e.preventDefault();
                showPopup(errorMessages.join('\n'));
                return false;
            }
            
            // 通常のフォーム送信を実行
            return true;
        });
    });
    
    function showPopup(message) {
        console.log('Showing popup:', message); // デバッグ用
        document.getElementById('popupMessage').textContent = message;
        document.getElementById('popupModal').style.display = 'block';
    }
    
    function closePopup() {
        document.getElementById('popupModal').style.display = 'none';
    }
    </script>

@endsection