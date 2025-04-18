@extends('page.layout')

@section('content')

    <section class="model_info">
        <div class="wrapper">
            <div class="breadcrumbs color_bk">
                <div class="breadcrumb_inner color_bk">
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="クラブフィレンツェへ移動する" href="{{ route('page.index') }}" class="home">
                            <span property="name">HOME</span>
                        </a>
                        <meta property="position" content="1">
                    </span>
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" title="モデルへ移動する" href="{{ route('page.enrollment_table') }}" class="archive post-model-archive">
                            <span property="name">モデル</span>
                        </a>
                        <meta property="position" content="2">
                    </span>
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                    <span property="itemListElement" typeof="ListItem">
                        <span property="name">{{ $companion->category->name }}</span>
                        <meta property="position" content="3">
                    </span>
                    <i class="fas fa-angle-right" aria-hidden="true"></i>
                    <span property="itemListElement" typeof="ListItem">
                        <span property="name" class="post post-model current-item">{{ $companion->name }}</span>
                        <meta property="url" content="{{ route('page.details', ['id'=>$companion->id]) }}">
                        <meta property="position" content="4">
                    </span>
                </div>
            </div>

            <div class="profiles">
                <h2 class="main_ttl">PROFILE</h2>
                <p class="intro">{{ $companion->sale_point }}</p>
                <div class="prof_wrap">
                    <div class="prof_photo">
                        <div id="detail-slider" class="splide">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide">
                                        @php
                                        // 1枚目の画像のパスを決定
                                        $imgPath = url('/storage/photos/default/images.jpg'); // デフォルトのフルパス
                                        if (!empty($companion->home_image) && !empty($companion->home_image->photo)) {
                                            $imgPath = url('/storage/photos/' . $companion->id . '/' . $companion->home_image->photo);
                                        }
                                        // 2枚目以降の画像が存在するか確認
                                        $additionalImages = $companion->all_images;
                                        @endphp
                                        <!-- 1枚目の画像 -->
                                        <img src="{{ $imgPath }}" alt="{{ $companion->name }}_{{ !empty($companion->home_image->title) ? $companion->home_image->title : $companion->age }}">
                                        <div class="prof_box">
                                            <div class="prof">
                                                <div class="name_wrap">
                                                    <p class="name">{{ $companion->name }}</p>
                                                    <span class="age">{{ $companion->age }}歳</span>
                                                </div>
                                                <div class="size">
                                                    <span class="tall">T:{{ $companion->height }}</span>
                                                    <span class="bast">B:{{ $companion->bust }}({{ $companion->cup }})</span>
                                                    <span class="west">W:{{ $companion->waist }}</span>
                                                    <span class="hip">H:{{ $companion->hip }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- 2枚目以降の画像スライダー -->
                                    @php
                                        $hasAdditionalImages = false;
                                    @endphp
                                    @foreach($additionalImages as $index => $image)
                                        @if($index > 0) <!-- 1枚目と重複しないように2枚目以降を表示 -->
                                            @php $hasAdditionalImages = true; @endphp
                                            <li class="splide__slide">
                                                <img src="{{ url('/storage/photos/') }}/{{ $companion->id }}/{{ $image->photo }}" alt="{{ $companion->name }}_{{ $image->title }}">
                                            </li>
                                        @endif
                                    @endforeach
                                    @if(!$hasAdditionalImages)
                                        <!-- 2枚目以降の画像がない場合、デフォルト画像を表示 -->
                                        <li class="splide__slide">
                                            <img src="{{ url('/storage/photos/default/images.jpg') }}" alt="{{ $companion->name }}_default">
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>                                       
                <div class="prof_init">
                    <h4 class="prof_head">プロフィール詳細</h4>
                    <div class="detail">
                        <div class="row">
                            <p class="ttl">名前</p>
                            <p class="name">{{ $companion->name }}</p>
                        </div>
                        <div class="row">
                            <p class="ttl">年齢</p>
                            <p class="age">{{ $companion->age }}歳</p>
                        </div>
                        <div class="row">
                            <p class="ttl">身長</p>
                            <p class="tall">{{ $companion->height }}cm</p>
                        </div>
                        <div class="row">
                            <p class="ttl">スリーサイズ</p>
                            <p class="size">B:{{ $companion->bust }}({{ $companion->cup }}) W:{{ $companion->waist }} H:{{ $companion->hip }}</p>
                        </div>
                    </div>
                    <h4 class="prof_head">前(現)職</h4>
                    <p class="base">{{ $companion->previous_position }}</p>
                    <h4 class="prof_head">似ている芸能人</h4>
                    <p class="base">{{ $companion->celebrities_who_look_alike }}</p>
                    <h4 class="prof_head">趣味</h4>
                    <p class="base">{{ $companion->hobby }}</p>

                    <h4 class="prof_head">オススメポイント</h4>
                    <div class="feature">
                        @if (!empty($companion->rookie))
                            @foreach (explode(",", $companion->rookie) as $item)
                                <span>{{ $item }}</span>
                            @endforeach
                        @endif
                    </div>

                    <h4 class="prof_head">コンシェルジュからのメッセージ</h4>
                        {!! $companion->message !!}
                </div>
            </div>
                <div class="prof_ex">
                    <div class="schedule_box">
                        <h3 class="ttl">出勤スケジュール</h3>
                        @foreach($schedule_dates as $dkey => $schedule_date)
                        <div class="wrap">
                            <div class="head">{{ $schedule_date }}</div>
                            @php
                            $attendance_found = false;
                            @endphp
                            @foreach($companion->attendances as $attendance)
                            @if($attendance->date == $dkey)
                            @php
                            $attendance_found = true;
                            @endphp
                            @if($attendance->undetermined_hours == 1 || $attendance->hidden_hours == 1)
                                <!-- 出勤時間が不明または隠されている場合 -->
                                <div class="cell">お問合せください</div>
                            @else
                                @if(!empty($attendance->start_time))
                                    @if($attendance->without_end_time_display == 1)
                                        <!-- 終了時間非表示設定の場合 -->
                                        <div class="cell">{{ $attendance->start_time }} ~ 終了時間未定</div>
                                    @elseif(!empty($attendance->end_time))
                                        <!-- 開始時間と終了時間が設定されている場合 -->
                                        <div class="cell">{{ $attendance->start_time }} ~ {{ $attendance->end_time }}</div>
                                    @else
                                        <!-- 終了時間が未定の場合 -->
                                        <div class="cell">{{ $attendance->start_time }} ~ 終了時間未定</div>
                                    @endif
                                @else
                                    <!-- 開始時間が設定されていない場合 -->
                                    <div class="cell">00:00 ~</div>
                                @endif
                            @endif
                            @endif
                            @endforeach
                            @if(!$attendance_found)
                            <div class="cell"> - </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <div class="ex_wrap opacity_flg">
                        <div class="ex_wrap opacity_flg mgb_30">
                            @if($companion->category->name == "BLACK")
                                <p class="price_info_ttl black_rank">BLACK</p>
                            @elseif($companion->category->name == "PLATINUM")
                                <p class="price_info_ttl platinum_rank">PLATINUM</p>
                            @elseif($companion->category->name == "DIAMOND")
                                <p class="price_info_ttl diamond"> DIAMOND </p>
                            @elseif($companion->category->name == "RED DIAMOND")
                                <p class="price_info_ttl red_diamond">RED DIAMOND</p>
                            @endif
                            <table class="price">
                                <tbody>
                                    @foreach($companion->category->prices as $price)
                                        <tr>
                                            <th>{{ $price->time_interval }}</th>
                                            <td>{{ $price->start_price }} {{ !empty($price->end_price) ? " ~ ".($price->end_price) : '' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <h4 class="prof_head">オンライン予約</h4>
                        <button class="detail_recruit" id="more_btn">
                            <a href="#" onclick="openTermCondition({{ $companion->id }})">オンライン予約はコチラから</a>
                        </button>
                        <button class="_btn">
                            <a href="{{ route('page.enrollment_table') }}">他の在籍モデルをみる</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('javascript')

    <script>
        $(window).on('DOMContentLoaded', function () {
            new Splide('#detail-slider', {
                type   : 'loop',
                autoplay: true,
                pagination: false,
                speed: 2000
            }).mount();
        });

        function openTermCondition(comp_id){
            localStorage.setItem('comp_id', comp_id);
            window.location.href = "{{ route('page.reservation') }}";
        }
    </script>

@endsection