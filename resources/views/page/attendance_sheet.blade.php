@extends('page.layout')

@section('content')

    {!! $attendance_sheet->text_data1 !!}
    <section class="schedule" id="schedule">
        <div class="wrapper">
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
                        <span property="name" class="post post-page current-item">本日の出勤情報</span>
                        <meta property="url" content="{{ route('page.attendance_sheet') }}">
                        <meta property="position" content="2">
                    </span>
                </div>
            </div>
            <div class="ex_wrap">
                <h3 class="ex_headline">出勤情報</h3>
                <p class="ex_txt">当店在籍モデルの出勤状況は以下よりご確認ください。 </p>
            </div>
            <div class="articlePanel mgt_30 width_100">
                <style>
                </style>
                <div id="am-block-schedule" class="">
                    <ul class="am-header">
                        @foreach ($schedule_dates as $key => $dates)
                            @if($key == $req_date)
                                <li class="am-header-item active"><a href="{{ route('page.attendance_sheet', ['date' => $key]) }}">{{ $dates }}</a></li>
                            @else
                                <li class="am-header-item"><a href="{{ route('page.attendance_sheet', ['date' => $key]) }}">{{ $dates }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                    <ul class="article-wrap slider grid opc_open muuri">
                        @foreach($today_attendances as $attendance)
                            @if ($attendance->companion->status == 1)
                                @php
                                    if (!empty($attendance->companion) && !empty($attendance->companion->home_image->photo)) {
                                        $imgPath = url('/storage/photos/' . $attendance->companion->id . '/' . $attendance->companion->home_image->photo);
                                    } else {
                                        $imgPath = url('/storage/photos/default/images.jpg'); // フルURLで指定
                                    }
                                @endphp                        
                                <li class="article item muuri-item muuri-item-shown model-item">
                                    <a href="{{ route('page.details', ['id'=>$attendance->companion->id]) }}" class="model_link">
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
                                                    <div class="name_wrap normal-name-class">
                                                        <p class="name">{{ $attendance->companion->name }}</p>
                                                        <span class="age">{{ $attendance->companion->age }}</span>歳
                                                    </div>
                                                    <div class="size">
                                                        <span class="tall">T:{{ $attendance->companion->height }}</span>
                                                        <span class="bast">B:{{ $attendance->companion->bust }}({{ $attendance->companion->cup }})</span>
                                                        <span class="west">W:{{ $attendance->companion->waist }}</span>
                                                        <span class="hip">H:{{ $attendance->companion->hip }}</span>
                                                    </div>
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
            </div>
            <button class="more_btn fadeUpTrigger2" id="more_btn">
                <a href="{{ route('page.enrollment_table') }}">在籍女性をもっと見る</a>
            </button>
        </div>
    </section>
@endsection
