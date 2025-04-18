@extends('page.layout')

@section('content')

    {!!  $header->text_data1 !!}
    {!!  $header->text_data2 !!}
    {!!  $header->text_data3 !!}

    @if(auth()->check())
        <article id="ranking">
            <div class="inner">
                <section class="contents">
                    <h3 class="ttl"><span>MOVIE</span></h3>
                    <div class="ranking_list">
                        @foreach($companions as $companion)
                            <section class="girl">
                                @php
                                    if(!empty($companion)){
                                        $imgPath = '/storage/photos/'.($companion->id).'/'.($companion->home_image->photo);
                                    }else{
                                        $imgPath = '/storage/photos/default/not-to-be-published.jpg';
                                    }
                                @endphp
                                <h4>
                                    <a href="{{ route('page.details', ['id'=>$companion->id]) }}">
                                        <img src="{{ $imgPath }}" loading="lazy" width="365" height="505" alt="{{ $companion->name }}" class="ranking_list_img">
                                    </a>
                                </h4>

                                @if($companion->category->name == "BLACK")
                                    <p class="tiger_736 mincho"><span><span>{{ $companion->category->name }}</span></span></p>
                                @elseif($companion->category->name == "PLATINUM")
                                    <p class="tiger_201 mincho"><span><span>{{ $companion->category->name }}</span></span></p>
                                @elseif($companion->category->name == "DIAMOND")
                                    <p class="tiger_200 mincho"><span><span>{{ $companion->category->name }}</span></span></p>
                                @elseif($companion->category->name == "RED DIAMOND")
                                    <p class="tiger_202 mincho"><span><span>{{ $companion->category->name }}</span></span></p>
                                @endif

                                <p class="name">
                                    <a href="{{ route('page.details', ['id'=>$companion->id]) }}">{{ $companion->name }}（{{ $companion->age }}）</a>
                                </p>
                                <p class="size">T{{ $companion->height }}&nbsp;<br>B{{ $companion->bust }}({{ $companion->cup }})&nbsp;W{{ $companion->waist }}&nbsp;H{{ $companion->hip }}</p>
                            </section>
                        @endforeach
                    </div>
                </section>
            </div>
        </article>
    @else
        <article id="newface" class="inner">
            <h2 class="ttl"><span>MOVIE</span></h2>
            <div class="movie contents">
                <div class="prime_txt">
                    <p>こちらの機能は虎の穴PRIME会員ページにてご利用いただけます。</p>
                    <p class="btn mincho"><a href="{{ route('user.login') }}" target="_blank">新規会員登録の方はこちらから</a></p>
                </div>
            </div>
        </article>
    @endif

    <nav id="breadcrumbs">
        <ul class="contents" itemscope itemtype="http://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.index') }}"><span itemprop="name">渋谷デリヘル</span></a>
                <meta itemprop="position" content="1" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item"
                    href="{{ route('page.index') }}"><span itemprop="name">トップ</span></a>
                <meta itemprop="position" content="2" />
            </li>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span
                    itemprop="name">動画</span>
                <meta itemprop="position" content="3" />
            </li>
        </ul>
    </nav>

@endsection
