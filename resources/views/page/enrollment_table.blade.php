@extends('page.layout')

@section('content')
    {!! $enrollment_table->text_data1 !!}
    <!-- modelクラスがついた全体をラップするsectionクラス-->
    <section class="model" id="model">
        <div class="wrapper">
            <!--パンくずリスト-->
            <div class="breadcrumbs">
                <div class="breadcrumb_inner">
                    <span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="クラブフィレンツェへ移動する"
                            href="{{ route('page.index') }}" class="home"><span property="name">HOME</span></a>
                        <meta property="position" content="1">
                    </span><i class="fas fa-angle-right" aria-hidden="true"></i><span property="itemListElement"
                        typeof="ListItem"><span property="name" class="archive post-model-archive current-item">モデル</span>
                        <meta property="url" content="{{ route('page.enrollment_table') }}">
                        <meta property="position" content="2">
                    </span>
                </div>
            </div>
            <!-- ここはタイトルと見出し -->
            <div class="ex_wrap fadeUpTrigger smooth">
                <h3 class="ex_headline">在籍モデル一覧</h3>
                <p class="ex_txt">
                    当店では芸能プロダクションのみならず、あらゆる業界の圧倒的美人が多数在籍しております。他の高級店では体験できない、最高峰クウォリティの美女を厳選してご案内いたします。 </p>
            </div>
            <!-- アコーディオンでキーワードサーチコンテンツを表示 -->
            <div class="accordion-area fadeUpTrigger2">
                <section class="search">
                    <h3 class="search_title">Keyword Search</h3>
                    <div class="box">
                        <ul class="sort-btn color_bk">
                            <li>
                                <dl>
                                    <dt>All</dt>
                                    <dd>
                                        <ul>
                                            <li class="all active">全て</li>
                                        </ul>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt>CLASS</dt>
                                    <dd>
                                        <ul>
                                            <li class="rank01">PLATINUM</li>
                                            <li class="rank02">BLACK</li>
                                            <li class="rank03">DIAMOND</li>
                                            <li class="rank04">RED DIAMOND</li>
                                        </ul>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt>TYPE</dt>
                                    <dd>
                                        <ul>
                                            <li class="cat01">新人</li>
                                            <li class="cat02">経験者</li>
                                            <li class="cat03">未経験</li>
                                            <li class="cat04">清楚系</li>
                                            <li class="cat05">スタイル抜群</li>
                                            <li class="cat06">モデル系</li>
                                            <li class="cat07">キレカワ系</li>
                                            <li class="cat08">アイドル系</li>
                                            <li class="cat09">素人系</li>
                                            <li class="cat10">グラビア系</li>
                                            <li class="cat11">お姉様系</li>
                                            <li class="cat12">ギャル系</li>
                                            <li class="cat13">現役モデル</li>
                                            <li class="cat14">AV女優</li>
                                            <li class="cat15">CA</li>
                                            <li class="cat16">女子大生</li>
                                            <li class="cat17">ロリ系</li>
                                            <li class="cat18">おっとり系</li>
                                            <li class="cat19">綺麗系</li>
                                            <li class="cat20">可愛い系</li>
                                            <li class="cat21">癒し系</li>
                                            <li class="cat22">オススメ</li>
                                            <li class="cat23">巨乳</li>
                                            <li class="cat24">スレンダー</li>
                                            <li class="cat25">女子アナ系</li>
                                            <li class="cat26">小柄</li>
                                            <li class="cat27">高身長</li>
                                            <li class="cat28">愛嬌抜群</li>
                                            <li class="cat29">パイパン</li>
                                            <li class="cat30">美脚</li>
                                            <li class="cat31">美乳</li>
                                            <li class="cat32">美尻</li>
                                            <li class="cat33">黒髪</li>
                                            <li class="cat34">ハーフ</li>
                                        </ul>
                                    </dd>
                                </dl>
                            </li>
                        </ul>
                    </div>
                </section>
            </div>
            <!-- ここまでがキーワードサーチのアコーディオンメニュー -->

            <div class="articlePanel mgt_30">
                   <ul id="companion-list" class="article-wrap slider grid fadeUpTrigger3 muuri">
            @if ($paginatedCompanions->count() > 0)
                @foreach ($paginatedCompanions as $companion)
                    @php
                        // すべてのアイテムに共通のクラスを設定
                        $textClass    = 'normal-text-class';
                        $nameClass    = 'normal-name-class';
                        $sizeClass    = 'normal-size-class';
                        $featureClass = 'normal-feature-class';
                        $introClass   = 'normal-intro-class';  // ← 追加
                
                        // 画像パスの決定
                        $imgPath = !empty($companion->home_image->photo)
                            ? '/storage/photos/' . $companion->id . '/' . $companion->home_image->photo
                            : '/storage/photos/default/images.jpg';
                
                        // カテゴリと対応するクラスのマッピング
                        $category_class_map = [
                            'PLATINUM'    => 'rank01',
                            'BLACK'       => 'rank02',
                            'DIAMOND'     => 'rank03',
                            'RED DIAMOND' => 'rank04',
                        ];
                
                        $category_class = '';
                        $companion_category_name = $companion->category->name ?? null;
                        if ($companion_category_name && array_key_exists($companion_category_name, $category_class_map)) {
                            $category_class = $category_class_map[$companion_category_name];
                        }
                
                        // カテゴリのクラス作成
                        $companion_categories = '';
                        $categories = [
                            '新人'         => 'cat01',
                            '経験者'       => 'cat02',
                            '未経験'       => 'cat03',
                            '清楚系'       => 'cat04',
                            'スタイル抜群' => 'cat05',
                            'モデル系'     => 'cat06',
                            'キレカワ系'   => 'cat07',
                            'アイドル系'   => 'cat08',
                            '素人系'       => 'cat09',
                            'グラビア系'   => 'cat10',
                            'お姉様系'     => 'cat11',
                            'ギャル系'     => 'cat12',
                            '現役モデル'   => 'cat13',
                            'AV女優'       => 'cat14',
                            'CA'           => 'cat15',
                            '女子大生'     => 'cat16',
                            'ロリ系'       => 'cat17',
                            'おっとり系'   => 'cat18',
                            '綺麗系'       => 'cat19',
                            '可愛い系'     => 'cat20',
                            '癒し系'       => 'cat21',
                            'オススメ'     => 'cat22',
                            '巨乳'         => 'cat23',
                            'スレンダー'   => 'cat24',
                            '女子アナ系'   => 'cat25',
                            '小柄'         => 'cat26',
                            '高身長'       => 'cat27',
                            '愛嬌抜群'     => 'cat28',
                            'パイパン'     => 'cat29',
                            '美脚'         => 'cat30',
                            '美乳'         => 'cat31',
                            '美尻'         => 'cat32',
                            '黒髪'         => 'cat33',
                            'ハーフ'       => 'cat34'
                        ];
                
                        if (!empty($companion->rookie) && is_string($companion->rookie)) {
                            foreach ($categories as $key => $value) {
                                if (str_contains($companion->rookie, $key)) {
                                    $companion_categories .= " {$value}";
                                }
                            }
                        }
                
                        // タイムスタンプとIDを結合してソート用の値を作成
                        $companion_rank = isset($companion->updated_at)
                            ? $companion->updated_at->timestamp . $companion->id
                            : '0';
                    @endphp
                    <li class="article {{ $companion_categories ?? 'undefined' }} {{ $category_class ?? 'undefined' }} item muuri-item muuri-item-shown model-item" data-rank="{{ $companion_rank }}">
                        <a href="{{ route('page.details', ['id' => $companion->id]) }}" class="model_link {{ $textClass }}">
                            <p class="intro model-intro {{ $introClass }}">
                                {{ $companion->sale_point }}
                                <span class="corner top-left"></span>
                                <span class="corner top-right"></span>
                                <span class="corner bottom-left"></span>
                                <span class="corner bottom-right"></span>
                            </p>
                            <div class="box fadeUpTrigger3">
                                <span class="rank_label">
                                    @if($companion->category && $companion->category->name == 'BLACK')
                                        <img src="{{ url('assets/images/black_label.png') }}" alt="BLACK">
                                    @elseif($companion->category && $companion->category->name == 'PLATINUM')
                                        <img src="{{ url('assets/images/platinum_label.png') }}" alt="PLATINUM">
                                    @elseif($companion->category && $companion->category->name == 'DIAMOND')
                                        <img src="{{ url('assets/images/diamond_label.png') }}" alt="DIAMOND">
                                    @elseif($companion->category && $companion->category->name == 'RED DIAMOND')
                                        <img src="{{ url('assets/images/reddiamond_label.png') }}" alt="RED DIAMOND">
                                    @endif
                                </span>
                                <img src="{{ asset($imgPath) }}" alt="{{ $companion->name }}" class="photo" loading="lazy">
                                <div class="prof_box">
                                    <div class="prof">
                                        <div class="name_wrap {{ $nameClass }}">
                                            <p class="name">{{ $companion->name }}</p>
                                            <span class="age">{{ $companion->age }}</span>歳
                                        </div>
                                        <div class="size {{ $sizeClass }}">
                                            T:<span class="tall">{{ $companion->height }}</span>
                                            <span class="bust">B:{{ $companion->bust }}({{ $companion->cup }})</span>
                                            <span class="waist">W:{{ $companion->waist }}</span>
                                            <span class="hip">H:{{ $companion->hip }}</span>
                                        </div>
                                    </div>
                                    <div class="feature_home {{ $featureClass }}">
                                        @if (!empty($companion->rookie))
                                            @foreach (explode(",", $companion->rookie) as $item)
                                                <span>{{ $item }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            @else
                <p>表示するモデルがありません。</p>
            @endif
        </ul>

            
                <!-- ページネーションリンクを表示 -->
            <!-- 
            @if ($paginatedCompanions->hasPages())
                    <div class="pagination-wrap">
                        <ul class="pagination">
                            {{-- 前へボタン --}}
                            @if ($paginatedCompanions->currentPage() > 1)
                                <li class="page-item">
                                    <a class="page-link"
                                        href="{{ $paginatedCompanions->url($paginatedCompanions->currentPage() - 1) }}"
                                        rel="prev">‹</a>
                                </li>
                            @endif

                            {{-- 1ページ目のリンク --}}
                            <li class="page-item {{ $paginatedCompanions->currentPage() == 1 ? 'active' : '' }}">
                                <a class="page-link" href="{{ $paginatedCompanions->url(1) }}">1</a>
                            </li>

                            {{-- 2ページ目のリンク（残りのすべてを表示） --}}
                            @if ($paginatedCompanions->total() > 20)
                                <li class="page-item {{ $paginatedCompanions->currentPage() == 2 ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $paginatedCompanions->url(2) }}">2</a>
                                </li>
                            @endif

                            {{-- 次へボタン --}}
                            @if ($paginatedCompanions->currentPage() < 2)
                                <li class="page-item">
                                    <a class="page-link"
                                        href="{{ $paginatedCompanions->url($paginatedCompanions->currentPage() + 1) }}"
                                        rel="next">›</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif
                 -->
            </div>
                       
            
            {!! $enrollment_table->text_data2 !!}
            {!! $enrollment_table->text_data3 !!}
            
    </section>
@endsection