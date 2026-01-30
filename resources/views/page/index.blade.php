@extends('page.layout')

@section('content')

    {!! $main->text_data1 !!}

    <section class="campaign" id="campaign">
        <div class="headline color_white fadeUpTrigger2 opacity_flg">
            <h3 class="">CAMPAIGN</h3>
            <span class="sub">キャンペーン</span>
            <p class="">クラブフィレンツェではお得なキャンペーンを実施中。詳細は下記よりご確認ください。</p>
        </div>
        {!! $campaign->text_data1 !!}
        {!! $campaign->text_data2 !!}
        {!! $campaign->text_data3 !!}
    </section>


    <section id="newface" class="newface">
        <div class="wrapper">
            <div class="headline color_white fadeUpTrigger2{{--  opacity_flg  --}} smooth">
                <h3>NEW FACE</h3>
                <span class="sub">新人モデル</span>
                <p>当クラブには選りすぐりの美女たちが<br>
                    毎日入店しています。</p>
            </div>
            <div class="articlePanel">
                <div id="companians-slide" class="">
                        <ul id="article-slider" class="article-wrap slider fadeUpTrigger3">
                            @foreach($new_companions2 as $new_companion)
                                @php
                                    if(!empty($new_companion->home_image)){
                                        $imgPath = '/storage/photos/'.($new_companion->id).'/'.($new_companion->home_image->photo);
                                    }else{
                                        $imgPath = '/storage/photos/default/images.jpg';
                                    }
                                @endphp
                                <li class="article splide__slide">
                                    <a href="{{ route('page.details', ['id'=>$new_companion->id]) }}" class="model_link">
                                        <p class="intro">
                                            {{ $new_companion->sale_point }}
                                            <span class="corner top-left"></span>
                                            <span class="corner top-right"></span>
                                            <span class="corner bottom-left"></span>
                                            <span class="corner bottom-right"></span>
                                        </p>
                                        <div class="box">
                                            {{--<span class="new_label">NEW</span>--}}
                                            <span class="rank_label">
                                                @if($new_companion->category->name == "BLACK")
                                                    <img src="{{ url('assets/images/black_label.png') }}" alt="{{ $new_companion->category->name }}">
                                                @elseif($new_companion->category->name == "PLATINUM")
                                                    <img src="{{ url('assets/images/platinum_label.png') }}" alt="{{ $new_companion->category->name }}">
                                                @elseif($new_companion->category->name == "DIAMOND")
                                                    <img src="{{ url('assets/images/diamond_label.png') }}" alt="{{ $new_companion->category->name }}">
                                                @elseif($new_companion->category->name == "RED DIAMOND")
                                                    <img src="{{ url('assets/images/reddiamond_label.png') }}" alt="{{ $new_companion->category->name }}">
                                                @endif
                                            </span>
                                            <img src="{{ asset($imgPath) }}" alt="{{ $new_companion->name }}({{ $new_companion->age }})" class="photo">
                                            <div class="prof_box">
                                                <div class="prof">
                                                    {{-- <p class="intro">{{ $new_companion->sale_point }}</p> --}}
                                                    <div class="name_wrap">
                                                        <p class="name">{{ $new_companion->name }}</p>
                                                        <span class="age">{{ $new_companion->age }}</span>歳
                                                    </div>
                                                    <div class="size"> T:<span class="tall">{{ $new_companion->height }}</span> <span
                                                            class="bast">B:{{ $new_companion->bust }}({{ $new_companion->cup }})</span> <span
                                                            class="west">W:{{ $new_companion->waist }}</span> <span
                                                            class="hip">H:{{ $new_companion->hip }}</span> </div>
                                                </div>
                                                <div class="feature_home">
                                                    @if (!empty($attendance->companion->rookie))
                                                        @foreach (explode(",", $attendance->companion->rookie) as $item)
                                                            <span>{{ $item }}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                                {{-- <div class="schedule">
                                                    @if(!empty($new_companion->today_attendances))
                                                        @if(!empty($new_companion->today_attendances->end_time))
                                                            <p>出勤：{{ $new_companion->today_attendances->start_time }}～{{ $new_companion->today_attendances->end_time }}</p>
                                                        @else
                                                            <p>出勤：{{ $new_companion->today_attendances->start_time }}～未定</p>
                                                        @endif
                                                    @else
                                                        <p>出勤：00:00～</p>
                                                    @endif
                                                </div> --}}
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                   
                </div>
            </div>
        </div>
    </section>
    <section id="todays_schedule" class="todays_schedule">
        <div class="wrapper">
            <div class="headline color_white fadeUpTrigger2{{--  opacity_flg --}}">
                <h3 class="txt_09em">TODAY'S SCHEDULE</h3>
                <span class="sub">本日の出勤スケジュール</span>
                <p>本日対応可能な女性をご紹介いたします。</p>
            </div>
            <div class="articlePanel mgt_30">
                <ul id="" class="article-wrap grid fadeUpTrigger3 muuri fadeUp" style="height: 4249px;">

                    @foreach($today_attendances as $attendance)
                        @if ($attendance->companion->status == 1)
                            @php
                                if(!empty($attendance->companion) && !empty($attendance->companion->home_image)){
                                    $imgPath = '/storage/photos/'.($attendance->companion->id).'/'.($attendance->companion->home_image->photo);
                                }else{
                                    $imgPath = '/storage/photos/default/images.jpg';
                                }
                            @endphp
                            <li class="article item muuri-item muuri-item-shown model-item">
                                <a href="{{ route('page.details', ['id'=>$attendance->companion_id]) }}" class="model_link" style="opacity: 1; transform: scale(1);">
                                    <p class="intro normal-intro-class">
                                        {{ $attendance->companion->sale_point }}
                                        <span class="corner top-left"></span>
                                        <span class="corner top-right"></span>
                                        <span class="corner bottom-left"></span>
                                        <span class="corner bottom-right"></span>
                                    </p>
                                    <div class="box fadeUpTrigger3 fadeUp">
                                        {{--<span class="new_label">NEW</span>--}}
                                        <span class="rank_label">
                                            @if($attendance->companion->category->name == "BLACK")
                                                <img src="{{ url('assets/images/black_label.png') }}" alt="{{ $attendance->companion->category->name }}">
                                            @elseif($attendance->companion->category->name == "PLATINUM")
                                                <img src="{{ url('assets/images/platinum_label.png') }}" alt="{{ $attendance->companion->category->name }}">
                                            @elseif($attendance->companion->category->name == "DIAMOND")
                                                <img src="{{ url('assets/images/diamond_label.png') }}" alt="{{ $attendance->companion->category->name }}">
                                            @elseif($attendance->companion->category->name == "RED DIAMOND")
                                                <img src="{{ url('assets/images/reddiamond_label.png') }}" alt="{{ $attendance->companion->category->name }}">
                                            @endif
                                        </span>
                                        <img src="{{ asset($imgPath) }}" alt="{{ $attendance->companion->name }}" class="photo" loading="lazy">
                                        <div class="prof_box">
                                            <div class="prof">
                                                {{-- <p class="intro">{{ $attendance->companion->sale_point }}</p> --}}
                                                <div class="name_wrap normal-name-class">
                                                    <p class="name">{{ $attendance->companion->name }}</p>
                                                    <span class="age">{{ $attendance->companion->age }}</span>歳
                                                </div>
                                                <div class="size"> T:<span class="tall">{{ $attendance->companion->height }}</span> <span
                                                        class="bast">B:{{ $attendance->companion->bust }}({{ $attendance->companion->cup }})</span> <span class="west">W:{{ $attendance->companion->waist }}</span>
                                                    <span class="hip">H:{{ $attendance->companion->hip }}</span>
                                                </div>
                                            </div>
                                            <div class="feature_home">
                                                @if (!empty($attendance->companion->rookie))
                                                    @foreach (explode(",", $attendance->companion->rookie) as $item)
                                                        <span>{{ $item }}</span>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div class="schedule">
                                                @if($attendance->undetermined_hours == 1 || $attendance->hidden_hours == 1)
                                                    <!-- 出勤時間が不明または隠されている場合 -->
                                                    <p>お問合せください</p>
                                                @else
                                                    @if(!empty($attendance->start_time))
                                                        @if($attendance->without_end_time_display == 1)
                                                            <!-- without_end_time_displayが1の場合 -->
                                                            <p>出勤：{{ $attendance->start_time }}～未定</p>
                                                        @elseif(!empty($attendance->end_time))
                                                            <!-- 開始時間と終了時間が設定されている場合 -->
                                                            <p>出勤：{{ $attendance->start_time }}～{{ $attendance->end_time }}</p>
                                                        @else
                                                            <!-- 開始時間は設定されているが終了時間が未定の場合 -->
                                                            <p>出勤：{{ $attendance->start_time }}～未定</p>
                                                        @endif
                                                    @else
                                                        <!-- 開始時間が設定されていない場合 -->
                                                        <p>出勤：00:00～</p>
                                                    @endif
                                                @endif
                                            </div>
                                            @if(!empty($attendance->message))
                                            <div class="schedule_sub">
                                                <p>{{ $attendance->message }}</p>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <button class="more_btn fadeUpTrigger2" id="more_btn">
                <a href="{{ route('page.enrollment_table') }}">在籍女性をもっと見る</a>
            </button>
        </div>
    </section>
    <section id="news" class="news">
        <div class="wrapper">
            <div class="headline fadeUpTrigger2{{--  opacity_flg --}}">
                <h3 class="">INFORMATION</h3>
                <span class="sub">お知らせ</span>
                <p>当店からのお知らせはこちらからご確認ください。</p>
            </div>
            <div class="news_wrap">
                <div class="news_box">
                    <ul class="news_list">
                        @if ($recent_news) <!-- 最新1件を表示 -->
                            @php
                            if (!empty($recent_news->companion_id) && !is_null($recent_news->companion)) {
                                $companionName = $recent_news->companion->name;
                                if (!is_null($recent_news->companion->home_image)) {
                                    $imgPath = '/storage/photos/' . $recent_news->companion_id . '/' . $recent_news->companion->home_image->photo;
                                } else {
                                    $imgPath = '/storage/photos/default/no-image.jpg';  // 画像がない場合のデフォルト画像パス
                                }
                            } else {
                                $companionName = 'No Companion';  // $recent_news->companionがnullの場合のデフォルト名
                                $imgPath = '/storage/photos/default/images.jpg';
                            }
                            @endphp
                            @if ($recent_news->status == 1) <!-- 念のための確認 -->
                                <li id="{{ $recent_news->id }}" class="news type-post status-publish format-standard hentry category-news">
                                    <img src="{{ asset($imgPath) }}" alt="{{ $companionName }}" class="photo">  <!-- 修正されたalt属性 -->
                                    <div class="news-area-wrap">
                                        <div class="date-area">
                                            <time datetime="{{ date('Y/m/d', strtotime($recent_news->updated_at)) }}">{{ date('Y/m/d', strtotime($recent_news->updated_at)) }}</time>
                                            <ul class="post-categories">
                                                <li><a href="" rel="category tag">NEWS</a></li>
                                            </ul>
                                        </div>
                                        <p><a class="news-link" href="{{ route('page.news.details', [$recent_news->slug]) }}">{{ $recent_news->title }}</a></p>
                                        <p>{!! $recent_news->text !!}</p>
                                    </div>
                                </li>
                            @endif
                        @else
                            <li class="news type-post status-publish format-standard hentry category-news">
                                <p>現在、お知らせはありません。</p>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </section>
    {!! $main->text_data2 !!}
    <section id="contact" class="contact">
        <div class="wrapper">
            <div class="headline color_white txt_shadow fadeUpTrigger2 {{-- opacity_flg --}}">
                <h3 class="">CONTACT US</h3>
                <span class="sub">お問い合わせ</span>
                <p>当店サービスに関するご質問・ご相談は<br>
                    お気軽にお問い合わせフォームよりお願いいたします。</p>
            </div>
            <button class="btn_contact">
                <a href="{{ route('page.contact') }}">CONTACT FORM</a>
            </button>
        </div>
    </section>
    {!! $main->text_data3 !!}
    <!--
    <section id="mailmagazine" class="mailmagazine">
        <div class="wrapper">
            <div class="headline fadeUpTrigger2 {{-- opacity_flg --}}">
                <h3 class="">MAIL MAGAZINE</h3>
                <span class="sub">メルマガ登録</span>
                <p>メルマガ会員の皆様には、お得なキャンペーン情報、新人モデル登録情報等をリアルタイムでお届け致します。<br>
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
    -->
