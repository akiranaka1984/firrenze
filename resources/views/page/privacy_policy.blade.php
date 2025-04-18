@extends('page.layout')

@section('content')

    {!! $privacy_policy->text_data1 !!}

    <section class="article-container" id="article-container">
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
                    <span property="name" class="archive taxonomy category current-item">PRIVACY POLICY</span>
                    <meta property="url" content="{{ route('page.privacy_policy') }}">
                    <meta property="position" content="2">
                </span>
            </div>
        </div>
        {!! $privacy_policy->text_data2 !!}

        <button class="more_btn_news">
            <a href="{{ route('page.index') }}">TOPへ戻る</a>
        </button>
    </section>
@endsection
