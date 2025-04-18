@extends('page.layout')

@extends('page.layout')

@section('content')
    <section class="kv_main">
        <div class="kv_wrap">
            <img src="{{ url('storage/gallery/86851710153484.jpg') }}" alt="">
            <h2 class="kv_title">Web Reservation</h2>
        </div>
    </section>
    <section class="article-container" id="reservation_page">
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
                    <span property="name" class="archive taxonomy category current-item">WEB RESERVATION</span>
                    <meta property="url" content="{{ route('user.web.reservation') }}">
                    <meta property="position" content="2">
                </span>
            </div>
        </div>
        <div class="wrapper">
            <div class="headline">
                <h2 class="headline_ttl">RESERVATION</h2>
                <p class="back_txt">RESERVATION</p>
            </div>
            <div class="ex_wrap">
                <h3 class="ex_headline bk_txt">WEB予約</h3>
                <p class="ex_txt bk_txt">お電話、LINE、Telegram、またはフォーム入力の中から、ご希望の予約方法をお選びください。</p>
                <p class="ex_txt bk_txt">WEB予約は既に当店をご利用いただいている方に限らせていただいており、新規の方はお電話でのご予約をお願いいたします。</p>
                <p class="ex_txt bk_txt">ご希望の女性や日程をお知らせいただいた後、スケジュールを調整いたします。スケジュールが確定次第、予約完了のお知らせをいたします。</p>
            </div>
            <div class="channels">
                <div class="phone">
                    <h4>お電話のご予約はこちら</h4>
                    <p class="ex_txt bk_txt">新規の方は先ずはお電話にてお願いいたします。</p>
                    <a href="tel:0368685149" class="phone-num">03-6868-5149</a>
                </div>
                <div class="lineapp">
                    <a href="" class="line-link">LINEでのご予約</a>
                </div>
                <div class="telegram-app">
                    <a href="" class="tele-link">Telegramでのご予約</a>
                </div>
            </div>
            <div class="concept_box">
                <form action="{{ route('user.web.reservation.save') }}" class="form" method="POST">
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

                    <!-- ユーザー情報（ログイン済みの場合は読み取り専用） -->
                    <input type="hidden" name="frm_user_id" value="{{ $users->id }}" required/>
                    <dl>
                        <dt>■お名前<span>必須</span></dt>
                        <dd>
                            <input type="text" name="name" placeholder="山田太郎" class="wide" value="{{ $users->name }}" readonly required>
                        </dd>
                    </dl>
                    <dl>
                        <dt>■メールアドレス<span>必須</span></dt>
                        <dd>
                            <input type="email" name="mail" placeholder="例) xxx-xxx@xxxxx.ne.jp" value="{{ $users->email }}" class="wide" id="reserveMail" readonly required>
                        </dd>
                    </dl>
                    <dl>
                        <dt>■メールアドレス(確認用)<span>必須</span></dt>
                        <dd>
                            <input type="email" name="mail2" placeholder="確認のため再度ご入力ください" value="{{ $users->email }}" class="wide" readonly required>
                        </dd>
                    </dl>
                    <dl>
                        <dt>■お電話番号<span>必須</span></dt>
                        <dd>
                            <input type="text" name="tel" placeholder="例) 080-1234-5678" value="{{ $users->tel }}" class="tel wide" readonly required>
                        </dd>
                    </dl>
                    <dl>
                        <dt>■LINE ID</dt>
                        <dd>
                            <input type="text" name="lineid" class="wide" value="{{ $users->lineid }}" readonly>
                            <p class="sub_ex_txt2">LINE連絡をご希望の場合は、ID検索許可に設定の上、こちらにご入力ください。</p>
                        </dd>
                    </dl>
                    <dl>
                        <dt>■ご予約希望女性<span>必須</span></dt>
                        <dd>
                            <dl>
                                <dd style="margin-bottom: 10px">[第一希望]</dd>
                                <dd>
                                    <select name="lady1" class="wide" id="reserve_lady1" required>
                                        @foreach ($companions as $companion)
                                            <option value="{{ $companion->id }}">{{ $companion->name }} ({{ $companion->age }})</option>
                                        @endforeach
                                    </select>
                                </dd>
                            </dl>
                            <dl>
                                <dd style="margin-bottom: 10px">[第二希望]</dd>
                                <dd>
                                    <select name="lady2" class="wide" id="reserve_lady2" required>
                                        @foreach ($companions as $companion)
                                            <option value="{{ $companion->id }}">{{ $companion->name }} ({{ $companion->age }})</option>
                                        @endforeach
                                    </select>
                                </dd>
                            </dl>
                            <dl>
                                <dd style="margin-bottom: 10px">[第三希望]</dd>
                                <dd>
                                    <select name="lady3" class="wide" id="reserve_lady3" required>
                                        @foreach ($companions as $companion)
                                            <option value="{{ $companion->id }}">{{ $companion->name }} ({{ $companion->age }})</option>
                                        @endforeach
                                    </select>
                                </dd>
                            </dl>
                        </dd>
                    </dl>
                    <dl>
                        <dt>■ご予約希望日程<span>必須</span></dt>
                        <dd>
                            <!-- 第一候補日 -->
                            <dl>
                                <dd style="margin-bottom: 10px">[第一候補日]</dd>
                                <dd>
                                    <select name="first_reservation_month" required>
                                        <option value="" disabled selected>--</option>
                                        @for($m = 1; $m <= 12; $m++)
                                            <option value="{{ $m }}">{{ $m }}</option>
                                        @endfor
                                    </select>月
                                    <select name="first_reservation_date" required>
                                        <option value="" disabled selected>--</option>
                                        @for($d = 1; $d <= 31; $d++)
                                            <option value="{{ $d }}">{{ $d }}</option>
                                        @endfor
                                    </select>日
                                    <select name="first_reservation_hour" required>
                                        <option value="" disabled selected>--</option>
                                        @for($h = 0; $h <= 23; $h++)
                                            <option value="{{ $h }}">{{ sprintf('%02d', $h) }}</option>
                                        @endfor
                                    </select>時
                                    <select name="first_reservation_minute" required>
                                        <option value="" disabled selected>--</option>
                                        <option value="00">00</option>
                                        <option value="30">30</option>
                                    </select>分
                                </dd>
                            </dl>
                            <!-- 第二候補日 -->
                            <dl>
                                <dd style="margin-bottom: 10px">[第二候補日]</dd>
                                <dd>
                                    <select name="second_reservation_month" required>
                                        <option value="" disabled selected>--</option>
                                        @for($m = 1; $m <= 12; $m++)
                                            <option value="{{ $m }}">{{ $m }}</option>
                                        @endfor
                                    </select>月
                                    <select name="second_reservation_date" required>
                                        <option value="" disabled selected>--</option>
                                        @for($d = 1; $d <= 31; $d++)
                                            <option value="{{ $d }}">{{ $d }}</option>
                                        @endfor
                                    </select>日
                                    <select name="second_reservation_hour" required>
                                        <option value="" disabled selected>--</option>
                                        @for($h = 0; $h <= 23; $h++)
                                            <option value="{{ $h }}">{{ sprintf('%02d', $h) }}</option>
                                        @endfor
                                    </select>時
                                    <select name="second_reservation_minute" required>
                                        <option value="" disabled selected>--</option>
                                        <option value="00">00</option>
                                        <option value="30">30</option>
                                    </select>分
                                </dd>
                            </dl>
                            <!-- 第三候補日 -->
                            <dl>
                                <dd style="margin-bottom: 10px">[第三候補日]</dd>
                                <dd>
                                    <select name="third_reservation_month" required>
                                        <option value="" disabled selected>--</option>
                                        @for($m = 1; $m <= 12; $m++)
                                            <option value="{{ $m }}">{{ $m }}</option>
                                        @endfor
                                    </select>月
                                    <select name="third_reservation_date" required>
                                        <option value="" disabled selected>--</option>
                                        @for($d = 1; $d <= 31; $d++)
                                            <option value="{{ $d }}">{{ $d }}</option>
                                        @endfor
                                    </select>日
                                    <select name="third_reservation_hour" required>
                                        <option value="" disabled selected>--</option>
                                        @for($h = 0; $h <= 23; $h++)
                                            <option value="{{ $h }}">{{ sprintf('%02d', $h) }}</option>
                                        @endfor
                                    </select>時
                                    <select name="third_reservation_minute" required>
                                        <option value="" disabled selected>--</option>
                                        <option value="00">00</option>
                                        <option value="30">30</option>
                                    </select>分
                                </dd>
                            </dl>
                        </dd>
                    </dl>
                    <dl>
                        <dt>■ご希望のコース</dt>
                        <dd>
                            <select class="wide" name="cource" required>
                                <option value="" disabled selected>選択してください</option>
                                @foreach ($prices as $price)
                                    <option value="{{ $price->name }} {{ $price->time_interval }}">
                                        {{ $price->name }} {{ $price->time_interval }}
                                    </option>
                                @endforeach
                            </select>
                        </dd>
                    </dl>
                    <dl>
                        <dt>■ご利用予定のホテルまたは、地域</dt>
                        <dd>
                            <input type="text" name="place" class="wide" value="">
                            <p>ご自宅をご希望の場合は住所をご入力ください。</p>
                        </dd>
                    </dl>
                    <dl>
                        <dt>■お支払い方法</dt>
                        <dd>
                            <select class="wide" name="pay" required>
                                <option value="現金">現金</option>
                                <option value="クレジットカード">クレジットカード</option>
                            </select>
                        </dd>
                    </dl>
                    <dl>
                        <dt>■当クラブからの連絡方法</dt>
                        <dd>
                            <select class="wide" name="contact" required>
                                <option value="メール">メール</option>
                                <option value="LINE">LINE</option>
                                <option value="電話">電話</option>
                                <option value="Telegram">Telegram</option>
                                <option value="いずれも可能">いずれも可能</option>
                            </select>
                        </dd>
                    </dl>
                    <dl>
                        <dt>■お問い合わせ内容</dt>
                        <dd>
                            <textarea name="cmnt" cols="50" rows="10" placeholder="ご質問などございましたらご記入ください。"></textarea>
                        </dd>
                    </dl>
                    <button type="submit" class="recruit_btn">送信する</button>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        $(document).ready(function(){
            $('#reserve_lady1').select2({
                placeholder: "",
                allowClear: true
            });
            $('#reserve_lady2').select2({
                placeholder: "",
                allowClear: true
            });
            $('#reserve_lady3').select2({
                placeholder: "",
                allowClear: true
            });
            // ※datepicker などの初期化が必要であればここに追加してください
        });
    </script>
@endsection
