@extends('page.layout')

@section('content')
    <section class="kv_main">
        <div class="kv_wrap">
            <img src="{{ asset('assets/images/kv-model1.jpg') }}" alt="">
            <h2 class="kv_title">Web Reservation</h2>
        </div>
    </section>
    <section class="article-container" id="reservation_page">
        <div class="breadcrumbs">
            <div class="breadcrumb_inner">
                <span property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" title="クラブフィレンツェへ移動する" href="{{ route('page.index') }}"
                        class="home">
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
            {{-- <div class="headline">
                <h2 class="headline_ttl">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">RESERVATION</font>
                    </font>
                </h2>
                <p class="back_txt">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">RESERVATION</font>
                    </font>
                </p>
            </div> --}}
            <div class="ex_wrap">
                <h3 class="ex_headline bk_txt">WEB予約</h3>
                <p class="ex_txt bk_txt">
                    当店のご利用は、お電話（<a href="tel:0368685149">03-6868-5149</a>）または、LINE・SMS・ご予約フォームよりお願いいたします。
                </p>
                <p class="ex_txt bk_txt">WEB予約は既に当店をご利用いただいている方に限らせていただいており、新規の方におかれましては、お電話でのご予約をお願いいたします。</p>
                <p class="ex_txt bk_txt">ご希望の女性や日程をお知らせいただいた後、スケジュールを調整いたします。スケジュールが確定次第、予約が完了したことをお知らせいたします。</p>
            </div>
            <div class="channels">
                <div class="phone">
                    <h4>お電話でのご予約はこちら</h4>
                    <p class="ex_txt bk_txt">新規の方は先ずはお電話にてお願いいたします。</p>
                    <a href="tel:0368685149" class="phone-num">03-6868-5149</a>
                </div>
                <div class="lineapp">
                    <a href="https://line.me/ti/p/1-RAi6Iy76#~" class="line-link">LINEでのご予約</a>
                </div>
                {{-- <div class="telegram-app">
                    <a href="" class="tele-link">Telegramでのご予約</a>
                </div> --}}
            </div>
            <div class="concept_box">
                <form id="reserveForm" action="{{ route('page.reservation.save') }}" method="POST" class="form">
                    @csrf
                        
                    <!-- 例：フォームの最初の方に hidden フィールドとして設定 -->
                    <input type="hidden" name="selected_date" value="{{ $selected_date }}">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div id="mw_wp_form_mw-wp-form-59" class="mw_wp_form mw_wp_form_input  ">
                        <dl>
                            <dt>■お名前<span>必須</span></dt>
                            <dd>
                                <input type="text" name="name" value="" placeholder="山田太郎" class="wide"
                                    data-prompt-position="topLeft" required>
                            </dd>
                        </dl>
                        <dl>
                            <dt>■メールアドレス<span>必須</span></dt>
                            <dd>
                                <input type="email" name="mail" value=""
                                    placeholder="例)　xxx-xxx@xxxxx.ne.jp" class="wide" id="reserveMail"
                                    data-prompt-position="topLeft" required>
                            </dd>
                        </dl>
                        <dl>
                            <dt>■メールアドレス(確認用)<span>必須</span></dt>
                            <dd>
                                <input type="email" name="mail_confirmation" value="" placeholder="確認のため再度ご入力ください"
                                    class="wide" data-prompt-position="topLeft" required>
                            </dd>
                        </dl>
                        <dl>
                            <dt>■お電話番号<span>必須</span></dt>
                            <dd>
                                <input type="text" name="tel" value="" placeholder="例)080-1234-5678"
                                    class="tel wide" data-prompt-position="topLeft" required>
                            </dd>
                        </dl>
                        <dl>
                            <dt>■LINE ID</dt>
                            <dd>
                                <input type="text" name="lineid" class="wide" value="">
                                <p class="sub_ex_txt2">当クラブのLINE(アカウント名○○○)より連絡をご希望の場合は、ID検索許可に設定の上、こちらにご入力ください。</p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>■希望モデル<span>必須(第一希望のみ)</span></dt>
                            <dd style="margin-bottom: 10px">[第一希望]</dd>
                            <dd>
                                <input type="text" name="lady1" value="" placeholder="例) 田中 (25)" class="wide rev_lady" style="" id="reserve_lady1" required>
                                    </dd>
                                </dl>
                                <dl>
                                    <dd style="margin-bottom: 10px">[第二希望]</dd>
                                    <dd>
                                        <input type="text" name="lady2" value="" placeholder="例) 山田 (30)"
                                            class="wide rev_lady" style="" id="reserve_lady2">
                                    </dd>
                                </dl>
                                <dl>
                                    <dd style="margin-bottom: 10px">[第三希望]</dd>
                                    <dd>
                                        <input type="text" name="lady3" value=""
                                            placeholder="例) 佐藤 (22)" class="wide rev_lady" style=""
                                            id="reserve_lady3">
                                    </dd>
                                </dl>
                            </dd>
                            {{-- <dd>
                                <dl>
                                    <dd style="margin-bottom: 10px">[第一希望]</dd>
                                    <dd>
                                        <select type="text" name="reserve_lady1" class="wide" style="padding: 0%" id="reserve_lady1" value="" required>
                                            @foreach ($companions as $companion)
                                                <option value="{{ $companion->id }}">{{ $companion->name }} ({{ $companion->age }})</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                                <dl>
                                    <dd style="margin-bottom: 10px">[第二希望]</dd>
                                    <dd>
                                        <select type="text" name="reserve_lady2" class="wide" style="padding: 0%" id="reserve_lady2" value="">
                                            @foreach ($companions as $companion)
                                                <option value="{{ $companion->id }}">{{ $companion->name }} ({{ $companion->age }})</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                                <dl>
                                    <dd style="margin-bottom: 10px">[第三希望]</dd>
                                    <dd>
                                        <select type="text" name="reserve_lady3" class="wide" style="padding: 0%" id="reserve_lady3" value="">
                                            @foreach ($companions as $companion)
                                                <option value="{{ $companion->id }}">{{ $companion->name }} ({{ $companion->age }})</option>
                                            @endforeach
                                        </select>
                                    </dd>
                                </dl>
                            </dd> --}}
                        </dl>
                        <dl>
                            <dt>■ご予約希望日程<span>必須</span></dt>
                            <dd>
                            <dt>第一希望</dt>
                            <dd class="preferred">
                                <select name="first_reservation_month" class="wide" data-prompt-position="topLeft" required>
                                    <option value="">--</option>
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
                                <select name="first_reservation_date" class="wide" data-prompt-position="topLeft" required>
                                    <option value="">--</option>
                                    <option value="1" {{ ($day == 1) ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ ($day == 2) ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ ($day == 3) ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ ($day == 4) ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ ($day == 5) ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ ($day == 6) ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ ($day == 7) ? 'selected' : '' }}>7</option>
                                    <option value="8" {{ ($day == 8) ? 'selected' : '' }}>8</option>
                                    <option value="9" {{ ($day == 9) ? 'selected' : '' }}>9</option>
                                    <option value="10" {{ ($day == 10) ? 'selected' : '' }}>10</option>
                                    <option value="11" {{ ($day == 11) ? 'selected' : '' }}>11</option>
                                    <option value="12" {{ ($day == 12) ? 'selected' : '' }}>12</option>
                                    <option value="13" {{ ($day == 13) ? 'selected' : '' }}>13</option>
                                    <option value="14" {{ ($day == 14) ? 'selected' : '' }}>14</option>
                                    <option value="15" {{ ($day == 15) ? 'selected' : '' }}>15</option>
                                    <option value="16" {{ ($day == 16) ? 'selected' : '' }}>16</option>
                                    <option value="17" {{ ($day == 17) ? 'selected' : '' }}>17</option>
                                    <option value="18" {{ ($day == 18) ? 'selected' : '' }}>18</option>
                                    <option value="19" {{ ($day == 19) ? 'selected' : '' }}>19</option>
                                    <option value="20" {{ ($day == 20) ? 'selected' : '' }}>20</option>
                                    <option value="21" {{ ($day == 21) ? 'selected' : '' }}>21</option>
                                    <option value="22" {{ ($day == 22) ? 'selected' : '' }}>22</option>
                                    <option value="23" {{ ($day == 23) ? 'selected' : '' }}>23</option>
                                    <option value="24" {{ ($day == 24) ? 'selected' : '' }}>24</option>
                                    <option value="25" {{ ($day == 25) ? 'selected' : '' }}>25</option>
                                    <option value="26" {{ ($day == 26) ? 'selected' : '' }}>26</option>
                                    <option value="27" {{ ($day == 27) ? 'selected' : '' }}>27</option>
                                    <option value="28" {{ ($day == 28) ? 'selected' : '' }}>28</option>
                                    <option value="29" {{ ($day == 29) ? 'selected' : '' }}>29</option>
                                    <option value="30" {{ ($day == 30) ? 'selected' : '' }}>30</option>
                                    <option value="31" {{ ($day == 31) ? 'selected' : '' }}>31</option>
                                </select>日&nbsp;
                                <select name="first_reservation_hour" class="wide" data-prompt-position="topLeft" required>
                                    <option value="">--</option>
                                    <option value="12" selected>12</option>
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
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>時&nbsp;
                                <select name="first_reservation_minute" class="wide" data-prompt-position="topLeft" required>
                                    <option value="">--</option>
                                    <option value="0" selected>00</option>
                                    <option value="30">30</option>
                                </select>分
                            </dd>
                        </dl>
                        <dl>
                        <dl>
                            <dt>第二希望</dt>
                            <dd class="preferred">
                                <select name="second_reservation_month" class="wide" data-prompt-position="topLeft">
                                    <option value="">--</option>
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
                                <select name="second_reservation_date" class="wide" data-prompt-position="topLeft">
                                    <option value="">--</option>
                                    <option value="1" {{ ($day == 1) ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ ($day == 2) ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ ($day == 3) ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ ($day == 4) ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ ($day == 5) ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ ($day == 6) ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ ($day == 7) ? 'selected' : '' }}>7</option>
                                    <option value="8" {{ ($day == 8) ? 'selected' : '' }}>8</option>
                                    <option value="9" {{ ($day == 9) ? 'selected' : '' }}>9</option>
                                    <option value="10" {{ ($day == 10) ? 'selected' : '' }}>10</option>
                                    <option value="11" {{ ($day == 11) ? 'selected' : '' }}>11</option>
                                    <option value="12" {{ ($day == 12) ? 'selected' : '' }}>12</option>
                                    <option value="13" {{ ($day == 13) ? 'selected' : '' }}>13</option>
                                    <option value="14" {{ ($day == 14) ? 'selected' : '' }}>14</option>
                                    <option value="15" {{ ($day == 15) ? 'selected' : '' }}>15</option>
                                    <option value="16" {{ ($day == 16) ? 'selected' : '' }}>16</option>
                                    <option value="17" {{ ($day == 17) ? 'selected' : '' }}>17</option>
                                    <option value="18" {{ ($day == 18) ? 'selected' : '' }}>18</option>
                                    <option value="19" {{ ($day == 19) ? 'selected' : '' }}>19</option>
                                    <option value="20" {{ ($day == 20) ? 'selected' : '' }}>20</option>
                                    <option value="21" {{ ($day == 21) ? 'selected' : '' }}>21</option>
                                    <option value="22" {{ ($day == 22) ? 'selected' : '' }}>22</option>
                                    <option value="23" {{ ($day == 23) ? 'selected' : '' }}>23</option>
                                    <option value="24" {{ ($day == 24) ? 'selected' : '' }}>24</option>
                                    <option value="25" {{ ($day == 25) ? 'selected' : '' }}>25</option>
                                    <option value="26" {{ ($day == 26) ? 'selected' : '' }}>26</option>
                                    <option value="27" {{ ($day == 27) ? 'selected' : '' }}>27</option>
                                    <option value="28" {{ ($day == 28) ? 'selected' : '' }}>28</option>
                                    <option value="29" {{ ($day == 29) ? 'selected' : '' }}>29</option>
                                    <option value="30" {{ ($day == 30) ? 'selected' : '' }}>30</option>
                                    <option value="31" {{ ($day == 31) ? 'selected' : '' }}>31</option>
                                </select>日&nbsp;
                                <select name="second_reservation_hour" class="wide" data-prompt-position="topLeft">
                                    <option value="">--</option>
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
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>時&nbsp;
                                <select name="second_reservation_minute" class="wide" data-prompt-position="topLeft">
                                    <option value="">--</option>
                                    <option value="0">00</option>
                                    <option value="30">30</option>
                                </select>分
                            </dd>
                        </dl>
                        <dl>
                            <dt>第三希望</dt>
                            <dd class="preferred">
                                <select name="third_reservation_month" class="wide" data-prompt-position="topLeft">
                                    <option value="">--</option>
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
                                <select name="third_reservation_date" class="wide" data-prompt-position="topLeft">
                                    <option value="">--</option>
                                    <option value="1" {{ ($day == 1) ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ ($day == 2) ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ ($day == 3) ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ ($day == 4) ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ ($day == 5) ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ ($day == 6) ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ ($day == 7) ? 'selected' : '' }}>7</option>
                                    <option value="8" {{ ($day == 8) ? 'selected' : '' }}>8</option>
                                    <option value="9" {{ ($day == 9) ? 'selected' : '' }}>9</option>
                                    <option value="10" {{ ($day == 10) ? 'selected' : '' }}>10</option>
                                    <option value="11" {{ ($day == 11) ? 'selected' : '' }}>11</option>
                                    <option value="12" {{ ($day == 12) ? 'selected' : '' }}>12</option>
                                    <option value="13" {{ ($day == 13) ? 'selected' : '' }}>13</option>
                                    <option value="14" {{ ($day == 14) ? 'selected' : '' }}>14</option>
                                    <option value="15" {{ ($day == 15) ? 'selected' : '' }}>15</option>
                                    <option value="16" {{ ($day == 16) ? 'selected' : '' }}>16</option>
                                    <option value="17" {{ ($day == 17) ? 'selected' : '' }}>17</option>
                                    <option value="18" {{ ($day == 18) ? 'selected' : '' }}>18</option>
                                    <option value="19" {{ ($day == 19) ? 'selected' : '' }}>19</option>
                                    <option value="20" {{ ($day == 20) ? 'selected' : '' }}>20</option>
                                    <option value="21" {{ ($day == 21) ? 'selected' : '' }}>21</option>
                                    <option value="22" {{ ($day == 22) ? 'selected' : '' }}>22</option>
                                    <option value="23" {{ ($day == 23) ? 'selected' : '' }}>23</option>
                                    <option value="24" {{ ($day == 24) ? 'selected' : '' }}>24</option>
                                    <option value="25" {{ ($day == 25) ? 'selected' : '' }}>25</option>
                                    <option value="26" {{ ($day == 26) ? 'selected' : '' }}>26</option>
                                    <option value="27" {{ ($day == 27) ? 'selected' : '' }}>27</option>
                                    <option value="28" {{ ($day == 28) ? 'selected' : '' }}>28</option>
                                    <option value="29" {{ ($day == 29) ? 'selected' : '' }}>29</option>
                                    <option value="30" {{ ($day == 30) ? 'selected' : '' }}>30</option>
                                    <option value="31" {{ ($day == 31) ? 'selected' : '' }}>31</option>
                                </select>日&nbsp;
                                <select name="third_reservation_hour" class="wide" data-prompt-position="topLeft">
                                    <option value="">--</option>
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
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>時&nbsp;
                                <select name="third_reservation_minute" class="wide" data-prompt-position="topLeft">
                                    <option value="">--</option>
                                    <option value="0">00</option>
                                    <option value="30">30</option>
                                </select>分
                            </dd>
                        </dl>
                            <dt>■ご希望のコース</dt>
                            <dd>
                                <select class="wide" name="cource">
                                    <option value="" selected disabled>選択してください</option>
                                    <option value="60分">60分</option>
                                    <option value="90分">90分</option>
                                    <option value="120分">120分</option>
                                    <option value="180分">180分</option>
                                </select>
                            </dd>
                        </dl>
                        <dl>
                            <dt>■ご利用予定のホテルまたは、地域</dt>
                            <dd>
                                <input type="text" name="place" class="wide" value="">
                                <p>ご自宅を希望される方は住所をご入力ください。</p>
                            </dd>
                        </dl>
                        <dl>
                            <dt>■お支払い方法</dt>
                            <dd>
                                <select class="wide" name="pay">
                                    <option value="現金">現金</option>
                                    <option value="クレジットカード">クレジットカード</option>
                                </select>
                            </dd>
                        </dl>
                        <dl>
                            <dt>■当クラブからの連絡方法</dt>
                            <dd>
                                <select class="wide" name="contact">
                                    <option value="メール">メール</option>
                                    <option value="LINE">LINE</option>
                                    <option value="電話">電話</option>
                                    <option value="いずれも可能"> いずれも可能 </option>
                                </select>
                            </dd>
                        </dl>
                        <dl>
                            <dt>■お問い合わせ内容</dt>
                            <dd>
                                <textarea name="cmnt" cols="50" rows="10" placeholder="何かご質問などございましたらこちらに記入ください。"></textarea>
                            </dd>
                        </dl>
                        <input type="hidden" name="reserve">
                        <button name="submit" class="recruit_btn">上記内容を送信する</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    <script>
        $(document).ready(function() {
             /*
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
        */
        });
    </script>
@endsection

