@extends('page.layout')

@section('content')

    {!! $event->text_data1 !!}
    <section class="article-container" id="article-container">
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
                    <span property="name" class="archive taxonomy category current-item">NEWS</span>
                    <meta property="url" content="{{ route('page.news') }}">
                    <meta property="position" content="2">
                </span>
            </div>
        </div>
        <div class="wrapper">
            <div class="container" id="news-all-container">
                <div class="archive">
                    <div class="headline mrgbtm0 opacity_clear">
                        <p class="ttl_en">ARCHIVE</p>
                        <h2 class="headline_ttl">
                            NEWS </h2>
                        <p class="back_txt">NEWS</p>
                    </div>
                    <div class="archive_category">
                        <h2 class="archive_title">カテゴリー</h2>
                        <ul class="archive_list">
                            <li class="cat-item cat-item-1 @if(!request()->has('year')) current-cat @endif"> <a aria-current="page" href="{{ route('page.news') }}">NEWS</a> </li>
                        </ul>
                    </div>
                    <div class="archive_yealy">
                        <h2 class="archive_title">年別</h2>
                        <ul class="archive_list">
                            @foreach ($years as $year)
                                <li><a href="{{ route('page.news', ['year' => $year->year]) }}">{{ $year->year }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="content">
                    <div class="news_wrap">
                        <div class="news_box">
                            <ul class="news_list">
                                @foreach ($news_data as $news)
                                    <li id="{{ $news->id }}" class="news type-post status-publish format-standard hentry category-news">
                                        <div class="date-area">
                                            <time datetime="{{ date('Y/m/d', strtotime($news->updated_at)) }}">{{ date('Y/m/d', strtotime($news->created_at)) }}</time>
                                            <ul class="post-categories">
                                                <li><a href="" rel="category tag">NEWS</a></li>
                                            </ul>
                                        </div>
                                        <p><a class="news-link" href="{{ route('page.news.details', [$news->slug]) }}">{{ $news->title }}</a></p>
                                    </li>
                                @endforeach
                            </ul>
                            {{ $news_data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="more_btn_news">
            <a href="{{ route('page.index') }}">TOPへ戻る</a>
        </button>
    </section>

@endsection
