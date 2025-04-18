@extends('page.layout')

@section('content')

    {!! $concept->text_data1 !!}

    <section class="concept" id="concept">
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
                        <span property="name" class="post post-page current-item">CONCEPT</span>
                        <meta property="url" content="{{ route('page.concept') }}">
                        <meta property="position" content="2">
                    </span>
                </div>
            </div>
            <div class="headline opacity_clear">
                <h2 class="headline_ttl color_white"> CONCEPT </h2>
                <p class="back_txt color_wh05">CONCEPT</p>
            </div>
            {!! $concept->text_data2 !!}
            
        </div>
    </section>
    
    {!! $concept->text_data3 !!}

@endsection
