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
                    <a property="item" typeof="WebPage" title="クラブフィレンツェへ移動する" href="{{ route('page.news') }}" class="home">
                        <span property="name">NEWS</span>
                    </a>
                    <meta property="position" content="2">
                </span>
                <i class="fas fa-angle-right" aria-hidden="true"></i>
                <span property="itemListElement" typeof="ListItem">
                    <span property="name" class="archive taxonomy category current-item">{{ $news_detail->title }}</span>
                    <meta property="url" content="{{ route('page.news.details', [$news_detail->slug]) }}">
                    <meta property="position" content="3">
                </span>
            </div>
        </div>
        <div class="wrapper">
            <div class="wrapper pd_adj">
                <h3 class="content_title">NEWS</h3>
                <div class="content">
                    <div class="content_aside js-aside-top">
                        <div class="content_asideList content_asideList-top">
                            <dl>
                                <dt>DATE</dt>
                                <time datetime="{{ date('Y-m-d', strtotime($news_detail->created_at)) }}"> {{ date('Y-m-d', strtotime($news_detail->created_at)) }} </time>
                            </dl>
                        </div>
                    </div>
                    <article id="post-1"
                        class="content_body post-1 post type-post status-publish format-standard hentry category-news">
                        <header class="content_header">
                            <h1 class="content_title">{{ $news_detail->title }}</h1>
                        </header>
                        {!! $news_detail->text !!}
                    </article>
                </div>
                <div class="postLinks">
                    <button class="more_btn_news">
                        <a href="{{ route('page.news') }}">VIEW ALL</a>
                    </button>
                </div>
            </div>
        </div>

    </section>
@endsection