<!-- 既存のindex.blade.phpの年齢確認モーダル部分を以下のように更新 -->

<!-- 年齢確認モーダル - バナー統合版 -->
<div id="ageVerificationModal" class="modal-container">
    <div class="modal enhanced-modal">
        <div class="logo enhanced-logo">
            <img src="{{ url('assets/images/index_logo@3x.webp') }}" alt="サイトロゴ">
        </div>
        <div class="modal-content">
            <h2 class="ttl">年齢確認</h2>
            <p class="txt">
                当サイトは未成年に適していない、風俗店の情報を含んでいます。<br>
                18歳未満の方の閲覧は堅く、ご遠慮願います。
            </p>
            <div class="btn-wrap">
                <button id="denyAge">LEAVE</button>
                <button id="confirmAge">ENTER</button>
            </div>
        </div>
        
        <!-- 新しく追加するバナーセクション -->
        <div class="banner-section">
            <div class="banner-title">高級デリヘル情報</div>
            <div class="banner-container">
                <table class="banner-table" cellspacing="0" cellpadding="0">
                    <tr style="height: 100%;">
                        <td style="padding:0;" rowspan="4">
                            <a href="https://hg-deli.com/pref/tokyo/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/tokyo-main.gif" alt="東京 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/shibuya_ebisu_aoyama/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/shibuya.gif" alt="渋谷 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/ebisu_aoyama/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/ebisu-aoyama.gif" alt="恵比寿・青山 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/shinjuku/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/shinjyuku.gif" alt="新宿 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                    </tr>
                    <tr style="height: 100%;">
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/roppongi_akasaka/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/roppongi-akasaka.gif" alt="六本木・赤坂 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/azabu_shirokane_hiro/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/azabu-shirogane-hiro.gif" alt="麻布・白金・広尾 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/shinagawa/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/shinagawa.gif" alt="品川 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                    </tr>
                    <tr style="height: 100%;">
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/gotanda_meguro/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/gotanda-meguro.gif" alt="五反田・目黒 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/ginza/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/ginza.gif" alt="銀座 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/shimbashi_shiodome/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/shinbashi-shiodome.gif" alt="新橋・汐留 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                    </tr>
                    <tr style="height: 100%;">
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/otsuka_ikebukuro/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/ikebukuro.gif" alt="池袋 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/uguisudani_ueno/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/uguisudani-ueno.gif" alt="鶯谷・上野 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                        <td style="padding:0;">
                            <a href="https://hg-deli.com/pref/tokyo/area/marunouchi_nihonbashi/" target="_blank">
                                <img src="https://hg-deli.com/img/link/L1S/tokyo-marunouchi-nihonbashi.gif" alt="東京・丸の内・日本橋 | 高級デリヘルTOP10ランキング" border="0">
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- 追加バナーセクション -->
            <div class="additional-banners" style="margin-top: 10px; padding-top: 10px;">
                <div class="banner-title">求人情報・その他エリア</div>
                
                <!-- ①求人バナー -->
                <div style="margin-bottom: 15px;">
                    <table style="line-height:0;font-size:0;width:100%;max-width:468px;background-color:white;border-radius:2px;margin:0 auto;" cellspacing="0" cellpadding="0"><tr><td style="padding:0;" rowspan="3"><a href="https://hg-deli.com/recruit/pref/tokyo/" target="_blank"><img style="width:100%;" src="https://hg-deli.com/img/link/RL1S/tokyo-main.gif" alt="東京 | 高級デリヘル求人パーフェクトガイド" border="0"></a></td><td style="padding:0;"  colspan="2"><a href="https://hg-deli.com/recruit/pref/tokyo/area/shibuya_ebisu_aoyama/" target="_blank"><img style="width:100%;" src="https://hg-deli.com/img/link/RL1S/shibuya.gif" alt="渋谷 | 高級デリヘル求人パーフェクトガイド" border="0"></a></td><td style="padding:0;"  colspan="2"><a href="https://hg-deli.com/recruit/pref/tokyo/area/shinjuku/" target="_blank"><img style="width:100%;" src="https://hg-deli.com/img/link/RL1S/shinjyuku.gif" alt="新宿 | 高級デリヘル求人パーフェクトガイド" border="0"></a></td><td style="padding:0;"><a href="https://hg-deli.com/recruit/pref/tokyo/area/roppongi_akasaka/" target="_blank"><img style="width:100%;" src="https://hg-deli.com/img/link/RL1S/roppongi-akasaka.gif" alt="六本木・赤坂 | 高級デリヘル求人パーフェクトガイド" border="0"></a></td></tr><tr><td style="padding:0;"><a href="https://hg-deli.com/recruit/pref/tokyo/area/ginza/" target="_blank"><img style="width:100%;" src="https://hg-deli.com/img/link/RL1S/ginza.gif" alt="銀座 | 高級デリヘル求人パーフェクトガイド" border="0"></a></td><td style="padding:0;" colspan="2"><a href="https://hg-deli.com/recruit/pref/tokyo/area/shinagawa/" target="_blank"><img style="width:100%;" src="https://hg-deli.com/img/link/RL1S/shinagawa.gif" alt="品川 | 高級デリヘル求人パーフェクトガイド" border="0"></a></td><td style="padding:0;" colspan="2"><a href="https://hg-deli.com/recruit/pref/tokyo/area/marunouchi_nihonbashi/" target="_blank"><img style="width:100%;" src="https://hg-deli.com/img/link/RL1S/tokyo-marunouchi-nihonbashi.gif" alt="東京・丸の内・日本橋 | 高級デリヘル求人パーフェクトガイド" border="0"></a></td></tr><tr><td style="padding:0;"width="15.5982%" height="0"></td><td style="padding:0;"width="4.7008%" height="0"></td><td style="padding:0;"width="10.8974%" height="0"></td><td style="padding:0;"width="9.401%" height="0"></td><td style="padding:0;"width="20.7264%" height="0"></td></tr></table>
                </div>
                
                <!-- ②お台場・豊洲 -->
                <div style="margin-bottom: 15px;">
                    <a href="https://hg-deli.com/pref/tokyo/area/odaiba_toyosu/" target="_blank"><img src="https://hg-deli.com/img/link/odaiba_toyosu468x60.jpg" alt="お台場・豊洲 - 高級デリヘルTOP10ランキング" style="width: 100%; max-width: 468px; height: auto; display: block; margin: 0 auto;" border="0"></a>
                </div>
                
                <!-- ③水道橋・御茶ノ水・秋葉原 -->
                <div style="margin-bottom: 15px;">
                    <a href="https://hg-deli.com/pref/tokyo/area/suidobashi_ochanomizu_akihabara/" target="_blank"><img src="https://hg-deli.com/img/link/suidobashi_ochanomizu_akihabara468x60.jpg" alt="水道橋・御茶ノ水・秋葉原 - 高級デリヘルTOP10ランキング" style="width: 100%; max-width: 468px; height: auto; display: block; margin: 0 auto;" border="0"></a>
                </div>
                
                <!-- ④中野・吉祥寺・立川 -->
                <div style="margin-bottom: 15px;">
                    <a href="https://hg-deli.com/pref/tokyo/area/nakano_kichijoji_tachikawa/" target="_blank"><img src="https://hg-deli.com/img/link/nakano_kichijoji_tachikawa468x60.jpg" alt="中野・吉祥寺・立川 - 高級デリヘルTOP10ランキング" style="width: 100%; max-width: 468px; height: auto; display: block; margin: 0 auto;" border="0"></a>
                </div>
                
                <!-- ⑤世田谷 -->
                <div style="margin-bottom: 15px;">
                    <a href="https://hg-deli.com/pref/tokyo/area/setagaya/" target="_blank"><img src="https://hg-deli.com/img/link/setagaya468x60.jpg" alt="世田谷 - 高級デリヘルTOP10ランキング" style="width: 100%; max-width: 468px; height: auto; display: block; margin: 0 auto;" border="0"></a>
                </div>
                <!-- ⑥高級デリヘル.JP -->
                <div style="margin-bottom: 15px;">
                    <a href="https://www.koukyuderi.jp/" target="_blank"><img src="https://www.koukyuderi.jp/img/banner/koukyuderi46860.gif" alt="高級デリヘル.JP" style="width: 100%; max-width: 468px; height: auto; display: block; margin: 0 auto;" border="0"></a>
                </div>
                <!-- ⑦Japan Friday Night（ここに追加） -->
<div style="margin-bottom: 15px;">
    <a href="https://japanfridaynight.com/" target="_blank" rel="noopener">
        <img src="https://japanfridaynight.com/wp-content/uploads/2025/02/486_60.png" 
             alt="外国人向け特化 日本の風俗情報 Japan Friday Night" 
             style="width: 100%; max-width: 468px; height: auto; display: block; margin: 0 auto;" 
             border="0"
             loading="lazy"
             decoding="async">
    </a>
</div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <script type="text/javascript" src="{{ url('/assets/js/top.js') }}?v=1.4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modalElement = document.getElementById('ageVerificationModal');
    
            // クッキーを取得する関数
            function getCookie(name) {
                var value = "; " + document.cookie;
                var parts = value.split("; " + name + "=");
                if (parts.length == 2) return parts.pop().split(";").shift();
            }
    
            // クッキーを設定する関数
            function setCookie(name, value, days) {
                var expires = "";
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toUTCString();
                }
                document.cookie = name + "=" + (value || "") + expires + "; path=/";
            }
    
            // クッキーをチェックして、表示するかどうかを決定
            if (!getCookie('ageVerified')) {
                modalElement.style.display = 'block'; // モーダルを表示
            }
    
            document.getElementById('confirmAge').addEventListener('click', function() {
                setCookie('ageVerified', 'true', 7); // クッキーを7日間設定
                modalElement.style.display = 'none'; // モーダルを非表示
            });
    
            document.getElementById('denyAge').addEventListener('click', function() {
                alert('18歳未満の方はアクセスできません。');
                window.location.href = 'https://www.yahoo.co.jp'; // Yahooにリダイレクト
            });
        });
    </script>
@endsection
